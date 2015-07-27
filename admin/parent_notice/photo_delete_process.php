<?
	// admin checking
	require_once("../../php-bin/admin_check.php");
    
    // Connect Database
    require("../../php-bin/function.php");
    
    $id = $_GET['id'];
    
    if (isset($_GET["file_name"])){

      	// Insert new data
      	$add_sql = "DELETE FROM `tbl_notice_photo` WHERE photo_name = '$_GET[file_name]';";
    
	  	$run_status = mysql_query($add_sql);

	  	if (!$run_status) {
		  	$msg = str_replace(" ", "+", "Query failed: " . mysql_error($link_id));
      	} 
      	else{
	      	unlink("../../userUpload/notice/".$_GET[file_name]);
	      	unlink("../../userUpload/notice/small/".$_GET[file_name]);
        	unlink("../../userUpload/notice/original/".$_GET[file_name]);
	      	$msg = "已刪除相片";
      	}

      	mysql_close();
      
      	//echo $add_sql;
      	header("Location:gallery.php?msg=$msg&id=$id");

    }
    
?>