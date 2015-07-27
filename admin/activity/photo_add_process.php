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
			
			$ran_num = rand(0,999999999);
			
			require_once("../../php-bin/image_resize.php");	// function for resize photo
			
			$upfile = $_FILES["photo"]["tmp_name"][$key];
			$remark = $_POST["remark"][$key];
			$orgfile_output=$_POST["id"];
			$orgfile_output .= "_$ran_num.jpg";
			$smallfile_output=$_POST["id"];
			$smallfile_output .= "_$ran_num.jpg";
			$output_path="../../gallery/";

			$size = GetImageSize($upfile);
			
			image_resize($upfile,$orgfile_output,$output_path."original/",$size[0],$size[1],120);
			image_resize($upfile,$orgfile_output,$output_path,240,180,120);
			image_resize($upfile,$smallfile_output,$output_path."small/",88,66,120);

			$sql_c = "INSERT INTO `tbl_gallery` ( `act_id`, `file_name`, `remark` ) VALUES ('".$_POST[id]."', '".$orgfile_output."', '".$remark."')";
			mysql_query($sql_c,$link_id);
		}
	}
	
//////////////////////////////////////////////////////////////////////////////////////////////////////
/*										End Upload Photo       										*/
//////////////////////////////////////////////////////////////////////////////////////////////////////

?>