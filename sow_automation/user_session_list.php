<?php
error_reporting(0);
include_once("config.php" );
$db = new Database();
$con = $db->connect() ;
$username = $_SESSION["username"];
$page = "report";
$pagetitle = "Release Management";
$select_logged_in_user_sql = "SELECT * FROM  `user` 

WHERE  `logged_in_status` =  '1' and USER_NAME != 'admin@cognizant.com' ";

$user_logged_in_result = $con->query($select_logged_in_user_sql);



?>
<!DOCTYPE html>
	<?php include "template/head.php";?>
	<link href="assets/css/tab.css" rel="stylesheet"/>
	<script>var page="history";</script>
	<link href="assets/css/jquery-ui.css" rel="stylesheet"/>
		<script src="assets/js/jquery-ui.js"></script>
	<script>
	$( document ).ready(function() {
	 $( "#start_date" ).datepicker();
	 $( "#end_date" ).datepicker();
	 $( "#assessment_date" ).datepicker();
	 $( "#sbuid" ).hide();
	  $( ".active" ).removeClass('active');
	  $( "#usersessionId" ).addClass('active');
	 
	});
	</script>
	<style>
ul
{
    list-style-type: none;
}
form ul li{
	padding-top: 7px;
}
</style>
	<body class="">
	<div class="container">
	<?php include "template/header.php";?>
	<div style="width: 455px;margin-top: 20px;margin-left: 379px;margin-bottom: 20px;font-size: 22px;" class="pagetitle">Assessment Report - Data Analytics</div>
	<!--<p>
		<a href="land.php"><input type="button" class="form-buttons" value="Back" name="next"  style="background-color: #035b80;color: #fff;
    height: 40px;margin-right: 171px;width: 72px;" /></a>
	</p>-->
	<div class="row content">
		<div  style="font-size:18px;">
			<?php include "template/adminleftpanel.php";?>
		</div>
		<table id="summary" class="summary grey" style="font-size:13px;width:875px" >
				<tr>
				<th>Employee ID</th>
				<th>SBU Name</th>
				<th>Project Name</th>
				<th>Project ID</th>
				<th>Customer Name</th>
				<th>Customer ID</th>
				<th>Selected Dimension</th>
				<th>Remark</th>
				</tr>
				<?php 
					if ($user_logged_in_result->num_rows > 0) {
					$i = 1;
					while ($row = $user_logged_in_result->fetch_assoc()){
						$select_logged_in_user_sbu_sql = "SELECT * FROM  `user_dimention` WHERE  `user_id` =  ".$row['USER_ID']." AND assessment_flg='0' group by sbu_id ORDER BY dim_id DESC";
						$user_logged_sbu_in_result = $con->query($select_logged_in_user_sbu_sql);
						if ($user_logged_sbu_in_result->num_rows > 0) {
							while ($row1 = $user_logged_sbu_in_result->fetch_assoc()){
								$select_logged_in_user_dimension_sql = "SELECT project.customer_name,project.customer_id,project.vertical_name,project.project_name,user_dimention.dimension,user_dimention.sbu_id FROM  `user_dimention`
									JOIN project ON project.project_id = user_dimention.sbu_id 
									
									WHERE  `user_id` =  ".$row['USER_ID']." AND sbu_id= '".$row1['sbu_id']."'";
								$user_logged_dimension_in_result = $con->query($select_logged_in_user_dimension_sql);
								if ($user_logged_dimension_in_result->num_rows > 0) {
									$dimensionArr = array();
									while ($row2 = $user_logged_dimension_in_result->fetch_assoc()){
										array_push($dimensionArr,$row2['dimension']);
										$verticalName = $row2['vertical_name'];
										$projectName = $row2['project_name'];
										$projectID = $row2['sbu_id'];
										$customerName = $row2['customer_name'];
										$customerID = $row2['customer_id'];
									}
								}
							}
						}
							
					?>
					<tr>
						<td><?php echo $row['USER_NAME'];?></td>
						<td><?php echo $verticalName;?></td>
						<td><?php echo $projectName;?></td>
						<td><?php echo $projectID;?></td>
						<td><?php echo $customerName;?></td>
						<td><?php echo $customerID;?></td>
						<td><?php echo implode(",",$dimensionArr);?></td>
						<td><?php if(!implode(",",$dimensionArr)) echo "Yet to select value";?></td>
					</tr>
					<?php 
					$i++;
					}
				
				}
				else{ ?>
					<tr><td colspan="8">No User Found</td></tr>
				<?php	} ?>
			</table>
		</div>		
		<?php include "template/footer.php";?>
		</div>
	</body>	
</html>	
