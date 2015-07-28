<?PHP
    // Get Web Type's Information
    $get_c_sql = "SELECT * FROM `tbl_type` WHERE 1";
    $get_c_result = mysql_query($get_c_sql,$link_id);

    for ($i=0;$get_c_rows=mysql_fetch_array($get_c_result,MYSQL_BOTH);$i++){
      $type_list[$i]["type_name"] = $get_c_rows["type_name"];
      $type_list[$i]["type_id"] = $get_c_rows["type_id"];
    }
?>
