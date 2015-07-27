<?
// admin checking
require_once("../../php-bin/admin_check.php");


    // Connect Database

    require("../../php-bin/function.php");



    if (isset($_GET["id"])){



      // Delete data

      $del_sql = "DELETE

                  FROM `tbl_student`

                  WHERE student_id='".$_GET["id"]."';";

	  $run_status = mysql_query($del_sql);



	  if (!$run_status) {

        $msg = str_replace(" ", "+", "Query failed: " . mysql_error($link_id));

      }else{

        $msg = "學生刪除完成";

      }



      mysql_close();

    

      header("Location: user.php?msg=$msg");

      

    }



?>

