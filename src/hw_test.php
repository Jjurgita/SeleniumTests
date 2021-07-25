<?php

include '../vendor/autoload.php';

use Facebook\WebDriver\Remote\DesiredCapabilities;
use Facebook\WebDriver\Remote\RemoteWebDriver;
use Facebook\WebDriver\WebDriverBy;

// // START
// $handle = popen('../webdrivers/chromedriver --port=4444', 'r');

// Chromedriver (if started using --port=4444 as above)
$serverUrl = 'http://localhost:4444';
echo "00000000";

// GIVEN
// Chrome
$driver = RemoteWebDriver::create($serverUrl, DesiredCapabilities::chrome());
// Go to URL
echo "1111111111";
$driver->get('https://en.wikipedia.org/wiki/Selenium_(software)');
echo "22222222";

// WHEN:: 'PHP' in the search box and submit was pressed
$driver->findElement(WebDriverBy::id('searchInput')) // find search input element
    ->sendKeys('PHP') // fill the search box
    ->submit(); // submit the whole form

// THEN
// print title of the current page to output
//echo "The title is '" . $driver->getTitle() . "'\n";
sleep(3);
// sleep(2); // this is where the testcase logic would be

// close the browser
$driver->quit();

// sleep(2);
// print(pclose($handle)); // this does not work as is, Powershell wrapper would be a good solution