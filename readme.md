# Autotests for www.if.lv test automation position home task

Simple project for testing www.if.lv web pages

For testing was used "Codeception" library, with acceptance suite 
See table for more details: (https://codeception.com/docs/01-Introduction)

# Table of Contents

- [Installation](#installation)
- [Basic Usage](#basic-usage)
- [Gherkin BDD commands](#gherkin-commands)

## Installation

```sh
- git clone https://github.com/NailKarimov/medium-testing.git
- cd medium-testing
- composer install
- ./vendor/bin/codecept bootstrap
- ./vendor/bin/codecept build
- ./vendor/bin/codecept generate:test functional simpleTestForIF
```

If you will use Selenium, you need to download it and run (for Mac can use "https://brew.sh/index_ru""):

```sh
- /usr/bin/ruby -e "$(curl -fsSL https://raw.githubusercontent.com/Homebrew/install/master/install)"
- brew install selenium-server-standalone
- selenium-server -port 4444
```

For Windows, use together with Node.js
```sh
- npm install selenium-standalone --save-dev
- npx selenium-standalone install && npx selenium-standalone start
```

## Basic Usage

### `Run all tests with next comand`

```sh 
./vendor/bin/codecept run --html --xml
```
Output result:

    Powered by PHPUnit 9.6.4 by Sebastian Bergmann and contributors.

    Acceptance Tests (1) -------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
    Recorder is disabled, no available modules
    x IfTaskScenarioOneCest: Test some pages and links for if.lv (1.68s)
    ----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------

    Functional Tests (3) -------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
    ⏺ Recording ⏺ step-by-step screenshots will be saved to C:\Users\karim\PhpstormProjects\IfInsuranceTask\tests/_output</info>
    Directory Format: record_640a627566e55_{filename}_{testname} ----
    x IfTaskScenarioOneCest: Test vacancy page and try to find "Quality Assurance/Test Automation Specialist" (11.34s)
    + IfTaskScenarioTwoCest: Will change search filter and try to find "Quality Assurance" (8.85s)
      x SearchInVacancies: try SearchInVacancies (6.96s)
    ----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
    ⏺ Records saved into: file://C:\Users\karim\PhpstormProjects\IfInsuranceTask\tests/_output\records.html

    Unit Tests (0) -------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
    Recorder is disabled, no available modules
    ----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------


    Time: 00:36.400, Memory: 20.00 MB

### `Run separate test:`

```sh 
./vendor/bin/codecept run functional .\tests\functional\IfTaskScenarioOneCest.php --html --steps
```
### `In case in do not nessasry to use JS, faster to run test using Php Brouser:`

```sh 
./vendor/bin/codecept run acceptance .\tests\acceptance\IfTaskScenarioOneCest.php --html --stepss
```
Output result:

    Acceptance Tests (1) -------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
    Recorder is disabled, no available modules
    IfTaskScenarioOneCest: Test some pages and links for if.lv
    Signature: acceptance\IfTaskScenarioOneCest:simpleTestForIF
    Test: tests\acceptance\IfTaskScenarioOneCest.php:simpleTestForIF
    Scenario --
    I am on url "https://if.lv"
    I see page has element "//*[@id="onetrust-policy-title"]"
    I see element "//*[@id="onetrust-policy-title"]"
    I click "//*[@title="Par If"]"
    I click "//*[@title="Darbs If"]"
    I click "//*[@id="hero"]/div/div[1]/a"
    I see "Quality Assurance"
    I click "//span[contains(text(), "Quality Assurance Specialist")]/../self::li[1]/a"
    I see "Quality Assurance/Test Automation Specialist","h1"
    FAIL

    ----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------

    Time: 00:01.849, Memory: 12.00 MB


## Gherkin BDD commands


Read article: "https://habr.com/ru/post/427031/" for more detailes


### `Try to run scenario via gherkin`
We have simple scenario:

    Feature: SearchInVacancies
    In order to search open Vacancy for Quality Assurance Specialist
    As a simple user
    I need to open website

    Scenario: try SearchInVacancies
    Given Open "https://if.lv" web page
    And Accept cookies
    When Navigate to first "Par If" link
    And Navigate to second "Darbs If" link
    When Navigate to vacancies "Vakances" link
    When Click the button that would lead to "Quality Assurance/Test Automation Specialist"
        
Let us try to run this scenario: 

```sh 
./vendor/bin/codecept run functional .\tests\functional\SearchVacancies.feature --steps --html --xml
```

    Functional Tests (1) -------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
    ⏺ Recording ⏺ step-by-step screenshots will be saved to C:\Users\karim\PhpstormProjects\IfInsuranceTask\tests/_output</info>
    Directory Format: record_640a69953bc50_{filename}_{testname} ----
    SearchInVacancies: try SearchInVacancies
    Signature: SearchVacancies:try SearchInVacancies
    Test: tests\functional\SearchVacancies.feature:try SearchInVacancies
    Scenario --
    In order to search open Vacancy for Quality Assurance Specialist
    As a simple user
    I need to open website
    Given open "https://if.lv" web page
    I am on url "https://if.lv"
    I wait for element "//*[@id="main-navigation"]/li[1]/a",10
    And accept cookies
    I see element "//*[@id="onetrust-policy-title"]"
    I click "//*[@id="onetrust-accept-btn-handler"]"
    When navigate to first "par if" link
    I scroll to "//*[@title="Par If"]"
    I wait for element clickable "//*[@title="Par If"]",10
    I click "//*[@title="Par If"]"
    And navigate to second "darbs if" link
    I wait for element "//*[@id="main-navigation"]/li[1]/a",10
    I scroll to "//*[@title="Darbs If"]"
    I wait for element clickable "//*[@title="Darbs If"]",10
    I click "//*[@title="Darbs If"]"
    When navigate to vacancies "vakances" link
    I wait for element "//*[@id="main-navigation"]/li[1]/a",10
    I click "//*[@id="hero"]/div/div[1]/a"
    I wait for element "//*[@id="main-navigation"]/li[1]/a",10
    When click the button that would lead to "quality assurance/test automation specialist"
    I see "Quality Assurance/Test Automation Specialist","h1"
    FAIL

