<?
// admin checking
require_once("../../php-bin/admin_check.php");
// Selection
require("user_selection.php");
$array_s = array("s_name","s_class");
	$array_v = array($_GET[s_name],$_GET[s_class]);

	$str_key = loadsqlkey($array_s, $array_v);
	$_SESSION[skey] = $str_key;
?>
<html>
<head>
<title>學生管理</title>
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
              <td width="15%"><span class="style2"><span class="subHead">新增學生</span>：</span></td>
              <td width="85%"><a href="user_add.php" class="style8">新增學生資料</a></td>
            </tr>
          </table>
          <hr style="height:1px;color=ECECEC;">
          <table width="100%" border="0" cellpadding="10" cellspacing="1" class="small">
            <tr>
              <td width="15%" bgcolor="#FFFFFF"><span class="style2"><span class="subHead">搜尋學生</span>：</span> </td>
              <td width="85%" bgcolor="#FFFFFF"><table border="0" cellpadding="2" cellspacing="0" class="small">
                <form name="form1" method="get" action="?">
                  <tr>
                    <td nowrap><span class="style3">班別：</span></td>
                    <td nowrap><select class="style8" name="s_class">
                        <option value="">全部</option>
                        <?
			require_once("../../php-bin/get_class_selection.php");
			for ($i=0;$i<count($class_list);$i++){ 
			?>
                        <option value="<?=$class_list[$i]["class_id"]?>"
				<?              
				if ($_GET[s_class]==$class_list[$i]["class_id"]){
					echo " selected";
				
				}
				?>
			>
                        <?=$class_list[$i]["class_name"]?>
                        </option>
                        <? }
                    ?>
                      </select>
                    </td>
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
            <td width=88 nowrap class="admin_maintain_header"> <strong style="font-weight: 400"> <a href="user.php?<? echo "orderby=ts.student_login&seq=";
          if($orderby=="ts.student_login"){
            echo ($orderseq=="asc")? "desc" : "asc";
          }else{
            echo "desc";
          }
	echo $str_key;
          ?>"><font class="style8">學生帳號</font></a></strong></td>
            <td width=186 nowrap class="admin_maintain_header"> <strong style="font-weight: 400"> <a href="user.php?<? echo "orderby=ts.student_name&seq=";
          if($orderby=="ts.student_name"){
            echo ($orderseq=="asc")? "desc" : "asc";
          }else{
            echo "desc";
          }
	echo $str_key;
          ?>"><font class="style8">學生姓名</font></a></strong></td>
            <td width=43 nowrap class="admin_maintain_header"> <strong style="font-weight: 400"><a href="user.php?<? echo "orderby=tc.class_name&seq=";
          if($orderby=="tc.class_name"){
            echo ($orderseq=="asc")? "desc" : "asc";
          }else{
            echo "desc";
          }
	echo $str_key;
          ?>"><font class="style8">班別</font></a></strong></td>
            <td width=1% nowrap class="admin_maintain_header"><strong style="font-weight: 400"><a href="user.php?<? echo "orderby=ts.student_class_no&seq=";
          if($orderby=="ts.student_class_no"){
            echo ($orderseq=="asc")? "desc" : "asc";
          }else{
            echo "desc";
          }
	echo $str_key;
          ?>"><font class="style8">班號</font></a></strong></td>
            <td width=1% nowrap class="admin_maintain_header"> <strong style="font-weight: 400"><font color="#000000" class="style8">更改及檢視</font></strong></td>
            <td width=1% nowrap class="admin_maintain_header"> <strong style="font-weight: 400"><font color="#000000" class="style8">刪除</font></strong></td>
          </tr>
          <?
      
        // Display user's information
        while ($get_rows=mysql_fetch_array($get_result,MYSQL_BOTH)){

      ?>
          <tr valign="top" class="admin_maintain_contents"> 
            <td nowrap class="admin_maintain_contents">
              <?=$get_rows["student_login"]?>
            </td>
            <td nowrap class="admin_maintain_contents">
              <?=$get_rows["student_name"]?>
            </td>
            <td nowrap class="admin_maintain_contents">
              <?=$get_rows["class_name"]?>
            </td>
            <td align="center" nowrap class="admin_maintain_contents"><?=$get_rows["student_class_no"]?></td>
            <td align="center" nowrap class="admin_maintain_contents"><a href="user_update.php?id=<?=$get_rows["student_id"]?>"><img src="../icons/xie.gif" width="16" height="16" alt=更改及檢視 border="0"></a></td>
            <td align="center" nowrap class="admin_maintain_contents"><a href="user_delete.php?id=<?=$get_rows["student_id"]?>" onClick="return confirm('你確定要刪除這筆資料嗎?')"><img src="../icons/del.gif" width="16" height="16" alt=刪除 border=0></a></td>
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
