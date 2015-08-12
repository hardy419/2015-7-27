<?php   header("Content-Type:text/html;charset=utf-8"); 

// admin checking

require_once("../../admin.inc.php");



// access control checking

require_once("z_access_control.php");



// Connect Database

require_once("../../php-bin/function.php");







$c_id = $_GET["id"]|0;









if( $c_id == 0 )

{  // GET and POST



	echo ("<script language='javascript'>");

	echo ("alert(\"No User ID supplied\");");

	echo ("history.go(-1)");

	echo ("</script>");

	exit();

}









if ($_GET[Dfile] == 1 )

{

	// check the having file.

	$sql = "SELECT `file_name` FROM `tbl_calendar` WHERE calendarid=$c_id ";

	$result = mysql_query($sql,$link_id); 

	$get_rows = mysql_fetch_array($result);



	if ($get_rows[file_name] != "")

	{

		unlink("../../calendar_attachment/". $get_rows[file_name]);

	

		$sql = "update `tbl_calendar` SET `file_name`='' WHERE calendarid=$c_id ";

		mysql_query($sql,$link_id); 

	}

}









// Get User's Information

$get_sql = "SELECT * FROM `tbl_calendar` WHERE  `calendarid`=$c_id ";





$get_result = mysql_query($get_sql,$link_id);

$get_rows=mysql_fetch_array($get_result,MYSQL_BOTH);

mysql_close();





?>