<?php
include_once("config.php");
if(isset($_SESSION["username"]))
$username = $_SESSION["username"];
$db = new Database();
$con = $db->connect() ;
$pagetitle = "SOW Automation ";
$error_message = "";
$select_sql = "select * from project group by project_name order by project_name asc"; 
$result = $db->fetchrow($con,$select_sql);
?>

<!DOCTYPE html>
	<?php include "template/head.php";?>
	<script>var page="register"</script>
	<script>
	function getProjectDetails(projectId)
	{
		
		 $.ajax({
                type:"POST",
                data: { projectId: projectId},
                url: "autosuggest.php",
				dataType: "json",
                success: function(data) { 
                    if(data){
						//alert(projectId);
					
						$("#project_id").val(data.project_id);
						
						$("#customer_id").val(data.customer_id);
						$("#customer_name").val(data.customer_name);
						$("#vertical_name").val(data.vertical_name);
						$("#vertical_id").val(data.vertical_id);
						$("#pr_name").val(data.project_name);
						
						$("#project_id").attr('readonly','readonly');
						$("#customer_id").attr('readonly','readonly');
						$("#customer_name").attr('readonly','readonly');
						$("#vertical_name").attr('readonly','readonly');
						$("#vertical_id").attr('readonly','readonly');
					}
					return false;
                },
                error: function() {
                    
                }
            });
	}
	
	function validateRegister()
	{
	
		$("#frmRegister").validate({ 
			rules: {
				'project_name': {required: true},
				'username': {required: true},
				'password': {required: true},
				'cpassword':{equalTo: "#password"},
			},
			messages: {
				'project_name': {
					required: "Please select Project Name"
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
			var flg = 'exist';
		    $.ajax({
                type:"POST",
                data: { projectId: projectId,userName:userName,password:password,flg:flg},
                url: "checkproject.php",
				dataType: "json",
                success: function(data) { 
						if(data == 1){
							$("#errMsgId").html("You have been already register for this project.");
							$("#errMsgId").show();
						}
						else if(data == 2){
							$("#errMsgId").html("Username already exist");
							$("#errMsgId").show();
						}else{
							$.ajax({
							type:"POST",
							data: $(form).serialize() ,
							url: "ajax/ajxregister.php",
							dataType: "json",
							success: function(data1) { 
									if(data1 == 1){
										window.location.href = 'land.php';					
									}else{
									
										jConfirm('Data are saved successfully. Kindly login with the Username and Password', 'Are you sure?', function(r) {
										if(r){
											window.location.href = 'index.php';	
										}
										});
									}										
								},
								error: function() {
									
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
	
	function newProject()
	{
		window.location.href = 'newproject.php';
	}
	</script>
	<body class="home-page">
		<div class="container">
			
			<header>
				<div class="row main-nav">
			<div class="col-md-4">
				<div class="row">
					<div class="col-md-6">
					<?php if(isset($username)){?>		<p style="width: 190px;">Welcome <?=$username;?> <br><a href="logout.php">Logout</a> | <a href="assets/SE-Self Assessment Kit.pdf" target="_blank">Manual</a> | <a href="assets/SE RM Online Assesment KIT Demo.wmv" >Video Demo</a>
						
						| <a href="changepassword.php" > Change Password</a> | <?php if($username == "admin@cognizant.com") {?><a href="admin.php" > Home</a> <?php }else{?><a href="land.php" > Home</a> <?php }?>
						</p><?php }?>
					</div>
				</div>
			</div>
			
		</div>
		</header>

			

				<div class="register-wrapper">
				<div class="cts_logo"><img src="images/cognizant_logo.png"></div>
				<div class="login-text"><h3>SOW Automation</h3><p>Cloud Platform</p></div>
							<div class="registercolor" style="padding:10px">
			<div id="registerContentId" style="line-height: 22px;"><input onclick="setRegisterContent()" value="Page Help" type="button" class="submit buttonCls" style="font-size: 12px;
    border-radius: 23px;margin-right: 200px;">
	<!--<br>
	Note : This User Registration Page has two options,<br>
1)CIS(Cognizant Infrastructure Services) projects registered till Jan 08th, 2016 in ESA<br>
2)Add New Project button to add any new project registered after Jan 08th, 2016 in ESA
For both options 1 and 2, Enter your Cognizant User ID and create a separate password only for this portal to proceed with Release Management Assessment for your project
			--></div>
		<div class="hidden" id="registerId">
		This User Registration Page has two options,<br><br>
		&nbsp;&nbsp;&nbsp;&nbsp;1) CIS(Cognizant Infrastructure Services) projects registered till Jan 08th, 2016 in ESA. Service Excellence Kit user registration database has all CIS projects available in CIS portal as on &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Jan 08th, 2016 in ESA. Please select your project name from drop-down box and rest of the details will be auto populated.
<br><br> &nbsp;&nbsp;&nbsp;&nbsp;2) Add New Project button to add any new project registered after Jan 08th, 2016 in ESA. Please enter Project Name, Project ID, Customer ID, Customer Name and SBU Name.<br>
	<?php if(!isset($_SESSION['userid'])){?>For Both options 1 and 2 enter your cognizant user id and create a separate password only for this portal to proceed with release management assessment for your project.<?php }?>
<br><input onclick='hideRegisterContentDiv();' value='Back' type='button' class='btncls submit buttonCls' style="margin-left: 1060px !important;">
	</div>
	</div>
				<hr>
<form method="post" action="register.php" id="frmRegister">
						<p class="error"><?=$error_message;?></p>
						<div style="text-align:center">CIS(Cognizant InfraStructure Services) projects registered till 08th Jan 2016 in ESA</div>
						<ul>
						
							<li>
								<label for="passwd">Project Name : </label><select name="project_name" id="project_name" onchange="getProjectDetails(this.value)"/>
								<option value="">-Select Project Name-</option>
								<?php  while ($row = mysqli_fetch_assoc($result)) {?>
								<option value="<?php echo $row["project_id"] ?>" ><?php echo $row["project_name"] ?></option>
								<?php }?>
								</select>
							</li>
							<li>
								<label for="passwd">Project ID : </label>
								<input type="text" name="project_id" id="project_id" />
								<input type="hidden"  name="pr_name" id="pr_name" />
								<input type="hidden" name="vertical_id" id="vertical_id" />
							</li>
								<li>
								<label for="passwd">Customer ID : </label>
								<input type="text"  name="customer_id" id="customer_id"/>
							</li>
							<li>
								<label for="passwd">Customer Name : </label>
								<input type="text"  name="customer_name" id="customer_name"/>
							</li>
							<!--<li>
								<label for="passwd">SBU ID : </label>
								<input type="hidden" maxlength="30" name="vertical_id" id="vertical_id" name="vertical_id"/>
							</li>-->
							<li>
								<label for="passwd">SBU Name : </label>
								<input type="text" name="vertical_name" id="vertical_name" />
							</li>
							<?php if(!isset($_SESSION['userid'])){?>
							<li>
								<label for="usn">Username : </label>
								<input type="text"  name="username" id="username" placeholder="Enter your Cognizant ID" />
							</li>
			
							<li>
								<label for="passwd">Password : </label>
								<input type="password"  name="password" id="password" placeholder="Enter separate password for this portal" />
							</li>
							<li>
								<label for="passwd">Confirm Password : </label>
								<input type="password"  name="cpassword" id="cpassword"/>
							</li>
							<?php }?>
							<li id="errMsgId" class="error">&nbsp;</li>
							<li>
								<input type="submit" name="login" value="Submit" class="buttons" onclick="validateRegister();"/>
								<input type="button" name="newproject" value="Add New Project" class="buttons" onclick="newProject();"/> 
								<!--<div style="margin-left: 244px !important;width: 512px;"></div>&nbsp;-->
							
							</li>
							<li><p>(Add New Project button to add any new project registered after 08th Jan 2016 in ESA)</p></li>
							<li>
							<a href="javascript:history.go(-1);"> >> Back </a></li>
						</ul>
					</form>
				</div>

			
		</div>
	</body>

