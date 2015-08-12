<?php

set_time_limit( 60 );





require_once("function.php");	// function for resize photo

require_once("lib_img_resize.php");	// function for resize photo





foreach ($_FILES["photo"]["error"] as $key => $error)

{

	if ($error == UPLOAD_ERR_OK)

	{

		$ran_num = (time()|0)."_".rand(0,999999999);

		

		

		$upfile = $_FILES["photo"]["tmp_name"][$key];

		$remark = EncodeHTMLTag($_POST["remark"][$key]);

		$orgfile_output=$id;

		$orgfile_output .= "_$ran_num.png";

		$smallfile_output=$id;

		$smallfile_output .= "_$ran_num.png";

		$output_path="../../gallery_sub_content/";

		

		$size = GetImageSize($upfile);

		

		image_resize($upfile,$orgfile_output,$output_path,360,270,120);

		image_resize($upfile,$smallfile_output,$output_path."small/",90,67.5,120);

		copy( $upfile,  $output_path."original/".$id."_".$ran_num.substr($_FILES["photo"]['name'][$key],-4) );

		//image_resize($upfile,$orgfile_output,$output_path."original/",$size[0],$size[1],120);



		

		$sql_c = "INSERT INTO `tbl_web_sub_content_gallery` ( `web_sub_content_item_id`, `file_name`, `remark` ) VALUES ('$id', '".$orgfile_output."', '".$remark."')";

		mysql_query($sql_c,$link_id);

	}

}





?>