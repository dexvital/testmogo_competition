<?php

namespace classes;


trait Fight
{
    /**
     * @param \interfaces\TeamInterface $team1
     * @param \interfaces\TeamInterface $team2
     * @return \interfaces\TeamInterface
     */
    function fight(\interfaces\TeamInterface $team1, \interfaces\TeamInterface $team2)
    {
        $result = rand(1, 2);

        $winner = 'team'.$result;
        return $$winner;
    }
}