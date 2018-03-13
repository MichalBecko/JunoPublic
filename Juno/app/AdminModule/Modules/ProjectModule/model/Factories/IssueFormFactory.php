<?php

namespace ProjectModule\Factories;

use DefaultModule\Factories\TranslatedFormFactory;
use DefaultModule\Services\HydratorService;
use DefaultModule\Services\SimpleEntityService;
use LogModule\Services\LogService;
use MultimediaModule\Interfaces\IMultimediaSaver;
use Nette\Application\UI\Form;
use Nette\Database\Context;
use Nette\Http\FileUpload;
use Nette\Utils\FileSystem;
use ProjectModule\Classes\DefaultValues;
use ProjectModule\Entities\Issue;
use ProjectModule\Entities\Project;
use ProjectModule\Entities\TestPlanSprint;
use ProjectModule\Entities\TestPlanSprintCase;
use ProjectModule\Entities\TestStep;
use ProjectModule\Entities\TestStepExecution;
use ProjectModule\Services\ProjectService;
use UserModule\Services\User;
use UserModule\Services\UserService;

/**
 * Description of ProjectFormFactory
 *
 * @author Vladimír Vráb <www.artexe.sk>
 */
class IssueFormFactory {

    /** @var LogService */
    public $logService;

    /** @var User */
    public $user;

    /** @var UserService */
    public $userService;

    /** @var HydratorService */
    public $hydratorService;

    /** @var TranslatedFormFactory */
    public $translatedFormFactory;

    /** @var ProjectService */
    public $projectService;

    /** @var  SimpleEntityService */
    public $simpleEntityService;

    /** @var  IMultimediaSaver */
    public $iMultimediaSaver;

    /** @var  Context */
    public $database;

    private $project;

    private $presenter;

    /**
     * IssueFormFactory constructor.
     * @param LogService $logService
     * @param User $user
     * @param HydratorService $hydratorService
     * @param TranslatedFormFactory $translatedFormFactory
     * @param ProjectService $projectService
     * @param SimpleEntityService $simpleEntityService
     * @param IMultimediaSaver $iMultimediaSaver
     * @param Context $database
     */
    public function __construct(LogService $logService, User $user, UserService $userService, HydratorService $hydratorService, TranslatedFormFactory $translatedFormFactory, ProjectService $projectService, SimpleEntityService $simpleEntityService, IMultimediaSaver $iMultimediaSaver, Context $database)
    {
        $this->logService = $logService;
        $this->user = $user;
        $this->userService = $userService;
        $this->hydratorService = $hydratorService;
        $this->translatedFormFactory = $translatedFormFactory;
        $this->projectService = $projectService;
        $this->simpleEntityService = $simpleEntityService;
        $this->iMultimediaSaver = $iMultimediaSaver;
        $this->database = $database;
    }

    public function getForm() {
        $form = $this->translatedFormFactory->create();

        $form->addText("name", "Nadpis")
            ->setRequired(true)
            ->addRule($form::LENGTH, "Minimálne %d znak a maximálne %d znakov", [1, 80]);
        $form->addTextArea("description", "Popis", null, 8);
        $form->addSelect("priorityId", "Priorita", DefaultValues::getPriorities());


        $form->addHidden("project");
        $form->addHidden("testPlanSprint");
        $form->addHidden("testPlanSprintCase");
        $form->addHidden("testStep");
        $form->addHidden("testStepExecution");

        $form->addSelect("issueTypeId", "Typ", DefaultValues::getIssueTypes());

        $form->addMultiUpload("multimedias", "Prílohy");


        return $form;
    }

    public function createAddForm() {

        $form = $this->getForm();
        $form->addSubmit("submit", "");
        $form->onSuccess[] = [$this, "add"];

        return $form;
    }

