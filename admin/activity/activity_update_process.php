<?php   header("Content-Type:text/html;charset=utf-8"); 
require_once("../../admin.inc.php");

// Connect Database
require_once("../../php-bin/function.php");

// access control checking
require_once("z_access_control.php");




$year = 0;
$sql_date = "NULL";
$date_year = ($_POST[date_year]|0);
$date_month = ($_POST[date_month]|0);
$date_day = ($_POST[date_day]|0);
if( $date_day>0 && $date_day<=31 && $date_month>0 && $date_month<=12 && $date_year>=1990 )
{
	$sql_date = "'$date_year-$date_month-$date_day'";
	//if( $date_month >= 9 )
		$year = $date_year;
	//else
		//$year = $date_year-1;
}

$id = $_POST[id]|0;
$name = EncodeHTMLTag($_POST['name']);
$desc = EncodeHTMLTag($_POST['desc']);
$participant = addslashes($_POST['participant']);
$class_year = $_POST[class_year]|0;
$type_id = $_POST[type_id]|0;

$order = $_POST["order"]|0;
$add_time = date('Y-m-d H:i:s', time());
$path_pdf = "../../userfiles/upload/";
$re_name_pdf = $_POST[link_pic1]|'';
$re_name = date("YmdHis").'_'.(floor(microtime()*1000));
if($_FILES["a_file"]["name"]!=""){
			$type = strtolower(strrchr($_FILES["a_file"]["name"],"."));
			$re_name_pdf =$re_name.$type;
			$allow_type = array('.rar','.pdf','.doc','.xlsx','.docx','.xls','.jpg','.gif','.png','.bmp');
			if(!in_array($type,$allow_type))
			{
				die('請選擇正確的文件類型(rar/pdf/doc/xls/pic)');
			}
			if (isset($_FILES["a_file"]["tmp_name"]) && $_FILES["a_file"]["tmp_name"] != "")
			{
				if (!copy($_FILES["a_file"]["tmp_name"], $path_pdf.$re_name_pdf))
				{
					echo "Fail to copy doc file - " . $_FILES["a_file"]["tmp_name"];
					exit();
				}
				else
				{
					$a_file=$re_name_pdf;
				}
			}
}


// Insert new data
if( $id != 0 )
{
	$update_sql = "UPDATE `tbl_activity` SET
		`name` = '$name' ,
		`participant` = '$participant' ,
		`date` = $sql_date ,
		`year` = $year ,
		`description` = '$desc' ,
		`modified_by` = '".$_SESSION["plk_admin_user_name"]."' ,
		`modified_date` = now() ,
		`type_id` = $type_id ,
		`file_file_name` = '$re_name_pdf',
		`class_year` = $class_year
	WHERE id = '$id' ";
    mysql_query("set names utf8");
	$run_status = mysql_query($update_sql);

	if (!$run_status)
		$msg = str_replace(" ", "+", "tο~: " . mysql_error($link_id));
	else
		$msg = "Record has been updated successfully.";

	mysql_close();
	//header("Location:activity.php?msg=$msg&t_name=".$name."&type_id=".$type_id);
	header("Location:activity.php?msg=$msg&type_id=".$type_id.'&type='.$type_id);

}
?>