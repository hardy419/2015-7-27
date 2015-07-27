<?


// admin checking
require_once("../../php-bin/admin_check.php");

// Connect Database
require("../../php-bin/function.php");


$date_year2 = ($_POST["date_year2"]|0);
$date_month2 = ($_POST["date_month2"]|0);
$date_day2 = ($_POST["date_day2"]|0);

$post_year = (substr($_POST[u_date], 0,4)|0);
$post_month = (substr($_POST[u_date], 5,2)|0);
$post_day = (substr($_POST[u_date], 8,2)|0);

$postdate  = date("Y-m-d", mktime(0, 0, 0, $post_month, $post_day, $post_year));
$duedate = date("Y-m-d", mktime(0, 0, 0, $post_month, $post_day+1, $post_year));

if( $date_year2==0 || $date_month2==0 || $date_day2==0 ) {
	$date2 = "NULL";
	$date2_unchange = "NULL";
} else {
	$date2 = date("Y-m-d", mktime(0, 0, 0, $date_month2, $date_day2, $date_year2));
	$date2_unchange = date("Y-m-d", mktime(0, 0, 0, $date_month2, $date_day2, $date_year2));
}

    if (isset($_POST["u_date"])){
	if ($_FILES["file"]["tmp_name"]!=""){
		$file = fopen($_FILES["file"]["tmp_name"],"r");
		for ($i = 0; $row = fgetcsv($file , 1000,","); $i++){
			//if ($i != 0){
			
//			homework_id subject_id date  text remark class_id 
				//echo $row[0] . "=" . $row[1] . "=" . $row[2] . "=" . $row[3] . "=" . $row[4] . "<BR>";
				//$add_sql = "INSERT INTO `tbl_homework` VALUES ('', '$row[1]', '$row[2]', '$row[3]', '$row[4]', '$row[0]');";
				$add_sql = "INSERT INTO `tbl_homework` (`subject_id`, `date`, `text`, `remark`, `class_id`, `modified_by`) VALUES ('$row[0]', '$row[1]', '$row[2]', '$row[3]', '$row[4]', '$_SESSION[name]');";
		    	mysql_query($add_sql);
		    //}
		}
	
	}
	else{
		// Insert new data
		while ($date2 >= $duedate) {
			$sql = "INSERT INTO tbl_homework (subject_id, date, text, remark, class_id, modified_by, subject_branch, submit_date) 
					VALUES ('".$_POST[u_subject]."', '".$postdate."', '".$_POST[u_text]."', '".$_POST[remark]."', '".$_POST[u_class]."', '".$_SESSION[name]."', '".$_POST[subject_branch]."', '".$date2_unchange."')";
			mysql_query($sql);
			$date_day2--;
			$date2 = date("Y-m-d", mktime(0, 0, 0, $date_month2, $date_day2, $date_year2));
			$post_day++;
			$postdate  = date("Y-m-d", mktime(0, 0, 0, $post_month, $post_day, $post_year));
		}
	}







	$msg = "家課新增完成";
	mysql_close();
	header("Location:show.php?date=$_POST[u_date]&msg=$msg&classname=$_GET[classname]");
    }

?>
