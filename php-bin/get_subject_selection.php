<?
    // Get View Type's Information
    $get_s_sql = "SELECT * FROM `tbl_subject` WHERE 1 $sql";

    $get_s_result = mysql_query($get_s_sql,$link_id);

    for ($i=0;$get_s_rows=mysql_fetch_array($get_s_result,MYSQL_BOTH);$i++){
      $subject_list[$i]["subject_name"] = $get_s_rows["subject_name"];
      $subject_list[$i]["subject_id"] = $get_s_rows["subject_id"];
    }
?>
