<?
// admin checking
require_once("../../php-bin/admin_check.php");

?>

<html>

<head>

<title>新增老師資料</title>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8">

<LINK REL="StyleSheet" TYPE="text/css" HREF="../../js/style.css">
<LINK rel="stylesheet" href="../../js/calendar.css" type="text/css">
<script LANGUAGE="JavaScript" src="../../js/calendarevents.js" type="text/javascript"></script>
<script LANGUAGE="JavaScript" src="../../js/calendar.js" type="text/javascript"></script>
<script LANGUAGE="JavaScript" src="../../js/calendar-en.js" type="text/javascript"></script>
<script src="../../js/validation.js"></script>

<script language="javascript">

<!--



    function check_valid() {



    	var sErrorMsg;



    	sErrorMsg='';

    	sErrorMsg=FieldValidation('老師帳號',document.add_user.u_id.value,'',true,12);



    	if (sErrorMsg.length>0)

    	{

    		displayErrorMessage(sErrorMsg);

    		return false;

    	}



    	sErrorMsg='';

    	sErrorMsg=FieldValidation('老師密碼',document.add_user.u_pw.value,'',true,10);



    	if (sErrorMsg.length>0)

    	{

    		displayErrorMessage(sErrorMsg);

    		return false;

    	}
    	sErrorMsg='';

    	sErrorMsg=FieldValidation('老師姓名',document.add_user.u_name.value,'',true,50);



    	if (sErrorMsg.length>0)

    	{

    		displayErrorMessage(sErrorMsg);

    		return false;

    	}


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



<body style="background-color: #FFFFFF">

<img src="admin_label.gif" width="500" height="35">
<table width="500" border="0" cellpadding="0" cellspacing="0" class="table1" bordercolor="#999999" style="border-collapse: collapse">
    <tr> 
    <td  valign="top"> <table width="650" height="40" border="0" cellpadding="5" cellspacing="0">
        <tr> 
          <td class="style3"><div align="left">
            <table width="100%"  border="0" align="left" cellpadding="10" cellspacing="1" bgcolor="#CCCCCC" class="small">
               <form method="POST" name="add_user" action="activity_add_process.php" onSubmit="return check_valid();">
			  <tr>
                <td colspan="2" bgcolor="ECECEC" class="subHead">新增活動資料</td>
                </tr>
              <tr valign="top" bgcolor="FFFFFF">
                <td height="18">&nbsp;活動日期:</td>
                <td height="18"><font class="style8">
    <input id='date_day' name="date_day" type="text" size="2" maxlength="2" class="style8">              
    -
    <input id='date_month' name="date_month" type="text" size="2" maxlength="2" class="style8">
    -
	<input id='date_year' name="date_year" type="text" size="4" maxlength="4" class="style8">
                </font>&nbsp;<img src="../../images/calendar.gif" alt="calendar" border="0" onClick="showCalendar('date_year','date_day','date_month','date_year','d m y')">&nbsp;<span class="content_pop style2">DD</span> <span class="content_pop style2">-MM-YYYY</span></td>
              </tr>
            
                <tr valign="top" bgcolor="FFFFFF">
                  <td height="18">&nbsp;類別:</td>
                  <td height="18"><input name="category" type=text class="style8" id="category" size="40"></td>
                </tr>
                <tr valign="top" bgcolor="FFFFFF">
                  <td width="82" height="18">&nbsp;活動名稱:</td>
                  <td width="515" height="18"><input name="name" type=text class="style8" id="name" size="40"></td>
                </tr>
                <tr valign="top" bgcolor="FFFFFF">
                  <td width="82" height="18">&nbsp;最新消息:</td>
                  <td width="515" height="18">
					<input id='is_news' name="is_news" type="radio" value="Y">
					是
					<input id='is_news' name="is_news" type="radio" value="N" checked>
					否 
				  </td>
                </tr>
                <tr valign="top" bgcolor="FFFFFF">
                  <td height="18">&nbsp;活動介紹:</td>
                  <td height="18">                    <textarea name="desc" cols="38" rows="5" id="desc"></textarea></td>
                </tr>
                <tr bgcolor="ECECEC">
                  <td>&nbsp;</td>
                  <td><input name="submit" type=submit class="style8" value="    確定新增    ">
                      <input name="back" type="button" class="style5" id="back" onClick="location.href='activity.php'" value="返回">
                  </td>
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

