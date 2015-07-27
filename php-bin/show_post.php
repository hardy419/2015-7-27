<?

// name email title desc postdate  
while ($get_rows=mysql_fetch_array($get_result,MYSQL_BOTH)){

?>
              <tr bgcolor="#D4D9DE">
                <td valign="top"><div align="center">日期</div></td>
                <td valign="top"><table width="429" border="0" cellpadding="0" cellspacing="0" class="normal">
                    <tr>
                      <td width="70"><?=substr($get_rows[postdate],0 ,10 );?></td>
                      <?
	              if ($_SESSION[allow_control_forum] == 1){
                      ?>
                      <td width="319"><div align="right"><a href="gr_group_edit.php?id=<?=$get_rows[id]?>">更改</a></div></td>
                      <td width="40"><div align="right"><a href="delete_post.php?id=<?=$get_rows["id"]?>&reply=<?=$get_rows["reply"]?>" onclick="return confirm('確認刪除這段內容嗎?')">刪除</a></div></td>
                      <?
                      }
                      ?>
                    </tr>
                  </table></td>
              </tr>
              <tr bgcolor="#FFFFFF">
                <td width="70" valign="top"><div >
                    <p align="center">
<?
	if ($get_rows[email] == ""){	
		echo $get_rows[name];
	}else{
?>
	<a href="mailto:<?=$get_rows[email]?>"><?=$get_rows[name]?></a>	
<? 
	}
?>
</p>
                    </div>
                  </td>
                <td width="429" valign="top"><?=ereg_replace("\n","<BR>",$get_rows[desc])?><br><br></td>
              </tr>

<?
}
?>