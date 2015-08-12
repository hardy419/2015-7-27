<?php

header("Content-Type:text/html;charset=utf-8"); 

// admin checking

require_once("../../php-bin/admin_check.php");



// access control checking

require_once("z_access_control.php");



// Connect Database

require_once("../../php-bin/function.php");











$class_id = $_GET["class_id"]|0;







$WHERE_Str = "";

if( $class_id != 0 )

	$WHERE_Str .= "  AND  s.class_id=".$class_id;



$student_sql = " SELECT * FROM  tbl_student  AS s    LEFT JOIN  tbl_class  AS c    ON(s.class_id=c.class_id)    WHERE  1  ".$WHERE_Str;

$student_result = mysql_query($student_sql, $link_id);







header('Content-Type: application/xml');





echo '<?xml version="1.0" encoding="utf-8" ?>

<data>';

while( $student_obj = mysql_fetch_object($student_result) )

{

	echo '

<elements id="'. $student_obj->student_id .'" name="'. $student_obj->student_name .'" class_id="'. $student_obj->class_id .'" class_name="'. $student_obj->class_name .'" />';

}

echo '

</data>';







mysql_close();

?>