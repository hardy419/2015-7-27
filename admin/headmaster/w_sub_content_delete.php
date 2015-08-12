<?php

header("Content-Type:text/html;charset=utf-8"); 

// admin checking

require_once("../../php-bin/admin_check.php");



// access control checking

require_once("z_access_control.php");



// Connect Database

require_once("../../php-bin/function.php");



// sub content id

$sub_content_id = $_GET['id']|0;















$sub_content_SQL    = "SELECT * FROM    tbl_web_sub_content    WHERE    web_sub_content_id=". $sub_content_id;

$sub_content_Result = mysql_query( $sub_content_SQL, $link_id );





if( $sub_content_Obj = mysql_fetch_object($sub_content_Result) )

{



	// delete tbl_web_sub_content_gallery image files

	$item_img_Sql = " SELECT * FROM    tbl_web_sub_content_item  AS  i   LEFT JOIN    tbl_web_sub_content_gallery  AS g    ON(i.web_sub_content_item_id=g.web_sub_content_item_id)    WHERE     i.web_sub_content_id=". $sub_content_id;

	$item_img_Result = mysql_query( $item_img_Sql, $link_id );

	while( $item_img_Obj = mysql_fetch_object($item_img_Result) )

	{

		if( $item_img_Obj->file_name != "" )

		{

			unlink("../../gallery_sub_content/original/".$item_img_Obj->ori_file_name);

			unlink("../../gallery_sub_content/small/".$item_img_Obj->file_name);

			unlink("../../gallery_sub_content/".$item_img_Obj->file_name);

		}

	}



	// delete tbl_web_sub_content_file files

	$item_files_Sql = " SELECT * FROM    tbl_web_sub_content_item  AS  i   LEFT JOIN    tbl_web_sub_content_file   AS f    ON(i.web_sub_content_item_id=f.web_sub_content_item_id)    WHERE     i.web_sub_content_id=". $sub_content_id;

	$item_files_Result = mysql_query( $item_files_Sql, $link_id );

	while( $item_files_Obj = mysql_fetch_object($item_files_Result) )

	{

		if( $item_files_Obj->file_name != "" )

			unlink("../../file_sub_content/".$item_files_Obj->file_name);

	}







	$item_Sql = " SELECT * FROM    tbl_web_sub_content_item   WHERE     web_sub_content_id=". $sub_content_id;

	$item_Result = mysql_query( $item_Sql, $link_id );

	while( $item_Obj = mysql_fetch_object($item_Result) )

	{

		// delete tbl_web_sub_content_file  records

		$del_f_SQL = "DELETE FROM    tbl_web_sub_content_file     WHERE   web_sub_content_item_id=".$item_Obj->web_sub_content_item_id;

		mysql_query($del_f_SQL, $link_id);



		// delete tbl_web_sub_content_gallery records

		$del_g_SQL = "DELETE FROM    tbl_web_sub_content_gallery    WHERE   web_sub_content_item_id=".$item_Obj->web_sub_content_item_id;

		mysql_query($del_g_SQL, $link_id);



		// delete item background

		if( $item_Obj->bg_img != "" )

			unlink( "../../gallery_sub_content/".$item_Obj->bg_img );

	}



	// delete tbl_web_sub_content_item records

	$del_item_SQL = "DELETE FROM    tbl_web_sub_content_item    WHERE   web_sub_content_id=".$sub_content_id;

	mysql_query($del_item_SQL, $link_id);



}



// delete tbl_web_sub_content records

$del_sub_content_SQL = "DELETE FROM   tbl_web_sub_content    WHERE   web_sub_content_id=".$sub_content_id;

mysql_query($del_sub_content_SQL, $link_id);









/*

$del_img_table_SQL = "DELETE FROM    tbl_web_sub_content_img    WHERE   web_sub_content_id=".$sub_content_id;

mysql_query($del_img_table_SQL, $link_id);

*/



mysql_close();



header("Location: w_search.php?id=". $sub_content_Obj->web_content_id);

?>