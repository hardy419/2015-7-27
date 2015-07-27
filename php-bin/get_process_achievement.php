<?php
    $get_date_sql = "SELECT date FROM `tbl_notice` WHERE `docoment_type` =  'OA' GROUP BY `DATE`";

    $get_date_result = mysql_query($get_date_sql,$link_id);

    for ($i=0;$get_date_rows=mysql_fetch_array($get_date_result,MYSQL_BOTH);$i++){
      $year_arr[] = substr($get_date_rows["date"],0,4);
	  $month_arr[] = substr($get_date_rows["date"],5,2);
    }
	$year_arr = array_unique($year_arr);
	$month_arr = array_unique($month_arr);
	unset($i);
	
	function showDate($date_arr,$date){
		$date_arr_tmp = array();
		array_filter($date_arr);
		krsort($date_arr);
		foreach($date_arr as $k => $v){
			$date_arr_tmp[] = $v;
		}
		
		for($i = 0 ; $i < count($date_arr_tmp) ; $i++){
			if(empty($date_arr_tmp[$i]))continue;
			if($date==$date_arr_tmp[$i]){
				echo "<option value='".$date_arr_tmp[$i]."' selected='selected' >".$date_arr_tmp[$i]."</option>";
			}else{
				echo "<option value='".$date_arr_tmp[$i]."'>".$date_arr_tmp[$i]."</option>";
			}
		}
	}
?>
