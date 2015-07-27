<?
	session_start();
	require_once("../../php-bin/function.php");

	require_once("../../php-bin/pagedisplay.php");

	
	$page = 1;
	$record_per_page = 10;   // records display each page

        if (isset($_GET["page"]))
            $page = $_GET["page"];   // get the current page
    	
	$get_sql = "SELECT * FROM `tbl_forum` WHERE reply =0 ORDER BY `postdate` DESC ";
	$get_result = mysql_query($get_sql, $link_id);
	$total_record = mysql_num_rows($get_result);
	$offset = $record_per_page * ($page-1);
	$total_page = ceil($total_record/$record_per_page);
	$get_result = mysql_query($get_sql." limit $offset,$record_per_page;", $link_id);

?>
<SCRIPT LANGUAGE="JavaScript">

<!--
function openwin(fname,wid,hei) {

var url = "" + fname + ".htm";
var par = "status=no,scrollbars=no,resizable=no,toolbar=no,location=no,directories=0,copyhistory=no,width=" + wid +",height=" + hei;
var newwin = window.open(url,fname,par);

}

-->

</SCRIPT>
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
<table width="650" border="0" cellpadding="5" cellspacing="0">
  <tr>
    <td>
      <br>
      <table width="100%" border="0" cellpadding="10" cellspacing="1" class="small">
        <tr align="left" valign="top" bgcolor="#FFFFFF">
          <td width="15%"><span class="style2"><span class="subHead">新增主題</span>：</span></td>
          <td width="85%"><span ><a href="gr_group_form.php">新增主題</a></span></td>
        </tr>
      </table>
      <hr style="height:1px;color=ECECEC;">
      <br>
      <table width="100%" border="0" cellpadding="10" cellspacing="1" class="small">
        <tr align="left" valign="top">
          <td width="15%" bgcolor="#FFFFFF">&nbsp;</td>
          <td width="85%" align="right" bgcolor="#FFFFFF"> 總共有
              <?=$total_record?>
      個主題&nbsp;&nbsp;<font color=#CCCCCC>|</font>&nbsp;&nbsp; 每頁
      <?=$record_per_page?>
      個 &nbsp;&nbsp;<font color=#CCCCCC>|</font>&nbsp;&nbsp; 分
      <?=$total_page?>
      頁顯示 </td>
        </tr>
      </table>
      <!--------------------->
<table width="100%" border="0" cellpadding="10" cellspacing="1" bgcolor="CCCCCC">
<tr bgcolor="#ECECEC" valign="middle">
<td align="center" nowrap>標題</td>

<td width="1%" align="center" nowrap bgcolor="#ECECEC">留言者</td>
<td width="1%" align="center" nowrap bgcolor="#ECECEC">日期</td> 
<td width="1%" align="center" nowrap bgcolor="#ECECEC">回覆</td>
<td width="1%" align="center" nowrap bgcolor="#ECECEC">刪除</td>         
</tr>
<!--------------------->
<?
$count = 0;
// name email title desc postdate  
while ($get_rows=mysql_fetch_array($get_result,MYSQL_BOTH)){
?>
<tr> 
<td valign="top" bgcolor="FFFFFF">&nbsp;&nbsp;&nbsp;<a href="gr_group_topic.php?id=<?=$get_rows[id]?>"><?=$get_rows[title]?></a></td>
<td bgcolor="FFFFFF" nowrap ><?=($get_rows[email] == "")?$get_rows[name] : "<a href=mailto:".$get_rows[email].">".$get_rows[name]."</a>";?></td>
<td nowrap bgcolor="FFFFFF"><?=substr($get_rows["postdate"],8,2)."-".substr($get_rows["postdate"],5,2)."-".substr($get_rows["postdate"],0,4)?></td>                 
<td align="center" nowrap bgcolor="FFFFFF"><?=$get_rows[count]?></td>
<td align="center" valign="top" nowrap bgcolor="FFFFFF"><a href="delete_topic.php?id=<?=$get_rows["id"]?>" onClick="return confirm('確認刪除這個主題嗎?')"><img src="../icons/del.gif" width="16" height="16" border="0" alt="刪除"></a></td>
</tr>
<?
$count++;
}
?>
<!------------------------>
      </table>
      <table width="100%" border="0" cellpadding="10" cellspacing="1" class="small">
        <tr align="left" valign="top">
          <td width="15%" bgcolor="#FFFFFF">&nbsp;</td>
          <td width="85%" align="right" bgcolor="#FFFFFF"> <?
                				$class_arr[1] = "normal";
        if ($total_page>0 && $page>0){
         //   $name_arr = array("Previous","Next","You are currently in the first page","You are currently in the last page","You are currently in page %%","Page %%");
            page_display("",$page,$total_page,10,$search_arr,$sort_arr,$class_arr,$name_arr);
        }
        else{
        	echo "目前沒有任何文章";
        }
    ?></td>
        </tr>
      </table>      </td>
  </tr>
</table>
</td>
</tr>
</table>
</body>
</html>
