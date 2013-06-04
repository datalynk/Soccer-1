<?php

namespace Soccer;

class Match {
    
    private $id;
    
    private $home_team;
    private $away_team;
    
    private $home_score = 0;
    private $away_score = 0;
    
    private $time;
    private $half;
    
    const HALF_TIME = 45;
    const MATCH_TIME = 90;
    
    
    public function __construct(Team $home_team, Team $away_team) {
        $this->home_team = $home_team;
        $this->away_team = $away_team;
    }
    
    
    public function start() {
        echo "<div style='position:absolute;right:0px;height:1000px;width:500px;background:#DDD;padding:10px;'>";
        echo "<h3>" . $this->home_team->getName() . " - " . $this->away_team->getName() . "</h3>";
        $this->getTeamsLineup();
        echo "</div>";
        
        $this->half = 1;
        
        echo "<h4>" . Kickoff . "</h4>";
        $this->playHalf();
        
        echo "<h4>Halftime</h4>";
        $this->half = 2;
        $this->playHalf();
        
        $this->getMatchResult();
    }
    
    
    public function playHalf() {

        for($r = 1; $r <= self::HALF_TIME; $r++) {

            if(rand(0, 10) == 10) {
                $team = rand(0, 1);
                $player = rand(0, Team::PLAYERS_IN_TEAM - 1);
                $event = MatchEvents::getEvent(70);

                switch($team) {
                    case 0:
                        $team_player = $this->home_team->getPlayerAtPosition($player);
                        if($event['outcome']['outcome'] == 1) {
                            $this->home_score += 1;
                        }                                
                        break;
                    case 1:
                        $team_player = $this->away_team->getPlayerAtPosition($player);
                        if($event['outcome']['outcome'] == 1) {
                            $this->away_score += 1;
                        }                                                          
                        break;
                }

                $min = ($this->half == 2 ? $r + 45 : $r);
                echo $min . "min: " . $team_player->getName() . $event['event'] . "<br />";
                echo "<i>" . $event['outcome']['desc'] . "</i><br /><hr />";
            }
        }
        
    }
    
    
    public function getMatchResult() {
        echo $this->home_team->getName() . " <strong>" . $this->home_score 
                . "</strong> - <strong>" . $this->away_score 
                . "</strong> " . $this->away_team->getName() 
                . "<br />";
    }
    
    
    public function getTeamsLineup() {
        $home_lineup = $this->home_team->getPlayers();
        
        echo "<p>Home lineup:</p>";
        echo "<ul>";
        
        foreach($home_lineup as $player) {
            echo "<li>" . $player->getPosition() . " - " . $player->getName() . "</li>";
        }
        echo "</ul>";
        
        
        $away_lineup = $this->away_team->getPlayers();

        echo "<p>Away lineup:</p>";
        echo "<ul>";
        
        foreach($away_lineup as $player) {
            echo "<li>" . $player->getPosition() . " - " . $player->getName() . "</li>";
        }
        echo "</ul>";        
        
    }
    
    
}


?>
