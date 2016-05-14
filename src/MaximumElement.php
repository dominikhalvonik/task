<?php
/**
 * Created by PhpStorm.
 * User: Dominik
 * Date: 13.05.2016
 * Time: 18:50
 */

namespace Tasks;


class MaximumElement
{
    protected $stack;
    protected $limit;

    /**
     * Constructor for open file and make defined queries
     *
     * @return MaximumElement
     */
    public function __construct()
    {
        try
        {
            $handle = fopen ("assets/maximum_element.txt","r");
            $numberOfQueries = intval(fgets($handle)); // is 10 first line from given code
            $arr = array();
            $this->stack = $arr;

            if(!in_array($numberOfQueries, range(1, 105)))
            {
                throw new \RunTimeException('Constraint no. 1 error');
            }
            else
            {
                $this->limit = $numberOfQueries;

                while (!feof($handle))
                {
                    $line = fgets($handle);
                    $arr = explode(" ", $line);
                    $result = array_map('trim', $arr);

                    switch ($result[0])
                    {
                        case 1:
                            if(in_array($result[1], range(1, 109)))
                            {
                                $this->push($result[1]);
                            }
                            else
                            {
                                throw new \RunTimeException('Constraint no. 2 error');
                            }
                            break;
                        case 2:
                            $this->delete();
                            break;
                        case 3:
                            echo $this->max();
                            break;
                        default:
                            throw new \RunTimeException('Constraint no. 3 error');
                    }
                }
            }

            fclose($handle);
        }
        catch (\RunTimeException $e)
        {
            echo $e->getMessage();
        }

    }

    /**
     * Push the element into the stack.
     *
     * @param string $element
     * @return void
     */
    protected function push($element)
    {
        try
        {
            if (count($this->stack) < $this->limit)
            {
                array_unshift($this->stack, $element);
            }
            else
            {
                throw new \RunTimeException('Cannot add element to stack');
            }
        }
        catch (\RunTimeException $e)
        {
            echo $e->getMessage();
        }

    }

    /**
     * Delete the element present at the top of the stack.
     *
     * @return void
     */
    protected function delete()
    {
        try
        {
            if ($this->isEmpty())
            {
                throw new \RunTimeException('Cannot remove element, stack is empty');
            }
            else
            {
                return array_shift($this->stack);
            }
        }
        catch (\RunTimeException $e)
        {
            echo $e->getMessage();
        }

    }

    /**
     * Return the maximum element in the stack.
     *
     * @return int
     */
    protected function max()
    {
        if(php_sapi_name() == "cli")
        {
            return max($this->stack) . "\n";
        }
        else
        {
            return max($this->stack) . "<br>";
        }

    }

    /**
     * Check if stack is empty or not.
     *
     * @return bool
     */
    private function isEmpty()
    {
        return empty($this->stack);
    }
}