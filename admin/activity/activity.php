<?
// admin checking
require_once("../../php-bin/admin_check.php");
    // Selection
    require("activity_selection.php");

?>
<html>
<head>
<title>相片庫管理</title>
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
<img src="admin_label.gif" width="500" height="35"><br>
<table width="650" height="0"  border="0" align="left" cellpadding="5" cellspacing="0" class="small">
  <?

	$array_s = array("t_name");
	$array_v = array($_GET[t_name]);

	$str_key = loadsqlkey($array_s, $array_v);
	$_SESSION[skey] = $str_key;
?>
  <tr> 
    <td><table width="100%"  border="0" cellspacing="1" cellpadding="10">
      <tr>
        <td><font class=style8 color=red>
          <? if ($msg!="") echo "<br>".$msg; ?>
        </font></td>
      </tr>
    </table>
      <br>
      <table width="100%" border="0" cellpadding="10" cellspacing="1" class="small">
        <tr align="left" valign="top" bgcolor="#FFFFFF">
          <td width="15%"><span class="style2"><span class="subHead">新增相片庫</span>：</span></td>
          <td width="85%"><a href="activity_add.php" class="style8">新增相片庫資料</a></td>
        </tr>
      </table>
      <hr style="height:1px;color=ECECEC;">
      <table width="100%" border="0" cellpadding="10" cellspacing="1" class="small">
        <tr>
          <td width="15%" bgcolor="#FFFFFF"><span class="style2"><span class="subHead">搜尋相片庫</span>：</span> </td>
          <td width="85%" bgcolor="#FFFFFF"><table border="0" cellpadding="5" cellspacing="0" class="small">
            <form name="form1" method="get" action="?">
              <tr>
                <td class="style5">關鍵字</td>
                <td><input name="t_name" type="text" id="t_name" value="<?=$_GET[t_name]?>" size="20"></td>
                <td><input name="Submit" type="submit" class="small" value="搜尋">
                  <? if ($_GET[t_name] !="") {?>
                  <input value="重設" name="reset" type="button" onClick="javascript:location='activity.php'">
                  <? } ?></td>
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
      <table width="100%"  border="0" cellpadding="10" cellspacing="1" bgcolor="#CCCCCC" class="admin_maintain_table">
        <tr align="center" valign="top" class="admin_maintain_header"> 
          <td width=1% nowrap class="admin_maintain_header"><a href="activity.php?<? echo "orderby=date&seq=";
          if($orderby=="date"){
            echo ($orderseq=="asc")? "desc" : "asc";
          }else{
            echo "desc";
          }
	echo $str_key;
          ?>">日期</a></td>
          <td nowrap class="admin_maintain_header"><a href="activity.php?<? echo "orderby=category&seq=";
          if($orderby=="category"){
            echo ($orderseq=="asc")? "desc" : "asc";
          }else{
            echo "desc";
          }
	echo $str_key;
          ?>">類別</a></td>
          <td nowrap class="admin_maintain_header"><a href="activity.php?<? echo "orderby=name&seq=";
          if($orderby=="name"){
            echo ($orderseq=="asc")? "desc" : "asc";
          }else{
            echo "desc";
          }
	echo $str_key;
          ?>">名稱</a></td>
          <td nowrap class="admin_maintain_header"><a href="activity.php?<? echo "orderby=description&seq=";
          if($orderby=="description"){
            echo ($orderseq=="asc")? "desc" : "asc";
          }else{
            echo "desc";
          }
	echo $str_key;
          ?>">介紹</a></td>

          <td width=1% nowrap class="admin_maintain_header">管理相片</td>

          <td width=1% nowrap class="admin_maintain_header">更改及檢視</td>
          <td width=1% nowrap class="admin_maintain_header">刪除</td>
        </tr>
        <?
      
        // Display user's information
        while ($get_rows=mysql_fetch_array($get_result,MYSQL_BOTH)){

      ?>
        <tr valign="top" class="admin_maintain_contents"> 
          <td nowrap class="admin_maintain_contents"><font class="style8"> 
            <?=substr($get_rows["date"],8,2)."-".substr($get_rows["date"],5,2)."-".substr($get_rows["date"],0,4)?>
            </font></td>
          <td nowrap class="admin_maintain_contents"><font class="style8">
            <?=$get_rows["category"]?>
          </font></td>
          <td nowrap class="admin_maintain_contents"><font class="style8"> 
            <?=$get_rows["name"]?>
            </font></td>
          <td class="admin_maintain_contents"><font class="style8"> 
            <?=$get_rows["description"]?>
            </font></td>
          <td align="center" valign="middle" nowrap class="admin_maintain_contents"><font class="style8"> 
            <span class="admin_maintain_contents"><font class="style8" color="#0000FF"><a href="gallery.php?id=<?=$get_rows["id"]?>"><img src="../icons/bmp.gif" alt=管理相片 width="16" height="16" border="0" / 刪除相片></a></font></span>
            </font></td>
          <td align="center" valign="middle" nowrap class="admin_maintain_contents"><font class="style8" color="#0000FF"><a href="activity_update.php?id=<?=$get_rows["id"]?>"><img src="../icons/xie.gif" width="16" height="16" border="0" alt=更改及檢視></a></font></td>
          <td align="center" valign="middle" nowrap class="admin_maintain_contents"><font class="style8" color="#0000FF"><a href="activity_delete.php?id=<?=$get_rows["id"]?>" onClick="return confirm('請注意! 此活動中的所有相片將會一併被刪除?')"><img src="../icons/del.gif" width="16" height="16" border="0" alt=刪除></a></font></td>
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
                  <?=$_GET["t_name"]?>
        的資料 ) </font>&nbsp;&nbsp;&nbsp;&nbsp;<a href="#" onClick="javascript:location='activity.php';">返回</a></td>
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
