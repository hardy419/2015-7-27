<?
session_start();

require("../../php-bin/function.php");

if ($_GET[id] != ""){
	$query="select * from tbl_study_record where study_record_id = '$_GET[id]'";
	$get_result = mysql_query($query,$link_id); 
	$get_rows=mysql_fetch_array($get_result,MYSQL_BOTH);

	if (file_exists("../../student_work/attachment/".$get_rows[FileName]))
	unlink("../../student_work/attachment/".$get_rows[FileName]);
	if (file_exists("../../student_work/attachment/small/".$get_rows[FileName]))
	unlink("../../student_work/attachment/small/".$get_rows[FileName]);

	$query="delete from tbl_study_record where study_record_id = '$_GET[id]'";
	mysql_query($query,$link_id); 
	$query="delete from tbl_study_message where study_record_id = '$_GET[id]'";
	mysql_query($query,$link_id); 
}
?>
<META HTTP-EQUIV="refresh" content="0;URL=main.php?student=<?=$get_rows[student_id]?>&class_id=<?=$_GET[class_id]?>&subjectid=<?=$_GET[subjectid]?>&year=<?=$_GET[year]?>">