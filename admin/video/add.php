<?php

// admin checking
require_once("../../admin.inc.php");

// Connect Database
require_once("../../php-bin/function.php");

// access control checking
require_once("z_access_control.php");

require("config.php");

?><html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<title></title>
    <style type="text/css">
<!--
.style2 {color: #006699}
.style3 {color: #FF0000}
.STYLE4 {color: #999999}
.style6 {	font-size: 12px;
	font-family: "新細明體";
	color: #FF0000;
}
-->
    </style>
</head>

<link rel="stylesheet" href="../../js/style.css" type="text/css">
<LINK rel="stylesheet" href="../../js/calendar.css" type="text/css">

<script LANGUAGE="JavaScript" src="../../js/calendarevents.js" type="text/javascript"></script>
<script LANGUAGE="JavaScript" src="../../js/calendar.js" type="text/javascript"></script>
<script LANGUAGE="JavaScript" src="../../js/calendar-en.js" type="text/javascript"></script>

<script language="javascript" defer>

function isNumeric( num )
{
	return ( !isNaN(new Number(num)) && String( num ).replace( /(^\s*)|(\s*$)/g, "" )!="" );
}

function CheckDay( d, m, y )
{
	if( !isNumeric(d) || !isNumeric(m) || !isNumeric(y) )
		return false;
	if( d>31 || d<1 || m>12 || m<1 )
		return false;
	if( m==2 && !Check_leapYear( d, y ) )
		return false;
	return true;
}

function Check_leapYear(  d, y)
{
	var daysInFeb;

	if((y%100==0 && y%400==0) || (y%100!=0 && y%4==0))
		daysInFeb = 29;
	else
		daysInFeb = 28;

	if(d < 1 || d > daysInFeb)
		return false;
	else
		return true;
}

function Submit_Form() {

	Convert();

	Err_Msg_Ary = [];

	if( !isNumeric(document.form1.date_day.value) || !isNumeric(document.form1.date_month.value) || !isNumeric(document.form1.date_year.value) || !CheckDay( document.form1.date_day.value|0, document.form1.date_month.value|0, document.form1.date_year.value|0 ) )
		Err_Msg_Ary[Err_Msg_Ary.length] = "請填寫正確的日期";

	if(document.form1.title.value == "")
		Err_Msg_Ary[Err_Msg_Ary.length] = "請填寫主題";

	if(document.form1.video.value == "")
		Err_Msg_Ary[Err_Msg_Ary.length] = "請填寫電影文件名稱";

	if( Err_Msg_Ary.length > 0 ) {
		alert(Err_Msg_Ary.join("\n"));
		//if(document.form1.mp3_title.value == "")
			//document.form1.mp3_title.focus();
		return false;
	}

	return true;

}

function get(arg) {
	return document.getElementById(arg);
}

reg_exp = new RegExp("\\\\","g");

function Convert() {
	_title = get("title");
	_title.value = _title.value.replace(reg_exp,"/");
}

</script>

<body onLoad="document.form1.title.focus();">
	<?php print_title(); ?>

	<table width="800" border="0" cellpadding="5" cellspacing="0" class="table1">
		<tr>
			<td>
				<table width="100%" border="0" cellpadding="5" cellspacing="1" class="small">
						<tr align="left" valign="top" bgcolor="#FFFFFF">
							<td width="30%"><span class="style2"><span class="style4">管理</span>：</span>&nbsp;</td>

							<td width="20%"><a href="search.php">尋找</a></td>

							<td width="20%" class="STYLE4">
								新增</td>
						</tr>
			  </table>
			</td>
		</tr>

		<tr><td><hr style="height:1px;color=ECECEC;"></td></tr>

		<tr>
			<td valign="top">
				<table width="100%" border="0" align="left" cellpadding="10" cellspacing="1" bgcolor="CCCCCC" class="admin_maintain_form_table">
					<form name="form1" method="post" action="add_process.php" enctype="multipart/form-data" onSubmit="return Submit_Form();">
						<tr bgcolor="ECECEC">
							<td colspan="2" class="subHead">新增</td>
						</tr>
<tr bgcolor="FFFFFF">
  <td width="29%" height="18" bgcolor="ECECEC"><font class="style8">&nbsp;日期:</font></td>
  <td width="71%" height="18"><font class="style8"> 
  <input name="date_year" id="date_year" type="text" size="4" maxlength="4" class="style8" value="" readonly="">
    - 
  <input name="date_month" id="date_month" type="text" size="2" maxlength="2" class="style8" value="" readonly="">
    - 
  <input name="date_day" id="date_day" type="text" size="2" maxlength="2" class="style8" value="" readonly="">
    &nbsp;<img src="../icons/calendar.gif" alt="calendar" name="calenderSelect" width="16" height="16" border="0" id="calenderSelect" onClick="showCalendar('date_year','date_day','date_month','date_year','d m y')">&nbsp; YYYY-MM-DD <a name="calenderSelectNameAnchor"></a></font></td>
</tr>
<tr height="25">
  <td bgcolor="ECECEC"><font class="style8">&nbsp;分類:</font></td>
  <td><label>
    <select name="category_id" id="category_id">
      <option value="1" <?php if(1==$_GET['category_id']):?>selected<?php endif;?>>校園短片</option>
      <option value="2" <?php if(2==$_GET['category_id']):?>selected<?php endif;?>>生態直播</option>
    </select>
  </label></td>
</tr>
<tr bgcolor="FFFFFF">
          <td width="29%" height="18" bgcolor="ECECEC"><font class="style8">&nbsp;主題:</font></td>
          <td width="71%" height="18"><font class="style8">
            <input name="title" type="text" id="title" size="40" maxlength="255"> 
            <font color="#FF0000">* </font>
          </font></td>
        </tr>
        <tr>
          <td height="18" bgcolor="ECECEC"><font class="style8"> &nbsp;電影名稱 :</font></td>
          <td height="18" bgcolor="FFFFFF"><font class="style8">
            <input type="text" name="video" id="video" size="40" maxlength="255">
            &nbsp;
            <span class="style6">請先行上載檔案到FTP</span> </font></td>
        </tr>
        <tr>
          <td height="18" bgcolor="ECECEC"><font class="style8"> &nbsp;預視圖片 :</font></td>
          <td height="18" bgcolor="FFFFFF"><font class="style8">
            <input type="text" name="picture" id="picture" size="40" maxlength="255">
            &nbsp; <span class="style6">請先行上載檔案到FTP</span></font></td>
        </tr>
						<tr bgcolor="ECECEC">
							<td><font class="style8">&nbsp; </font></td>
							<td><font class="style8"> <input type="submit" value="    確定新增    "> &nbsp; <input type="reset" value="重設"> &nbsp; <input type="button" onClick="history.go(-1)" value="返回"></font></td>
						</tr>
					</form>
				</table></td>
		</tr>
</table>
</body>
</html>
<?php
mysql_close();
?>