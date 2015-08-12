<?php   header("Content-Type:text/html;charset=utf-8"); 

// admin checking

require_once("../../php-bin/admin_check.php");



// access control checking

require_once("z_access_control.php");



// Connect Database

require_once("../../php-bin/function.php");











$id = $_GET['id']|0;

$file_name = EncodeHTMLTag($_GET["file_name"]);

$remark = EncodeHTMLTag($_GET["remark"]);





$img_sql = " SELECT * FROM  tbl_web_sub_content_gallery    WHERE  file_name='$file_name' ";

$img_result = mysql_query( $img_sql, $link_id );





if( $img_obj = mysql_fetch_object($img_result) )

{



	// Insert new data

	$del_sql = "DELETE FROM `tbl_web_sub_content_gallery` WHERE file_name='$file_name' ";



	$run_status = mysql_query($del_sql);



	if (!$run_status)

		$msg = str_replace(" ", "+", "Query failed: " . mysql_error($link_id));

	else

	{

		unlink("../../gallery_sub_content/".$file_name);

		unlink("../../gallery_sub_content/small/".$file_name);

		unlink("../../gallery_sub_content/original/".$img_obj->ori_file_name);

		$msg = "已刪除相片";

	}



	mysql_close();



	//echo $add_sql;

	header("Location:w_gallery.php?msg=$msg&id=$id");



}



?>