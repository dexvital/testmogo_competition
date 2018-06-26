<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

spl_autoload_register(function($c) {
    require_once preg_replace('#\\\|_(?!.+\\\)#','/',$c).'.php';
});

//////////////////////////////////////////////////////////////////////////////////////

use classes\Competition;
use classes\Group;
use classes\Team;

$competition = new Competition();

for ($i = 1; $i <= Competition::CROUPS_CNT; $i++) {
    $competition->addGroup(new Group());
}

for ($i = 1; $i <= 8; $i++) {
    $competition->addTeamToGroup(new Team($i));
}

$competition->run();



