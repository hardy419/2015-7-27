<?

$count = 0;

// name email title desc postdate  
while ($get_rows=mysql_fetch_array($get_result,MYSQL_BOTH)){
	if ($count % 2 == 0)
		$color = "#E5F2FF";
	else
		$color = "#FFFFFF";
?>
	 <tr bgcolor="<?=$color?>" class="normal" align="center"> 
                  <td height="20" align="left">&nbsp;&nbsp;&nbsp;<a href="gr_group_topic.php?id=<?=$get_rows[id]?>"><?=$get_rows[title]?></a></td>
<td>
<?=$get_rows[count]?>
</td>

                  <td>
<?
	if ($get_rows[email] == ""){	
		echo $get_rows[name];
	}else{
?>
	<a href="mailto:<?=$get_rows[email]?>"><?=$get_rows[name]?></a>	
<? 
	}
?>
                  </td>
                  <td>
                  <?=substr($get_rows[postdate],0 ,10 );?>
                  </td>
                  <td>
<a href="gr_group_topic.php?id=<?=$get_rows[id]?>">觀看</a>
                  </td>
<?                  
	if ($_SESSION[allow_control_forum] == 1){
?>
		<td><a href="delete_topic.php?id=<?=$get_rows["id"]?>" onclick="return confirm('確認刪除這個主題嗎?')">刪除</a></td>
<?
	}
?>
                </tr>
<?
	$count++;
}
?>