<?php
//SQL 類 PHP 4 版本
//Write By Godmark
//require("function.php");

if (!session_id()) @session_start();

if (!isset($GLOBALS["link_id"])) {
	$GLOBALS["link_id"] = @mysql_connect("localhost","root","");
	@mysql_select_db("kw");
	$GLOBALS["MYSQL_Link"] = &$GLOBALS["link_id"];
}
/*
else
$GLOBALS["MYSQL_Link"] = &$GLOBALS["link_id"];
*/
//require_once("admin_check.php");

define("br","<br>");
define("RD",'<font color="red">');
define("YL",'<font color="yellow">');
define("BL",'<font color="bule">');
define("CEND","</font>");

if (!isset($GLOBALS["GETRequestMethod"]))
{
		$GET = $_GET;
		$POST = $_POST;
		foreach ($GET as $key => $value)
		{
			if ($value != "") $GLOBALS[$key] = $value;
		}
		foreach($POST as $key => $value)
		{
			if ($value != "") $GLOBALS[$key] = $value;
		}
		if (!isset($GLOBALS["page"])) $GLOBALS["page"] = 1;
			
		$GLOBALS["GETRequestMethod"] = true;
}

function print_notes($mode=0)
{
	switch ($mode)
	{
		//Default Msg
		case 0:
		if (isset($_SESSION["System_Message"]))	
		echo RD . $_SESSION["System_Message"] . CEND;
		unset($_SESSION["System_Message"]);
		break;
		
		//Warning Msg
		case 1:
		if (isset($_SESSION["System_Warning_Message"]))
		echo YL .  $_SESSION["System_Warning_Message"] . CEND;
		unset($_SESSION["System_Warning_Message"]);
		break;
		
		//Error Msg
		case 2:
		if (isset($_SESSION["System_Error_Message"]))
		echo RD . $_SESSION["System_Error_Message"] . CEND;
		unset($_SESSION["System_Error_Message"]);
		break;
		
		default:
		if (isset($_SESSION["System_Message"]))
		echo RD . $_SESSION["System_Message"] . CEND;
		unset($_SESSION["System_Message"]);
		break;
	}
}

	function SetMsg($arg,$mode=0)
	{
		global $Log_System_Message;
		
		switch ($mode)
		{
			//Default Msg
			case 0:
			$this->System_Message_Name = "System_Message";
			break;
		
			//Warning Msg
			case 1:
			$this->System_Message_Name = "System_Warning_Message";
			break;
		
			//Error Msg
			case 2:
			$this->System_Message_Name = "System_Error_Message";
			break;
			
			default:
			$this->System_Message_Name = "System_Message";
			break;
		}
		if ( !isset($_SESSION[$this->System_Message_Name]) ) {
			$Log_System_Message = $arg;
			$_SESSION[$this->System_Message_Name] = $arg;
		} else {
			$Log_System_Message .= br . $arg;
			$_SESSION[$this->System_Message_Name] .= br . $arg;
		}
	}


function GetMsg() {
	global $Log_System_Message;
	return $Log_System_Message;
}

function Debug()
{
	global $Class_Debug;
	$Class_Debug = true;
	error_reporting(7);
}

function Stop_Debug()
{
	global $Class_Debug;
	$Class_Debug = false;
	error_reporting(0);
}

//日期處理程序
function Date_Format($format_year,$format_month,$format_days,$format_mode=0) {
	$format_mode = (int)$format_mode;
	$format_year = (int)$format_year;
	$format_month = (int)$format_month;
	$format_days = (int)$format_days;
	
	switch ($format_mode) {
		case 0:
		//if (!Check_Date_Format($format_year,$format_month,$format_days)) return "0000-00-00";
		return date("Y-m-d",mktime(0,0,0,$format_month,$format_days,$format_year)); //回傳日期格式 e.g 2007-01-01
		break;
		case 1:
		return mktime(0,0,0,$format_month,$format_days,$format_year); //回傳長正數格式
		break;
		default:
		return date("Y-m-d",mktime(0,0,0,$format_month,$format_days,$format_year)); //回傳日期格式 e.g 2007-01-01
		break;
	}
}

function Check_Date_Format($format_year,$format_month,$format_days)
{
	$format_year = (int)$format_year;
	$format_month = (int)$format_month;
	$format_days = (int)$format_days;
	
	return checkdate($format_month,$format_days,$format_years);
}

//日期處理程序完

class SQL
{
	//private $Link;
	//public $DB;
	//public $count;
	//public $fieldcount;
	
	function SQL()
	{
		global $MYSQL_Link;
		if (!$this->Link) {
			if (isset($MYSQL_Link)) $this->Link = &$MYSQL_Link;
		}
	}

