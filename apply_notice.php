<?
	// admin checking
	require("php-bin/function.php");
	header("Content-type: text/html; charset=utf-8");

	$post_id = $_POST["post_id"];
	$apply_name = $_POST["apply_name"];
	$apply_ename = $_POST["apply_ename"];
	$apply_sex = $_POST["apply_sex"];
	$apply_tel = $_POST["apply_tel"];
	$apply_email = $_POST["apply_email"];
	$remark = $_POST["remark"];
	$special_question_1 = $_POST["apply_parnum"];
	$special_question_2 = $_POST["apply_stunum"];
	
	$apply_date = date('y-m-d',time());
    if (isset($_POST["apply_name"])){

      	// Insert new data
      $add_sql = "INSERT INTO `tbl_apply_form_submit` ( `post_id` , `name_chi`, `name_eng` , `sex`, `tel`, `email`,  `remark`, `special_question_1`, `special_question_2` , `DateTime`) VALUES ('".$post_id."', '".$apply_name."', '".$apply_ename."','".$apply_sex."','".$apply_tel."', '".$apply_email."','".$remark."', '".$special_question_1."','".$special_question_2."','".$apply_date."')";
	  //echo $add_sql;exit();
	  
		$addnotice=mysql_query($add_sql, $link_id);
		if($addnotice){
			$msg = "報名成功";
			mysql_close();
			header("Location:./school_apply.php?msg=$msg");
		}else{
			$msg = "報名失败";
			mysql_close();
			header("Location:./school_apply.php?msg=$msg");
		}
	}?>