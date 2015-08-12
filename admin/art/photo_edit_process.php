<?php   header("Content-Type:text/html;charset=utf-8"); 
// admin checking
require_once("../../admin.inc.php");

// Connect Database
require_once("../../php-bin/function.php");

// access control checking
require_once("z_access_control.php");






$file_name = EncodeHTMLTag($_POST["file_name"]);
$remark = EncodeHTMLTag($_POST["remark"]);
$g_order = $_POST["order"]|0;





// this is a Wrong SQL
//$img_sql = " SELECT * FROM  tbl_art_gallery    WHERE  file_name='$file_name' ";

//Renew By Godmark 20070301
$img_sql = "SELECT ta.type_id FROM `tbl_art_gallery` AS tg , 
`tbl_art` AS ta    LEFT JOIN  tbl_art_type AS tt  ON(ta.type_id=tt.type_id) 
WHERE tg.act_id=ta.id AND tg.file_name='".$file_name."'
ORDER BY  tg.g_order ASC,  tg.file_name ASC";
mysql_query("set names utf8");
$img_result = mysql_query( $img_sql, $link_id );


if( $img_obj = mysql_fetch_object($img_result) )
{



	//this is a Wrong Arg
	//access_detail_check( $img_obj->act_id );

	//Renew By Godmark 20070301
	access_detail_check( $img_obj->type_id );



	$update_sql = "UPDATE `tbl_art_gallery` SET
	`remark`='$remark',
	`g_order`=$g_order 
	WHERE `file_name`='$file_name'  ";
//echo $update_sql;
	mysql_query("set names utf8");
	$run_status = mysql_query($update_sql);

	if (!$run_status)
		$msg = str_replace(" ", "+", "tο~: " . mysql_error($link_id));
	else
		$msg = "The record had been updated successfully.";
	mysql_close();

}




?><script language="javascript">
window.opener.location.reload();
window.close();
</script>