	function Error($msg)
	{
		echo $msg;
		exit();
	}
	function connect($h,$u,$p)
	{
		global $MYSQL_Link;
		$this->Link = @mysql_connect($h,$u,$p);
		if (!$this->Link) $this->Error("Error:Cant Connected To Mysql.");
		else
		{
			$this->Host = $h;
			$this->User = $u;
			$this->PW = $p;
			$MYSQL_Link = $this->Link;
		}
	}
	function dbs($database)
	{
		//if (strlen(@$this->DBVars) > 0) $this->clear(); //釋出上一個記憶體
		$db = @mysql_select_db($database,$this->Link);
		if (!$db)  //return false;                                                         
		$this->Error("Cant Not Open The Database:". $database);
		else
		$this->DB  = $database;
		return true;
	}
	function query($exec)
	{
		global $Class_Debug;
		//if (strlen(@$this->DBVars) > 0) $this->clear(); //釋出上一個記憶體
		if (isset($Class_Debug) && $Class_Debug) echo $exec . br .br;
		$this->Result = mysql_query($exec,$this->Link);
		if (!$this->Result) return false; //echo mysql_error();//return false;                                          
		//$this->Error("Wrong statment of Sql Query.");
		else
		{
			$this->rows_pos = 0;
			unset($this->fieldcount);
			//$this->eof();
			//$this->querySQL = $exec;
			return true;
		}
	}
	function eof()
	{
		$this->count = @mysql_num_rows($this->Result);
		if (!$this->count) {
		$this->count = 0;
		return true;
		}
		else return false;
	}
	function next()
	{
		if (!isset($this->fieldcount))
		$this->fieldcount = @mysql_num_fields($this->Result);
		$this->Row = @mysql_fetch_object($this->Result); 
		if (!$this->Row) return false;
		for ($i=0;$i<$this->fieldcount;$i++)
		{
			$this->{mysql_field_name($this->Result,$i)} = &$this->Row->{mysql_field_name($this->Result,$i)};
			$this->DBVars[$i] = mysql_field_name($this->Result,$i);
		}
		$this->rows_pos++;
		return true;
	}
	
	function Show_Field_Name()
	{
		$this->fieldcount = @mysql_num_fields($this->Result);
		$this->fieldname = array();
		for ($i=0;$i<$this->fieldcount;$i++) {
			$this->fieldname[] = mysql_field_name($this->Result,$i);
		}
		echo implode(",",$this->fieldname); 
	}
	
	function prev()
	{
		if (!isset($this->fieldcount))
		$this->fieldcount = @mysql_num_fields($this->Result);
		$this->Row = @mysql_data_seek($this->Result,(0));
		$this->rows_pos--;
		return true;
	}
	
	function reload()
	{
		if (!isset($this->fieldcount))
		$this->fieldcount = @mysql_num_fields($this->Result);
		$this->Row = @mysql_data_seek($this->Result,(0));
		return true;
	}
	
	function clear()
	{
		@mysql_free_result($this->Result);
		foreach ($this->DBVars as $key=>$value)
		{
			unset($this->{$this->DBVars[$key]});
		}
		//釋出記憶體
	}
	function setpage($CountSQL,$QuerySQL,&$pagecount,$OrderSQL=false)
	{
		$TotalArray = array();
		if (!$OrderSQL)	$TotalArray[] = $this->total($CountSQL); //Count Of Data
		else $TotalArray[] = $this->total($CountSQL); //Count Of Data
		//else $TotalArray[] = $this->total($CountSQL . " " . $OrderSQL); //Count Of Data
		//echo $CountSQL ." : ". $pagecount . $TotalArray[];
		$bakpage = $GLOBALS["page"];
		$this->count = $TotalArray[0];
		if (isset($pagecount)) {
	   	    $this->totalpage = (($this->count - ($this->count % $pagecount)) / $pagecount);
			if (($this->count % $pagecount) != 0) $this->totalpage++;
			if (!$this->totalpage) $this->totalpage++;
		$TotalArray[] = $this->totalpage; //Count Of Page
		if ($GLOBALS["page"] > $this->totalpage) $GLOBALS["page"] = $this->totalpage;
		$this->LimitPage = ($GLOBALS["page"]-1) * $pagecount;
		$this->Limit = " Limit ".$this->LimitPage.",".$pagecount;

		if (!$OrderSQL) $this->query($QuerySQL . $this->Limit);
		else
		 $this->query($QuerySQL . " " . $OrderSQL. $this->Limit);
		}
		else {
			$TotalArray[] = 1;
			if (!$OrderSQL) $this->query($QuerySQL);
			else
		 	$this->query($QuerySQL . " " . $OrderSQL);
		}
		if ($this->totalpage < 1) $this->totalpage = 1;
		//$bakpage = $GLOBALS["page"];
		$GLOBALS["page"] = $bakpage;
		return $TotalArray;
	}
	
