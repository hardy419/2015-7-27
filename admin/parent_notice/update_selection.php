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
	$sql = "SELECT `docoment_name` FROM `tbl_notice` WHERE noticeid = '$_GET[id]'";
	$result = mysql_query($sql,$link_id); 
	$get_rows = mysql_fetch_array($result);

	if ($get_rows[docoment_name] != ""){
		unlink("../../userUpload/attachment/". $get_rows[docoment_name]);
		$sql = "update `tbl_notice` SET `docoment_name` = '' WHERE noticeid = '$_GET[id]'";
		mysql_query($sql,$link_id); 
	}

}

if ($_GET[Dfile] == 2 ){
	// check the having file.
	$sql = "SELECT `cover_Photo` FROM `tbl_notice` WHERE noticeid = '$_GET[id]'";
	$result = mysql_query($sql,$link_id); 
	$get_rows = mysql_fetch_array($result);

	if ($get_rows[cover_Photo] != ""){
		unlink("../../userUpload/cover_Photo/". $get_rows[cover_Photo]);
		unlink("../../userUpload/cover_Photo/original/". $get_rows[cover_Photo]);
		$sql = "update `tbl_notice` SET `cover_Photo` = '' WHERE noticeid = '$_GET[id]'";
		mysql_query($sql,$link_id); 
	}

}

if ($_GET[Dfile] == 3 ){
	// check the having file.
	$sql = "SELECT `banner_photo` FROM `tbl_notice` WHERE noticeid = '$_GET[id]'";
	$result = mysql_query($sql,$link_id); 
	$get_rows = mysql_fetch_array($result);

	if ($get_rows[banner_photo] != ""){
		unlink("../../userUpload/banner/". $get_rows[banner_photo]);
		unlink("../..userUpload/banner/small/". $get_rows[banner_photo]);
		$sql = "update `tbl_notice` SET `banner_photo` = '' WHERE noticeid = '$_GET[id]'";
		mysql_query($sql,$link_id); 
	}

}

    // Get User's Information

    $get_sql = "SELECT * FROM `tbl_notice` WHERE  `noticeid` = '".$u_id."'";


    $get_result = mysql_query($get_sql,$link_id);
    $get_rows=mysql_fetch_array($get_result,MYSQL_BOTH);
    mysql_close();
?>

