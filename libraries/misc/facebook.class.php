<?php 
/**
 *	Class for accessing Facebook opengraph database 
 *
 */

use Facebook\FacebookSession;
use Facebook\FacebookRequest;
use Facebook\GraphUser;
use Facebook\FacebookRequestException;
use Facebook\FacebookRedirectLoginHelper;

class facebook{ 
	public $accessToken; 

	public function __construct($appId, $appSecret){ 
		FacebookSession::setDefaultApplication($appId, $appSecret);	//App ID and App Secret 

		
	}

	/**
	 *	Get the data associated with a users timeline using this access token 
	 *	
	 */
	public static function getFeed($id){
		
		return "Feed Me"; 
	}


	/**
	 *	Get the contents of a query 
	 *
	 */
	public static function query($query){

	}

	/**
	 *	Get a valid access token to be able to access facebook's opengraph data
	 *	Consider getting different types of tokens 
	 */
	public static function getAccessToken(){
		$accessToken = ""; 


		return $accessToken; 
	}

	/**
	 *	Get a user's id based on their username or something else 
	 *
	 */
	public static function getUserId($username){

	}

	/**
	 *	Return all of the posts that contain $stringTolookFor
	 *
	 */
	public static function getPostThatContains($username, $stringToLookFor){

	}
}

/**
 *	Class for a specific facebook person that utlizes the facebook class
 *
 */
class facebookUser{ 
	public $accessToken;
	public $username; 
	public $userId; 

	public $numLikes; 
	public $numPosts; 

	public function __construct($username){
		$this->accessToken = facebook::getAccessToken(); 
		$this->username = $username; 
		$this->userId = facebook::getUserId($username);
	}

	/**
	 *	Get the total number of likes that this user has
	 *
	 */
	public function getTotalLikes(){

	}

	/**
	 *	Get the total number of posts that this user has
	 *
	 */
	public function getTotalPosts(){ 

	}

	/**
	 *	Create a stat on how active this users posts are. 
	 *	Will be based on how many comments/likes per posts. 
	 *	Consider: Number of images, number of things liked, etc. 
	 *
	 */
	public function getActivityRatio(){ 

	}
}
?>