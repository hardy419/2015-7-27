<?
require_once("../../php-bin/function.php");
if ($_POST[Submit] !=""){
  /*  */
	$name = htmlspecialchars($_SESSION[name]);
	$email = htmlspecialchars($_POST[email]);
	$title = htmlspecialchars($_POST[title]);
	$text = htmlspecialchars($_POST[text]);	
	
        mysql_query("INSERT INTO `tbl_forum` VALUES ('', '$name', '$_SESSION[class_id]', '0', '$email', '$title', '$text', now(), 0);", $link_id);
}
header("Location:gr_group.php");
?>