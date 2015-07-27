<?



    require("../../php-bin/function.php");
    // Initial variable
    require("../../php-bin/get_class_selection.php");
    $u_id = "";


if ($_GET[Dfile] == 1 ){
	// check the having file.
	$sql = "SELECT `docoment_name` FROM `tbl_teacher` WHERE teacher_id = '$_GET[id]'";
	$result = mysql_query($sql,$link_id); 
	$get_rows = mysql_fetch_array($result);

	if ($get_rows[docoment_name] != ""){
		unlink("../../teacher_staff/photo/". $get_rows[docoment_name]);
		$sql = "update `tbl_teacher` SET `docoment_name` = '' WHERE teacher_id = '$_GET[id]'";
		mysql_query($sql,$link_id); 
	}

}


    if (!isset($_GET["id"])){  // GET and POST

		echo ("<script language='javascript'>");

		echo ("alert(\"No User ID supplied\");");

		echo ("history.go(-1)");

		echo ("</script>");

		exit();

    }else{

        $u_id = $_GET["id"];

    }



    // Get User's Information

    $get_sql = "Select * FROM `tbl_teacher` WHERE teacher_id ='".$u_id."'";


    $get_result = mysql_query($get_sql,$link_id);
	$get_rows=mysql_fetch_array($get_result,MYSQL_BOTH);
mysql_close();
?>

