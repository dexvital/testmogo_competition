<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
//////////////////////////////////////////////////////////////////////////////////////

require_once 'config/common.php';

use classes\Competition;
use classes\Group;
use classes\Team;
use classes\FinalGroup;

$competition = new Competition();

for ($i = 1; $i <= Competition::GROUPS_CNT; $i++) {
    $competition->addGroup(new Group());
}

$competition->addFinalGroup(new FinalGroup());

for ($i = 1; $i <= 14; $i++) {
    $competition->addTeamToGroup(new Team($i));
}

$competition->run();

$t = 1;
foreach ($competition->getWinners() as $team) {
    echo $t++.') Team'.$team->getNumber()."</br>";
}



