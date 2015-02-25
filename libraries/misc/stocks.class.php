<?php 
/**
 *	Class used to get stock information 
 *	Example: SELECT * FROM yahoo.finance.quotes WHERE symbol="MSFT"
 */
class stocks{
	public $results; 

	public function __construct($symbol){
		if(is_array($symbol)){

		}
		else{

		}
	}


	//Get the actual data from YAHOO with either an array of symbols or one symbol 
	public static function getData($symbol){
		if(is_array($symbol)){
			$query = "select%20*%20from%20yahoo.finance.quotes%20where%20symbol%20in%20(";
			foreach($symbol as $thisSymbol){
				if($thisSymbol == end($symbol)){
					$query .="%22$thisSymbol%22";
				}
				else{
					$query .="%22$thisSymbol%22%2C";
				}
			}
			$query .= ")&format=json&diagnostics=true&env=store%3A%2F%2Fdatatables.org%2Falltableswithkeys&callback=";
		}
		else{
			$query = "select%20*%20from%20yahoo.finance.quotes%20where%20symbol%3D%22$symbol%22&format=json&diagnostics=true&env=store%3A%2F%2Fdatatables.org%2Falltableswithkeys&callback="; 
		}

		$results = json_decode(file_get_contents("http://query.yahooapis.com/v1/public/yql?q=$query"));
		return $results->query->results->quote;	//Return the actual quote data back	}
	}

	//Get the current asking price for a patricular stock 
	public static function getAskingPrice($symbol){
		 
	}

}	

/**
 *	Class used with my stock infomration that I have stored in a JSON file
 *
 */
class myStocks extends stocks{

	public static function marketValue($symbol){
		if(self::ownStock($symbol)){

		}
		else{

		}
	}

	//Check the JSON data to see if the stock symbol is there
	private static function ownStock($symbol){
		return true; 
	}
} 