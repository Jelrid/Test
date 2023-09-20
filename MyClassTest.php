<?php

require_once 'MyClass.php';

class MyClassOutputTest extends PHPUnit\Framework\TestCase {

    protected $fixture;

    protected function setUp(): void
    {
        $this->fixture = $this->sharedFixture;
    }

    protected function tearDown(): void
    {
        $this->fixture = NULL;
    }
 
    public function testSquare()
    {
        $this->expectOutputString('4');
        $this->fixture->square(2);
    }
}

class MyClassPerformanceTest extends PHPUnit\Framework\TestCase {

    protected $fixture;

    protected function setUp(): void
    {
        $this->fixture = $this->sharedFixture;
    }

    protected function tearDown(): void
    {
        $this->fixture = NULL;
    }

    public function testPerformance()
    {
        $this->setMaxRunningTime(1);
        $this->fixture->square(4);
    }
}

class MyClassTest extends PHPUnit\Framework\TestCase {

 // ..

}