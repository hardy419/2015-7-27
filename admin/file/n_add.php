<?php
header("Content-Type:text/html;charset=utf-8"); 
// admin checking
require_once '../../admin.inc.php';

// Connect Database
require_once("../../php-bin/function.php");

// access control checking
//require_once("z_access_control.php");
$default_serial = 100;

$max_serial_res = mysql_query("SELECT `file_serial` FROM tbl_file ORDER BY `file_serial` DESC LIMIT 1");

if($max_serial_row=mysql_fetch_object($max_serial_res)){
	$default_serial = $max_serial_row->file_serial;
}



?><html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<title></title>
    <style type="text/css">
<!--
.style2 {color: #006699}
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



function Submit_Form()
{
	Err_Msg_Ary = [];
	if( document.form1.n_title.value == ""  )
		Err_Msg_Ary[Err_Msg_Ary.length] = "請填寫標題";

	if( !isNumeric(document.form1.date_day.value) || !isNumeric(document.form1.date_month.value) || !isNumeric(document.form1.date_year.value) || !CheckDay( document.form1.date_day.value|0, document.form1.date_month.value|0, document.form1.date_year.value|0 ) )
		Err_Msg_Ary[Err_Msg_Ary.length] = "請填寫正確的日期";

	//if( !isNumeric(document.form1.date_day2.value) || !isNumeric(document.form1.date_month2.value) || !isNumeric(document.form1.date_year2.value) || !CheckDay( document.form1.date_day2.value|0, document.form1.date_month2.value|0, document.form1.date_year2.value|0 ) )
		//Err_Msg_Ary[Err_Msg_Ary.length] = "請填寫正確的有效日期";

	if( Err_Msg_Ary.length > 0 )
	{
		alert(Err_Msg_Ary.join("\n"));
		return false;
	}
	return true;
}

</script>

<body>
	<img src="admin_label.gif" width="500" height="35"><BR>

	<table width="800" border="0" cellpadding="5" cellspacing="0" class="table1">
		<tr>
			<td>
				<table width="100%" border="0" cellpadding="5" cellspacing="1" class="small">
					<tr align="left" valign="top" bgcolor="#FFFFFF">
						<td width="30%"><span class="style2"><span class="subHead">網上檔案總管</span>：</span>&nbsp;</td>
						<td width="20%"><a href="n_search.php">尋找</a></td>
						<td width="20%">
							<a href="n_add.php">新增</a></td>
                             <td><a href="n_type_update.php"></a></td>
					</tr>
				</table>
			</td>
		</tr>

		<tr><td><hr style="height:1px;color=ECECEC;"></td></tr>

		<tr>
			<td valign="top">
				<table width="100%" border="0" align="left" cellpadding="10" cellspacing="1" bgcolor="CCCCCC" class="admin_maintain_form_table">
					<form name="form1" method="post" action="n_add_process.php" enctype="multipart/form-data" onSubmit="return Submit_Form()">
						<tr bgcolor="ECECEC">
							<td colspan="2" class="subHead">新增</td>
						</tr>
						<tr>
							<td width="19%" height="18" bgcolor="ECECEC"><font class="style8">&nbsp;類別 :</font></td>

							<td width="81%" height="18" bgcolor="FFFFFF"><select name="n_type" id="n_type" >
                              <!--<option value="0" selected>全部</option>-->
                              <?php
$type_sql=" SELECT * FROM    tbl_access_control_detail  AS d 
LEFT JOIN   tbl_file_type  AS  f  ON(	d.category_id=f.type_id )
WHERE
	d.teacher_id=".$_SESSION["kw_admin_user_id"]."  AND
	d.cms_category=".$File_cms_category."  
ORDER BY   f.type_order ASC ";
$type_result=mysql_query($type_sql, $link_id);

while( $type_Obj=mysql_fetch_object($type_result) )
{
	if( $type_Obj->type_id == $type )
		echo '<option value="' . $type_Obj->type_id . '" selected>' . $type_Obj->type_name . '</option>';
	else
		echo '<option value="' . $type_Obj->type_id . '">' . $type_Obj->type_name . '</option>';
}

?>
                          </select></td>
						</tr>

        <tr bgcolor="FFFFFF">
          <td width="19%" height="18" bgcolor="ECECEC"><font class="style8">&nbsp;序號:</font></td>
          <td width="81%" height="18"><font class="style8">
            <input name="n_serial" type="text" size="10" maxlength="10" value="<?php echo $default_serial;?>">
          </font></td>
        </tr>

						<tr>
							<td height="18" bgcolor="ECECEC"><font class="style8">開始日期:</font></td>
							<td height="18" bgcolor="FFFFFF"><font class="style8"> 
<input name="date_year" id="date_year" type="text" size="4" maxlength="4" class="style8" value="<?php echo substr($file_date, 0,4)?>">
 - 
<input name="date_month" id="date_month" type="text" size="2" maxlength="2" class="style8" value="<?php echo substr($file_date, 5,2)?>">
 - 
<input name="date_day" id="date_day" type="text" size="2" maxlength="2" class="style8" value="<?php echo substr($file_date, 8,2)?>">
 &nbsp;<img src="../../images/calendar.gif" alt="calendar" border="0" onClick="showCalendar('date_year','date_day','date_month','date_year','d m y')">&nbsp; YYYY-MM-DD </font></td>
						</tr>

						<tr>
							<td height="18" bgcolor="ECECEC"><font class="style8"> &nbsp;標題 :</font></td>
							<td height="18" bgcolor="FFFFFF"><font class="style8"> <input type="text" name="n_title" id="n_title" value="" size="40"> </font></td>
						</tr>

						<tr>
							<td height="18" bgcolor="ECECEC"><font class="style8"> &nbsp;描述 :</font></td>
						  <td height="18" bgcolor="FFFFFF"><?php 		
                                $content6 = fck_editor('n_content','Normal');
                                
                                echo $content6;
                                ?></td>
						</tr>

						<tr bgcolor="FFFFFF">
							<td height="18" bgcolor="ECECEC">相關連結名稱:</td>
							<td height="18"><input name="n_link_text" type="text" id="n_link_text" size="40"></td>
						</tr>

						<tr bgcolor="FFFFFF">
							<td height="18" bgcolor="ECECEC">相關連結網址:</td>
							<td height="18"><input name="n_link_url" type="text" id="n_link_url" value="http://" size="40"></td>
						</tr>

						<tr bgcolor="FFFFFF">
							<td height="18" bgcolor="ECECEC">在新視窗開啟相關連結:</td>
							<td height="18"><input name="n_new_window" type="radio" value="1" checked> 是 <input name="n_new_window" type="radio" value="0"> 否</td>
						</tr>

						<tr>
							<td height="18" bgcolor="ECECEC">圖片:</td>
							<td height="18" bgcolor="FFFFFF"><input type="file" name="n_photo" id="n_photo"></td>
						</tr>

						<tr>
							<td height="18" bgcolor="ECECEC">附件:</td>
							<td height="18" bgcolor="FFFFFF"><input type="file" name="n_file" id="n_file"></td>
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