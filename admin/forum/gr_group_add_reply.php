<?
require_once("../../php-bin/function.php");
if ($_POST[Submit] !="" and $_POST[id] !=""){

	$name = htmlspecialchars($_SESSION[name]);
	$email = htmlspecialchars($_POST[email]);
	$text = htmlspecialchars($_POST[text]);	
	$id = $_POST[id];
	
        mysql_query("INSERT INTO `tbl_forum` VALUES ('', '$name', '$_SESSION[class_id]', '0', '$email', '', '$text', now(), '$id');", $link_id);
        mysql_query("update `tbl_forum` set count = count+1 where id = '$id';", $link_id);    
}
header("Location:gr_group_topic.php?id=$id");
?>