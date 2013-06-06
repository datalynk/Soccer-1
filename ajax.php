<?php

session_start();

include_once 'libs/Faker/autoload.php';

include_once 'Models/Player.php';
include_once 'Models/Team.php';
include_once 'Models/Match.php';
include_once 'Models/MatchEvents.php';

include_once 'Controllers/IndexController.php';
include_once 'Controllers/MatchController.php';

$controller = (isset($_REQUEST['controller']) ? 'Soccer\\' . $_REQUEST['controller'] . 'Controller' : 'Soccer\IndexController');
$controllerobj = new $controller();

$action = (isset($_REQUEST['action']) ? $_REQUEST['action'] : 'index');
$controllerobj->$action();

?>
