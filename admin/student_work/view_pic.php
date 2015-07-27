<?
session_start();


require("../../php-bin/function.php");


	$query="select ts.student_name, tsr.* ,tc.class_name ,tc.class_id from tbl_study_record tsr, tbl_student ts, tbl_class tc where tsr.study_record_id = '$_GET[id]' and tsr.student_id = ts.student_id and ts.class_id = tc.class_id";
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
<body>
<img src="admin_label.gif" width="500" height="35">
<table width="650" border="0" cellspacing="0" cellpadding="5">
  <tr>
    <td>
	<table width="100%" border="0" cellpadding="10" cellspacing="1" bgcolor="#CCCCCC" class="small">
	  <tr bgcolor="ECECEC">
        <td colspan="2" class="subHead">作品詳細資料<? if ( $get_rows[is_news] == 'Y') { echo " ( 最新消息 ) "; } ?></td>
	    </tr>
  <?  
$desc = ereg_replace("\n","<BR>",$get_rows[desc]);
$t_desc = ereg_replace("\n","<BR>",$get_rows[t_desc]);
?>
  <tr>
    <td bgcolor="ECECEC">班別:</td>
    <td bgcolor="FFFFFF">
      <?=$get_rows[class_name]?>
    </td>
  </tr>
  <tr>
    <td bgcolor="ECECEC">學生姓名:</td>
    <td bgcolor="FFFFFF">
      <?=$get_rows[student_name]?>
	</td>
  </tr>
  <tr> 
    <td width="15%" bgcolor="ECECEC">作品名稱:</td>
    <td width="85%" bgcolor="FFFFFF"> 
      <?=$get_rows[name]?>
</td>
  </tr>
  <tr> 
    <td valign="top" bgcolor="ECECEC">作品描述:</td>
    <td bgcolor="FFFFFF"> 
      <?=$desc?>
    </td>
  </tr>
  <tr> 
    <td valign="top" bgcolor="ECECEC">作品短評:</td>
    <td bgcolor="FFFFFF"> 
      <?=$t_desc?>
    </td>
  </tr>
  <tr bgcolor="FFFFFF"> 
    <td colspan="2"><img src="../../userUpload/attachment/<?=$get_rows[FileName]?>" border="0" width="600"></td>
  </tr>


</table>
    <br>
    <a name="view"></a>
<?
$query="select * from tbl_study_message where study_record_id = '$_GET[id]' and `guest_id` = '$get_rows[student_id]' AND `guest_type` = 'S' order by guest_time ASC ";
$get_result_1 = mysql_query($query,$link_id); 
$r_record = mysql_num_rows($get_result_1);
if ($r_record>0) { ?>
<table width="100%" border="0" cellpadding="10" cellspacing="1" bgcolor="#CCCCCC" class=small>
<tr bgcolor="ECECEC"> 
<td colspan="2" class="subHead">自我評審</td>
</tr>
	<? while ($get_rows_1=mysql_fetch_array($get_result_1,MYSQL_BOTH)){ ?>  
	<tr valign="top" bgcolor="#FFFFFF"> 
	<td width="20%" bgcolor="#ECECEC">
		<?
			if ($get_rows_1[guest_email]=='')
				echo $get_rows_1[guest_name];
			else
				echo "<a href=\"mailto:$get_rows_1[guest_email]\">$get_rows_1[guest_name]</a>";
		?>
	</td>
	<td bgcolor="#FFFFFF"><?=ereg_replace("\n","<BR>",$get_rows_1[guest_text])?>
	<div align="right"><br>
	<br>
	<?=$get_rows_1[guest_time]?>
	<? if ($_SESSION[admin_level]== 1){ ?>
	<a href="post_delete.php?id=<?=$get_rows_1["study_message_id"]?>&rid=<?=$_GET[id]?>" onClick="return confirm('確認刪除這個文章嗎?')">刪除</a>
	<? } ?>      
</div></td>
</tr>
<? } ?>
</table>
<br>
<? } ?>
<?
$query="select * from tbl_study_message where study_record_id = '$_GET[id]' and `guest_type` = 'T' order by guest_time ASC ";
$get_result_2 = mysql_query($query,$link_id); 
$r_record = mysql_num_rows($get_result_2);
if ($r_record>0) {
?>
<br>
<table width="100%" border="0" cellpadding="10" cellspacing="1" bgcolor="#CCCCCC" class=small>
  <tr bgcolor="ECECEC"> 
    <td colspan="2" class="subHead">老師意見</td>
  </tr>
<?
while ($get_rows_2=mysql_fetch_array($get_result_2,MYSQL_BOTH)){
?>  
  <tr valign="top" bgcolor="#FFFFFF"> 
    <td width="20%" bgcolor="#ECECEC">
		<?
			if ($get_rows_2[guest_email]=='')
				echo $get_rows_2[guest_name];
			else
				echo "<a href=\"mailto:$get_rows_2[guest_email]\">$get_rows_2[guest_name]</a>";
		?>
	</td>
    <td bgcolor="#FFFFFF"><?=ereg_replace("\n","<BR>",$get_rows_2[guest_text])?>
      <div align="right"><br>
          <br>
          <?=$get_rows_2[guest_time]?>
          <? if ($_SESSION[admin_level]== 1){ ?>
          <a href="post_delete.php?id=<?=$get_rows_2["study_message_id"]?>&rid=<?=$_GET[id]?>" onClick="return confirm('確認刪除這個文章嗎?')">刪除</a>
         <? } ?>
      </div></td>
  </tr>
<? } ?>
</table>
<? } ?>


