<?php

namespace functional;

use FunctionalTester;
use PageObject\IfLvDarbIf;
use PageObject\IfLvHomePage;
use PageObject\IfLvParIf;
use PageObject\IfLvVacancies;

/**
 * Class IfTaskScenarioOneCest
 * @package Tests\Functional
 */
class IfTaskScenarioOneCest
{
    /**
     * @param FunctionalTester $I
     * @return void
     * @throws \Exception
     */
    public function _before(FunctionalTester $I)
    {

        $I->amOnUrl('https://if.lv');
        $I->waitForElement(IfLvHomePage::PAGE_LOGO, 10); // secs
        if ($I->seePageHasElement(IfLvHomePage::COOKIE_MESSAGE)) {
            $I->click(IfLvHomePage::COOKIE_MESSAGE_CLOSE);
        }
        $I->setCookie('qa-mode', 'true');
    }

    /**
     * @param FunctionalTester $I
     * @return void
     * @throws \Exception
     */
    public function simpleTestForIF(\FunctionalTester $I)
    {
        $I->wantTo('Test vacancy page and try to find "Quality Assurance/Test Automation Specialist"');

        $I->scrollTo(IfLvHomePage::PAR_IF_LINK);
        $I->waitForElementClickable(IfLvHomePage::PAR_IF_LINK, 10);
        $I->click(IfLvHomePage::PAR_IF_LINK);

        $I->waitForElement(IfLvParIf::PAGE_LOGO, 10); // secs
        $I->scrollTo(IfLvParIf::WORKS_IF_LINK);
        $I->waitForElementClickable(IfLvParIf::WORKS_IF_LINK, 10);
        $I->click(IfLvParIf::WORKS_IF_LINK);

        $I->waitForElement(IfLvDarbIf::PAGE_LOGO, 10); // secs
        $I->click(IfLvDarbIf::VACANCIES_WORKS_IF_LINK);
        $I->waitForElement(IfLvDarbIf::PAGE_LOGO, 10); // secs

        $I->see('Quality Assurance');
        $I->scrollTo(IfLvVacancies::QA_SECTION);
        $I->click(IfLvVacancies::QA_READ_MORE);
        $I->waitForElement(IfLvVacancies::PAGE_LOGO, 10); // secs

        $I->see('Quality Assurance/Test Automation Specialist', 'h1');

    }
}

