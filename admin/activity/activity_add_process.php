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


$name = EncodeHTMLTag($_POST['name']);
$desc = EncodeHTMLTag($_POST['desc']);
$participant = addslashes($_POST['participant']);
$class_year = $_POST[class_year]|0;
$type_id = $_POST[type_id]|0;



//access_detail_check( $type_id );



if( $name != "" )
{

	// Insert new data
	$add_sql = " INSERT INTO `tbl_activity` ( `date` , `year` , `name` , `participant` , `description` , `modified_by` , `modified_date`, `type_id`, `class_year` )
 VALUES ($sql_date, $year, '$name', '$participant', '$desc', '".$_SESSION["plk_admin_user_name"]."', now(), $type_id, $class_year ) ";
	mysql_query("set names utf8");
	$run_status = mysql_query($add_sql);

	if (!$run_status)
		$msg = str_replace(" ", "+", "Query failed: " . mysql_error($link_id));
	else
		$msg = "New record had been added successfully.";

	mysql_close();

	header("Location:activity.php?msg=$msg&t_name=&type_id=".$type_id.'&type='.$type_id);

}

?>