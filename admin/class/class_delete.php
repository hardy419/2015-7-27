<?php

// admin checking
require_once("../../admin.inc.php");

// access control checking
require_once("z_access_control.php");

// Connect Database
require_once("../../php-bin/function.php");




$id = $_GET["id"]|0;







if( $id != 0 )
{

	// check the student at this class id 
	$check_sql = "select * FROM `tbl_student` WHERE class_id='".$id."';";
	$check_status = mysql_query($check_sql, $link_id);


		// Delete data
		$del_sql = "DELETE
		FROM `tbl_class`
		WHERE class_id='".$id."';";

		$run_status = mysql_query($del_sql, $link_id);


		if (!$run_status)
			$msg = str_replace(" ", "+", "Query failed: " . mysql_error($link_id));
		else
			$msg = "Record has been deleted successfully";


//


	mysql_close();



	header("Location:index.php?msg=".urlencode($msg));


}


?>