    public function add(Form $form) {
        $v = $form->getValues(TRUE);

        $issue = new Issue();
        $issue->name = $v["name"];
        $issue->description = $v["description"];
        $issue->issueTypeId = $v["issueTypeId"];
        $issue->priorityId = $v["priorityId"];
        $issue->status = 1;
        $issue->project = $this->simpleEntityService->getRepository(Project::class)->find($v["project"]);
        $issue->testPlanSprint = $this->simpleEntityService->getRepository(TestPlanSprint::class)->find($v["testPlanSprint"]);
        $issue->testPlanSprintCase = $this->simpleEntityService->getRepository(TestPlanSprintCase::class)->find($v["testPlanSprintCase"]);
        $issue->testStep = $this->simpleEntityService->getRepository(TestStep::class)->find($v["testStep"]);

        // here we check if teststepexecutionid IS SET
        // if it is, we fill

        // if it is not, we try to find latest test step fill
        $issue->testStepExecution = $this->simpleEntityService->getRepository(TestStepExecution::class)->find($v["testStepExecution"]);


        $issue->creator = $this->user->getEntity();

        $attachments = $form->getHttpData();
        $areAttachmentsOk = TRUE;
        foreach ($attachments["multimedia"] as $fileUpload) {
            if ($fileUpload instanceof FileUpload) {
                if ($fileUpload->size < DefaultValues::$MAX_FILE_SIZE && $fileUpload->getTemporaryFile() != "") {
                    $multimediaSaver = $this->iMultimediaSaver->create($fileUpload);
                    $multimedia = $multimediaSaver->saveAsFile("multimedia/projects/" . $issue->project->getId() . "/issues/");
                    $issue->addMultimedia($multimedia);
                } else {
                    $areAttachmentsOk = false;
                    $form->addError("Niektoré súbory prekračujú limit 2MB.");
                    $form->onError($this);
                    break;
                }
            }
        }
        if ($areAttachmentsOk) {
            $this->simpleEntityService->insert($issue);
        }
    }

    public function createEditForm($project, $issueID) {

        $this->project = $project;

        $user = $this->database->table("user")
            ->select("CONCAT(user.name, ' ', user.surname) AS fullname, user.id")
            ->where(":project_role.project_id = ?", $this->project->id)
            ->fetchPairs("id", "fullname");

        $issue = $this->simpleEntityService->getRepository(Issue::class)->find($issueID);

        $form = $this->getForm();
        $form->addSubmit("submit", "");

        $form->addSelect("status", "Status", DefaultValues::getIssueStatuses());

        $form->addHidden("id", $issueID);
        $form->onSuccess[] = [$this, "editForm"];

        $def = [
            "name" => $issue->name,
            "description" => $issue->description,
            "priorityId" => $issue->priorityId,
            "issueTypeId" => $issue->issueTypeId,
            "status" => $issue->status
        ];
        $form->setDefaults($def);

        return $form;
    }

    public function editForm(Form $form) {
        $v = $form->getValues();

        $issue = $this->simpleEntityService->getRepository(Issue::class)->find($v["id"]);

        $issue->name = $v["name"];
        $issue->description = $v["description"];
        $issue->issueTypeId = $v["issueTypeId"];
        $issue->priorityId = $v["priorityId"];
        $issue->status = $v["status"];

        if ($form->getHttpData()["assigned_id"]) {
            $issue->assigned_id = $form->getHttpData()["assigned_id"];
        } else {
            $issue->assigned_id = NULL;
        }

        $attachments = $form->getHttpData();
        $areAttachmentsOk = TRUE;
        foreach ($attachments["multimedia"] as $fileUpload) {
            if ($fileUpload instanceof FileUpload) {
                if ($fileUpload->size < DefaultValues::$MAX_FILE_SIZE && $fileUpload->getTemporaryFile() != "") {
                    $multimediaSaver = $this->iMultimediaSaver->create($fileUpload);
                    $multimedia = $multimediaSaver->saveAsFile("multimedia/projects/" . $issue->project->getId() . "/issues/");
                    $issue->addMultimedia($multimedia);
                } else {
                    $areAttachmentsOk = false;
                    $form->addError($v["assigned_id"]);
                    $form->onError($this);
                    break;
                }
            }
        }
        if ($areAttachmentsOk) {
            $this->simpleEntityService->update($issue);
        }

    }

