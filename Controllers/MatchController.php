<?php

namespace Soccer;

class MatchController {
    
    public function createMatch() {
        $home_team = Team::generateNewTeam(1001);
        $away_team = Team::generateNewTeam(1002);
        
        $match = new Match($home_team, $away_team);        
        $_SESSION['match'] = serialize($match);
        
        $match_start_info = $match->getStartInformation();

        include_once 'views/index.html.php';
    }
    
    
    public function playMatch() {
        $match = $this->getMatch();
        $match_data = $match->playMatch();
        echo $match_data;
    }
    
    
    public function getMatch() {
        return unserialize($_SESSION['match']);
    }
    
    
    public function test() {
        echo "Gooood";
    }
}

?>
