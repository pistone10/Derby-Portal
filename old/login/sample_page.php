<?php
include("include/session.php");
/**
 * User not an administrator, redirect to main page
 * automatically.
 */
if(!$session->isVer()){
   header("Location: main.php");
}
else{
/**
 * Administrator is viewing page, so display all
 * forms.
 */
?>
<html>
	<head>
		<title>Test Page</title>
	</head>
	
	<body>
		<p>it worked</p>
	</body>
</html>
<?php
}
?>