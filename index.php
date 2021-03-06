<?php

session_start();

error_reporting(E_ALL);
ini_set('display_errors', 1);

include_once 'libs/Faker/autoload.php';

include_once 'Models/Player.php';
include_once 'Models/Team.php';
include_once 'Models/Match.php';
include_once 'Models/MatchEvents.php';

include_once 'Controllers/IndexController.php';
include_once 'Controllers/MatchController.php';

try {
    $matchcontroller = new Soccer\MatchController();
    $matchcontroller->createMatch();
} catch(Exception $e) {
    echo $e->getMessage();
}


?>
