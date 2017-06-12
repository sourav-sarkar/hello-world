<?php
include_once("config.php" );
$db = new Database();
$con = $db->connect() ;
$date = date("Y-m-d");
$projectId = $_POST['projectId'];
$flg = $_POST['flg'];

	if(!isset($_SESSION['userid'])){
		$userName = $_POST['userName'];
		$password = $_POST['password'];
		
		$user_sql = "select USER_ID from user where USER_NAME ='".$_POST['userName']."'"; 
		$user_result = mysqli_query($con, $user_sql);
		$userCnt = mysqli_num_rows($user_result);
	}else{
		$userCnt =0;
		$userName = $_SESSION['username'];
	}
	if($flg == "exist")	
		$select_sql = "select * from user_details where SBU_ID='".$projectId."' AND  USER_NAME='".$userName."'"; 
	else
		$select_sql = "select * from project where project_id='".$projectId."'"; 
	
	$project_result = mysqli_query($con, $select_sql);

	if ($userCnt != 0) {
		echo "2";exit;
	}
	elseif (mysqli_num_rows($project_result) > 0) {
		echo "1";exit;
	}else{
		echo "3";exit;
	}
?>