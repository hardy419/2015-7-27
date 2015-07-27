<?
session_start();

require("../../php-bin/function.php");
require_once("../../php-bin/image_resize.php");
require_once("../../php-bin/lib_img_resize.php");

for ($i =1; $i <=5 ; $i++){

	if ($_FILES["file".$i]["tmp_name"]!=""){
		$oldfilename = $_FILES["file".$i]['name'];
		$name = htmlspecialchars($_POST["name".$i]);
		$desc = htmlspecialchars($_POST["desc".$i]);
		$t_desc = htmlspecialchars($_POST["t_desc".$i]);
		$mark = htmlspecialchars($_POST["mark".$i]);
		
		$query = "INSERT INTO `tbl_study_record` (`study_type_id`,`file_size_type` , `student_id` , `subject_id` , `FileName` , `name` , `desc` , `t_desc` , `post_date` , `modified_by`, `is_news`, `year`, `web_type` ) 
						VALUES  ('$_POST[study_type_id]','$_POST[file_size_type]', '$_POST[student_id]', '$_POST[subjectid]', '', '$name', '$desc', '$t_desc', now(), '$_SESSION[name]', '$_POST[is_news]', '$_POST[year]', '$_POST[web_type]' )";
						
		mysql_query($query,$link_id); 
		$pkid = mysql_insert_id();
		$new_file_name = $pkid.substr($oldfilename,-4);


	        if (isset($_FILES["file".$i]["tmp_name"])&&$_FILES["file".$i]["tmp_name"]!=""){	


            $upfile = $_FILES["file".$i]["tmp_name"];
            $orgfile_output=$new_file_name;
            $smallfile_output= $new_file_name;
            $output_path="../../userUpload/attachment/";

            image_resize($upfile,$orgfile_output,$output_path,0,0,120);
            image_resize($upfile,$smallfile_output,$output_path."small/",132,99,120);

			$query="update `tbl_study_record` set FileName ='$new_file_name' where study_record_id ='$pkid' ";
		}
		else{
			$query="delete form `tbl_study_record` where study_record_id ='$pkid'";
		}
		mysql_query($query,$link_id); 
	}
}

$returnURL="main.php?student=".$_POST[student_id]."&class_id=".$_POST[class_id]."&subjectid=".$_POST[subjectid];
?>

<META HTTP-EQUIV="refresh" content="0;URL=<?=$returnURL?>">
