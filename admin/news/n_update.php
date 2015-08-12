<?php
header("Content-Type:text/html;charset=utf-8"); 
// admin checking
require_once '../../admin.inc.php';

// Connect Database
require_once("../../php-bin/function.php");

// access control checking
require_once("z_access_control.php");





$file_id = $_GET['id']|0;
$file_type_id = 0;
$file_date = "";
$file_exp_date = "";

$file_title = "";
$file_serial = "";
$file_content = "";

$file_link_text = "";
$file_link_url = "";
$file_link_new_window = "";

$file_file_name = "";


$search_SQL = " SELECT  *   FROM  tbl_chancellor   WHERE  file_id=".$file_id;
$search_Result = mysql_query( $search_SQL, $link_id );

if( $search_Obj=mysql_fetch_object($search_Result) )
{

	//access_detail_check( $search_Obj->file_type_id );

	$file_type_id = $search_Obj->file_type_id;
	$file_date = $search_Obj->file_date;
	$file_exp_date = $search_Obj->file_exp_date;
	
	$file_title = $search_Obj->file_title;
	$file_serial = $search_Obj->file_serial;
	$file_content = $search_Obj->file_content;
	
	$file_link_text = $search_Obj->file_link_text;
	$file_link_url = $search_Obj->file_link_url;
	$file_link_new_window = $search_Obj->file_link_new_window;
	
	$file_photo = $search_Obj->file_photo;
	$file_file_name = $search_Obj->file_file_name;
	
	$SQL = "SELECT  *  FROM tbl_chancellor_type where type_id=".$file_type_id;
	$Result = mysql_query( $SQL,$link_id);
	if ( ! $Result )
		$msg = str_replace(" ", "+", "Query failed: " . mysql_error($link_id));
	$obj=mysql_fetch_object($Result);
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
<script charset="utf-8" src="../kindeditor/kindeditor-min.js" type="text/javascript"></script>
<script charset="utf-8" src="../kindeditor/lang/zh_CN.js"></script>
<body>
	<p class="title"><?php echo $obj->type_name;?></p><BR>
<form name="form1" method="post" action="n_update_process.php" enctype="multipart/form-data" onSubmit="return Submit_Form()">
	<table width="800" border="0" cellpadding="5" cellspacing="0" class="table1">
		
        <tr bgcolor="FFFFFF">
          <td width="19%" height="18" bgcolor="ECECEC"><font class="style8">&nbsp;序號:</font></td>
          <td width="81%" height="18"><font class="style8">
            <input name="n_serial" type="text" size="10" maxlength="10" value="<?php echo $file_serial?>">
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
							<td height="18" bgcolor="FFFFFF"><font class="style8"> <input type="text" name="n_title" id="n_title" value="<?php echo $file_title?>" size="40"> </font></td>
						</tr>

						<tr>
							<td height="18" bgcolor="ECECEC"><font class="style8"> &nbsp;描述 :</font></td>
							<td height="18" bgcolor="FFFFFF">

                    <textarea name="n_content" id="n_content" cols="60" style="width: 670px; height: 300px;"><?php echo $file_content?></textarea>
                                </td>
						</tr>

					

						<tr>
							<td height="18" bgcolor="ECECEC">圖片:</td>
							<td height="18" bgcolor="FFFFFF">
							<?php
							if( $file_photo )
							{
								echo '<BR><font color=red>(你目前已上載檔案 <a href="n_delete.php?id='. $file_id .'&action=3" onClick="return confirm(\'你確定要刪除這幅圖片嗎?\')" >刪除圖片</a> )</font><BR><a href="../../file_download/'.$file_photo.'" target="_blank"><img src="../../file_download/thumb'.$file_photo.'" border="0" /></a>';
							}else{
							?>
							                     <input type="file" name="n_photo" id="n_photo" style="display:none" onChange="document.form1.link_pic1.value=this.value">
							                     <input name="link_pic1" type="text" id="link_pic1" size="38" value=""><input type="button" size="20" value="瀏覽文件" onClick="document.form1.n_photo.click();">
							<?php
							}
							?>
						</td>
						</tr>

						<tr>
							<td height="18" bgcolor="ECECEC">附件:</td>
							<td height="18" bgcolor="FFFFFF">
			                     <input type="file" name="n_file" id="n_file" style="display:none" onChange="document.form1.link_pic1.value=this.value">
			                     <input name="link_pic1" type="text" id="link_pic1" size="38" value=""><input type="button" size="20" value="瀏覽文件" onClick="document.form1.n_file.click();">
								<?php
								if( $file_file_name!='' && file_exists("../../file_download/".$file_file_name) )
								{
									echo '<BR><font color=red>(你目前已上載檔案 <a href="n_delete.php?id='. $file_id .'&action=2" onClick="return confirm(\'你確定要刪除這檔案嗎?\')" >刪除檔案</a> )</font><BR><a href="../../file_download/'.$file_file_name.'" target="_blank">下載</a>';
								}
								?>
					       </td>
						</tr>

						<tr bgcolor="ECECEC">
							<td><input type="hidden" name="n_id" id="n_id" value="<?php echo $file_id?>"><input type="hidden" name="n_type_id" id="n_type_id" value="<?php echo $file_type_id;?>"></td>
							<td><font class="style8"> <input type="submit" value="    確定更新    "> &nbsp; <input type="reset" value="重設"> &nbsp; <input type="button" onClick="history.go(-1)" value="返回"></font></td>
						</tr>
					
				</table></td>
		</tr>
</table></form>
<script language="javascript">
KindEditor.options.filterMode = false;
        KindEditor.ready(function(K) {
                window.editor = K.create('#n_content');
        });
</script>
</body>
</html>
<?php
mysql_close();
?>