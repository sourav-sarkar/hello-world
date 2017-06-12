<?php
session_start();
//error_reporting(0);

//define some contstant
	define( "DB_SERVER", "localhost" ); //this constant will be use as our connectionstring/dsn
	define( "DB_USERNAME", "root" ); //username of the database
	define( "DB_PASSWORD", "" ); //password of the database
	define( "DB_DATABASE", "sow_automation" ); //database name
	define( "CLS_PATH", "class" ); //the class path of our project
	define( "PLUGINS_PATH", "class/plugins" ); //the class path of our project

	include_once( CLS_PATH . "/users.php" );
	include_once( CLS_PATH . "/database.php" );

	
	/*$today = date("Y-m-d");	
	$lastday = '2015-12-30'; 
	$expire = 0;
	if(strtotime($lastday) < strtotime($today)){
		$expire = 1;
		echo "<h1>You cannot calulate the maturity as it is closed for this quarter<h1>";
		die;
	}*/
	
	
	
	
	
	

?>