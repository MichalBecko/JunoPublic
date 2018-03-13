<?php

namespace ProjectModule\Presenters;

use Functions\Functions;
use Nette\Application\UI\Presenter;
use Nette\Database\Context;
use Nette\Utils\DateTime;
use Nette\Utils\Json;
use ProjectModule\Classes\DefaultValues;
use ProjectModule\Traits\PrivilegeTrait;

/**
 * Description of RestSettingsPresenter
 *
 * @author Vladimír Vráb <www.artexe.sk>
 */
class RestTestExecutionPresenter extends Presenter {

    use PrivilegeTrait;

    /** @var Context @inject */
    public $database;

    public function actionGetUserTestSprintsByTestPlan($userID, $testPlanID, $projectID) {

        $hasRightToSeeEverything = $this->hasRight($userID, $projectID, \Privilege::TEST_EXECUTION_SEE_ALL_PLANS_AND_SPRINTS);
        $user = $this->database->table("user")->where("id = ?", $userID)->fetch();

        if ($hasRightToSeeEverything || $user["super_admin"] == 1) {
            $testerTestSprints = $this->database->table("test_plan_sprint")
                ->select("test_plan_sprint.id AS test_plan_sprint_id, test_plan_sprint.name")
                ->where("test_plan_id = ?", $testPlanID)
                ->fetchPairs("test_plan_sprint_id", "name");
        } else {
            // we get all test sprints that current user can access?
            $testerTestSprints = $this->database->table("test_plan_sprint_case_user")
                ->select("test_plan_sprint_case.test_plan_sprint_id, test_plan_sprint_case.test_plan_sprint.name")
                ->where("user_id = ? AND test_plan_sprint_case.test_plan_sprint.test_plan_id = ?", $userID, $testPlanID)
                ->fetchPairs("test_plan_sprint_id", "name");

        }

        $json = Json::encode($testerTestSprints);
        $this->payload->result = $json;
        $this->sendPayload();
    }
    
    public function actionInsertTestExecution($testPlanSprintCaseID, $testStepID, $creatorID, $statusID) {
        
        $data = [
            "creator_id" => $creatorID,
            "status_id" => $statusID,
            "test_plan_sprint_case_id" => $testPlanSprintCaseID,
            "test_step_id" => $testStepID
        ];
        $returnRow = $this->database->table("test_step_execution")->insert($data);

        $totalTestPlanSprintCaseStatus = $this->getTotalTestPlanSprintCaseStatus($testPlanSprintCaseID);
        $datanew = [
            "status_id" => $totalTestPlanSprintCaseStatus
        ];
        // HERE SHOULD BE CHECK OF STATUS
        $where = [
            "id" => $testPlanSprintCaseID
        ];
        $this->database->table("test_plan_sprint_case")->where($where)->update($datanew);

        $this->payload->success = $returnRow["id"];
        $this->sendPayload();
    }

