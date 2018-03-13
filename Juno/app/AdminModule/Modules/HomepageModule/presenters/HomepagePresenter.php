<?php

namespace HomepageModule\Presenters;

use DefaultModule\Presenters\DefaultPresenter,
    AuthenticationModule\Factories\LoginFormFactory,
    HomepageModule\Services\LoginPictureService,
    MultimediaModule\Entities\Multimedia,
    UserModule\Factories\LostPasswordFormFactory;
use Nette\Application\UI\Form;
use Nette\Utils\Arrays;

/**
 * Description of HomepagePresenter
 *
 * @author Vladino
 */
class HomepagePresenter extends DefaultPresenter {
    
    /** @var LoginFormFactory @inject */
    public $loginFormFactory;
    
    /** @var LoginPictureService @inject */
    public $loginPictureService;
    
    /** @var LostPasswordFormFactory @inject */
    public $lostPasswordFormFactory;

    private $projectId = 0;
    
    public function startup() {
        parent::startup();
        $this->addBreadCrumb("Domov");
    }
    
    public function actionLogin() {

        if ($this->user->isLoggedIn()) {
            $this->redirect(":Admin:Homepage:Homepage:default");
        }

        $multimedias = $this->loginPictureService->getAll();
        shuffle($multimedias);
        if (count($multimedias) > 0) {
            $this->template->multimedia = $multimedias[0]->getMultimedia();
        } else {
            $defaultMultimedia = new Multimedia();
            $defaultMultimedia->setPath("images/admin/defaultLoginBackground.png");
            $this->template->multimedia = $defaultMultimedia;
        }
        $this->template->form = $this->template->_form = $this["lostPasswordForm"];
    }

    public function handleChooseProject($projectId)
    {
        $this->projectId = $projectId;
        if ($this->isAjax()) {
            $this->redrawControl();
        }
    }

    public function renderDefault($testerId) {
        $user = $this->userService->getOneById($testerId ? $testerId : $this->getUser()->getId());

        $this->template->projects = $projects = $user->getProjects();
        $this->template->issues = $user->getIssues();


        $projectStatus = null;
        foreach ($projects as $project) {
            if ($this->projectId) {
                if ($this->projectId == $project->getId()) {
                    $projectStatus = $project->getProjectStatus();
                    break;
                }
            } else {
                $projectStatus = $project->getProjectStatus();
                break;
            }
        }

        $this->template->projectStatus = $projectStatus;
    }

    protected function createComponentChooseProjectForm() {
        $form = new Form();

        $testerId = $this->getParameter("testerId");
        $user = $this->userService->getOneById($testerId ? $testerId : $this->getUser()->getId());
        $projects = [];
        foreach ($user->getProjects() as $project) {
            $projects[$project->getId()] = $project->getName();
        }

        $form->addSelect("chooseProject", "Choose Project", $projects);

        return $form;
    }

    protected function createComponentChooseTesterForm() {
        $form = new Form();

        $testerId = $this->getParameter("testerId");

        $users = $this->userService->getAllUserPairs("name");
        Arrays::insertBefore($users, null, [null => "Žádný"]);
        $form->addSelect("chooseTester", "Choose Tester" , $users)
            ->setDefaultValue($testerId);

        return $form;
    }
    
    public function createComponentLoginForm() {
	    $form = $this->loginFormFactory->create();
        $form->onSuccess[] = function() {
            $this->flashMessage("is.login.sucLogin", "success");
            $this->redirect("Homepage:");
        };

        return $form;
    }
    
    public function createComponentLostPasswordForm() {
        $form = $this->lostPasswordFormFactory->createAddForm($this);
        return $form;
    }
    
}