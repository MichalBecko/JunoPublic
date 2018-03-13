<?php
/**
 * Created by PhpStorm.
 * User: Matej
 * Date: 13.2.2018
 * Time: 13:48
 */

namespace ProjectModule\Factories;


use DefaultModule\Factories\TranslatedFormFactory;
use DefaultModule\Services\SimpleEntityService;
use LogModule\Services\LogService;
use Nette\Application\UI\Form;
use PhpOffice\PhpSpreadsheet\IOFactory;
use ProjectModule\Entities\TagTestCase;
use ProjectModule\Entities\TagTestSet;
use ProjectModule\Entities\TestCase;
use ProjectModule\Entities\TestSet;
use ProjectModule\Entities\TestStep;
use UserModule\Services\User;

class ImportTestAnalysesFormFactory {

    /** @var LogService */
    public $logService;

    /** @var User */
    public $user;

    /** @var TranslatedFormFactory */
    public $translatedFormFactory;

    /** @var  SimpleEntityService */
    public $simpleEntityService;

    private $project;

    public $return;

    private $importIterator;

    /**
     * ImportTestAnalysesFormFactory constructor.
     * @param LogService $logService
     * @param User $user
     * @param TranslatedFormFactory $translatedFormFactory
     * @param SimpleEntityService $simpleEntityService
     */
    public function __construct(LogService $logService, User $user, TranslatedFormFactory $translatedFormFactory, SimpleEntityService $simpleEntityService)
    {
        $this->logService = $logService;
        $this->user = $user;
        $this->translatedFormFactory = $translatedFormFactory;
        $this->simpleEntityService = $simpleEntityService;
    }

    public function getForm() {
        $form = $this->translatedFormFactory->create();

        $form->addUpload("file", "Excel .xlsx");

        return $form;
    }

    public function createAddForm($project) {

        $this->project = $project;

        $form = $this->getForm();
        $form->addSubmit("submit", "");
        $form->onSuccess[] = [$this, "add"];

        return $form;
    }

    public function add(Form $form) {
        $v = $form->getValues(TRUE);

        $excel = IOFactory::load($v["file"]);
        $excel->setActiveSheetIndex(0);

        $datas = $excel->getActiveSheet()->toArray();

        $testSet = false;
        $lastUsedTestCase = false;
        $userEntity = $this->user->getEntity();

        $this->simpleEntityService->getEm()->getConnection()->beginTransaction();
        try {

            foreach ($datas as $iterator => $data) {

                $this->checkData($data);

                // we skip first row which always has header
                if ($iterator == 0) continue;
                $this->importIterator = $iterator;

                // if it is Test Set we are creating new one
                if ($this->isTestSet($data)) {

                    // we have a new test set, we have to check if we already have one in buffer
                    if ($testSet instanceof TestSet) {
                        $this->simpleEntityService->insert($testSet);
                        $testSet = false;
                        $lastUsedTestCase = false;
                    }

                    $testSet = new TestSet();
                    $testSet->name = $this->hasGoodLength($data[0]);
                    $testSet->creator = $userEntity;
                    $testSet->project = $this->project;

                    // TAGS
                    $tags = explode(",", $this->hasGoodLength($data[1]));
                    foreach ($tags as $tagString) {
                        $tag = new TagTestSet();
                        $tag->testSet = $testSet;
                        $tag->name = trim($tagString);

                        $testSet->addTag($tag);
                    }
                    continue;
                }

                // if it is Test Case we are creating a new one and attaching to test set
                if ($this->isTestCase($data)) {

                    $testCase = new TestCase();
                    $testCase->name = $this->hasGoodLength($data[2]);
                    $testCase->testSet = $testSet;
                    $testCase->creator = $userEntity;
                    $testCase->priority = 1;
                    $testCase->approved = 0;

                    $lastUsedTestCase = $testCase;
                    $testSet->getTestCases()->add($testCase);

                    // TAGS
                    $tags = explode(",", $this->hasGoodLength($data[3]));
                    foreach ($tags as $tagString) {
                        $tag = new TagTestCase();
                        $tag->testCase = $testCase;
                        $tag->name = trim($tagString);

                        $testCase->addTag($tag);
                    }
                    continue;
                }

                //if it is Test Step we are creating a new one and attaching to test case
                if ($this->isTestStep($data)) {
                    $testStep = new TestStep();
                    $testStep->precondition = $data[5];
                    $testStep->expectedResult = $data[6];
                    $testStep->testCase = $lastUsedTestCase;
                    $testStep->creator = $userEntity;

                    $lastUsedTestCase->getTestSteps()->add($testStep);
                    continue;
                }


            }

            $this->simpleEntityService->insert($testSet);

            $this->simpleEntityService->getEm()->getConnection()->commit();
            $this->return = true;
        } catch(\Exception $e) {
            $this->simpleEntityService->getEm()->getConnection()->rollBack();
            $this->return = $e->getMessage();
        }

    }

    /** Is $data from excel meaned as TEST SET? */
    private function isTestSet($data) {

        if ($this->isFilled($data[0])) {

            // here we perform check
            $this->ifFilledKeysThrowException([2,3,4,5,6], $data);

            return true;
        } else {
            return false;
        }

    }

    /** Is $data from excel meaned as TEST CASE? */
    private function isTestCase($data) {

        if ($this->isFilled($data[2])) {

            // here we perform check
            $this->ifFilledKeysThrowException([0,1,4,5,6], $data);

            return true;
        } else {
            return false;
        }

    }

    /** Is $data from excel meaned as TEST STEP? */
    private function isTestStep($data) {

        if ($this->isFilled($data[5]) || $this->isFilled($data[6])) {

            // here we perform check
            $this->ifFilledKeysThrowException([0,1,2,3], $data);

            return true;
        } else {
            return false;
        }

    }


    /**
     * This function checks if string was filled and is not X
     * @param $str
     * @return bool
     */
    private function isFilled($str) {
        if ($str != "X" && strlen($str) > 0) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * If data with given key is filled, we throw exception
     * @param $arr
     * @param $data
     * @throws \Exception
     */
    private function ifFilledKeysThrowException($arr, $data) {

        foreach ($arr as $i) {
            if ($this->isFilled($data[$i])) {
                $realIterator = $this->importIterator + 1;
                throw new \Exception("Logická chyba na riadku $realIterator.");
            }
        }

    }

    /**
     * This functions checks if string has good length
     * @param $str
     * @return mixed
     * @throws \Exception
     */
    private function hasGoodLength($str) {

        if (strlen(trim($str)) < 1 || strlen(trim($str)) > 80) {
            $realIterator = $this->importIterator + 1;
            throw new \Exception("Na riadku $realIterator nastala validačná chyba. Reťazec musí byť v rozsahu od 1 do 80 znakov. 
            Tam kde text nepatrí, vložte písmeno 'X'");
        }

        return $str;
    }

    /**
     * We check if it has at least 6 indexes
     * @param $data
     */
    private function checkData(&$data) {

        if (!array_key_exists(6, $data)) {
            $realIterator = $this->importIterator + 1;
            throw new \Exception("Na riadku $realIterator nastala chyba. Každý riadok musí mať presne 7 stĺpcov.");
        }

    }

}
