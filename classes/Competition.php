<?php

namespace classes;

use interfaces\GroupInterface;
use interfaces\TeamInterface;
use classes\Result;

class Competition extends Result
{
    const GROUPS_CNT = 2;
    const GROUP_WINNERS = 4;

    private $groups = [];
    private $finalGroup;

    use Fight;
    /**
     * Competition constructor.
     */
    public function __construct()
    {

    }

    public function addGroup(GroupInterface $group) :void
    {
        $this->groups[] = $group;
    }

    /**
     * @param GroupInterface $group
     */
    public function addFinalGroup(GroupInterface $group) :void
    {
        $this->finalGroup = $group;
    }

    /**
     * @param TeamInterface $team
     */
    public function addTeamToGroup(TeamInterface $team) :void
    {
        static $teamCount = 0;
        $teamCount++;

        $key = $teamCount % self::GROUPS_CNT;
        if (!isset($this->groups[$key]) || !($this->groups[$key] instanceof GroupInterface)) {
            $key = 0;
        }
        $this->groups[$key]->addTeam($team);
    }

    /**
     *
     */
    public function run() :void
    {
        array_map(function($group) {$group->groupFight();}, $this->groups);

        $this->fillFinalGroup();
        $this->finalGroup->groupFight();
    }

    /**
     * @return array
     */
    public function getWinners() :array
    {
        return $this->finalGroup->getWinners();
    }

    /**
     *
     */
    private function fillFinalGroup() :void
    {
        foreach ($this->groups as $group) {
            $winners = $group->getWinners(self::GROUP_WINNERS);

            foreach($winners as $team) {
                $this->finalGroup->addTeam($team);
            }
        }
    }



}