<?

    // Connect Database

    require("../../php-bin/function.php");




    if (isset($_GET["id"])){

	// check the having file.
	$sql = "SELECT `file_name` FROM `tbl_calendar` WHERE calendarid = '$_GET[id])'";
                  
	$result = mysql_query($sql,$link_id); 
	$get_rows = mysql_fetch_array($result);

	if ($get_rows[file_name] != "")
		unlink("../../calendar/attachment/". $get_rows[file_name]);

      // Delete data

      $del_sql = "DELETE

                  FROM `tbl_calendar`

                  WHERE calendarid ='".$_GET["id"]."';";

	  $run_status = mysql_query($del_sql);



	  if (!$run_status) {

        $msg = str_replace(" ", "+", "Query failed: " . mysql_error($link_id));

      }else{

        $msg = "事件刪除完成";

      }



      mysql_close();

    

      header("Location:calendar.php?type=$_GET[type]&year=$_GET[year]&month=$_GET[month]&msg=$msg");

      

    }
?>