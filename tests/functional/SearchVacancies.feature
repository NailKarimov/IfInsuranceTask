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


