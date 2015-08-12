<?php

header("Content-Type:text/html;charset=utf-8"); 

// admin checking

require_once("../../php-bin/admin_check.php");



// access control checking

require_once("z_access_control.php");



// Connect Database

require_once("../../php-bin/function.php");









$match_ID = $_POST['id']|0;



if( $match_ID == 0 )

{

	header("Location: m_search.php");

	exit();

}



$match_Name = EncodeHTMLTag($_POST['match_name']);

$match_Subject = EncodeHTMLTag($_POST['match_subject']);

$match_Sponsor = EncodeHTMLTag($_POST['match_sponsor']);

$date_year = ($_POST[date_year]|0);

$date_month = ($_POST[date_month]|0);

$date_day = ($_POST[date_day]|0);

$match_Date = $date_year ."-". $date_month ."-". $date_day;



$match_Year = 0;

if( $date_year!=0 && $date_month!=0 && $date_day!=0 )

{

	if( $date_month >= 9 )

		$match_Year = $date_year;

	else

		$match_Year = $date_year-1;

}













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





$Student_Count = count($Student_Name_Ary);





























if( $match_Name=='' )

{

	header("Location: m_update.php?id=".$match_ID);

	exit();

}





// update information in tbl_match

$update_sql = "UPDATE `tbl_match` SET `match_name`='". $match_Name ."',  `match_year`='". $match_Year ."',  `match_date`='". $match_Date ."',  `match_subject`='". $match_Subject ."',  `match_sponsor`='". $match_Sponsor ."'

  WHERE  `match_id`=".$match_ID;

$run_status = mysql_query($update_sql, $link_id);

if (!$run_status)

	$msg = str_replace(" ", "+", "Query failed: " . mysql_error($link_id));

else

	$msg = "比賽更新完成";







// delete all record in    tbl_match_record    which got the same match_id

$del_match_record_table_SQL = "DELETE FROM tbl_match_record   WHERE match_id=".$match_ID;

mysql_query($del_match_record_table_SQL, $link_id);







// add student to    tbl_match_record



if( $Student_Count > 0 )

{

	$values_SQL_Ary = array();

	for( $i=0; $i<$Student_Count; $i++ )

		$values_SQL_Ary[] = "( '".$match_ID."', '".$Student_ID_Ary[$i]."', " . "'".$Student_Name_Ary[$i]."', " . "'".$Student_Class_Name_Ary[$i]."', '".$Student_Outside_Praise_Ary[$i]."', '".$Student_Inside_Praise_Ary[$i]."', ".$i." )";



	$update_sql = "INSERT INTO `tbl_match_record` ( `match_id` , `match_record_student_id` , `match_record_student_name` , `match_record_class_name` ,  `match_record_outside_praise` , `match_record_inside_praise` , `match_record_order` ) VALUES ". implode(", ",$values_SQL_Ary);



	$run_status = mysql_query($update_sql, $link_id);

	if (!$run_status)

		$msg = str_replace(" ", "+", "Query failed: " . mysql_error($link_id));

	else

		$msg = "比賽更新完成";

	mysql_close();

}























header("Location: m_search.php?SearchStart=1&m_match_name=". $match_Name ."&m_year=". $match_Year.'&msg='.$msg);





?>