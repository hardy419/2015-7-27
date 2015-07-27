<?
session_start();

if ($_SESSION[allow_control_forum] != 1)
	header("Location:../../index.htm");

require_once("../../php-bin/function.php");
if ($_GET[id] !=""){
	$reply = $_GET[reply];
	$id = $_GET[id];

        mysql_query("delete from `tbl_forum` where id = '$id';", $link_id);
	mysql_query("delete from `tbl_forum` where reply = '$id';", $link_id);
}
header("Location:gr_group.php");
?>