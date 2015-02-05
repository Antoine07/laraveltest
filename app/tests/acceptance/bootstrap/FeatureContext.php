<?php

use Behat\Behat\Context\ClosuredContextInterface,
    Behat\Behat\Context\TranslatedContextInterface,
    Behat\Behat\Context\BehatContext,
    Behat\Behat\Tester\Exception\PendingException;

use Behat\Gherkin\Node\PyStringNode,
    Behat\Gherkin\Node\TableNode;

use Behat\Behat\Context\SnippetAcceptingContext;

use Behat\MinkExtension\Context\MinkContext;

use Behat\Behat\Definition\Call;

use Behat\Testwork\Hook\Scope\BeforeSuiteScope;
use Behat\Behat\Hook\Scope\AfterScenarioScope;


/**
 * Features context.
 */
class FeatureContext extends MinkContext implements SnippetAcceptingContext
{

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
        Artisan::call('db:seed');
    }

    /**
     * @Given /^there are no aperos$/
     */
    public function thereAreNoPosts()
    {
        Post::truncate();
    }

    /**
     * @AfterScenario @database
     */
    public function cleanDB(ScenarioEvent $event)
    {
        Post::truncate();
    }


    /**
     * @assert by Antoine and Theo 2015
     */
    public function assertHomepage()
    {

        $url = trim($this->locatePath('/'), '/');
        $currentUrl = $this->getSession()->getCurrentUrl();

        if($url != $currentUrl)
        {
            throw new Exception(
                sprintf("this url %s doesn't match with this one %s",
                    $url,
                    $currentUrl
                    )
            );
        }

    }

}