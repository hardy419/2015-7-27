<?
	// admin checking
	require_once("../../php-bin/admin_check.php");

    // Connect Database
    require("../../php-bin/function.php");

	$date = $_POST[date_year] . "-" .  $_POST[date_month] . "-" .  $_POST[date_day];
    
    // Insert new data
    if (isset($_POST["id"])){
	    
		$update_sql = "UPDATE `tbl_activity` SET
		               name='".$_POST["name"]."',
		               date='".$date."',
		               description='".$_POST["desc"]."', 
		               modified_by='".$_SESSION[name]."',
		               modified_date=now(), 
		               category = '".$_POST["category"]."',
					   is_news = '".$_POST["is_news"]."'
		               WHERE id='".$_POST["id"]."';";
		
		$run_status = mysql_query($update_sql);
		
		if (!$run_status) {
		  $msg = str_replace(" ", "+", "系統錯誤: " . mysql_error($link_id));
		}else{
		  $msg = "活動更新完成";
		}
		
		mysql_close();
		header("Location:activity.php?msg=$msg&t_name=$_POST[u_name]");
		
    }
?>