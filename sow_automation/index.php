<?php
session_start();
session_destroy();
include_once("config.php");
$pagetitle = "SOW-Automation Login";
$error_message = "";
if((isset( $_POST['login'] ) ) ) { 
		$usr = new Users;
		$usr->storeFormValues( $_POST );
		$error_message = $usr->userLogin();
}
?>

<!DOCTYPE html>
	<?php include "template/head.php";?>
	<script>$.cookie('popup','0',{path: '/'});$.cookie('popup-ana','0',{path: '/'});var page="login";</script>
	<body>
  <div class="container">
<div class="row content">
				<div class="login-wrapper">
				<div class="cts_logo"><img src="images/cognizant_logo.png"></div>
				<div class="login-text"><h3>SOW Automation</h3><p>Cloud Platform</p></div>
				<hr>
					<form method="post" action="">
						<p class="error" style="text-align: center;"><?php print $error_message;?></p>
						<ul>
							
							<li>
								<label for="usn">Username : </label>
								<input type="text" maxlength="30" name="username" />
							</li>
			
							<li>
								<label for="passwd">Password : </label>
								<input type="password" maxlength="30" name="password" />
							</li>
							
							<li>
								<input type="submit" name="login" value="Log In"/>&nbsp;
						
	                        </li>
							</ul>
								<div class="register-link"><a href="register.php">Register Now</a>
							    <a href="javascript:void(0)" onclick="forgotPassword()">Forgot Password</a></div>
							
							
						
						<br>
							
					</form>
				</div>
			</div>
  
  </div>

  </body>
</html>
