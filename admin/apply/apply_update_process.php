<?
require("../../php-bin/function.php");


	if ($_POST["sq_type1"] == '1' && $_POST["check_selection"] == 'yes') {
		$del_sql = "DELETE FROM `tbl_apply_question_choice` WHERE app_id = '$_GET[id]'";
		mysql_query($del_sql);
	}

// calendarid post_id poster date title content posttime 
    if (isset($_GET[id])){
	$date = $_POST[date_year] . "-" .  $_POST[date_month] . "-" .  $_POST[date_day];
	$date2 = $_POST[date_year2] . "-" .  $_POST[date_month2] . "-" .  $_POST[date_day2];
	$time_start = $_POST[time_hour_start] . ":" . $_POST[time_min_start] . ":00";
	$time_end = $_POST[time_hour_end] . ":" . $_POST[time_min_end] . ":00";
	
      // Insert new data
      $add_sql = "update `tbl_apply` set link_text = '$_POST[link_text]', link_url = '$_POST[link_url]', 
      				link_open_window = '$_POST[new_window]', date ='$date' , 
      				exp_date = '$date2' , time_start = '$time_start' , 
      				time_end = '$time_end' , place = '$_POST[place]' , 
      				title ='$_POST[title]', description = '$_POST[desc]' , 
      				contact_name ='$_POST[c_name]', contact_email ='$_POST[c_email]', 
      				special_question_1 = '$_POST[sq1]', special_question_tips_1 = '$_POST[sqt1]', 
      				special_question_2 = '$_POST[sq2]', special_question_tips_2 = '$_POST[sqt2]', 
      				special_question_3 = '$_POST[sq3]', special_question_tips_3 = '$_POST[sqt3]', 
      				document_desc = '$_POST[document_desc]', 
      				modified_by = '$_SESSION[name]', modified_date = now() 
      				where id = '$_GET[id]'";
  // echo $add_sql;

	 mysql_query($add_sql);

	$pkid = $_GET[id];
	$oldfilename = $_FILES["file"]['name'];
	$new_file_name = $pkid.substr($oldfilename,-4);	 
	
	if (isset($_FILES["file"]["tmp_name"])&&$_FILES["file"]["tmp_name"]!=""){
		// check the having file.
		$sql = "SELECT `document_name` FROM `tbl_apply` WHERE id = '$pkid'";
                  
		$result = mysql_query($sql,$link_id); 
		$get_rows = mysql_fetch_array($result);

		if ($get_rows[document_name] != "")
			unlink("../../apply/attachment/". $get_rows[document_name]);
		
		$output_path="../../apply/attachment/";
	    	if (!copy($_FILES["file"]["tmp_name"],$output_path.$new_file_name)){
			echo "Fail to copy doc file - ". $_FILES["file"]["tmp_name"];
			exit();
		}else{
			$query="update `tbl_apply` set document_name ='$new_file_name' where id = '$pkid' ";
			mysql_query($query);
		}
	}

        $msg = "報名表更改完成";

      mysql_close();
      
      //echo $add_sql;
      	if ($_POST["sq_type1"] == '2') {
			header("Location:apply_choice_update.php?msg=$msg&title=$_POST[title]&app_id=$pkid&sq1=$_POST[sq1]");
		}
		else {
        	header("Location:apply.php?msg=$msg&t_name=$_POST[title]");
		}
    }

?>