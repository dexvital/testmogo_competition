<?php

namespace classes;

use classes\Services;
use interfaces\TeamInterface;

abstract class Result
{
    protected $results = [];

    protected function saveResult(\interfaces\TeamInterface $loser, \interfaces\TeamInterface $winner)
    {
        $mysql = Services::mysql();

        $this->results[$winner->getNumber()]++;
    }
}