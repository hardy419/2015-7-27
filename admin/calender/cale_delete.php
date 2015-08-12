<?php   header("Content-Type:text/html;charset=utf-8"); 

// admin checking

require_once("../../admin.inc.php");



// access control checking

require_once("z_access_control.php");



// Connect Database

require_once("../../php-bin/function.php");







$id = $_GET[id]|0;









if( $id != 0 )

{



	// check the having file.

	$sql = "SELECT `file_name` FROM `tbl_calendar` WHERE calendarid=$id ";

	$result = mysql_query($sql,$link_id); 

	$get_rows = mysql_fetch_array($result);



	if ($get_rows[file_name] != "")

		unlink("../../calendar_attachment/". $get_rows[file_name]);







	// Delete data

	$del_sql = "DELETE

	FROM `tbl_calendar`

	WHERE calendarid=$id ";

	$run_status = mysql_query($del_sql);



	if (!$run_status)

		$msg = str_replace(" ", "+", "Query failed: " . mysql_error($link_id));

	else

		$msg = "ƥR";







	mysql_close();







	header("Location:calendar.php?type=$_GET[type]&year=$_GET[year]&month=$_GET[month]&msg=$msg");







}

?>