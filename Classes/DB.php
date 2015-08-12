<?php
//DB 類 PHP 4 版本
//Write By Godmark

error_reporting(0);
require("SQLs.php");
//require("DB_Config.php");
require("DB_Table.php");

class DB extends SQL{
	
	function Alert($arg="")
	{
		$this->WarnMsg = $this->ErrorMsg;
		
		if ($arg != "") $this->WarnMsg = $arg;
		
		if (@$this->WarnMsg != "") {
			echo '<script language="javascript">alert("'.$this->WarnMsg.'")</script>';
			return true;
		}
		else
		return false;
	}
	
	
	function DB($TableName="")
	{
		$this->SQL();
		$this->ErrorMsg = "";
		$this->ErrorCount = 0;
		if ($TableName != "")
		{
			$this->TableName = $TableName;
			$this->DB_Table = &$GLOBALS['Table'][$TableName];
		}
	}
	// Make A New Table
	function CreateTable()
	{
		$this->Table_Obj = new Create_Table($this);
		return $this->Table_Obj;
	}
	function LoadTable(&$obj)
	{
		$this->Table_Obj = $obj;
		$this->do_Query(); 
	}
	function LoadInsert(&$obj)
	{
		$this->Table_Obj = $obj;
		$this->do_Insert(); 
	}
	function LoadUpdate(&$obj)
	{
		$this->Table_Obj = $obj;
		$this->do_Update(); 
	}
	function LoadDelete(&$obj)
	{
		$this->Table_Obj = $obj;
		$this->do_Delete(); 
	}
	//Make A New Title End
	function LoadConfig($TableName)
	{
		$this->TableName = $TableName;
		$this->DB_Table = &$GLOBALS['Table'][$TableName];
	}
	
	function do_Insert() {
		if (isset($this->Table_Obj)) $this->Table_Obj->setup();
		
		if (isset($this->DB_Table))
		{
			$this->Table = &$this->DB_Table;
			$InsertTitle = array();
			$this->InsertSQLTitle = "";
			$this->InsertSQLValue = "";
			if (isset($this->Table["InsertAry"]))
			{
				foreach($this->Table["InsertAry"] as $key => $value )
				{
					if (isset($GLOBALS[$value[0]]) && @$GLOBALS[$value[0]] != "")
					{
						$InsertTitle[$key] = $GLOBALS[$value[0]];
					}
					else
					{
						if (count($value) > 1) {
							$this->ErrorMsg .= ++$this->ErrorCount.". ".$value[1] . "\\n";
						}
					}
				}
				
				if ($this->ErrorMsg != "") return;
				 //Break All Insert
				 
				if (count($InsertTitle) > 0)
				{
				
					foreach ($InsertTitle as $key => $value)
					{
						if ($this->InsertSQLTitle == "") {
							$this->InsertSQLTitle = "(" . $key;
							$this->InsertSQLValue = "('" . $value . "'";
						}
						else
						{
							$this->InsertSQLTitle .= "," . $key;
							$this->InsertSQLValue .= ",'" . $value . "'";
						}
					}
					$InsertSQL = "Insert Into " . $this->Table["Name"] . $this->InsertSQLTitle . ") VALUES ". $this->InsertSQLValue . ")";
					
					parent::query($InsertSQL);
					if (isset($this->Table["InsertHeader"])) header("Location: " . $this->Table["InsertHeader"]);
				} // End if of count
			}
		}
		
		$file = fopen("log.txt","a+");
		fwrite($file,"Insert\n\n");
		fclose($file);
	}
	
