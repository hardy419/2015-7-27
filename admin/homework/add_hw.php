<?
// admin checking
require_once("../../php-bin/admin_check.php");

require_once("../../php-bin/function.php");


?>



<script src="../../js/validation.js"></script>

<script lang="javascript">
<!--



function check_valid() {

if( document.add_hw.u_subject.value == "" )
	return false;

	if (document.add_hw.file.value == ""){

	    	var sErrorMsg;
	   	sErrorMsg='';
	    	sErrorMsg=FieldValidation('家課內容',
	    	document.add_hw.u_text.value,'',true,12);
	    	if (sErrorMsg.length>0){
	    		displayErrorMessage(sErrorMsg);
	   		return false;
	    	}
	}
}
//-->

</script>
<html>
<head>
<title></title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<LINK REL="StyleSheet" TYPE="text/css" HREF="../../js/style.css">
<LINK rel="stylesheet" href="../../js/calendar.css" type="text/css">

<script LANGUAGE="JavaScript" src="../../js/calendarevents.js" type="text/javascript"></script>
<script LANGUAGE="JavaScript" src="../../js/calendar.js" type="text/javascript"></script>
<script LANGUAGE="JavaScript" src="../../js/calendar-en.js" type="text/javascript"></script>
</head>
<form method="POST" name="add_hw" action="add_process.php?classname=<?=$_GET[classname]?>" enctype="multipart/form-data" onsubmit="return check_valid();">
<body>
<table width="500" border="0" align="left" cellpadding="0" cellspacing="0" class="table1">
    <tr> 
      <td  valign="top"> <table width="650" border="0" cellpadding="5" cellspacing="0">
          <tr> 
            <td class="style3"><div align="left">
              <table width="100%"  border="0" align="left" cellpadding="10" cellspacing="1" bgcolor="#CCCCCC" class="small">
                <tr bgcolor="ECECEC">
                  <td colspan="2" class="subHead">新增家課資料</td>
                </tr>
                <tr>
                  <td width="82" height="18" bgcolor="ECECEC">&nbsp;日期:</td>
                  <td width="302" height="18" bgcolor="FFFFFF"><?=$_GET[date]?>
                      <input type="hidden" name="u_date" value="<?=$_GET[date]?>">
                  </td>
                </tr>
                <tr>
                  <td width="82" height="18" bgcolor="ECECEC">&nbsp;繳交日期</td>
                  <td width="302" height="18" bgcolor="FFFFFF"><?

$date_year = (substr($_GET[date], 0,4)|0);
$date_month = (substr($_GET[date], 5,2)|0);
$date_day = (substr($_GET[date], 8,2)|0);

$to_date  = mktime(0, 0, 0, $date_month, $date_day+1, $date_year);
$date_year2 = date(Y, $to_date);
$date_month2 = date(n, $to_date);
$date_day2 = date(j, $to_date);

?><font class="style8"> 
<input name="date_year2" type="text" size="4" maxlength="4" class="style8" value="<?=$date_year2?>">
 - 
<input name="date_month2" type="text" size="2" maxlength="2" class="style8" value="<?=$date_month2?>">
 - 
<input name="date_day2" type="text" size="2" maxlength="2" class="style8" value="<?=$date_day2?>">
 &nbsp;<img src="../../images/calendar.gif" alt="calendar" border="0" onClick="showCalendar('date_year2','date_day2','date_month2','date_year2','d m y')">&nbsp; YYYY-MM-DD </font></td>
                </tr>
                <tr>
                  <td height="18" bgcolor="ECECEC">&nbsp;家課內容:</td>
                  <td height="18" bgcolor="FFFFFF"><input name="u_text" type=text class="style8" id="u_text" size="30">
                  </td>
                </tr>
                <tr>
                  <td height="18" bgcolor="ECECEC">&nbsp;科目:</td>
                  <td height="18" bgcolor="FFFFFF"><input name="u_subject" id="u_subject" size="10"><select name="sub_type" id="sub_type" class="style8" onChange="document.add_hw.u_subject.value=this.options[this.selectedIndex].text" >
                      <?
