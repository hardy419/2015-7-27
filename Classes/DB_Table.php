<?php
class Create_Table {

	function Create_Table(&$super)
	{
		$this->superclass = &$super;
		$this->DB = array();
		$this->Vars = array();
		$this->Vars["Where"] = "";
		$this->DB["SearchAry"] = array();
		$this->DB["InsertAry"] = array();
		$this->DB["UpdateSQL"] = array();	
		$this->DB["DeleteSQL"] = array();	
		$this->Vars["Join"] = array();
		$this->Vars["NameAs"] = "";
		$this->CountField_Vars = "*";
		$this->DB["Sort"] = array();
	}
	
	function CountField($count_field_vars)
	{
		$this->CountField_Vars = $count_field_vars;
	}
	
	function Limit($value) {
		$value = (int)($value);
		if ($value < 1) unset($this->DB["Limit"]);
		else
		$this->DB["Limit"] = $value;
	}
	
	function Name($TableName,$asName="")
	{
		$this->DB["Name"] = $TableName;
		$this->DB["CountSQL"] = "Select Count(*) From " . $this->DB["Name"];
		if ($asName != "") {
			$this->Vars["NameAs"] = " as $asName "; 
			$this->DB["CountSQL"] .= $this->Vars["NameAs"];
		}
		else
		$this->Vars["NameAs"] = "";
		
		$this->Vars["Field"] = "*";
	}
	
	function Field() {
		$vars = func_get_args();
		$this->Vars["Field"] = "";
		unset($this->FieldSQL);
		
		foreach ($vars as $value) {
			if (isset($this->FieldSQL))	$this->FieldSQL .= ",".$value;
			else
			$this->FieldSQL = $value;
		}
		
		if ($this->FieldSQL != "")
		$this->Vars["Field"] = $this->FieldSQL;
		else $this->Vars["Field"] = "*";
	}
	
	function OrderSQL($arg) {
		$this->DB["OrderSQL"] = $arg;
	}
	
	function AddSort()
	{
		$sort_arr = func_get_args();
		if (count($sort_arr) > 0)
		{
			foreach ($sort_arr as $value)
			{
				$this->DB["Sort"][] = $value;
			}
		}
	}
	
	function ClearSort()
	{
		$this->DB["Sort"] = array();
	}
	
	// arg1 : Field Name || arg2 : Input Box || arg3 : = / Like  || arg4 : And / Or
	// Sample : AddSearch("FieldName","member_name","Like","Or");
	// Sample2 : AddSearch(AddSearch("FieldName","member_name","=","Or"); arg4 will default "And"
	function AddSearch($arg1,$arg2,$arg3="=",$arg4="",$arg5="")
	{
		if ($arg5 != "")
		$this->DB["SearchAry"][$arg1] = array($arg2,$arg3,$arg4,$arg5);
		else if ($arg4 != "")
		$this->DB["SearchAry"][$arg1] = array($arg2,$arg3,$arg4);
		else
		$this->DB["SearchAry"][$arg1] = array($arg2,$arg3);
		//return (&$this->DB["SearchAry"][$arg1]);
	}
	
	function UpdateSQL($arg1,$arg2,$arg3="=")
	{
		$this->DB["UpdateSQL"][$arg1] = array($arg2,$arg3);
	}
	
	function DeleteSQL($arg1,$arg2,$arg3="=")
	{
		$this->DB["DeleteSQL"][$arg1] = array($arg2,$arg3);
	}
	
	function AddUpdate($arg1,$arg2,$arg3="",$arg4="=")
	{
		$this->DB["UpdateAry"][$arg1] = array($arg2,$arg3,$arg4);
		//return (&$this->DB["SearchAry"][$arg1]);
	}
	
	// Insert
	// arg1 : Field Name || arg2 : Input Box || arg3 : 是否必須要填寫
	// Sample : AddSearch("FieldName","member_name","你必須要填寫會員姓名");
	function AddInsert($arg1,$arg2,$arg3="")
	{
		if ($arg3 != "")
		$this->DB["InsertAry"][$arg1] = array($arg2,$arg3);
		else
		$this->DB["InsertAry"][$arg1] = array($arg2);
		//return (&$this->DB["SearchAry"][$arg1]);
	}
	
	function RemoveSearch($field_name)
	{
		unset($this->DB["SearchAry"][$field_name]);
	}
	function RemoveUpdate($field_name)
	{
		unset($this->DB["UpdateAry"][$field_name]);
	}
	function RemoveInsert($field_name)
	{
		unset($this->DB["InsertAry"][$field_name]);
	}
	function ClearSearch()
	{
		$this->DB["SearchAry"] = array();
	}
	
	function ClearInsert()
	{
		$this->DB["InsertAry"] = array();
	}
	
	function ClearUpdate()
	{
		$this->DB["UpdateAry"] = array();
	}
	
	//SQL : Join $arg1 as $arg3 on $arg2
	function Join($arg1,$arg2,$arg3="")
	{
		if ($arg3 == "")
		$this->Vars["Join"][] = array(" Join ",$arg1,$arg2);
		else
		$this->Vars["Join"][] = array(" Join ",$arg1,$arg2,$arg3);
	}
	
	function LeftJoin($arg1,$arg2,$arg3)
	{
		if ($arg3 == "")
		$this->Vars["Join"][] = array(" Left Join ",$arg1,$arg2);
		else
		$this->Vars["Join"][] = array(" Left Join ",$arg1,$arg2,$arg3);
	}
	
	function ClearJoin()
	{
		$this->Vars["Join"] = array();
	}
	
	function Where($arg)
	{
		$this->Vars["Where"] = " Where $arg ";
	}
	
	function setup()
	{

		$this->DB["CountSQL"] = "Select Count(".$this->CountField_Vars.") From " . $this->DB["Name"] . $this->Vars["NameAs"];
		$this->DB["SQL"] = "Select ". $this->Vars["Field"] . " From " . $this->DB["Name"] . $this->Vars["NameAs"];
		
		if (count($this->Vars["Join"]) > 0) {
			foreach ($this->Vars["Join"] as $value)
			{
				if (count($value) > 3)
				{
					$this->DB["SQL"] .= $value[0] . $value[1] ." as ". $value[3] . " on " . $value[2]; 
					$this->DB["CountSQL"] .= $value[0] . $value[1] ." as ". $value[3] . " on " . $value[2]; 
				}
			}
		}
		
		$this->DB["CountSQL"] .= $this->Vars["Where"];
		$this->DB["SQL"] .= $this->Vars["Where"];
		
		$this->superclass->TableName = $this->DB["Name"];
		$this->superclass->DB_Table = &$this->DB;
	}
	
}
?>