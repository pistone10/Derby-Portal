<?php
/**
 * UserEdit.php
 *
 * This page is for users to edit their account information such as their password, 
 * email address, etc. Their usernames can not be edited. When changing their
 * password, they must first confirm their current password.
 *
 * Updated by: The Angry Frog - Last Updated: December 29th, 2011
 */
include("login/include/session.php");
global $database;
$config = $database->getConfigs();

/**
 * If user is not logged in, then do not display anything.
 * If user is logged in, then display the form to edit
 * account information, with the current email address
 * already in the field.
 */
if(!$session->logged_in){
	header("Location: ".$config['WEB_ROOT'].$config['home_page']);
} else {	

	/**
	 * User has submitted form without errors and user's
	 * account has been edited successfully.
	 */
	if(isset($_SESSION['useredit'])){
	   unset($_SESSION['useredit']);
	   
	   echo "<h1>User Account Edit Success!</h1>";
	   echo "<p><b>$session->username</b>, your account has been successfully updated. "
		   ."<a href='".$config['WEB_ROOT'].$config['home_page']."'>Return to Home</a>.</p>";
	}
	else{
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
				<article class="breadcrumbs"><a href="index.html">Admin</a> <div class="breadcrumb_divider"></div> <a class="current">Edit Profile</a></article>
			</div>
		</section><!-- end of secondary bar -->
		
		<?php require 'menu.php'; ?>
		
		<section id="main" class="column">
		
			<article class="module width_full">
				<header><h3>User Account Edit : <?php echo $session->username; ?></h3></header>
					<div class="module_content">
						<?php
						if($form->num_errors > 0){
						   echo "<font size=\"2\" color=\"#ff0000\">".$form->num_errors." error(s) found</font>";
						}
						?>
						<form action="login/process.php" method="POST">
							<fieldset style="width:48%; float:left; margin-right: 3%;"> <!-- to make two field float next to one another, adjust values accordingly -->
								<label>New Password</label>
								<input type="password" name="newpass" maxlength="30" value="<?php echo $form->value("newpass"); ?>">
								<?php echo $form->error("newpass"); ?>
							</fieldset>
							<fieldset style="width:48%; float:left;"> <!-- to make two field float next to one another, adjust values accordingly -->
								<label>Confirm New Password</label>
								<input type="password" name="conf_newpass" maxlength="30" value="<?php echo $form->value("newpass"); ?>">
								<?php echo $form->error("newpass"); ?>
							</fieldset>
							<fieldset style="width:48%; float:left; margin-right: 3%;"> <!-- to make two field float next to one another, adjust values accordingly -->
								<label>Current Password</label>
								<input type="password" name="curpass" maxlength="30" value="<?php echo $form->value("curpass"); ?>">
								<?php echo $form->error("curpass"); ?>
							</fieldset>
							<fieldset style="width:48%; float:left;"> <!-- to make two field float next to one another, adjust values accordingly -->
								<label>Email</label>
								<input type="email" name="email" maxlength="50" value="
									<?php
									if($form->value("email") == ""){
									   echo $session->userinfo['email'];
									}else{
									   echo $form->value("email");
									}
									?>">
								<?php echo $form->error("email"); ?>
							</fieldset><div class="clear"></div>
					</div>
				<footer>
					<div class="submit_link">
						<input type="hidden" name="subedit" value="1">
						<input type="submit" value="Edit Account" class="alt_btn">
						</form>
					</div>
				</footer>
			</article><!-- end of post new article -->
		</section>
	</body>
	</html>
	<?php
	} 
} ?>