<?
    // Connect Database

    require("../../php-bin/function.php");

    // Get User's Information

    $get_sql = "SELECT * FROM `tbl_class` ORDER BY `year` ASC , class_name ASC LIMIT 0 , 50 ";

    $get_result = mysql_query($get_sql, $link_id);
	
	  $total_record = mysql_num_rows($get_result);

    mysql_close();



?>

