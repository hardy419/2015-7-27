<?php   header("Content-Type:text/html;charset=utf-8"); 
// admin checking
require_once("../../admin.inc.php");

// access control checking
require_once("z_access_control.php");

// Connect Database
require_once("../../php-bin/function.php");






$c_id = $_GET[id]|0;

$date_year = $_POST[date_year]|0;
$date_month = $_POST[date_month]|0;
$date_day = $_POST[date_day]|0;
if( $date_day>0 && $date_day<=31 && $date_month>0 && $date_month<=12 && $date_year>=1990 )
	$date = $date_year. "-" .$date_month. "-" .$date_day;
else
	$date = date("Y-n-j");

$exp_date_year = $_POST[exp_date_year]|0;
$exp_date_month = $_POST[exp_date_month]|0;
$exp_date_day = $_POST[exp_date_day]|0;
if( $exp_date_day>0 && $exp_date_day<=31 && $exp_date_month>0 && $exp_date_month<=12 && $exp_date_year>=1990 )
	$exp_date = $exp_date_year. "-" .$exp_date_month. "-" .$exp_date_day;
else
	$exp_date = "0000-00-00";

$title = EncodeHTMLTag($_POST[title]);
$serial = EncodeHTMLTag($_POST[serial]);
$content = EncodeHTMLTag($_POST[content]);

$link_text = EncodeHTMLTag($_POST[link_text]);
$link_url = EncodeHTMLTag($_POST[link_url]);
$new_window = EncodeHTMLTag($_POST[new_window]);
$is_news = EncodeHTMLTag($_POST[is_news]);



// calendarid post_id poster date title content posttime 
if( $c_id != 0 )
{

	// Insert new data
	$update_sql = "update `tbl_calendar` set 

link_text='$link_text', 
link_url='$link_url', 
link_open_window='$new_window', 
date='$date' ,
exp_date='$exp_date' ,
title='$title', 
serial='$serial', 
content='$content', 
is_news ='$is_news', 
post_id ='".$_SESSION["kw_admin_user_id"]."', 
poster ='".$_SESSION["plk_admin_user_name"]."',
posttime=now()

  WHERE calendarid=$c_id";
	mysql_query("set names utf8");
	mysql_query($update_sql);





	$pkid = $c_id;
	$oldfilename = $_FILES["file"]['name'];
	$new_file_name = $pkid.substr($oldfilename,-4);	 

	if (isset($_FILES["file"]["tmp_name"])&&$_FILES["file"]["tmp_name"]!="")
	{
		// check the having file.
		$sql = "SELECT `file_name` FROM `tbl_calendar` WHERE calendarid = '$pkid'";

		$result = mysql_query($sql,$link_id); 
		$get_rows = mysql_fetch_array($result);

		if ($get_rows[file_name] != "")
		unlink("../../calendar_attachment/". $get_rows[file_name]);

		$output_path="../../calendar_attachment/";
		if (!copy($_FILES["file"]["tmp_name"],$output_path.$new_file_name))
		{
			echo "Fail to copy doc file - ". $_FILES["file"]["tmp_name"];
			exit();			
		}
		else
		{
			$query="update `tbl_calendar` set file_name ='$new_file_name' where calendarid = '$pkid' ";
			mysql_query($query);
		}
	}

	$msg = "Record had been updated successfully.";




	mysql_close();

	//echo $add_sql;
	header("Location:calendarview.php?year=$_GET[year]&month=$_GET[month]&id=$_GET[id]&msg=$msg");

}

?>