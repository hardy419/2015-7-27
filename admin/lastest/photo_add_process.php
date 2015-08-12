<?php   header("Content-Type:text/html;charset=utf-8"); 
require_once("../../admin.inc.php");

// Connect Database
require_once("../../php-bin/function.php");
// access control checking
//require_once("z_access_control.php");
require_once("../../php-bin/pagedisplay.php");
// function for resize photo
// require_once("../../include/image.class.php");
$id = $_POST[id]|0;

foreach ($_FILES["photo"]["error"] as $key => $error)
{ 
	
	if ($error == 0)
	{ 
		$upfile = $_FILES["photo"]["tmp_name"][$key];
		$remark = EncodeHTMLTag($_POST["remark"][$key]);
		$g_order = $_POST["order"][$key]|0;
		$ext = strrchr($_FILES["photo"]['name'][$key], ".");

		$ran_num = (time()|0)."_".rand(0,999999999);
		$output_path = "../../gallery_activity/";
		$file_name = $id."_$ran_num.png";
		$ori_file_name = $id."_$ran_num$ext";
			
		$image = require_once("../../include/image.class.php");
		$image = new image();
		$image->source=$_FILES['photo']["tmp_name"][$key];
		$image->allow_size=5;
		$image->save_path="../../gallery_activity/";
		$image->save_name=$ori_file_name;
		
		$image->upload();
		$image->create_img(190, 120, 0, NULL, "web");
		$image->create_img(90, 60, 0, NULL, "thumb");
	
		
		$sql_c = "INSERT INTO `tbl_lastest_gallery` ( `act_id`, `file_name`, `ori_file_name`, `remark`, `g_order` ) VALUES ('$id', '$ori_file_name', '$ori_file_name', '$remark', $g_order )";
		
		mysql_query("set names utf8");
		mysql_query($sql_c,$link_id);
		
	}
}

//////////////////////////////////////////////////////////////////////////////////////////////////////
/*										End Upload Photo       										*/
//////////////////////////////////////////////////////////////////////////////////////////////////////





mysql_close();
header("location:gallery.php?id=$_POST[id]");
?>