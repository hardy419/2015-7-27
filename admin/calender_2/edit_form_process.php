<?php

header("Content-Type:text/html;charset=utf-8"); 

// admin checking

require_once("../../admin.inc.php");



// access control checking

require_once("z_access_control.php");



// Connect Database

require_once("../../php-bin/function.php");



$date=$_POST['date'];

$content = $_POST['content'];



// is exits?

$isExists = mysql_query("DELETE FROM `tbl_daily_gold` WHERE `date`='{$date}'");



$sql = "INSERT INTO `tbl_daily_gold` (`date`, `content`) VALUES ('{$date}', '{$content}')";

mysql_query("SET NAMES UTF8");

$rs=mysql_query($sql) or die (mysql_error());

if($rs){

	echo "success";

} else {

	echo "Save to database faild.";

}