<?php

namespace DefaultModule\Presenters;

use App\BasePresenter;
use Artexe\CacheToken\CacheToken;
use BreadCrumb\BreadCrumb;
use ClientModule\Services\ClientService;
use DefaultModule\Classes\Functions;
use DefaultModule\Entities\Menuitem;
use DefaultModule\Services\AppSetupService;
use DefaultModule\Services\DirService;
use DefaultModule\Services\MenuitemService;
use FormInputRenderer\Controls\Renderer;
use Latte\Runtime\Filters;
use LogModule\Services\LogService;
use Nette\Caching\IStorage;
use Nette\Database\Context;
use Nette\Mail\SmtpMailer;
use Nette\Utils\DateTime;
use ProjectModule\Classes\DefaultValues;
use UserModule\Classes\FakeSessionIdentity;
use UserModule\Services\User_resource_actionService;
use UserModule\Services\UserService;

/**
 * Base presenter for all application presenters.
 */
abstract class DefaultPresenter extends BasePresenter {

    
    /** @var LogService @inject */
    public $logService;
    
    /** @var UserService @inject */
    public $userService;
    
    /**  @var AppSetupService @inject */
    public $appSetupService;
    
    /**  @var ClientService @inject */
    public $clientService;
    
    /** @var MenuitemService @inject */
    public $menuitemService;
    
    /** @var DirService @inject */
    public $dirService;
    
    /** @var type Array [] */
    public $breadcrumb;
    
    /** @var type Array [] */
    public $menu;
	
    /** @var Menuitem */
    public $menuitem;

    /** @ar integer */
    public $menuitemId;

    /** @var  Context @inject */
    public $database;
    
    /** @var IStorage @inject */
    public $iStorage;

    public $isFakedLoggedin;
	
    public function startup() {
        parent::startup();
        
        // checks whether user is logged and not on login template
        $this->checkLogin();
        $this->checkArchiveAccount();
        $this->checkFakeIdentity();
        
        // setup whole ACL
        $this->user->setupACL();
        
        $this->locale = "sk";
        $this->breadcrumb = [];        
    }


    /**
     * In case we forgot something, checkauthorizaton will be called on every single request right before we render
     * or show anything to user
     */
    protected function beforeRender() {
        parent::beforeRender();

        $session = $this->getSession();
        $value = $session->getSection("menu")->mini;
        $this->template->menuMini = (boolean)$value;
        
        $this->template->breadcrumb = $this->getBreadcrumb();
        
        $this->setMenu();
        $this->template->menu = $this->getMenu();
        
        $this->template->date = new DateTime();
        
        $this->template->appSetupService = $this->appSetupService;
        $this->template->client = $this->clientService->getClient();


        $this->template->blocksDir = $this->dirService->getBlocksDir();
        
        $cacheToken = new CacheToken($this->iStorage, "JUNO_APP_CSS_JS");
        $this->template->cacheToken = $cacheToken->getTimeStamp(TRUE);

        $this->template->isFakedLoggedin = $this->isFakedLoggedin;
    }

    /*****************************************************************
     * AUTHORIZATION STUFF
     ****************************************************************/

    /**
     * If user is not logged in and is not on login page, we redirect him to login page
     */
    private function checkLogin() {
        if (!$this->user->isLoggedIn() && ($this->getAction() != "login")) {
            $this->flashMessage("Pre prístup sa prosím prihláste", "warning");
            $this->redirect(":Admin:Homepage:Homepage:login");
        }
    }

    /**
     * This functions checks if current user is archived
     */
    private function checkArchiveAccount() {

        if ($this->user->isLoggedIn() && $this->user->getEntity()->archive == 1) {
            $this->flashMessage("Tento účet bol deaktivovaný", "danger");
            $this->handleLogout();
        }

    }

    /**
     * This functions checks if current user has certain privilage
     * @param $privilege integer
     * @override functions for whole APP
     */
    public function isAllowed($privilege) {

        if ($this->user->getEntity()->isSuperAdmin()) {
            return true;
        }

        return $this->user->isAllowed(\Privilege::$JUNO_RESOURCE, $privilege);
    }

    /*****************************************************************
     * MENU GENERATION
     ****************************************************************/

    /**
     * We generate menu for current User
     * @return void
     */
    private function setMenu() {

        if (!$this->user->isLoggedIn()) {
            return false;
        }

        $menuitems = $this->menuitemService->getAllMain();
        $menu = [];

        foreach ($menuitems as $menuitem) {
            if ($this->isAllowed($menuitem->privilegeId)) {
                $menu[] = $menuitem;
            }
        }

        $this->menu = $menu;
    }

    /**
     * Sets menu session to true or false
     * @param string $value
     */
    public function handleSetMenuSession($value) {

        $session = $this->getSession();
        $menu = $session->getSection("menu");
        $menu->mini = ($value === 'true');
    }

    private function getMenu() {
        return $this->menu;
    }

    public function getCurrentMenuitem() {
        return $this->menuitem;
    }

    public function setMenuitem($menuitemId) {
        $this->menuitem = $this->menuitemService->getById($menuitemId);
    }

    public function setMenuitemId($id) {
        $this->menuitemId = $id;
        $this->menuitem = $this->menuitemService->getById($id);
    }

    public function checkActiveParent(Menuitem $menuitem, $returnval) {

        $children = Functions::formatToPairs("id", "name", $menuitem->getSubmenuitems());
        if (!is_null($this->menuitem)) {
            if (array_key_exists($this->menuitem->getId(), $children)) {
                return $returnval;
            }
        }
    }

    /*****************************************************************
     * BREAD CRUMBS
     ****************************************************************/

    public function addBreadCrumb($name, $link = "this") {
        $truncatedName = Filters::truncate($name, DefaultValues::$TRUNCATE_MAX_SIZE);
        $this->breadcrumb[] = new BreadCrumb($truncatedName, $link);
    }

    public function getBreadcrumb() {
        return $this->breadcrumb;
    }

    public function removeLastBreadcrumb() {
        end($this->breadcrumb);
        $key = key($this->breadcrumb);
        unset($this->breadcrumb[$key]);
    }

    /*****************************************************************
     * OTHER STUFF
     ****************************************************************/

    private function checkFakeIdentity() {

        $sessionSection = $this->getSession()->getSection("loginAsSomebody");

        if ($sessionSection->fakeIdentity instanceof FakeSessionIdentity) {
            $this->isFakedLoggedin = $sessionSection->fakeIdentity;
        } else {
            $this->isFakedLoggedin = FALSE;
        }

    }

    public function handleLoginBackAsOrigin() {

        // send to cookie that i am logged as somebody and insert who i was as origin
        $session = $this->getSession()->getSection("loginAsSomebody");

        $originID = $session->fakeIdentity->getOriginID();

        $this->user->loginWithoutAuthorization($originID);

        unset($session->fakeIdentity);

        $this->flashMessage("Úspešne prehlásený naspäť");
        $this->redirect(":Admin:Homepage:Homepage:");
    }

    /**
     * Renders all input forms in my way
     * @return Renderer
     */
    public function createComponentRenderFormInput() {
        $control = new Renderer();
        return $control;
    }

    /**
     * Sets layout file for whole administration
     * @return string
     */
    public function findLayoutTemplateFile() {
        return $this->dirService->getAppDir() ."/AdminModule/DefaultModule/templates/@layout.latte";
    }
    
    /**
     * Logout current user
     * @return void
     */
    public function handleLogout() {
        $this->user->logout(TRUE);
        $this->redirect(":Admin:Homepage:Homepage:login");
    }
    
}