<?
$query="select * from tbl_study_message where study_record_id = '$_GET[id]' and `guest_id` != '$get_rows[student_id]' AND `guest_type` = 'S' order by guest_time ASC ";
$get_result_3 = mysql_query($query,$link_id); 
$r_record = mysql_num_rows($get_result_3);
if ($r_record>0) {
?>
<br>
<table width="100%" border="0" cellpadding="10" cellspacing="1" bgcolor="#CCCCCC" class=small>
  <tr bgcolor="ECECEC"> 
    <td colspan="2" class="subHead">同學意見</td>
  </tr>
<?

while ($get_rows_3=mysql_fetch_array($get_result_3,MYSQL_BOTH)){
?>  
  <tr valign="top" bgcolor="#FFFFFF"> 
    <td width="20%" bgcolor="#ECECEC">
		<?
			if ($get_rows_3[guest_email]=='')
				echo $get_rows_3[guest_name];
			else
				echo "<a href=\"mailto:$get_rows_3[guest_email]\">$get_rows_3[guest_name]</a>";
		?>
	</td>
    <td bgcolor="#FFFFFF"><?=ereg_replace("\n","<BR>",$get_rows_3[guest_text])?>
      <div align="right"><br>
          <br>
          <?=$get_rows_3[guest_time]?>
          <? if ($_SESSION[admin_level]== 1){ ?>
          <a href="post_delete.php?id=<?=$get_rows_3["study_message_id"]?>&rid=<?=$_GET[id]?>" onClick="return confirm('確認刪除這個文章嗎?')">刪除</a>
          <? } ?>
      </div></td>
  </tr>
<? } ?>
</table>
<? } ?>
<br>
<?
if ($_SESSION[sysname] !=""){
?>
<hr style="height:1px;color=ECECEC;">
<a name="post"></a>

  <table width="100%" border="0" cellpadding="10" cellspacing="1" bordercolor="#CCCCCC" bgcolor="#CCCCCC" class=small>
   
   <form name="form1" method="post" action="view_pic_add.php">
   <input type="hidden" name="returnURL" value="view_pic.php?id=<?=$_GET["id"]?>&class_id=<?=$_GET[class_id]?>&student=<?=$_GET[student]?>&subjectid=<?=$_GET[subjectid]?>">
    <tr bgcolor="#ECECEC"> 
      <td colspan="2" class="subHead">發表意見</td>
    </tr>
    <tr> 
      <td width="15%" bgcolor="ECECEC">姓名:</td>
      <td bgcolor="#FFFFFF"><?=$_SESSION[sysname]?> <input type="hidden" name="name" value="<?=$_SESSION[sysname]?>"><input type="hidden" name="study_record_id" value="<?=$get_rows[study_record_id]?>"><input type="hidden" name="id" value="<?=$_SESSION[id]?>">
      <?
      if ($_SESSION[teacher_level] == 1){
      ?>
      <input type="hidden" name="type" value="T">
      <?
      }
      else{
      ?>
      <input type="hidden" name="type" value="S">      
      <?
      }
      ?>
      </td>
    </tr>
    <tr> 
      <td bgcolor="ECECEC">內容:</td>
      <td bgcolor="#FFFFFF"><textarea name="text" cols="40" rows="5"></textarea></td>
    </tr>
    <tr> 
      <td bgcolor="ECECEC">&nbsp;</td>
      <td bgcolor="ECECEC"><input type="submit" name="Submit" value="    確定發表    "> 
        <input type="reset" name="reset" value="重設"></td>
    </tr>
	</form>
  </table>
  <br>
  <?
}
?>
  <br>

<table width="100%"  border="0" cellspacing="1" cellpadding="10">
  <tr>
    <td><font class=style8 color=red> <a href="main.php?student=<?=$get_rows[student_id]?>&class_id=<?=$_GET[class_id]?>&subjectid=<?=$_GET[subjectid]?>&year=<?=$_GET[year]?>">回上一頁</a></font></td>
  </tr>
</table>
</td>
  </tr>
</table>
<br>

</body>
</html>