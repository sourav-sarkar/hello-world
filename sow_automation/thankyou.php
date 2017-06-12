<?php
include_once("config.php");
$title = "Service Maturiy Evaluation";
$topic = "ENTER ENGAGEMENT DETAILS";
$pagetitle = "Service Excellence-Build Management";
$username = $_SESSION["username"];
$currentpage = 3;
?>
<!DOCTYPE html>
	<?php include "template/head.php";?>
	<body class="home-page">
		<div class="container">
			<header>
				<div class="row main-nav">
					<div class="col-md-8">
						<p><span class="service-header">Service Excellence</span> Release Management MaturitySelf Assessment Kit</p>
					</div>
					<div class="col-md-4">
						<div class="row">
							<div class="col-md-6">
							<p>Welcome <?=$username;?> | <a href="index.php">Logout</a></p>
							</div>
							<div class="col-md-6 logo">
								<img src="assets/images/cts.jpg" width="50" height="50"  />
							</div>
						</div>
					</div>
			
				</div>
			</header>
			<div class="row content">
				<div class="thankyou-wrapper">
				<p><h2>Thank you for your inputs</h2></p>
						
					
				</div>
			</div>
			
		</div>
	</body>
</html>
