<?php
include("login/include/session.php");
global $database;
$config = $database->getConfigs();
?>
<!DOCTYPE html>
<!--[if lt IE 7 ]> <html lang="en" class="ie6 ielt8"> <![endif]-->
<!--[if IE 7 ]>    <html lang="en" class="ie7 ielt8"> <![endif]-->
<!--[if IE 8 ]>    <html lang="en" class="ie8"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--> <html lang="en"> <!--<![endif]-->
<head>
<meta charset="utf-8">
<title>SCRG Officials</title>
<style>
/* Reset CSS */
html, body, div, span, applet, object, iframe,
h1, h2, h3, h4, h5, h6, p, blockquote, pre,
a, abbr, acronym, address, big, cite, code,
del, dfn, em, font, img, ins, kbd, q, s, samp,
small, strike, strong, sub, sup, tt, var,
b, u, i, center,
dl, dt, dd, ol, ul, li,
fieldset, form, label, legend,
table, caption, tbody, tfoot, thead, tr, th, td {
	margin: 0;
	padding: 0;
	border: 0;
	outline: 0;
	font-size: 100%;
	vertical-align: baseline;
	background: transparent;
}
body {
	background: #DCDDDF url(http://cssdeck.com/uploads/media/items/7/7AF2Qzt.png);
	color: #000;
	font: 14px Arial;
	margin: 0 auto;
	padding: 0;
	position: relative;
}
h1{ font-size:28px;}
h2{ font-size:26px;}
h3{ font-size:18px;}
h4{ font-size:16px;}
h5{ font-size:14px;}
h6{ font-size:12px;}
h1,h2,h3,h4,h5,h6{ color:#563D64;}
small{ font-size:10px;}
b, strong{ font-weight:bold;}
a{ text-decoration: none; }
a:hover{ text-decoration: underline; }
.left { float:left; }
.right { float:right; }
.alignleft { float: left; margin-right: 15px; }
.alignright { float: right; margin-left: 15px; }
.clearfix:after,
form:after {
	content: ".";
	display: block;
	height: 0;
	clear: both;
	visibility: hidden;
}
.container { margin: 25px auto; position: relative; width: 900px; }
#content {
	background: #f9f9f9;
	background: -moz-linear-gradient(top,  rgba(248,248,248,1) 0%, rgba(249,249,249,1) 100%);
	background: -webkit-linear-gradient(top,  rgba(248,248,248,1) 0%,rgba(249,249,249,1) 100%);
	background: -o-linear-gradient(top,  rgba(248,248,248,1) 0%,rgba(249,249,249,1) 100%);
	background: -ms-linear-gradient(top,  rgba(248,248,248,1) 0%,rgba(249,249,249,1) 100%);
	background: linear-gradient(top,  rgba(248,248,248,1) 0%,rgba(249,249,249,1) 100%);
	filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#f8f8f8', endColorstr='#f9f9f9',GradientType=0 );
	-webkit-box-shadow: 0 1px 0 #fff inset;
	-moz-box-shadow: 0 1px 0 #fff inset;
	-ms-box-shadow: 0 1px 0 #fff inset;
	-o-box-shadow: 0 1px 0 #fff inset;
	box-shadow: 0 1px 0 #fff inset;
	border: 1px solid #c4c6ca;
	margin: 0 auto;
	padding: 25px 0 0;
	position: relative;
	text-align: center;
	text-shadow: 0 1px 0 #fff;
	width: 400px;
}
#content h1 {
	color: #7E7E7E;
	font: bold 25px Helvetica, Arial, sans-serif;
	letter-spacing: -0.05em;
	line-height: 20px;
	margin: 10px 0 30px;
}
#content h1:before,
#content h1:after {
	content: "";
	height: 1px;
	position: absolute;
	top: 10px;
	width: 27%;
}
#content h1:after {
	background: rgb(126,126,126);
	background: -moz-linear-gradient(left,  rgba(126,126,126,1) 0%, rgba(255,255,255,1) 100%);
	background: -webkit-linear-gradient(left,  rgba(126,126,126,1) 0%,rgba(255,255,255,1) 100%);
	background: -o-linear-gradient(left,  rgba(126,126,126,1) 0%,rgba(255,255,255,1) 100%);
	background: -ms-linear-gradient(left,  rgba(126,126,126,1) 0%,rgba(255,255,255,1) 100%);
	background: linear-gradient(left,  rgba(126,126,126,1) 0%,rgba(255,255,255,1) 100%);
    right: 0;
}
#content h1:before {
	background: rgb(126,126,126);
	background: -moz-linear-gradient(right,  rgba(126,126,126,1) 0%, rgba(255,255,255,1) 100%);
	background: -webkit-linear-gradient(right,  rgba(126,126,126,1) 0%,rgba(255,255,255,1) 100%);
	background: -o-linear-gradient(right,  rgba(126,126,126,1) 0%,rgba(255,255,255,1) 100%);
	background: -ms-linear-gradient(right,  rgba(126,126,126,1) 0%,rgba(255,255,255,1) 100%);
	background: linear-gradient(right,  rgba(126,126,126,1) 0%,rgba(255,255,255,1) 100%);
    left: 0;
}
#content:after,
#content:before {
	background: #f9f9f9;
	background: -moz-linear-gradient(top,  rgba(248,248,248,1) 0%, rgba(249,249,249,1) 100%);
	background: -webkit-linear-gradient(top,  rgba(248,248,248,1) 0%,rgba(249,249,249,1) 100%);
	background: -o-linear-gradient(top,  rgba(248,248,248,1) 0%,rgba(249,249,249,1) 100%);
	background: -ms-linear-gradient(top,  rgba(248,248,248,1) 0%,rgba(249,249,249,1) 100%);
	background: linear-gradient(top,  rgba(248,248,248,1) 0%,rgba(249,249,249,1) 100%);
	filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#f8f8f8', endColorstr='#f9f9f9',GradientType=0 );
	border: 1px solid #c4c6ca;
	content: "";
	display: block;
	height: 100%;
	left: -1px;
	position: absolute;
	width: 100%;
}
#content:after {
	-webkit-transform: rotate(2deg);
	-moz-transform: rotate(2deg);
	-ms-transform: rotate(2deg);
	-o-transform: rotate(2deg);
	transform: rotate(2deg);
	top: 0;
	z-index: -1;
}
#content:before {
	-webkit-transform: rotate(-3deg);
	-moz-transform: rotate(-3deg);
	-ms-transform: rotate(-3deg);
	-o-transform: rotate(-3deg);
	transform: rotate(-3deg);
	top: 0;
	z-index: -2;
}
#content form { margin: 0 20px; position: relative }
#content form input[type="text"],
#content form input[type="tel"],
#content form input[type="password"] {
	-webkit-border-radius: 3px;
	-moz-border-radius: 3px;
	-ms-border-radius: 3px;
	-o-border-radius: 3px;
	border-radius: 3px;
	-webkit-box-shadow: 0 1px 0 #fff, 0 -2px 5px rgba(0,0,0,0.08) inset;
	-moz-box-shadow: 0 1px 0 #fff, 0 -2px 5px rgba(0,0,0,0.08) inset;
	-ms-box-shadow: 0 1px 0 #fff, 0 -2px 5px rgba(0,0,0,0.08) inset;
	-o-box-shadow: 0 1px 0 #fff, 0 -2px 5px rgba(0,0,0,0.08) inset;
	box-shadow: 0 1px 0 #fff, 0 -2px 5px rgba(0,0,0,0.08) inset;
	-webkit-transition: all 0.5s ease;
	-moz-transition: all 0.5s ease;
	-ms-transition: all 0.5s ease;
	-o-transition: all 0.5s ease;
	transition: all 0.5s ease;
	background: #eae7e7 url(http://cssdeck.com/uploads/media/items/8/8bcLQqF.png) no-repeat;
	border: 1px solid #c8c8c8;
	color: #777;
	font: 13px Helvetica, Arial, sans-serif;
	margin: 0 0 10px;
	padding: 15px 10px 15px 40px;
	width: 80%;
}
#content form input[type="text"]:focus,
#content form input[type="tel"]:focus,
#content form input[type="password"]:focus {
	-webkit-box-shadow: 0 0 2px #ed1c24 inset;
	-moz-box-shadow: 0 0 2px #ed1c24 inset;
	-ms-box-shadow: 0 0 2px #ed1c24 inset;
	-o-box-shadow: 0 0 2px #ed1c24 inset;
	box-shadow: 0 0 2px #ed1c24 inset;
	background-color: #fff;
	border: 1px solid #ed1c24;
	outline: none;
}
#username { background-position: 10px 10px !important }
#password { background-position: 10px -53px !important }
#content form input[type="submit"] {
	background: rgb(254,231,154);
	background: -moz-linear-gradient(top,  rgba(254,231,154,1) 0%, rgba(254,193,81,1) 100%);
	background: -webkit-linear-gradient(top,  rgba(254,231,154,1) 0%,rgba(254,193,81,1) 100%);
	background: -o-linear-gradient(top,  rgba(254,231,154,1) 0%,rgba(254,193,81,1) 100%);
	background: -ms-linear-gradient(top,  rgba(254,231,154,1) 0%,rgba(254,193,81,1) 100%);
	background: linear-gradient(top,  rgba(254,231,154,1) 0%,rgba(254,193,81,1) 100%);
	filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#fee79a', endColorstr='#fec151',GradientType=0 );
	-webkit-border-radius: 30px;
	-moz-border-radius: 30px;
	-ms-border-radius: 30px;
	-o-border-radius: 30px;
	border-radius: 30px;
	-webkit-box-shadow: 0 1px 0 rgba(255,255,255,0.8) inset;
	-moz-box-shadow: 0 1px 0 rgba(255,255,255,0.8) inset;
	-ms-box-shadow: 0 1px 0 rgba(255,255,255,0.8) inset;
	-o-box-shadow: 0 1px 0 rgba(255,255,255,0.8) inset;
	box-shadow: 0 1px 0 rgba(255,255,255,0.8) inset;
	border: 1px solid #D69E31;
	color: #85592e;
	cursor: pointer;
	float: left;
	font: bold 15px Helvetica, Arial, sans-serif;
	height: 35px;
	margin: 20px 0 35px 15px;
	position: relative;
	text-shadow: 0 1px 0 rgba(255,255,255,0.5);
	width: 120px;
}
#content form input[type="submit"]:hover {
	background: rgb(254,193,81);
	background: -moz-linear-gradient(top,  rgba(254,193,81,1) 0%, rgba(254,231,154,1) 100%);
	background: -webkit-linear-gradient(top,  rgba(254,193,81,1) 0%,rgba(254,231,154,1) 100%);
	background: -o-linear-gradient(top,  rgba(254,193,81,1) 0%,rgba(254,231,154,1) 100%);
	background: -ms-linear-gradient(top,  rgba(254,193,81,1) 0%,rgba(254,231,154,1) 100%);
	background: linear-gradient(top,  rgba(254,193,81,1) 0%,rgba(254,231,154,1) 100%);
	filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#fec151', endColorstr='#fee79a',GradientType=0 );
}
#content form div a {
	color: #004a80;
    float: right;
    font-size: 12px;
    margin: 30px 15px 0 0;
    text-decoration: underline;
}
.button {
	background: rgb(247,249,250);
	background: -moz-linear-gradient(top,  rgba(247,249,250,1) 0%, rgba(240,240,240,1) 100%);
	background: -webkit-linear-gradient(top,  rgba(247,249,250,1) 0%,rgba(240,240,240,1) 100%);
	background: -o-linear-gradient(top,  rgba(247,249,250,1) 0%,rgba(240,240,240,1) 100%);
	background: -ms-linear-gradient(top,  rgba(247,249,250,1) 0%,rgba(240,240,240,1) 100%);
	background: linear-gradient(top,  rgba(247,249,250,1) 0%,rgba(240,240,240,1) 100%);
	filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#f7f9fa', endColorstr='#f0f0f0',GradientType=0 );
	-webkit-box-shadow: 0 1px 2px rgba(0,0,0,0.1) inset;
	-moz-box-shadow: 0 1px 2px rgba(0,0,0,0.1) inset;
	-ms-box-shadow: 0 1px 2px rgba(0,0,0,0.1) inset;
	-o-box-shadow: 0 1px 2px rgba(0,0,0,0.1) inset;
	box-shadow: 0 1px 2px rgba(0,0,0,0.1) inset;
	-webkit-border-radius: 0 0 5px 5px;
	-moz-border-radius: 0 0 5px 5px;
	-o-border-radius: 0 0 5px 5px;
	-ms-border-radius: 0 0 5px 5px;
	border-radius: 0 0 5px 5px;
	border-top: 1px solid #CFD5D9;
	padding: 15px 0;
}
.button a {
	background: url(http://cssdeck.com/uploads/media/items/8/8bcLQqF.png) 0 -112px no-repeat;
	color: #7E7E7E;
	font-size: 17px;
	padding: 2px 0 2px 40px;
	text-decoration: none;
	-webkit-transition: all 0.3s ease;
	-moz-transition: all 0.3s ease;
	-ms-transition: all 0.3s ease;
	-o-transition: all 0.3s ease;
	transition: all 0.3s ease;
}
.button a:hover {
	background-position: 0 -135px;
	color: #00aeef;
}
</style>
<?php 
$id = isset($_GET['id']) ? $_GET['id'] : 1;
if ($config['ENABLE_CAPTCHA']){
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="login/captcha/jquery/QapTcha.jquery.css" type="text/css" />
<?php 
} 
?>
</head>
<body>
<?php
/**
 * The user is already logged in, not allowed to register.
 */
if($session->logged_in){
   echo "<h1>Registered</h1>";
   echo "<p>We're sorry <b>$session->username</b>, but you've already registered. "
       ."<a href=\"main.php\">Main</a>.</p>";
}
/**
 * The user has submitted the registration form and the
 * results have been processed.
 */

	else if(isset($_SESSION['regsuccess'])){
	
	if ($_SESSION['regsuccess']==6){
      echo "<h1>Registration is currently disabled!</h1>";
      echo "<p>We're sorry <b>".$_SESSION['reguname']."</b> but registration to this site is currently disabled."
          ."<br>Please try again at a later time or contact the website owner.</p>";
	}
	/* Registration was successful */
	else if($_SESSION['regsuccess']==0 || $_SESSION['regsuccess']==5){
      echo "<h1>Registered!</h1>";
      echo "<p>Thank you <b>".$_SESSION['reguname']."</b>, your information has been added to the database, "
          ."you may now <a href=\"main.php\">log in</a>.</p>";
	}
	else if($_SESSION['regsuccess']==3){
      echo "<h1>Registered!</h1>";
      echo "<p>Thank you <b>".$_SESSION['reguname']."</b>, your account has been created. "
          ."However, this board requires account activation, an activation key has been sent to the e-mail address you provided. "
          ."Please check your e-mail for further information.</p>";
	}
	else if($_SESSION['regsuccess']==4){
      echo "<h1>Registered!</h1>";
      echo "<p>Thank you <b>".$_SESSION['reguname']."</b>, your account has been created. "
          ."However, this board requires account activation by an Admin. An e-mail has been sent to them and you will be informed "
          ."when your account has been activated.</p>";
   }
   /* Registration failed */
   else if ($_SESSION['regsuccess']==2){
      echo "<h1>Registration Failed</h1>";
      echo "<p>We're sorry, but an error has occurred and your registration for the username <b>".$_SESSION['reguname']."</b>, "
          ."could not be completed.<br>Please try again at a later time.</p>";
   }
   unset($_SESSION['regsuccess']);
   unset($_SESSION['reguname']);
   } 
    else if ((isset($_GET['mode'])) && ($_GET['mode'] == 'activate')) {
	$user = $_GET['user'];
	$actkey = $_GET['activatecode'];
	
	$sql = $database->connection->prepare("UPDATE ".TBL_USERS." SET USERLEVEL = '3' WHERE username=:user AND actkey=:actkey");
	$sql->bindParam(":user",$user);
	$sql->bindParam(":actkey",$actkey);
	$sql->execute();
	
	echo 'Your account is now activated.';
	// some warning if not successful
}
/**
 * The user has not filled out the registration form yet.
 * Below is the page with the sign-up form, the names
 * of the input fields are important and should not
 * be changed.
 */
else{
?>
<div class="container">
	<section id="content">
		<form action="login/process.php" method="POST">
			<h1>Register</h1>
			<?php
				if($form->num_errors > 0){
				   echo "<td style=\"color:#ff0000\">".$form->num_errors." error(s) found</td>";
				}
			?>
			<div>
				<input type="text" name="user" placeholder="Username" value="<?php echo $form->value("user"); ?>" /><?php echo $form->error("user"); ?>
			</div>
			<div>
				<input type="password" name="pass" placeholder="Password" value="<?php echo $form->value("pass"); ?>" /><?php echo $form->error("pass"); ?>
			</div>
			<div>
				<input type="password" name="conf_pass" placeholder="Confirm Pass" value="<?php echo $form->value("conf_pass"); ?>" /><?php echo $form->error("pass"); ?>
			</div>
			<div>
				<input type="text" name="email" placeholder="Email" value="<?php echo $form->value("email"); ?>" /><?php echo $form->error("email"); ?>
			</div>
			<div>
				<input type="text" name="conf_email" placeholder="Confirm Email" value="<?php echo $form->value("conf_email"); ?>" /><?php echo $form->error("email"); ?>
			</div>
			<div>
				<input type="text" name="name" placeholder="Name" />
			</div>
			<div>
				<input type="text" name="derbyname" placeholder="Derby Name" />
			</div>
			<div>
				<input type="tel" name="phone" placeholder="Phone #" />
			</div>
			<?php 
				if ($config['ENABLE_CAPTCHA']){
					echo "<div class=\"QapTcha\"></div>";
				}
			?>
			<div>
				<input type="hidden" name="subjoin" value="1" />
				<input type="submit" value="Register!" id="submit" />
				<?php echo "<a href=".$config['WEB_ROOT'].$config['home_page'].">Back to Login Page</a>"; ?>
				<!-- The following div tag displays a hidden form field in an attempt at tricking automated bots. -->
				<div style='display:none; visibility:hidden;'><input type='text' name='killbill' maxlength='50' /></div>
			</div>
			<?php 
				if ($config['ENABLE_CAPTCHA']){
			?>
				<!-- QapTcha and jQuery files -->
				<script type="text/javascript" src="login/captcha/jquery/jquery.js"></script>
				<script type="text/javascript" src="login/captcha/jquery/jquery-ui.js"></script>
				<script type="text/javascript" src="login/captcha/jquery/jquery.ui.touch.js"></script>
				<script type="text/javascript" src="login/captcha/jquery/QapTcha.jquery.js"></script>
				<script type="text/javascript">
						$('.QapTcha').QapTcha({});
					</script>
			<?php
				}
				}
			?>
		</form><!-- form -->
	</section><!-- content -->
</div><!-- container -->
</body>
</html>