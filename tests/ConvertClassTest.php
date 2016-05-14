<?php
/**
 * Created by PhpStorm.
 * User: Dominik
 * Date: 10.05.2016
 * Time: 18:45
 */

namespace Tasks\Tests;

use Tasks\ConvertClass;
use PHPUnit_Framework_TestCase;

class ConvertClassTest extends PHPUnit_Framework_TestCase
{
    public function testBuild2DArray()
    {
        echo "\n\n";
        $data = new ConvertClass("6x6.txt");
        $data->build2DArray();
        echo $data->data;
    }

    public function testCountHourGlasses()
    {
        echo "\n\n";
        $boj = new ConvertClass("6x6.txt");
        echo $boj->hourglassesCount();
    }

    public function testMaxSumHourGlasses()
    {
        echo "\n\n";
        $boj = new ConvertClass("6x6.txt");
        echo $boj->hourglassesMaxSum();
    }
}