<?php
/**
 * Created by PhpStorm.
 * User: Dominik
 * Date: 13.05.2016
 * Time: 19:18
 */

namespace Tasks;


class Staircase
{
    private $n;

    /**
     * Constructor insert number of stairs to n atribute
     *
     * @return Staircase
     */
    public function __construct($n)
    {
        $this->n = $n;
    }

    /**
     * Draw stairs
     *
     * @return void
     */
    public function drawStaircase()
    {
        for($i = 1; $i <= $this->n; $i++)
        {
            $c = $this->n - $i;

            for($j = 1; $j <= $c; $j++)
            {
                echo " ";
            }

            for($k = 1; $k <= $i; $k++)
            {
                echo "#";
            }

            echo "\n";
        }
    }
}