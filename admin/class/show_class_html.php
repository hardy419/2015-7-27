<?
$print_class_name = "";
$print_class_html = "";
$year_count = 0;
for ($i =0; $i < 1; $i){
	if ($get_rows[year] == $show_year){
        	$print_class_name .= $get_rows[class_name] . ", ";
                $print_class_html .= "<input name=\"class_name[$get_rows[class_id]_$get_rows[year]]\" type=\"text\" value=\"$get_rows[class_name]\"  onChange=\"javascript: if(this.value=='') { document.change_class.submit1.disabled=true; } else { document.change_class.submit1.disabled=0; }\" return document.MM_returnValue>  ";
	
				$get_rows = mysql_fetch_array($get_result,MYSQL_BOTH);
                $year_count++;
	}
	else{
		$i =2;
	        $print_class_name = substr($print_class_name, 0, (strlen($print_class_name)-2));
		$print_class_html = substr($print_class_html, 0, (strlen($print_class_html)-2));
	}
                  	
}
if ($print_class_name =="")
	$print_class_name ="-";
if ($print_class_html =="")
	$print_class_html ="-";
?>