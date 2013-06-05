<?php

namespace Soccer;

class MatchController {
    
    public function createMatch() {
        $home_team = Team::generateNewTeam();
        $away_team = Team::generateNewTeam();
        
        $match = new Match($home_team, $away_team);
        $match_start_info = $match->start();
        
        include_once 'views/index.html.php';
        
        
        //$match_data = $match->playMatch();
        
    }
    
}

?>
