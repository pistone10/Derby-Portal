<?php
//create_cat.php
include 'login/include/session.php';
include 'header.php';

if($_SERVER['REQUEST_METHOD'] != 'POST')
{
	//someone is calling the file directly, which we don't want
	echo 'This file cannot be called directly.';
}
else
{
	//check for sign in status
	if(!$session->logged_in)
	{
		echo 'You must be signed in to post a reply.';
	}
	else
	{
		//a real user posted a real reply
		$sql = "INSERT INTO 
					posts(post_content,
						  post_date,
						  post_topic,
						  post_by) 
				VALUES ('" . $_POST['reply-content'] . "',
						NOW(),
						" . mysql_real_escape_string($_GET['id']) . ",
						'" . $session->username . "')";
						
		$result = mysql_query($sql);
						
		if(!$result)
		{
			echo 'Your reply has not been saved, please try again later.';
		}
		else
		{
			echo 'Your reply has been saved, check out <a href="topic.php?id=' . htmlentities($_GET['id']) . '">the topic</a>.';
		}
		
		$sql = "SELECT	
					email,
					topics.topic_id,
					topics.topic_subject
				FROM
					users
				JOIN
					topics
				WHERE
					topic_id=".mysql_real_escape_string($_GET['id']);
		
		$result = mysql_query($sql);
		
		while($row = mysql_fetch_assoc($result))
		{	
			$to = $row['email'];
			
			// subject
			$subject = '[SCRG_Officials] '.$row['topic_subject'];
			
			// message
			$message = '
			<html>
			<head>
			  <title>'.$row['topic_subject'].'</title>
			</head>
			<body>
			  <p>'.$session->username.' has sent a new message</p>
			  <p>'.$_POST['reply-content'].'</p>
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
}
?>