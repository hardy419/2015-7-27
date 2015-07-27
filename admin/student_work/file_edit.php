<?
session_start();


require("../../php-bin/function.php");


	$query="select * from tbl_study_record where study_record_id = '$_GET[id]'";
	$get_result = mysql_query($query,$link_id); 
	$get_rows=mysql_fetch_array($get_result,MYSQL_BOTH);

?>
<html>
<head>
<title>admin</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<LINK REL="StyleSheet" TYPE="text/css" HREF="../../js/style.css">
<style type="text/css">
<!--
.style2 {color: #006699}
.style5 {color: #666666}
-->
</style>
</head>
<form action="file_edit_process.php?id=<?=$_GET[id]?>&class_id=<?=$_GET[class_id]?>&subjectid=<?=$_GET[subjectid]?>" method="post" enctype="multipart/form-data" name="form2">
<body>
<img src="admin_label.gif" width="500" height="35">
<table width="650" border="0" cellspacing="0" cellpadding="5">
  <tr>
    <td><table width="100%"  border="0" cellspacing="1" cellpadding="10">
      <tr>
        <td><font class=style8 color=red>
          <? if ($msg!="") echo "<br>".$msg; ?>
        </font></td>
      </tr>
    </table>
      <br>
      <table width="100%" border="0" cellpadding="10" cellspacing="1" bgcolor="CCCCCC" class="small">
        <tr bgcolor="ECECEC">
          <td colspan="2" class="subHead">修改學生作品</td>
        </tr>
        <tr>
          <td bgcolor="ECECEC">作品名稱:</td>
          <td bgcolor="FFFFFF"><input name="name" type="text" size="40" value="<?=$get_rows[name]?>"></td>
        </tr>
        <tr>
          <td valign="top" bgcolor="ECECEC">作品描述:</td>
          <td bgcolor="FFFFFF"><textarea name="desc" cols="40" rows="5"><?=$get_rows[desc]?></textarea></td>
        </tr>
        <tr>
          <td valign="top" bgcolor="ECECEC">作品短評:</td>
          <td bgcolor="FFFFFF"><textarea name="t_desc" cols="40" rows="5"><?=$get_rows[t_desc]?></textarea></td>
        </tr>
        <tr>
          <td valign="top" bgcolor="ECECEC">年份:</td>
          <td bgcolor="#FFFFFF"><input name="year" type="text" id="year" value="<?=$get_rows[year];?>" size="5" maxlength="4"></td>
        </tr>
        <tr>
          <td valign="top" bgcolor="ECECEC">最新消息:</td>
          <td bgcolor="#FFFFFF"><input name="is_news" type="radio" value="Y" <? if($get_rows[is_news]=='Y') { echo "checked"; } ?>>
            是
              <input name="is_news" type="radio" value="N" <? if($get_rows[is_news]=='N') { echo "checked"; } ?>>
          否 </td>
        </tr>
        <tr>
          <td valign="top" bgcolor="ECECEC">類別:</td>
          <td bgcolor="#FFFFFF">
		  <select name="web_type" id="web_type">
          <?
			require_once("../../php-bin/get_web_type_selection.php");
			$type_selected = $get_rows[web_type];
		    require_once("../../php-bin/get_web_type_select_html.php");
          ?>
		  </select>
		  </td>
        </tr>
        <tr>
          <td bgcolor="ECECEC">档案尺寸:</td>
          <td bgcolor="FFFFFF">4:3<input name="file_size_type" type="radio" <?php if($get_rows['file_size_type']=='A')echo 'checked'; ?> value="A" >4:6<input name="file_size_type" type="radio" value="B"  <?php if($get_rows['file_size_type']=='B')echo 'checked'; ?>></td>
        </tr>
        <tr>
          <td valign="top" bgcolor="ECECEC">&nbsp;</td>
          <td bgcolor="ECECEC"><input name="Submit" type="submit" id="Submit" value="    確定修改    ">
              <input name="reset2" type="reset" id="reset" value="重設"></td>
        </tr>
        <tr bgcolor="FFFFFF">
          <td colspan="2"><img src="../../userUpload/attachment/<?=$get_rows[FileName]?>" border="0" width="600"></td>
        </tr>
        <!--
    <tr>
      <td valign="top">上載檔案:</td>
      <td><input type="file" name="file"></td>
    </tr>-->
      </table>
      <br>
      <table width="100%"  border="0" cellspacing="1" cellpadding="10">
        <tr>
          <td><font class=style8 color=red> <a href="main.php?student=<?=$get_rows[student_id]?>&class_id=<?=$_GET[class_id]?>&subjectid=<?=$_GET[subjectid]?>&year=<?=$_GET[year]?>">回上一頁</a> </font></td>
        </tr>
      </table></td>
  </tr>
</table>
</body>
</form>
</html>