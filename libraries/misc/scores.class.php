<?php

/**
 *	Class used to obtain scores for different sports
 *
 */
class scores{

	public function __construct(){ 

	}

	/**
	 *	Get a score for a specific sport, returning a game object
	 *
	 */
	public static function getScore($sport, $team){
		$game = new game($team);

		//Edit the scores of the game and return that game object


		return $game; 
	}

}

/**
 *	Class used by the scores class that represents the state of a given game (2 teams)
 *
 */
class game{ 
	public $date; 

	public $team1; 
	public $team2; 

	public $team1Score; 
	public $team2Score; 

	
	public function __construct($team1, $team2 = null, $date = now()){
		$this->team1 = $team1; 
		$this->team2 = $team2; 
		$this->date = $date; 
	}

	//Renders the HTML of this game
	public function rednerHTML(){

	}

}

/**
 *	Class used by the scores class that represents the state of a given baseball game (2 teams)
 *
 */
class baseballGame extends game{
	public $innings = array(array(), array()); // First array is the home team's line, Second is the aways

	public $team1Pitcher; 		//The current pitcher for team1
	public $team2Pitcher; 		//The current pitcher for team2

	public $currentBatter; 		//The batter currently up
	public $onDeck; 			//The batter on deck
	public $inTheHole;			//The batter "in the hole";

	public $onbase = array(4); 	//Will list any players on base 0 = currentbatter, 1 = firstbase, 2 = secondbase, 3 = thirdbase

	//Render the twitter bootstrap HTML for this game
	public function rednerHTML(){ 

	}

}

?>