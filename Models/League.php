<?php

namespace Soccer;

class League {
    
    private $id;
    private $teams = array();
    private $name;
    
    const TEAMS_IN_LEAGUE = 12;
    const TEAMS_TO_CHANGE_AFTER_SEASON = 2;
    
    public function __construct($id) {
        $this->id = $id;
    }
    
    
    /**
     * Loads the teams and name of the season
     */
    private function getDataForLeague() {
        $this->teams = array();
        $this->name = '';
    }
    
    
    /**
     * Gets all earlier seasons played in this league and returns them as an
     * array of season-ids that can be used to load in season objects.
     * 
     * @return array
     */
    public function getPreviousSeasons() {
        return array();
    }
    
    
    /**
     * Gets and returns a season object for the currently active season
     * 
     * @return Season
     */
    public function getCurrentSeason() {
        return $season;
    }
    
    
    /**
     * Starts a new season. Triggered at the beginning of the game and after
     * each season is finished. Returns a season object for the new season
     * 
     * @return Season
     */
    public function startNewSeason($teams = array()) {
        
        return $season;
    }
    
    
    
    
}

?>
