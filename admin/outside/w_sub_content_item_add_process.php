<?php



// admin checking

require_once("../../php-bin/admin_check.php");



// access control checking

require_once("z_access_control.php");



// Connect Database

require_once("../../php-bin/function.php");



// function for resize photo

require_once("../../php-bin/lib_img_resize.php");



















$sub_content_ID = $_POST['sub_content_id']|0;

$item_Title = EncodeHTMLTag($_POST['item_title']);

$item_Html  = str_replace("'", "&#039;", $_POST['item_html']);

$file_output = "";

$output_path="../../gallery_sub_content/";







$item_Day = $_POST['item_day']|0;

$item_Month = $_POST['item_month']|0;

$item_Year = $_POST['item_year']|0;











/*

if( $item_Title=='' )

{

	header("Location: w_sub_content.php?id=".$sub_content_ID);

	exit();

}

*/



if( $item_Day>0 && $item_Day<=31 && $item_Month>0 && $item_Month<=12 && $item_Year>=1996 )

	$add_sql = "INSERT INTO `tbl_web_sub_content_item` ( `web_sub_content_id` , `web_sub_content_item_title` , `web_sub_content_item_html` , `web_sub_content_item_text`, `date` )  VALUES ( '". $sub_content_ID ."', '". $item_Title ."', '". $item_Html ."', '". strip_tags($item_Html) ."', '$item_Year-$item_Month-$item_Day' )";

else

	$add_sql = "INSERT INTO `tbl_web_sub_content_item` ( `web_sub_content_id` , `web_sub_content_item_title` , `web_sub_content_item_html` )  VALUES ( '". $sub_content_ID ."', '". $item_Title ."', '". $item_Html ."' )";







$run_status = mysql_query($add_sql, $link_id);

if (!$run_status)

{

	$msg = str_replace(" ", "+", "Query failed: " . mysql_error($link_id));

}

else

{

	$item_id = mysql_insert_id($link_id);







//////////////////////////////////////////////////////////////////////////////////////////////////////

/*								   Start Upload Photo       										*/

//////////////////////////////////////////////////////////////////////////////////////////////////////

	

foreach( $_FILES["photo"]["error"] as $key => $error )

{

	if ($error == UPLOAD_ERR_OK)

	{



		$ran_num = (time()|0)."_".rand(0,999999999);

		

		

		$upfile = $_FILES["photo"]["tmp_name"][$key];

		$file_output = "bg_".$sub_content_ID."_$ran_num.png";



		$size = GetImageSize($upfile);

		

		//image_resize($upfile,$file_output,$output_path."original/",$size[0],$size[1],120);

		image_resize($upfile,$file_output,$output_path,360,270,120);

		//image_resize($upfile,$file_output,$output_path."small/",90,69,120);

	}

}

	

//////////////////////////////////////////////////////////////////////////////////////////////////////

/*										End Upload Photo       										*/

//////////////////////////////////////////////////////////////////////////////////////////////////////





	if( $file_output != "" )

	{

		$update_sql = "UPDATE `tbl_web_sub_content_item` SET `bg_img`='$file_output'  WHERE web_sub_content_item_id=".$item_id;

		mysql_query($update_sql, $link_id);

	}













	$msg = "比賽學生添加完成";









}

mysql_close();







//header("Location: w_sub_content.php?id=".$sub_content_ID);

header("Location: w_sub_content_item_update.php?id=".$item_id);







?>