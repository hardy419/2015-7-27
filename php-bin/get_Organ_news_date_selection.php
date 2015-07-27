<?php
	$where = ' where ';
	$where_basic = ' `docoment_type` =  \'SI\' ';

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
	$get_date_sql .= 'GROUP BY `DATE`';

    $get_date_result = mysql_query($get_date_sql,$link_id);

    for ($i=0;$get_date_rows=mysql_fetch_array($get_date_result,MYSQL_BOTH);$i++){
      $year_arr[] = substr($get_date_rows["date"],0,4);
      $month_arr[] = substr($get_date_rows["date"],5,2);
    }
	$year_arr = array_unique($year_arr);
	$month_arr = array_unique($month_arr);
	unset($i);
	
	function showDate($date_arr){
		for($i = 0 ; $i < count($date_arr) ; $i++){
			echo "<option value='".$date_arr[$i]."'>".$date_arr[$i]."</option>";
		}
	}
?>
