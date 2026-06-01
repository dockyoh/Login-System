<?php

class Calc
{
    protected $operator;
    protected $num1;
    protected $num2;

    public function __construct($num1, $operator, $num2)
    {
        $this->num1 = $num1;
        $this->operator = $operator;
        $this->num2 = $num2;
    }

    public function calculator()
    {
        switch ($this->operator) {
            case 'add':
                $result = $this->num1 + $this->num2;
                return $result;
                break;
            case 'sub':
                $result = $this->num1 - $this->num2;
                return $result;
                break;
            case 'mul':
                $result = $this->num1 * $this->num2;
                return $result;
                break;
            case '/':
                $result = $this->num1 / $this->num2;
                return $result;
                break;

            default:
                return 'FAILED TO CALCULATE!';
                break;
        }
    }
}
