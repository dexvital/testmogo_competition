<?php

namespace classes;

use interfaces\GroupInterface;
use interfaces\TeamInterface;
use classes\Team;

class Group extends Result implements GroupInterface
{
    private $teams = [];

    use Fight;

    /**
     * Group constructor.
     */
    public function __construct()
    {
    }

    /**
     * @param TeamInterface $team
     */
    public function addTeam(TeamInterface $team) :void
    {
        $this->teams[$team->getNumber()] = $team;
        $this->results[$team->getNumber()] = 0;
    }

    /**
     * Group fight, all with all
     */
    public function groupFight() :void
    {
        $slice = 0;
        foreach ($this->teams as $team1) {
            foreach (array_slice($this->teams, $slice++) as $team2) {
                if ($team1 === $team2) {
                    continue;
                }

                $winner = $this->fight($team1, $team2);

                if ($winner === $team1) {
                    $this->saveResult($team1, $team2);
                } else {
                    $this->saveResult($team2, $team1);
                }
            }
        }
    }

    /**
     * @param int|NULL $count
     * @return array
     */
    public function getWinners($count = NULL) :array
    {
        arsort($this->results);
        return array_slice(array_replace($this->results, $this->teams), 0, $count);
    }

}