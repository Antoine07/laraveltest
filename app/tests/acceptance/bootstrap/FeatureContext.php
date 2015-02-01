<?php

use Behat\Behat\Context\ClosuredContextInterface,
    Behat\Behat\Context\TranslatedContextInterface,
    Behat\Behat\Context\BehatContext,
    Behat\Behat\Exception\PendingException;
use Behat\Gherkin\Node\PyStringNode,
    Behat\Gherkin\Node\TableNode;

use \Behat\MinkExtension\Context\MinkContext;


//
// Require 3rd-party libraries here:
//
//   require_once 'PHPUnit/Autoload.php';
//   require_once 'PHPUnit/Framework/Assert/Functions.php';
//

/**
 * Features context.
 */
class FeatureContext extends MinkContext
{
    /**
     * Initializes context.
     * Every scenario gets its own context object.
     *
     * @param array $parameters context parameters (set them up through behat.yml)
     */
    public function __construct(array $parameters)
    {
        // Initialize your context here
    }

    /**
     * @static
     *
     * @beforeSuite
     */
    public static function bootstrapLaravel()
    {
        $unitTesting = true;

        $testEnvironment = 'testing';

        $app = require __DIR__ . '/../../../../bootstrap/start.php';
        $app->boot();
        Artisan::call('migrate');
    }

    /**
     * @Given /^I fill out the title aperitif$/
     */
    public function iFillOutTheTitleAperitif($name = 'A new Aperitif', $content = 'It is a very nice talk about Laravel 5')
    {
        $this->fillField('title', $name);
        $this->fillField('content', $content);
        $this->pressButton('submit');
    }

    /**
     * @Given /^I fill bad title aperitif$/
     */
    public function iFillBadTitleAperitif()
    {
        $this->iFillOutTheTitleAperitif('a title', '');

    }

    /**
     * @Given /^there are no posts$/
     */
    public function thereAreNoPosts()
    {

        Post::truncate();
    }


}
