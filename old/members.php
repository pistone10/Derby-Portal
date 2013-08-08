<? include 'login/include/session.php' ?>
<!DOCTYPE html>
	<head>
		<title>Member List</title>
		<?php include 'header.php' ?>
	</head>
	
	<body>
		<div class="main-container">
		  <div class="container1">
			<div class="box">
<? $sql = "select * from users";

$result = mysql_query($sql);
if (! $result){
   echo "Database error". mysql_error();
}
?>

<table style='text-align:center'>
	<tr>
		<td><h1>Derby Name</h2></td>
		<td><h1>Real Name</h2></td>
		<td><h1>Email</h1></td>
	</tr>
	<? while($row = mysql_fetch_array($result)){
		echo "<tr><td>".$row['derby'];
		echo "</td>";
		echo "<td>".$row['real']."</td><td>".$row['email'];
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