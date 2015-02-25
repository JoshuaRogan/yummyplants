<?php 
/**
 *	Class for accessing Facebook opengraph database with pages  (Requires no login)
 *
 *	Author:		Josh Rogan
 * 	Modified: 	6-27-14
 */

use Facebook\FacebookSession;
use Facebook\FacebookRequest;
use Facebook\FacebookRequestException;

class facebookPage{ 
	private $appId, $appSecret, $appToken; 
	private $session; 

	public function __construct($appId, $appSecret){ 
		FacebookSession::setDefaultApplication($appId, $appSecret);	//Set the defaults (Required)

		$this->appId = $appId; 
		$this->appSecret = $appSecret; 
		$this->appToken = $appId . "|" . $appSecret; 

		$this->session = new FacebookSession($this->appToken);
	}

	public function getPageFeed($pageId){ 
		$request = new FacebookRequest($this->session, 'GET', "/$pageId/feed");
		$response = $request->execute(); //Need to add error handling 
		
		//Verify the response

		$graphObject = $response->getGraphObject();

		//Verify the graphObject 

		return $graphObject; 
	}

}




?>