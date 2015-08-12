<?php

set_time_limit( 600 );

header("Content-Type:text/html;charset=utf-8"); 

// admin checking

require_once("../../php-bin/admin_check.php");



// access control checking

require_once("z_access_control.php");



// Connect Database

require_once("../../php-bin/function.php");











$item_id = $_POST["id"]|0;





$item_sql = ' SELECT  *  FROM  tbl_web_sub_content_item  WHERE  web_sub_content_item_id='.$item_id;

$item_result = mysql_query( $item_sql, $link_id );

if( $item_obj = mysql_fetch_object($item_result) )

{

	foreach($_FILES["file_ary"]["error"] as $key => $error)

	{

		if ($error == UPLOAD_ERR_OK)

		{

			$upfile = $_FILES["file_ary"]["tmp_name"][$key];

			$remark = EncodeHTMLTag($_POST["remark"][$key]);

			$ext = EncodeHTMLTag(strrchr($_FILES["file_ary"]['name'][$key], "."));

	

			$ran_num = (time()|0)."_".rand(0,999999999);

			$output_path = "../../file_sub_content/";

			$ori_file_name = $item_id."_$ran_num$ext";

	



			copy( $upfile,  $output_path.$ori_file_name );

			

			$sql_c = "INSERT INTO tbl_web_sub_content_file ( `web_sub_content_item_id`, `file_name`, `file_remark` ) VALUES ($item_id, '".$ori_file_name."', '".$remark."')";



			mysql_query($sql_c,$link_id);

		}

	}



	header("Location: file_upload.php?id=".$item_id);

}

else

{

	?>

<script>

alert("not exist");

window.close();

</script>

	<?php

}

?>