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
				<? if($_SERVER['REQUEST_METHOD'] != 'POST')
				{	
					//the form hasn't been posted yet, display it
					//retrieve the categories from the database for use in the dropdown
					$sql = "SELECT
								cat_id,
								cat_name,
								cat_description
							FROM
								categories";
					
					$result = mysql_query($sql);
					
					if(!$result)
					{
						//the query failed, uh-oh :-(
						echo 'Error while selecting from database. Please try again later.';
					}
					else
					{
						if(mysql_num_rows($result) == 0)
						{
							//there are no categories, so a topic can't be posted
							if($session->isAdmin()) 
							{
								echo 'You have not created categories yet.';
							}
							else
							{
								echo 'Before you can post a topic, you must wait for an admin to create some categories.';
							}
						}
						else
						{
					
							echo '<form method="post" action="">
								Subject: <input type="text" name="topic_subject" /><br />'; 
							
							echo '<input type="hidden" name="topic_cat" value="1">';
								
							echo 'Message: <br /><textarea name="post_content" /></textarea><br /><br />
								<input type="submit" value="Create topic" />
							 </form>';
						}
					}
				}
				else
				{
					//start the transaction
					$query  = "BEGIN WORK;";
					$result = mysql_query($query);
					
					if(!$result)
					{
						//Damn! the query failed, quit
						echo 'An error occured while creating your topic. Please try again later.';
					}
					else
					{
				
						//the form has been posted, so save it
						//insert the topic into the topics table first, then we'll save the post into the posts table
						$sql = "INSERT INTO 
									topics(topic_subject,
										   topic_date,
										   topic_cat,
										   topic_by)
							   VALUES('" . mysql_real_escape_string($_POST['topic_subject']) . "',
										   NOW(),
										   " . mysql_real_escape_string($_POST['topic_cat']) . ",
										   '" . $session->username . "'
										   )";
								 
						$result = mysql_query($sql);
						if(!$result)
						{
							//something went wrong, display the error
							echo 'An error occured while inserting your data. Please try again later.<br /><br />' . mysql_error();
							$sql = "ROLLBACK;";
							$result = mysql_query($sql);
						}
						else
						{
							//the first query worked, now start the second, posts query
							//retrieve the id of the freshly created topic for usage in the posts query
							$topicid = mysql_insert_id();
							
							$sql = "INSERT INTO
										posts(post_content,
											  post_date,
											  post_topic,
											  post_by)
									VALUES
										('" . mysql_real_escape_string($_POST['post_content']) . "',
											  NOW(),
											  " . $topicid . ",
											  '" . $session->username . "'
										)";
							$result = mysql_query($sql);
							
							if(!$result)
							{
								//something went wrong, display the error
								echo 'An error occured while inserting your post. Please try again later.<br /><br />' . mysql_error();
								$sql = "ROLLBACK;";
								$result = mysql_query($sql);
							}
							else
							{
								$sql = "COMMIT;";
								$result = mysql_query($sql);
								
								//after a lot of work, the query succeeded!
								echo 'You have succesfully created your new topic.';
							}
						}
					}
					
					$sql = "SELECT	
								email
							FROM
								users";
					
					$result = mysql_query($sql);
					
					while($row = mysql_fetch_assoc($result))
					{	
						$to = $row['email'];
						
						// subject
						$subject = '[SCRG_Officials] '.mysql_real_escape_string($_POST['topic_subject']);
						
						// message
						$message = '
						<html>
						<head>
						  <title>'.$row['topic_subject'].'</title>
						</head>
						<body>
						  <p>'.$session->username.' has sent a new message</p>
						  <p>'.mysql_real_escape_string($_POST['post_content']).'</p>
						  <p>If you would like to reply to this message <a href="http://nitelifeconcepts.com/scrg">Click Here</a> then login to view messages</p>
						</body>
						</html>
						';
						
						// To send HTML mail, the Content-type header must be set
						$headers  = 'MIME-Version: 1.0' . "\r\n";
						$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
						
						// Additional headers
						$headers .= 'From: [SCRG_Officials] '.$session->username.' <NO-REPLY@nitelifeconcepts.com>' . "\r\n";
						
						// Mail it
						mail($to, $subject, $message, $headers);
					}					
					
				} 
				?>
							<br />
					<div class="clear"></div>
					<div class="clear"></div>
					</div>
					
				 </div>
			</div>
	</body>
</html>