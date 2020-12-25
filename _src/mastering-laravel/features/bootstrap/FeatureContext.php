<?php

use Behat\Behat\Context\Context;
use Behat\Behat\Context\SnippetAcceptingContext;
use Behat\Gherkin\Node\PyStringNode;
use Behat\Gherkin\Node\TableNode;
use Behat\MinkExtension\Context\MinkContext;
use Behat\Testwork\Hook\Scope\BeforeSuiteScope;
use Behat\Testwork\Hook\Scope\AfterSuiteScope;
use GuzzleHttp\Client;

/**
 * Defines application features from the specific context.
 */
class FeatureContext extends MinkContext implements Context, SnippetAcceptingContext
{
    /**
     * Initializes context.
     *
     * Every scenario gets its own context instance.
     * You can also pass arbitrary arguments to the
     * context constructor through behat.yml.
     */
    protected $httpClient;

    public function __construct()
    {
        $this->httpClient = new Client();
    }
    /**
     * @BeforeSuite
     */
    public static function prepare(BeforeSuiteScope $scope)
    {
        Artisan::call('migrate');
        Artisan::call('db:seed');

    }

    /**
     * @When I create a reservation
     */
    public function iCreateAReservation()
    {
       $request = $this->httpClient->post('http://laravel.example/reservations',['body'=> ['start_date'=>'2015-04-01','end_date'=>'2015-04-04','rooms[]'=>'100']]);
        if ((int)$request->getStatusCode()!==201)
        {
            throw new Exception('A successfully created status code must be returned');
        }
    }

    /**
     * @Then I should have one reservation
     */
    public function iShouldHaveOneReservation()
    {
        $request = $this->httpClient->get('http://laravel.example/reservations');
        $arr = json_decode($request->getBody());
        if (count($arr)!==1)
        {
            throw new Exception('there must be exactly one reservation');
        }
    }

    /**
     * @AfterSuite
     */
    public static function cleanup(AfterSuiteScope $scope)
    {
        Artisan::call('migrate:rollback');
    }
}
