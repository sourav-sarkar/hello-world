<?php
include_once("config.php");
$username = $_SESSION["username"];
$page = "step1";
$pagetitle = "SOW automation";
$usr = new Users;
$projid_arr = $usr->getProjectetails();
$hidden = "hidden";
if(!isset($_SESSION['userid'])){
	header('Location:index.php');
}

 foreach ($_POST as $key => $value) {
 $_SESSION['post'][$key] = $value;
 echo '<pre>';
 print_r($_SESSION['post'][$key]);
  echo '</pre>';
 } 

?>
<!DOCTYPE html>
<?php include "template/head.php";?>
	<script>var page="step1"</script>
<body>
   <div class="header">
	
	<div class="row main-nav">
			<a href="land.php">
			<div class="col-md-8">
				<h4><span class="service-header">SOW Automation &mdash; Cloud Platform</span></h4>
			</div>
			</a>
			<div class="col-md-4">
				<div class="row">
					<div class="col-md-6">
						<p style="width: 190px;">Welcome <?php print $username;?> | <a href="logout.php">Logout</a> 
						</p>
					</div>
					<div class="col-md-6 logo">
						<img src="assets/images/cts-logo.png" alt="logo" height="50" width="140"  />
					</div>
				</div>
			</div>
			
		</div>
    </div>
    <nav class="navbar navbar-default">
        <div class="container-fullwidth">
            <ul class="nav navbar-nav">
                <li class="active"><a href="#">Rehost ( Lift & Shift )</a>
                </li>
                <li><a href="#">Refractor </a>
                </li>
                <li><a href="#">Revise </a>
                </li>
                <li><a href="#">Rebuild </a>
                </li>
                <li><a href="#">Replace</a>
                </li>
                <li><a href="#">Green filed
</a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="container-fullwidth form-2">
	<span id="error">
 <!---- Initializing Session for errors --->
 <?php
 if (!empty($_SESSION['error'])) {
 echo $_SESSION['error'];
 unset($_SESSION['error']);
 }
 ?>
 </span>
        <form method="post" action="">
		<div class="col-sm-12 doc-list">

		<ul>
		<li><input type="checkbox" name="doc_select"></li>
		<li><img src="images/doc_icon.png"></li>
		<li>Security Implementation Approach and Activities</li>
		<li><input type="button" name="update" id="update" value="Update"></li>
		</ul>
		
		<ul>
		<li><input type="checkbox" name="doc_select"></li>
		<li><img src="images/doc_icon.png"></li>
		<li>Pre-requisites / Dependencies for Security solutions implementations</li>
		<li><input type="button" name="update" id="update" value="Update"></li>
		</ul>
		
	    <ul>
		<li><input type="checkbox" name="doc_select"></li>
		<li><img src="images/doc_icon.png"></li>
		<li>Project Assumptions and Constraints</li>
		<li><input type="button" name="update" id="update" value="Update"></li>
		</ul>
		
		<ul>
		<li><input type="checkbox" name="doc_select"></li>
		<li><img src="images/doc_icon.png"></li>
		<li>Cloud Activity (Assumptions and Dependencies)</li>
		<li><input type="button" name="update" id="update" value="Update"></li>
		</ul>
		
		<ul>
		<li><input type="checkbox" name="doc_select"></li>
		<li><img src="images/doc_icon.png"></li>
		<li>Cloud Security Implementation Assumptions</li>
		<li><input type="button" name="update" id="update" value="Update"></li>
		</ul>
		
				<ul>
		<li><input type="checkbox" name="doc_select"></li>
		<li><img src="images/doc_icon.png"></li>
		<li>Implementation plan in Weeks W1-Wn</li>
		<li><input type="button" name="update" id="update" value="Update"></li>
		</ul>
		
				<ul>
		<li><input type="checkbox" name="doc_select"></li>
		<li><img src="images/doc_icon.png"></li>
		<li>Project Milestones(Start Date & End Dates)</li>
		<li><input type="button" name="update" id="update" value="Update"></li>
		</ul>
		
			
				<ul>
		<li><input type="checkbox" name="doc_select"></li>
		<li><img src="images/doc_icon.png"></li>
		<li>Key Deliverables</li>
		<li><input type="button" name="update" id="update" value="Update"></li>
		</ul>
		
			
				<ul>
		<li><input type="checkbox" name="doc_select"></li>
		<li><img src="images/doc_icon.png"></li>
		<li>Detailed Implementation Plan (No of weeks needs to reviewed based on Point NO.17)</li>
		<li><input type="button" name="update" id="update" value="Update"></li>
		</ul>
		
			
				<ul>
		<li><input type="checkbox" name="doc_select"></li>
		<li><img src="images/doc_icon.png"></li>
		<li>Development Environment  (from Point No.1)</li>
		<li><input type="button" name="update" id="update" value="Update"></li>
		</ul>
		
			
				<ul>
		<li><input type="checkbox" name="doc_select"></li>
		<li><img src="images/doc_icon.png"></li>
		<li>Project Coordinator</li>
		<li><input type="button" name="update" id="update" value="Update"></li>
		</ul>
		
						<ul>
		<li><input type="checkbox" name="doc_select"></li>
		<li><img src="images/doc_icon.png"></li>
		<li>System Access and Documentation</li>
		<li><input type="button" name="update" id="update" value="Update"></li>
		</ul>
		
						<ul>
		<li><input type="checkbox" name="doc_select"></li>
		<li><img src="images/doc_icon.png"></li>
		<li>Project Infrastructure</li>
		<li><input type="button" name="update" id="update" value="Update"></li>
		</ul>
		
						<ul>
		<li><input type="checkbox" name="doc_select"></li>
		<li><img src="images/doc_icon.png"></li>
		<li>Risks and Mitigation Plan</li>
		<li><input type="button" name="update" id="update" value="Update"></li>
		</ul>
		
						<ul>
		<li><input type="checkbox" name="doc_select"></li>
		<li><img src="images/doc_icon.png"></li>
		<li>Change  Management (Refer Attached standard Templates - Change Request Analysis Templates, Change Request Template, Change Request Tracker)</li>
		<li><input type="button" name="update" id="update" value="Update"></li>
		</ul>
	
	
			
						<ul>
		<li><input type="checkbox" name="doc_select"></li>
		<li><img src="images/doc_icon.png"></li>
		<li>Team Structure, Roles and Responsibility</li>
		<li><input type="button" name="update" id="update" value="Update"></li>
		</ul>
		
								<ul>
		<li><input type="checkbox" name="doc_select"></li>
		<li><img src="images/doc_icon.png"></li>
		<li>Engagement Model </li>
		<li><input type="button" name="update" id="update" value="Update"></li>
		</ul>
		
										<ul>
		<li><input type="checkbox" name="doc_select"></li>
		<li><img src="images/doc_icon.png"></li>
		<li>Fees and Commercial Terms</li>
		<li><input type="button" name="update" id="update" value="Update"></li>
		</ul>
	
	
	
		
		</div>


<input type="button" name="previous" id="previous" value="Previous">
<input type="button" name="reset" id="reset" value="Reset">
<input type="submit" name="Save" value="Save">
<input type="button" name="generate" id="generate" value="Generate" >


    </form>

</div>
</body>