    /**
     * @param $testPlanSprintCaseID
     * @return new status_id
     */
    private function getTotalTestPlanSprintCaseStatus($testPlanSprintCaseID) {

        $testSteps = $this->database->query("select tse2.test_step_id, tse.status_id
           from test_step_execution tse
            inner join (
                select test_step_id, MAX(create_date) as create_date from test_step_execution tse
                where test_plan_sprint_case_id = ?
            group by test_step_id
            ) as tse2
            on tse.create_date = tse2.create_date AND
            tse.test_step_id = tse2.test_step_id
            where tse.test_plan_sprint_case_id = ?", $testPlanSprintCaseID, $testPlanSprintCaseID)
        ->fetchPairs("test_step_id", "status_id");


        $countOfTestSteps = $this->database->table("test_plan_sprint_case")
            ->select("COUNT(test_plan_case.test_case:test_step.id) AS countOfTestSteps")
            ->where("test_plan_sprint_case.id = ?", $testPlanSprintCaseID)
            ->fetch()["countOfTestSteps"];

        $statusID = Functions::getStatusOfTestCase($testSteps, $countOfTestSteps);

        return $statusID;
    }
    
    public function actionGetTestStepHistory($testPlanSprintCaseID, $testStepID) {

        // history statuses
        $args = [
            "test_step_execution.test_plan_sprint_case_id" => $testPlanSprintCaseID,
            "test_step_execution.test_step_id" => $testStepID
        ];
        
        $data = $this->database->table("test_step_execution")
                ->select("creator.name, creator.surname, status_id, :issue.id AS issueId, test_step_execution.create_date")
                ->where($args)
                ->order("create_date DESC")
                ->fetchAll();
        
        $return = [];
        foreach ($data as $row) {
            $return[] = [
                "user" => $row["name"] . " " . $row["surname"],
                "status" => $row["status_id"],
                "issueId" => $row["issueId"],
                "create_date" => $row["create_date"]->format("d.m.Y H:i")
            ];
        }

        // history issues
        $dataissues = $this->database->table("issue")
            ->select("issue.id AS issueId, create_date, creator.name, creator.surname")
            ->where("test_plan_sprint_case_id = ? AND test_step_id = ?", $testPlanSprintCaseID, $testStepID)
            ->fetchAll();

        $returnIssues = [];
        foreach ($dataissues as $iss) {
            $returnIssues[] = [
                "user" => $iss["name"] . " " . $iss["surname"],
                "create_date" => $iss["create_date"]->format("d.m.Y H:i"),
                "issueId" => $iss["issueId"]
            ];
        }

        $this->payload->data = Json::encode($return);
        $this->payload->dataissues = Json::encode($returnIssues);
        $this->sendPayload();
    }
    
    /**
     * Return tested steps to plan sprint with given test case ID
     * @param type $testPlanSprintID
     * @param type $testCaseID
     */
    public function actionGetTestedTestSteps($testPlanSprintCaseID) {
        
        $data = $this->database->query("select tse.id, tse.test_step_id, tse.status_id 
            from test_step_execution tse 
            inner join (
               select MAX(create_date) as create_date from test_step_execution tse
               group by test_step_id
            ) as tse2
            on tse.create_date = tse2.create_date
            where tse.test_plan_sprint_case_id = ?
            group by tse.test_step_id", $testPlanSprintCaseID);
        
        $data = Json::encode(Functions::formatToPairs("test_step_id", "status_id", $data));

        $this->payload->data = $data;
        $this->sendPayload();
    }
    
    public function actionStartTimer($testPlanSprintCaseID, $testerID) {
        
        $data = [
            "starttime" => new DateTime(),
            "endtime" => NULL,
            "creator_id" => $testerID,
            "test_plan_sprint_case_id" => $testPlanSprintCaseID
        ];
        
        $testCaseRun = $this->database->table("test_case_run")->insert($data);
        
        $this->payload->testCaseRunID = $testCaseRun->id;
        $this->sendPayload();
    }
    public function actionStopTimer($testCaseRunID) {
        
        $where = [
            "id" => $testCaseRunID
        ];
        
        $data = [
            "endtime" => new DateTime()
        ];
        
        $this->database->table("test_case_run")->where($where)->update($data);
        $this->sendPayload();
    }
    
    public function actionIsTimerRunning($testPlanSprintCaseID, $testerID) {
        
        $data = [
            "creator_id" => $testerID,
            "test_plan_sprint_case_id" => $testPlanSprintCaseID,
            "endtime" => NULL
        ];
        
        $return = $this->database->table("test_case_run")->where($data)->fetch();
        
        $isRunning = FALSE;
        $testCaseRunID = FALSE;
        $startTime = 0;
        if (!is_bool($return)) {
            $isRunning = TRUE;
            $testCaseRunID = $return["id"];
            $startDate = $return["starttime"];
            $startTime = [
                "Y" => $startDate->format("Y"),
                "m" => $startDate->format("m"),
                "d" => $startDate->format("d"),
                "H" => $startDate->format("H"),
                "i" => $startDate->format("i"),
                "s" => $startDate->format("s"),
            ];
        }

        if ($isRunning) {
            $isRunning = 1;
        } else {
            $isRunning = 0;
        }
        
        $this->payload->testCaseRunID = $testCaseRunID;
        $this->payload->isRunning = $isRunning;
        $this->payload->startTime = $startTime;
        $this->sendPayload();
    }

    public function actionSetForceStatus($testPlanSprintCaseID, $newForceStatus = NULL) {

        $newForceStatus = $newForceStatus == 0 ? NULL: $newForceStatus;
        $data = [
            "forced_status_id" => $newForceStatus
        ];
        $where = [
            "id" => $testPlanSprintCaseID
        ];
        $this->database->table("test_plan_sprint_case")->where($where)->update($data);

        $this->payload->status = 1;
        $this->sendPayload();
    }

    public function actionGetForceStatus($testPlanSprintCaseID) {

        $where = [
            "id" => $testPlanSprintCaseID
        ];
        $forcedStatusID = $this->database->table("test_plan_sprint_case")->where($where)->fetch()["forced_status_id"];

        $forcedStatusID = $forcedStatusID == NULL ? 0: $forcedStatusID;

        $this->payload->forcedStatusID = $forcedStatusID;
        $this->sendPayload();
    }

    public function actionGetIssue($issueId) {

        $data = $this->database->table("issue")
            ->select(
                "issue.name AS issueName, 
                issue.status AS status, 
                issue.description,
                CONCAT(assigned.name, ' ', assigned.surname) AS fullname, 
                issue_type_id, 
                priority_id, 
                issue.create_date, 
                project.name AS projectName, 
                test_plan_sprint.name AS testSprintName, 
                test_plan_sprint.test_plan.name AS testPlanName, 
                test_plan_sprint_case.test_plan_case.test_case.name AS testCaseName, 
                test_plan_sprint_case.test_plan_case.test_case.test_set.name AS testSetName,
                creator.name, creator.surname")
            ->where("issue.id = ?", $issueId)
            ->fetch();

        $attachments = $this->database->table("issue_multimedia")
            ->select("multimedia.id, multimedia.name, multimedia.path")
            ->where("issue.id = ?", $issueId)
            ->fetchPairs("name", "path");

        $comments  = $this->database->table("issue_comment")
            ->select("author.name, author.surname, create_date, description")
            ->where("issue_id = ?", $issueId)
            ->order("issue_comment.create_date ASC")
            ->fetchAll();

        $comments = array_map(function($x) {
            $arr = $x->toArray();
            $arr["create_date"] = $x->create_date->format("d.m.Y H:i");
            return $arr;
        }, $comments);

        $arr = [
            "name" => $data["name"] . " " . $data["surname"],
            "projectName" => $data["projectName"],
            "testSprintName" => $data["testSprintName"],
            "testPlanName" => $data["testPlanName"],
            "testSetName" => $data["testSetName"],
            "testCaseName" => $data["testCaseName"],
            "create_date" => $data["create_date"]->format("d.m.Y H:i"),
            "issue_type_id" => DefaultValues::getIssueTypes()[$data["issue_type_id"]],
            "priority_id" => DefaultValues::getPriorities()[$data["priority_id"]],
            "status" => DefaultValues::getIssueStatuses()[$data["status"]],
            "issueName" => $data["issueName"],
            "description" => $data["description"],
            "attachments" => $attachments,
            "comments" => $comments,
            "fullname" => $data["fullname"]
        ];

        $this->payload->data = Json::encode($arr);
        $this->sendPayload();

    }
    
}