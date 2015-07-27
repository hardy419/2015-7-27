<?
// admin checking
require_once("../../php-bin/admin_check.php");
// Selection
require("user_selection.php");
if(isset($_GET['s_name']) && !empty($_GET['s_name'])){
$array_s = array("s_name");
	$array_v = array($_GET[s_name]);

	$str_key = loadsqlkey($array_s, $array_v);
	$_SESSION[skey] = $str_key;
}
?>
<html>
<head>
<title>家長管理</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<LINK REL="StyleSheet" TYPE="text/css" HREF="../../js/style.css">
<style type="text/css">
<!--
.style2 {color: #006699}
.style3 {color: #666666}
-->
</style>
</head>
<body class="main_small">
<img src="admin_label.gif" width="500" height="35"><br>
<table width="650"  border="0" align="left" cellpadding="5" cellspacing="0" class="small">
  <tr> 
      <td height="151"><div align="left"><font class="style8" color="#FF0000"><span style="font-weight: 400; text-decoration: underline">        </span></font>
          <table width="100%"  border="0" cellspacing="1" cellpadding="10">
            <tr>
              <td><font class=style8 color=red>
                <? if ($msg!="") echo "<br>".$msg; ?>
              </font></td>
            </tr>
          </table>
          <br>
          <table width="100%" border="0" cellpadding="10" cellspacing="1" class="small">
            <tr align="left" valign="top" bgcolor="#FFFFFF">
              <td width="15%"><span class="style2"><span class="subHead">新增家長</span>：</span></td>
              <td width="85%"><a href="user_add.php" class="style8">新增家長資料</a></td>
            </tr>
          </table>
          <hr style="height:1px;color=ECECEC;">
          <table width="100%" border="0" cellpadding="10" cellspacing="1" class="small">
            <tr>
              <td width="15%" bgcolor="#FFFFFF"><span class="style2"><span class="subHead">搜尋家長</span>：</span> </td>
              <td width="85%" bgcolor="#FFFFFF"><table border="0" cellpadding="2" cellspacing="0" class="small">
                <form name="form1" method="get" action="?">
                  <tr>
                    <td nowrap><span class="style3"> 姓名：</span></td>
                    <td nowrap><input name="s_name" type="text" id="s_name" value="<?=$_GET[s_name]?>" size="20"></td>
                    <td nowrap><input name="Submit" type="submit" class="small" value="搜尋">
					  <? if ($_GET[s_name] !="") {?>
                      <input value="重設" name="reset" type="button" onClick="javascript:location='user.php'">
                      <? } ?>
					</td>
                  </tr>
                </form>
              </table></td>
            </tr>
          </table>
          <hr style="height:1px;color=ECECEC;">
          <table width="100%" border="0" cellpadding="10" cellspacing="1" class="small">
            <tr align="left" valign="top">
              <td width="15%" bgcolor="#FFFFFF"><span class="subHead">搜尋結果：</span></td>
              <td width="85%" align="right" bgcolor="#FFFFFF"> 總共有
                  <?=$total_record?>
      個資料 &nbsp;&nbsp;<font color=#CCCCCC>|</font>&nbsp;&nbsp; 每頁
      <?=$record_per_page?>
      個 &nbsp;&nbsp;<font color=#CCCCCC>|</font>&nbsp;&nbsp; 分
      <?=$total_page?>
      頁顯示 </td>
            </tr>
          </table>
        
        <table width="100%"  border="0" cellpadding="10" cellspacing="1" bgcolor="CCCCCC" class="admin_maintain_table">
          <tr align="center" valign="top" class="admin_maintain_header">
            <td width=50% nowrap class="admin_maintain_header">
				<strong style="font-weight: 400"> 
					<a href="user.php?seq=<?php echo $orderseq == 'asc' ? 'desc' : 'asc' ; echo $str_key;?>">
						<font class="style8">家長姓名</font>
					</a>
				</strong>
			</td>
            <td width=25% nowrap class="admin_maintain_header"> <strong style="font-weight: 400"><font color="#000000" class="style8">更改及檢視</font></strong></td>
            <td width=25% nowrap class="admin_maintain_header"> <strong style="font-weight: 400"><font color="#000000" class="style8">刪除</font></strong></td>
          </tr>
          <?
      
        // Display user's information
        while ($get_rows=mysql_fetch_array($get_result,MYSQL_BOTH)){

      ?>
          <tr valign="top" class="admin_maintain_contents"> 
            <td nowrap align='center' class="admin_maintain_contents">
              <?=$get_rows["name"]?>
            </td>
            <td align="center" nowrap class="admin_maintain_contents"><a href="user_update.php?id=<?=$get_rows["id"]?>"><img src="../icons/xie.gif" width="16" height="16" alt=更改及檢視 border="0"></a></td>
            <td align="center" nowrap class="admin_maintain_contents"><a href="user_delete.php?id=<?=$get_rows["id"]?>" onClick="return confirm('你確定要刪除這筆資料嗎?')"><img src="../icons/del.gif" width="16" height="16" alt=刪除 border=0></a></td>
          </tr>
          <? } ?>
          <? if (mysql_num_rows($get_result)==0){ ?>
          <? } ?>
        </table>
      
          <? if (mysql_num_rows($get_result)==0){ ?>

        <div align="center">
          <table width="100%" border="0" cellpadding="10" cellspacing="1" class="small">
            <tr align="left" valign="top">
              <td align="center" valign="middle" bgcolor="#FFFFFF"><font class="style8 style6 style5">( 沒有找到有關
                    <?=$_GET["s_name"]?>
        的資料 ) </font>&nbsp;&nbsp;&nbsp;&nbsp;<a href="#" onClick="javascript:location='user.php';">返回</a></td>
            </tr>
          </table>
        </div>
        <? } ?>
        <table width="100%" border="0" cellpadding="10" cellspacing="1" class="small">
          <tr align="left" valign="top">
            <td width="15%" bgcolor="#FFFFFF">&nbsp;</td>
            <td width="85%" align="right" bgcolor="#FFFFFF"><?
        if ($total_page>0 && $page>0){
            page_display("",$page,$total_page,10,$search_arr,$sort_arr,$class_arr,"");
        }
    ?></td>
          </tr>
        </table>
        <p align="right">&nbsp;
        </p></td>
  </tr>
</table>
</body>
</html>
