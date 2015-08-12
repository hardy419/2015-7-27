<?php

header("Content-Type:text/html;charset=utf-8"); 

// admin checking

require_once("../../php-bin/admin_check.php");



// access control checking

require_once("z_access_control.php");



// Connect Database

require_once("../../php-bin/function.php");









$item_id = $_GET["item_id"]|0;

$file_id = $_GET["file_id"]|0;









// check id exist

$search_SQL = "SELECT * FROM    tbl_web_sub_content_file    WHERE    file_id=". $file_id;

$search_Result = mysql_query( $search_SQL, $link_id );



if( mysql_num_rows($search_Result)==0 )

{

	header("Location: file_upload.php");

	exit();

}

$search_Obj = mysql_fetch_object($search_Result);

if( $search_Obj->file_name  != "" )

	unlink("../../file_sub_content/".$search_Obj->file_name );



$sql = "DELETE FROM `tbl_web_sub_content_file`  WHERE  `file_id`=".$file_id;

mysql_query($sql, $link_id);









header("Location: file_upload.php?id=".$item_id);





?>