<?php
require_once 'MyClassTest.php';

class MySuite extends PHPUnit\Framework\TestSuite {

    public static function suite()
    {
        $suite = new MySuite('MyTests');
        $suite->addTestSuite(MyClassTest::class);
        $suite->addTestSuite(MyClassOutputTest::class);
        $suite->addTestSuite(MyClassPerformanceTest::class);
        return $suite;
    }

    // ...
   
}
   
