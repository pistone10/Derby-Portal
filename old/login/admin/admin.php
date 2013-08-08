<?
/**
 * Admin.php
 *
 * This is the Admin Center page. Only administrators
 * are allowed to view this page. This page displays the
 * database table of users and banned users. Admins can
 * choose to delete specific users, delete inactive users,
 * ban users, update user levels, etc.
 *
 * Written by: Jpmaster77 a.k.a. The Grandmaster of C++ (GMC)
 * Last Updated: August 26, 2004
 */
include("../include/session.php");

/**
 * displayUsers - Displays the users database table in
 * a nicely formatted html table.
 */
function displayUsers(){
   global $database;
   $q = "SELECT username,userlevel,email,timestamp "
       ."FROM ".TBL_USERS." ORDER BY userlevel DESC,username";
   $result = $database->query($q);
   /* Error occurred, return given name by default */
   $num_rows = mysql_numrows($result);
   if(!$result || ($num_rows < 0)){
      echo "Error displaying info";
      return;
   }
   if($num_rows == 0){
      echo "Database table empty";
      return;
   }
   /* Display table contents */
   echo "<table align=\"left\" border=\"1\" cellspacing=\"0\" cellpadding=\"3\">\n";
   echo "<tr><td><b>Username</b></td><td><b>Level</b></td><td><b>Email</b></td></tr>\n";
   for($i=0; $i<$num_rows; $i++){
      $uname  = mysql_result($result,$i,"username");
      $ulevel = mysql_result($result,$i,"userlevel");
      $email  = mysql_result($result,$i,"email");

      echo "<tr><td>$uname</td><td>$ulevel</td><td>$email</td></tr>\n";
   }
   echo "</table><br>\n";
}

/**
 * displayBannedUsers - Displays the banned users
 * database table in a nicely formatted html table.
 */
function displayBannedUsers(){
   global $database;
   $q = "SELECT username,timestamp "
       ."FROM ".TBL_BANNED_USERS." ORDER BY username";
   $result = $database->query($q);
   /* Error occurred, return given name by default */
   $num_rows = mysql_numrows($result);
   if(!$result || ($num_rows < 0)){
      echo "Error displaying info";
      return;
   }
   if($num_rows == 0){
      echo "Database table empty";
      return;
   }
   /* Display table contents */
   echo "<table align=\"left\" border=\"1\" cellspacing=\"0\" cellpadding=\"3\">\n";
   echo "<tr><td><b>Username</b></td><td><b>Time Banned</b></td></tr>\n";
   for($i=0; $i<$num_rows; $i++){
      $uname = mysql_result($result,$i,"username");
      $time  = mysql_result($result,$i,"timestamp");

      echo "<tr><td>$uname</td><td>$time</td></tr>\n";
   }
   echo "</table><br>\n";
}

/**
 * displayNewUsers - Displays the New users
 * database table in a nicely formatted html table.
 */
function displayNewUsers(){
   global $database;
   $q = "SELECT username, derby "
       ."FROM ".TBL_USERS." WHERE userlevel like '1' ORDER BY username";
   $result = $database->query($q);
   /* Error occurred, return given name by default */
   $num_rows = mysql_numrows($result);
   if(!$result || ($num_rows < 0)){
      echo "Error displaying info";
      return;
   }
   if($num_rows == 0){
      echo "No user need to be verified";
      return;
   }
   /* Display table contents */
   echo "<table align=\"left\" border=\"1\" cellspacing=\"0\" cellpadding=\"3\">\n";
   echo "<tr><td><b>Username</b></td><td><b>Derby Name</b></td><td></td></tr>\n";
   for($i=0; $i<$num_rows; $i++){
      $uname = mysql_result($result,$i,"username");
      $derby  = mysql_result($result,$i,"derby");

      echo "<tr><td>$uname</td><td>$derby</td>
      		<td><form action='adminprocess.php' method='POST'>
      		<input type='hidden' name='upduser' value='".$uname."'>
      		Level:		<select name='updlevel'>
						<option value='2'>NSO (2)
						<option value='2'>Ref (3)
						<option value='9'>Admin (9)
						</select>
			<input type='hidden' name='subverifyuser' value='1'>
			<input type='submit' value='Verify User'></form></td></tr>\n";
   }
   echo "</table><br>\n";
}
   
/**
 * User not an administrator, redirect to main page
 * automatically.
 */
