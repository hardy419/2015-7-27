<?php

    // Get View Type's Information

    $get_c_sql = "SELECT * FROM `tbl_class` WHERE 1 order by class_name";



    $get_c_result = mysql_query($get_c_sql,$link_id);



    for ($i=0;$get_c_rows=mysql_fetch_array($get_c_result,MYSQL_BOTH);$i++){

      $class_list[$i]["class_name"] = $get_c_rows["class_name"];

      $class_list[$i]["class_id"] = $get_c_rows["class_id"];

    }

?>

