<?php

    require("../../php-bin/function.php");
    require("../../php-bin/pagedisplay.php");
	
	$page = 1;
	
    $record_per_page = 30;   // records display each page
	
	if(isset($_GET['page']) && !empty($_GET['page']) && is_numeric($_GET['page'])){

        $page = $_GET["page"];

    }
	
    $where = '';
	$where_base = '';
	$sreach_date_start = '';
	$sreach_date_end = '';
	$c_type = '';
	$web_type = '';
	
	if(isset($_GET['year']) && !empty($_GET['year'])){
		if(isset($_GET['month']) && !empty($_GET['month'])){
			$month = strlen($_GET['month']) == 1 ? '0'.$_GET['month'] : $_GET['month'];
			$sreach_date_start = $_GET['year'].'-'.$month.'-01';
			$sreach_date_end = $_GET['year'].'-'.$month.'-31';
		}else{
			$sreach_date_start = $_GET['year'].'-01-01';
			$sreach_date_end = $_GET['year'].'-12-31';
		}
	}
	
	if(isset($_GET['type']) && !empty($_GET['type'])){
		$doc_type = $_GET['type'];
	}
	
	if(isset($_GET['web_type']) && !empty($_GET['web_type'])){
		$web_type = $_GET['web_type'];
	}
	
    // Connect Database	
	$get_sql_banner = '';
	
	$where = 'Where `is_banner` = \'Y\' ';
	$where_base = '';
	
	$get_sql_banner .= ' SELECT `noticeid` as id, `date`,`docoment_type`, `title_cn` as title_cn , `title_en` as title_en , `web_type` , `banner_order` FROM `tbl_notice` ';
	
	if(!empty($sreach_date_start) && !empty($sreach_date_start)){
		$where_base .= ' AND `date` between \''.$sreach_date_start.'\' and \''.$sreach_date_end.'\'';
	}
	
	if(!empty($web_type)){
		$where_base .= ' AND `web_type` = \''.$web_type.'\'';
	}
	
	if(!empty($doc_type)){
		$where_base .= ' AND `docoment_type` = \''.$doc_type.'\'';
	}
	
	$where .= $where_base;
	
	$get_sql_banner .= $where;
	
	$get_sql_banner .= " ORDER BY banner_order ASC";
	
    $get_result_banner = mysql_query($get_sql_banner, $link_id);
	
	$total_record = mysql_num_rows($get_result_banner);

    $offset = $record_per_page * ($page-1);

    $total_page = ceil($total_record/$record_per_page);

    $get_result_banner = mysql_query($get_sql_banner." limit $offset,$record_per_page;", $link_id);	
	
?>