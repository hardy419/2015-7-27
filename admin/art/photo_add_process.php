<?php   header("Content-Type:text/html;charset=utf-8"); 
require_once("../../admin.inc.php");

// Connect Database
require_once("../../php-bin/function.php");

// access control checking
require_once("z_access_control.php");

require_once("../../php-bin/pagedisplay.php");

// function for resize photo
// require_once("../../include/image.class.php");



$id = $_POST[id]|0;




$sql = " SELECT * FROM  tbl_art  WHERE  id=".$id;
mysql_query("set names utf8");
$result = mysql_query($sql);
if( $obj = mysql_fetch_object($result) )
{
	access_detail_check( $obj->type_id );
}
else
	exit();







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
		$output_path = "../../gallery_activity/";
		$file_name = $id."_$ran_num.png";
		$ori_file_name = $id."_$ran_num$ext";

//		$size = GetImageSize($upfile);
		
		// copy($upfile,$output_path.$file_name);
//		image_resize( $upfile, $output_filename, $output_path, 190, 120);
//		// copy($upfile,$output_path."small/".$file_name);
//		image_resize( $upfile, $output_filename, $output_path, 90, 60);
//		copy( $upfile,  $output_path."original/".$ori_file_name );
			
		$image = require_once("../../include/image.class.php");
		$image = new image();
		$image->source=$_FILES['photo']["tmp_name"][$key];
		$image->allow_size=5;
		$image->save_path="../../gallery_activity/";
		$image->save_name=$ori_file_name;
		if($image->upload()){
			// mysql_query("INSERT INTO tbl_file_attachment (`file_id`, `url`) value({$last_insert_id}, '{$filename}');");
			$image->create_img(190, 120, 0, NULL, "web");
			$image->create_img(90, 60, 0, NULL, "thumb");
		}
		
		$sql_c = "INSERT INTO `tbl_art_gallery` ( `act_id`, `file_name`, `ori_file_name`, `remark`, `g_order` ) VALUES ('$id', '$ori_file_name', '$ori_file_name', '$remark', $g_order )";

		mysql_query($sql_c,$link_id);
	}
}

//////////////////////////////////////////////////////////////////////////////////////////////////////
/*										End Upload Photo       										*/
//////////////////////////////////////////////////////////////////////////////////////////////////////





mysql_close();
?>