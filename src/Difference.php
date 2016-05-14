<?php
/**
 * Created by PhpStorm.
 * User: Dominik
 * Date: 13.05.2016
 * Time: 19:05
 */

namespace Tasks;


class Difference
{
    private $elements = array();
    public $maximumDifference;

    /**
     * Constructor adds given array to elements atribute
     *
     * @param array $elements
     * @return Difference
     */
    public function __construct(array $elements)
    {
        $this->elements = $elements;
    }

    /**
     * A computeDifference method that finds the maximum absolute
     * difference between any 2 numbers in elements and stores
     * it in the maxDifference instance variable.
     *
     * @return void
     */
    public function computeDifference()
    {
        if(count($this->elements) == 1)
        {
            $this->maximumDifference = $this->elements[0];
        }
        else
        {
            $lenght = count($this->elements);
            $max = $this->elements[1] - $this->elements[0];

            for($i = 0; $i < $lenght; $i++)
            {
                for ($j = 0; $j < $lenght; $j++)
                {
                    if(($this->elements[$j] - $this->elements[$i]) > $max)
                    {
                        $max = $this->elements[$j] - $this->elements[$i];
                    }
                }
            }

            $this->maximumDifference = abs($max);
        }
    }
}