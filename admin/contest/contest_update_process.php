<?php
header("Content-Type:text/html;charset=utf-8"); 
// admin checking
require_once("../../admin.inc.php");

// Connect Database
require_once("../../php-bin/function.php");

// access control checking
//require_once("z_access_control.php");


$a_id = $_POST["a_id"]|0;
$u_name = addslashes($_POST['u_name']);
$a_content = addslashes($_POST["a_content"]);
$order = addslashes($_POST["order"]);
$a_id = $_POST['a_id'];
$contype = $_POST['a_type'];
$date_year = ($_POST[date_year]|0);
$date_month = ($_POST[date_month]|0);
$date_day = ($_POST[date_day]|0);
$date = $date_year ."-". $date_month ."-". $date_day;
//$u_pw = EncodeHTMLTag($_POST["u_pw"]);
$subject = EncodeHTMLTag($_POST["subject"]);

$order = $_POST["order"]|0;

$update_sql = "UPDATE `tbl_contest` SET
`a_title`='$u_name', `a_content`='$a_content', `order`='$order', `a_date`='$date' WHERE `a_id`=".$a_id;
mysql_query("set names utf8");
$run_status = mysql_query( $update_sql, $link_id );

if(!$run_status )
{
	$msg =4;
}
else
{
	$msg =3;
}
mysql_close();
header("Location:contestlist.php?id=".$contype."&msg=".$msg);

?>