<?php
header("Content-Type:text/html;charset=utf-8"); 

// admin checking
require_once("../../admin.inc.php");



// Connect Database

require_once("../../php-bin/function.php");



// access control checking

require_once("z_access_control.php");



$date_year = ($_POST[date_year]|0);

$date_month = ($_POST[date_month]|0);

$date_day = ($_POST[date_day]|0);

$date = $date_year ."-". $date_month ."-". $date_day;

$category_id = $_POST['_POST']|0;

$title = EncodeHTMLTag($_POST["title"]);

$video = EncodeHTMLTag($_POST["video"]);

$picture = EncodeHTMLTag($_POST["picture"]);



$add_sql = "INSERT INTO tbl_video (`category_id`, `date`, title, video, picture) VALUES ( ".$category_id.", '".$date."', '".$title."', '".$video."', '".$picture."')";



if (mysql_query($add_sql, $link_id)) {



	$last_insert_id = mysql_insert_id($link_id);




	$filename = $_FILES["mp3_file"]['name'];

     $nums = count($_FILES["mp3_file"]['name']);
	 $i = 0;
	 $file_str   = "";
	 
	 foreach($filename as $key=>$row){
	 if ($row != ""){
	 $filename1 = $_FILES["mp3_file"]['name'][$key];
	
	$new_filename = $last_insert_id."_".(time()|0).substr($filename1,-4);
	$file_str .=$new_filename."||";



	if (isset($_FILES["mp3_file"]["tmp_name"][$key]) && $_FILES["mp3_file"]["tmp_name"][$key] != "") {


		if (!copy($_FILES["mp3_file"]["tmp_name"][$key],"../../file_download/download_area/".$new_filename)) {
			echo "../../file_download/download_area/".$new_filename;
			exit;
			echo "Fail to copy doc file - " . $_FILES["mp3_file"]["tmp_name"][$key];

			exit();

		} 
	

	}

}}//echo $file_str;exit;


			$query = "UPDATE tbl_mp3 SET mp3_file = '".$file_str."' WHERE mp3_id = ".$last_insert_id;
//echo $query;exit;
			mysql_query ($query);

	
	$msg = "Add Sucess";



//	$search_SQL2 = " SELECT  *,Year(file_date) as n_year   FROM  tbl_file   WHERE  file_id=".$last_insert_id;

	$search_SQL2 = "SELECT * FROM tbl_mp3 WHERE mp3_id = ".$last_insert_id;

	$search_Result2 = mysql_query( $search_SQL2, $link_id );

	$search_Obj2=mysql_fetch_object($search_Result2);



	mysql_close();



//	header( "Location: n_search.php?start_search=1&msg=". $msg ."&n_type=". $search_Obj2->file_type_id ."&n_year=". $search_Obj2->n_year ."&n_month=". substr($search_Obj2->file_date, 5,2) ."&n_title=". $search_Obj2->file_title );

	header("Location: search.php?start_search=1&msg=".$msg."&mp3_title=".urlencode($search_Obj2->mp3_title)."&mp3_type_id=".urlencode($search_Obj2->mp3_type_id));



} else {

	$msg = "X";

	mysql_close();

//	header( "Location: n_search.php?msg=". $msg  );

	header("Location: search.php?msg=".$msg);

}



?>