<?
require_once("update_selection.php");
//calendarid post_id poster date title content posttime 
    if ($get_rows[type] == "S"){
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
<title><?php echo $get_rows['type']=='T' ? '行事曆' : '最新消息'; ?></title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link rel="stylesheet" href="../../js/style.css" type="text/css">
<LINK rel="stylesheet" href="../../js/calendar.css" type="text/css">
<script LANGUAGE="JavaScript" src="../../js/calendarevents.js" type="text/javascript"></script>
<script LANGUAGE="JavaScript" src="../../js/calendar.js" type="text/javascript"></script>
<script LANGUAGE="JavaScript" src="../../js/calendar-en.js" type="text/javascript"></script>
</head>
<script type='text/javascript' src='../../js/jquery-1.10.2.min.js'></script>
<?php if($get_rows['type'] == "S"){ ?>
<script>
	$(document).ready(function(){
		if($('#is_news').val()=='Y'){
			$('#banner_tr1').fadeIn(100,function(){
				$('#banner_tr2').fadeIn(100,function(){
					$('#banner_tr3').fadeIn(100);
				});
			});
		}
		$('#is_news').change(function(){
			$('#banner_tr1').fadeIn(100,function(){
				$('#banner_tr2').fadeIn(100,function(){
					$('#banner_tr3').fadeIn(100);
				});
			});
		});
		$('#is_news').siblings("#is_news").change(function(){
			$('#banner_tr1').fadeOut(100,function(){
				$('#banner_tr2').fadeOut(100,function(){
					$('#banner_tr3').fadeOut(100);
				});
			});
		});
	});
</script>
<?php } ?>
<form name="form1" method="post" action="update_cale_process.php?year=<?=$_GET[year]?>&month=<?=$_GET[month]?>&id=<?=$_GET[id]?>" enctype="multipart/form-data">
<body>
<? if ($get_rows['type'] == "S"){ ?>
<img src="admin_label_news.gif" width="500" height="35"><br>
<? } else { ?>
<img src="admin_label.gif" width="500" height="35"><br>
<? } ?>
<br>
  <table width="840" border="0" cellpadding="5" cellspacing="0" class="table1">
    <tr> 
      <td  valign="top"> <table width="100%"  border="0" align="left" cellpadding="10" cellspacing="1" bgcolor="CCCCCC" class="admin_maintain_form_table">
        <tr>
          <td bgcolor="ECECEC" class="subHead">&nbsp;更改事件</td>
          <td bgcolor="ECECEC">&nbsp;</td>
        </tr>
		 <tr>
          <td bgcolor="ECECEC">&nbsp;類別:</td>
          <td bgcolor="FFFFFF">
		  <select name="web_type" id="web_type">
          <?
			require_once("../../php-bin/get_web_type_selection.php");
			$type_selected = $get_rows[web_type];
		    require_once("../../php-bin/get_web_type_select_html.php");
          ?>
		  </select>
		  <input name="type" type="hidden" id="type" value="<?=$type?>">
		  </td>
        </tr>
        <tr>
          <td bgcolor="ECECEC"><font class="style8">&nbsp;標題（中文）:</font></td>
          <td bgcolor="FFFFFF"><font class="style8">
            <input type="text" name="title_cn" maxlength="50" style='width:420px;' value="<?=$get_rows[title_cn]?>">
          </font></td>
        </tr>
        <tr>
          <td bgcolor="ECECEC"><font class="style8">&nbsp;標題（English）:</font></td>
          <td bgcolor="FFFFFF"><font class="style8">
            <input type="text" name="title_en" maxlength="80" style='width:420px;' value="<?=$get_rows[title_en]?>">
          </font></td>
        </tr>
        <tr class="admin_maintain_form_contents">
          <td bgcolor="ECECEC" class="admin_maintain_form_contents"><font class="style8">&nbsp;內容:</font></td>
          <td bgcolor="FFFFFF"><font class="style8">
            <textarea  name="content" cols="50" rows="6"><?php echo $get_rows['content'];?></textarea>
          </font></td>
        </tr>
        <tr>
          <td bgcolor="ECECEC"><font class="style8">&nbsp;最新消息排序:</font></td>
          <td bgcolor="FFFFFF"><font class="style8">
            <input type="text" name="news_order" maxlength="80" style='width:420px;' value="<?=$get_rows[news_order]?>">
          </font></td>
        </tr>
        <tr>
          <td bgcolor="ECECEC">&nbsp;最新消息:</td>
          <td bgcolor="FFFFFF">
			  <input id='is_news' name="is_news" type="radio" value="Y" <? if($get_rows[is_news]=='Y') { echo "checked"; } ?>>是
			  <input id='is_news' name="is_news" type="radio" value="N" <? if($get_rows[is_news]=='N') { echo "checked"; } ?>>否
		  </td>
        </tr>
        <tr>
          <td bgcolor="ECECEC">&nbsp;最新消息排序:</td>
          <td bgcolor="FFFFFF">
			  <input name="news_order" type="text" size="10" maxlength="80" value='<?php echo $get_rows['news_order'];?>'>(數字越小越靠前)
		  </td>
        </tr>
        <!--tr id='banner_tr1' style='display:none;' bgcolor="FFFFFF">
          <td height="18" bgcolor="ECECEC">&nbsp;主頁Banner顯示:</td>
          <td height="18"><input name="is_banner" type="radio" value="Y" <? if($get_rows[is_banner]=='Y') { echo "checked"; } ?>>
            是
              <input name="is_banner" type="radio" value="N"  <? if($get_rows[is_banner]=='N') { echo "checked"; } ?>>
          否</td>
        </tr>
        <tr id='banner_tr2' style='display:none;' bgcolor="FFFFFF">
          <td height="18" bgcolor="ECECEC"><font class="style8">&nbsp;主頁Banner圖片:</font></td>
          <td height="18"><font class="style8">
			<?php if(isset($get_rows["banner_photo"])&&!empty($get_rows["banner_photo"])){?>
				<img src='../../userUpload/banner/small/<?php echo $get_rows["banner_photo"];?>'/>
			<?php }?><br/>
            <input type="file" name="file_banner">
			 <? if (file_exists("../../userUpload/banner/" . $get_rows["banner_photo"]) && $get_rows["banner_photo"] !=""  && $delete != 1){ ?>
&nbsp;<font color=red>(你目前已上載檔案 <a onClick="return confirm('你確定要刪除這份檔案嗎?')" href="?year=<?=$_GET[year]?>&month=<?=$_GET[month]?>&id=<?=$_GET[id]?>&Dfile=2" class="style8">刪除檔案</a> )
      <? } ?>
          </font><br/><font class="style8" style='color:red;'>(圖片規格：1001px*450px,大小不得超過1MB)</font></td>
        </tr>
        <tr id='banner_tr3' style='display:none;' bgcolor="FFFFFF">
          <td height="18" bgcolor="ECECEC"><font class="style8">&nbsp;主頁Banner排序:</font></td>
          <td height="18"><font class="style8">
            <input name="banner_order" type="text" size="10" maxlength="80" value='<?php echo $get_rows['banner_order'];?>'>(數字越小越靠前)
          </font></td>
        </tr-->
        <tr>
          <td bgcolor="ECECEC"><font class="style8">&nbsp;日期:</font></td>
          <td bgcolor="FFFFFF"><font class="style8">
            <input id='date_year' name="date_year" type="text" size="4" maxlength="4" class="style8" value="<?=substr($get_rows[date], 0,4)?>">
      -
      <input id='date_month' name="date_month" type="text" size="2" maxlength="2" class="style8" value="<?=substr($get_rows[date], 5,2)?>">
      -
      <input id='date_day' name="date_day" type="text" size="2" maxlength="2" class="style8" value="<?=substr($get_rows[date], 8,2)?>">
&nbsp;<img src="../../images/calendar.gif" alt="calendar" border="0" onClick="showCalendar('date_year','date_day','date_month','date_year','d m y')">&nbsp; YYYY-MM-DD</font></td>
        </tr>
        <tr>
          <td bgcolor="ECECEC">&nbsp;Link Text:</td>
          <td bgcolor="FFFFFF"><input name="link_text" type="text" id="link_text" value="<?=$get_rows[link_text]?>" size="50"></td>
        </tr>
        <tr>
          <td bgcolor="ECECEC">&nbsp;Link URL:</td>
          <td bgcolor="FFFFFF"><input name="link_url" type="text" id="link_url" value="<? echo ($get_rows[link_url] == "" ? "http://" : $get_rows[link_url])?>" size="50"></td>
        </tr>
        <tr>
          <td bgcolor="ECECEC">&nbsp;在新視窗開啟:</td>
          <td bgcolor="FFFFFF"><input name="new_window" type="radio" value="Y" <? echo ($get_rows[link_open_window] == "Y" ? "checked" : "")?>>
      是
        <input name="new_window" type="radio" value="N" <? echo ($get_rows[link_open_window] == "N" ? "checked" : "")?>>
      否</td>
        </tr>
        <tr>
          <td bgcolor="ECECEC">&nbsp;附件:</td>
          <td bgcolor="FFFFFF"><input type="file" name="file">
              <? if (file_exists("../../userUpload/attachment/" . $get_rows["file_name"]) && $get_rows["file_name"] !=""  && $delete != 1){ ?>
&nbsp;<font color=red>(你目前已上載檔案 <a onClick="return confirm('你確定要刪除這份檔案嗎?')" href="?year=<?=$_GET[year]?>&month=<?=$_GET[month]?>&id=<?=$_GET[id]?>&Dfile=1" class="style8">刪除檔案</a> )
      <? } ?>
    </font></td>
        </tr><!-- 
        <tr>
          <td bgcolor="ECECEC">網頁&nbsp;類別:</td>
          <td bgcolor="FFFFFF"><?=$title?>              </td>
        </tr>
         -->
        <tr>
          <td bgcolor="ECECEC"><font class="style8">&nbsp; </font></td>
          <td bgcolor="ECECEC"><input type="submit" name="Submit" value="    確定更改    ">
              <input type="reset" name="reset" value="重設">
			<button type='button' onclick='javascript:history.go(-1)'>返回</button>
		  </td>
        </tr>
      </table></td>
	  <td valign='top'>
		<div style='width:200px;'>
			<table border="0" cellpadding="5" cellspacing="0">
				<?php if($get_rows['type']=='S'){?>
				<tr>
					<td colspan='2'><span style='color:#0000FF;'>主頁Banner提示：</span></td>
				</tr>
				<tr>
					<td valign='top'><span style='color:red;'>*</span></td>
					<td>如想新增或修改主頁Banner的圖片，請先在「最新消息」按「是」，然後在「主頁Banner顯示」按「是」，<span style='color:red;'>最後請上載封面顯示圖片至「主頁Banner圖片」，將內容圖片添加至「附件」即可</span></td>
				</tr>
				<?php } ?>
				<tr>
					<td colspan='2'><span style='color:#0000FF;'>文件上傳提示：</span></td>
				</tr>
				<tr>
					<td valign='top'><span style='color:red;'>*</span></td>
					<td>所有上傳文件均不得超過8MB（包括圖片）</td>
				</tr>
			</table>
		</div>
	  </td>
    </tr>
</table>
</body>
</form>
</html>
