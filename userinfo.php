<?php
/**
 * UserInfo.php
 *
 * This page is for users to view their account information
 * with a link added for them to edit the information.
 *
 * Updated by: The Angry Frog
 * Last Updated: October 26, 2011
 */
include("login/include/session.php");
global $database;
$config = $database->getConfigs();
if (!isset($_GET['user'])) { 
	header("Location: ".$config['WEB_ROOT'].$config['home_page']);
}
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
			<h2 class="section_title">Your Profile</h2><div class="btn_view_site"><a href="login/process.php">Logout</a></div>
		</hgroup>
	</header> <!-- end of header bar -->
	
	<section id="secondary_bar">
		<div class="user">
			<p><?php echo $session->username; ?></p>
			<a class="logout_user" href="login/process.php" title="Logout">Logout</a>
		</div>
		<div class="breadcrumbs_container">
			<article class="breadcrumbs"><a href="index.html">Admin</a> <div class="breadcrumb_divider"></div> <a class="current">Your Profile</a></article>
		</div>
	</section><!-- end of secondary bar -->
	
	<?php require 'menu.php'; ?>
	
	<section id="main" class="column">
		<article class="module width_full">		
			<header><h3>Your Profile</h3></header>
			<div class="module_content">
				<?php
					/* Requested Username error checking */
					$req_user = trim($_GET['user']);
					if(!$req_user || strlen($req_user) == 0 ||
					   !preg_match("/^[a-z0-9]([0-9a-z_-\s])+$/i", $req_user) ||
					   !$database->usernameTaken($req_user)){
					   die("Username not registered");
					}

					/* Logged in user viewing own account */
					if(strcmp($session->username,$req_user) == 0){
					   echo "<h1>My Account</h1>";
					}
					/* Visitor not viewing own account */
					else{
					   echo "<h1>User Info</h1>";
					}

					/* Display requested user information - add/delete as applicable */
					$req_user_info = $database->getUserInfo($req_user);

					/* Username */
					echo "<b>Username: ".$req_user_info['username']."</b><br>";

					/* Email */
					echo "<b>Email:</b> ".$req_user_info['email']."<br>";

					/**
					 * Note: when you add your own fields to the users table
					 * to hold more information, like homepage, location, etc.
					 * they can be easily accessed by the user info array.
					 *
					 * $session->user_info['location']; (for logged in users)
					 *
					 * $req_user_info['location']; (for any user)
					 */

					/* If logged in user viewing own account, give link to edit */
					if(strcmp($session->username,$req_user) == 0){
					   echo '<br><a href="useredit.php">Edit Account Information</a><br>';
					}

				?>
			</div>
		</article>
	</section>

</body>
</html>
