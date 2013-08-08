	<aside id="sidebar" class="column">
		<h3>Upcomming Bouts</h3>
		<ul class="toggle">
			<li class="icn_photo"><a href="#">List 2-3</a></li>
			<li class="icn_photo"><a href="#">Upcoming</a></li>
			<li class="icn_photo"><a href="#">Bouts</a></li>
		</ul>
		<h3>Information</h3>
		<ul class="toggle">
			<li class="icn_tags"><a href="nso.php">NSO Positions</a></li>
			<li class="icn_tags"><a href="#">Ref Positions</a></li>
			<li class="icn_categories"><a href="training_manual.php">SCRG Training Manual</a></li>
			<li class="icn_categories"><a href="wftda.php">WFTDA Rulebook</a></li>
		</ul>
		<?php if($session->overUserlevel(3)) { ?>
			<h3>Board</h3>
			<ul class="toggle">
				<li class="icn_edit_article"><a href="#">Messages</a></li>
				<li class="icn_new_article"><a href="#">Post</a></li>
				<li class="icn_folder"><a href="#">Files</a></li>
			</ul>
		<?php } ?>
		<h3>Admin</h3>
		<ul class="toggle">
			<?php if($session->overUserlevel(4)) { ?>
				<li class="icn_view_users"><a href="#">Attendance</a></li>
			<?php } ?>
				<li class="icn_view_users"><a href="#">Members</a></li>
			<?php if($session->overUserlevel(4)) { ?>
				<li class="icn_view_users"><a href="#">Phonebook</a></li>
			<?php }
			if($session->overUserlevel(6)) { ?>
				<li class="icn_view_users"><a href="#">Applications</a></li>
			<?php }
			if($session->overUserlevel(4)) { ?>
				<li class="icn_add_user"><a href="#">New Users</a></li>
			<?php } ?>
			<li class="icn_profile"><a href="userinfo.php?user=<?php echo $session->username; ?>">Your Profile</a></li>
			<?php if($session->overUserlevel(5)) { ?>
				<li class="icn_security"><a href="#">Security</a></li>
			<?php } ?>
			<li class="icn_jump_back"><a href="login/process.php">Logout</a></li>
		</ul>
		
		<footer>
			<hr />
			<p><strong>Copyright &copy; 2013 Brian Pistone</strong></p>
		</footer>
	</aside><!-- end of sidebar -->