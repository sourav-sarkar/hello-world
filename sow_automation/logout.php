<?php
include_once("config.php");
$db = new Database();
$con = $db->connect() ;
if(isset($_SESSION["userid"])){
$userid = $_SESSION["userid"];
$insert = "update user set logged_in_status='0'
				where user_id=".$userid."" ;
if(mysqli_query($con, $insert)){
		$flg=1;
}else{ 
		echo "Error". mysqli_error($con);
		break;
}
$update_sql1 = "UPDATE user_dimention SET assessment_flg='1' WHERE user_id=".$userid." ";
		
		if ($con->query($update_sql1) === TRUE) {
		}
		
		}
session_destroy();
header('Location:index.php');



?>