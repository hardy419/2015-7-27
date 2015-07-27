<?
// admin checking
require_once("../../php-bin/admin_check.php");
    // Connect Database
    require("../../php-bin/function.php");

    if (isset($_POST["u_date"])){
	if ($_FILES["file"]["tmp_name"]!=""){
		$file = fopen($_FILES["file"]["tmp_name"],"r");
		for ($i = 0; $row = fgetcsv($file , 1000,","); $i++){
			//if ($i != 0){
			
//			homework_id subject_id date  text remark class_id 
				//echo $row[0] . "=" . $row[1] . "=" . $row[2] . "=" . $row[3] . "=" . $row[4] . "<BR>";
				//$add_sql = "INSERT INTO `tbl_homework` VALUES ('', '$row[1]', '$row[2]', '$row[3]', '$row[4]', '$row[0]');";
				echo $add_sql = "INSERT INTO `tbl_homework` (`subject_id`, `date`, `text`, `remark`, `class_id`, `modified_by`) VALUES ('$row[0]', '$row[1]', '$row[2]', '$row[3]', '$row[4]', '$_SESSION[name]');";
		    	mysql_query($add_sql);
		    //}
		}
	
	}
	else{
		// Insert new data
		echo $add_sql = "INSERT INTO `tbl_homework` (`subject_id`, `date`, `text`, `remark`, `class_id`, `modified_by`) VALUES ('$_POST[u_subject]', '$_POST[u_date]', '$_POST[u_text]', '$_POST[remark]', '$_POST[u_class]', '$_SESSION[name]');";
	    
		mysql_query($add_sql);

	}
	$msg = "家課新增完成";
	mysql_close();
	header("Location:show.php?date=$_POST[u_date]&msg=$msg&classname=$_GET[classname]");
    }

?>
