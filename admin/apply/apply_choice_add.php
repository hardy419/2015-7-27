<?
	// admin checking
	require_once("../../php-bin/admin_check.php");

	// Connect Database
	require("../../php-bin/function.php");
  
    if (isset($_POST["choice"])){

		foreach($_POST[choice] as $i) {
			if ($i != '') {    
		      	// Insert new data
		        $add_sql = "INSERT INTO `tbl_apply_question_choice`(`app_id`, `choice_value`) VALUES ('$_POST[id]', '$i');";
				mysql_query($add_sql);
			}
		}	// end foreach
	} // end if
	
	if (isset($_POST[update]))
		$msg = "報名表更新完成";
	else
		$msg = "報名表新增完成";
    mysql_close();
	
	header("Location:apply.php?msg=$msg&t_name=$_POST[title]");

?>