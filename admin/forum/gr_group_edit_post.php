<?
session_start();

if ($_SESSION[allow_control_forum] != 1)
	header("Location:../../index.htm");

require_once("../../php-bin/function.php");
if ($_POST[Submit] !="" and $_POST[id] !=""){

	$title = htmlspecialchars($_POST[title]);	
	$text = htmlspecialchars($_POST[text]);	
	$id = $_POST[id];
	$reply = $_POST[reply];
	if ($reply == 0)
		$reply =$id;

        mysql_query("UPDATE `tbl_forum` SET title = '$title' , `desc` = '$text' where id = '$id';", $link_id);

}

header("Location:gr_group_topic.php?id=$reply");
?>