<?php
require("../../php-bin/pagedisplay.php");

$page = 1;

$record_per_page = 15;   // records display each page
	
if (isset($_GET["page"])){

	$page = $_GET["page"];

}

$get_sql = '';
$where_base = ' WHERE 1 '; 
$where = '';

$where = $where_base.$where;
	
if (isset($_GET['web_type']) && !empty($_GET['web_type'])) {
	$where .= " AND `web_type` = '".$_GET['web_type']."' ";
}

if (isset($_GET['type']) && !empty($_GET['type'])) {
	$where .= " AND `docoment_type` = '".$_GET['type']."' ";
}
	
if (isset($_GET['school_year']) && !empty($_GET['school_year'])){
	$where .= ' and `school_year` = \''.$_GET['school_year'].'\' ';
	$d_year = $_GET['school_year'];
}

if (isset($_GET['month']) && !empty($_GET['month'])){
	$d_month = $_GET['month'];
	if (substr($d_month,0,1) == 0){
		$d_month = substr($d_month,1,1);
		$where .= ' and `month` = \''.$d_month.'\' ';
	}else{
		$where .= ' and `month` = \''.$d_month.'\' ';
	}
}
//else{
//  $d_month = $_GET[month];
//}



$get_sql = 'SELECT * FROM `tbl_notice`';
$get_sql .= $where;
$get_sql .= " order by date DESC";

if(isset($_GET['id'])){
	$get_sql = "select * FROM `tbl_notice` WHERE noticeid = '".$_GET['id']."'";
}

$get_result = mysql_query($get_sql,$link_id);

$total_record = mysql_num_rows($get_result);

$offset = $record_per_page * ($page-1);

$total_page = ceil($total_record/$record_per_page);

$get_result = mysql_query($get_sql." limit $offset,$record_per_page;", $link_id);
?>