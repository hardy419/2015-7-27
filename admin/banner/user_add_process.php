<?
// admin checking
require_once("../../php-bin/admin_check.php");
    // Connect Database
    require("../../php-bin/function.php");

    if (isset($_POST["u_id"])){

      // Insert new data
      $add_sql = "INSERT INTO `tbl_student` VALUES ('', '".$_POST["u_name"]."', '".$_POST["u_class_no"]."', '".$_POST["u_id"]."', '".$_POST["u_pw"]."', ".$_POST["u_class"].");";
      
    
	  $run_status = mysql_query($add_sql);

	  if (!$run_status) {
        if (mysql_errno($link_id)==1062){
          $msg = '學生帳號重複';
        }else{
          $msg = str_replace(" ", "+", "Query failed: " . mysql_error($link_id));
        }
      }else{
        $msg = "學生新增完成";
      }

      mysql_close();
      
      //echo $add_sql;
      header("Location:user.php?msg=$msg&s_name=$_POST[u_name]&s_class=$_POST[u_class]");

    }

?>
