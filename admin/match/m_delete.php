<?php

header("Content-Type:text/html;charset=utf-8"); 

// admin checking

require_once("../../php-bin/admin_check.php");



// access control checking

require_once("z_access_control.php");



// Connect Database

require_once("../../php-bin/function.php");





$Del_Match_ID = $_GET['id']|0;



$del_match_table_SQL = "DELETE FROM tbl_match   WHERE match_id=".$Del_Match_ID;

mysql_query($del_match_table_SQL, $link_id);



$del_match_record_table_SQL = "DELETE FROM tbl_match_record   WHERE match_id=".$Del_Match_ID;

mysql_query($del_match_record_table_SQL, $link_id);







header("Location: m_search.php");

?>