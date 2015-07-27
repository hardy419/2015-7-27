<?

    // Connect Database

    require("../../php-bin/function.php");




    if (isset($_GET["id"])){

	// check the having file.
	$sql = "SELECT `docoment_name` FROM `tbl_notice` WHERE noticeid = '$pkid'";
                  
	$result = mysql_query($sql,$link_id); 
	$get_rows = mysql_fetch_array($result);

	if ($get_rows[file_name] != "")
		unlink("../../parent_notice/att/". $get_rows[file_name]);

      // Delete data

      $del_sql = "DELETE

                  FROM `tbl_notice`

                  WHERE noticeid ='".$_GET["id"]."';";

	  $run_status = mysql_query($del_sql);



	  if (!$run_status) {

        $msg = str_replace(" ", "+", "Query failed: " . mysql_error($link_id));

      }else{

        $msg = "刪除完成";

      }



      mysql_close();

    

      header("Location:c_parent.php?msg=$msg&school_year=$_GET[school_year]&month=$_GET[month]&type=$_GET[type]&category=$_GET[category]");

      

    }
?>