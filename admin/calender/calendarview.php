<?
require("../../php-bin/function.php");

	$query="SELECT * FROM `tbl_calendar` WHERE  `calendarid` = '$_GET[id]'";
	$result = mysql_query($query, $link_id);
	if (mysql_num_rows($result)!=0){
		while ($object=mysql_fetch_object($result)){
		// calendarid userid username date title content time classid year public schoolid
			$id=$object->calendarid;
			$title_m=$object->title_cn;
			$content=$object->content;
			$username=$object->poster;
			$timestr =$object->posttime;
			$date =$object->date;	
			$type_post =$object->type;			
			$link_text =$object->link_text;
			$link_url =$object->link_url;
			$new_window =$object->link_open_window;
			$file_name =$object->file_name;
			$is_news =$object->is_news;	
			$web_type =$object->web_type;
$content =ereg_replace("\n","<BR>",$content);
		}
	}

    if ($type_post == "S"){
    	$type = "S";
    	$title = "最新消息";
    }
    else{
    	$type = "T";
    	$title = "行事歷";
    } 


?>
<html>
<head>
<title>行事曆</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<LINK REL="StyleSheet" TYPE="text/css" HREF="../../js/style.css">
</head>
<body>
<? if ($type_post == "S"){ ?>
<img src="admin_label_news.gif" width="500" height="35"><br>
<? } else { ?>
<img src="admin_label.gif" width="500" height="35"><br>
<? } ?>
<table width="650" border="0" cellspacing="0" cellpadding="5">
  <tr>
    <td>
	
	<table width="100%"  border="0" cellspacing="1" cellpadding="10">
      <tr>
        <td><font class=style8 color=red>
          <? if ($_GET['msg']!="") echo "<br>".$_GET['msg']; ?>
        </font></td>
      </tr>
    </table>
	<br>

<table width="100%" border="0" cellpadding="10" cellspacing="1" bgcolor="CCCCCC" class=small>
  <tr bgcolor="ECECEC"> 
    <td colspan="3">
      <span class="subHead">事件內容</span>      ( 
      <?=$username?>
      )</td>
  </tr>
  <tr> 
    <td width="55" bgcolor="ECECEC">日期:</td>
    <td colspan="2" bgcolor="FFFFFF">
      <?=$date?>
      <? if ( $is_news == 'Y') { echo " ( 最新消息 ) "; } ?>
</td>
    </tr>
  <tr>
    <td bgcolor="ECECEC">類別:</td>
    <td colspan="2" bgcolor="FFFFFF">
		  <select name="web_type" id="web_type" disabled>
          <?
			require_once("../../php-bin/get_web_type_selection.php");
			$type_selected = $web_type;
		    require_once("../../php-bin/get_web_type_select_html.php");
          ?>
		  </select>
	</td>
  </tr>
  <tr> 
    <td width="55" bgcolor="ECECEC">標題:</td>
    <td colspan="2" bgcolor="FFFFFF">
      <?=$title_m?></td>
    </tr>
  <tr> 
    <td valign="top" bgcolor="ECECEC">內容:</td>
    <td colspan="2" valign="top" bgcolor="FFFFFF"> 
      <?=$content?>
    </td>
  </tr>
  <tr>
    <td valign="top" bgcolor="ECECEC">連結:</td>
    <td colspan="2" valign="top" bgcolor="FFFFFF"><? echo "<a href=$link_url ". ($new_window == "Y" ? "target=_blank":"") .">$link_text</a>"; ?></td>
  </tr>
  <tr>
    <td valign="top" bgcolor="ECECEC">附件:</td>
    <td width="260" valign="top" bgcolor="FFFFFF"><div align="left">
    <?
    if ($file_name != ""){
    ?>
    <a href="../../userUpload/attachment/<?=$file_name?>" target="_blank">下載</a>
    <?
    }
    ?>
    </div></td>
    <td width="261" valign="top" bgcolor="FFFFFF"><div align="right"><font size="-1">張貼日期:
          <?=$timestr?>
          <? if ($_SESSION[admin_level] == 1){ ?>
            <a href=update_cale.php?year=<?=$_GET[year]?>&month=<?=$_GET[month]?>&id=<?=$_GET['id']?>>[修改]</a> 
			<a href=cale_delete.php?type=<?=$type?>&year=<?=$_GET[year]?>&month=<?=$_GET[month]?>&id=<?=$_GET['id']?> onClick="return confirm('你確定要刪除這筆資料嗎?')">[刪除]</a>
          <?
        }
        ?>
    </font> </div></td>
  </tr>
</table>
</td>
  </tr>
</table>

<p><a href=calendar.php?type=<?=$type?>&year=<?=$_GET[year]?>&month=<?=$_GET[month]?>&hi_ST=<?=$_GET[hi_ST]?>&show_banner=<?php echo $_GET['show_banner']; ?>><small>回上一頁</small></a></p>
</body>
</html>