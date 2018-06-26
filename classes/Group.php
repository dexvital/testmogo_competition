<?php

namespace classes;

use interfaces\GroupInterface;
use interfaces\TeamInterface;
use classes\Team;

class Group implements GroupInterface
{
    private $teams = [];

    /**
     * Group constructor.
     */
    public function __construct()
    {
    }

    public function addTeam(\interfaces\TeamInterface $team) {
        $this->teams[] = $team;
    }


}