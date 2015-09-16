<?php   header("Content-Type:text/html;charset=utf-8"); 
require_once("../../admin.inc.php");

// Connect Database
require_once("../../php-bin/function.php");

// access control checking
require_once("z_access_control.php");

// Different types have different texts/names
require_once("activity_text.php");


require_once("activity_update_selection.php");


// Used to pass type_id to activity_update_process.php & when click back
$type = mysql_escape_string ($_GET['type']);


?><html>

<head>

<title><?PHP echo $activity_title[$type]; ?> </title>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8">

<LINK REL="StyleSheet" TYPE="text/css" HREF="../../js/style.css">
<LINK rel="stylesheet" href="../../js/calendar.css" type="text/css">
<script language="JavaScript" src="../../js/calendarevents.js" type="text/javascript"></script>
<script language="JavaScript" src="../../js/calendar.js" type="text/javascript"></script>
<script language="JavaScript" src="../../js/calendar-en.js" type="text/javascript"></script>
<script src="../../js/jquery-1.11.3.min.js"></script>
<script src="../../js/validation.js"></script>
<script src="activity.js"></script>

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

</head>

<form method="POST" name="form1" action="activity_update_process.php" onsubmit="return check_valid();" enctype="multipart/form-data">

<body style="background-color: #FFFFFF"  onLoad="if(document.form1.type_id.options[document.form1.type_id.selectedIndex].value==<?php echo $support_activity_id?>){document.form1.class_year.style.visibility='visible'}else{document.form1.class_year.style.visibility='hidden'}" >
<p class="title"><?PHP echo $activity_p_title[$type]; ?></p>
<table width="650" border="0" cellpadding="5" cellspacing="1" class="table1">
  <tr> 
    <td  valign="top"><table width="100%"  border="0" align="left" cellpadding="10" cellspacing="1" bgcolor="#CCCCCC" class="small">
      <tr bgcolor="ECECEC">
        <td colspan="2" class="subHead"><?PHP echo $activity_update_subhead[$type]; ?></td>
        </tr>
<!--
      <tr valign="top" bgcolor="#FFFFFF">
        <td><span class="admin_maintain_form_header">最後更新:&nbsp;</span></td>
        <td><span class="admin_maintain_form_header">
          <?php echo $get_rows["modified_by"]?>
        </span></td>
      </tr>
      <tr valign="top" bgcolor="#FFFFFF">
        <td><span class="admin_maintain_form_header">更新日期:        </span></td>
        <td><span class="admin_maintain_form_header">
          <?php echo substr($get_rows["modified_date"],8,2)."-".substr($get_rows["modified_date"],5,2)."-".substr($get_rows["modified_date"],0,4)." ".substr($get_rows["modified_date"],11,8)?>
        </span></td>
      </tr>
