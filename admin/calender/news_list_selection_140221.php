<?php
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
	
	if(isset($_GET['c_type'])){
		$c_type = $_GET['c_type'];
	}
	
	if(isset($_GET['web_type'])){
		$web_type = $_GET['web_type'];
	}
	
    // Connect Database	
	$get_sql_news = '';
	
	if(empty($c_type) || $c_type == '5' ){//行事歷
		
		$where = 'Where `is_news` = \'Y\' ';
		$where_base = '';
		
		$where_base = ' AND `type` = \'T\'';
		
		$get_sql_news .= ' SELECT 5, `calendarid` as id, `date`, `title_cn` as title_cn , `title_en` as title_en , `web_type` , `news_order` FROM `tbl_calendar` ';
		
		if(!empty($sreach_date_start) && !empty($sreach_date_start)){
			$where_base .= ' AND `date` between \''.$sreach_date_start.'\' and \''.$sreach_date_end.'\'';
		}
		
		if(!empty($web_type)){
			$where_base .= ' AND `web_type` = \''.$web_type.'\'';
		}
		
		$where .= $where_base;
		
		$get_sql_news .= $where;
	}
	
	if(empty($c_type) || $c_type == '3' ){//網上檔案總管
	
		$where = 'Where `is_news` = \'Y\' ';
		$where_base = '';
		if(!empty($get_sql_news)){
			$get_sql_news .= ' UNION ';
		}
		
		$get_sql_news .= ' SELECT 3, `noticeid` as id, `date`, `title_cn` as title_cn , `title_en` as title_en , `web_type` , `news_order` FROM `tbl_notice` ';
		
		if(!empty($sreach_date_start) && !empty($sreach_date_start)){
			$where_base .= ' AND `date` between \''.$sreach_date_start.'\' and \''.$sreach_date_end.'\'';
		}
		
		if(!empty($web_type)){
			$where_base .= ' AND `web_type` = \''.$web_type.'\'';
		}
		
		$where .= $where_base;
		
		$get_sql_news .= $where;
	}
	
	$get_sql_news .= " ORDER BY news_order ASC";
	
	$get_result_news = mysql_query($get_sql_news, $link_id);

    $total_record = mysql_num_rows($get_result_news);

    $offset = $record_per_page * ($page-1);

    $total_page = ceil($total_record/$record_per_page);

    $get_result_news = mysql_query($get_sql_news." limit $offset,$record_per_page;", $link_id);
	
    $total_record_news = mysql_num_rows($get_result_news);
?>