<?php

namespace classes;

use interfaces\GroupInterface;

class Competition
{
    const CROUPS_CNT = 2;

    private $groups = [];

    /**
     * Competition constructor.
     */
    public function __construct()
    {

    }

    public function addGroup(\interfaces\GroupInterface $group)
    {
        $this->groups[] = $group;
    }

    public function addTeamToGroup(\interfaces\TeamInterface $team)
    {
        static $teamCount = 0;
        $teamCount++;

        $key = $teamCount % self::CROUPS_CNT;
        if (!isset($this->groups[$key]) || !($this->groups[$key] instanceof GroupInterface)) {
            $key = 0;
        }
        $this->groups[$key]->addTeam($team);
    }

    public function run()
    {
        var_dump($this->groups);
    }



}