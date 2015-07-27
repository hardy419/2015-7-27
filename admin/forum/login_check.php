<?
	session_start();
	require_once("../../php-bin/function.php");
	
    if (isset($_POST["login"])){  // GET status message
	
		if ($_POST[tlogin] == "Y"){
			$user = "Select * FROM `tbl_teacher` WHERE teacher_login ='".$_POST[login]."' AND password ='".$_POST[password]."'";
		}
		else{
			$user = "Select * FROM `tbl_student` ts, `tbl_class` tc WHERE ts.student_login ='".$_POST[login]."' AND ts.password ='".$_POST[password]."' AND tc.`class_id` = ts.`class_id`";	
		}


      $u_result = mysql_query($user,$link_id);
      if (mysql_num_rows($u_result)>0){
      		if ($_POST[tlogin] == "Y"){
			$get_rows=mysql_fetch_array($u_result,MYSQL_BOTH);
			$_SESSION[class_id] = "T";
			$_SESSION[name] = $get_rows[teacher_name];
			$_SESSION[sysname] = $get_rows[teacher_name];
			$_SESSION[id] = $get_rows[teacher_id];
	 		$_SESSION[allow_control_forum] = $get_rows[allow_control_forum];
			$_SESSION[admin_level] = 0;
			$_SESSION[teacher_level] = "1";
      		}
      		else{
			$get_rows=mysql_fetch_array($u_result,MYSQL_BOTH);
			$_SESSION[id] = $get_rows[student_id];
			$_SESSION[class_id] = $get_rows[class_id];
			$_SESSION[class_name] = $get_rows[class_name];
			$_SESSION[name] = $get_rows[student_name];
			$_SESSION[sysname] = $get_rows[student_name];
	 		$_SESSION[allow_control_forum] = 0;
			$_SESSION[teacher_level] = 0;
			$_SESSION[admin_level] = 0;
		}
		
      }
      else{
		$_SESSION[class_id] = "";
		$_SESSION[name] = "";      
		$_SESSION[allow_control_forum] = 0;
		$_SESSION[teacher_level] = 0;
		$_SESSION[id] = 0;
		$msg = "登入錯誤，請重新輸入";
      }
      

}


?>
<META HTTP-EQUIV="refresh" content="0;URL=gr_group.php">