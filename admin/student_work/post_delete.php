<?
session_start();

require("../../php-bin/function.php");

if ($_GET[id] != ""){
	$query="delete from tbl_study_message where study_message_id = '$_GET[id]'";
	mysql_query($query,$link_id); 
}
?>
<META HTTP-EQUIV="refresh" content="0;URL=view_pic.php?id=<?=$_GET[rid]?>">