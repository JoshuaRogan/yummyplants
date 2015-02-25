<?php 	
	session_start();

	/*****IMPORTANT THIS IS GETTING OVERRIDDEN BY COMPOSER **********/
	//Autoloading of classes
	function __autoload($class_name) { 
    	if(file_exists("../libraries/misc/$class_name" . ".class.php")){
    		require_once ("../libraries/misc/$class_name" . ".class.php");
    	}
	}
	/*****IMPORTANT THIS IS GETTING OVERRIDDEN BY COMPOSER **********/

	require_once("../libraries/misc/alerts.class.php");			//Include the alerts  
	require_once("../libraries/misc/facebookPage.class.php");	//Include facebookPage class 

	require '../vendor/autoload.php';	//To autoload the files in composer 

	//Bring in the global variables 
	if(file_exists("../data/GLOBAL_VARS.php")){
		require("../data/GLOBAL_VARS.php");
	}

	//Set $page to the contents of the correct page
	if(!isset($_GET['page'])){
		$page = 'home.php'; 	//Default
	}
	else{
		if(file_exists( "../pages/" .$_GET['page'] . ".php")){
			$page = $_GET['page'] . ".php";
		}
		else {
			new alerts("<p>The page \"" .$_GET['page'] . "\" doesn't exist! <strong>You have been redirected to the home page!</strong></p>", "alert-danger");
			$page = 'home.php';	 //Default 
		}
	}
	
	//If the controller exists grab that data 
	if(file_exists("../controllers/controller." . $page)){
		require ("../controllers/controller." . $page);
	}
	else{
		require("../controllers/controller.home.php");	//If the controller doesn't exist try to use the home controller
	}
	

	// new alerts("<strong>This website is currently in development.</strong>", "alert-warning");
?>
<?php if(!isset($_CONTROLLER['ajax']) || $_CONTROLLER['ajax'] === false): ?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title> <?php if(isset($_CONTROLLER["title"])) echo $_CONTROLLER["title"]; else echo DEFAULT_TITLE; ?></title>
		<meta name="author" content="<?php echo AUTHOR; ?>">
		<meta name="description" content="<?php if(isset($_CONTROLLER["description"])) echo $_CONTROLLER["description"]; else echo DEFAULT_DESCRIPTION; ?>" >



		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
		<link rel="shortcut icon" href="images/favicon.png">
		
		<!-- Run in full-screen mode. -->
        <meta name="apple-mobile-web-app-capable" content="yes">
		
		<!-- Make the status bar black with white text. -->
        <meta name="apple-mobile-web-app-status-bar-style" content="black">

		<!-- Customize home screen title. -->
        <meta name="apple-mobile-web-app-title" content="<?php echo APPLE_TITLE; ?>">

		<?php if(APPLE_ICONS): ?>
        <!-- iOS 7 iPhone icon(retina) -->
	        <link href="images/apple_icons/apple-touch-icon-120x120.png"
	              sizes="120x120"
	              rel="apple-touch-icon">
				  
			<!-- iOS 6 iPhone icon (retina) -->
	        <link href="images/apple_icons/apple-touch-icon-114x114.png"
	              sizes="114x114"
	              rel="apple-touch-icon">
				  
			<!-- iOS 6 & 7 iPhone 5 Startup -->
	        <link href="images/apple_icons/apple-touch-startup-image-640x1096.png"
	              media="(device-width: 320px) and (device-height: 568px)
	                 and (-webkit-device-pixel-ratio: 2)"
	              rel="apple-touch-startup-image">	  
			
		<?php endif; ?>
		
		<!-- Loading Bootstrap -->
		<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet">

		<!-- Loading FontAwesome with CDN-->
		<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">

		<!-- Loading the google fonts  CONSIDER REDUCING-->
		<link href='http://fonts.googleapis.com/css?family=Oswald:400,700' rel='stylesheet' type='text/css'>
		<link href='http://fonts.googleapis.com/css?family=Averia+Sans+Libre:400,700' rel='stylesheet' type='text/css'>

		<!-- bxSlider CSS file -->
		<link href="js/bxslider/jquery.bxslider.css" rel="stylesheet" />




		<?php 
			//Get all the stylesheets
			if(isset($_CONTROLLER["stylesheets"])){ 
				foreach ($_CONTROLLER["stylesheets"] as $stylesheet){ 
					echo "<link rel='stylesheet' type='text/css' href='styles/$stylesheet.css'>";
				}
			}
			else{
				echo '<link rel="stylesheet" type="text/css" href="styles/stylesheet.css">';	//Default stylesheet
			}
		?>
	</head> 
	
	<body> 
			<?php // REQUIRE GOOGLE ANALYTICS HERE ?>
			
			<!--HEADER--> 
			<?php 
				if($_CONTROLLER["header_file"] === true){	
					require ("../includes/header.php");	//Bring in the default header
				}
				else if($_CONTROLLER["header_file"]){
					require ("../includes/" . $_CONTROLLER['header_file']); //Bring in a specfic headre 
				}
			?>
			<!--HEADER--> 			
			
			<div id="main" class="<?php echo "page-" . substr($page, 0, strlen($page)-4) ?> container"> 
				<?php
					alerts::render_alerts();

					if(isset($page)){
						require ("../pages/$page");	//Grab the page
					}

					//Pring errors if DEBUG is true 
					if(DEBUG){
						if(isset($_DEBUG) && count($_DEBUG) > 0){
							echo "<br /><div class='container'><pre class='pre-scrollable col-md-12'>";
							var_dump($_DEBUG);
							echo "</pre></div>";
						}
					}
				?>
			</div> 
			
			<!--FOOTER--> 
			<?php 
				if($_CONTROLLER["footer_file"] === true){	
					require ("../includes/footer.php");	//Bring in the default footer
				}
				else if($_CONTROLLER["footer_file"]){
					require ("../includes/" . $_CONTROLLER['footer_file']); //Bring in a specfic footer 
				}
			?>

			<!--FOOTER -->
			<?php require_once("../includes/footer.php"); ?> 
			<!--FOOTER -->
			
 
			<!--SCRIPTS-->
			<script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.0/jquery.min.js"></script>
			<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>

			<script src="js/bxslider/jquery.bxslider.min.js"></script><!-- bxSlider Javascript file -->


			<div id="fb-root"></div>
			<script>(function(d, s, id) {
			  var js, fjs = d.getElementsByTagName(s)[0];
			  if (d.getElementById(id)) return;
			  js = d.createElement(s); js.id = id;
			  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&appId=1464115533830122&version=v2.0";
			  fjs.parentNode.insertBefore(js, fjs);
			}(document, 'script', 'facebook-jssdk'));</script>
				
			<?php 
				//Load all of the scripts from the controller
				if(isset($_CONTROLLER["javascript"])){
					foreach($_CONTROLLER["javascript"] as $js_include){ 
						echo "<script src='js/$js_include.js'></script>";
					}
				}	

				include("../includes/google_analytics.php")
			?>
			<!--SCRIPTS-->
	</body> 
</html>

<?php endif; ?>
	
