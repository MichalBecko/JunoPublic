<?php

namespace ProjectModule\Extension;

use DefaultModuleModule\Extension\DefaultModuleExtension;

/**
 * Description of ProjectExtension
 *
 * @author Vladimír Vráb <www.artexe.sk>
 */
class ProjectExtension extends DefaultModuleExtension {

    public function loadConfiguration() {
        $this->appendRouteList('Admin:Project', '[<locale=sk sk|en>/]admin/project/<presenter>/<action>/<projectID>/<testSprintID>', 'TestExecution:testSprint');
        $this->appendRouteList('Admin:Project', '[<locale=sk sk|en>/]admin/project/<presenter>/<action>/<projectID>', 'Dashboard:default');

        parent::loadConfiguration();
        $builder = $this->getContainerBuilder();
        
        $builder->addDefinition($this->prefix('IRoleSettingsControlFactory'))
                ->setImplement('ProjectModule\Interfaces\IRoleSettingsControlFactory');

        $builder->addDefinition($this->prefix('RoleFormFactory'))
                ->setClass('ProjectModule\Factories\RoleFormFactory');
        
        $builder->addDefinition($this->prefix('projectFormFactory'))
                ->setClass('ProjectModule\Factories\ProjectFormFactory');
        
        $builder->addDefinition($this->prefix('testSetFormFactory'))
                ->setClass('ProjectModule\Factories\TestSetFormFactory');

        $builder->addDefinition($this->prefix('projectRepository'))
                ->setClass('ProjectModule\Repositories\ProjectRepository');
        
        $builder->addDefinition($this->prefix('projectService'))
                ->setClass('ProjectModule\Services\ProjectService');
        
        $builder->addDefinition($this->prefix('TestSetRepository'))
                ->setClass('ProjectModule\Repositories\TestSetRepository');
        
        $builder->addDefinition($this->prefix('TestSetService'))
                ->setClass('ProjectModule\Services\TestSetService');
        
        $builder->addDefinition($this->prefix('TestCaseRepository'))
                ->setClass('ProjectModule\Repositories\TestCaseRepository');
        
        $builder->addDefinition($this->prefix('TestCaseService'))
                ->setClass('ProjectModule\Services\TestCaseService');
        
        $builder->addDefinition($this->prefix('testCaseFormFactory'))
                ->setClass('ProjectModule\Factories\TestCaseFormFactory');
        
        $builder->addDefinition($this->prefix('TestPlanRepository'))
                ->setClass('ProjectModule\Repositories\TestPlanRepository');
        
        $builder->addDefinition($this->prefix('TestPlanService'))
                ->setClass('ProjectModule\Services\TestPlanService');
        
        $builder->addDefinition($this->prefix('TestPlanFormFactory'))
                ->setClass('ProjectModule\Factories\TestPlanFormFactory');
        
        $builder->addDefinition($this->prefix('TestPlanSprintRepository'))
                ->setClass('ProjectModule\Repositories\TestPlanSprintRepository');
        
        $builder->addDefinition($this->prefix('TestPlanSprintService'))
                ->setClass('ProjectModule\Services\TestPlanSprintService');
        
        $builder->addDefinition($this->prefix('TestPlanSprintFormFactory'))
                ->setClass('ProjectModule\Factories\TestPlanSprintFormFactory');
        
        $builder->addDefinition($this->prefix('ProjectRoleRepository'))
                ->setClass('ProjectModule\Repositories\ProjectRoleRepository');
        
        $builder->addDefinition($this->prefix('ProjectRoleService'))
                ->setClass('ProjectModule\Services\ProjectRoleService');
        
        $builder->addDefinition($this->prefix('TestPlanSprintRoleFormFactory'))
                ->setClass('ProjectModule\Factories\TestPlanSprintRoleFormFactory');
        
        $builder->addDefinition($this->prefix('TestPlanSprintCaseRepository'))
                ->setClass('ProjectModule\Repositories\TestPlanSprintCaseRepository');
        
        $builder->addDefinition($this->prefix('TestPlanSprintCaseService'))
                ->setClass('ProjectModule\Services\TestPlanSprintCaseService');

        $builder->addDefinition($this->prefix('IssueFormFactory'))
            ->setClass('ProjectModule\Factories\IssueFormFactory');

        $builder->addDefinition($this->prefix('ImportTestAnalysesFormFactory'))
            ->setClass('ProjectModule\Factories\ImportTestAnalysesFormFactory');

        $builder->addDefinition($this->prefix('TagTestCaseRepository'))
            ->setClass('ProjectModule\Repositories\TagTestCaseRepository');

        $builder->addDefinition($this->prefix('TagTestCaseService'))
            ->setClass('ProjectModule\Services\TagTestCaseService');

        $builder->addDefinition($this->prefix('TagDatesFormFactory'))
            ->setClass('ProjectModule\Factories\TagDatesFormFactory');

        $builder->addDefinition($this->prefix('IssueCommentFormFactory'))
            ->setClass('ProjectModule\Factories\IssueCommentFormFactory');
        
        
//        $builder->addDefinition($this->prefix('ProjectRoleFormFactory'))
//                ->setClass('ProjectModule\Factories\ProjectRoleFormFactory');
    }

}
