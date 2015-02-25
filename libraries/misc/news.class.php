<?php 

/**
 *	Class used to get news from various sources and compile them how the user wants. 
 *	Mostly Static class
 */
class news{
	//Get news from all categories from all sources
	public static function getAggregateNews($numArticles = 10){

	}
	
	//Get news from one category from all sources
	public static function getAggregateCategoryNews($category, $numArticles = 5){

	}

	//Get news from one category from one source 
	public static function getCategoryNews($category, $source, $numArticles = 5){

	}

	//Get some number of articles from a valid source from different categories
	public static function getNews($source, $numArticles = 10){

	}

	//Get local news from one source 
	public static function getLocalNews($source, $zipcode, $numArticles = 10){

	}

	//Get locals news from multiple sources 
	public static function getAggregateLocalNews($zipcode, $numArticles =10){

	}

	//Search one source for some news 
	public static function searchNews($query, $source, $numArticles = 10){

	}

	//Search all sources for some news
	public static function searchAggregateNews($query, $numArticles = 10){

	}



	/**********************Private Methods**********************/
	
	//Validates if a given source is valid for this class 
	private static function validSource($source){

		return true; 
	}

	//Actual call to get news from a patricular source
	private static function getNewsFrom($source, $category){

	}

	//Actual call to search 
	private static function searchNews($source){

	}

	//Actual call to get Local News
	private static function getLocalNewsFrom($source, $zipcode){

	}


}


?>