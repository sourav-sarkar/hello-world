<?php
include_once("config.php");
if(isset($_SESSION["username"]))
$username = $_SESSION["username"];
$db = new Database();
$con = $db->connect() ;
$pagetitle = "Service Excellence-Registration";
$error_message = "";
?>

<!DOCTYPE html>
	<?php include "template/head.php";?>
	<script>var page="register"</script>
	<script>
	
	function validateNewProject()
	{
		$("#frmProject").validate({ 
			rules: {
				'project_name': {required: true},
				'project_id' :{required: true},
				'customer_name' :{required: true},
				'customer_id' :{required: true},
				'vertical_name' :{required: true},
				'username': {required: true},
				'password': {required: true},
				'cpassword': {equalTo: "#password"},
			},
			messages: {
				'project_name': {
					required: "Please enter Project Name"
				},
				'project_id': {
					required: "Please enter Project Id"
				},
				'customer_name': {
					required: "Please enter Customer Name"
				},
				'customer_id': {
					required: "Please enter Customer Id"
				},
				'vertical_name': {
					required: "Please enter SBU Name"
				},
				'username': {
					required: "Please enter Username"
				},
				'password': {
					required: "Please enter Password"
				},
				'cpassword': {
					equalTo: "Please enter Confirm Password Same as Password"
				}
			},
			errorPlacement: function(error,element) {
				error.insertAfter(element.parent('li'));
		   },
			errorElement: "li",
			errorClass: "error",
			submitHandler: function(form) {
				var projectId = $("#project_id").val();
				var userName = $("#username").val();
				var password = $("#password").val();
				var flg = 'new';
				$.ajax({
					type:"POST",
					data: { projectId: projectId,userName:userName,password:password,flg:flg},
					url: "checkproject.php",
					dataType: "json",
					success: function(data) { 
							if(data == 1){
								$("#errMsgId").html("Project already exist.");
								$("#errMsgId").show();
							}
							else if(data == 2){
								$("#errMsgId").html("Username already exist");
								$("#errMsgId").show();
							}else{
								$.ajax({
								type:"POST",
								data: $(form).serialize() ,
								url: "ajax/ajxnewproject.php",
								dataType: "json",
								success: function(data1) { 
										if(data1 == 1){
											window.location.href = 'land.php';					
										}else{
											window.location.href = 'index.php';	
										}										
									},
									error: function() {}
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
			<header>
				<div class="row main-nav">
			<a href="land.php">
			<div class="col-md-8">
				<p><span class="service-header">Cognizant Infrastructure Service Excellence Utility</span>&mdash; Release Management</p>
			</div>
			</a>
			<div class="col-md-4">
				<div class="row">
					<div class="col-md-6">
					<?php if(isset($username)){?>		<p style="width: 190px;">Welcome <?=$username;?> <br><a href="logout.php">Logout</a> | <a href="assets/SE-Self Assessment Kit.pdf" target="_blank">Manual</a> | <a href="assets/SE RM Online Assesment KIT Demo.wmv" >Video Demo</a>
						
						| <a href="changepassword.php" > Change Password</a> | <?php if($username == "admin@cognizant.com") {?><a href="admin.php" > Home</a> <?php }else{?><a href="land.php" > Home</a> <?php }?>
						</p><?php }?>
					</div>
					<div class="col-md-6 logo">
						<img src="assets/images/cts-logo.png" alt="logo" height="50" width="140"  />
					</div>
				</div>
			</div>
			
		</div>
		</header>
			<div class="row content">
			
			<div class="registercolor" style="padding:10px">
			<div class="pagetitle" id="pageTitle" style="width: 330px;margin-left: 391px;">Project Registration Section</div>
			<br>
			<div id="registerContentId" style="line-height: 22px;"><input onclick="setRegisterContent()" value="Page Help" type="button" class="submit buttonCls" style="font-size: 12px;
    border-radius: 23px;margin-left: 469px;">
	<!--<br>
	Note : This User Registration Page has two options,<br>
1)CIS(Cognizant Infrastructure Services) projects registered till Dec 31st, 2015 in ESA<br>
2)Add New Project button to add any new project registered after Dec 31st, 2015 in ESA
For both options 1 and 2, Enter your Cognizant User ID and create a separate password only for this portal to proceed with Release Management Assessment for your project
			--></div>
		<div class="hidden" id="registerId">
		Please enter Project Name, Project ID, Customer ID, Customer Name and SBU Name. <?php if(!isset($_SESSION['userid'])){?>Enter your cognizant userid and create a separate password only for this portal to proceed with release management assessment for your project<?php }?>
	
<br><input onclick='hideRegisterContentDiv();' value='Back' type='button' class='btncls submit buttonCls' style="margin-left: 1060px !important;">
	</div>
	</div>
			
				<!--<div class="registercolor" style="padding:10px;line-height: 20px;">Note : Please enter Project Name, Project ID, Customer ID, Customer Name and Customer ID. <?php if(!isset($_SESSION['userid'])){?>Enter your cognizant userid and create a separate password only for this portal to proceed with release management assessment for your project<?php }?>
</div>-->
				<div class="login-wrapper">
					<form method="post" action="newproject.php" id="frmProject">
						<p class="error"><?=$error_message;?></p>
						<div style="text-align:center">CIS(Cognizant InfraStructure Services) projects not registered till 08th Jan 2016 in ESA</div>
						<ul>
							<li>
								<label for="passwd">Project Name : </label>
								<input type="text" maxlength="150" name="project_name" id="project_name" />
							</li>
							<li>
								<label for="passwd">Project ID : </label>
								<input type="text" maxlength="150" name="project_id" id="project_id" />
							
							</li>
							<li>
								<label for="passwd">Customer Name : </label>
								<input type="text" maxlength="150" name="customer_name" id="customer_name"/>
							</li>
								<li>
								<label for="passwd">Customer ID : </label>
								<input type="text" maxlength="150" name="customer_id" id="customer_id"/>
							</li>
							<li>
								<label for="passwd">SBU Name : </label>
								<input type="text" maxlength="150" name="vertical_name" id="vertical_name" />
							</li>
							<!--<li>
								<label for="passwd">SBU ID : </label>
								<input type="text" maxlength="150" name="vertical_id" id="vertical_id" name="vertical_id"/>
							</li>-->
							<?php if(!isset($_SESSION['userid'])){?>
							<li>
								<label for="usn">Username : </label>
								<input type="text" maxlength="150" name="username" id="username"/>
							</li>
			
							<li>
								<label for="passwd">Password : </label>
								<input type="password" maxlength="150" name="password" id="password"/>
							</li>
							<li>
								<label for="passwd">Confirm Password : </label>
								<input type="password" maxlength="150" name="cpassword" id="cpassword"/>
							</li>
							<?php }?>
							<li id="errMsgId" class="error">&nbsp;</li>
							<li>
								<input type="submit" name="login" value="Submit" class="buttons" onclick="validateNewProject();"/>&nbsp;
								<a href="javascript:history.go(-1);"> >> Back </a>
								
							</li>
						</ul>
					</form>
				</div>
			</div>
			
		</div>
	</body>
</html>
