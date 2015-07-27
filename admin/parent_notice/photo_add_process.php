<?
	// admin checking
	require_once("../../php-bin/admin_check.php");
    
    // Connect Database
    require("../../php-bin/function.php");
    require("../../php-bin/pagedisplay.php");

//////////////////////////////////////////////////////////////////////////////////////////////////////
/*								   Start Upload Photo       										*/
//////////////////////////////////////////////////////////////////////////////////////////////////////
	
	foreach ($_FILES["photo"]["error"] as $key => $error) {
		if ($error == UPLOAD_ERR_OK) {
			
			$ran_num = rand(1000,999999999);
			
			require_once("../../php-bin/image_resize.php");	// function for resize photo
			require_once("../../php-bin/lib_img_resize.php");	// function for resize photo
			
			$upfile = $_FILES["photo"]["tmp_name"][$key];
			$orgfile_output=$_POST["id"];
			$orgfile_output .= "_$ran_num.jpg";
			$smallfile_output=$_POST["id"];
			$smallfile_output .= "_$ran_num.jpg";
			$output_path="../../userUpload/notice/";

			$size = GetImageSize($upfile);
			
			image_resize_lib($upfile,$orgfile_output,$output_path."original/",$size[0],$size[1]);
			image_resize_lib($upfile,$orgfile_output,$output_path,640);
			image_resize_lib($upfile,$smallfile_output,$output_path."small/",112,84);

			$sql_c = "INSERT INTO `tbl_notice_photo` (`n_id`,`photo_name`, `order` , `p_info`) VALUES ('".$_POST[id]."', '".$orgfile_output."', '10' , '暫無')";
			
			mysql_query($sql_c,$link_id);
		}
	}
	
//////////////////////////////////////////////////////////////////////////////////////////////////////
/*										End Upload Photo       										*/
//////////////////////////////////////////////////////////////////////////////////////////////////////

?>