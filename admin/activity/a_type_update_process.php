<?php   header("Content-Type:text/html;charset=utf-8"); 
require_once("../../admin.inc.php");

// Connect Database
require_once("../../php-bin/function.php");






$submit_type   = $_POST['submit_type']|0;

$type_id       = $_POST['type_id']|0;
$type_order    = $_POST['type_order']|0;
$type_name     = EncodeHTMLTag($_POST['type_name']);





$msg = "";



if( $submit_type == 0 ) // add new
{
	$sql = 'INSERT INTO `tbl_activity_type` ( `type_name`, `type_order` )  VALUES ( "'. $type_name .'", '.$type_order.' )';
	mysql_query("set names utf8");
	if ( mysql_query( $sql, $link_id ) )
		$msg = " sW\ ";
	else
		$msg = str_replace(" ", "+", "???: " . mysql_error($link_id));
}






else if( $submit_type == 1 ) // update
{
	$sql = " UPDATE `tbl_activity_type` SET      type_name='". $type_name ."' ,   type_order=". $type_order ."   WHERE    type_id=". $type_id;
	mysql_query("set names utf8");
	if ( mysql_query( $sql, $link_id ) )
		$msg = "The record had been updated successfully.";
	else
		$msg = str_replace(" ", "+", "???: " . mysql_error($link_id));

}







else // delete
{
	$sql = " DELETE  FROM  tbl_activity_type  WHERE   type_id = ". $type_id;
	mysql_query("set names utf8");
	if ( mysql_query( $sql, $link_id ) )
		$msg = " R\ ";
	else
		$msg = str_replace(" ", "+", "???: " . mysql_error($link_id));
}


mysql_close();


header("Location: a_type_update.php?msg=$msg");



?>