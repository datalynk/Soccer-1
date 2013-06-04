<?php

include_once 'libs/Faker/autoload.php';

include_once 'Models/Player.php';
include_once 'Models/Team.php';
include_once 'Models/Match.php';
include_once 'Models/MatchEvents.php';

try {
    $home_team = Soccer\Team::generateNewTeam();
    $away_team = Soccer\Team::generateNewTeam();
    
    $match = new Soccer\Match($home_team, $away_team);
    
    $match->start();
    
} catch(Exception $e) {
    echo $e->getMessage();
}


echo "<pre>";
print_r($team);
echo "</pre>";


?>
