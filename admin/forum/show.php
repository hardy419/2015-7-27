<?
session_start();

require("../../php-bin/function.php");

$month = substr($_GET[date],5,2);
$day = substr($_GET[date],8,2);



$query="select * from tbl_class where class_name = '$_GET[classname]'";
$get_result = mysql_query($query,$link_id); 
$i =0;
while ($get_rows=mysql_fetch_array($get_result,MYSQL_BOTH)){
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
    </table>
      <br>
       
      <table width="100%" border="0" cellpadding="10" cellspacing="1" bgcolor="#CCCCCC" class="small">
        <tr bgcolor="ECECEC">
          <td colspan="2"><font class="subHead">
            <?=$_GET[classname]?>
班家課 -
<?=$month?>
月
<?=$day?>
日</font></td>
          <?
for ($i =0; $i < count($class); $i++){
?>
          <?
}
?>
        </tr>
        <?
$query_s="select * from tbl_subject WHERE TYPE = 'ALL' or  TYPE = 'HW'";
$get_result_s = mysql_query($query_s,$link_id); 
$c = 0;
while ($get_rows_s=mysql_fetch_array($get_result_s,MYSQL_BOTH)){

//此引擎的小學科目分類不合用於中學，所以把科目分類取消,只 loop 第一個
if ($c>0) break;
?>
        <tr valign="top">
		<!--
          <td width="10%" nowrap bgcolor="ECECEC" class="subHead">
            <? //$get_rows_s[subject_name]?>
</td>
-->
          <?
		 
	for ($i =0; $i < count($class); $i++){
	
	
	
?>
          <td bgcolor="ECECEC">
            <div align="right"><span class="subHead">
              <?	if ($_SESSION[teacher_level] == 1 && $_SESSION[not_admin_cp] != 1){ ?>              
              <a href="add_hw.php?date=<?=$_GET[date]?>&subjectid=<?=$get_rows_s[subject_id]?>&classname=<?=$_GET[classname]?>">新增</a>&nbsp;&nbsp;
              <? 	} ?>
              </span>
            </div>
            <table width="100%" border="0" cellpadding="5" cellspacing="1" bgcolor="ECECEC" class="small">
              <?
			  
		$class_name_sql = $class[$i][name];
		$subject_name_sql = $get_rows_s[subject_name];
		$query_l="SELECT * FROM `tbl_homework` WHERE `subject_id` = '$subject_name_sql' AND `date` = '$_GET[date]' AND `class_id` = '$class_name_sql'";

		$get_result_l = mysql_query($query_l,$link_id); 
		$list =0;
		while ($get_rows_l=mysql_fetch_array($get_result_l,MYSQL_BOTH)){
?>
              <tr>
                <td width="50%" align="left" valign="top" bgcolor="#FFFFFF" title="<?=$get_rows_l[remark]?>"> 
                  <table width="100%"  border="0" cellspacing="0" cellpadding="5">
                    <tr align="left" valign="top">
                        <td width="1%" nowrap><?
		if ($_SESSION[teacher_level] == 1 && $_SESSION[not_admin_cp] != 1){
		?>
                          <a href="hw_delete.php?id=<?=$get_rows_l["homework_id"]?>&date=<?=$_GET[date]?>&classname=<?=$_GET[classname]?>" onClick="return confirm('你確定要刪除這筆資料嗎?')">刪除</a>
                          <?
			}
		?>                          </td>
                      <td align="left"><?=$get_rows_l[text]?></td>
                    </tr>
                    </table>
                </td>
                <?
                	$list++;
                	$get_rows_l=mysql_fetch_array($get_result_l,MYSQL_BOTH);
                //	if ($get_rows_l=mysql_fetch_array($get_result_l,MYSQL_BOTH) !=null ){
                //	
?>
                <td width="50%" align="right" valign="top" bgcolor="#FFFFFF" title="<?=$get_rows_l[remark]?>">
                  <table width="100%"  border="0" cellspacing="0" cellpadding="5">
                    <tr align="left" valign="top">
                        <td width="1%" nowrap><?
		if ($_SESSION[admin_level] == 1 && $_SESSION[not_admin_cp] != 1 && $get_rows_l[text]!=""){
?>
                          <a href="hw_delete.php?id=<?=$get_rows_l["homework_id"]?>&date=<?=$_GET[date]?>&classname=<?=$_GET[classname]?>" onClick="return confirm('你確定要刪除這筆資料嗎?')">刪除</a>
                          <?
		}
?></td>
                      <td align="left"><?=$get_rows_l[text]?></td>
                    </tr>
                    </table>                </td>
                <?                	
				$list++;
                //	}
                /*
                	else{
?>
<td colspan="2"></td>
<?                	
				$list++;
                	}
                	*/
                	?>
              </tr>
              <?			
		}
		
		for ($list; $list < 6 ; $list++){
?>
              <tr>
                <td bgcolor="#FFFFFF">&nbsp;</td>
                <td bgcolor="#FFFFFF">&nbsp;</td>
              </tr>
              <?
                	$list++;		
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


