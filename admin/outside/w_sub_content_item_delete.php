<?php

 header("Content-Type:text/html;charset=utf-8"); 

// admin checking

require_once("../../php-bin/admin_check.php");



// access control checking

require_once("z_access_control.php");



// Connect Database

require_once("../../php-bin/function.php");







// sub content id

$item_id = $_GET['id']|0;

$action_type = $_GET['action']|0;



























$item_sql    = "SELECT * FROM    tbl_web_sub_content_item    WHERE      web_sub_content_item_id=". $item_id;

$item_result = mysql_query( $item_sql, $link_id );





if( mysql_num_rows($item_result) >= 1 )

{

	$item_obj    = mysql_fetch_object($item_result);





	if( $action_type == 2 )

	{

		if( $item_obj->bg_img != "" )

			unlink( "../../gallery_sub_content/".$item_obj->bg_img );

		$update_record_SQL = "UPDATE    tbl_web_sub_content_item   SET bg_img=''    WHERE   web_sub_content_item_id=".$item_id;

		mysql_query($update_record_SQL, $link_id);

		mysql_close();

		header("Location: w_sub_content_item_update.php?id=". $item_id);	

	}

	else

	{





		// delete img files

		$img_sql = " SELECT * FROM   tbl_web_sub_content_gallery  WHERE   web_sub_content_item_id=".$item_id;

		$img_result = mysql_query($img_sql, $link_id);

		while( $img_obj = mysql_fetch_object($img_result) )

		{

			if( $img_obj->file_name != "" )

			{

				unlink("../../gallery_sub_content/".$img_obj->file_name);

				unlink("../../gallery_sub_content/small/".$img_obj->file_name);

				unlink("../../gallery_sub_content/original/".$img_obj->ori_file_name);

			}

		}





		// delete upload files

		$files_sql = " SELECT * FROM   tbl_web_sub_content_file  WHERE   web_sub_content_item_id=".$item_id;

		$files_result = mysql_query($files_sql, $link_id);

		while( $files_obj = mysql_fetch_object($files_result) )

		{

			if( $files_obj->file_name != "" )

				unlink("../../file_sub_content/". $files_obj->file_name );

		}



		// delete files record

		$del_item_files_sql = "DELETE FROM    tbl_web_sub_content_file     WHERE   web_sub_content_item_id=".$item_id;

		mysql_query($del_item_files_sql, $link_id);





		// delete item background

		if( $item_obj->bg_img != "" )

			unlink( "../../gallery_sub_content/".$item_obj->bg_img );



		// delete img record

		$del_item_gallery_sql = "DELETE FROM    tbl_web_sub_content_gallery    WHERE   web_sub_content_item_id=".$item_id;

		mysql_query($del_item_gallery_sql, $link_id);



		// delete item record

		$del_item_sql = "DELETE FROM    tbl_web_sub_content_item    WHERE   web_sub_content_item_id=".$item_id;

		mysql_query($del_item_sql, $link_id);



		mysql_close();

		header("Location: w_sub_content.php?id=". $item_obj->web_sub_content_id);

	}

}

else

	header("w_search.php");



?>