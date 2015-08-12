<?php

header("Content-Type:text/html;charset=utf-8"); 

// admin checking

require_once("../../php-bin/admin_check.php");



// access control checking

require_once("z_access_control.php");



// Connect Database

require_once("../../php-bin/function.php");















$Student_ID_Ary = array();

$Student_Name_Ary = array();

$Student_Class_Name_Ary = array();

$Student_Outside_Praise_Ary = array();

$Student_Inside_Praise_Ary = array();





if( $_POST['student_name_ary'] != '' )

{

	foreach ($_POST['student_id_ary'] as $key => $value)

		$Student_ID_Ary[] = $value|0;



	foreach ($_POST['student_name_ary'] as $key => $value)

		$Student_Name_Ary[] = EncodeHTMLTag($value);

	foreach ($_POST['student_class_name_ary'] as $key => $value)

		$Student_Class_Name_Ary[] = EncodeHTMLTag($value);



	foreach ($_POST['student_outside_praise_ary'] as $key => $value)

		$Student_Outside_Praise_Ary[] = EncodeHTMLTag($value);

	foreach ($_POST['student_inside_praise_ary'] as $key => $value)

		$Student_Inside_Praise_Ary[] = EncodeHTMLTag($value);

}





$Student_Count = count($Student_Name_Ary);echo $Student_Count;



for( $i=0; $i<$Student_Count; $i++ )

	$Student_ID_Ary[$i] = $Student_ID_Ary[$i]|0;



$match_Name = EncodeHTMLTag($_POST['match_name']);

$match_Subject = EncodeHTMLTag($_POST['match_subject']);

$match_Sponsor = EncodeHTMLTag($_POST['match_sponsor']);

$date_year = ($_POST[date_year]|0);

$date_month = ($_POST[date_month]|0);

$date_day = ($_POST[date_day]|0);

$match_Date = $date_year ."-". $date_month ."-". $date_day;





$match_Year = 0; //EncodeHTMLTag($_POST['match_year']);

if( $date_year!=0 && $date_month!=0 && $date_day!=0 )

{

	if( $date_month >= 9 )

		$match_Year = $date_year;

	else

		$match_Year = $date_year-1;

}









if( $Student_Count != 0 )

{

	if( $match_Name=='' )

	{

		//header("Location: m_add.php");

		//exit();

		$match_Name = 'No Match Name';

	}





	$add_sql = "INSERT INTO `tbl_match` ( `match_name` , `match_year` , `match_date`, `match_subject` , `match_sponsor` ) VALUES ( '". $match_Name ."', '". $match_Year ."', '". $match_Date ."', '". $match_Subject ."', '". $match_Sponsor ."' ) ";echo $add_sql;

	$run_status = mysql_query($add_sql, $link_id);

	if (!$run_status)

		$msg = str_replace(" ", "+", "Query failed: " . mysql_error($link_id));

	else

		$msg = "比賽添加完成";

	$match_ID = mysql_insert_id($link_id);





	$values_SQL_Ary = array();

	for( $i=0; $i<$Student_Count; $i++ )

		$values_SQL_Ary[] = "( '".$match_ID."', '".$Student_ID_Ary[$i]."', " . "'".$Student_Name_Ary[$i]."', " . "'".$Student_Class_Name_Ary[$i]."', '".$Student_Outside_Praise_Ary[$i]."', '".$Student_Inside_Praise_Ary[$i]."', ".$i." )";





	$add_sql1 = "INSERT INTO `tbl_match_record` ( `match_id` , `match_record_student_id` , `match_record_student_name` , `match_record_class_name` ,  `match_record_outside_praise` , `match_record_inside_praise` , `match_record_order` ) VALUES ". implode(", ",$values_SQL_Ary);

echo $add_sql1;

	$run_status = mysql_query($add_sql1, $link_id);

	if (!$run_status)

		$msg = str_replace(" ", "+", "Query failed: " . mysql_error($link_id));

	//else

	//	$msg = "比賽學生添加完成";

	mysql_close();







	header("Location: m_search.php?SearchStart=1&m_match_name=". $match_Name ."&m_year=". $match_Year.'&msg='.$msg);

}

else

	header("Location: m_search.php");



?>