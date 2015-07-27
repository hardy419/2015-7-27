<?
$sql_c_s = "SELECT ts.student_name, ts.student_id, tc.class_id, tc.class_name
FROM `tbl_student` ts, tbl_class tc
WHERE ts.class_id = tc.class_id
ORDER BY tc.class_name, ts.student_class_no";
$get_c_s_result = mysql_query($sql_c_s,$link_id);


    for ($i=0;$get_c_s_rows=mysql_fetch_array($get_c_s_result,MYSQL_BOTH);$i++){

      if ($i==0){

        $classname_list[0]["class_id"] = $get_c_s_rows["class_id"];
        $classname_list[0]["class_name"] = $get_c_s_rows["class_name"];
        $class_list_student[$get_c_s_rows["class_id"]][0]["student_name"] = $get_c_s_rows["student_name"];
        $class_list_student[$get_c_s_rows["class_id"]][0]["student_id"] = $get_c_s_rows["student_id"];
        $class_list_student[$get_c_s_rows["class_id"]][0]["class_id"] = $get_c_s_rows["class_id"];
        $class_list_student[$get_c_s_rows["class_id"]][0]["class_name"] = $get_c_s_rows["class_name"];

      }else{

        $same = false;
        for ($j=0;$j<count($classname_list);$j++){
          if ($get_c_s_rows["class_id"] == $classname_list[$j]["class_id"] ){
            $same=true;
          }
        }

        if (!$same){
		$new_number = count($classname_list);
          $classname_list[$new_number]["class_id"] = $get_c_s_rows["class_id"];
          $classname_list[$new_number]["class_name"] = $get_c_s_rows["class_name"];
          $class_list_student[$get_c_s_rows["class_id"]][0]["student_name"] = $get_c_s_rows["student_name"];
          $class_list_student[$get_c_s_rows["class_id"]][0]["student_id"] = $get_c_s_rows["student_id"];
          $class_list_student[$get_c_s_rows["class_id"]][0]["class_id"] = $get_c_s_rows["class_id"];
          $class_list_student[$get_c_s_rows["class_id"]][0]["class_name"] = $get_c_s_rows["class_name"];

        }else{
          $student_count = count($class_list_student[$get_c_s_rows["class_id"]]);
          $class_list_student[$get_c_s_rows["class_id"]][$student_count]["student_name"] = $get_c_s_rows["student_name"];
          $class_list_student[$get_c_s_rows["class_id"]][$student_count]["student_id"] = $get_c_s_rows["student_id"];
          $class_list_student[$get_c_s_rows["class_id"]][$student_count]["class_id"] = $get_c_s_rows["class_id"];
          $class_list_student[$get_c_s_rows["class_id"]][$student_count]["class_name"] = $get_c_s_rows["class_name"];

        }

      }

    }

?>