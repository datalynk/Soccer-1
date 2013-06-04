<?php

namespace Soccer;

class MatchEvents {
    
    const EVENT_NOTHING = 0;
    const EVENT_GOAL = 1;
    const EVENT_YELLOW_CARD = 2;
    const EVENT_RED_CAR = 3;
      
    
    private static $events = array(
        array(
            'desc' => ' gets the ball in a good position',
            'positive' => array('outcome' => 1, 'desc' => '<strong>GOAL!</strong> Hammers the ball behind the keeper'),
            'negative' => array('outcome' => 0, 'desc' => 'Shot is far wide, horrible execution'),
            ),
        array(
            'desc' => ' dribles his way through the defence',
            'positive' => array('outcome' => 1, 'desc' => '<strong>GOAL!</strong> A beautiful raid!'),
            'negative' => array('outcome' => 0, 'desc' => 'The keeper gets his hands on the ball'),
            ),
        array(
            'desc' => ' goes in with a dangerous tackle',
            'positive' => array('outcome' => 0, 'desc' => 'He\'s off the hook this time'),
            'negative' => array('outcome' => 2, 'desc' => 'A well deserved yellow card is shown'),
            ),
    );
    
    public static function getEvent($luck = 50) {
        
        $factor = rand(0, 100);
        $event = self::$events[rand(0, count(self::$events) - 1)];
        
        if($factor > $luck) {
            return array('event' => $event['desc'], 'outcome' => $event['positive']);
        } else {
            return array('event' => $event['desc'], 'outcome' => $event['negative']);
        }        
    }
    
}

?>
