<?php
include("db_mysql.class.php");

class model extends db_mysql

{

	var $db;



	function model($db=NULL)

	{

		global $config;

		$db = $db ? $db : $config["db_server"];

		parent::db_mysql($db['host'],$db['db'], $db['user'],$db['pass'], 'utf8',0, $debug=0);

	}



	function select_data($_table,$fields='*', $where='1', $start=0, $limit=0, $order='', $group='', $debug=false) {

		

		

        $sql = $this->_create_select_sql($_table, $fields, $where, $start, $limit, $order, $group);

        if($debug) return $sql;

        $res = $this->my_query($sql);

        return $res;



	}



	function delete_data($_table,$where,$debug=false) {



        $sql = $this->_create_delete_sql($_table, $where);

        if($debug) return $sql;

        $res = $this->my_query($sql);

        return $res;

    }



	 function update_data($_table,$fields,$value,$where,$other_fields="",$other_value="",$debug=false) {



        $sql = $this->_create_update_sql($_table, $fields, $value, $where,$other_fields,$other_value);



        if($debug) return $sql;

        $res = $this->my_query($sql);

        return $res;



	}



	function insert_data($_table,$fields,$value,$other_fields='',$other_value='', $debug=false){





		$sql = $this->_create_insert_sql($_table, $fields, $value,$other_fields,$other_value);



		if($debug) return $sql;

        $res = $this->my_query($sql);

        $res = $this->last_insert_id();

        return $res;

    }



   function query_data($sql,$debug=false){

   	if($debug)return $sql;

   	$res = $this->my_query($sql);

   	return $res;

   	}



   	function count_data($_table, $fields="*",$where="1",$debug=false){

   		$sql = $this->_create_select_sql($_table, $fields, $where);

   		if($debug)return $sql;

   		$res	=	$this->my_num_rows($sql);

   		return $res;

   	}

	// 計畫不使用的方法

	function data_list($table,$where=1,$is_count=0,$start=0,$limit=0,$order="",$fields="*",$group="",$debug=0){



		if($is_count==1){

			$fields = "count(1) as nums";

			$limit = 1;

		}

		$rs = $this->select_data($table,$fields, $where, $start,$limit,$order,$group,$debug);



		return $rs;

	}

	

	



	/**

	 *  @function: 根据指定的参数创建查询 SQL 语句

	 */

	function _create_select_sql($table, $fields='*', $where='1', $start=0, $limit=0, $order='', $group='')

	{

		$sql = "SELECT $fields FROM $table WHERE $where";

		if($group) {$sql .= " GROUP BY $group";}

		if($order && $order!="") {$sql .= " ORDER BY $order";}

		if($limit && $limit>=0) {

			if(!$start && $limit == 1) {$sql .= " LIMIT $limit";}

			else if($start<0 && $limit>=0) {$sql .= " LIMIT $limit";}

			else {$sql .= " LIMIT $start,$limit";}

		}

	

		return $sql;

	}





	/**

	 *  @function: 根据指定的参数创建插入 SQL 语句

	 */

	function _create_insert_sql($table, $fields, $value, $other_fields='',$other_value='')

	{

		$fields_str = "";

		$value_str = "";

		$other_fields_str = "";

		$other_value_str = "";

	

		//$value = addslashes_sql($value);



		if(is_array($fields) && is_array($value))

		{

			$fields_str = "`".implode("`,`",$fields)."`";

			$value_str	=	"'".implode("','",$value)."'";

		}

		else

		{

			$fields_str = "`".str_replace("|","`,`", $fields)."`";

			$value_str =	"'".str_replace("|","','",$value)."'";

		}



		if(is_array($other_fields) && is_array($other_value))

		{

			$other_fields_str	= "`".implode("`,`",$other_fields)."`";

			$other_value_str		=	implode(",",$other_value);

		}

		else if($other_fields!="" && $other_value!="")

		{

			$other_fields_str = "`".str_replace("|","`,`", $other_fields)."`";

			$other_value_str =	str_replace("|",",",$other_value);

		}



		if($fields_str == "")

		{

		$fields_str = $other_fields_str;

		$value_str =	$other_value_str;

		}



		if($fields_str!="" && $other_fields_str!="")

		{

		$fields_str = $fields_str.",".$other_fields_str;

		$value_str = $value_str.",".$other_value_str;

		}

	

	

		$sql = "INSERT INTO ". $table ."($fields_str) values($value_str)";

		unset($fields_str,$value_str,$other_fields_str,$other_value_str);

		return $sql;

	}



	/**

	 *  @function: 根据指定的参数创建更新 SQL 语句

	 */

	function _create_update_sql($table, $fields, $value, $where,$other_fields="",$other_value="")

	{

			//$value = addslashes_sql($value);

		$arr = $this->_create_fields_value_arr($fields, $value);

		$string = implode(",",$arr);

	

		$other_string = "";

		if($other_fields!="" && $other_value!="")

		{

		$other_arr = $this->_create_fields_value_arr($other_fields,$other_value,"");

		$other_string = implode(",",$other_arr);

		}

		if($string==""){

			$string = $other_string;

		}else{

			$string = $string.($other_string!="" ? ",".$other_string : "");

		}

	

		$sql = "UPDATE ". $table ." SET ". $string ." WHERE ". $where;

		return $sql;

	}

	/**

	 *  @function: 根据指定的参数创建删除 SQL 语句

	 */

	function _create_delete_sql($table, $where)

	{

		$sql = "DELETE FROM $table WHERE $where";

		return $sql;

	}

	

	/**

	 *  @function: 将字段与其所对应的值组合成数组

	 */

	function _create_fields_value_arr($fields, $value,$tag="'",$link="=")

	{

		$fields_value_arr = array();

		if($fields=="")return $fields_value_arr;

		if(is_array($fields) && is_array($value))

		{

		$tmp_arr = array();

			foreach($fields as $key => $val) {

				array_push($tmp_arr, "`". $fields[$key] ."`=$tag". $value[$key] ."$tag");

			}

		$fields_value_arr = $tmp_arr;

	

		}

		else

		{

		$fields = explode('|', $fields);

		$value  = explode('|', $value);

		if(is_array($fields) && is_array($value)) {

			$tmp_arr = array();

			foreach($fields as $key => $val) {

				array_push($tmp_arr, "`". $fields[$key] ."`=$tag". $value[$key] ."$tag");

			}

			//$string = implode(',', $tmp_arr);

			$fields_value_arr = $tmp_arr;

			unset($tmp_arr, $key, $val);

		}

		else {

				$fields_value_arr = array("`". $fields ."`=$tag". $value ."$tag");

			//$string = "`". $fields ."`='". $value ."'";

		}

	  }

	  return $fields_value_arr;

	}

	

	/**

	 *  @function: 将字段与其所对应的值组合成字符串

	 */

	function create_fields_value($fields, $value)

	{

		$fields = explode('|', $fields);

		$value  = explode('|', $value);

		if(is_array($fields) && is_array($value)) {

			$tmp_arr = array();

			foreach($fields as $key => $val) {

				array_push($tmp_arr, "`". $fields[$key] ."`='". $value[$key] ."'");

			}

			$string = implode(',', $tmp_arr);

			unset($tmp_arr, $key, $val);

		}

		else {

			$string = "`". $fields ."`='". $value ."'";

		}

	

		return $string;

	}

}





?>

