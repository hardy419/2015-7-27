<?php
/*
 *  @function: 检查EMAIL的合法性
 */
function isemail($email)
{
	if (eregi("^[_\.0-9a-z-]+@([0-9a-z][0-9a-z-]+\.)+[a-z]{2,3}$",$email))
		return true;
	else
		return false;
}


/*
 *  @function: 根据指定的数组和关键字生成下拉菜单项
 */
function create_select($array, $key_val, $key_name, $default_val='')
{
    if(is_array($array)) {
        $str_select = '';
		
        foreach($array as $k => $val) {
			
			if($key_val=="null") {
				$this_key = $val;
			}elseif($key_val=="key"){
				$this_key = $k;

			}else{
				$this_key = $val[$key_val];
			}
		
			$this_name = $key_name=="null"?$val:$val[$key_name];
            $select = isset($default_val)&&$this_key == $default_val? " selected ='selected' ": '';
            $str_select .= '<option value="'.$this_key.'"'.$select.'>'.$this_name."</option> \n";

        }
        return $str_select;
    }
    return false;
}

/*
 *  @function: 根据指定的数组和关键字生成单选框@@ 默认为是、否
 */
function create_radio($name,$value="",$array="") {
	global $lang;

	if(!is_array($array)){
		$array = array(
			array('text'=>$lang["yes"],'value'=>'1'),
			array('text'=>$lang["no"],'value'=>'0'),
		);
		$value = $value?$value:0;
	}

	$i=0;
	foreach($array as $row) {
		$i++;
		$checked = ($row["value"]==$value )?"checked='checked'":"";
		$id = ($row["id"]?$row["id"]:$name."_".$i);
		$str .= "<input name='$name' $checked  type='radio' value='$row[value]' id= '$id'/><label for='$id'>$row[text]</label>&nbsp;&nbsp;";
		$checked = "";
	}
	return $str;

}
?>