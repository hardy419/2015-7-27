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

$item_ID        = $_POST['item_id']|0;

$item_Title = EncodeHTMLTag($_POST['item_title']);

$item_Order = $_POST['item_order']|0;

$item_Html  = str_replace("'", "&#039;", $_POST['elm1']);

$file_name = "";









$item_Day = $_POST['item_day']|0;

$item_Month = $_POST['item_month']|0;

$item_Year = $_POST['item_year']|0;











/*

if( $item_Title=='' )

{

	header("Location: w_sub_content_item_update.php?id=".$item_ID);

	exit();

}

*/











$item_sql = " SELECT * FROM  tbl_web_sub_content_item  WHERE   `web_sub_content_item_id`=".$item_ID;

$item_result = mysql_query($item_sql, $link_id);

$item_obj = mysql_fetch_object($item_result);





//////////////////////////////////////////////////////////////////////////////////////////////////////

/*								   Start Upload Photo       										*/

//////////////////////////////////////////////////////////////////////////////////////////////////////

	

foreach( $_FILES["photo"]["error"] as $key => $error )

{

	if ($error == UPLOAD_ERR_OK)

	{

		$upfile = $_FILES["photo"]["tmp_name"][$key];



		$ran_num = (time()|0)."_".rand(0,999999999);

		$ext = strrchr($_FILES["photo"]['name'][$key], ".");

		$file_name = "bg_".$sub_content_ID."_$ran_num$ext";



		$output_path="../../gallery_sub_content/";

		$size = GetImageSize($upfile);



		//image_resize($upfile,$file_name,$output_path."original/",$size[0],$size[1],120);

		//image_resize($upfile,$file_name,$output_path,360,270,120);

		//image_resize($upfile,$file_name,$output_path."small/",90,69,120);

		copy( $upfile,  $output_path.$ori_file_name );





		if( $item_obj->bg_img != "" )

			unlink("../../gallery_sub_content/".$item_obj->bg_img);

	}

}

	

//////////////////////////////////////////////////////////////////////////////////////////////////////

/*										End Upload Photo       										*/

//////////////////////////////////////////////////////////////////////////////////////////////////////

















$sql_date = "NULL";

$sql_file = "'".$item_obj->bg_img."'";



if( $item_Day>0 && $item_Day<=31 && $item_Month>0 && $item_Month<=12 && $item_Year>=1996 )

	$sql_date = "'$item_Year-$item_Month-$item_Day'";

if( $file_name != "" )

	$sql_file = "'$file_name'";





$update_sql = "UPDATE    `tbl_web_sub_content_item`  SET

 `web_sub_content_item_title` = '". $item_Title ."',

 `web_sub_content_item_order` = ". $item_Order .",

 `web_sub_content_item_html` = '". $item_Html ."',

 `web_sub_content_item_text` = '". strip_tags($item_Html) ."',

 `date` = $sql_date,

 `bg_img` = $sql_file 

WHERE   `web_sub_content_item_id`=".$item_ID;













$run_status = mysql_query($update_sql, $link_id);

if (!$run_status)

	$msg = str_replace(" ", "+", "Query failed: " . mysql_error($link_id));

else

	$msg = "比賽學生添加完成";

mysql_close();







header("Location: w_sub_content.php?id=".$sub_content_ID);







?>