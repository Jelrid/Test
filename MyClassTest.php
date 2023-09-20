<?php

require_once 'MyClass.php';

class MyClassOutputTest extends PHPUnit\Framework\TestCase {

    protected static $sharedFixture;

    public static function setUpBeforeClass(): void
    {
        self::$sharedFixture = new MyClass();
    }

    public function testSquare()
    {
        $this->assertEquals(4, self::$sharedFixture->square(2));
    }

    // ...
   
}

class MyClassPerformanceTest extends PHPUnit\Framework\TestCase {

    protected static $sharedFixture;

    public static function setUpBeforeClass(): void
    {
        self::$sharedFixture = new MyClass();
    }

    public function testPerformance()
    {
        $this->assertLessThan(5.9, self::$sharedFixture->square(2));
    }

    // ...
   
}

class MyClassTest extends PHPUnit\Framework\TestCase {

    public function testSquare()
    {
        $myClass = new MyClass();
        $this->assertEquals(4, $myClass->square(2));
        $this->assertEquals(9, $myClass->square(3));
        $this->assertEquals(16, $myClass->square(4));
    }


}