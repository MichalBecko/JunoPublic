<?php

namespace ProjectModule\Presenters;

use Functions\Functions;
use LogModule\Classes\LogValues;
use LogModule\Entities\Log;
use Nette\Application\UI\Multiplier;
use Nette\Utils\Html;
use Nette\Utils\Json;
use ProjectModule\Classes\DefaultValues;
use ProjectModule\Factories\ImportTestAnalysesFormFactory;
use ProjectModule\Factories\TestCaseFormFactory;
use ProjectModule\Factories\TestSetFormFactory;
use ProjectModule\Services\TestCaseService;
use ProjectModule\Services\TestSetService;

/**
 * Description of TestAnalysesPresenter
 *
 * @author Vladimír Vráb <www.artexe.sk>
 */
class TestAnalysesPresenter extends ManagementPresenter {
    
    /** @var TestSetService @inject */
    public $testSetService;
    
    /** @var TestCaseService @inject */
    public $testCaseService;
    
    /** @var TestSetFormFactory @inject */
    public $testSetFormFactory;
    
    /** @var TestCaseFormFactory @inject */
    public $testCaseFormFactory;

    /** @var  ImportTestAnalysesFormFactory @inject */
    public $importTestAnalysesFormFactory;
    
    public function startup() {
        parent::startup();
        $this->addBreadCrumb("Test analyses", ":Admin:Project:TestAnalyses:default", ["projectID" => $this->projectID]);
        $this->testCaseFormFactory->presenter = $this;
    }
    
    public function createComponentTestAnalysesGrid($name) {
        
        $qb = $this->testSetService->getAllAsQb()
                ->where("ts.project = :project")
                ->setParameter("project", $this->project);
        $grid = $this->datagridFactory->createDatagrid($this, $qb, $name);
        $grid->setHeader("Test Set / Test Case");
        
        $grid->setHugeTreeView([$this, "getChildren"], [$this, "hasChildren"]);
        
        $nameColumn = $grid->addColumnText("name", "Názov")
            ->setRenderer(function($item) {
                if ($item instanceof \ProjectModule\Entities\TestSet) {
                    return $item->getTrProp("name");
                } else {
                    return Html::el("a data-caseid=" . $item->getId())
                        ->href("#")
                        ->setText($item->getTrProp("name"))
                        ->setClass("showCaseInModal");
                }
            })
            ->setSortable();
        $userColumn = $grid->addColumnText("user", "Vytvoril")
            ->setRenderer(function($item) {
                return $item->getCreator()->getFullName();
            });
        $grid->addColumnText("approved", "Schválené")
            ->setRenderer(function($item) {
                return $item->getApprovedInStyle();
            })
            ->setTemplateEscaping(false);
        $approvedExport = (new \Ublaboo\DataGrid\Column\ColumnText($grid, 'approvedExport', 'approvedExport', "Schválené"))
            ->setRenderer(function($item) { return $item->getApproved() ? "Yes" : "No"; });
        $createDateColumn = $grid->addColumnDateTime("createDate", "Dátum vytvorenia")
            ->setSortable();

        $grid->addFilterText("name", "Názov TS");
        $grid->addFilterDateRange("createDate", "Dátum vytvorenia TS");
        $grid->addFilterSelect("creator", "Vytvoril TS", Functions::insertEmptyArray($this->userService->getAllUsersInProject($this->projectID)));

        $grid->addColumnText("action", "is.default.action")
            ->setAlign("right")
            ->setTemplate($this->dirService->getModulesDir().'/ProjectModule/templates/TestAnalyses/Blocks/actionDatagridAnalyses.latte', ["presenter" => $grid->getPresenter()]);

        $grid->addExportCsv("Export", "export-". date("j.n.Y"))
            ->setTitle("Export")
            ->setColumns([
                $nameColumn,
                $userColumn,
                $approvedExport,
                $createDateColumn,
            ])
            ->setClass("btn btn-primary pull-right spaceButton");

        return $grid;
    }

    public function actionGetCase($caseid) {
        $case = $this->testCaseService->getById($caseid);

        $testCaseMultimedias = $this->database->table("test_case_multimedia")
            ->where("test_case_id", $caseid)
            ->fetchAll();
        $multimediaIds = [];
        foreach ($testCaseMultimedias as $multimedia) {
            $multimediaIds[] = $multimedia->multimedia_id;
        }

        $attachments = $this->database->table("multimedia")->select("id")
            ->select("multimedia.name, multimedia.path")
            ->where("id", $multimediaIds)
            ->fetchPairs("name", "path");

        $arr = [
            "name" => $case->getName(),
            "description" => $case->getDescription(),
            "result" => $case->getResult(),
            "creator" => $case->getCreator()->getName(),
            "createDate" => $case->getCreateDate()->format("j.m.Y"),
            "priority" => DefaultValues::getPriorities()[$case->getPriority()],
            "approved" => $case->getApproved() ? "Ano" : "Ne",
            "testSetName" => $case->getTestSet()->getName(),
            "attachments" => $attachments,
        ];

        $this->payload->data = Json::encode($arr);
        $this->sendPayload();
    }
    
    public function getChildren($id) {
        return $this->testSetService->getById($id)->getTestCases();
    }
    
    public function hasChildren($item) {
        return $item->hasChildren();
    }
    
    public function createComponentAddTestSetForm() {
        $form = $this->testSetFormFactory->createAddForm($this->project, $this);
        $form->onSuccess[] = function() {
            $this->flashMessage("Test Set bol úspešne vytvorený", "success");
            $this->redirect("this");
        };
        return $form;
    }
    
    public function handleEditTestSet($testSetID) {
        
        $this->template->testSet = $this->testSetService->getById($testSetID);
        $this->redrawControl("editTestSet");
    }
    
