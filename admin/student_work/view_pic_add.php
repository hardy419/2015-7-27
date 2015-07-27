<?
session_start();

require("../../php-bin/function.php");

if ($_POST[Submit] !=""){

	$text = htmlspecialchars($_POST[text]);	

	// study_message_id study_record_id guest_id guest_name guest_type guest_text guest_time 

        mysql_query("INSERT INTO `tbl_study_message` VALUES ('', '$_POST[study_record_id]', '$_POST[id]', '$_POST[name]', '$_POST[type]', '$text', now());", $link_id);
}
$returnURL=$_POST[returnURL];
header("Location:$returnURL");
?>