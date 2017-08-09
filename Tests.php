<?php

namespace Xsolla_summer_school;
use  Xsolla_summer_school\Tasks\RepeatingWordsFinder;
use Xsolla_summer_school\Tasks\MostVisitorsTimeFinder;

class Tester
{
    public function testRepWords($stringArg)
    {
        require 'task1.php';
        $finder = new RepeatingWordsFinder();
        echo $finder->findRepeatingWords($stringArg);
    }

    public function testMostVisits($stringArg)
    {
        require 'task2.php';
        $finder = new MostVisitorsTimeFinder();
        echo $finder->findMostVisitorsTime($stringArg);
    }
}

$tester = new Tester();
