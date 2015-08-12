<?php   header("Content-Type:text/html;charset=utf-8"); 
// admin checking
require_once("../../admin.inc.php");

// access control checking
require_once("z_access_control.php");

// Connect Database
require_once("../../php-bin/function.php");




if ($_GET[type] == "P")
{
	$type = "P";
	$title = "傳媒報導";
	$logo = "傳媒報導";
}else if ($_GET[type] == "S")
{
	$type = "S";
	$title = "最新消息";
	$logo = "最新消息";
}else if ($_GET[type] == "T")
{
	$type = "T";
	$title = "校曆";
	$logo = "校曆";
}else if ($_GET[type] == "B")
{
	$type = "B";
	$title = "比賽記錄";
	$logo = "比賽記錄";
}
else if ($_GET[type] == "H")
{
	$type = "H";
	$title = "家課日誌";
	$logo = "家課日誌";}
else if ($_GET[type] == "HD")
{
	$type = "HD";
	$title = "活動記錄";
	$logo = "活動記錄";
}
else
{
	$type = "N";
	$title = "通告下載";
	$logo = "通告下載";
}


   
?>
<html>
<head>
<title><?php echo $title?></title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">

<link rel="stylesheet" href="../../js/style.css" type="text/css">
<LINK rel="stylesheet" href="../../js/calendar.css" type="text/css">
<script LANGUAGE="JavaScript" src="../../js/calendarevents.js" type="text/javascript"></script>
<script LANGUAGE="JavaScript" src="../../js/calendar.js" type="text/javascript"></script>
<script LANGUAGE="JavaScript" src="../../js/calendar-en.js" type="text/javascript"></script>
<style type="text/css">
<!--
.style1 {font-size: 4px}
-->
</style>
<script>
function CheckForm()
{
	MSG = [];

	if( (document.form1.date_day.value|0) == 0 ||
	(document.form1.date_month.value|0) == 0 ||
	(document.form1.date_year.value|0) == 0 )
		MSG[MSG.length] = "請填寫日期";

	if( document.form1.title.value == "" )
		MSG[MSG.length] = "請填寫標題";

	//if( document.form1.content.value == "" )
		//MSG[MSG.length] = "請填寫內容";

	if( MSG.length > 0 )
	{
		alert(MSG.join("\n"));
		return false;
	}
	return true;
}
</script>
<form name="form1" method="post" action="add_cale_process.php" enctype="multipart/form-data" onSubmit="return CheckForm();">
<body>

<span class="title"><strong><?php echo $title;?></strong></span><br>

<table width="650" border="0" cellpadding="5" cellspacing="0" class="table1">
    <tr> 
      <td  valign="top"> <table width="100%"  border="0" align="left" cellpadding="10" cellspacing="1" bgcolor="CCCCCC" class="admin_maintain_form_table">
        <tr bgcolor="ECECEC">
          <td colspan="2" class="subHead">新增事件</td>
        </tr>
        <tr bgcolor="FFFFFF">
          <td height="18" bgcolor="ECECEC"><font class="style8">&nbsp;開始日期:</font></td>
          <td height="18"><font class="style8">
      <input name="date_year" id="date_year" type="text" size="4" maxlength="4" class="style8">
      -
      <input name="date_month" id="date_month" type="text" size="2" maxlength="2" class="style8">
      -
	  <input name="date_day" id="date_day" type="text" size="2" maxlength="2" class="style8">
&nbsp;<img src="../icons/calendar.gif" alt="calendar" border="0" onClick="showCalendar('date_year','date_day','date_month','date_year','d m y')">&nbsp;YYYY-MM-DD </font></td>
        </tr>

        <tr bgcolor="FFFFFF">
          <td height="18" bgcolor="ECECEC"><font class="style8">&nbsp;結束<font class="style8">日期</font>:</font></td>
          <td height="18"><font class="style8">
      <input name="exp_date_year" id="exp_date_year" type="text" size="4" maxlength="4" class="style8">
      -
      <input name="exp_date_month" id="exp_date_month" type="text" size="2" maxlength="2" class="style8">
      -
	  <input name="exp_date_day" id="exp_date_day" type="text" size="2" maxlength="2" class="style8">
&nbsp;<img src="../icons/calendar.gif" alt="calendar" border="0" onClick="showCalendar('exp_date_year','exp_date_day','exp_date_month','exp_date_year','d m y')">&nbsp;YYYY-MM-DD </font></td>
        </tr>

        <tr bgcolor="FFFFFF">
          <td width="101" height="18" bgcolor="ECECEC"><font class="style8">&nbsp;序號:</font></td>
          <td width="496" height="18"><font class="style8">
            <input name="serial" type="text" size="10" maxlength="10">
          </font></td>
        </tr>

        <tr bgcolor="FFFFFF">
          <td width="101" height="18" bgcolor="ECECEC"><font class="style8">&nbsp;標題:</font></td>
          <td width="496" height="18"><font class="style8">
            <input name="title" type="text" size="40" maxlength="125">
          </font></td>
        </tr>
        <tr bgcolor="FFFFFF">
          <td height="18" bgcolor="ECECEC"><font class="style8">&nbsp;內容:</font></td>
          <td height="18"><font class="style8">
            <textarea  name="content" cols="38" rows="6"></textarea>
          </font></td>
        </tr>
        <tr bgcolor="FFFFFF">
          <td height="18" bgcolor="ECECEC">&nbsp;附件:</td>
          <td height="18"><input type="file" name="file"></td>
        </tr>
        <tr bgcolor="ECECEC">
          <td><font class="style8">&nbsp; </font></td>
          <td><font class="style8">
            <input name="type" type="hidden" id="type" value="<?php echo $type?>">
            <input type="submit" name="Submit" value="    確定新增    ">
            <input type="reset" name="reset" value="重設">
          </font></td>
        </tr>
      </table></td>
    </tr>
  </table>

  <p><a href=calendar.php?type=<?php echo $type?>&year=<?php echo $_GET[year]?>&month=<?php echo $_GET[month]?>>回上一頁</a></p>
</body>
</form>
</html>
<?php
mysql_close();
?>