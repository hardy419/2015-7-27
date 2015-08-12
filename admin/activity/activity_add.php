<?php   header("Content-Type:text/html;charset=utf-8"); 
require_once("../../admin.inc.php");

// Connect Database
require_once("../../php-bin/function.php");

// access control checking
require_once("z_access_control.php");


?><html>

<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>新增老師資料</title>
<LINK REL="StyleSheet" TYPE="text/css" HREF="../../js/style.css">
<LINK rel="stylesheet" href="../../js/calendar.css" type="text/css">
<script LANGUAGE="JavaScript" src="../../js/calendarevents.js" type="text/javascript"></script>
<script LANGUAGE="JavaScript" src="../../js/calendar.js" type="text/javascript"></script>
<script LANGUAGE="JavaScript" src="../../js/calendar-en.js" type="text/javascript"></script>
<script src="../../js/validation.js"></script>

<script language="javascript">
<!--

function check_valid()
{
	MSG = [];

	if( document.form1.name.value == "" )
		MSG[MSG.length] = "請輸入活動名稱";
	type_id = document.form1.type_id.options[document.form1.type_id.selectedIndex].value|0;
	if( !(type_id==<?php echo $support_activity_id?> || type_id==<?php echo $support_activity_charge_id?>)  )
	{
		if( (document.form1.date_day.value|0)<=0 || (document.form1.date_day.value|0)>31 || (document.form1.date_month.value|0)<=0 || (document.form1.date_month.value|0)>12 || (document.form1.date_year.value|0)<1995 )
			MSG[MSG.length] = "請輸入日期";
	}

	if( MSG.length > 0 )
	{
		alert(MSG.join("\n"));
		return false;
	}
	return true;
}

//-->
</script>

<style type="text/css">
<!--
.style1 {color: #999999}
.style2 {color: #666666}
-->
</style>
</head>



<body style="background-color: #FFFFFF"  onLoad="if(document.form1.type_id.options[document.form1.type_id.selectedIndex].value==<?php echo $support_activity_id?>){document.form1.class_year.style.visibility='visible'}else{document.form1.class_year.style.visibility='hidden'}" >
<p class="title">活動照片</p>
<table width="500" border="0" cellpadding="0" cellspacing="0" class="table1" bordercolor="#999999" style="border-collapse: collapse">
    <tr> 
    <td  valign="top"> <table width="650" height="40" border="0" cellpadding="5" cellspacing="0">
        <tr> 
          <td class="style3"><div align="left">
            <table width="100%"  border="0" align="left" cellpadding="10" cellspacing="1" bgcolor="#CCCCCC" class="small">
               <form method="POST" name="form1" action="activity_add_process.php" onSubmit="return check_valid();">
			  <tr>
                <td colspan="2" bgcolor="ECECEC" class="subHead">新增活動資料</td>
                </tr>
                <tr valign="top" bgcolor="FFFFFF">
                  <td width="82" height="18">&nbsp;活動名稱:</td>
                  <td width="515" height="18"><input name="name" type=text class="style8" id="name" size="40"></td>
                </tr>

              <tr valign="top" bgcolor="FFFFFF">
                <td height="18">&nbsp;活動日期:</td>
                <td height="18"><font class="style8">
    <input name="date_year" id="date_year" type="text" size="4" maxlength="4" class="style8" >              
    -
    <input name="date_month" id="date_month" type="text" size="2" maxlength="2" class="style8">
    -
	<input name="date_day" id="date_day" type="text" size="2" maxlength="2" class="style8">
                </font>&nbsp;<img src="../../images/calendar.gif" alt="calendar" border="0" onClick="showCalendar('date_year','date_day','date_month','date_year','d m y')">&nbsp;YYYY-MM-DD</span></td>
              </tr>
                <tr valign="top" bgcolor="FFFFFF">
                  <td height="18">&nbsp;參加對象:</td>
                  <td height="18">                    <input name="participant" type="text" class="style8" id="participant" size="40"></td>
                </tr>
                <tr valign="top" bgcolor="FFFFFF">
                  <td height="18">&nbsp;活動介紹:</td>
                  <td height="18">                    <textarea name="desc" cols="38" rows="5" id="desc"></textarea></td>
                </tr>
                <tr bgcolor="ECECEC">
                  <td>&nbsp;</td>
                  <td><input name="submit" type=submit class="style8" value="    確定新增    ">
                      <input name="back" type="button" class="style5" id="back" onClick="location.href='activity.php'" value="返回">                  </td>
                </tr>
              </form>
            </table>
          <span style="font-weight: 400"></span></div></td>
        </tr>
      </table>
      </td>
    </tr>
</table>


</body>



</html>
<?php
mysql_close();
?>