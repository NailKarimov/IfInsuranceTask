<?php

namespace acceptance;

use AcceptanceTester;
use PageObject\IfLvVacancies;
use PageObject\IfLvDarbIf;
use PageObject\IfLvHomePage;
use PageObject\IfLvParIf;

class IfTaskScenarioOneCest
{
    /**
     * @param \AcceptanceTester $I
     * @return void
     * @throws \Exception
     */
    public function _before(AcceptanceTester $I)
    {
        $I->amOnUrl('https://if.lv');
        if ($I->seePageHasElement(IfLvHomePage::COOKIE_MESSAGE)) {
            $I->click(IfLvHomePage::COOKIE_MESSAGE_CLOSE);
        }
    }

    /**
     * @param AcceptanceTester $I
     * @return void
     * @throws \Exception
     */
    public function simpleTestForIF(\AcceptanceTester $I)
    {
        $I->wantTo('Test some pages and links for if.lv');

        $I->click(IfLvHomePage::PAR_IF_LINK);
        $I->click(IfLvParIf::WORKS_IF_LINK);
        $I->click(IfLvDarbIf::VACANCIES_WORKS_IF_LINK);

        $I->see('Quality Assurance');
        $I->click(IfLvVacancies::QA_READ_MORE);

        $I->see('Quality Assurance/Test Automation Specialist', 'h1');
    }
}