-->
<?PHP if (0 == $type) { ?>
      <tr class="tr-name" valign="top" bgcolor="#FFFFFF">
        <td width="83" height="18">&nbsp;活動名稱:</td>
        <td width="502" height="18"><input name="name" type=text class="style8" id="name" value="<?php echo $get_rows["name"]?>" size="40">        </td>
      </tr>
      <tr class="tr-date" valign="top" bgcolor="#FFFFFF">
        <td height="18">&nbsp;活動日期:</td>
        <td height="18">
        <input name="date_year"  id="date_year" type="text" size="4" maxlength="4" class="style8" value="<?php echo substr($get_rows[date], 0,4)?>">
      -
        <input name="date_month" id="date_month" type="text" size="2" maxlength="2" class="style8" value="<?php echo substr($get_rows[date], 5,2)?>">
      -
	  <input name="date_day" id="date_day" type="text" size="2" maxlength="2" class="style8" value="<?php echo substr($get_rows[date], 8,2)?>">
&nbsp;<img src="../../images/calendar.gif" alt="calendar" border="0" onClick="showCalendar('date_year','date_day','date_month','date_year','d m y')">&nbsp; YYYY-MM-DD</td>
      </tr>
      <tr class="tr-participants" valign="top" bgcolor="#FFFFFF">
        <td height="18">&nbsp;參加對象:</td>
        <td height="18"> <input name="participant" type="text" class="style8" id="participant" size="40" value="<?php echo $get_rows["participant"]?>" ></td>
      </tr>
      <tr class="tr-description" valign="top" bgcolor="#FFFFFF">
        <td height="18">&nbsp;活動介紹:</td>
        <td height="18"><textarea name="desc" cols="38" rows="5" id="desc"><?php echo $get_rows["description"]?></textarea></td>
      </tr>
<?PHP } else if (1 == $type) { ?>
      <tr class="tr-title" valign="top" bgcolor="#FFFFFF">
        <td height="18">&nbsp;標題:</td>
         <td height="18"> <input name="participant" type="text" class="style8" id="participant" size="40" value="<?php echo $get_rows["participant"]?>" ></td>
      </tr>
      <tr class="tr-date" valign="top" bgcolor="#FFFFFF">
        <td height="18">&nbsp;日期:</td>
        <td height="18">
        <input name="date_year"  id="date_year" type="text" size="4" maxlength="4" class="style8" value="<?php echo substr($get_rows[date], 0,4)?>">
      -
        <input name="date_month" id="date_month" type="text" size="2" maxlength="2" class="style8" value="<?php echo substr($get_rows[date], 5,2)?>">
      -
	  <input name="date_day" id="date_day" type="text" size="2" maxlength="2" class="style8" value="<?php echo substr($get_rows[date], 8,2)?>">
&nbsp;<img src="../../images/calendar.gif" alt="calendar" border="0" onClick="showCalendar('date_year','date_day','date_month','date_year','d m y')">&nbsp; YYYY-MM-DD</td>
      </tr>
      <tr class="tr-classyear" valign="top" bgcolor="#FFFFFF">
        <td width="83" height="18">&nbsp;年級:</td>
        <td width="502" height="18"><input name="class_year" type=text class="style8" id="class_year" value="<?php echo $get_rows["class_year"]?>" size="40">        </td>
      </tr>
      <tr class="tr-classtype" valign="top" bgcolor="#FFFFFF">
        <td height="18">&nbsp;班別:</td>
        <td height="18"> <input name="name" type="text" class="style8" id="name" size="40" value="<?php echo $get_rows["name"]?>" ></td>
      </tr>
      <tr class="tr-description" valign="top" bgcolor="#FFFFFF">
        <td height="18">&nbsp;描述:</td>
        <td height="18"><textarea name="desc" cols="38" rows="5" id="desc"><?php echo $get_rows["description"]?></textarea></td>
      </tr>
	  <tr class="tr-download">
        <td height="18" valign="top" bgcolor="#FFFFFF">圖片:</td>
        <td height="18" colspan="3" bgcolor="FFFFFF"><input type="file" accept="image/jpeg" name="a_file" id="a_file" style="display:none" onChange="document.form1.link_pic1.value=this.value">
        <input name="link_pic1" type="text" id="link_pic1" size="25" value="<?php echo $get_rows["file_file_name"]?>"><input type="button" size="20" value="瀏覽文件" onClick="document.form1.a_file.click();"></td>
      </tr>
<?PHP } ?>
      <tr valign="top" bgcolor="ECECEC">
        <td>&nbsp;</td>
        <td><input name="id" type=hidden id="id" value="<?php echo $get_rows["id"]?>">
            <input name="submit" type=submit class="style8" value="  確定更改  ">
            <input name="back" type="button" class="style5" id="back" onClick="location.href='activity.php?type=<?PHP echo $type; ?>'" value="返回">
            <input name="type_id" type="hidden" id="type_id" value="<?PHP echo $type; ?>">
        </td>
      </tr>
    </table> </td>
  </tr>
</table>

<script>
$(function(){
  form_setting(<?PHP echo $type; ?>);
});
</script>
</body>

</form>

</html>