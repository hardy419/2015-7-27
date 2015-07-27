<?php
    $get_date_sql = "SELECT date FROM `tbl_notice` WHERE `docoment_type` =  'sn' GROUP BY `DATE` desc";

    $get_date_result = mysql_query($get_date_sql,$link_id);

    for ($i=0;$get_date_rows=mysql_fetch_array($get_date_result,MYSQL_BOTH);$i++){
      $year_arr[] = substr($get_date_rows["date"],0,4);
		$month_arr[] = substr($get_date_rows["date"],5,2);
    }
	$year_arr = array_unique($year_arr);
	$month_arr = array_unique($month_arr);
	unset($i);
	
	function showDate($date_arr,$date){
		array_filter($date_arr);
		for($i = 0 ; $i < count($date_arr) ; $i++){
			if(empty($date_arr[$i]))continue;
			if($date==$date_arr[$i]){
				echo "<option value='".$date_arr[$i]."' selected='selected' >".$date_arr[$i]."</option>";
			}else{
				echo "<option value='".$date_arr[$i]."'>".$date_arr[$i]."</option>";
			}
		}
	}
?>
