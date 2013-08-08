<!-- Panel -->
<div id="toppanel">
	<div id="panel">
		<div class="content clearfix">
			<div class="left">
				<h1>Welcome SCRG Officials</h1>
					<img src="images/scw.jpg" height="200">
			</div>
			<div class="left">
			<?php if(!$session->logged_in){ ?>
				<!-- Login Form -->
				<form action="login/process.php" method="POST">
					<h1>Login</h1>				
					<label class="grey" for="user">Username:</label>
					<input type="text" name="user" maxlength="30" value="<? echo $form->value("user"); ?>"><br /><? echo $form->error("user"); ?>
					<label class="grey" for="pass">Password:</label>
					<input type="password" name="pass" maxlength="30" value="<? echo $form->value("pass"); ?>"><br /><? echo $form->error("pass"); ?>
					<label class="grey" for="remember">Remember Me</label>
					<input type="checkbox" name="remember" <? if($form->value("remember") != ""){ echo "checked"; } ?>>
					<input type="hidden" name="sublogin" value="1"><br />
					<table>
					<tr>
						<td>
							<input type="submit" value="Login" class="bt_register">
							</form>
						</td>
						<td>
							<form>
							<input type="button" value="Forgot Pass?" onClick="$lb.launch({ 
                   		 		url: 'login/forgotpass.php', 
                    	 		title: 'Password Reset',
                    	 		refreshPage:true,
              			 		});" class="bt_register">
						</td>
						<td>
							<input type="button" value="Not registered?" onClick="$lb.launch({ 
                   		 		url: 'login/register.php', 
                    	 		title: 'User Registration',
                    	 		refreshPage:true,
              			 		});" class="bt_register">
              			 	</form>
						</td>
					</tr>
					</table>
			<?php } else { ?>
				<form>
					<input type="button" value="Update Contact Info" onClick="$lb.launch({ 
                   		 url: 'login/useredit.php', 
                    	 title: 'Update Contact Informartion',
              			 });" class="bt_register">
					<? if($session->isAdmin()) { ?>
						<input type="button" value="Site Admin" onClick="$lb.launch({ 
                    		url: 'login/admin/admin.php',
                    		title: 'Admin Center',
              				});" class="bt_register">
					<? } ?>
					<input type="button" value="Logout" onClick="window.location.href='login/process.php'" class="bt_register">
				</form>
			<? } ?>
			</div>
			<div class="left right">			
				<!-- Menu -->
				<form>
				<? if($session->isAdmin()) { ?>
					<center>
					<table>
						<tr>
							<td><input type="button" value="Home" onClick="window.location.href='index.php'" class="bt_register"></td>
							<td><input type="button" value="Information" onClick="window.location.href='info.php'" class="bt_register"></td>
						</tr>
						<tr>
							<td><input type="button" value="Practice" onClick="window.location.href='practice.php'" class="bt_register"></td>
							<td><input type="button" value="Bouts" onClick="window.location.href='bouts.php'" class="bt_register"></td>
						</tr>
						<tr>
							<td><input type="button" value="Add Events" onClick="window.location.href='add_events.php'" class="bt_register"></td>
							<td><input type="button" value="Bout Admin" onClick="window.location.href='bout_admin.php'" class="bt_register"></td>
						</tr>
					</table>
					</center>
				<? } else if($session->isNSO()) { ?>
					<center>
					<table>
						<tr>
							<td><input type="button" value="Home" onClick="window.location.href='index.php'" class="bt_register"></td>
							<td><input type="button" value="Information" onClick="window.location.href='info.php'" class="bt_register"></td>
						</tr>
						<tr>
							<td><input type="button" value="Practice" onClick="window.location.href='practice.php'" class="bt_register"></td>
							<td><input type="button" value="Bouts" onClick="window.location.href='bouts.php'" class="bt_register"></td>
						</tr>
					</table>
					</center>
				<? } else { ?>
					<center>
					<table>
						<tr>
							<td><input type="button" value="Home" onClick="window.location.href='index.php'" class="bt_register"></td>
							<td><input type="button" value="Information" onClick="window.location.href='info.php'" class="bt_register"></td>
						</tr>
					</table>
					</center>
				<? } ?>
				</form>
			</div>
		</div>
</div> <!-- /login -->	

	<!-- The tab on top -->	
	<div class="tab">
		<ul class="login">
			<li class="left">&nbsp;</li>
			<?php if($session->logged_in){ ?>
			<li><? echo $session->username; ?></li>
			<? } else { ?>
			<li>Hello Guest!</li>
			<? } ?>
			<li class="sep">|</li>
			<li id="toggle">
				<?php if($session->logged_in){ ?>
				<a id="open" class="open" href="#">Menu | Logout</a>
				<? } else { ?>
				<a id="open" class="open" href="#">Login | Menu</a>
				<? } ?>
				<a id="close" style="display: none;" class="close" href="#">Close Panel</a>			
			</li>
			<li class="right">&nbsp;</li>
		</ul> 
	</div> <!-- / top -->
	
</div> <!--panel -->