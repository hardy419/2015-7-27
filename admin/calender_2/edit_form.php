<?php
require_once("../../admin.inc.php");

// access control checking
require_once("z_access_control.php");

// Connect Database
require_once("../../php-bin/function.php");

$date_arr=explode('_', $_GET['d']);
$date="{$date_arr['1']}-{$date_arr['2']}-{$date_arr['3']}";

mysql_query("SET NAMES UTF8");
$rs = mysql_query("SELECT * FROM `tbl_daily_gold` WHERE `date`='{$date}'");
$row=mysql_fetch_assoc($rs);
?>
<form id="contentForm" name="contentForm" method="post" action="edit_form_process.php">
<table width="100%" border="0" cellspacing="0" cellpadding="5">
  <tr>
    <td>日期：</td>
    <td><?php echo "{$date_arr['1']}年{$date_arr['2']}月{$date_arr['3']}日";?><input name="date" id="date" type="hidden" value="<?php echo $date;?>"></td>
  </tr>
  <tr>
    <td valign="top">內容：</td>
    <td><textarea name="content" id="content" cols="40" rows="5"><?php echo $row['content']?></textarea></td>
  </tr>
</table>
<input name="d" id="d" type="hidden" value="<?php echo $_GET['d']?>">
</form>
