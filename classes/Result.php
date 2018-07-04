<?php

namespace classes;

use classes\Services;
use interfaces\TeamInterface;
use Entity\Result as EResult;

abstract class Result
{
    protected $results = [];
    protected $fullResults = [];

    protected function saveResult(\interfaces\TeamInterface $loser, \interfaces\TeamInterface $winner)
    {
        $this->results[$winner->getNumber()]++;

        $em = Services::entityManager();
        $result = new EResult();
        $result->setLoser($loser->getEntety());
        $result->setWinner($winner->getEntety());

        $em->persist($result);
        $em->flush();
    }
}