<?php

header("Content-Type:text/html;charset=utf-8"); 
require_once("../../admin.inc.php");
// access control checking
//require_once("z_access_control.php");
// Selection
require_once("../../php-bin/function.php");

require_once("../../php-bin/pagedisplay.php");
$msg = "";
$u_name = "";
$u_type = "";
$u_status = "";
$t_name = EncodeHTMLTag($_GET["t_name"]);
$msg = EncodeHTMLTag($_GET["msg"]);  // GET status message
$orderby = "`order`";
$orderseq = "asc";


$page = 1;
$record_per_page = 15;   // records display each page
if (isset($_GET["page"]))
	$page = $_GET["page"]|0;

if (isset($_GET["orderby"]))
	$orderby = addslashes($_GET["orderby"]);

if (isset($_GET["seq"]))
	$orderseq = addslashes($_GET["seq"]);

$search_arr = array("t_name"=>$t_name);
$sort_arr = array("orderby"=>$orderby,"seq"=>$orderseq);

$class_arr = array("",
	"small border=0 cellpadding=0 cellspacing=0",
	"",
	"\"\" style=\"padding-left:2px;padding-right:2px;\""
);

$get_sql = "Select * FROM `tbl_notice`   WHERE 1 ";

if($t_name != "")
	$get_sql .= " and a_title LIKE '%" . $t_name. "%'";
	
if($_GET["type"] != "")
	$get_sql .= " and a_type=".$_GET["type"];

if($orderby!="")
	$get_sql .= " ORDER BY tbl_notice.a_date desc";

switch ($_GET['type']){
	case 1:
		$topic="通告下載";
	break;
	case 2:
		$topic="校園刊物";
	break;
	case 3:
		$topic="招標公告";
	break;
	case 4:
		$topic="學校報告及發展計劃";
	break;
	case 5:
		$topic="傳媒報道";
	break;
	case 6:
		$topic="境外學習活動";
	break;
}

$get_result = mysql_query($get_sql, $link_id);
$total_record = mysql_num_rows($get_result);
$offset = $record_per_page * ($page-1);
$total_page = ceil($total_record/$record_per_page);
$get_result = mysql_query($get_sql." limit $offset,$record_per_page;", $link_id);
mysql_close();
$msg=$_GET["msg"];

?><html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>通告下載管理</title>

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
<p class="title"><?php echo $topic;?></p>
<table width="650"  border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td><font class=style8 color=red>
                <?php   if ($msg!="") echo Msg($msg); ?>
              </font></td>
            </tr>
          </table>

<table width="650" border="0" cellpadding="10" cellspacing="1" class="small">
        <tr align="left" valign="top" bgcolor="#FFFFFF">
          <td width="30%" height="35"><span class="style2"><span class="style4"><?php echo $topic;?>管理</span>：</span></td>
          <td width="20%"><a href="down_add.php?type=<?php echo $_GET['type'];?>">新增</a></td>
          <td width="20%">&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
      </table>
<table width="650" height="191"  border="0" align="left" cellpadding="5" cellspacing="0" class="small">

  <tr> 
    <td>
      
      <hr style="height:1px;color=ECECEC;">
      <table width="100%" border="0" cellpadding="10" cellspacing="1" class="small">
        <tr align="left" valign="top">
          <td width="15%" bgcolor="#FFFFFF"><span class="style4">搜尋結果：</span></td>
          <td width="85%" align="right" bgcolor="#FFFFFF">
		  總共有 <?php echo $total_record?> 個資料
		  &nbsp;&nbsp;<font color=#CCCCCC>|</font>&nbsp;&nbsp;
		  每頁 <?php echo $record_per_page?> 個
		  &nbsp;&nbsp;<font color=#CCCCCC>|</font>&nbsp;&nbsp;
		  分 <?php echo $total_page?> 頁顯示 
	      </td>
        </tr>
      </table>
      <table width="100%"  border="0" cellpadding="10" cellspacing="1" bgcolor="CCCCCC">
        <tr valign="top" bgcolor="ECECEC" > <td width="8%" nowrap class="admin_maintain_header">序號</td>
          <td width="12%" nowrap class="admin_maintain_header">日期</td>
          <td nowrap class="admin_maintain_header">標題</td>
         
          <td width="13%" nowrap bgcolor="ECECEC" class="admin_maintain_header">更改及檢視</td>
          <td width="7%" nowrap bgcolor="ECECEC" class="admin_maintain_header">刪除</td>
        </tr>
        <?php
        // Display user's information
		
        while ($get_rows=mysql_fetch_array($get_result,MYSQL_BOTH)){
			
      ?>
        <tr align="left" valign="top" > <td nowrap bgcolor="#FFFFFF" ><font class="style8"> 
            <?php echo $get_rows["order"]?>
            </font></td>
          <td nowrap bgcolor="#FFFFFF" ><?php echo $get_rows["a_date"]?></td>
        
          <td nowrap bgcolor="#FFFFFF" ><font class="style8"> 
            <?php echo $get_rows["a_title"]?>
            </font></td>
          
          <td align="center" nowrap bgcolor="#FFFFFF" ><font class="style8" color="#0000FF"><a href="down_update.php?id=<?php echo $get_rows["a_id"]?>"><img src="../icons/xie.gif" width="16" height="16" border=0 alt=更改及檢視></a></font></td>
          <td align="center" nowrap bgcolor="#FFFFFF" ><font class="style8" color="#0000FF"><a href="down_delete.php?id=<?php echo $get_rows["a_id"]?>&fn=<?php echo $get_rows["docoment_name"]?>" onClick="return confirm('你確定要刪除這筆資料嗎?')"><img src="../icons/del.gif" alt="刪除" width="16" height="16" border="0"></a></font></td>
        </tr>
        <?php   } ?>
        <?php   if (mysql_num_rows($get_result)==0){ ?>
        <?php   } ?>
      </table>
        <?php   if (mysql_num_rows($get_result)==0){ ?>
    
      <div align="center">
        <table width="100%" border="0" cellpadding="10" cellspacing="1" class="small">
          <tr align="left" valign="top">
            <td align="center" valign="middle" bgcolor="#FFFFFF"><font class="style8 style6 style5">( 沒有找到有關 <?php echo $_GET["t_name"]?> 的資料 ) </font>&nbsp;&nbsp;&nbsp;&nbsp;<a href="#" onClick="history.go(-1)">返回</a></td>
          </tr>
        </table>
      </div>
      <?php   } ?>
      <table width="100%" border="0" cellpadding="10" cellspacing="1" class="small">
        <tr align="left" valign="top">
          <td width="15%" bgcolor="#FFFFFF">&nbsp;</td>
          <td width="85%" align="right" bgcolor="#FFFFFF"><?php
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
