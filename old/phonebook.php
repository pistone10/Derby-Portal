<? include 'login/include/session.php' ?>
<!DOCTYPE html>
	<head>
		<title>Create Topic</title>
		<?php include 'header.php' ?>
	</head>
	
	<body>
		<div class="main-container">
		  <div class="container1">
			<div class="box">
<? $sql = "select * from users where list = 0";

$result = mysql_query($sql);
if (! $result){
   echo "Database error". mysql_error();
}
?>

<table style='text-align:center'>
	<tr>
		<td><h1>Derby Name</h2></td>
		<td><h1>Phone Number</h1></td>
	</tr>
	<? while($row = mysql_fetch_array($result)){
		echo "<tr><td>".$row['derby'];
		echo "</td><td>".$row['tel'];
		echo "</td></tr>";
	} ?>
</table>
			
							<br />
					<div class="clear"></div>
					<div class="clear"></div>
					</div>
					
				 </div>
			</div>
	</body>
</html>