<?php



// admin checking

require_once("../../admin.inc.php");



// access control checking

require_once("z_access_control.php");



// Connect Database

require_once("../../php-bin/function.php");







// Get User's Information



$get_sql = "SELECT * FROM `tbl_class` ORDER BY `year` ASC , class_name ASC LIMIT 0 , 30 ";

$get_result = mysql_query($get_sql, $link_id);

$total_record = mysql_num_rows($get_result);



mysql_close();







?>