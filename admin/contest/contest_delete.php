<?php
header("Content-Type:text/html;charset=utf-8"); 
// admin checking
require_once("../../admin.inc.php");

// Connect Database
require_once("../../php-bin/function.php");

// access control checking
//require_once("z_access_control.php");
$id = $_GET["id"]|0;
$type = $_GET["type"]|1;

if( $id != 0 )
{
	// Delete data
	$del_sql = "DELETE
	FROM `tbl_contest`
	WHERE a_id='$id';";

	$run_status = mysql_query($del_sql);

	if (!$run_status)
		$msg =6;
	else
	{
		unlink("../../gallery_staff/$_GET[fn]");
		$msg =5;
	}

	mysql_close();
	header("Location: contestlist.php?id=".$type."&msg=$msg");

}



?>