<?php

namespace classes;

use interfaces\GroupInterface;
use classes\Result;

class FinalGroup extends Result implements GroupInterface
{
    private $teams = [];

    use Fight;

    /**
     * FinalGroup constructor.
     */
    public function __construct()
    {
    }

    /**
     * @param \interfaces\TeamInterface $team
     */
    public function addTeam(\interfaces\TeamInterface $team) :void
    {
        $this->teams[$team->getNumber()] = $team;
        $this->results[$team->getNumber()] = 0;
    }

    /**
     * group fights, 1/4, 1/2 and final
     */
    public function groupFight() :void
    {
        $this->oneLevelFight($this->teams); // 1/4
        $this->oneLevelFight($this->getWinners(4)); // 1/2
        $this->oneLevelFight($this->getWinners(2)); // final
    }

    /**
     * @param array $teams
     */
    private function oneLevelFight(array $teams) :void
    {
        while (count($teams)) {
            $team1 = array_shift($teams);
            $team2 = array_pop($teams);

            if ($this->fight($team1, $team2) === $team1) {
                $this->saveResult($team1, $team2);
            } else {
                $this->saveResult($team2, $team1);
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