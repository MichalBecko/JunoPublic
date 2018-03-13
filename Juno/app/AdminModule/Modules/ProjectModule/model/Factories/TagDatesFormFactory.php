<?php

namespace ProjectModule\Factories;

use DefaultModule\Factories\DynamicFormFactory;
use DefaultModule\Factories\TranslatedFormFactory;
use Nette\DateTime;
use ProjectModule\Services\TagTestCaseService;
use ProjectModule\Services\TestPlanSprintService;

class TagDatesFormFactory extends DynamicFormFactory {

    /** @var  TagTestCaseService $tagTestCaseService */
    private $tagTestCaseService;

    /** @var  TranslatedFormFactory $translatedFormFactory */
    private $translatedFormFactory;

    /** @var TestPlanSprintService $testPlanSprintService */
    private $testPlanSprintService;

    private $tagId;

    public function __construct(TranslatedFormFactory $translatedFormFactory, TagTestCaseService $tagTestCaseService, TestPlanSprintService $testPlanSprintService)
    {
        $this->tagTestCaseService = $tagTestCaseService;
        $this->translatedFormFactory = $translatedFormFactory;
        $this->testPlanSprintService = $testPlanSprintService;
    }

    public function createTagDatesForm($tagId, $testSprintID) {
        $this->tagId = $tagId;
        $form = $this->translatedFormFactory->create();

        $tag = $this->tagTestCaseService->getById($this->tagId);

        $testSprint = $this->testPlanSprintService->getById($testSprintID);

        $form->addText("dateFrom", "Datum od:")
            ->setDefaultValue($tag->getTagOrSprintStartDate($testSprint->getStartDate())->format("d.m.Y"));

        $form->addText("dateTo", "Datum do:")
            ->setDefaultValue($tag->getTagOrSprintEndDate($testSprint->getEndDate())->format("d.m.Y"));

        $form->addSubmit("send", "Přidat do košíku");
        $form->onSuccess[] = [$this, "processTagDateForm"];

        return $form;
    }

    public function processTagDateForm($form) {
        $values = $form->getValues();

        $tagTestCase = $this->tagTestCaseService->getById($this->tagId);
        $tagTestCase->setStartDate(DateTime::createFromFormat("d.m.Y", $values->dateFrom));
        $tagTestCase->setEndDate(DateTime::createFromFormat("d.m.Y", $values->dateTo));

        $this->tagTestCaseService->insert($tagTestCase);
    }

}
