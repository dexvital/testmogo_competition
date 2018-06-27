<?php

namespace interfaces;


interface GroupInterface
{
    public function addTeam(\interfaces\TeamInterface $team) :void;
    public function groupFight() :void;
    public function getWinners($count = NULL) :array;
}