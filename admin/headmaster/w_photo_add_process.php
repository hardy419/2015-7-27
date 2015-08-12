<?php

header("Content-Type:text/html;charset=utf-8"); 

// admin checking

require_once("../../php-bin/admin_check.php");



// access control checking

require_once("z_access_control.php");



// Connect Database

require_once("../../php-bin/function.php");



require_once("../../php-bin/pagedisplay.php");



// function for resize photo

require_once("../../php-bin/lib_img_resize.php");









$id = $_POST[id]|0;













//////////////////////////////////////////////////////////////////////////////////////////////////////

/*								   Start Upload Photo       										*/

//////////////////////////////////////////////////////////////////////////////////////////////////////



foreach ($_FILES["photo"]["error"] as $key => $error)

{

	if ($error == UPLOAD_ERR_OK)

	{

		$upfile = $_FILES["photo"]["tmp_name"][$key];

		$remark = EncodeHTMLTag($_POST["remark"][$key]);

		$g_order = $_POST["order"][$key]|0;

		$ext = strrchr($_FILES["photo"]['name'][$key], ".");



		$ran_num = (time()|0)."_".rand(0,999999999);

		$output_path = "../../gallery_sub_content/";

		$file_name = $id."_$ran_num.png";

		$ori_file_name = $id."_$ran_num$ext";



		$size = GetImageSize($upfile);

		

		image_resize($upfile,$file_name,$output_path,360,270,120);

		image_resize($upfile,$file_name,$output_path."small/",90,67.5,120);

		copy( $upfile,  $output_path."original/".$ori_file_name );





		$sql_c = "INSERT INTO `tbl_web_sub_content_gallery` ( `web_sub_content_item_id`, `file_name`, `ori_file_name`, `remark`, `g_order` ) VALUES ('$id', '$file_name', '$ori_file_name', '$remark', $g_order )";

		mysql_query($sql_c,$link_id);

	}

}



//////////////////////////////////////////////////////////////////////////////////////////////////////

/*										End Upload Photo       										*/

//////////////////////////////////////////////////////////////////////////////////////////////////////











mysql_close();

?>