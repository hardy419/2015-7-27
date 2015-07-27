<?
// admin checking
require_once("../../php-bin/admin_check.php");

?>

<html>
<head>
<title>網上報名管理</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">


<LINK REL="StyleSheet" TYPE="text/css" HREF="../../js/style.css">
<LINK rel="stylesheet" href="../../js/calendar.css" type="text/css">
<script LANGUAGE="JavaScript" src="../../js/calendarevents.js" type="text/javascript"></script>
<script LANGUAGE="JavaScript" src="../../js/calendar.js" type="text/javascript"></script>
<script LANGUAGE="JavaScript" src="../../js/calendar-en.js" type="text/javascript"></script>
<script src="../../js/validation.js"></script>

<style type="text/css">
<!--
.style4 {color: #006600}
.style2 {color: #006699}
-->
</style>



<script language="javascript">
<!--
    function check_valid() {

    	var sErrorMsg;

    	sErrorMsg='';

    	sErrorMsg=FieldValidation('標題',document.add_apply.title.value,'',true,12);

    	if (sErrorMsg.length>0)
    	{
    		displayErrorMessage(sErrorMsg);
    		return false;
    	}
    }
//-->
</script>
</head>


<form action="apply_add_process.php" method="POST" enctype="multipart/form-data" name="add_aply" id="add_aply" onsubmit="return check_valid();">
<body style="background-color: #FFFFFF">

<img src="admin_label.gif" width="500" height="35"><table width="650" border="0" cellpadding="5" cellspacing="0" class="table1" bordercolor="#999999" style="border-collapse: collapse">
    <tr> 
    <td  valign="top"><table width="100%"  border="0" align="left" cellpadding="10" cellspacing="1" bgcolor="CCCCCC" class="small">
      <tr bgcolor="ECECEC">
        <td colspan="4"><span class="style2"><span class="style4">新增報名表</span></span></td>
        </tr>
      <tr bgcolor="ECECEC">
        <td width="97" height="18">&nbsp;標題:</td>
        <td height="18" colspan="3" bgcolor="FFFFFF"><input name="title" type=text class="style8" id="title" size="40" maxlength="50"></td>
      </tr>
      <tr bgcolor="ECECEC">
        <td height="18">&nbsp;活動日期:</td>
        <td height="18" colspan="3" bgcolor="FFFFFF"><font class="style8">
      <input id='date_day' name="date_day" type="text" size="2" maxlength="2" class="style8">    
      -
      <input id='date_month' name="date_month" type="text" size="2" maxlength="2" class="style8">
      -
	  <input id='date_year' name="date_year" type="text" size="4" maxlength="4" class="style8">
        </font>&nbsp;<img src="../../images/calendar.gif" alt="calendar" width="16" height="16" border="0" onClick="showCalendar('date_year','date_day','date_month','date_year','d m y')">&nbsp; DD-MM-YYYY</td>
      </tr>
      <tr bgcolor="ECECEC">
        <td height="18">&nbsp;活動時間:</td>
        <td height="18" colspan="3" bgcolor="FFFFFF"><select name="time_hour_start" id="time_hour_start">
            <?php 
						for($i=0;$i<24;$i++) 
							printf("<option value=\"%02d\">%02d</option>",$i,$i);
					?>
          </select>
      ：
      <select name="time_min_start" id="time_min_start">
        <?php 
						for($i=0;$i<60;$i+=5) 
							printf("<option value=\"%02d\">%02d</option>",$i,$i);
					?>
      </select>
      至
      <select name="time_hour_end" id="time_hour_end">
        <?php 
						for($i=0;$i<24;$i++) 
							printf("<option value=\"%02d\">%02d</option>",$i,$i);
					?>
      </select>
      ：
      <select name="time_min_end" id="select2">
        <?php 
						for($i=0;$i<60;$i+=5) 
							printf("<option value=\"%02d\">%02d</option>",$i,$i);
					?>
    </select></td>
      </tr>
      <tr bgcolor="ECECEC">
        <td height="18">&nbsp;活動地點:</td>
        <td height="18" colspan="3" bgcolor="FFFFFF"><input name="place" type=text class="style8" id="place" size="40" maxlength="50"></td>
      </tr>
      <tr bgcolor="ECECEC">
        <td height="18">&nbsp;有效日期:</td>
        <td height="18" colspan="3" bgcolor="FFFFFF"><font class="style8">
   	  <input id='date_day2' name="date_day2" type="text" size="2" maxlength="2" class="style8">
      -
      <input id='date_month2' name="date_month2" type="text" size="2" maxlength="2" class="style8">
      -
	  <input id='date_year2' name="date_year2" type="text" size="4" maxlength="4" class="style8">
        </font>&nbsp;<img src="../../images/calendar.gif" alt="calendar" width="16" height="16" border="0" onClick="showCalendar('date_year2','date_day2','date_month2','date_year2','d m y')">&nbsp; DD-MM-YYYY</td>
      </tr>
      <tr bgcolor="ECECEC">
        <td height="18">&nbsp;聯絡人名稱:</td>
        <td height="18" colspan="3" bgcolor="FFFFFF"><input name="c_name" type="text" id="c_name" size="40" maxlength="50"></td>
      </tr>
      <tr bgcolor="ECECEC">
        <td height="18">&nbsp;聯絡人電郵:</td>
        <td height="18" colspan="3" bgcolor="FFFFFF"><input name="c_email" type="text" id="c_email" size="40" maxlength="100"></td>
      </tr>
      <tr bgcolor="ECECEC" class="admin_maintain_form_table">
        <td height="18">&nbsp;Link Text:</td>
        <td height="18" colspan="3" bgcolor="FFFFFF"><input name="link_text" type="text" id="link_text" size="40" maxlength="100"></td>
      </tr>
      <tr bgcolor="ECECEC" class="admin_maintain_form_table">
        <td height="18">&nbsp;Link URL:</td>
        <td height="18" colspan="3" bgcolor="FFFFFF"><input name="link_url" type="text" id="link_url" value="http://" size="40" maxlength="100"></td>
      </tr>
      <tr bgcolor="ECECEC" class="admin_maintain_form_table">
        <td height="18">&nbsp;在新視窗開啟:</td>
        <td height="18" colspan="3" bgcolor="FFFFFF"><input name="new_window" type="radio" value="Y">
      是
        <input name="new_window" type="radio" value="N" checked>
      否</td>
      </tr>
	  <input type='hidden' name='sq_type1' value='1' />
      <!--tr bgcolor="ECECEC" class="admin_maintain_form_table">
        <td height="18">&nbsp;問題類別:</td>
        <td height="18" colspan="3" bgcolor="FFFFFF"><input name="sq_type1" type="radio" value="1" checked> 
          文字輸入
            <input name="sq_type1" type="radio" value="2">
選單</td>
      </tr-->
      <tr bgcolor="ECECEC">
        <td height="18">&nbsp;特別問題(1):</td>
        <td width="66" height="18" bgcolor="FFFFFF"><input name="sq1" type="text" id="sq1" size="20" maxlength="30">
        </td>
        <td width="54" nowrap bgcolor="ECECEC">&nbsp;提示(1):</td>
        <td bgcolor="FFFFFF"><input name="sqt1" type="text" id="sqt1" size="20" maxlength="30"></td>
        </tr>
      <tr bgcolor="ECECEC">
        <td height="18">&nbsp;特別問題(2):</td>
        <td height="18" bgcolor="FFFFFF"><input name="sq2" type="text" id="sq2" size="20" maxlength="30"></td>
        <td nowrap bgcolor="ECECEC">&nbsp;提示(2):</td>
        <td bgcolor="FFFFFF"><input name="sqt2" type="text" id="sqt2" size="20" maxlength="30"></td>
        </tr>
      <tr bgcolor="ECECEC">
        <td height="18">&nbsp;特別問題(2):</td>
        <td height="18" bgcolor="FFFFFF"><input name="sq3" type="text" id="sq3" size="20" maxlength="30"></td>
        <td nowrap bgcolor="ECECEC">&nbsp;提示(3):</td>
        <td bgcolor="FFFFFF"><input name="sqt3" type="text" id="sqt3" size="20" maxlength="30"></td>
        </tr>
      <!--tr bgcolor="ECECEC" class="admin_maintain_form_table">
        <td height="18">&nbsp;附件:</td>
        <td height="18" colspan="3" bgcolor="FFFFFF"><input type="file" name="file"></td>
      </tr-->
      <tr bgcolor="ECECEC" class="admin_maintain_form_table">
        <td height="18">&nbsp;附件說明:</td>
        <td height="18" colspan="3" bgcolor="FFFFFF"><input name="document_desc" type="text" id="document_desc" size="40" maxlength="30"></td>
      </tr>
      <tr bgcolor="ECECEC">
        <td height="18">&nbsp;活動描述:</td>
        <td height="18" colspan="3" bgcolor="FFFFFF"><textarea name="desc" cols="38" rows="5" id="desc"></textarea></td>
      </tr>
      <tr bgcolor="ECECEC">
        <td>&nbsp;</td>
        <td colspan="3"><input name="submit" type=submit class="style8" value="    確定新增    ">
            <input name="back" type="button" class="style5" id="back" onClick="location.href='apply.php'" value="返回">
        </td>
      </tr>
    </table> </td>
  </tr>
</table>



</body>
</form>
</html>