	function do_Update()
	{
		if (isset($this->Table_Obj)) $this->Table_Obj->setup();
		
		$this->UpdateMode = true;
		$this->Table = &$this->DB_Table;
		$UpdateTitle = array();
		$this->current_row = 0;
		if (isset($this->Table["UpdateAry"]))
		{
			foreach($this->Table["UpdateAry"] as $key => $value )
			{
					$UpdateTitle[$key] = array($GLOBALS[$value[0]],$value[2]);
					
					if (count($value) > 1 && $value[1] != "" && $UpdateTitle[$key][0] == "") {
						$this->current_row++;
						$this->ErrorMsg .= $this->current_row.".".$value[1] ."\\n";
						$this->UpdateMode = false;
						//break; //Break All Update
					}
			}
			
			if ($this->UpdateMode && count($UpdateTitle) > 0)
			{
				$UpdateSQL = "";
				foreach($this->Table["UpdateSQL"] as $key => $value)
				{
					if (!isset($UpdateWhereStr))
					$UpdateWhereStr = " Where " . $key . $value[1] . $GLOBALS[$value[0]];
					else
					$UpdateWhereStr .= " And " . $key . $value[1] . $GLOBALS[$value[0]];
				}
				foreach ($UpdateTitle  as $key => $value)
				{
					if ($UpdateSQL == "") $UpdateSQL = "Update " . $this->Table["Name"] . " SET $key ".$value[1]." '$value[0]'";
					else
					$UpdateSQL .= ",$key ".$value[1]." '$value[0]'";
				}
				$UpdateSQL .= $UpdateWhereStr;
				//echo $UpdateSQL;
				$this->query($UpdateSQL);
				if (isset($this->Table["UpdateHeader"])) header("Location: " . $this->Table["UpdateHeader"]);
			}
		}
	}
	
	function do_Delete()
	{
		if (isset($this->Table_Obj)) $this->Table_Obj->setup();
		$TableName = $this->TableName;
		$this->Table = &$this->DB_Table;
		
		if ( isset($this->DB_Table) ) {
			if (count($this->Table["DeleteSQL"]) > 0) {
				$DeleteWhereStr = " Where ";
				foreach ($this->Table["DeleteSQL"] as $key => $value)
				{
					switch ($value[1]) {
						case "not in":
						case "in":
						$DeleteWhereStr_Value = $key ." ". $value[1] . " (".$GLOBALS[$value[0]] .")";
						break;
						default:
						$DeleteWhereStr_Value = $key ." ". $value[1] . " '".$GLOBALS[$value[0]] ."'";
						break;
					}
					if ($DeleteWhereStr == " Where ") $DeleteWhereStr .= $DeleteWhereStr_Value;
					else $DeleteWhereStr .= " And ". $DeleteWhereStr_Value;
				}
				$DeleteSQL = "Delete From " . $this->Table["Name"] . $DeleteWhereStr;
				return parent::query($DeleteSQL);
			}
		}
	}
	
