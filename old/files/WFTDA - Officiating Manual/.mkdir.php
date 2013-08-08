<?php 
		$name=$_POST["destination"];
		$uploaddir = $name;
		mkdir($uploaddir,0777);
		mkdir($uploaddir.'/.images',0777);
		copy('.htaccess', $uploaddir.'/.htaccess');
		copy('.images/.index.php', $uploaddir.'/.images/.index.php');
		copy('.images/css.png', $uploaddir.'/.images/css.png');
		copy('.images/file.png', $uploaddir.'/.images/file.png');
		copy('.images/folder.png', $uploaddir.'/.images/folder.png');
		copy('.images/image.png', $uploaddir.'/.images/css.png');
		copy('.images/office.png', $uploaddir.'/.images/office.png');
		copy('.images/php.png', $uploaddir.'/.images/php.png');
		copy('.images/script.png', $uploaddir.'/.images/script.png');
		copy('.images/sound.png', $uploaddir.'/.images/sound.png');
		copy('.images/video.png', $uploaddir.'/.images/video.png');
		copy('.images/word.png', $uploaddir.'/.images/word.png');
		copy('.images/xml.png', $uploaddir.'/.images/xml.png');
		copy('.images/zip.png', $uploaddir.'/.images/zip.png');
		copy('.index.php', $uploaddir.'/.index.php');
		copy('.sorttable.js', $uploaddir.'/.sorttable.js');
		copy('.style.css', $uploaddir.'/.style.css');
		copy('.mkdir.php', $uploaddir.'/.mkdir.php');
?>
<html>
	<head>
		<script type="text/javascript">
			<!--
			function delayer(){
				window.location = "<? echo $uploaddir ?>"
			}
			//-->
		</script>
	</head>
	<body onLoad="setTimeout('delayer()', 2000)">
		<center>
		<h2>Creating Directory</h2>
			<p>You will be redirected shortly</p>
			<p>If for some reason you were not redirected please <a href="<? echo $uploaddir?>">Click Here</a>
		</center>
	</body>
</html>