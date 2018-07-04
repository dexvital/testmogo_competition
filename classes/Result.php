<?php

namespace classes;

use classes\Services;
use interfaces\TeamInterface;
use Entity\Result as EResult;

abstract class Result
{
    protected $results = [];
    protected $fullResults = [];

    /**
     * @param TeamInterface $loser
     * @param TeamInterface $winner
     */
    protected function saveResult(TeamInterface $loser, TeamInterface $winner) :void
    {
        $this->results[$winner->getNumber()]++;

        $em = Services::entityManager();
        $result = new EResult();
        $result->setLoser($loser->getEntety());
        $result->setWinner($winner->getEntety());

        try {
            $em->persist($result);
            $em->flush();
        } catch (\Exception $e) {

        }
    }
}