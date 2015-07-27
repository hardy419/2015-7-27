<?
// admin checking
require_once("../../php-bin/admin_check.php");

    // Connect Database

    require("../../php-bin/function.php");


     
    if (isset($_POST["submit"])){
	
	 $name = mysql_escape_string(trim($_POST['name']));
	 $u_name = mysql_escape_string(trim($_POST['u_name']));
	 $u_psd = mysql_escape_string(trim($_POST['u_psd']));

      // Insert new data

      $update_sql = "UPDATE `tbl_parent` SET

                   name ='".$name."',
                   
                   u_name ='".$u_name."',

                   u_psd ='".$u_psd."'
		
                   WHERE id = '".$_POST["id"]."';";

	  $run_status = mysql_query($update_sql);

	  if (!$run_status) {

        $msg = str_replace(" ", "+", "系統錯誤: " . mysql_error($link_id));

      }else{

        $msg = "學生更新完成";

      }



      mysql_close();

      

      //echo $add_sql;

      header("Location:user.php?msg=$msg&s_name=$name");



    }else{
		header("Location:user.php");
	}



?>

