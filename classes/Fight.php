<?php

namespace classes;


trait Fight
{
    function fight(\interfaces\TeamInterface $team1, \interfaces\TeamInterface $team2)
    {
        $result = rand(1, 2);

        $winner = 'team'.$result;
        return $$winner;
    }
}