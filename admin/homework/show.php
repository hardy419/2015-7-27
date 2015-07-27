<?
session_start();

require("../../php-bin/function.php");

$year = substr($_GET[date],0,4);
$month = substr($_GET[date],5,2);
$day = substr($_GET[date],8,2);



$query="select * from tbl_class where class_name = '$_GET[classname]'";
$get_result = mysql_query($query,$link_id); 
$i =0;
while($get_rows=mysql_fetch_array($get_result,MYSQL_BOTH))
{
	$class[$i][id] = $get_rows[class_id];
	$class[$i][name] = $get_rows[class_name];
	$i++;
}

$color_array[0] = "#FFFFCC";
$color_array[1] = "#FFD7EB";
$color_array[2] = "#E6FF80";
$color_array[3] = "#CCFFFF";
$color_array[4] = "#FFE4CA";
$color_array[5] = "#E4E4E4";
?>
<html>
<head>
<title></title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<LINK REL="StyleSheet" TYPE="text/css" HREF="../../js/style.css">
</head>
<body>
<table width="650"  border="0" cellpadding="5" cellspacing="0">
  <tr>
    <td><table width="100%"  border="0" cellspacing="1" cellpadding="10">
      <tr>
        <td><font class=style8 color=red>
          <? if ($msg!="") echo "<br>".$msg; ?>
        </font></td>
      </tr>
    </table><br>
       
      <table width="100%" border="0" cellpadding="10" cellspacing="1" bgcolor="#CCCCCC" class="small">
        <tr bgcolor="ECECEC">
          <td colspan="2"><font class="subHead">
            <?=$_GET[classname]?>
班家課 -
<?=$month?>
月
<?=$day?>
日&nbsp;</font></td>
          <td><font class="subHead"> <a href="add_hw.php?date=<?=$_GET[date]?>&subjectid=<?=$get_rows_s[subject_id]?>&classname=<?=$_GET[classname]?>">新增</a></font></td>
          <?
for ($i =0; $i < count($class); $i++){
?>
          <?
}
?>
        </tr>
        <?
//$query_s="select * from tbl_subject WHERE TYPE = 'ALL' or  TYPE = 'HW'";
$query_s="select * from  tbl_homework  LEFT JOIN  tbl_subject  ON(tbl_homework.subject_id=tbl_subject.subject_name) 
WHERE ( tbl_subject.TYPE='ALL' or  tbl_subject.TYPE='HW' ) AND   tbl_homework.date='".$_GET[date]."'
AND  tbl_homework.class_id='$_GET[classname]' 
GROUP BY  tbl_subject.subject_name
ORDER BY tbl_homework.submit_date ASC, tbl_homework.subject_branch  ASC
";

$get_result_s = mysql_query($query_s,$link_id); 
$c = 0;
while ($get_rows_s=mysql_fetch_array($get_result_s,MYSQL_BOTH)){

//此引擎的小學科目分類不合用於中學，所以把科目分類取消,只 loop 第一個
if ($c>6) break;
?>
        <tr valign="top">

          <td width="10%" nowrap bgcolor="ECECEC" class="subHead">
            <?=$get_rows_s[subject_name]?>
</td>

          <?
		 
	for ($i =0; $i < count($class); $i++){
	
	
	
?>
          <td colspan="2" bgcolor="ECECEC">
            <table width="100%" border="0" cellpadding="5" cellspacing="1" bgcolor="ECECEC" class="small">
				<tr>
                      <td width="80" align="center" valign="top" bgcolor="#FFFFFF">科目分組</td>

                      <td align="left" valign="top" bgcolor="#FFFFFF">內容</td>
                      <td width="80" align="center" valign="top" bgcolor="#FFFFFF">繳交日期</td>
                      <td width="30" align="center" valign="top" bgcolor="#FFFFFF">刪除</td>
				</tr>
              <?
			  
		$class_name_sql = $class[$i][name];
		$subject_name_sql = $get_rows_s[subject_name];
		$query_l="SELECT * FROM `tbl_homework` WHERE `subject_id` = '$subject_name_sql' AND `date` = '$_GET[date]' AND `class_id` = '$class_name_sql'";

		$get_result_l = mysql_query($query_l,$link_id); 
		$list =0;
		while ($get_rows_l=mysql_fetch_array($get_result_l,MYSQL_BOTH))
		{
			$list++;
?>
              <tr title="<?=$get_rows_l[remark]?>">
				<td align="center" valign="top" bgcolor="#FFFFFF"><?=$get_rows_l[subject_branch]?></td>
				<td align="left" valign="top" bgcolor="#FFFFFF"><?=$get_rows_l[text]?></td>
				<td align="center" valign="top" bgcolor="#FFFFFF"><?=$get_rows_l[submit_date]?></td>
                <td align="center" valign="top" bgcolor="#FFFFFF"> 
<?
		if ($_SESSION[teacher_level] == 1 && $_SESSION[not_admin_cp] != 1)
		{
			?><a href="hw_delete.php?id=<?=$get_rows_l["homework_id"]?>&date=<?=$_GET[date]?>&classname=<?=$_GET[classname]?>" onClick="return confirm('你確定要刪除這筆資料嗎?')"><img src="../icons/del.gif" border=0></a><?
		}
		?>
              </tr>
		 <?			
		}
		
		for ($list; $list < 3 ; $list++)
		{
			?>
              <tr>
                <td bgcolor="#FFFFFF">&nbsp;</td>
                <td bgcolor="#FFFFFF">&nbsp;</td>
                <td bgcolor="#FFFFFF">&nbsp;</td>
                <td bgcolor="#FFFFFF">&nbsp;</td>
              </tr>
			<?
		}
		?>
          </table></td>
          <?
	}
?>
        </tr>
        <?
$c++;
}

?>
      </table></td>
  </tr>
</table>
</body>
</html>


