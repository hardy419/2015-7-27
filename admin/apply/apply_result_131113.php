<?
// admin checking
require_once("../../php-bin/admin_check.php");
    // Selection
    require("apply_result_selection.php");

?>
<html>
<head>
<title>網上報名</title>
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
<?php $search_arr['id'] = $_GET[id];?>
<img src="admin_label.gif" width="500" height="35">
<table  border="0" align="left" cellpadding="5" cellspacing="0" class="small">
  <?

	$array_s = array("t_name");
	$array_v = array($_GET[t_name]);

	$str_key = loadsqlkey($array_s, $array_v);
	$_SESSION[skey] = $str_key;
?>
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
                    <hr style="height:1px;color=ECECEC;">
                    <table width="100%" border="0" cellpadding="10" cellspacing="1" class="small">
                      <form name="form1" method="get" action="?">
                        <tr>
                          <td width="15%" bgcolor="#FFFFFF"><span class="style2"><span class="style4">搜尋</span>：</span> </td>
                          <td width="85%" bgcolor="#FFFFFF">
						  <? 
						  	if (isset($_GET["t_name"]) && $_GET["t_name"]!="") {
								$t_name=$_GET["t_name"];
							} else {
								$t_name="姓名, 電話 或 電郵";
							}
						  ?>
						  
						  <input name="t_name" type="text" id="t_name" value="<?=$t_name?>" onClick="javascript:this.value='';">
                              <input name="Submit" type="submit" class="small" value="搜尋">
                              <input name="id" type="hidden" id="id" value="<?=$_GET[id]?>"></td>
                        </tr>
                      </form>
      </table>
          
                                        <hr style="height:1px;color=ECECEC;">
                    <table width="100%" border="0" cellpadding="10" cellspacing="1" class="small">
                     
                        <tr align="left" valign="top">
                          <td width="15%" bgcolor="#FFFFFF"><span class="style4">搜尋結果：</span></td>
                          <td width="85%" align="right" bgcolor="#FFFFFF"><?
						  
        if ($total_page>0 && $page>0){
            page_display("",$page,$total_page,10,$search_arr,$sort_arr,$class_arr,"");
        }
    ?></td>
                        </tr>
                     
      </table>
      <table width="100%"  border="0" cellpadding="10" cellspacing="1" bgcolor="CCCCCC">
          <tr bgcolor="ECECEC">
            <td nowrap ><a href="apply_result.php?<? echo "id=$_GET[id]&orderby=DateTime&seq=";
          if($orderby=="DateTime"){
            echo ($orderseq=="asc")? "desc" : "asc";
          }else{
            echo "desc";
          }
	echo $str_key;
          ?>">日期</a></td>
            <td nowrap><a href="apply_result.php?<? echo "id=$_GET[id]&orderby=name_chi&seq=";
          if($orderby=="name_chi"){
            echo ($orderseq=="asc")? "desc" : "asc";
          }else{
            echo "desc";
          }
	echo $str_key;
          ?>">中文姓名</a></td>
            <td nowrap><a href="apply_result.php?<? echo "id=$_GET[id]&orderby=name_eng&seq=";
          if($orderby=="name_eng"){
            echo ($orderseq=="asc")? "desc" : "asc";
          }else{
            echo "desc";
          }
	echo $str_key;
          ?>">英文姓名</a></td>
            <td nowrap><a href="apply_result.php?<? echo "id=$_GET[id]&orderby=sex&seq=";
          if($orderby=="sex"){
            echo ($orderseq=="asc")? "desc" : "asc";
          }else{
            echo "desc";
          }
	echo $str_key;
          ?>">性別</a></td>
            <td nowrap >電話</td>
            <td nowrap >電郵</td>
            <td nowrap >檢視</td>
            <td nowrap >刪除</td>
          </tr>
          <?
      
        // Display user's information
        while ($get_rows=mysql_fetch_array($get_result,MYSQL_BOTH)){

      ?>
          <tr bgcolor="#FFFFFF" >
            <td nowrap ><font class="style8">
              <?
			  	$dt = substr("$get_rows[DateTime]",0,4);
				$dt .= "/";
				$dt .= substr("$get_rows[DateTime]",4,2);
				$dt .= "/";
				$dt .= substr("$get_rows[DateTime]",6,2);
				$dt .= " ";
				$dt .= substr("$get_rows[DateTime]",8,2);
				$dt .= ":";
				$dt .= substr("$get_rows[DateTime]",10,2);
				echo $dt;
			  ?>
            </font></td>
            <td nowrap ><font class="style8">
              <?=$get_rows["name_chi"]?>
            </font></td>
            <td nowrap ><font class="style8">
              <?=$get_rows["name_eng"]?>
			</font></td>
            <td nowrap ><font class="style8"><font class="style8">
              <?=$get_rows["sex"]?>
            </font></font></td>
			<td nowrap ><font class="style8"><?=$get_rows["tel"]?></font></td>
            <td nowrap ><font class="style8"> <font class="style8" color="#0000FF"><a href="mailto:<?=$get_rows[email]?>"><?=$get_rows[email]?></a></font> </font></td>
            <td nowrap ><a href="apply_result_detial.php?id=<?=$get_rows["form_id"]?>&post_id=<?=$_GET[id]?>&t_name=<?=$_GET[t_name]?>">檢視</a></td>
            <td nowrap ><font class="style8" color="#0000FF"><a href="apply_result_delete.php?id=<?=$get_rows["form_id"]?>&post_id=<?=$_GET[id]?>&t_name=<?=$_GET[t_name]?>" onClick="return confirm('是否確定刪除此人報名資料?')">刪除</a></font></td>
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
