<?
// admin checking
require_once("../../php-bin/admin_check.php");

    // Connect Database
    require("../../php-bin/function.php");

    if (isset($_POST["u_id"])){
	    
	if ($_POST[show] == "Y")
		$show = "Y";
	else
		$show = "N";
	//if ($_POST[u_edit] == "Y")
		$u_edit = "Y";	
	//else
		//$u_edit = "N";	
	if ($_POST[u_admin] == "Y")
		$u_admin = "Y";	
	else
		$u_admin = "N";	

      // Insert new data
      //$add_sql = "INSERT INTO `tbl_teacher` VALUES ('', '".$_POST["u_name"]."', '".$_POST["u_id"]."', '".$_POST["u_pw"]."', '".$u_edit."', '".$u_admin."');";
      $add_sql = "INSERT INTO `tbl_teacher` ( `teacher_name`, `teacher_email`, `teacher_intro`, `teacher_login`, `password`, `allow_control_forum`, `admin`, `subject`, `title`, `show`, `order` ) VALUES ( '".$_POST["u_name"]."', '".$_POST["u_email"]."', '".$_POST["u_intro"]."',  '".$_POST["u_id"]."',  '".$_POST["u_pw"]."',  '".$u_edit."',  '".$u_admin."', '".$_POST["subject"]."', '".$_POST["title"]."', '".$show."', '".$_POST["order"]."' );";
	  $run_status = mysql_query($add_sql);

	  if (!$run_status) {
        if (mysql_errno($link_id)==1062){
          $msg = '老師帳號重複';
        }else{
          $msg = str_replace(" ", "+", "Query failed: " . mysql_error($link_id));
        }
      }else{

	      // Start Upload Photo
			$pkid = mysql_insert_id();
			$oldfilename = $_FILES["file"]['name'];
			$new_file_name = $pkid.substr($oldfilename,-4);	 
			
			if (isset($_FILES["file"]["tmp_name"])&&$_FILES["file"]["tmp_name"]!=""){	
				$output_path="../../teacher_staff/photo/";
			    	if (!copy($_FILES["file"]["tmp_name"],$output_path.$new_file_name)){
					echo "Fail to copy doc file - ". $_FILES["file"]["tmp_name"];
					exit();			
				}else{
					$query="update `tbl_teacher` set docoment_name ='$new_file_name' where teacher_id ='$pkid' ";
					mysql_query($query);
				}
			}
		  // End Upload Photo
		  
		  $msg = "老師新增完成";
      
	  }

      mysql_close();
      
      //echo $add_sql;
      header("Location:user.php?msg=$msg&t_name=$_POST[u_name]");

    }

?>