<?

    require("../../php-bin/function.php");

    if (!isset($_GET["id"])){  // GET and POST

		echo ("<script language='javascript'>");

		echo ("alert(\"No User ID supplied\");");

		echo ("history.go(-1)");

		echo ("</script>");

		exit();

    }else{
        $u_id = $_GET["id"];
    }



if ($_GET[Dfile] == 1 ){
	// check the having file.
	$sql = "SELECT `document_name` FROM `tbl_apply` WHERE id = '$_GET[id]'";
	$result = mysql_query($sql,$link_id); 
	$get_rows = mysql_fetch_array($result);

	if ($get_rows[document_name] != ""){
		unlink("../../apply/attachment/". $get_rows[document_name]);
		
		$sql = "update `tbl_apply` SET `document_name` = '' WHERE id = '$_GET[id]'";
		mysql_query($sql,$link_id); 
	}
}

    // Get User's Information
    $get_sql = "SELECT *, HOUR(time_start)  as tsh, MINUTE(time_start) as tsm, HOUR(time_end)  as teh, MINUTE(time_end) as tem  FROM `tbl_apply` WHERE `id` = '".$u_id."'";

    $get_result = mysql_query($get_sql,$link_id);
	$get_rows=mysql_fetch_array($get_result,MYSQL_BOTH);
	

	$sql_check = "SELECT * FROM `tbl_apply_question_choice` WHERE app_id = '$get_rows[id]'";
	$get_check_result = mysql_query($sql_check,$link_id);
	if ($get_record = mysql_fetch_object($get_check_result)) {
		$check_selection = 'yes';
	}
	else
		$check_selection = 'no';
	
		
	mysql_close();
?>