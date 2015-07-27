<?
// admin checking
require_once("../../php-bin/teacher_check.php");
// Connect Database
require("../../php-bin/function.php");
if ($_POST[Submit] !=""){

	$id = $_GET[id];
	$query="select * from tbl_study_record where study_record_id = '$id'";
	$get_result = mysql_query($query,$link_id); 
	$get_rows=mysql_fetch_array($get_result,MYSQL_BOTH);

	$name = htmlspecialchars($_POST["name"]);	
	$desc = htmlspecialchars($_POST["desc"]);	
	$t_desc = htmlspecialchars($_POST["t_desc"]);
	$mark = htmlspecialchars($_POST["mark"]);
	$is_news = htmlspecialchars($_POST["is_news"]);
/*
	if (file_exists("../attachment/".$get_rows[FileName]))
		unlink("../attachment/".$get_rows[FileName]);

	if ($_FILES["file"]["tmp_name"]!=""){
		$oldfilename = $_FILES["file"]['name'];
		$new_file_name = $id."_".$oldfilename;
	}

	if (!copy($_FILES["file"]["tmp_name"],"../attachment/".$new_file_name)){
	*/
		$query = "update `tbl_study_record` set  name = '$name', `desc` = '$desc', t_desc = '$t_desc', is_news = '$is_news', year = '$_POST[year]' ,  file_size_type = '$_POST[file_size_type]' where study_record_id  = '$id'";
		/*
	}
	else{
		$query = "update `tbl_study_record` set FileName = '$new_file_name',  name = '$name', `desc` = '$desc', t_desc = '$t_desc' where study_record_id  = '$id'";
	}*/
	$run_status = mysql_query($query);

	$msg = "作品更新完成";
	header("Location:file_edit.php?msg=$msg&id=$id&class_id=$_GET[class_id]&subjectid=$_GET[subjectid]");
}
?>