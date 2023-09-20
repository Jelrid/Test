<?php
require_once 'MyClassTest.php';

class MySuite extends PHPUnit_Framework_TestSuite {

    protected $sharedFixture;

    public static function suite()
    {
        $suite = new MySuite('MyTests');
        $suite->addTestSuite('MyClassTest');
        $suite->addTestSuite('MyClassOutputTest');
        $suite->addTestSuite('MyClassPerformanceTest');
        return $suite;
    }

    // ...
   
}