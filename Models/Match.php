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
        $match_start_info = array(
            'home_team' => $this->home_team->getName(),
            'away_team' => $this->away_team->getName(),
            'lineups' => $this->getTeamsLineup(),
        );
        
        return $match_start_info;
    }
    
    
    public function playMatch() {
        $match_data = $this->playHalf();
        $match_result = $this->getMatchResult();
        
        $match_info['events'] = $match_data;
        $match_info['result'] = $match_result;
        
        return json_encode($match_info);
    }
    
    
    public function playHalf() {
        
        $match_data = array();

        for($r = 1; $r <= self::MATCH_TIME; $r++) {

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

                $match_data['event_' . $r] = array(
                    'time' => $r, 
                    'desc' => $team_player->getName() . $event['event'], 
                    'outcome' => $event['outcome']['desc']
                );
            }
        }
        
        return $match_data;
    }
    
    
    public function getMatchResult() {
        $match_result = array('home_score' => $this->home_score, 'away_score' => $this->away_score);
        return $match_result;
    }
    
    
    public function getTeamsLineup() {
        $linesups = array(
            'home' => $this->home_team->getPlayers(),
            'away' => $this->away_team->getPlayers(),
        );
        return $linesups;
    }
    
    
}


?>
