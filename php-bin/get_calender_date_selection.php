<?php
	$where = ' WHERE ';
	$where_basic = ' `content` != \'\' ';
	
	$where .= $where_basic;
    $get_date_sql = 'SELECT date FROM `tbl_calendar` ';
	$get_date_sql .= $where;
	$get_date_sql .= ' GROUP BY `date`';

    $get_date_result = mysql_query($get_date_sql,$link_id);
	
    for ($i=0;$get_date_rows=mysql_fetch_array($get_date_result,MYSQL_BOTH);$i++){
      $year_arr[] = substr($get_date_rows["date"],0,4);
    }
	$year_arr = array_unique($year_arr);
	$month_arr = array_unique($month_arr);
	$year_arr = array_filter($year_arr);
	$month_arr = array_filter($month_arr);
	krsort($year_arr);
	krsort($month_arr);
	unset($i);
	
	function showDate($date_arr){
		foreach($date_arr as $val){
			if($val == '00' || $val == '0000')continue;
?>
			<option value='<?php echo $val;?>' <?php if($_GET['year'] == $val || $_GET['month'] == $val){echo 'selected=\"selected\"';}?>><?php echo $val;?></option>;
<?		}
	}
?>
