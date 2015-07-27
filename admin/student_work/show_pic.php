<? 
$imgWidth="90";
if ($get_r_rows != null){ ?> 
	<a href="view_pic.php?id=<?=$get_r_rows["study_record_id"]?>&class_id=<?=$_GET[class_id]?>&student=<?=$_GET[student]?>&subjectid=<?=$_GET[subjectid]?>&year=<?=$_GET[year]?>">
	<img src="../../userUpload/attachment/small/<?=$get_r_rows[FileName]?>" border="0" width="<?=$imgWidth?>" alt="點擊觀看詳細資料">
	</a> 
	<? 	if ($_SESSION[admin_level]== 1){ ?>
	<br>
	<a href="file_edit.php?id=<?=$get_r_rows["study_record_id"]?>&class_id=<?=$_GET[class_id]?>&student=<?=$_GET[student]?>&subjectid=<?=$_GET[subjectid]?>&year=<?=$_GET[year]?>">修改</a>
	<font color="#999999">&nbsp;&nbsp;|&nbsp;&nbsp;</font>
	<a href="file_delete.php?id=<?=$get_r_rows["study_record_id"]?>&class_id=<?=$_GET[class_id]?>&student=<?=$_GET[student]?>&subjectid=<?=$_GET[subjectid]?>&year=<?=$_GET[year]?>" onClick="return confirm('當你刪除這份功課時，所有有關這份功課的留言都會同時刪除，確認嗎?')">刪除</a>
	<? }?>
<? }?>