	function do_Query()
	{
		if (isset($this->Table_Obj)) $this->Table_Obj->setup();
		$TableName = $this->TableName;
		if (isset($this->DB_Table) ) {
				//$sql = new SQL();
				$this->Table = &$this->DB_Table;
				$this->FinalSQL = $this->Table["SQL"];
				$this->FinalCountSQL = $this->Table["CountSQL"];
				//自動判斷搜尋功能

				if (isset($this->Table["SearchAry"]))
				{
					if ( count(split("Where",$this->FinalSQL)) > 1)
					$this->SearchMode = " And";
					else 
					$this->SearchMode = " Where";
					
					foreach($this->Table["SearchAry"] as $key => $value)
					{
						$this->Allow_Search_Mode = false;
						
						if (isset($value[3])) $this->Allow_Search_Mode = true;
						
						if ($this->SearchMode != " Where") {
							if (isset($value[2])) $this->SearchMode = " ".$value[2];
							else
							$this->SearchMode = " And";
						}
						
						if ( count(split("Where",$this->FinalSQL)) < 2)  $this->SearchMode = " Where";
						
						if ( isset($GLOBALS[$value[0]]) || $this->Allow_Search_Mode) {
							if ($GLOBALS[$value[0]] != "" || $this->Allow_Search_Mode)
							$GLOBALS['SearchFromDB'][$value[0]] = $GLOBALS[$value[0]]; //With Showpage Function
							if ($GLOBALS[$value[0]] != "" || $this->Allow_Search_Mode) {
								switch ($value[1])
								{
									case "Like":
									$this->FinalSQL .= $this->SearchMode . " $key ".$value[1]. "'%".$GLOBALS[$value[0]]."%'";
									$this->FinalCountSQL .= $this->SearchMode . " $key ".$value[1]. "'%".$GLOBALS[$value[0]]."%'";
									break;
									
									case "in":
									$this->FinalSQL .= $this->SearchMode . " $key ".$value[1]. " (".$GLOBALS[$value[0]].") ";
									$this->FinalCountSQL .= $this->SearchMode . " $key ".$value[1]. " (".$GLOBALS[$value[0]].") ";
									break;
									
									default:
									$this->FinalSQL .= $this->SearchMode . " $key ".$value[1]. "'".$GLOBALS[$value[0]]."'";
									$this->FinalCountSQL .= $this->SearchMode . " $key ".$value[1]. "'".$GLOBALS[$value[0]]."'";
									break;
								}
							}
							if ($this->SearchMode == " Where") {
								if (isset($value[2])) $this->SearchMode = " ".$value[2];
								else
								$this->SearchMode = " And";
							}
						}
					}
				}
				//Sorting
				
				if (isset($this->Table["Sort"]))
				{
					$sort = &$GLOBALS['sort'];
					$sortby = &$GLOBALS['sortby'];
					if (isset($sort)) {
						if( isset($this->Table["Sort"][$sort]) ) {
							switch($sortby)
							{
								case "0": //ASC
								$this->Table["OrderSQL"] = "Order By ".$this->Table["Sort"][$sort]." ASC";
								break;
								case "1": //DESC
								$this->Table["OrderSQL"] = "Order By ".$this->Table["Sort"][$sort]." DESC";
								break;
								default:
								$this->Table["OrderSQL"] = "Order By ".$this->Table["Sort"][$sort]." ASC";
								break;
							}
						}
					}
				}
				//Sorting End
				if (isset($this->Table["OrderSQL"])) 
				$this->Total = $this->setpage($this->FinalCountSQL,$this->FinalSQL,$this->Table["Limit"],$this->Table["OrderSQL"]);
				else
				$this->Total = $this->setpage($this->FinalCountSQL,$this->FinalSQL,$this->Table["Limit"]);
				
		}
	}
	
	function Limit($value) {
		$value = (int)($value);
		if ($value < 1) unset($this->DB_Table["Limit"]);
		else
		$this->DB_Table["Limit"] = $value;
	}
	
	function Sort($arg)
	{
		if (count($GLOBALS['SearchFromDB']) > 0)
		{
			foreach ($GLOBALS['SearchFromDB'] as $key => $value)
			{
				$searchURL .= "&" . $key . "=" . $value;
			}
		}
		
		switch($GLOBALS[sortby])
		{
			case "0": //ASC
			$sortby = 1;
			break;
			case "1": //DESC
			$sortby = 0;
			break;
			default:
			$sortby = 0;
			break;
		}
		
		return $_SERVER['PHP_SELF'] . "?sort=$arg&sortby=" . $sortby . $searchURL;
	}
	function getNextTitle($TheKey)
	{
		$prev_id  = -1;
		$next_id  = -1;
		$page = &$GLOBALS[page];
		$id = $GLOBALS[id];
		$bakpage = $page;
		//if (isset($GLOBALS[sno]) && isset($GLOBALS[spage])) {
		$sno = &$GLOBALS[sno];
		$spage = &$GLOBALS[spage];
		$page = (($spage-1)*$this->Table["Limit"])+$sno-1;
		unset($GLOBALS[id]);
		$this->Table["Limit"] = 1;
		$prevnext = new DB($this->TableName);
		if ($page > 0)
		{
			$prevnext->next();
			$prev_id = $prevnext->{$TheKey};
		}
		if ($prevnext->Total[0] > (++$page)) {
			$page++;
			$prevnext = new DB($this->TableName);
			$prevnext->next();
			$next_id = $prevnext->{$TheKey};
		}
		$page = $bakpage;
		$GLOBALS[id] = $id;
		return array($prev_id,$next_id);
		//}
	}

}

?>