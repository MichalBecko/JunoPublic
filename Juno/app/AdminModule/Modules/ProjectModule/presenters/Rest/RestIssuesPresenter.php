<?php
/**
 * Created by PhpStorm.
 * User: Matej
 * Date: 6.2.2018
 * Time: 9:34
 */

namespace ProjectModule\Presenters;


use Nette\Application\UI\Presenter;
use Nette\Database\Context;
use Nette\Utils\Json;

class RestIssuesPresenter extends Presenter
{

    /** @var Context @inject */
    public $database;

    public function actionGetTestSprints($testPlanID) {

        $testSprints = $this->database->table("test_plan_sprint")
            ->select("test_plan_sprint.id AS test_plan_sprint_id, test_plan_sprint.name")
            ->where("test_plan_id = ?", $testPlanID)
            ->fetchPairs("test_plan_sprint_id", "name");

        $json = Json::encode($testSprints);
        $this->payload->result = $json;
        $this->sendPayload();
    }

    public function actionGetTestSets($testSprintID) {

        $testSets = $this->database->table("test_set")
            ->select("test_set.id, test_set.name")
            ->where(":test_case:test_plan_case.test_plan:test_plan_sprint.id = ?", $testSprintID)
            ->fetchPairs("id", "name");

        $json = Json::encode($testSets);
        $this->payload->result = $json;
        $this->sendPayload();
    }

    public function actionGetTestCases($testSetID, $testSprintID) {

        $testCases = $this->database->table("test_case")
            ->select("test_case.id, test_case.name")
            ->where("test_case.test_set_id = ? AND :test_plan_case.test_plan:test_plan_sprint.id = ?", $testSetID, $testSprintID)
            ->fetchPairs("id", "name");

        $json = Json::encode($testCases);
        $this->payload->result = $json;
        $this->sendPayload();
    }

    public function actionGetTestSteps($testCaseID) {

        $testSteps = $this->database->table("test_step")
            ->select("id, precondition")
            ->where("test_case_id", $testCaseID)
            ->fetchPairs("id", "precondition");

        $json = Json::encode($testSteps);
        $this->payload->result = $json;
        $this->sendPayload();
    }

    public function actionAddIssueComment($issueId, $userId, $description) {

        $data = [
            "issue_id" => $issueId,
            "author_id" => $userId,
            "description" => $description
        ];

        $testSteps = $this->database->table("issue_comment")->insert($data);

        $json = Json::encode($testSteps);
        $this->payload->result = $json;
        $this->sendPayload();

    }

}