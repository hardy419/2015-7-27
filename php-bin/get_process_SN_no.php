<?php
    $get_serialno_sql = "SELECT serialno FROM `tbl_notice` WHERE `docoment_type` =  'sn' AND `serialno` !=  '' GROUP BY `serialno` desc";

    $get_serialno_result = mysql_query($get_serialno_sql,$link_id);

    for ($i=0;$get_serialno_rows=mysql_fetch_array($get_serialno_result,MYSQL_BOTH);$i++){
      $no_arr[] = $get_serialno_rows["serialno"];
    }
	$no_arr = array_unique($no_arr);
	unset($i);
	
	function showNo($date_arr,$date){
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
