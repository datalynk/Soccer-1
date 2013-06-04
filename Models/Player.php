<?php

namespace Soccer;

class Player {
    
    private $id;
    private $name;
    private $position;
    
    private $stats = array(
        'goalkeeping' => 10,
        'defending' => 10,
        'passing' => 10,
        'dribling' => 10,
        'shooting' => 10,
    );
    private $total_stat = 50;
    
    public static $allowed_positions = array('keeper', 'defender', 'midfielder', 'striker');
    const START_POOL_SCORE = 50;
    
    
    public function __construct($id, $name, $stats, $position) {
        $this->id = $id;
        $this->name = $name;
        $this->position = $position;
        $this->setPlayerStats($stats);
    }
    
    
    public function setPlayerStats($stats) {
        $total = 0;
        foreach($stats as $stat => $score) {
            $this->stats[$stat] += $score;
            $total += $score;
        }
        $this->total_stat = $total;
    }
    
    
    public function getName() {
        return $this->name;
    }

    
    public function getPosition() {
        return $this->position;
    }

        
    public static function generateNewPlayer($position) {
        
        if(in_array($position, self::$allowed_positions)) {
            
            switch($position) {
                case 'keeper':
                    $stats = array(
                        'goalkeeping' => 45,
                        'passing' => 5,
                    );  
                    break;
                case 'defender':
                    $stats = array(
                        'defending' => 40,
                        'passing' => 10,
                    );                      
                    break;
                case 'midfielder':
                    $stats = array(
                        'defending' => 10,
                        'passing' => 25,
                        'dribling' => 15,
                    );                      
                    break;
                case 'striker':
                    $stats = array(
                        'passing' => 5,
                        'dribling' => 15,
                        'shooting' => 30,
                    );  
                    break;
            }
            
            if(array_sum($stats) != self::START_POOL_SCORE) {
                throw new \Exception('Starting stats for player is not correct');
            }
            
            $faker = \Faker\Factory::create();
            $name = $faker->name;
            
            return new Player(1, $name, $stats, $position);
            
        } else {
            throw new \Exception('Invalid player position');
        }
        
    }
    
    
}


?>
