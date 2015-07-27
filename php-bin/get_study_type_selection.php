<?
    // Get View Type's Information
    $get_c_sql = "SELECT * FROM `tbl_study_type` WHERE 1";

    $get_c_result = mysql_query($get_c_sql,$link_id);

    for ($i=0;$get_c_rows=mysql_fetch_array($get_c_result,MYSQL_BOTH);$i++){
      $study_list[$i]["study_name"] = $get_c_rows["study_name"];
      $study_list[$i]["study_id"] = $get_c_rows["study_id"];
    }
?>
