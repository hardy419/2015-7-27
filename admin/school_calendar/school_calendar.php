<?php
	require("../../php-bin/function.php");
	
	if (isset($_GET['act']) == "del" && isset($_GET['file']) != ''){
		unlink("../../userUpload/pdf/". $get_rows['file_name']);
		
		$sql = "update `tbl_school_calendar` SET `file_name` = '' WHERE id = '1'";
		mysql_query($sql,$link_id); 
		$_GET['msg'] = '刪除成功！';
	}
	
	$sql = "SELECT `file_name` FROM `tbl_school_calendar` WHERE id = '1'";
	$result = mysql_query($sql,$link_id); 
	$get_rows = mysql_fetch_array($result);
?>

<html>
<head>
<title>行事曆</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">

<link rel="stylesheet" href="../../js/style.css" type="text/css">
<LINK rel="stylesheet" href="../../js/calendar.css" type="text/css">
<script LANGUAGE="JavaScript" src="../../js/calendarevents.js" type="text/javascript"></script>
<script LANGUAGE="JavaScript" src="../../js/calendar.js" type="text/javascript"></script>
<script LANGUAGE="JavaScript" src="../../js/calendar-en.js" type="text/javascript"></script>
<style type="text/css">
<!--
.style1 {font-size: 4px}
-->
</style>
<form name="form1" method="post" action="school_calendar_process.php" enctype="multipart/form-data">
<body>
<img src="admin_label.png" width="500" height="35"><br>
<table width="840" border="0" cellpadding="5" cellspacing="0" class="table1">
    <tr> 
      <td  valign="top">
		  <table width="100%"  border="0" align="left" cellpadding="10" cellspacing="1" bgcolor="CCCCCC" class="admin_maintain_form_table">
			<tr bgcolor="ECECEC">
			  <td colspan="2" style="color:red">&nbsp;
				<?php if(isset($_GET['msg'])){ 
						$msg = $_GET['msg'];
						switch($msg){
							case '100':
								echo '上載成功！';break;
							case '101':
								echo '網絡繁忙，請稍後重試';break;
							case '201':
								echo '上載文件格式錯誤，只可上載PDF格式文件！';break;
							case '301':
								echo '文件大小不得超過2MB';break;
							default:
								echo $msg;
						}
					  } ?>
			  </td>
			</tr>
			 <tr class="small">
			  <td bgcolor="ECECEC">&nbsp;PDF上載:</td>
			  <td bgcolor="#FFFFFF">
				<input name="file_pdf" type="file" id="file_pdf" >
				<?php if(!empty($get_rows['file_name'])){ ?>
					<P><a href='../../userUpload/pdf/<?php echo $get_rows['file_name']; ?>'>點擊查看PDF</a> | <a onClick="return confirm('你確定要刪除這份檔案嗎?')" href='?act=del&file=<?php echo $get_rows['file_name']; ?>'>刪除</a></p>
				<?php } ?>
			  </td>
			</tr>
			<tr bgcolor="ECECEC">
			  <td><font class="style8">&nbsp; </font></td>
			  <td><font class="style8">
				<input type="submit" name="Submit" value="    確定新增    ">
				<input type="reset" name="reset" value="重設">
				<button type='button' onclick='javascript:history.go(-1)'>返回</button>
			  </font></td>
			</tr>
		  </table>
	  </td>
	  <td valign='top'>
		<div style='width:200px;'>
			<table border="0" cellpadding="5" cellspacing="0">
				<tr>
					<td colspan='2'><span style='color:#0000FF;'>提示：</span></td>
				</tr>
				<tr>
					<td valign='top'><span style='color:red;'>*</span></td>
					<td>如果文件為空，前台將隱藏"校曆表"該欄目</td>
				</tr>
			</table></div>
	  </td>
    </tr>
  </table>
</body>
</form>
</html>
