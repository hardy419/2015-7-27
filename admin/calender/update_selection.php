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
	$sql = "SELECT `file_name` FROM `tbl_calendar` WHERE calendarid = '$_GET[id]'";
	$result = mysql_query($sql,$link_id); 
	$get_rows = mysql_fetch_array($result);

	if ($get_rows[file_name] != ""){
		unlink("../../calendar/attachment/". $get_rows[file_name]);
		
		$sql = "update `tbl_calendar` SET `file_name` = '' WHERE calendarid = '$_GET[id]'";
		mysql_query($sql,$link_id); 
	}
}

if ($_GET[Dfile] == 2 ){
	// check the having file.
	$sql = "SELECT `banner_photo` FROM `tbl_calendar` WHERE calendarid = '$_GET[id]'";
	$result = mysql_query($sql,$link_id); 
	$get_rows = mysql_fetch_array($result);

	if ($get_rows[banner_photo] != ""){
		unlink("../../calendar/attachment/". $get_rows[banner_photo]);
		
		$sql = "update `tbl_calendar` SET `banner_photo` = '' WHERE calendarid = '$_GET[id]'";
		mysql_query($sql,$link_id); 
	}
}

    // Get User's Information
    $get_sql = "SELECT * FROM `tbl_calendar` WHERE  `calendarid` = '".$u_id."'";


    $get_result = mysql_query($get_sql,$link_id);
	$get_rows=mysql_fetch_array($get_result,MYSQL_BOTH);
mysql_close();
?>