    public function createRawAddForm($project, $presenter) {
        $this->project = $project;
        $this->presenter = $presenter;

        $form = $this->translatedFormFactory->create();

        $form->addText("name", "Nadpis")
            ->setRequired(true)
            ->addRule($form::LENGTH, "Minimálne %d znak a maximálne %d znakov", [1, 80]);
        $form->addTextArea("description", "Popis", null, 8);
        $form->addSelect("priorityId", "Priorita", DefaultValues::getPriorities());
        $form->addSelect("issueTypeId", "Typ", DefaultValues::getIssueTypes());

        $form->addMultiUpload("multimedias", "Prílohy");

        $form->addSubmit("submit", "");
        $form->onSuccess[] = [$this, "addRaw"];

        return $form;
    }

    public function addRaw(Form $form) {

        $v = $form->getHttpData();

        $issue = new Issue();
        $issue->name = $v["name"];
        $issue->description = $v["description"];
        $issue->issueTypeId = $v["issueTypeId"];
        $issue->priorityId = $v["priorityId"];
        $issue->status = 1;
        $issue->creator = $this->user->getEntity();


        $issue->project = $this->project;
        if (array_key_exists("testSprint", $v)) {
            $issue->testPlanSprint = $this->simpleEntityService->getRepository(TestPlanSprint::class)->find($v["testSprint"]);
        } else {
            $v["testSprint"] = NULL;
        }
        if (array_key_exists("testStep", $v)) {
            $issue->testStep = $this->simpleEntityService->getRepository(TestStep::class)->find($v["testStep"]);
        }
        if ($v["assigned_id"]) {
            $issue->assigned_id = $v["assigned_id"];
        }else {
            $issue->assigned_id = NULL;
        }

        if (!array_key_exists("testCase", $v)) {
            $v["testCase"] = NULL;
        } else {
            // WHOOPS
            $testPlanSprintCase = $this->database->table("test_plan_sprint_case")
                ->select("test_plan_sprint_case.id")
                ->where("test_plan_sprint_id = ? AND test_plan_case.test_case_id = ? AND test_plan_case.test_plan_id = ?",
                    $v["testSprint"],
                    $v["testCase"],
                    $v["testPlan"])->fetch();

            // this should not happen, but anyway it is here
            if (!$testPlanSprintCase) {
                $this->presenter->flashMessage("Pre tento TEST STEP, resp. TEST CASE nebol ešte vytvorený TEST", "danger");
                return true;
            }
            $issue->testPlanSprintCase = $this->simpleEntityService->getRepository(TestPlanSprintCase::class)->find($testPlanSprintCase->id);

        }

        $attachments = $form->getHttpData();
        $areAttachmentsOk = TRUE;
        foreach ($attachments["multimedia"] as $fileUpload) {
            if ($fileUpload instanceof FileUpload) {
                if ($fileUpload->size < DefaultValues::$MAX_FILE_SIZE && $fileUpload->getTemporaryFile() != "") {
                    $multimediaSaver = $this->iMultimediaSaver->create($fileUpload);
                    $multimedia = $multimediaSaver->saveAsFile("multimedia/projects/" . $issue->project->getId() . "/issues/");
                    $issue->addMultimedia($multimedia);
                } else {
                    $areAttachmentsOk = false;
                    $form->addError("Niektoré súbory prekračujú limit 2MB.");
                    $form->onError($this);
                    break;
                }
            }
        }
        if ($areAttachmentsOk) {
            $this->simpleEntityService->insert($issue);
        }

    }





}
