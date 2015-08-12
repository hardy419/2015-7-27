<?php   header("Content-Type:text/html;charset=utf-8"); 
// admin checking
require_once '../../admin.inc.php';

// Connect Database
require_once("../../php-bin/function.php");






$submit_type   = $_POST['submit_type']|0;

$type_id       = $_POST['type_id']|0;
$type_order    = $_POST['type_order']|0;
$type_name     = EncodeHTMLTag($_POST['type_name']);





$msg = "";



if( $submit_type == 0 ) // add new
{
	$sql = 'INSERT INTO `tbl_file_type` ( `type_name`, `type_order` )  VALUES ( "'. $type_name .'", '.$type_order.' )';
	if ( mysql_query( $sql, $link_id ) )
		$msg = "增加分類完成";
	else
		$msg = str_replace(" ", "+", "失敗: " . mysql_error($link_id));
}






else if( $submit_type == 1 ) // update
{
	$sql = " UPDATE `tbl_file_type` SET      type_name='". $type_name ."' ,   type_order=". $type_order ."   WHERE    type_id=". $type_id;

	if ( mysql_query( $sql, $link_id ) )
		$msg = "更新分類完成";
	else
		$msg = str_replace(" ", "+", "失敗: " . mysql_error($link_id));

}







else // delete
{
	$sql = " DELETE  FROM  tbl_file_type  WHERE   type_id = ". $type_id;

	if ( mysql_query( $sql, $link_id ) )
		$msg = "刪除分類完成";
	else
		$msg = str_replace(" ", "+", "失敗: " . mysql_error($link_id));
}


mysql_close();


header("Location: n_type_update.php?msg=$msg");



?>