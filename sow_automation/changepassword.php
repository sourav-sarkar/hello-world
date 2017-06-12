<?php
include_once("config.php");
$db = new Database();
$con = $db->connect() ;
$pagetitle = "Service Excellence-Registration";
$error_message = "";
$username = $_SESSION["username"];
$page = "cp";
if(isset($_POST['old_password']) || isset($_POST['new_password']) ||isset($_POST['confirm_password']))
{
	//echo "<pre>";print_r($_POST);exit;
	$oldPassword = $_POST['old_password'];
	$newPassword = $_POST['new_password'];
	$confirmPassword = $_POST['confirm_password'];
	$userId = $_POST['userid'];

	$select_logged_in_user_sql = "SELECT PASSWORD FROM  `user` WHERE  `USER_ID` =".$userId ;
	$user_logged_in_result = $con->query($select_logged_in_user_sql);
	if (mysqli_num_rows($user_logged_in_result) > 0) {
    
    while($row = mysqli_fetch_assoc($user_logged_in_result)) {
       $oldPass = $row['PASSWORD'];
    }
	
	if($oldPassword != $oldPass){
		echo "1";	exit;
		}
	else{
		$update_sql = "UPDATE user SET PASSWORD='".$newPassword."' WHERE USER_ID	=".$userId;
		
		if ($con->query($update_sql) === TRUE) {
		}
		echo "2";	exit;
	}	
}
		


}
?>

<!DOCTYPE html>
	<?php include "template/head.php";?>
	<script>var page="cp"</script>
	<script>
	function validateChangePassword()
	{
		var userid = "<?=$_SESSION['userid'];?>";
		$("#frmchangepassword").validate({ 
			rules: {
				'old_password': {required: true},
				'new_password': {required: true},
				'confirm_password': {equalTo: "#new_password"},
			},
			messages: {
				
				'old_password': {
					required: "Please enter Password"
				},
				'new_password': {
					required: "Please enter Password"
				},
				'confirm_password': {
					equalTo: "Please enter Confirm Password Same as Password"
				}
			},
			errorPlacement: function(error,element) {
				error.insertAfter(element.parent('li'));
		   },
			errorElement: "li",
			errorClass: "error",
			submitHandler: function(form) {
			
			
				var old_password = $("#old_password").val();
				var new_password = $("#new_password").val();
				var confirm_password = $("#confirm_password").val();
				
				$.ajax({
					type:"POST",
					data: { old_password: old_password,new_password:new_password,confirm_password:confirm_password,userid: userid},
					url: "changepassword.php",
					dataType: "json",
					success: function(data) { 
							if(data == 1){
							$("#errMsgId").show();
								$("#errMsgId").html("Please enter valid old password");
								
								}
							else if(data == 2){
							
									jConfirm("Password changed successfully.", 'Are you sure?', function(r) {
											if(r){
											window.location.href = "land.php";
											}
									});
							}							
								
					},
					error: function() {
					}
				});
				
        }
				
	});
	}
	</script>
	<body class="home-page">
		<div class="container">
			<!--<header>
				<div class="row main-nav">
			<a href="land.php">
			<div class="col-md-8">
				<p><span class="service-header">Service Excellence Self Assessment Kit</span>&mdash; Release Management</p>
			</div>
			</a>
			<div class="col-md-4">
				<div class="row">
					<div class="col-md-6">
					<?php if(isset($username)){?>	<p>Welcome <?=$username;?>  <a href="index.php">Logout</a></p><?php }?>
					</div>
					<div class="col-md-6 logo">
						<img src="assets/images/cts-logo.png" alt="logo" height="50" width="140"  />
					</div>
				</div>
			</div>
			
		</div>
		</header>-->
			<?php include "template/header.php";?>
			<div class="row content">
				<div class="registercolor" style="padding:10px">
				<div class="pagetitle" id="pageTitle" style="width: 330px;margin-left: 391px;">Change Password</div>
			</div>
			
				<div class="login-wrapper">
					<form method="post" id="frmchangepassword">
						<p class="error"><?=$error_message;?></p>
						
						<ul>
							<li>
								<label for="passwd">Old Pasword : </label>
								<input type="password" maxlength="150" name="old_password" id="old_password" />
							</li>
							<li>
								<label for="passwd">New Password : </label>
								<input type="password" maxlength="150" name="new_password" id="new_password" />
							
							</li>
							<li>
								<label for="passwd">Confirm Password : </label>
								<input type="password" maxlength="150" name="confirm_password" id="confirm_password"/>
							</li>
								
							
							<li id="errMsgId" class="error">&nbsp;</li>
							<li>
								<input type="submit" name="login" value="Submit" class="buttons" onclick="validateChangePassword()" />&nbsp;
								<a href="javascript:history.go(-1);"> >> Back </a>
								
							</li>
						</ul>
					</form>
				</div>
			</div>
			
		</div>
	</body>
</html>
