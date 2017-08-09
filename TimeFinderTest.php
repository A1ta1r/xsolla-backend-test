<?php

namespace Xsolla_summer_school;

use PHPUnit\Framework\TestCase;

require 'TimeFinder.php';

class TimeFinderTest extends TestCase
{
    private $finder;

    protected function setUp()
    {
        $this->finder = new TimeFinder();
    }

    protected function tearDown()
    {
        $this->finder = null;
    }

    public function testCase1()
    {
        $this->assertEquals('2 10:40-11:30', $this->finder->findTime("10:30-11:40 10:40-11:30"));
    }
    public function testCase2()
    {
        $this->assertEquals('2 10:44-11:30', $this->finder->findTime("10:30-11:40 10:44-11:30"));
    }
    public function testCase3()
    {
        $this->assertEquals('2 10:45-11:30', $this->finder->findTime("10:30-11:40 10:45-11:30"));
    }
}
