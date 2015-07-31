<?
error_reporting(0);
// admin checking
require_once("../../php-bin/admin_check.php");
    // Selection
    require("user_selection.php");
?>
<html>
<head>
<title>老師管理</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<LINK REL="StyleSheet" TYPE="text/css" HREF="../../js/style.css">
<style type="text/css">
<!--
.style2 {color: #006699}
.style4 {color: #006600}
.style5 {color: #666666}
-->
</style>
</head>
<body>
<img src="admin_label.gif" width="500" height="35"><br>
<table width="650" height="191"  border="0" align="left" cellpadding="5" cellspacing="0" class="small">
<?
	$array_s = array("t_name");
	$array_v = array($_GET[t_name]);

	$str_key = loadsqlkey($array_s, $array_v);
	$_SESSION[skey] = $str_key;
?>
  <tr> 
    <td>      <table width="100%"  border="0" cellspacing="1" cellpadding="10">
      <tr>
        <td><font class=style8 color=red>
          <? if ($msg!="") echo "<br>".$msg; ?>
        </font></td>
      </tr>
    </table>
      <br>
      <table width="100%" border="0" cellpadding="10" cellspacing="1" class="small">
        <tr align="left" valign="top" bgcolor="#FFFFFF">
          <td width="15%"><span class="style2"><span class="style4">新增教師</span>：</span></td>
          <td width="85%"><a href="user_add.php" class="style8">新增教師資料</a></td>
        </tr>
      </table>
      <hr style="height:1px;color=ECECEC;">
      <table width="100%" border="0" cellpadding="10" cellspacing="1" class="small">
       
          <tr>
            <td width="15%" bgcolor="#FFFFFF"><span class="style2"><span class="style4">搜尋老師</span>：</span> </td>
            <td width="85%" bgcolor="#FFFFFF"><table border="0" cellpadding="1" cellspacing="0" class="small">
              <form name="form1" method="get" action="?">
                <tr>
                  <td><span class="style5">教師姓名：</span></td>
                  <td><input name="t_name" type="text" id="t_name" value="<?=$_GET[t_name]?>" size="20"></td>
                  <td><input name="Submit" type="submit" class="small" value="搜尋">
				  <? if ($_GET[t_name] !="") {?>
                    <input value="重設" name="reset" type="button" onClick="javascript:location='user.php'">
					<? } ?>
                </tr>
              </form>
            </table></td>
          </tr>
        
      </table>
     
      <hr style="height:1px;color=ECECEC;">
      <table width="100%" border="0" cellpadding="10" cellspacing="1" class="small">
        <tr align="left" valign="top">
          <td width="15%" bgcolor="#FFFFFF"><span class="style4">搜尋結果：</span></td>
          <td width="85%" align="right" bgcolor="#FFFFFF">
		  總共有 <?=$total_record?> 個資料
		  &nbsp;&nbsp;<font color=#CCCCCC>|</font>&nbsp;&nbsp;
		  每頁 <?=$record_per_page?> 個
		  &nbsp;&nbsp;<font color=#CCCCCC>|</font>&nbsp;&nbsp;
		  分 <?=$total_page?> 頁顯示 
	      </td>
        </tr>
      </table>
      <table width="100%"  border="0" cellpadding="10" cellspacing="1" bgcolor="CCCCCC">
        <tr valign="top" bgcolor="ECECEC" > 
          <td nowrap class="admin_maintain_header"><a href="user.php?<? echo "orderby=teacher_login&seq=";
          if($orderby=="teacher_login"){
            echo ($orderseq=="asc")? "desc" : "asc";
          }else{
            echo "desc";
          }
	echo $str_key;
          ?>">教師帳號</a></td>
          <td nowrap class="admin_maintain_header"><a href="user.php?<? echo "orderby=teacher_name&seq=";
          if($orderby=="teacher_name"){
            echo ($orderseq=="asc")? "desc" : "asc";
          }else{
            echo "desc";
          }
	echo $str_key;
          ?>">教師姓名</a></td>
          <td nowrap class="admin_maintain_header">是否在前台顯示</td>

          <td nowrap class="admin_maintain_header"><a href="user.php?<? echo "orderby=show&seq=";
          if($orderby=="show"){
            echo ($orderseq=="asc")? "desc" : "asc";
          }else{
            echo "desc";
          }
	echo $str_key;
          ?>">管理員</a></td>

          <td width="1%" nowrap bgcolor="ECECEC" class="admin_maintain_header">更改及檢視</td>
          <td width="1%" nowrap bgcolor="ECECEC" class="admin_maintain_header">刪除</td>
        </tr>
        <?
      
        // Display user's information
		
        while ($get_rows=mysql_fetch_array($get_result,MYSQL_BOTH)){
			
      ?>
        <tr align="left" valign="top" > 
          <td nowrap bgcolor="#FFFFFF" ><font class="style8"> 
            <?=$get_rows["teacher_login"]?>
            </font></td>
          <td nowrap bgcolor="#FFFFFF" ><font class="style8"> 
            <?=$get_rows["teacher_name"]?>
            </font></td>
          <td nowrap bgcolor="#FFFFFF" ><font class="style8"> 
            <?=$get_rows["show"]?>
            </font></td>
          <td nowrap bgcolor="#FFFFFF" ><font class="style8"> 
            <?=$get_rows["admin"]?>
            </font></td>
          <td align="center" nowrap bgcolor="#FFFFFF" ><font class="style8" color="#0000FF"><a href="../../admin/teacher/user_update.php?id=<?=$get_rows["teacher_id"]?>"><img src="../icons/xie.gif" width="16" height="16" border=0 alt=更改及檢視></a></font></td>
          <td align="center" nowrap bgcolor="#FFFFFF" ><font class="style8" color="#0000FF"><a href="../../admin/teacher/user_delete.php?id=<?=$get_rows["teacher_id"]?>&fn=<?=$get_rows["docoment_name"]?>" onClick="return confirm('你確定要刪除這筆資料嗎?')"><img src="../icons/del.gif" alt="刪除" width="16" height="16" border="0"></a></font></td>
        </tr>
        <? } ?>
        <? if (mysql_num_rows($get_result)==0){ ?>
        <? } ?>
      </table>
     
        <? if (mysql_num_rows($get_result)==0){ ?>
    
      <div align="center">
        <table width="100%" border="0" cellpadding="10" cellspacing="1" class="small">
          <tr align="left" valign="top">
            <td align="center" valign="middle" bgcolor="#FFFFFF"><font class="style8 style6 style5">( 沒有找到有關 <?=$_GET["t_name"]?> 的資料 ) </font>&nbsp;&nbsp;&nbsp;&nbsp;<a href="#" onClick="javascript:location='user.php';">返回</a></td>
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
