<?php
	// Work-around for setting up a session because Flash Player doesn't send the cookies
	if (isset($_POST["PHPSESSID"])) {
		session_id($_POST["PHPSESSID"]);
	}
	session_start();
	
	require_once("../../../admin.inc.php");
	
	if (!isset($_FILES["Filedata"]) || !is_uploaded_file($_FILES["Filedata"]["tmp_name"]) || $_FILES["Filedata"]["error"] != 0) {
		echo "There was a problem with the upload";

		exit(0);
	}
	



	$id = $_POST[id]|0;
	$remark = $_POST["remarks"];
	$g_order = 100 ; // $_POST["order"]|0;
	$ext = strrchr($_FILES["Filedata"]['name'], ".");

	$ran_num = (time()|0)."_".rand(0,999999999);
	$output_path = "../../../gallery_activity/";
	$file_name = $id."_$ran_num.png";
	$ori_file_name = $id."_$ran_num$ext";

//		$size = GetImageSize($upfile);
	
	// copy($upfile,$output_path.$file_name);
//		image_resize( $upfile, $output_filename, $output_path, 190, 120);
//		// copy($upfile,$output_path."small/".$file_name);
//		image_resize( $upfile, $output_filename, $output_path, 90, 60);
//		copy( $upfile,  $output_path."original/".$ori_file_name );
		
	$image = require_once("../../../include/image.class.php");
	$image = new image();
	$image->source=$_FILES['Filedata']["tmp_name"];
	$image->allow_size=5;
	$image->save_path="../../../gallery_activity/";
	$image->save_name=$ori_file_name;
	if($image->upload()){
		// mysql_query("INSERT INTO tbl_file_attachment (`file_id`, `url`) value({$last_insert_id}, '{$filename}');");
		$image->create_img(190, 120, 0, NULL, "web");
		$image->create_img(90, 60, 0, NULL, "thumb");
	}
	
	$sql_c = "INSERT INTO `tbl_activity_gallery` ( `act_id`, `file_name`, `ori_file_name`, `remark`, `g_order` ) VALUES ('$id', '$ori_file_name', '$ori_file_name', '$remark', $g_order )";
	
	mysql_query($sql_c);
?>