<?php
header("Content-Type:text/html;charset=utf-8"); 
// admin checking
require_once '../../admin.inc.php';

// Connect Database
require_once("../../php-bin/function.php");
// access control checking
//require_once("z_access_control.php");

$file_id = $_POST['n_id']|0;
$type_id = 9;

//access_detail_check( $type_id );

$date_year = ($_POST[date_year]|0);
$date_month = ($_POST[date_month]|0);
$date_day = ($_POST[date_day]|0);
$date = $date_year ."-". $date_month ."-". $date_day;
$file_year = 0;

if( $date_year!=0 && $date_month!=0 && $date_day!=0 )
{
	if( $date_month >= 9 )
		$file_year = $date_year;
	else
		$file_year = $date_year-1; //pGOp9Y 8-31,ݩW@Ӧ~
}

$date2 = ($_POST["date_year2"]|0) . "-" . ($_POST["date_month2"]|0) . "-" . ($_POST["date_day2"]|0);

$title = addslashes($_POST["n_title"]);
$serial = addslashes($_POST["n_serial"]);
$content = addslashes($_POST["n_content"]);

$link_text = addslashes($_POST["n_link_text"]);
$link_url = addslashes($_POST["n_link_url"]);
$new_window = $_POST["n_new_window"]|0;

$search_SQL = " SELECT  *,Year(file_date) as n_year   FROM  tbl_chancellor   WHERE  file_id=".$file_id;
$search_Result = mysql_query( $search_SQL, $link_id );
$msg=4;
if( $search_Obj=mysql_fetch_object($search_Result) )
{

	$update_sql = " UPDATE `tbl_chancellor`   SET 
	 `file_type_id`=$type_id , 
	 `file_date`='$date' , 
	 `file_exp_date`='$date2' ,
	 `file_title`= '$title' ,
	 `file_serial`= '$serial' ,
	 `file_content` = '$content',
	 `file_link_text` = '$link_text',
	 `file_link_url`='$link_url' ,
	 `file_link_new_window`=$new_window ,
	 `file_year`=$file_year
	WHERE file_id=$file_id
	";
    mysql_query("set names utf8");
	mysql_query($update_sql, $link_id);

	
	$filename = $_FILES["n_file"]['name'];
	$new_filename = $file_id."_".(time()|0).substr($filename,-4);


	if( isset($_FILES["n_file"]["tmp_name"]) && $_FILES["n_file"]["tmp_name"] != "" )
	{
		if (!copy($_FILES["n_file"]["tmp_name"], "../../file_download/".$new_filename))
		{
			echo "Fail to copy doc file - " . $_FILES["n_file"]["tmp_name"];
			exit();
		}
		else
		{
			unlink("../../file_download/".$search_Obj->file_file_name);

			$query = "UPDATE  `tbl_chancellor`   SET   file_file_name='$new_filename'   WHERE   file_id=$file_id ";
			mysql_query ($query);
		}
	}


	$search_SQL2 = " SELECT  *   FROM  tbl_chancellor   WHERE  file_id=".$file_id;
	$search_Result2 = mysql_query( $search_SQL2, $link_id );
	$search_Obj2=mysql_fetch_object($search_Result2);


	$msg = "3";
	mysql_close();


	header( "Location: n_search.php?msg=".$msg);

}
else
	header( "Location: n_search.php?msg=".$msg);


?>