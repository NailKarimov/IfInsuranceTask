<?php

namespace Behat\Behat\Context {
    interface Context {}
}

namespace {

    use PageObject\IfLvDarbIf;
    use PageObject\IfLvHomePage;
    use PageObject\IfLvParIf;
    use PHPUnit\Framework\Exception;
    use Codeception\Actor;

    /**
     * Inherited Methods
     * @method void wantToTest($text)
     * @method void wantTo($text)
     * @method void execute($callable)
     * @method void expectTo($prediction)
     * @method void expect($prediction)
     * @method void amGoingTo($argumentation)
     * @method void am($role)
     * @method void lookForwardTo($achieveValue)
     * @method void comment($description)
     * @method void pause()
     *
     * @SuppressWarnings(PHPMD)
     */
    class FunctionalTester extends Actor implements \Behat\Behat\Context\Context
    {
        use _generated\FunctionalTesterActions;

        /**
         * Define custom actions here
         */

        public function seePageHasElement($element)
        {
            try {
                $this->seeElement($element) ;
            } catch (Exception $f) {
                return false;
            }
            return true;
        }
        /**
         * Define custom actions here
         */

        public function clickToLinkWithText($element)
        {
            try {
                $this->click('//*[@title="'.$element.'"]');
            } catch (Exception $f) {
                return false;
            }
            return true;
        }

        /**
         * @When Open :arg1 web page
         * @throws \Exception
         */
        public function IfHomePage($arg1)
        {
            $I = $this;
            $I->amOnUrl($arg1);
            $I->waitForElement(IfLvHomePage::PAGE_LOGO, 10);
        }

        /**
         * @Given Accept cookies
         */
        public function acceptCookies()
        {
            $I = $this;
            if ($I->seePageHasElement(IfLvHomePage::COOKIE_MESSAGE)) {
                $I->click(IfLvHomePage::COOKIE_MESSAGE_CLOSE);
            }
        }

        /**
         * @When Navigate to first :arg1 link
         * @throws \Exception
         */
        public function navigateToFirstLink($arg1)
        {
            $I = $this;
            $I->scrollTo(IfLvHomePage::PAR_IF_LINK);
            $I->waitForElementClickable(IfLvHomePage::PAR_IF_LINK, 10);
            $I->clickToLinkWithText($arg1);
        }

        /**
         * @When Navigate to second :arg1 link
         * @throws \Exception
         */
        public function navigateToSecondLink($arg1)
        {
            $I = $this;
            $I->waitForElement(IfLvParIf::PAGE_LOGO, 10); // secs
            $I->scrollTo(IfLvParIf::WORKS_IF_LINK);
            $I->waitForElementClickable(IfLvParIf::WORKS_IF_LINK, 10);
            $I->clickToLinkWithText($arg1);
        }
        /**
         * @When Navigate to vacancies :arg1 link
         * @throws \Exception
         */
        public function navigateToVacanciesLink($arg1)
        {
            $I = $this;
            $I->waitForElement(IfLvDarbIf::PAGE_LOGO, 10); // secs
            $I->click(IfLvDarbIf::VACANCIES_WORKS_IF_LINK);
            $I->waitForElement(IfLvDarbIf::PAGE_LOGO, 10); // secs
        }
        /**
         * @When Click the button that would lead to :arg1
         */
        public function clickTheButtonThatWouldLeadTo($arg1)
        {
            $I = $this;
            $I->see($arg1, 'h1');
        }
    }
}
