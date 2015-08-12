<?php
header("Content-Type:text/html;charset=utf-8"); 
// admin checking
require_once '../../admin.inc.php';

// Connect Database
require_once("../../php-bin/function.php");

// access control checking
require_once("z_access_control.php");

$file_id = $_GET['id']|0;
$action = $_GET['action']|0;
$msg ="";

$search_SQL = " SELECT  *   FROM  tbl_chancellor   WHERE  file_id=".$file_id;
$search_Result = mysql_query( $search_SQL, $link_id );
$search_Obj=mysql_fetch_object($search_Result);
$type=$search_Obj->file_type_id;
if($search_Obj)
{
	//access_detail_check( $search_Obj->file_type_id );

	@unlink("../../file_download/".$search_Obj->file_photo);
	@unlink("../../file_download/thumb".$search_Obj->file_photo);
	unlink("../../file_download/".$search_Obj->file_file_name);
	$del_SQL = " DELETE FROM  tbl_chancellor   WHERE  file_id=".$file_id;
	mysql_query( $del_SQL, $link_id );
	$msg = "5";
	header( "Location: n_search.php?type=".$type."&msg=".$msg);

	mysql_close();
}
else
	header( "Location: n_search.php?type=".$type."&msg=6" );

?>