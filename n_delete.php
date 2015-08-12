<?php
header("Content-Type:text/html;charset=utf-8"); 
// admin checking
require_once '../../admin.inc.php';

// Connect Database
require_once("../../php-bin/function.php");

// access control checking
//require_once("z_access_control.php");

$file_id = $_GET['id']|0;
$action = $_GET['action']|0;
$msg = "6";

$search_SQL = " SELECT  *   FROM  tbl_chancellor   WHERE  file_id=".$file_id;
$search_Result = mysql_query( $search_SQL, $link_id );

if( $search_Obj=mysql_fetch_object($search_Result) )
{
	//access_detail_check( $search_Obj->file_type_id );
	if( $action == 3 )
	{
		@unlink("../../file_download/".$search_Obj->file_photo);
		@unlink("../../file_download/thumb".$search_Obj->file_photo);
		
		$del_SQL = " UPDATE  tbl_chancellor  SET  file_photo=''  WHERE  file_id=".$file_id;
		mysql_query( $del_SQL, $link_id );
		$msg = "5";


		$search_SQL2 = " SELECT  *   FROM  tbl_chancellor   WHERE  file_id=".$file_id;
		$search_Result2 = mysql_query( $search_SQL2, $link_id );
		$search_Obj2=mysql_fetch_object($search_Result2);

		//header( "Location: n_search.php?msg=".$msg );
		header( "Location: n_search.php?start_search=1&msg=". $msg ."&n_type=". $search_Obj->file_type_id ."&n_year=". substr($search_Obj->file_date, 0,4) ."&n_month=". substr($search_Obj->file_date, 5,2) ."&n_title=". $search_Obj->file_title );
	}
	else if( $action == 2 )
	{
		unlink("../../file_download/".$search_Obj->file_file_name);
		
		$del_SQL = " UPDATE  tbl_chancellor  SET  file_file_name=''  WHERE  file_id=".$file_id;
		mysql_query( $del_SQL, $link_id );
		$msg = "5";


		$search_SQL2 = " SELECT  *   FROM  tbl_chancellor   WHERE  file_id=".$file_id;
		$search_Result2 = mysql_query( $search_SQL2, $link_id );
		$search_Obj2=mysql_fetch_object($search_Result2);

		//header( "Location: n_search.php?msg=".$msg );
		header( "Location: n_search.php?start_search=1&msg=". $msg ."&n_type=". $search_Obj->file_type_id ."&n_year=". substr($search_Obj->file_date, 0,4) ."&n_month=". substr($search_Obj->file_date, 5,2) ."&n_title=". $search_Obj->file_title );
	}
	else
	{
		@unlink("../../file_download/".$search_Obj->file_photo);
		@unlink("../../file_download/thumb".$search_Obj->file_photo);
		unlink("../../file_download/".$search_Obj->file_file_name);
		
		$del_SQL = " DELETE FROM  tbl_chancellor   WHERE  file_id=".$file_id;
		mysql_query( $del_SQL, $link_id );

		$msg = "5";

		$search_SQL2 = " SELECT  *   FROM  tbl_chancellor   WHERE  file_id=".$last_insert_id;
		$search_Result2 = mysql_query( $search_SQL2, $link_id );
		$search_Obj2=mysql_fetch_object($search_Result2);
		header( "Location: n_search.php?start_search=1&msg=". $msg ."&n_type=". $search_Obj2->file_type_id ."&n_year=". substr($search_Obj2->file_date, 0,4) ."&n_month=". substr($search_Obj2->file_date, 5,2) ."&n_title=". $search_Obj2->file_title );
	}

	mysql_close();
}
else
	header( "Location: n_search.php?msg=".$msg);

?>