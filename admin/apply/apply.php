<?
// admin checking
require_once("../../php-bin/admin_check.php");
    // Selection
    require("apply_selection.php");

?>
<html>
<head>
<title>網上報名管理</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<LINK REL="StyleSheet" TYPE="text/css" HREF="../../js/style.css">
<style type="text/css">
<!--
.style2 {color: #006699}
.style4 {color: #006600}
.style6 {color: #666666}
-->
</style>
</head>
<body>
<table width="650"  border="0" align="left" cellpadding="5" cellspacing="0" class="small">
  <?

	$array_s = array("t_name");
	$array_v = array($_GET[t_name]);

	$str_key = loadsqlkey($array_s, $array_v);
	$_SESSION[skey] = $str_key;
?>
  <tr>
	<td>
		<img src="admin_label.gif" width="500" height="35">
	</td>
  </tr>
  <tr>
    <td width="636" height="151">
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
                          <td width="15%"><span class="style2"><span class="style4">新增報名表</span>：</span></td>
                          <td width="85%">                          <a href="apply_add.php">新增報名表</a></td>
                        </tr>
                    
      </table>
                                        <hr style="height:1px;color=ECECEC;">
                    <table width="100%" border="0" cellpadding="10" cellspacing="1" class="small">
                      <form name="form1" method="get" action="?">
                        <tr>
                          <td width="15%" bgcolor="#FFFFFF"><span class="style2"><span class="style4">搜尋報名表</span>：</span> </td>
						  
                          <td width="85%" bgcolor="#FFFFFF">
                            <table  border="0" cellspacing="0" cellpadding="3">
                                <tr>
                                  <td><span class="style6">報名表標題 :</span></td>
                                  <td><input name="t_name" type="text" id="t_name" value="<?=$_GET["t_name"]?>" onClick="javascript:this.value='';"></td>
                                  <td><input name="Submit" type="submit" class="small" value="搜尋"></td>
                                  <td><? if ($_GET[t_name] !="") {?>
                                    <input value="重設" name="reset" type="button" onClick="javascript:location='apply.php'">
                                    <? } ?></td>
                              </tr>
                            </table></td>
                        </tr>
                      </form>
      </table>
          
                                        <hr style="height:1px;color=ECECEC;">
                    <table width="100%" border="0" cellpadding="10" cellspacing="1" class="small">
                     
                        <tr align="left" valign="top">
                          <td width="15%" bgcolor="#FFFFFF"><span class="style4">搜尋結果：</span></td>
                          <td width="85%" align="right" bgcolor="#FFFFFF">總共有
                            <?=$total_record?>
個資料 &nbsp;&nbsp;<font color=#CCCCCC>|</font>&nbsp;&nbsp; 每頁
<?=$record_per_page?>
個 &nbsp;&nbsp;<font color=#CCCCCC>|</font>&nbsp;&nbsp; 分
<?=$total_page?>
頁顯示</td>
                        </tr>
                     
      </table>
                    <table width="100%"  border="0" cellpadding="10" cellspacing="1" bgcolor="CCCCCC">
          <tr align="center" valign="top" bgcolor="ECECEC">
            <td width="1%" nowrap >編號</td>
            <td width="5%" nowrap ><a href="apply.php?<? echo "orderby=date&seq=";
          if($orderby=="date"){
            echo ($orderseq=="asc")? "desc" : "asc";
          }else{
            echo "desc";
          }
	echo $str_key;
          ?>">日期</a></td>
            <td nowrap ><a href="apply.php?<? echo "orderby=title&seq=";
          if($orderby=="title"){
            echo ($orderseq=="asc")? "desc" : "asc";
          }else{
            echo "desc";
          }
	echo $str_key;
          ?>">報名表標題</a></td>
            <td width="1%" nowrap >更改及檢視</td>
            <td width="1%" nowrap>報名者資料</td>
            <td width="1%" nowrap >刪除</td>
          </tr>
          <?
      
        // Display user's information
        while ($get_rows=mysql_fetch_array($get_result,MYSQL_BOTH)){

      ?>
          <tr valign="top" bgcolor="#FFFFFF" >
            <td nowrap ><font class="style8">
              <?=$get_rows["id"]?>
            </font></td>
            <td nowrap ><font class="style8">
              <?=substr($get_rows["date"],8,2)."-".substr($get_rows["date"],5,2)."-".substr($get_rows["date"],0,4)?>
            </font></td>
            <td nowrap ><font class="style8">
              <?
			  	//echo "<a href=\"apply_result.php?id=$get_rows[id]\">";
			  	echo $get_rows["title"];
			  	//echo "</a>";
			  ?>
            </font></td>
            <td align="center" valign="top" nowrap ><font class="style8" color="#0000FF"><a href="apply_update.php?id=<?=$get_rows["id"]?>"><img src="../icons/xie.gif" width="16" height="16" border="0" alt="更改及檢視"></a></font><font class="style8">&nbsp;
            </font></td>
            <td align="center" nowrap ><font class="style8" color="#0000FF">&nbsp;</font><font class="style8">			
			
			<a href="apply_result.php?id=<?=$get_rows[id]?>"><img src="../icons/info.gif" width="16" height="16" border=0 alt="報名者資料"></a></font></td>
            <td align="center" nowrap ><font class="style8" color="#0000FF"><a href="apply_delete.php?id=<?=$get_rows["id"]?>" onClick="return confirm('是否確定刪除此報名表?')"><img src="../icons/del.gif" alt="刪除" width="16" height="16" border="0"></a></font></td>
          </tr>
          <? } ?>
          
      </table>
                    <? if (mysql_num_rows($get_result)==0){ ?>
        <div align="center">
          <table width="100%" border="0" cellpadding="10" cellspacing="1" class="small">
            <tr align="left" valign="top">
              <td align="center" valign="middle" bgcolor="#FFFFFF"><font class="style8 style6">沒有任何資料</font> </td>
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
    <p align="right">&nbsp;    </p></td>
  </tr>
</table>
</body>
</html>
