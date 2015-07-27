<?
	// admin checking
	require_once("../../php-bin/admin_check.php");

	// Connect Database
	require("../../php-bin/function.php");

	
	$date = $_POST[date_year] . "-" .  $_POST[date_month] . "-" .  $_POST[date_day];
	
    if (isset($_POST["name"])){

      	// Insert new data
      	$add_sql = "INSERT INTO `tbl_activity` ( `date` , `name` , `description` , `modified_by` , `modified_date`, `category` , `is_news` ) VALUES ('".$date."', '".$_POST["name"]."', '".$_POST["desc"]."', '".$_SESSION[name]."', now(), '".$_POST[category]."' , '".$_POST['is_news']."');";
      
    
	  	$run_status = mysql_query($add_sql);

	  	if (!$run_status) {
		  	$msg = str_replace(" ", "+", "Query failed: " . mysql_error($link_id));
      	} 
      	else{
        	$msg = "活動新增完成";
      	}

      	mysql_close();
      
      	//echo $add_sql;
      	header("Location:activity.php?msg=$msg&t_name=$_POST[name]");

    }

?>