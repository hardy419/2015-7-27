<?php
//Import File 要配合SQLs Class 才能使用。

function iscsv($filename) {
	if (strrchr($_FILES[$filename]["name"], ".") != ".csv") return false;
	return true;
}

class Imports
{
	function Imports()
	{
		$this->Import_SQL = new SQL();
		$this->Import_Field = "";
		$this->Import_DB = "";
		$this->Import_Data = array();
		$this->Field_Length = 0 ;
	}
	
	
	
	function DB_Name($arg)
	{
		$this->Import_DB = $arg;
	}
	function Load($file,$filepath)
	{
		if (!copy($file,$filepath)) return false;
		
		$this->Import_File= fopen($filepath,"r");
		while ($this->Import_Datas[] = fgetcsv($this->Import_File,filesize($filepath),";")) {}
		unset($this->Import_Datas[count($this->Import_Datas)-1]); //最後一行是空值，所以要刪除
		fclose($this->Import_File);
		return $this->Import_Datas;		
	}
	function Field()
	{
		$this->Import_Field = array();
		
		$vars = func_get_args();
		foreach ($vars as $value) {
			$this->Import_Field[] = $value;
		}
		
		$this->Field_Length = count($vars);
		$this->Import_Field = "(".implode(",",$this->Import_Field).")";
	}
	function Add()
	{
		$this->Import_Set_Data = array();
		
		$vars = func_get_args();
		
		if (!$this->Field_Length) 
			foreach ($vars as $value) 
				$this->Import_Set_Data[] = "'".str_replace("'","\'",$value)."'";	
		else 
			for ($this->field_i=0;$this->field_i < $this->Field_Length;$this->field_i++)
				$this->Import_Set_Data[] = "'".str_replace("'","\'",$vars[$this->field_i])."'";
				
			
		
		$this->Import_Data[] = "(".implode(",",$this->Import_Set_Data).")";
	}
	
	function Begin() {
		$this->Import_SQL->query("BEGIN");
	}
	function Rollback() {
		$this->Import_SQL->query("ROLLBACK");
	}
	function Commit() {
		$this->Import_SQL->query("Commit");
	}
	function Clear() {
		$this->Import_Data = array();
	}
	
	function Setup()
	{
		$this->Import_Exec = "Insert Into " .$this->Import_DB." ";
		if ($this->Field_Length > 0) $this->Import_Exec .= $this->Import_Field . " Values ";
		if (count(Import_Data) > 0) {
			foreach ($this->Import_Data as $key=> $value)
			{
				
				if (!$this->Import_SQL->query($this->Import_Exec . $value)) {
					//"[ ".$this->Import_Field." ".$value." ] 
					SetMsg($this->Import_Exec . $value);
					SetMsg("插入資料第 ".($key+1)." 行出錯。");
					$this->Import_SQL->query("ROLLBACK");
					return false;
					break;
				}	//End if
				
			}	//End For
		} // End of Count
		return true;
	}
}
?>