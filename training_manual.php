<?php
include("login/include/session.php");
global $database;
$config = $database->getConfigs();
if(!$session->logged_in){ header("Location: login.php"); } else { 
?>
<!doctype html>
<html lang="en">

<head>
	<meta charset="utf-8"/>
	<title>SCRG I Dashboard</title>
	
	<link rel="stylesheet" href="css/layout.css" type="text/css" media="screen" />
	<!--[if lt IE 9]>
	<link rel="stylesheet" href="css/ie.css" type="text/css" media="screen" />
	<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
	<script src="js/jquery-1.5.2.min.js" type="text/javascript"></script>
	<script src="js/hideshow.js" type="text/javascript"></script>
	<script src="js/jquery.tablesorter.min.js" type="text/javascript"></script>
	<script type="text/javascript" src="js/jquery.equalHeight.js"></script>
	<script type="text/javascript">
	$(document).ready(function() 
    	{ 
      	  $(".tablesorter").tablesorter(); 
   	 } 
	);
	$(document).ready(function() {

	//When page loads...
	$(".tab_content").hide(); //Hide all content
	$("ul.tabs li:first").addClass("active").show(); //Activate first tab
	$(".tab_content:first").show(); //Show first tab content

	//On Click Event
	$("ul.tabs li").click(function() {

		$("ul.tabs li").removeClass("active"); //Remove any "active" class
		$(this).addClass("active"); //Add "active" class to selected tab
		$(".tab_content").hide(); //Hide all tab content

		var activeTab = $(this).find("a").attr("href"); //Find the href attribute value to identify the active tab + content
		$(activeTab).fadeIn(); //Fade in the active ID content
		return false;
	});

});
    </script>
    <script type="text/javascript">
    $(function(){
        $('.column').equalHeight();
    });
</script>

</head>


<body>

	<header id="header">
		<hgroup>
			<h1 class="site_title"><a href="index.php"><?php echo $config['SITE_NAME']; ?></a></h1>
			<h2 class="section_title">Dashboard</h2><div class="btn_view_site"><a href="login/process.php">Logout</a></div>
		</hgroup>
	</header> <!-- end of header bar -->
	
	<section id="secondary_bar">
		<div class="user">
			<p><?php echo $session->username; ?></p>
			<a class="logout_user" href="login/process.php" title="Logout">Logout</a>
		</div>
		<div class="breadcrumbs_container">
			<article class="breadcrumbs"><a href="index.html">Bread</a> <div class="breadcrumb_divider"></div> <a class="current">Crumbs</a></article>
		</div>
	</section><!-- end of secondary bar -->
	
	<?php require 'menu.php'; ?>
	
	<section id="main" class="column">
		<iframe src="https://docs.google.com/a/derbynso.com/file/d/0Bzs671jRLhuyYW53NTEwWGNnMUU/preview" width="100%" height="1024px" seamless></iframe>	
	
		<div class="spacer"></div>
	</section>


</body>

</html>
<?php } ?>