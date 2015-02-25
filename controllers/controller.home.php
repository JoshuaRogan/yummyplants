<?php 
	$_CONTROLLER = array(); 
	/*******************************Required*******************************/
	$_CONTROLLER["title"]  					= "Welcome Josh"; 
	$_CONTROLLER["header_file"]  			= false;  				//True uses default header
	$_CONTROLLER["footer_file"]				= false; 				//True uses default footer
	/*******************************Required*******************************/
 	
 	$_CONTROLLER["description"]				= "Home page for Josh Rogan/JcubedWorld that will contain images, stock quotes, weather, news, and much more. All of this information will pertain to me directly.  ";

	$_CONTROLLER["stylesheets"] 			= array("stylesheet");
	$_CONTROLLER["javascript"] 				= array("index");
	

	/************DATA HANDLING FUNCTIONS *************/
	$_PAGE = array(); //This is where all of the data for the page will be 

	if(isset($_GET['ajax'])){
		$_CONTROLLER['ajax'] = true; 
		if($_GET['ajax'] == "gettweets"){//Send the blockquotes back to the ajax call
			$sources = array("ForbesTech", "arstechnica", "BillGates", "BBCTech", "TechCrunch", "guardiantech" ); 
			$timeline = twitter::getTimeline($sources[rand(0,count($sources)-1)], 100);	//Random news source 
			for($i = 0; $i < 5; $i++){
				new tweets(toolbox::makeClickableLinks("&#8220;" . $timeline[0][$i]->text) . "&#8221;", $timeline[0][$i]->user->name);
			} 

			tweets::render_blockquotes(); 
		}
	}
?>