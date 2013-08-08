<?php
include("login/include/session.php");
?>
<!DOCTYPE html>
<head>
	<title>Fabulous Sin City Rollergirls Officials</title>
	<?php include 'header.php' ?>
</head>
<body>
<?php include 'menu.php' ?>
<div class="main-container">
  <header>
    <h1><a href="index.php">Sin City Rollergirls Officials</a></h1>
    <p id="tagline">
    	News, Bout Registration, and So forth for the officials
    </p>
  </header>
</div>
<div class="main-container">
  <div id="sub-headline">
    <div class="tagline_left"><p id="tagline2">Tel: 123 333 4444 | Mail: <a href="mailto:email@website.com">email@website.com</a></p></div>
    <div class="tagline_right">
		// right tagline
    </div>
    <br class="clear" />
  </div>
</div>
<br />
<br />

<div class="main-container">
  <div class="container1">
    <div class="box">
    <? if(!$session->logged_in) { ?>
        <h1>Behind every great derby league...<br />
        	IS A GREAT CREW OF OFFICIALS!!!  </h1>
        	
        <h2>WE'RE  RECRUITING SKATING REFEREES!<br />
            BUT YOU DONT HAVE TO ROLL TO ROCK...<br />
          	BECOME A NON-SKATING OFFICIAL RIGHT NOW!!<br /></h2>
        
		<div class="date"><img src="images/scw.jpg" height="100"></div><p>Have you ever wanted to become more than a roller derby fan but not ready or interested in being on the bad end of a hit? Well, we some news for you.Yes, you too can become a part of the action while staying somewhat safe from harm’s way!</p><br />
        
        <p>By becoming a referee or non-skating official, you will gain a richer appreciation of the sport. You will finally know what all those hand signals mean, the difference between major and minor violations and the reason why your favorite roller girl ended up in the penalty box or send her there yourself. </p><br />
                
        <p>Roller derby looks and feels entirely different when it is orbiting around YOU. The officials are an integral part of the game, without them the whistle doesn’t blow and the bout doesn’t take place. How often can you whistle and point at people without it being considered rude? You get to yell at them (and they have to listen, though they may yell a few choice words in your general direction) and send adults basically into a timeout. That alone is worth considering taking your enthusiasm for the sport to the next level. </p><br />
                
        <p>Remember with great power comes great responsibility. Being an official comes with tremendous responsibility. You must be fair and totally unbiased. You will have to keep your emotions in check while working a bout. When you are in the role of official your job is to ensure the outcome of the bout is as honest as possible. </p><br />
                
        <p>Only real men (and women) can wear pink.  NSOs are always pretty in pink. You’ll look important by holding a clipboard. It’s a known fact that if you are holding a clipboard people think you are in charge, and now you will be. Black Vertical stripes (Refs) are very slimming and look great on everyone. The fitness routine for the skating referees can't be beat. So be prepared for everyone to tell you how awesome you look, even with helmet hair at the after party.</p><br />
          
        <p>Another cool perk is you’ll also get to have your very own officially recognized roller derby name. Do you have a secret derby name you’ve been dying to use? Well now you can. </p><br />
          
        <p>And finally, you will make incredible friends that will become your new roller derby family. So what are you waiting for? </p><br />
    <? } else if($session->isUSER()) { ?>
    	<center>PLEASE CHECK BACK AFTER YOUR ACOUNT HAS BEEN VERIFIED<br />hint: you will get an email</center>
    <? } else { ?>
    <table>
    <tr><td> <?
		//first select the category based on $_GET['cat_id']
		$sql = "SELECT
					cat_id,
					cat_name,
					cat_description
				FROM
					categories
				WHERE
					cat_id = 1";
		
		$result = mysql_query($sql);
		
		if(!$result)
		{
			echo 'The category could not be displayed, please try again later.' . mysql_error();
		}
		else
		{
			if(mysql_num_rows($result) == 0)
			{
				echo 'This category does not exist.';
			}
			else
			{
				//do a query for the topics
				$sql = "SELECT	
							topic_id,
							topic_subject,
							topic_date,
							topic_cat
						FROM
							topics
						WHERE
							topic_cat = 1
						ORDER BY
							topic_id DESC";
				
				$result = mysql_query($sql);
				
				if(!$result)
				{
					echo 'The topics could not be displayed, please try again later.';
				}
				else
				{
					if(mysql_num_rows($result) == 0)
					{
						echo 'There are no messages to display. -- <a href="create_topic.php" class="lytebox" data-title="Send Message" data-lyte-options="refreshPage:true">Send Message</a>';
					}
					else
					{
						//prepare the table
						echo '<table border="1">
							  <tr>
								<th>Messages -- <a href="create_topic.php" class="lytebox" data-title="Send Message" data-lyte-options="refreshPage:true">Send Message</a></th>
								<th>Created on</th>
							  </tr>';	
							
						while($row = mysql_fetch_assoc($result))
						{				
							echo '<tr>';
								echo '<td class="leftpart">';
									echo '<h3><a href="topic.php?id=' . $row['topic_id'] . '" class="lytebox" data-title="'.stripslashes($row['topic_subject']).'" data-lyte-options="refreshPage:true">' . stripslashes($row['topic_subject']) . '</a><br /><h3>';
								echo '</td>';
								echo '<td class="rightpart">';
									echo date('d-m-Y', strtotime($row['topic_date']));
								echo '</td>';
							echo '</tr>';
						}
						
						echo '</table>';
					}
				}
			}
		} ?>
		</td>
	<td>
		<form>
			<input type="button" value="WFTDA Rule Book" onClick="$lb.launch({ 
                   		 		url: 'http://wftda.com/rules/20130101', 
                   		 		options: 'height:900',
                    	 		title: 'WFTDA Rule Book',
              			 		});" class="bt_register"><br />
            <input type="button" value="Phone Book" onClick="$lb.launch({ 
                   		 		url: 'phonebook.php', 
                    	 		title: 'SCRG Officials Phone Book',
              			 		});" class="bt_register"><br />
            <input type="button" value="Members" onClick="$lb.launch({ 
                   		 		url: 'members.php', 
                    	 		title: 'SCRG Officials Members',
              			 		});" class="bt_register"><br />
            <input type="button" value="Files" onClick="$lb.launch({ 
                   		 		url: 'files', 
                    	 		title: 'SCRG Officials Files',
              			 		});" class="bt_register"><br />								
        </form>
	</td>
	</tr>
	</table>
	<? } ?>
    <br />
    <div class="clear"></div>
    <div class="clear"></div>
    </div>
    
 </div>

<? include 'footer.php' ?>

<br />
<br />
</div>
</body>
</html>
