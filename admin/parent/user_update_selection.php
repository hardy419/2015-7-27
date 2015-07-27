<?



    require("../../php-bin/function.php");
    $u_id = "";



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

    $get_sql = "Select * FROM `tbl_parent` WHERE id ='".$u_id."'";


    $get_result = mysql_query($get_sql,$link_id);
	$get_rows=mysql_fetch_array($get_result,MYSQL_BOTH);
mysql_close();
?>

