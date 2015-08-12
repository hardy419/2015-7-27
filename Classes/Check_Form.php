<?php
class Check_Form {
	function Check_Form()
	{
		$this->Form_Arr = array();
	}
	
	function Add($form_name,$form_msg)
	{
		$this->Form_Arr[] = array($form_name,$form_msg);
	}
	
	function Show()
	{
		echo "<script language=\"javascript\">\n";

		echo "function fget(arg) {\n";
		echo "\treturn document.getElementById(arg);\n";
		echo "}\n\n";
				
		echo "function Check_Form() {\n";
		echo "\tvar Check_Form_Msg = \"\";\n";
		echo "\tvar Check_Form_Count = 0;\n";
		foreach ($this->Form_Arr as $value)
		{
			echo "\tif (fget(\"".$value[0]."\").value == \"\") \n";
			echo "\t\tCheck_Form_Msg += ++Check_Form_Count + \". ".$value[1]."\\n\";\n";
		}
		echo "\tif (Check_Form_Msg != \"\") { alert(Check_Form_Msg); return false; }\n";
		echo "\telse\n";
		echo "\treturn true;\n";
		echo "}\n";
		echo "</script>\n";
	}
}
?>