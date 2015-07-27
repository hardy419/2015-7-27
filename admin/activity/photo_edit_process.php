<?
	// admin checking
	require_once("../../php-bin/admin_check.php");
    
    // Connect Database
    require("../../php-bin/function.php");
    
 
    if (isset($_POST["file_name"])) {
	
		$update_sql = "UPDATE `tbl_gallery` SET
		               `order` = '".$_POST["order"]."' ,
					   `remark` = '".$_POST["remark"]."'
		               WHERE `file_name` = '".$_POST["file_name"]."';";
		
		$run_status = mysql_query($update_sql);
		
		if (!$run_status) {
		  $msg = str_replace(" ", "+", "系統錯誤: " . mysql_error($link_id));
		}else{
		  $msg = "相片更新完成";
		}
		
		mysql_close();
	
	}

	
?>

<script language="javascript">
<!--
	window.close();
-->
</script>