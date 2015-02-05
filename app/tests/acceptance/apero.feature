@core
Feature: Aperos create

  The user is logged and admin a apero

  Scenario: Create aperos if you are logged
    Given I am on "login"
    When I fill in the following:
      | username | Antoine |
      | password | Antoine |
    When I press "login"
    Then I should be on "aperos/create"
    When I fill in the following:
      | title    | behat and laravel 5       |
      | date     | 10.2.2015                 |
      | content  | laravel apero             |
      | tag_id   | 1                         |
    When I press "submit"
    Then I should be on the homepage
    Then I should see "Welcome to the home page aperos"

