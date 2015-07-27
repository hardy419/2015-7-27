<?php
	$where = ' WHERE ';
	$where_basic = ' `docoment_type` = \'PC\' ';
	
	if(checkLogin()){
		switch($_SESSION['UTPYE']){
			case 'S':
				$where .= $where_basic.' and `access_type` = \'N\' or '.$where_basic.' and `access_type` = \'S\' ';
				break;
			case 'T':
				$where .= $where_basic.' and `access_type` = \'N\' or '.$where_basic.' and `access_type` = \'T\' ';
				break;
			case 'P':
				$where .= $where_basic.' and `access_type` = \'N\' or '.$where_basic.' and `access_type` = \'P\' ';
				break;
			default:
				$where .= $where_basic.' and `access_type` = \'N\' ';
				break;
		}
	}else{
		$where .= $where_basic.' and `access_type` = \'N\' ';
	}

    $get_date_sql = 'SELECT date FROM `tbl_notice` ';
	$get_date_sql .= $where;
	$get_date_sql .= ' GROUP BY `DATE`';

    $get_date_result = mysql_query($get_date_sql,$link_id);

    for ($i=0;$get_date_rows=mysql_fetch_array($get_date_result,MYSQL_BOTH);$i++){
      $year_arr[] = substr($get_date_rows["date"],0,4);
      $month_arr[] = substr($get_date_rows["date"],5,2);
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
