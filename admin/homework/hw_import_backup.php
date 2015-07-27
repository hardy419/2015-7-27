<?
// admin checking
require_once("../../php-bin/admin_check.php");
require_once("../../php-bin/function.php");
?>

<script src="../../js/validation.js"></script>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<LINK REL="StyleSheet" TYPE="text/css" HREF="../../js/style.css">

<title>系統資料</title>
</head>

<script language="javascript">
function Trim(TRIM_VALUE){
	if(TRIM_VALUE.length < 1){
		return"";
	}
	TRIM_VALUE = RTrim(TRIM_VALUE);
	TRIM_VALUE = LTrim(TRIM_VALUE);
	if(TRIM_VALUE==""){
		return "";
	}
	else{
		return TRIM_VALUE;
	}
}

function RTrim(VALUE){
	var w_space = String.fromCharCode(32);
	var v_length = VALUE.length;
	var strTemp = "";
	if(v_length < 0){
		return"";
	}
	var iTemp = v_length -1;

	while(iTemp > -1){
		if(VALUE.charAt(iTemp) == w_space){
		}
		else{
			strTemp = VALUE.substring(0,iTemp +1);
			break;
		}
		iTemp = iTemp-1;
	} //End While
	return strTemp;
} //End Function


function LTrim(VALUE){
	var w_space = String.fromCharCode(32);
	if(v_length < 1){
		return"";
	}
	var v_length = VALUE.length;
	var strTemp = "";

	var iTemp = 0;

	while(iTemp < v_length){
		if(VALUE.charAt(iTemp) == w_space){
		}
		else{
			strTemp = VALUE.substring(iTemp,v_length);
		break;
		}
		iTemp = iTemp + 1;
	} //End While
	return strTemp;
} //End Function

function CheckBeforeSubmit(form) {
	if (form.fmCSV.value == "" || Trim(form.fmCSV.value) == "") {
		alert ("請先指定輸入的CSV檔案");
		return;
	}
	else {
		strTemp = form.fmCSV.value
		if (strTemp.indexOf('csv')==-1) {
			alert ("請確定輸入的是CSV檔案");
			return;
		}
	}
	
	form.submit();
}
</script>

<body>
<br><br><br>
<table width="650" border="0" cellpadding="2" cellspacing="2" class="font_s">
	<form action="do_hw_import.php" method="post" enctype="multipart/form-data" name="fm">
        <tr>
            <td>CSV檔案： </td>
            <td><input name="fmCSV" type="file" size="30" />
            <input name="button" type="button" onClick="CheckBeforeSubmit(document.fm);" value="上傳" /></td>
        </tr>
		<tr><td colspan="3"><a href="hw_import.csv">下載 hw_import.csv 檔案範本</a></td></tr>
		<tr><td colspan="3">｜　Class　｜　Subject　｜　Title　｜　Description　｜　StartDate ｜　DueDate ｜</td></tr>
	</form>
</table>
</body>
</html>
