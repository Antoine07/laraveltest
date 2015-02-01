Feature: Aperitif techno
  In order to track my visitor
  As the site owner
  I want to give users the lovely message to aperitif techno

Scenario: Post fills out post form
  Given there are no posts
  And I am on "posts/create"
  And I fill in "title" with "Aperitif Laravel 5"
  And I fill in "content" with "A news features of Laravel 5"
  And I fill in "status" with "publish"
  And I press "submit"
  Then I should see "Your post has been created"

Scenario: Post same different think
  Given there are no posts
  And I am on "posts/create"
  And I fill out the title aperitif
  Then I should see "A new Aperitif"
  And I should see "It is a very nice talk about Laravel 5"

Scenario: A bad post title
  Given I am on "posts/create"
  And I fill bad title aperitif
  Then I should see "Please fill out both inputs"
