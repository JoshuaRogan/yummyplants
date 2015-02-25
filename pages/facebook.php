<?php 
/**
 *		Page used to test facebook API
 */


$yummyPlants = new facebookPage('159993570755125','e82b9f2ecda002470f962e420d333165');

$feed = $yummyPlants->getPageFeed('128275493900106');



?>
<section class="container"> 
	<h1> Facebook Test </h1>
	<p> Used to test the facebook API for yummy plants </p>

	
<?php 
	// var_dump($feed); 
	// var_dump($feed->getProperty('backingData')); 
	//http://stackoverflow.com/questions/9527530/how-to-get-the-large-picture-from-from-feed-with-graph-api
	$feed = $feed->asArray();
	// var_dump($feed["data"]); 
	$most_recent_post = false; 
	foreach($feed["data"] as $post){ 
		// var_dump($post); 
		if (stripos($post->message, '#veganFoodFinds')){
			//Find the most recent Post
			if(!$most_recent_post || ((new DateTime($post->created_time)) > (new DateTime($most_recent_post->created_time)))){
				$most_recent_post = $post; 
			}
		}

	}
	// var_dump($most_recent_post);
	//This is the veganFoodFindImage get the image 
	$thumbnailLink = $most_recent_post->picture;
	$fullsizeLink = str_replace("s.jpg", "o.jpg", $thumbnailLink); //Modify the link to get the full size version 
	$object_id_link = "https://graph.facebook.com/$most_recent_post->object_id/picture"; 
	echo "<p> The link to the full size image is: <a href='$fullsizeLink'>$fullsizeLink </a> and <a href='$thumbnailLink'> $thumbnailLink</a> for the thumbnail.</p>"; 
	echo "<p> The date of this post is <strong>$most_recent_post->created_time</strong> please verify that it is always the most recent image that has #veganFoodFind.</p>";
	echo "<p> The content of this post was <strong>\"$most_recent_post->message\"</strong> </p>";
	echo "<p> Here is the album image (from object id): <br /> <img src='$object_id_link' width='500px' alt='vegan-food-find' /> <p>"; 
	echo "<p> Here is the modified link image: <br /> <img src='$fullsizeLink' width='500px' alt='vegan-food-find' /> <p>"; 
	echo "<p> Here is the thumbnail: <br /> <img src='$thumbnailLink' width='500px' alt='vegan-food-find' /> <p>"; 


?> 
	<pre> 
	<?php 
		var_dump($most_recent_post);
		//https://fbcdn-sphotos-a-a.akamaihd.net/hphotos-ak-xpa1/t31.0-8/10504915_780034702057512_8203218949631912294_o.jpg
		//https://fbcdn-sphotos-a-a.akamaihd.net/hphotos-ak-xpf1/t1.0-9/s130x130/10417830_780034702057512_8203218949631912294_n.jpg 
	?>

	</pre>

</section>