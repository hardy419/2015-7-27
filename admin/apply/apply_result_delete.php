<?
    // Connect Database
    require("../../php-bin/function.php");

    if (isset($_GET["id"])){
      // Delete data
      $del_sql = "DELETE
                  FROM `tbl_apply_form_submit`
                  WHERE form_id ='".$_GET["id"]."';";

	  $run_status = mysql_query($del_sql);

	  if (!$run_status) {
        $msg = str_replace(" ", "+", "Query failed: " . mysql_error($link_id));
      }else{
        $msg = "報名資料刪除完成";
      }

      mysql_close();
      header("Location:apply_result.php?msg=$msg&id=$_GET[post_id]&t_name=$_GET[t_name]");
    }
?>