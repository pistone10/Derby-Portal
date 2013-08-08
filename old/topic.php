<? include 'login/include/session.php' ?>
<!DOCTYPE html>
	<head>
		<title>Topic</title>
		<?php include 'header.php' ?>
	</head>
	
	<body>
		<div class="main-container">
		  <div class="container1">
			<div class="box">
				<? $sql = "SELECT
							topic_id,
							topic_subject
						FROM
							topics
						WHERE
							topics.topic_id = " . mysql_real_escape_string($_GET['id']);
							
				$result = mysql_query($sql);
				
				if(!$result)
				{
					echo 'The topic could not be displayed, please try again later.';
				}
				else
				{
					if(mysql_num_rows($result) == 0)
					{
						echo 'This topic doesn&prime;t exist.';
					}
					else
					{
						while($row = mysql_fetch_assoc($result))
						{
							//display post data
							echo '<table class="topic" border="1">
									<tr>
										<th colspan="2">' . stripslashes($row['topic_subject']) . '</th>
									</tr>';
						
							//fetch the posts from the database
							$posts_sql = "SELECT
										posts.post_topic,
										posts.post_content,
										posts.post_date,
										posts.post_by,
										users.username,
										users.derby
									FROM
										posts
									LEFT JOIN
										users
									ON
										posts.post_by = users.username
									WHERE
										posts.post_topic = " . mysql_real_escape_string($_GET['id'])."
									ORDER BY
										posts.post_date";
										
							$posts_result = mysql_query($posts_sql);
							
							if(!$posts_result)
							{
								echo '<tr><td>The posts could not be displayed, please try again later.</tr></td></table>';
							}
							else
							{
							
								while($posts_row = mysql_fetch_assoc($posts_result))
								{
									echo '<tr class="topic-post">
											<td class="user-post">' . $posts_row['derby'] . '<br/>' . date('d-m-Y H:i', strtotime($posts_row['post_date'])) . '</td>
											<td class="post-content"><form><textarea readonly>' . htmlentities(stripslashes($posts_row['post_content'])) . '</textarea></form></td>
										  </tr>';
								}
							}
							
							if(!$session->logged_in)
							{
								echo '<tr><td colspan=2>You must be <a href="signin.php">signed in</a> to reply. You can also <a href="signup.php">sign up</a> for an account.';
							}
							else
							{
								//show reply box
								echo '<tr><td colspan="2"><h2>Reply:</h2><br />
									<form method="post" action="reply.php?id=' . $row['topic_id'] . '">
										<textarea name="reply-content"></textarea><br /><br />
										<input type="submit" value="Submit reply" />
									</form></td></tr>';
							}
							
							//finish the table
							echo '</table>';
						}
					}
				} ?>
				<br />
					<div class="clear"></div>
					<div class="clear"></div>
					</div>
					
				 </div>
			</div>
	</body>
</html>
