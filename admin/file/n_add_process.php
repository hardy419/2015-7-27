<?php
header("Content-Type:text/html;charset=utf-8"); 
// admin checking
require_once '../../admin.inc.php';

// Connect Database
require_once("../../php-bin/function.php");

// access control checking
//require_once("z_access_control.php");

$type_id = $_POST["n_type"]|0;

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

$title = EncodeHTMLTag($_POST["n_title"]);
$serial = EncodeHTMLTag($_POST["n_serial"]);
$content = ($_POST["n_content"]);

$link_text = EncodeHTMLTag($_POST["n_link_text"]);
$link_url = EncodeHTMLTag($_POST["n_link_url"]);
$new_window = $_POST["n_new_window"]|0;





$add_sql = "INSERT INTO `tbl_file` (  `file_type_id` , `file_date` , `file_exp_date` , `file_serial` , `file_title` , `file_content` , `file_link_text` , `file_link_url` , `file_link_new_window`, `file_year`  ) 
VALUES ( $type_id, '$date', '$date2', '$serial', '$title', '$content', '$link_text', '$link_url', $new_window, $file_year );";

if( mysql_query($add_sql, $link_id) )
{



	$last_insert_id = mysql_insert_id($link_id);



	
	if(is_uploaded_file($_FILES["n_photo"]['tmp_name'])){
	
		$uploadfilename = basename($_FILES['n_photo']['name']);
		$suffix = explode('.',$uploadfilename);
		$suffix=$suffix[count($suffix)-1];
		
		if(in_array($suffix, array("php", "php3")))exit("<script>alert('Disallow file type.');history.back(-1);</script>");
	
		$filename="p".$last_insert_id."_".date("YmdHis").rand(10000,99999).'.'.$suffix;
		
		require_once '../../include/image.class.php';
		$image = new image();
		$image->source=$_FILES['n_photo']["tmp_name"];
		$image->allow_size=5;
		$image->save_path="../../file_download/";
		$image->save_name=$filename;
		if($image->upload()){
			// mysql_query("INSERT INTO tbl_file_attachment (`file_id`, `url`) value({$last_insert_id}, '{$filename}');");
			$image->create_img(222, 148, 0, NULL, "thumb");
			$query = "UPDATE  `tbl_file`   SET   file_photo='$filename'   WHERE   file_id=$last_insert_id ";
			mysql_query ($query);
		} else {
			print_r($image->err_log);
			exit;
		}
		
	}


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
			$query = "UPDATE  `tbl_file`   SET   file_file_name='$new_filename'   WHERE   file_id=$last_insert_id ";
			mysql_query ($query);
		}
	}

	$msg = "2";





	$search_SQL2 = " SELECT  *,Year(file_date) as n_year   FROM  tbl_file   WHERE  file_id=".$last_insert_id;
	$search_Result2 = mysql_query( $search_SQL2, $link_id );
	$search_Obj2=mysql_fetch_object($search_Result2);
	$title=$search_Obj2->file_title;
	mysql_close();
	header( "Location: n_search.php");



}
else
{
	$msg = "Ӕʧ";
	mysql_close();
	header( "Location: n_search.php?msg=". $msg  );
}

?>