    public function createComponentEditTestSetForm() {

        $presenter = $this;
        return new Multiplier(function($id) use($presenter) {
            $form = $this->testSetFormFactory->createEditForm($id, $presenter);
            $form->onSuccess[] = function() {
                $this->flashMessage("Test Set bol úspešne upravený", "success");
                $this->redirect("this");
            };
            return $form;
        });
    }
    
    public function createComponentAddTestCaseForm() {
        $form = $this->testCaseFormFactory->createAddForm($this->project, $this);
        $form->onSuccess[] = function() {
            $this->flashMessage("Test Case bol úspešne vytvorený", "success");
            $this->redirect("this", ["testSetId" => $this->testCaseFormFactory->testSetId]);
        };
        $form->onError[] = function() {
            $this->flashMessage("Nie je možné vytvoriť Test Case bez minimálne jedného Test Setu", "danger");
            $this->redirect("this");
        };
        return $form;
    }
    
    public function handleEditTestCase($testCaseID) {
        
        $this->template->testCase = $this->testCaseService->getById($testCaseID);
        $this->redrawControl("editTestCase");
    }
    
    public function createComponentEditTestCaseForm() {

        $presenter = $this;
        return new Multiplier(function($id) use($presenter) {
            $form = $this->testCaseFormFactory->createEditForm($this->project, $id, $presenter);
            $form->onSuccess[] = function() {
                $this->flashMessage("Test Case bol úspešne upravený", "success");
                $this->redirect("this", ["testSetId" => $this->testCaseFormFactory->testSetId]);
            };
            return $form;
        });
    }
    
    public function handleDeleteTestCase($testCaseID) {
        $testCase = $this->testCaseService->getById($testCaseID);
        $testSetId = $testCase->getTestSet()->getId();
        $this->testCaseService->delete($testCase);

        // HERE GOES LOG (smazat)
        $log = Log::create(LogValues::ACTION_DELETE, LogValues::TAB_TEST_ANALYSES);
        $log->setDescription("Smazan Test Case s ID ".$testCaseID);
        $this->logService->insert($log);

        $this->flashMessage("Test Case bol úspešne zmazaný", "success");
        $this->redirect("this", ["testSetId" => $testSetId]);
    }

    public function handleApproveTestSet($testSetID) {

        $data = [
            "approved" => 1
        ];
        $this->database->table("test_case")->where("test_set_id = ?", $testSetID)->update($data);

        $this->flashMessage("Všetky test casy v test sete bolo schválené", "success");
        $this->redirect("this");
    }

    public function handleCloneTestCase($testCaseID) {

        $cloneTestCase = $this->testCaseService->getById($testCaseID);
        $this->template->cloneTestCase = $cloneTestCase;

        $this->redrawControl("cloneTestCase");

        // HERE GOES LOG
        $log = Log::create(LogValues::ACTION_INSERT, LogValues::TAB_TEST_ANALYSES);
        $log->setDescription("Naklonován TC s ID ". $testCaseID);
        $this->logService->insert($log);
    }
    
    public function handleDeleteTestSet($testSetID) {
        $this->testSetService->delete($this->testSetService->getById($testSetID));

        // HERE GOES LOG (smazat)
        $log = Log::create(LogValues::ACTION_DELETE, LogValues::TAB_TEST_ANALYSES);
        $log->setDescription("Smazan Test Set s ID ".$testSetID);
        $this->logService->insert($log);

        $this->flashMessage("Test Set bol úspešne zmazaný", "success");
        $this->redirect("this");
    }

    public function handleSetTree($testSetId) {
        $this["testAnalysesGrid"]->setDataSource(
            call_user_func([$this, "getChildren"], $testSetId)
        );

        $this->payload->_datagrid_url = true;
        $this->payload->_datagrid_tree = $testSetId;

        $this["testAnalysesGrid"]->redrawControl('items');
        $this["testAnalysesGrid"]->redrawControl('tbody');
        $this["testAnalysesGrid"]->onRedraw();
    }
    

    public function actionDefault($projectid, $testSetId = null) {
        $this->template->testSetId = $testSetId;

        $tagsTestCase = $this->database->table("tag_test_case")
            ->where("test_case.test_set.project_id = ?", $this->projectID)
            ->select("tag_test_case.name AS name")
            ->fetchPairs(null, "name");
        $this->template->tagsTestCase = $tagsTestCase;

        $tagsTestSets = $this->database->table("tag_test_set")
            ->where("test_set.project_id = ?", $this->projectID)
            ->select("tag_test_set.name AS name")
            ->fetchPairs(null, "name");
        $this->template->tagsTestSets = $tagsTestSets;
    }
    
    public function createComponentBulkTestCaseForm() {
        $form = $this->testCaseFormFactory->createBulkForm($this->project);
        $form->onSuccess[] = function() {
            $this->flashMessage("Bulk test case bol úspešne importovaný", "success");
            $this->redirect("this", ["testSetId" => $this->testCaseFormFactory->testSetId]);
        };
        $form->onError[] = function() {
            $this->flashMessage("Nie je možné vytvoriť Test Case bez minimálne jedného Test Setu", "danger");
            $this->redirect("this");
        };
        return $form;
    }

    public function createComponentImportTestAnalyses() {

        $form = $this->importTestAnalysesFormFactory->createAddForm($this->project);
        $form->onSuccess[] = function() {

            if (is_bool($this->importTestAnalysesFormFactory->return)) {
                $this->flashMessage("Import prebehol úspešne a bol vložený do databázy", "success");
                $this->redirect("this");
            } else {
                $this->flashMessage($this->importTestAnalysesFormFactory->return, "danger");
                $this->redirect("this");
            }

        };
        return $form;
    }
    
}
