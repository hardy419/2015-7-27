<?php
header("Content-Type:text/html;charset=utf-8"); 

// Connect Database

require_once("../../php-bin/function.php");

// access control checking

require_once("z_access_control.php");

$id = $_GET["id"]|0;


if( $id != 0 )

{
	// Delete data

	$del_sql = "DELETE

	FROM `tbl_link`

	WHERE link_id='$id';";

	$run_status = mysql_query($del_sql);


	if (!$run_status)

		$msg = str_replace(" ", "+", "Query failed: " . mysql_error($link_id));

	else

	{

		unlink("../../gallery_staff/$_GET[fn]");

		$msg = "insert success";

	}


	mysql_close();

	header("Location: link.php?msg=$msg");

}


?>