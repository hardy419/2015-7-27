<?php   header("Content-Type:text/html;charset=utf-8"); 
// admin checking
require_once("../../admin.inc.php");

// Connect Database
require_once("../../php-bin/function.php");

// access control checking
require_once("z_access_control.php");





$id = $_GET['id']|0;
$file_name = EncodeHTMLTag($_GET["file_name"]);
$remark = EncodeHTMLTag($_GET["remark"]);




$img_sql = " SELECT * FROM  tbl_art_gallery    WHERE  file_name='$file_name' ";
$img_result = mysql_query( $img_sql, $link_id );


if( $img_obj = mysql_fetch_object($img_result) )
{


	//access_detail_check( $img_obj->act_id );



	// delete data
	$add_sql = "DELETE FROM `tbl_art_gallery` WHERE file_name='$file_name' ";

	$run_status = mysql_query($add_sql);

	if (!$run_status)
		$msg = str_replace(" ", "+", "Query failed: " . mysql_error($link_id));
	else
	{
		unlink("../../gallery_activity/".$file_name);
		unlink("../../gallery_activity/thumb".$file_name);
		unlink("../../gallery_activity/web".$img_obj->ori_file_name );
		$msg = "The record hadd been delete successfully.";
	}

	mysql_close();

	//echo $add_sql;
	header("Location:gallery.php?msg=$msg&id=$id");

}

?>