    <div id="edgesline" class="edges"></div>
	<div id="tabs">
    <ul id="tabMenu">
		
		<?php if(!$session->logged_in){ ?>
			<li class="regular"><a href="home.html">Home</a></li>
			<li class="dropdown"><a href="#tab1">Login</a></li>
			<li class="dropdown"><a href="#tab2">Register</a></li>
			<li class="dropdown"><a href="#tab3">Forgot Password</a></li>
			<li class="regular"><a href="home.html">Information</a></li>
		<? } else { ?>
			<li class="regular"><a href="index.php">Home</a></li>
			<li class="regular"><a href="info.php">Information</a></li>
			<li class="regular"><a href="practice.php">Practice</a></li>
			<li class="regular"><a href="bouts.php">Bouts</a></li>
		<? } ?>
        
    </ul>

    
</div>




<div id="tabContainer">
<ul id="tabPanes">
    <li id="tab1">
        
        <p>
            
            <div class="formcontainer">
                
                <div class="text">
                    <label for="username">Username</label>

                    <input type="text" name="username" id="username" alt="The username you chose when signing-up for the site.">
                </div>
                
                <div class="text">
                    <label for="password">Password</label>
                    <input type="text" name="password" id="password" alt="The password you chose when signing-up for the site.">
                </div>
                
                <div class="text">
                    <br>

                    <input type="checkbox" name="rememberme" id="rememberme"> Remember Me
                    
                </div>
            </div>            
            
            <center>
			
                <div class="block" id="bluebutton">
                    <button>Login</button>
                </div>
            </center>
            
            
        </p>

    </li>
    
    <li id="tab2">
        
        <p>
            
            <div class="formcontainer">
                <div class="text">
                    <label for="username">Desired Username</label>
                    <input type="text" name="desusername" id="desusername" alt="Min. 5 characters Long. <br>All Lowercase letters.<br>Easy to remember">
                </div>

                
                <div class="text">
                    <label for="despassword">Desired Password</label>
                    <input type="text" name="despassword" id="despassword" alt="Min. 5 characters Long.<br>Must include 1 Number<br>& One Uppercase Letter.">
                </div>
                <div class="text">
                    <label for="password">Confirm Password</label>
                    <input type="text" name="confpassword" id="confpassword" alt="Please ensure this matches the password above">
                </div>

            </div>
            
            
            <center>
                <div class="block" id="bluebutton">
                    <button>Sign-Up</button>
                </div>
            </center>
            
        </p>
    </li>

    <li id="tab3">
        
        <p>
            <div class="formcontainer">
                
                <div class="text">
                    <label for="username">Username</label>
                    <input type="text" name="username" id="username" alt="Please check your username is correct before clicking Resend.">
                </div>
                <br>    
                Please enter your username above. Click 'Resend' and we'll email you your password.    
                
                <center>

                    <div class="block" id="bluebutton">
                        <button>Resend</button>
                    </div>
                </center>
                
            </p>
            </li>
                
                <li id="tab4">
                    
                    <p>

                        
                        <div class="formcontainer">
                            <div class="text">
                                <label for="yourname">Your E-Mail:</label>
                                <input type="text" name="youremail" id="youremail" alt="Please enter a valid e-mail address so we can reply back to you">
                            </div>
                            
                            <div class="text">
                                <label for="msgsubject">Subject</label>
                                <input type="text" name="msgsubject" id="msgsubject" alt="What is your message concerning?">

                            </div>
                            <div class="text">
                                <label for="password">Message</label>
                                <input type="text" name="msgtext" id="msgtext" alt="Your Message (Please keep it short). We'll get back to you asap!">
                            </div>
                        </div>
                        
                        
                        <center>
                            <div class="block" id="bluebutton">

                                <button>Send</button>
                            </div>
                        </center>
                    </div>
                        
                    </p>
                </li>                

            </ul>
            
            </div>