<?php
	// admin checking
	require_once("../../php-bin/admin_check.php");
    // Connect Database
    require("../../php-bin/function.php");

    // Insert new data
    if (isset($_POST["u_id"])){
		if($_POST['show'] == "Y"){
			$show = "Y";
		}else{
			$show = "N";
		}
		$u_edit = "Y";	
		if ($_POST['u_admin'] == "Y"){
			$u_admin = "Y";	
		}else{
			$u_admin = "N";	
		}		
		$update_sql = "UPDATE `tbl_teacher` SET

                   `teacher_name` = '".htmlspecialchars($_POST["u_name"])."',

                   `teacher_email` = '".htmlspecialchars($_POST["u_email"])."',
                                      
                   `teacher_intro` ='".htmlspecialchars($_POST["u_intro"],ENT_QUOTES )."',

                   `teacher_login` ='".htmlspecialchars($_POST["u_id"])."',

                   `password` ='".htmlspecialchars($_POST["u_pw"])."', 
                   
                   `admin` ='".htmlspecialchars($u_admin)."', 
                   
                   `allow_control_forum` = '".htmlspecialchars($u_edit)."', 
                   
                   `subject` = '".htmlspecialchars($_POST["subject"])."',  
                   
                   `title` = '".htmlspecialchars($_POST["title"])."', 
                   
                   `show` = '".htmlspecialchars($show)."', 
                   
                   `order` = '".htmlspecialchars($_POST["order"])."'  
                   
                   WHERE `teacher_id` = '".htmlspecialchars($_POST["u_teacher_id"])."';";
		$run_status = mysql_query($update_sql);
	  
		if (!$run_status){
			$msg = str_replace(" ", "+", "系統錯誤: " . mysql_error($link_id));
		}else{
			$msg = "老師更新完成";
		}
		mysql_close();
		header('Location:user.php?msg='.$msg.'&t_name='.$_POST['u_name']);
    }
?>