<?php

namespace classes;

use interfaces\TeamInterface;

class Team implements TeamInterface
{
    private $number = 0;

    /**
     * Player constructor.
     */
    public function __construct($number)
    {
        $this->number = $number;
    }

    public function getNumber()
    {
        return $this->number;
    }

}