<?
	// admin checking
	require_once("../../php-bin/admin_check.php");

	// Connect Database
	require("../../php-bin/function.php");

	
	$date = $_POST[date_year] . "-" .  $_POST[date_month] . "-" .  $_POST[date_day];
	$date2 = $_POST[date_year2] . "-" .  $_POST[date_month2] . "-" .  $_POST[date_day2];
	$time_start = $_POST[time_hour_start] . ":" . $_POST[time_min_start] . ":00";
	$time_end = $_POST[time_hour_end] . ":" . $_POST[time_min_end] . ":00";
	
		
    if (isset($_POST["title"])){

      	// Insert new data
      	$add_sql = "INSERT INTO `tbl_apply`(`date`, `time_start`, `time_end`, `place`, 
      										   `exp_date`, `title`, `description`, `contact_name`, 
      										   `contact_email`, `special_question_1`, `special_question_tips_1`, 
      										   `special_question_2`, `special_question_tips_2`, 
      										   `special_question_3`, `special_question_tips_3`, `document_desc`, 
      										   `link_text`, `link_url`, `link_open_window`, 
      										   `modified_by`, `modified_date`) 
      								   VALUES ('".$date."', '".$time_start."', '".$time_end."', '".$_POST["place"]."', 
      								   		   '".$date2."', '".$_POST["title"]."', '".$_POST["desc"]."', '".$_POST[c_name]."', 
      								   		   '".$_POST[c_email]."', '".$_POST[sq1]."', '".$_POST[sqt1]."', 
      								   		   '".$_POST[sq2]."', '".$_POST[sqt2]."', 
      								   		   '".$_POST[sq3]."', '".$_POST[sqt3]."', '".$_POST[document_desc]."', 
      								   		   '".$_POST[link_text]."', '".$_POST[link_url]."', '".$_POST[new_window]."', 
      								   		   '".$_SESSION[name]."', now());";


	mysql_query($add_sql);
	$pkid = mysql_insert_id();
	$oldfilename = $_FILES["file"]['name'];
	$new_file_name = $pkid.substr($oldfilename,-4);	 
	
	if (isset($_FILES["file"]["tmp_name"])&&$_FILES["file"]["tmp_name"]!=""){	
		$output_path="../../apply/attachment/";
	    	if (!copy($_FILES["file"]["tmp_name"],$output_path.$new_file_name)){
			echo "Fail to copy doc file - ". $_FILES["file"]["tmp_name"];
			exit();			
		}else{
			$query="update `tbl_apply` set document_name ='$new_file_name' where id ='$pkid' ";
			mysql_query($query);
		}
	}
      	
		$msg = "報名表新增完成";
      	mysql_close();
       
      	//echo $add_sql;

      	if ($_POST["sq_type1"] == '2') {
			header("Location:apply_choice.php?msg=$msg&title=$_POST[title]&app_id=$pkid&sq1=$_POST[sq1]");
		}
		else {
			header("Location:apply.php?msg=$msg&t_name=$_POST[title]");
		}
    }

?>