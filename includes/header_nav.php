<nav class="navbar navbar-default" role="navigation">
	<div class="container">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
		    	<span class="sr-only">Toggle navigation</span>
		    	<span class="icon-bar"></span>
		    	<span class="icon-bar"></span>
		    	<span class="icon-bar"></span>
		    </button>
		    <a class="navbar-brand emboss" href="/home">Josh Rogan</a>
		</div>

		<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      		<ul class="nav navbar-nav">
        		<li <?php if(substr($page, 0, strlen($page)-4) == "experience") echo "class='active'"; ?> ><a href="/experience">Experience</a></li>
        		<!-- <li <?php if(substr($page, 0, strlen($page)-4) == "portfolio") echo "class='active'"; ?> ><a href="/portfolio">Portfolio</a></li> -->
        		<li <?php if(substr($page, 0, strlen($page)-4) == "skills") echo "class='active'"; ?> ><a href="/skills">Skills</a></li>
        		<li <?php if(substr($page, 0, strlen($page)-4) == "achievements") echo "class='active'"; ?> ><a href="/achievements">Achievements</a></li>
        		<!-- <li <?php if(substr($page, 0, strlen($page)-4) == "personal") echo "class='active'"; ?> ><a href="/personal">Personal</a></li> -->
        		<li <?php if(substr($page, 0, strlen($page)-4) == "freelance") echo "class='active'"; ?> ><a href="/freelance">Freelance</a></li>
        		<li <?php if(substr($page, 0, strlen($page)-4) == "contact") echo "class='active'"; ?> ><a href="/contact">Contact Me</a></li>
        		<li <?php if(substr($page, 0, strlen($page)-4) == "resume") echo "class='active'"; ?> ><a href="http://1drv.ms/1idqHxd" target="_blank">Résumé</a></li>
        	</ul>
        </div>
	</div>
</nav>