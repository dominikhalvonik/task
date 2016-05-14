<?php
/**
 * Created by PhpStorm.
 * User: Dominik
 * Date: 13.05.2016
 * Time: 18:36
 */

namespace Tasks;


class ConvertClass
{
    public $data;
    protected $vectors, $hourglasses, $maxSum;

    /**
     * Constructor for init convert file to readeable form
     *
     * @param string $file_path
     * @return ConvertClass
     */
    public function __construct($file_path)
    {
        try
        {
            $path = "assets" . DIRECTORY_SEPARATOR . $file_path;

            if(file_exists($path))
            {
                $file = file_get_contents($path);
                $numbers = explode(" ",$file);
                $iter = 0;

                foreach ($numbers as $number)
                {
                    if(strlen($number) > 1)
                    {
                        $num = (int)$number;

                        if($num > 9 || $num < -9)
                        {
                            throw new \Exception("File is not valid");
                        }
                        else
                        {
                            $this->vectors[$iter][] = trim(substr($number, 0, 1));
                            $iter++;
                            $this->vectors[$iter][] = trim(substr($number, 1, 2));
                        }
                    }
                    else
                    {
                        $this->vectors[$iter][] = trim($number);
                    }
                }
            }
            else
            {
                throw new \Exception("File ". $file_path . " does not exists on path:".$path);
            }
        }
        catch (\Exception $e)
        {
            echo $e->getMessage();
        }
    }

    /**
     * Add 2D array to data atribute
     *
     * @return void
     */
    public function build2DArray()
    {
        $tmp = $this->vectors;

        foreach ($tmp as $key => $value)
        {
            $this->data .= implode(" ", $value);

            if(php_sapi_name() == "cli")
            {
                $this->data .= "\n";
            }
            else
            {
                $this->data .= "<br>";
            }
        }
    }

    /**
     * Count how many hourglasses pattern are in file
     *
     * @return 2D array
     */
    public function hourglassesCount()
    {
        for ($key = 0; $key < count($this->vectors); $key++)
        {
            for($i = 0; $i < count($this->vectors[$key]); $i++)
            {
                if(isset($this->vectors[$key][$i+2]) && isset($this->vectors[$key+1][$i+1]) && isset($this->vectors[$key+2][$i+2]))
                {
                    $this->hourglasses[] = [$this->vectors[$key][$i],
                        $this->vectors[$key][$i+1],
                        $this->vectors[$key][$i+2],
                        $this->vectors[$key+1][$i+1],
                        $this->vectors[$key+2][$i],
                        $this->vectors[$key+2][$i+1],
                        $this->vectors[$key+2][$i+2]];
                }
                else
                {
                    break;
                }
            }
        }

        return count($this->hourglasses);
    }

    /**
     * Count largest sum of given hourglasses
     *
     * @return int
     */
    public function hourglassesMaxSum()
    {
        $this->hourglassesCount();

        foreach ($this->hourglasses as $hourglass)
        {
            $tmp = array_sum($hourglass);

            if($tmp <= $this->maxSum)
            {
                continue;
            }
            else
            {
                $this->maxSum = $tmp;
            }
        }

        return $this->maxSum;
    }
}