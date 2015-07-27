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
<style type="text/css">
<!--
.style2 {color: #FF3300}
.style5 {color: #009900}
-->
</style>
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

var switchblock = 500;

function glow_on()
{
messagebox.filters.blendTrans.apply();
messagebox.filters[0].Enabled = 1;
messagebox.filters.blendTrans.play();
setTimeout("glow_off()",switchblock);
}

function glow_off()
{
messagebox.filters.blendTrans.apply();
messagebox.filters[0].Enabled = 0;
messagebox.filters.blendTrans.play();
setTimeout("glow_on()",switchblock);
}
</script>

<BODY onLoad="glow_on();">
<br>
<table width="650" border="0" cellpadding="2" cellspacing="2" class="font_s">
  <tr>
    <td colspan="2" align="center"><? echo $_GET[msg]; ?></td>
  </tr>
  <form action="do_hw_import.php" method="post" enctype="multipart/form-data" name="fm">
    <tr>
      <td><div id="messagebox" style="Filter:glow(color=#ff0000, strength=1) blendTrans(duration=0.5, transition=22); width:100%;"> 新增功能</div></td>
    </tr>
    <tr>
      <td>匯入CSV檔案： </td>
      <td><input name="fmCSV" type="file" size="30" />
          <input name="button" type="button" onClick="CheckBeforeSubmit(document.fm);" value="上傳" /></td>
    </tr>
    <tr>
      <td colspan="3"><a href="hw_import.csv">下載 hw_import.csv 檔案範本</a></td>
    </tr>
    <tr>
      <td colspan="3">｜　Class　｜　Subject　｜　Title　｜　Description　｜　StartDate ｜　DueDate ｜</td>
    </tr>
  </form>
  <tr>
    <td colspan="2"><br>
        <span class="style2">匯入eclass家課紀錄表步驟：</span><br>
        <br>
      1.從 eclass 匯出家課紀錄表 csv 檔案；<br>
      2.使用 Microsoft Excel 打開該 csv 檔案；<br>
      3.刪除 <span class="style5">Poster</span> 及 <span class="style5">Workload(hrs)</span> 欄；<br>
      4.把 <span class="style5">StartDate</span> 及 <span class="style5">DueDate</span> 中的日期格式轉為"YYYY<font color="blue">－</font>MM<font color="blue">－</font>DD"；<br>
      　方法：按下滑鼠選取該內容，再按滑鼠左鍵選擇 [儲存格格式]<br>
      　　　　
      -> 選 [數值]；<br>
      　　　　
      -> [類別] 選擇 [日期]；<br>
      　　　　
      -> [類型] 選擇 [<span class="style5">2001-03-14</span>]；<br>
      　　　　
      -> 按 [確定]．<br>
      5.儲存檔案；<br>
      6.於上列按 [瀏覽...]，開啟步驟5 儲存之檔案後按 [上傳]；<br>
      7.完成．
	  <BR>
  </table>
</body>
</html>
