<?php
header("Content-Type:text/html;charset=utf-8"); 
// admin checking
require_once("../../admin.inc.php");

// Connect Database
require_once("../../php-bin/function.php");

// access control checking
require_once("z_access_control.php");



$id = $_GET["id"]|0;





if( $id != 0 )
{



	// Delete data
	$del_sql = "DELETE
	FROM `tbl_teacher`
	WHERE teacher_id='$id';";

	$run_status = mysql_query($del_sql);



	if (!$run_status)
		$msg = str_replace(" ", "+", "Query failed: " . mysql_error($link_id));
	else
	{
		unlink("../../gallery_staff/$_GET[fn]");
		$msg = "Record has been deleted successfully.";
	}



	mysql_close();
	header("Location: user.php?msg=$msg");



}



?>