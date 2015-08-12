<?php
header("Content-Type:text/html;charset=utf-8"); 
// admin checking
require_once("../../admin.inc.php");

// Connect Database
require_once("../../php-bin/function.php");

$a_id = $_POST["a_id"]|0;
$u_name = addslashes($_POST['u_name']);

$a_content = addslashes($_POST["a_content"]);
$order = addslashes($_POST["order"]);
$a_id = $_POST['a_id'];
$a_type = $_POST["a_type"];

$order = $_POST["order"]|0;

$update_sql = "UPDATE `tbl_stuteacher` SET
`a_title`='$u_name', `a_content`='$a_content', `order`='$order',a_type='$a_type' WHERE `a_id`=".$a_id;
$run_status = mysql_query( $update_sql, $link_id );

if( ! $run_status )
{
	$msg = str_replace(" ", "+", "tο~: " . mysql_error($link_id));
}
else
{
	$msg = "update success";
}


mysql_close();


header("Location:aboutus.php?msg=".$msg);

?>