<?php
/**
 * Created by PhpStorm.
 * User: Dominik
 * Date: 13.05.2016
 * Time: 19:24
 */

namespace Tasks\Tests;

use PHPUnit_Framework_TestCase;
use Tasks\Staircase;

class StaircaseTest extends PHPUnit_Framework_TestCase
{
    public function testDrawStaircase()
    {
        echo "\n\n";
        $stair = new Staircase(6);
        $stair->drawStaircase();
    }
}