<?php
/**
 * Created by PhpStorm.
 * User: Matej
 * Date: 6.2.2018
 * Time: 9:33
 */

namespace ProjectModule\Presenters;


use DefaultModule\Services\SimpleEntityService;
use Nette\Application\UI\Multiplier;
use Nette\Database\Context;
use Nette\Utils\DateTime;
use ProjectModule\Classes\DefaultValues;
use ProjectModule\Entities\Issue;
use ProjectModule\Factories\IssueCommentFormFactory;
use ProjectModule\Factories\IssueFormFactory;
use Ublaboo\DataGrid\DataGrid;

class IssuesPresenter extends ManagementPresenter {

    /** @var  Context @inject */
    public $database;

    /** @var  SimpleEntityService @inject */
    public $simpleEntityService;

    /** @var  IssueFormFactory @inject */
    public $issueFormFactory;

    /** @var  IssueCommentFormFactory @inject */
    public $issueCommentFormFactory;

    public function startup() {
        parent::startup();
        $this->addBreadCrumb("Issues", ":Admin:Project:Issues:default", ["projectID" => $this->projectID]);
    }

    public function createComponentIssuesGrid($name) {

        /********************************************************************************
         *                                  DATAGRID SETUP                              *
         ********************************************************************************/
        $grid = new DataGrid($this, $name);
        $grid->setTemplateFile($this->dirService->getBlocksDir().'/datagridTemplate.latte');
        $grid->setStrictSessionFilterValues(FALSE);
        $grid->setDefaultSort(["id" => "DESC"]);
        $grid->setDefaultPerPage(10);
        $grid->setColumnsHideable();

        $datasource = $this->database->table("issue")
            ->select("issue.id, issue.name, 
            test_plan_sprint.name AS testPlanSprint,
            test_plan_sprint.test_plan.name AS testPlan,
            test_step.test_case.name AS testCase,
            issue.name AS issueName,
            CONCAT(assigned.name, ' ', assigned.surname) AS fullname,
            issue.description AS issueDescription,
            issue.issue_type_id AS issue_type_id,
            issue.test_step_id AS teststepid,
            issue.priority_id AS priority_id,
            issue.status AS status,
            issue.create_date AS createDate,
            '-' AS action,
            CONCAT(creator.name, ' ', creator.surname) AS creator")
            ->where( "issue.project_id = ?", $this->projectID);
        $grid->setDataSource($datasource);

        /*******************************************
         *              COLUMNS
         ******************************************/

        $grid->addColumnText("id", "ID")
            ->setSortable();

        $grid->addColumnText("creator", "Užívateľ")
            ->setSortable();

        $grid->addColumnText("testPlan", "Test Plan")
            ->setSortable();
        $grid->addColumnText("testPlanSprint", "Test Plan Sprint")
            ->setSortable();

        $grid->addColumnText("testCase", "Test Case")
            ->setSortable();

        $grid->addColumnText("issueName", "Nadpis")
            ->setSortable();

        $grid->addColumnText("issueDescription", "Popis")
            ->setSortable();

        $grid->addColumnText("fullname", "Riešitel")
            ->setSortable()
            ->setRenderer(function ($item) {
                if( $item["fullname"]){
                    return $item["fullname"];
                }else {
                    return "-";
                }
            });

        $grid->addColumnText("issue_type_id", "Typ")
            ->setSortable()
            ->setRenderer(function($item) {
                return DefaultValues::getIssueTypes()[$item["issue_type_id"]];
            });
        $grid->addColumnText("priority_id", "Priorita")
            ->setSortable()
            ->setRenderer(function($item) {
                return DefaultValues::getPriorities()[$item["priority_id"]];
            });
        $grid->addColumnText("status", "Status")
            ->setSortable()
            ->setRenderer(function($item) {
                return DefaultValues::getIssueStatuses()[$item["status"]];
            });

        $grid->addColumnDateTime("createDate", "Dátum vytvorenia")
            ->setSortable();

        $grid->addColumnText("action", "Akcie")
            ->setAlign("right")
            ->setTemplate($this->dirService->getModulesDir().'/ProjectModule/templates/Issues/Blocks/actione.latte',
                ["presenter" => $grid->getPresenter()]);

        /*******************************************
         *              FILTERS
         ******************************************/
        $grid->addFilterText("name", "Nadpis");
        $grid->addFilterSelect("issue_type_id", "Typ", [NULL => "-"] + DefaultValues::getIssueTypes());
        $grid->addFilterSelect("priority_id", "Priorita", [NULL => "-"] + DefaultValues::getPriorities());
        $grid->addFilterSelect("status", "Status", [NULL => "-"] + DefaultValues::getIssueStatuses());
        $grid->addFilterDateRange("createDate", "Dátum vytvorenia");

        $grid->setOuterFilterRendering(true);

        /*******************************************
         *              EXPORT
         ******************************************/
        $today = new DateTime();
        $todayInString = $today->format("dmY");
        $grid->addExportCsvFiltered("E", "issue_export_$todayInString.csv", "windows-1250");

        return $grid;
    }

    public function actionDefault() {

        $testPlans = $this->database->table("test_plan")
            ->select("test_plan.id, test_plan.name")
            ->where("test_plan.project_id = ?", $this->projectID)
        ->fetchAll();

        $user = $this->database->table("user")
            ->select("CONCAT(user.name, ' ', user.surname) AS fullname, user.id")
            ->where(":project_role.project_id = ?", $this->project->id)
            ->fetchPairs("id", "fullname");


        $this->template->testPlans = $testPlans;
        $this->template->assignedUser = $user;
    }

    public function handleDeleteIssue($issueId) {

        $issue = $this->simpleEntityService->getRepository(Issue::class)->find($issueId);

//        foreach ($issue->multimedias as $mul) {
//            dump($mul->path);
//              Delete multimedia in path
//        }

        $this->simpleEntityService->delete($issue);

        $this->flashMessage("Issue bola úspešne zmazaná", "success");
        $this->redirect("this");
    }

    public function createComponentAddIssueForm() {

        $form = $this->issueFormFactory->createRawAddForm($this->project, $this);
        $form->onSuccess[] = function() {
            $this->flashMessage("Issue bola úspešne vytvorená", "success");
            $this->redirect("this");
        };
        $form->onError[] = function() {
            $this->flashMessage("Niektoré súbory prekračujú limit 2MB.", "danger");
            $this->redirect("this");
        };
        return $form;

    }

    public function createComponentEditIssueForm() {

        return new Multiplier(function($id) {
            $form = $this->issueFormFactory->createEditForm($this->project, $id);
            $form->onSuccess[] = function() {
                $this->flashMessage("Issue bola úspešne upravená", "success");
                $this->redirect("this");
            };
            $form->onError[] = function() {
                $this->flashMessage("Niektoré súbory prekračujú limit 2MB.", "danger");
                $this->redirect("this");
            };
            return $form;
        });

    }

    public function handleEditIssue($issueID) {

        $this->template->issue = $this->simpleEntityService->getRepository(Issue::class)->find($issueID);
        $this->template->editIssue = $issueID;
        $this->redrawControl("editIssue");
    }

    public function createComponentAddIssueCommentForm() {

        $form = $this->issueCommentFormFactory->createAddForm();
        return $form;
    }


}