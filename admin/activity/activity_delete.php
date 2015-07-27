<?
	// admin checking
	require_once("../../php-bin/admin_check.php");

    // Connect Database
    require("../../php-bin/function.php");

    if (isset($_GET["id"])){
      
	  // Delete Photo in HardDisk
	  $sql = "SELECT * FROM `tbl_gallery` WHERE act_id = '$_GET[id]'";
	  $result = mysql_query($sql,$link_id);
	  while ($record = mysql_fetch_object($result)) {
		  unlink("../../gallery/".$record->file_name);
		  unlink("../../gallery/small/".$record->file_name);
	  }
	  
	  // Delete Photo Record in Database
	  $del_sql = "DELETE
                  FROM `tbl_gallery`
                  WHERE act_id='".$_GET["id"]."';";
	  mysql_query($del_sql);
	    
	  // Delete data
      $del_sql = "DELETE
                  FROM `tbl_activity`
                  WHERE id='".$_GET["id"]."';";
	  $run_status = mysql_query($del_sql);

	  if (!$run_status) {
        $msg = str_replace(" ", "+", "Query failed: " . mysql_error($link_id));
      }else{
        $msg = "活動刪除完成";
      }

      mysql_close();
      header("Location: activity.php?msg=$msg");

    }



?>