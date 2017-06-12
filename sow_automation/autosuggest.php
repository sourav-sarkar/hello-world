<?php
include_once("config.php" );
$db = new Database();
$con = $db->connect() ;
$flg = 0;
$date = date("Y-m-d");
$projectId = $_POST['projectId'];

$select_sql = "select * from project where project_id='".$projectId."'"; 

$result = $db->fetchrow($con,$select_sql);

$verticalArr = array();
while ($row = mysqli_fetch_assoc($result)) {
$verticalArr['vertical_name'] = $row['vertical_name'];
$verticalArr['vertical_id'] = $row['vertical_id'];
$verticalArr['customer_id'] = $row['customer_id'];
$verticalArr['customer_name'] = $row['customer_name'];
$verticalArr['project_id'] = $row['project_id'];
$verticalArr['project_name'] = $row['project_name'];

}
echo json_encode($verticalArr);exit;

?>