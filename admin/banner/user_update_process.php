<?
// admin checking
require_once("../../php-bin/admin_check.php");

    // Connect Database

    require("../../php-bin/function.php");


     
    if (isset($_POST["u_id"])){

      // Insert new data

      $update_sql = "UPDATE `tbl_student` SET

                   student_name='".$_POST["u_name"]."',
                   
                   student_class_no='".$_POST["u_class_no"]."',

                   student_login='".$_POST["u_id"]."',

                   password='".$_POST["u_pw"]."',
                   
                    class_id='".$_POST["u_class"]."'
		
                   WHERE student_id='".$_POST["u_student_id"]."';";

	  $run_status = mysql_query($update_sql);

echo  $update_sql;
	  if (!$run_status) {

        $msg = str_replace(" ", "+", "系統錯誤: " . mysql_error($link_id));

      }else{

        $msg = "學生更新完成";

      }



      mysql_close();

      

      //echo $add_sql;

      header("Location:user.php?msg=$msg&s_name=$_POST[u_name]&s_class=$_POST[u_class]");



    }



?>

