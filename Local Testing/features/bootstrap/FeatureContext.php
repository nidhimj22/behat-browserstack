<?php

require "vendor/autoload.php";

use Behat\Behat\Context\BehatContext,
  Behat\Behat\Exception\PendingException;
use Behat\Gherkin\Node\PyStringNode,
    Behat\Gherkin\Node\TableNode;
use BrowserStack\Local;

class FeatureContext extends BehatContext {
  private $webDriver;
  private $BROWSER_NAME = 'firefox';
  private $OS = 'Windows';
  private $OS_VERSION = '7';
  private $BROWSER_VERSION = '23.0';
  private $USERNAME = 'nidhimakhijani2'; // Set your username
  private $BROWSERSTACK_KEY = 'x2dVzTawvWubzViWhfAy'; // Set your browserstack_key
  private $tunnel = 'false';

  public function __construct(array $parameters){
    $this->tunnel = $parameters['tunnel'];
    print "hello";
    $bs_local = new Local();
    $bs_local_args = array("key" => "x2dVzTawvWubzViWhfAy", "v" => true);
    $bs_local->start(bs_local_args);
    print "hello";
  }

  /** @Given /^I am on "([^"]*)"$/ */
  public function iAmOnSite($url) {
    print("HHHHHHH >" . $this->tunnel);
    $desiredCap =  array('browser'=> $this->BROWSER_NAME, 'browser_version'=> $this->BROWSER_VERSION, 'os' => $this->OS, 'os_version' => $this->OS_VERSION, 'browserstack.tunnel' => $this->tunnel);
    $this->webDriver = RemoteWebDriver::create("http://".$this->USERNAME.":".$this->BROWSERSTACK_KEY."@hub.browserstack.com/wd/hub", $desiredCap);
    $this->webDriver->get($url);
  }

}
