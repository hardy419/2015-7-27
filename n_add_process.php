<?php
header("Content-Type:text/html;charset=utf-8"); 
// admin checking
require_once '../../admin.inc.php';

// Connect Database
require_once("../../php-bin/function.php");

// access control checking
//require_once("z_access_control.php");

$type_id = 9;

//access_detail_check( $type_id );

$date_year = ($_POST[date_year]|0);
$date_month = ($_POST[date_month]|0);
$date_day = ($_POST[date_day]|0);
$date = $date_year ."-". $date_month ."-". $date_day;
$file_year = 0;

// What is this useful???? By Godmark
// m[,?저H[
// 9  1 Ûv?HǻPa By Godmark

if( $date_year!=0 && $date_month!=0 && $date_day!=0 )
{
	if( $date_month >= 9 )
		$file_year = $date_year;
	else
		$file_year = $date_year-1; //?v9ٓ 8-31,?vf?H
}


$date2 = ($_POST["date_year2"]|0) . "-" . ($_POST["date_month2"]|0) . "-" . ($_POST["date_day2"]|0);

$title = addslashes($_POST["n_title"]);
$serial = EncodeHTMLTag($_POST["n_serial"]);
$content = addslashes($_POST["n_content"]);

$link_text = addslashes($_POST["n_link_text"]);
$link_url = EncodeHTMLTag($_POST["n_link_url"]);
$new_window = $_POST["n_new_window"]|0;



$add_sql = "INSERT INTO `tbl_chancellor` (  `file_type_id` , `file_date` , `file_exp_date` , `file_serial` , `file_title` , `file_content` , `file_link_text` , `file_link_url` , `file_link_new_window`, `file_year`  ) 
VALUES ( $type_id, '$date', '$date2', '$serial', '$title', '$content', '$link_text', '$link_url', $new_window, $file_year );";
mysql_query("set names utf8");
if( mysql_query($add_sql, $link_id) )
{
	$last_insert_id = mysql_insert_id($link_id);
	$filename = $_FILES["n_file"]['name'];
	$new_filename = $last_insert_id."_".(time()|0).substr($filename,-4);

	if (isset($_FILES["n_file"]["tmp_name"]) && $_FILES["n_file"]["tmp_name"] != "")
	{
		if (!copy($_FILES["n_file"]["tmp_name"], "../../file_download/".$new_filename))
		{
			echo "Fail to copy doc file - " . $_FILES["n_file"]["tmp_name"];
			exit();
		}
		else
		{
			$query = "UPDATE  `tbl_chancellor`   SET   file_file_name='$new_filename'   WHERE   file_id=$last_insert_id ";
			mysql_query ($query);
		}
	}

	$msg = "1";
	$search_SQL2 = " SELECT  *,Year(file_date) as n_year   FROM  tbl_chancellor   WHERE  file_id=".$last_insert_id;
	$search_Result2 = mysql_query( $search_SQL2, $link_id );
	$search_Obj2=mysql_fetch_object($search_Result2);
	$title=$search_Obj2->file_title;
	mysql_close();
	header( "Location: n_search.php?msg=".$msg);

}else{
	$msg = "2";
	mysql_close();
	header( "Location: n_search.php?msg=". $msg  );
}

?>