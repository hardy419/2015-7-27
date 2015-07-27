<?

    // Connect Database

    require("../../php-bin/function.php");




    if (isset($_GET["id"])){

	// check the having file.
	$sql = "SELECT `document_name` FROM `tbl_apply` WHERE id = '$_GET[id])'";
                  
	$result = mysql_query($sql,$link_id); 
	$get_rows = mysql_fetch_array($result);

	if ($get_rows[document_name] != "")
		unlink("../apply/attachment/". $get_rows[document_name]);

      // 刪除報名者資料
      $del_sql = "DELETE
                  FROM `tbl_apply_form_submit`
                  WHERE post_id ='".$_GET["id"]."';";
	  $run_status = mysql_query($del_sql);
      
	  // 刪除報名表特別問題選擇
	  $del_sql = "DELETE FROM `tbl_apply_question_choice` WHERE app_id = '$_GET[id]'";
	  $run_status = mysql_query($del_sql);

	  
	  // 刪除報名表
      $del_sql = "DELETE
                  FROM `tbl_apply`
                  WHERE id ='".$_GET["id"]."';";

	  $run_status = mysql_query($del_sql);



	  if (!$run_status) {

        $msg = str_replace(" ", "+", "Query failed: " . mysql_error($link_id));

      }else{

        $msg = "報名表刪除完成";

      }



      mysql_close();

    

      header("Location:apply.php?msg=$msg");

      

    }
?>