	function total($QuerySQL)
	{
		$ExecQuerySQL = split("From",$QuerySQL);
		$ExecQuerySQL = $ExecQuerySQL[0] . " 'TotalCount' From" . $ExecQuerySQL[1];
		$this->query($ExecQuerySQL);

		$this->next();
		return $this->TotalCount;
	}

	function prevpage($arg="上一頁",$searchary=false)
	{
		$nowpage = @$GLOBALS["page"];
		$total = $this->totalpage;
		if (!$nowpage) $nowpage = 1;
		else if ($nowpage > $total) $nowpage = $total;
		if ($total == "1" || $nowpage == "1") echo $arg; 
		else
		{
			if (!$searchary && isset($GLOBALS['SearchFromDB'])) $searchary = $GLOBALS['SearchFromDB'];
		
			if ($searchary != false)
			{
				foreach ($searchary as $key => $value)
				{
					$searchURL .= "&" . $key . "=" . $value;
				}
			}
			//End Search
			echo "<a href=\"" . $_SERVER['PHP_SELF'] . "?page=" . ($nowpage-1) . $searchURL ."\">".$arg."</a>";
		}
	}

	function nextpage($arg="下一頁",$searchary=false)
	{
		$nowpage = @$GLOBALS["page"];
		$total = $this->totalpage;
		if (!$nowpage) $nowpage = 1;
		else if ($nowpage > $total) $nowpage = $total;
		if ($total == "1" || $nowpage == $total) echo $arg; 
		else
		{
			if (!$searchary && isset($GLOBALS['SearchFromDB'])) $searchary = $GLOBALS['SearchFromDB'];
		
			if ($searchary != false)
			{
				foreach ($searchary as $key => $value)
				{
					$searchURL .= "&" . $key . "=" . $value;
				}
			}
			//End Search
			echo " <a href=\"" . $_SERVER['PHP_SELF'] . "?page=" . ($nowpage+1) . $searchURL ."\">".$arg."</a>";
		}
	}

	function showpage($searchary=false)
	{
		$nowpage = @$GLOBALS["page"];
		$total = $this->totalpage;
		
		if (!$nowpage) $nowpage = 1;
		else if ($nowpage > $total) $nowpage = $total;
		$breakpage = $nowpage -2;
		if (($nowpage+2) > $total) $breakpage -= ($nowpage+2) - $total;
		if ($nowpage == 1 || $breakpage < 1) $breakpage = 1;
		//For Search Action
		$searchURL = '';
		
		if (!$searchary && isset($GLOBALS['SearchFromDB'])) $searchary = $GLOBALS['SearchFromDB'];
		
		if ($searchary != false)
		{
			foreach ($searchary as $key => $value)
			{
				$searchURL .= "&" . $key . "=" . $value;
			}
		}
		//End Search
		
		$breakonpage = $nowpage+2;
		if (($breakonpage -$breakpage) < 4) $breakonpage = $breakonpage + (4-1);
		while(($breakonpage -$breakpage) > 4) {
		$breakonpage--;
		}
		if ($breakonpage > $total) $breakonpage = $total;
		
		if ($total == "1") echo " 1 ";
		else
		{
			for ($i=$breakpage;$i<=($breakonpage);$i++)
			{
				if ($i != $nowpage)
				echo "<a href=\"" . $_SERVER['PHP_SELF'] . "?page=" . $i . $searchURL ."\">" . $i . "</a> ";
				else
				echo $i . " ";
			}

		}
		
	}
	function Get_Url($searchary=false)
	{
		$nowpage = @$GLOBALS["page"];
		if (!$nowpage) $nowpage = 1;
		$searchURL = "page=$nowpage";
		if (!$searchary && isset($GLOBALS['SearchFromDB'])) $searchary = $GLOBALS['SearchFromDB'];
		
		if ($searchary != false)
		{
			foreach ($searchary as $key => $value)
			{
				$searchURL .= "&" . $key . "=" . $value;
			}
		}
		return $searchURL;
	}
	
	function LoadPage($arg1="上一頁",$arg2="下一頁")
	{
		$this->prevpage($arg1);
		echo "&nbsp;&nbsp;";
		$this->showpage();
		echo "&nbsp;";
		$this->nextpage($arg2);	
	}
}




?>