if(!$session->isAdmin()){
   header("Location: ../../index.php");
}
else{
/**
 * Administrator is viewing page, so display all
 * forms.
 */
?>
<html>
	<head>
		<title>Admin Center</title>
		<?php include '../../header.php' ?>
		
		<script>
			function showhide(id){
				if (document.getElementById){
					obj = document.getElementById(id);
					if (obj.style.display == "none"){
						obj.style.display = "";
					} else {
						obj.style.display = "none";
					}
				}
			}
		</script>
	
	</head>
	<body>
		<div class="main-container">
  				<div class="container1">
    				<div class="box">
						<h1>Admin Center</h1>
						<font size="5" color="#ff0000">
						<b>::::::::::::::::::::::::::::::::::::::::::::</b></font>
						<font size="4">Logged in as <b><? echo $session->username; ?></b></font><br><br>
						<?
						if($form->num_errors > 0){
						   echo "<font size=\"4\" color=\"#ff0000\">"
							   ."!*** Error with request, please fix</font><br><br>";
						}
						?>
						<table align="left" border="0" cellspacing="5" cellpadding="5">
						<tr><td>
						<?
						/**
						 * Display New Users Table
						 */
						?>
						<h3>Verify Users:</h3>
						<?
						displayNewUsers();
						?>
						</td></tr>
						<tr>
						<td>
						<br>
						<?
						/**
						 * Update User Level
						 */
						?>
						<h3>Update User Level</h3>
						<? echo $form->error("upduser"); ?>
						<table>
						<form action="adminprocess.php" method="POST">
						<tr><td>
						Username:<br>
						<input type="text" name="upduser" maxlength="30" autocomplete="off" value="<? echo $form->value("upduser"); ?>">
						</td>
						<td>
						Level:<br>
						<select name="updlevel">
						<option value="1">New User (1)
						<option value="2">NSO (2)
						<option value="2">Ref (3)
						<option value="9">Admin (9)
						</select>
						</td>
						<td>
						<br>
						<input type="hidden" name="subupdlevel" value="1">
						<input type="submit" value="Update Level">
						</td></tr>
						</form>
						</table>
						</td>
						</tr>
						<tr><td><div id="usertable" style="display:none">
						<?
						/**
						 * Display Users Table
						 */
						?>
						<h3>Users Table Contents:</h3>
						<?
						displayUsers();
						?>
						</div><a href="javascript:showhide('usertable');">Show/Hide User Table</a></td></tr>
						<tr>
						<td><hr></td>
						</tr>
						<tr>
						<td>
						<?
						/**
						 * Delete User
						 */
						?>
						<h3>Delete User</h3>
						<? echo $form->error("deluser"); ?>
						<form action="adminprocess.php" method="POST">
						Username:<br>
						<input type="text" name="deluser" autocomplete="off" maxlength="30" value="<? echo $form->value("deluser"); ?>">
						<input type="hidden" name="subdeluser" value="1">
						<input type="submit" value="Delete User">
						</form>
						</td>
						</tr>
						<tr>
						<td><hr></td>
						</tr>
						<tr>
						<td>
						<?
						/**
						 * Delete Inactive Users
						 */
						?>
						<h3>Delete Inactive Users</h3>
						This will delete all users (not administrators), who have not logged in to the site<br>
						within a certain time period. You specify the days spent inactive.<br><br>
						<table>
						<form action="adminprocess.php" method="POST">
						<tr><td>
						Days:<br>
						<select name="inactdays">
						<option value="3">3
						<option value="7">7
						<option value="14">14
						<option value="30">30
						<option value="100">100
						<option value="365">365
						</select>
						</td>
						<td>
						<br>
						<input type="hidden" name="subdelinact" value="1">
						<input type="submit" value="Delete All Inactive">
						</td>
						</form>
						</table>
						</td>
						</tr>
						<tr>
						<td><hr></td>
						</tr>
						<tr>
						<td>
						<?
						/**
						 * Ban User
						 */
						?>
						<h3>Ban User</h3>
						<? echo $form->error("banuser"); ?>
						<form action="adminprocess.php" method="POST">
						Username:<br>
						<input type="text" name="banuser" maxlength="30" value="<? echo $form->value("banuser"); ?>">
						<input type="hidden" name="subbanuser" value="1">
						<input type="submit" value="Ban User">
						</form>
						</td>
						</tr>
						<tr>
						<td><hr></td>
						</tr>
						<tr><td>
						<?
						/**
						 * Display Banned Users Table
						 */
						?>
						<h3>Banned Users Table Contents:</h3>
						<?
						displayBannedUsers();
						?>
						</td></tr>
						<tr>
						<td><hr></td>
						</tr>
						<tr>
						<td>
						<?
						/**
						 * Delete Banned User
						 */
						?>
						<h3>Delete Banned User</h3>
						<? echo $form->error("delbanuser"); ?>
						<form action="adminprocess.php" method="POST">
						Username:<br>
						<input type="text" name="delbanuser" maxlength="30" value="<? echo $form->value("delbanuser"); ?>">
						<input type="hidden" name="subdelbanned" value="1">
						<input type="submit" value="Delete Banned User">
						</form>
						</td>
						</tr>
						</table>
						<div class="clear"></div>
    <div class="clear"></div>
    </div>
    
 </div>

</div>
</body>
</html>
<?
}
?>

