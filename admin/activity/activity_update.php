<?
// admin checking
require_once("../../php-bin/admin_check.php");


    // Selection

    require_once("activity_update_selection.php");



?>

<html>

<head>

<title>相片庫管理 </title>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8">

<LINK REL="StyleSheet" TYPE="text/css" HREF="../../js/style.css">
<LINK rel="stylesheet" href="../../js/calendar.css" type="text/css">
<script language="JavaScript" src="../../js/calendarevents.js" type="text/javascript"></script>
<script language="JavaScript" src="../../js/calendar.js" type="text/javascript"></script>
<script language="JavaScript" src="../../js/calendar-en.js" type="text/javascript"></script>
<script src="../../js/validation.js"></script>

<script language="javascript">

<!--



    function check_valid() {



    	var sErrorMsg;



    	sErrorMsg='';

    	sErrorMsg=FieldValidation('活動名稱',document.update_activity.name.value,'',true,50);



    	if (sErrorMsg.length>0)

    	{

    		displayErrorMessage(sErrorMsg);

    		return false;

    	}



    	sErrorMsg='';

    	sErrorMsg=FieldValidation('日期',document.update_activity.date_year.value,'',true,10);



    	if (sErrorMsg.length>0)

    	{

    		displayErrorMessage(sErrorMsg);

    		return false;

    	}

    	sErrorMsg='';

    	sErrorMsg=FieldValidation('活動介紹',document.update_activity.desc.value,'',true,200);



    	if (sErrorMsg.length>0)

    	{

    		displayErrorMessage(sErrorMsg);

    		return false;

    	}


    }



//-->

</script>

</head>

<form method="POST" name="update_activity" action="activity_update_process.php" onsubmit="return check_valid();">

<body style="background-color: #FFFFFF">
<p class="style1"><img src="admin_label.gif" width="500" height="35"></p>
<table width="650" border="0" cellpadding="5" cellspacing="1" class="table1">
  <tr> 
    <td  valign="top"><table width="100%"  border="0" align="left" cellpadding="10" cellspacing="1" bgcolor="#CCCCCC" class="small">
      <tr bgcolor="ECECEC">
        <td colspan="2" class="subHead">更改活動資料</td>
        </tr>
      <tr valign="top" bgcolor="#FFFFFF">
        <td><span class="admin_maintain_form_header">最後更新:&nbsp;</span></td>
        <td><span class="admin_maintain_form_header">
          <?=$get_rows["modified_by"]?>
        </span></td>
      </tr>
      <tr valign="top" bgcolor="#FFFFFF">
        <td><span class="admin_maintain_form_header">更新日期:        </span></td>
        <td><span class="admin_maintain_form_header">
          <?=substr($get_rows["modified_date"],8,2)."-".substr($get_rows["modified_date"],5,2)."-".substr($get_rows["modified_date"],0,4)." ".substr($get_rows["modified_date"],11,8)?>
        </span></td>
      </tr>
      <tr valign="top" bgcolor="#FFFFFF">
        <td height="18">&nbsp;類別:</td>
        <td height="18"><input name="category" type=text class="style8" id="category" value="<?=$get_rows["category"]?>" size="40"></td>
      </tr>
      <tr valign="top" bgcolor="#FFFFFF">
        <td width="83" height="18">&nbsp;活動名稱:</td>
        <td width="502" height="18"><input name="name" type=text class="style8" id="name" value="<?=$get_rows["name"]?>" size="40">
        </td>
      </tr>
	  <tr valign="top" bgcolor="FFFFFF">
	    <td width="82" height="18">&nbsp;最新消息:</td>
	    <td width="515" height="18">
            <input id='is_news' name="is_news" type="radio" value="Y" <? if($get_rows[is_news]=='Y') { echo "checked"; } ?>>
            是
            <input id='is_news' name="is_news" type="radio" value="N" <? if($get_rows[is_news]=='N') { echo "checked"; } ?>>
            否 
		</td>
	  </tr>
      <tr valign="top" bgcolor="#FFFFFF">
        <td height="18">&nbsp;活動日期:</td>
        <td height="18"><input name="date_day" type="text" size="2" maxlength="2" class="style8" value="<?=substr($get_rows[date], 8,2)?>">
      -
        <input name="date_month" type="text" size="2" maxlength="2" class="style8" value="<?=substr($get_rows[date], 5,2)?>">
      -
	  <input name="date_year" type="text" size="4" maxlength="4" class="style8" value="<?=substr($get_rows[date], 0,4)?>">
&nbsp;<img src="../../images/calendar.gif" alt="calendar" border="0" onClick="showCalendar('date_year','date_day','date_month','date_year','d m y')">&nbsp; DD-MM-YYYY</td>
      </tr>
      <tr valign="top" bgcolor="#FFFFFF">
        <td height="18">&nbsp;活動介紹:</td>
        <td height="18"><textarea name="desc" cols="38" rows="5" id="desc"><?=$get_rows["description"]?></textarea>
</td>
      </tr>
      <tr valign="top" bgcolor="ECECEC">
        <td>&nbsp;</td>
        <td><input name="id" type=hidden id="id" value="<?=$get_rows["id"]?>">
            <input name="submit" type=submit class="style8" value="  確定更改  ">
            <input name="back" type="button" class="style5" id="back" onClick="location.href='activity.php'" value="返回">
        </td>
      </tr>
    </table> </td>
  </tr>
</table>
</body>

</form>

</html>

