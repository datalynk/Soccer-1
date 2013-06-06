<?php

namespace Soccer;

class Team {
    
    private $id;
    private $name;
    private $players = array();
    
    private static $positions_in_team = array(
        'keeper', 
        'defender', 
        'defender', 
        'defender', 
        'defender', 
        'midfielder', 
        'midfielder', 
        'midfielder', 
        'midfielder', 
        'striker', 
        'striker',
    );
    const PLAYERS_IN_TEAM = 11;
    
    
    public function __construct($id, $name, $players) {
        $this->id = $id;
        $this->name = $name;
        $this->setPlayers($players);
    }
    
    
    public function addPlayer(Player $player) {
        $this->players[] = $player;
    }
    
    
    public function setPlayers($players) {
        $this->players = $players;
    }
    
    
    public function getName() {
        return $this->name;
    }

    public function getPlayers() {
        return $this->players;
    }

    
    public function getPlayerAtPosition($position) {
        return $this->players[$position];
    }
    
    
    public static function generateNewTeam($seed) {
        $players = array();
        
        for($i = 0; $i < self::PLAYERS_IN_TEAM; $i++) {
            $players[] = Player::generateNewPlayer(self::$positions_in_team[$i]);
        }        
        
        $faker = \Faker\Factory::create();
        $faker->seed($seed);
        $name = $faker->state;
        
        return new Team(1, $name, $players);
    }
    
    
    
}


?>
