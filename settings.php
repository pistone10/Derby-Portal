<?php
include("login/include/session.php");
include ('login/admin/adminfunctions.php');
$config = $database->getConfigs();

if(!$session->isAdmin()){
   header("Location: ".$config['WEB_ROOT'].$config['home_page']);
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
<SCRIPT LANGUAGE="JavaScript">
<!-- Begin
function jqCheckAll3( id, pID )
{
   $( "#" + pID + " :checkbox").attr('checked', $('#' + id).is(':checked'));
}
//  End -->
</script>

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
			<article class="breadcrumbs"><a href="index.html">Admin</a> <div class="breadcrumb_divider"></div> <a class="current">Settings</a></article>
		</div>
	</section><!-- end of secondary bar -->
	
	<?php require 'menu.php'; ?>
	
	<section id="main" class="column">
		<article class="module width_full">
		<header><h3 class="tabs_involved">Settings</h3>
		<ul class="tabs">
   			<li><a href="#tab1">General</a></li>
    		<li><a href="#tab2">User</a></li>
		</ul>
		</header>

		<div class="tab_container">
			<div id="tab1" class="tab_content">
				<header><h3>General Settings</h3></header>
					<div class="module_content">
						<form action="adminprocess.php" method="POST">
							<fieldset style="width:48%; float:left; margin-right: 3%;"> <!-- to make two field float next to one another, adjust values accordingly -->
								<label>Site Name</label>
								<input id="sitename" type="text" size="40" maxlength="255" name="sitename" value="<?php echo $config['SITE_NAME']; ?>" /><br>
								<?php echo $form->error("sitename"); ?>
							</fieldset>
							<fieldset style="width:48%; float:left;"> <!-- to make two field float next to one another, adjust values accordingly -->
								<label>Short Description (ex SCRG)</label>
								<input id="sitedesc" type="text" size="40" maxlength="255" name="sitedesc" value="<?php echo $config['SITE_DESC']; ?>" /><br>
								<?php echo $form->error("sitedesc"); ?>
							</fieldset>
							<fieldset style="width:48%; float:left; margin-right: 3%;"> <!-- to make two field float next to one another, adjust values accordingly -->
								<label>Email From Name</label>
								<input id="emailfromname" type="text" size="40" maxlength="255" name="emailfromname" value="<?php echo $config['EMAIL_FROM_NAME']; ?>" /><br>
								<?php echo $form->error("emailfromname"); ?>
							</fieldset>
							<fieldset style="width:48%; float:left;"> <!-- to make two field float next to one another, adjust values accordingly -->
								<label>Site Root</label>
								<input id="webroot" type="text" size="40" maxlength="255" name="webroot" value="<?php echo $config['WEB_ROOT']; ?>" /><br>
								<?php echo $form->error("webroot"); ?>
							</fieldset><div class="clear"></div>
					</div>
				<footer>
					<div class="submit_link">
						<input type="hidden" name="subedit" value="1">
						<input type="submit" value="Submit" class="alt_btn">
						</form>
					</div>
				</footer>
			</div><!-- end of #tab1 -->
			
			<div id="tab2" class="tab_content">
<?php include('login/include/pagination.php'); ?>
<br>
<?php
if (isset($_POST['orderby'])){
	$orderby=$_POST['orderby'];
} else {
	$orderby = 'username';
}
$result = $pagination->paginatePage("10","".TBL_USERS."","$orderby"); 
echo "<table class=\"tablesorter\" cellspacing=\"0\"> ";
echo "<thead>
		<tr>
			<th>Username</th>
			<th>User Level</th>
			<th>E-mail</th>
			<th>Registered</th>
			<th>Last Login Time</th>
		</tr>
	  </thead>
	  <tbody>";
		
		while ($row = $result->fetch()) {
		$timestamp = $row['timestamp'];
		$lastlogin  = date("j M, y, g:i a", $timestamp);
		$regdate = $row['regdate'];
		$reg  = date("j M, y, g:i a", $regdate);		
		echo "<tr><td><a href='".$config['WEB_ROOT']."login/admin/index.php?id=6&usertoedit=".$row['username']."'>".$row['username']."</a></td><td>".$row['userlevel']."</td>"
		."<td><a href='mailto:".$row['email']."'>".$row['email']."</a></td><td>"
		.$reg."</td><td>".$lastlogin."</td></tr>";		
		}
echo "</tbody>
      </table>";
?>
<br>	

<?php
$orderby = 'regdate';
$result = displayAdminActivation($orderby);
?>

<h4>Accounts awaiting Admin or Email activation</h4>
<form name='myForm' action='adminprocess.php' method='POST'>
<table class="tablesorter" cellspacing="0"> 
<thead>
	<tr>
		<th class='sortable'>Username</th><th class='sortable'>User Level</th>
		<th class='sortable'>Email</th><th class='sortable'>Registered</th><th>
		<input type="checkbox" id="checkL" onclick="jqCheckAll3(this.id, 'left');"/></th>
	</tr>
</thead>
<tbody>

<?php
while($row = $result->fetch())
{
	$regdate = $row['regdate'];
	$reg  = date("j M, y, g:i a", $regdate);	
	echo "<tr><td>".$row['username']."</td><td>".$row['userlevel']."</td><td>"
	."<a href='mailto:".$row['email']."'>".$row['email']."</a></td><td>".$reg
	."</td><td><input name='user_name[]' type='checkbox' value='".$row['username']."' />";
}
?>
</tbody>
</table>
<input type="hidden" name="activateusers" value="1">
<input type="submit" value="Activate Selected Users">
<br>
</form>

<br>

<h4>Banned Users</h4>
<?php
if (isset($_POST['orderby'])){
	$orderby=$_POST['orderby'];
} else {
	$orderby = 'username';
}
$result = $pagination->paginatePage("10","".TBL_BANNED_USERS."","$orderby"); 
?>
<table class="tablesorter" cellspacing="0"> 
<thead>
	<tr>
		<th class='sortable'>Username</th>
		<th class='sortable'>Timed Banned</th>
	</tr>
</thead>
<tbody>
<?php		
while ($row = $result->fetch()) {
$timestamp = $row['timestamp'];
$lastlogin  = date("j M, y, g:i a", $timestamp);		
echo "<tr><td>".$row['username']."</td>"
."<td>".$lastlogin."</td></tr>";		
}
?>
</tbody>
</table>
<br>

<h4>Delete inactive accounts</h4>
<form action="adminprocess.php" method="POST">
<table class="tablesorter" cellspacing="0"> 
<thead>
	<tr>
		<td>Days</td>
		<td></td>
	</tr>

</thead>
<tbody>
	<tr>
		<td>
			<select name="inactdays">
			<option value="3">3</option>
			<option value="7">7</option>
			<option value="14">14</option>
			<option value="30">30</option>
			<option value="100">100</option>
			<option value="365">365</option>
			</select>
		</td>
		<td>
			<input type="hidden" name="subdelinact" value="1">
			<input type="submit" value="Delete All Inactive" onclick="return confirm ('Are you sure you want to delete inactive accounts, this cannot be undone?\n\n' + 'Click OK to continue or Cancel to Abort!')">
		</td>
	</tr>
</tbody>
</table>
</form>

<h4>Ban User</h4>
<?php echo $form->error("banuser"); ?>
<form action="adminprocess.php" method="POST">
<table class="tablesorter" cellspacing="0"> 
<thead>
	<tr>
		<td>Username</td>
		<td></td>
	</tr>
<tbody>
	<tr>
		<td>
			<input type="text" name="banuser" maxlength="30" value="<?php echo $form->value("banuser"); ?>">
		</td>
		<td>
			<input type="hidden" name="subbanuser" value="1">
			<input type="submit" value="Ban User">
		</td>
	</tr>
</tbody>
</table>
</form>


<script type="text/javascript" src="login/admin/tablesort.js"></script>

			</div><!-- end of #tab2 -->
			
		</div><!-- end of .tab_container -->
		
		</article><!-- end of content manager article -->
		
		<div class="clear"></div>
		
		<!-- begin post article NEEDS FORUM TO BE COMPLETED-->
		<article class="module width_full">
			<header><h3>Post New Article - NEEDS FORUM TO BE COMPLETED</h3></header>
				<div class="module_content">
						<fieldset>
							<label>Post Title</label>
							<input type="text">
						</fieldset>
						<fieldset>
							<label>Content</label>
							<textarea rows="12"></textarea>
						</fieldset>
						<fieldset style="width:48%; float:left; margin-right: 3%;"> <!-- to make two field float next to one another, adjust values accordingly -->
							<label>Category</label>
							<select style="width:92%;">
								<option>Articles</option>
								<option>Tutorials</option>
								<option>Freebies</option>
							</select>
						</fieldset>
						<fieldset style="width:48%; float:left;"> <!-- to make two field float next to one another, adjust values accordingly -->
							<label>Tags</label>
							<input type="text" style="width:92%;">
						</fieldset><div class="clear"></div>
				</div>
			<footer>
				<div class="submit_link">
					<select>
						<option>Draft</option>
						<option>Published</option>
					</select>
					<input type="submit" value="Publish" class="alt_btn">
					<input type="submit" value="Reset">
				</div>
			</footer>
		</article><!-- end of post new article -->
		
		<div class="spacer"></div>
	</section>


</body>

</html>
<?php } ?>