<?php   header("Content-Type:text/html;charset=utf-8"); 
require_once("../../admin.inc.php");

// Connect Database
require_once("../../php-bin/function.php");

// access control checking
require_once("z_access_control.php");



$id = $_GET["id"]|0;



$sql = " SELECT * FROM  tbl_movie  WHERE  id=".$id;
$result = mysql_query($sql);
if( $obj = mysql_fetch_object($result) )
{
	//access_detail_check( $obj->type_id );


	// Delete Photo in HardDisk
	$sql = "SELECT * FROM `tbl_activity_gallery` WHERE act_id=$id ";
	$result = mysql_query($sql,$link_id);
	while ($record = mysql_fetch_object($result))
	{
		unlink("../../gallery_activity/".$record->file_name);
		unlink("../../gallery_activity/original/".$record->file_name);
		unlink("../../gallery_activity/small/".$record->file_name);
	}
	
	// Delete Photo Record in Database
	$del_sql = "DELETE
	FROM `tbl_activity_gallery`
	WHERE act_id=$id ";
	mysql_query($del_sql);
	
	// Delete data
	$del_sql = "DELETE
	FROM `tbl_movie`
	WHERE id=$id ";
	$run_status = mysql_query($del_sql);

	if (!$run_status)
		$msg = str_replace(" ", "+", "Query failed: " . mysql_error($link_id));
	else
		$msg = "The record had been deleted successfully.";
	
	
	mysql_close();
	header("Location: activity.php?msg=$msg");

}



?>