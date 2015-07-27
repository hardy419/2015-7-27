<?
require("../../php-bin/function.php");

	$query="SELECT * FROM `tbl_development` WHERE  `development_id` = '$_GET[id]'";
	$result = mysql_query($query, $link_id);
	if (mysql_num_rows($result)!=0){
		while ($object=mysql_fetch_object($result)){
		// calendarid userid username date title content time classid year public schoolid
			$id=$object->calendarid;
			$title_m=$object->title;
			$content=$object->content;
			$teacher_name=$object->teacher_name;
			$username=$object->poster;
			$timestr =$object->posttime;
			$date =$object->date;
			$link_url =$object->link_url;
			$new_window =$object->link_open_window;
			$develop_type =$object->develop_type;
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
<img src="admin_label_news.gif" width="500" height="35"><br>

<table width="650" border="0" cellspacing="0" cellpadding="5">
  <tr>
    <td>
	
	<table width="100%"  border="0" cellspacing="1" cellpadding="10">
      <tr>
        <td><font class=style8 color=red>
          <? if ($msg!="") echo "<br>".$msg; ?>
        </font></td>
      </tr>
    </table>
	<br>

<table width="100%" border="0" cellpadding="10" cellspacing="1" bgcolor="CCCCCC" class=small>
  <tr bgcolor="ECECEC"> 
    <td colspan="2">
      <span class="subHead">事件內容</span>      ( 
      <?=$username?>
      )</td>
  </tr>
  <tr>
    <td bgcolor="ECECEC">類別:</td>
    <td bgcolor="FFFFFF">
      <select name="develop_type" id="develop_type" disabled>
        <?
			require_once("../../php-bin/get_develop_type_selection.php");
			$type_selected = $develop_type;
		    require_once("../../php-bin/get_develop_type_select_html.php");
          ?>
      </select>
    </td>
  </tr>
  <tr> 
    <td width="75" bgcolor="ECECEC">日期:</td>
    <td bgcolor="FFFFFF">
      <?=$date?>
</td>
    </tr>
  <tr> 
    <td width="75" bgcolor="ECECEC">標題:</td>
    <td bgcolor="FFFFFF">
      <?=$title_m?></td>
    </tr>
  <tr> 
    <td valign="top" bgcolor="ECECEC">內容:</td>
    <td valign="top" bgcolor="FFFFFF"> 
      <?=$content?>
    </td>
  </tr>
  <tr>
    <td valign="top" bgcolor="ECECEC">老師名稱:</td>
    <td valign="top" bgcolor="FFFFFF"><? echo $teacher_name; ?></td>
  </tr>
  <tr>
    <td valign="top" bgcolor="ECECEC">網頁檔案名稱:</td>
    <td valign="top" bgcolor="FFFFFF"><? echo $link_url; ?></td>
  </tr>
  <tr>
    <td valign="top" bgcolor="ECECEC"><font size="-1">張貼日期</font>:</td>
    <td bgcolor="FFFFFF"><div align="left">
    </div>      <div align="left"><font size="-1"><?=$timestr?>
            <? if ($_SESSION[admin_level] == 1){ ?>
              <a href=update_deve.php?year=<?=$_GET[year]?>&month=<?=$_GET[month]?>&id=<?=$_GET['id']?>&develop_type=<?=$_GET[develop_type]?>>[修改]</a> 
			  <a href=deve_delete.php?type=<?=$type?>&year=<?=$_GET[year]?>&month=<?=$_GET[month]?>&id=<?=$_GET['id']?>&develop_type=<?=$_GET[develop_type]?> onClick="return confirm('你確定要刪除這筆資料嗎?')">[刪除]</a>
            <?
        }
        ?>
    </font> </div></td>
    </tr>
</table>
</td>
  </tr>
</table>

<p><a href=development.php?type=<?=$type?>&year=<?=$_GET[year]?>&month=<?=$_GET[month]?>&develop_type=<?=$_GET[develop_type]?>><small>回上一頁</small></a></p>
</body>
</html>