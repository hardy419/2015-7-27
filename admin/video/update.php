<?php

// admin checking
require_once("../../admin.inc.php");

// Connect Database
require_once("../../php-bin/function.php");

// access control checking
require_once("z_access_control.php");

require("config.php");

$id = $_GET['id']|0;
$title = "";
$video = "";
$picture="";

$search_SQL = "SELECT * FROM tbl_video WHERE id = ".$id;
$search_Result = mysql_query( $search_SQL, $link_id );

if ($search_Obj=mysql_fetch_object($search_Result)) {
	$category_id = $search_Obj->category_id;
	$date = $search_Obj->date;
	$title = $search_Obj->title;
	$video = $search_Obj->video;
	$picture = $search_Obj->picture;
}


?><html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<title></title>
    <style type="text/css">
<!--
.style2 {color: #006699}
.style4 {font-size: 12px}
.style6 {
	font-size: 12px;
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

<link rel="stylesheet" href="../../js/style.css" type="text/css">

<script language="javascript" defer>

function Submit_Form() {

	Convert();
	
	Err_Msg_Ary = [];

	if(document.form1.title.value == "")
		Err_Msg_Ary[Err_Msg_Ary.length] = "請填寫主題";

	if( Err_Msg_Ary.length > 0 ) {
		alert(Err_Msg_Ary.join("\n"));
		if(document.form1.title.value == "")
			document.form1.title.focus();
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

							<td width="20%">
								<a href="add.php">新增</a></td>
						</tr>
					</table>
			</td>
		</tr>
		<tr><td><hr style="height:1px;color=ECECEC;"></td></tr>
		<tr>
			<td valign="top">
				<table width="100%" border="0" align="left" cellpadding="10" cellspacing="1" bgcolor="CCCCCC" class="admin_maintain_form_table">
					<form name="form1" method="post" action="update_process.php" enctype="multipart/form-data" onSubmit="return Submit_Form()">
						<tr bgcolor="ECECEC">
							<td colspan="2" class="subHead">更新</td>
						</tr>
<tr>
							<td width="29%" height="18" bgcolor="ECECEC"><font class="style8"> &nbsp;日期 :</font></td>
							<td height="18" bgcolor="FFFFFF"><font class="style8"> 
<input name="date_year" id="date_year" type="text" size="4" maxlength="4" class="style8" value="<?php echo substr($date, 0,4)?>" readonly="">
 - 
<input name="date_month" id="date_month" type="text" size="2" maxlength="2" class="style8" value="<?php echo substr($date, 5,2)?>" readonly="">
 - 
<input name="date_day" id="date_day" type="text" size="2" maxlength="2" class="style8" value="<?php echo substr($date, 8,2)?>" readonly="">
 &nbsp;<img src="../icons/calendar.gif" alt="calendar" width="16" height="16" border="0" onClick="showCalendar('date_year','date_day','date_month','date_year','d m y')">&nbsp; YYYY-MM-DD </font></td>
						</tr>
<tr height="25">
  <td bgcolor="ECECEC"><font class="style8">分類:</font></td>
  <td bgcolor="FFFFFF"><label>
    <select name="category_id" id="category_id">
      <option value="1" <?php if(1==$category_id):?>selected<?php endif;?>>校園短片</option>
      <option value="2" <?php if(2==$category_id):?>selected<?php endif;?>>生態直播</option>
    </select>
  </label></td>
</tr>
						<tr>
							<td width="29%" height="18" bgcolor="ECECEC"><font class="style8">主題 :</font></td>
							<td height="18" bgcolor="FFFFFF"><font class="style8"> <input type="text" name="title" id="title" value="<?php echo $title?>" size="40" maxlength="255"> <font color="#FF0000">* </font></font></td>
						</tr>
						<tr>
                          <td height="18" bgcolor="ECECEC"><font class="style8"> 電影名稱 :</font></td>
                          <td height="18" bgcolor="FFFFFF"><font class="style8">
                            <input type="text" name="video" id="video" value="<?php echo $video?>" size="40" maxlength="255">
                            &nbsp;&nbsp;
                            <span class="style6">請先行上載檔案到FTP </span> </font></td>
					  </tr>
						<tr>
						  <td height="18" bgcolor="ECECEC"><font class="style8"> 預視圖片 :</font></td>
						  <td height="18" bgcolor="FFFFFF"><font class="style8">
						    <input type="text" name="picture" id="picture" value="<?php echo $picture?>" size="40" maxlength="255">
						    &nbsp;&nbsp; <span class="style6">請先行上載檔案到FTP </span></font></td>
					  </tr>

						<tr bgcolor="ECECEC">
							<td><input type="hidden" name="id" id="id" value="<?php echo $id?>"></td>
							<td><font class="style8"> <input type="submit" value="    確定更新    "> &nbsp; <input type="reset" value="重設"> &nbsp; <input type="button" onClick="history.go(-1)" value="返回"></font></td>
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