/*
                    	$sql = " And (TYPE = 'ALL' or  TYPE = 'HW')" ;
			require_once("../../php-bin/get_subject_selection.php");
		        $check_selected = $_GET[subjectid];
		        require_once("../../php-bin/get_subject_select_html.php");
*/


$get_s_sql = "SELECT * FROM `tbl_subject` WHERE   1  And (TYPE = 'ALL' or  TYPE = 'HW')";
$get_s_result = mysql_query($get_s_sql,$link_id);
while( $get_s_obj=mysql_fetch_object($get_s_result,MYSQL_BOTH) )
{
	if( $_GET[subjectid] == $get_s_obj->subject_id )
		echo '<option value="'. $get_s_obj->subject_id .'" selected >'. $get_s_obj->subject_name .'</option>';
	else
		echo '<option value="'. $get_s_obj->subject_id .'">'. $get_s_obj->subject_name .'</option>';
}

                    ?>
                    </select>
<script language="javascript" defer>
if( document.add_hw.sub_type.selectedIndex != -1 )
{
	document.add_hw.u_subject.value = document.add_hw.sub_type.options[document.add_hw.sub_type.selectedIndex].text;
}
</script> <a href="javascript:location.href='del.php?id='+document.add_hw.sub_type.options[document.add_hw.sub_type.selectedIndex].value;" onClick="return window.confirm('你確定要刪除嗎?')">刪除</a>
                  </td>
                </tr>
                <tr>
                  <td height="18" bgcolor="ECECEC">&nbsp;科目分組:</td>
                  <td height="18" bgcolor="FFFFFF"><input name="subject_branch" id="subject_branch" size="10"></td>
                </tr>
				<!--
                <tr>
                  <td height="18" bgcolor="ECECEC">&nbsp;備註:</td>
                  <td height="18" bgcolor="FFFFFF"><textarea name="remark" id="remark"></textarea></td>
                </tr>
				-->
                <tr>
                  <td height="18" bgcolor="ECECEC">&nbsp;班別:</td>
                  <td height="18" bgcolor="FFFFFF"><select class="style8" name="u_class">
                      <?
                    	
			require_once("../../php-bin/get_class_selection.php");
			$check_selected = $_GET[classname];
		        for ($i=0;$i<count($class_list);$i++){ 
?>
                      <option value="<?=$class_list[$i]["class_name"]?>"
	<?              
	if ($check_selected==$class_list[$i]["class_name"]){
		echo " selected";
	
	}
	?>
>
                      <?=$class_list[$i]["class_name"]?>
                      </option>
                      <? } ?>
                      
                    ?>
                    </select>
                  </td>
                </tr>
				<!--
                <tr>
                  <td height="18" bgcolor="ECECEC">&nbsp;上載CVS:</td>
                  <td height="18" bgcolor="FFFFFF"><input name="file" type="file" class="small"></td>
                </tr>
				-->
                <tr>
                  <td bgcolor="ECECEC">&nbsp;</td>
                  <td bgcolor="ECECEC">
				  <?  //此引擎的小學科目分類不合用於中學，所以把科目分類取消, 預設使用"中文"
						//<input name="u_subject" type="hidden" id="u_subject" value="中文">
				 ?>
                  <input name="submit" type=submit class="style8" value="確定新增">
                      <input name="back" type="button" class="style5" id="back" onClick="location.href='show.php?date=<?=$_GET[date]?>'" value="回上一頁">
                  </td>
                </tr>
              </table>
              <span style="font-weight: 400"><font size="4" face="萬用中特圓"></font></span></div></td>
          </tr>
        </table>
      </td>
    </tr>
</table>

</body>
</form>

</html>

