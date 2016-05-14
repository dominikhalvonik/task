<?php
/**
 * Created by PhpStorm.
 * User: Dominik
 * Date: 13.05.2016
 * Time: 19:11
 */

namespace Tasks\Tests;

use PHPUnit_Framework_TestCase;
use Tasks\Difference;

class DifferenceTest extends PHPUnit_Framework_TestCase
{
    public function testComputeDifference()
    {
        $N = intval(fgets(STDIN));
        $a = array_map('intval', explode(' ', fgets(STDIN)));
        $d = new Difference($a);
        $d->computeDifference();
        print($d->maximumDifference);
    }
}