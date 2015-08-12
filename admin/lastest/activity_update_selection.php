<?php   header("Content-Type:text/html;charset=utf-8"); 
require_once("../../admin.inc.php");

// Connect Database
require_once("../../php-bin/function.php");

// access control checking
require_once("z_access_control.php");


// Initial variable
$id = $_GET["id"]|0;



if( $id == 0 )
{  // GET and POST
	echo ("<script language='javascript'>");
	echo ("alert(\"No User ID supplied\");");
	echo ("history.go(-1)");
	echo ("</script>");
	exit();
}




// Get User's Information
$get_sql = "Select * FROM `tbl_lastest` WHERE id=$id";
$get_result = mysql_query($get_sql,$link_id);
$get_rows=mysql_fetch_array($get_result,MYSQL_BOTH);




//access_detail_check( $get_rows["type_id"] );



mysql_close();
?>