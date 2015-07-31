<? require("../../php-bin/function.php"); ?>
<?

    if ($_GET[type] == "S"){
    	$type = "S";
    	$title = "最新消息";
    }
    else{
    	$type = "T";
    	$title = "行事曆";
    }    
?>
<html>
<head>
<title>行事曆</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">

<link rel="stylesheet" href="../../js/style.css" type="text/css">
<LINK rel="stylesheet" href="../../js/calendar.css" type="text/css">
<script LANGUAGE="JavaScript" src="../../js/calendarevents.js" type="text/javascript"></script>
<script LANGUAGE="JavaScript" src="../../js/calendar.js" type="text/javascript"></script>
<script LANGUAGE="JavaScript" src="../../js/calendar-en.js" type="text/javascript"></script>
<style type="text/css">
<!--
.style1 {font-size: 4px}
-->
</style>
<form name="form1" method="post" action="add_cale_process.php" enctype="multipart/form-data">
<body>
<? if ($_GET[type] == "S"){ ?>
<img src="admin_label_news.gif" width="500" height="35"><br>
<? } else { ?>
<img src="admin_label.gif" width="500" height="35"><br>
<? } ?>
<script type='text/javascript' src='../../js/jquery-1.10.2.min.js'></script>

<?php if($_GET[type] == "S"){ ?>
<script>
	$(document).ready(function(){
		<?php if(isset($_GET['show_banner']) && !empty($_GET['show_banner'])){ ?>
			$('#banner_tr1').fadeIn(100,function(){
				$('#banner_tr2').fadeIn(100,function(){
					$('#banner_tr3').fadeIn(100);
				});
			});
		<?php } ?>
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
<? } ?>
<table width="840" border="0" cellpadding="5" cellspacing="0" class="table1">
    <tr> 
      <td  valign="top"> <table width="100%"  border="0" align="left" cellpadding="10" cellspacing="1" bgcolor="CCCCCC" class="admin_maintain_form_table">
        <tr bgcolor="ECECEC">
          <td colspan="2" class="subHead">&nbsp;新增事件</td>
        </tr>
		 <tr class="small">
          <td bgcolor="ECECEC">&nbsp;類別:</td>
          <td bgcolor="#FFFFFF">
            <select name="web_type" id="web_type">
            <?
				require_once("../../php-bin/get_web_type_selection.php");
		    	require_once("../../php-bin/get_web_type_select_html.php");
            ?>
            </select>
            <input name="type" type="hidden" id="type" value="<?=$type?>">
			</td>
        </tr>
        <tr bgcolor="FFFFFF">
          <td width="101" height="18" bgcolor="ECECEC"><font class="style8">&nbsp;標題（中文）:</font></td>
          <td width="396" height="18"><font class="style8">
            <input name="title_cn" type="text_" style='width:326px;' size="49" maxlength="50">
          </font></td>
        </tr>
        <tr bgcolor="FFFFFF">
          <td width="101" height="18" bgcolor="ECECEC"><font class="style8">&nbsp;標題（English）:</font></td>
          <td height="18"><font class="style8">
            <input name="title_en" type="text" style='width:326px;' maxlength="80">
          </font></td>
        </tr>
        <tr bgcolor="FFFFFF">
          <td height="18" bgcolor="ECECEC"><font class="style8">&nbsp;內容:</font></td>
          <td height="18"><font class="style8">
            <textarea  name="content" cols="38" rows="6"></textarea>
          </font></td>
        </tr>
        <!--tr bgcolor="FFFFFF">
          <td height="18" bgcolor="ECECEC"><font class="style8">&nbsp;最新消息排序:</font></td>
          <td height="18"><font class="style8">
            <input name="news_order" type="text" size="10" maxlength="80" value='10'>(數字越小越靠前)
          </font></td>
        </tr-->
        <tr bgcolor="FFFFFF">
          <td height="18" bgcolor="ECECEC">&nbsp;最新消息:</td>
          <td height="18">
			<input id='is_news' name="is_news" type="radio" value="Y" <?php if(isset($_GET['show_banner'])&&!empty($_GET['show_banner'])){ echo 'checked'; }?>>
            是
            <input id='is_news' name="is_news" type="radio" value="N" <?php if(!isset($_GET['show_banner'])|| empty($_GET['show_banner'])){ echo 'checked'; }?>>
			否
		  </td>
        </tr>
        <tr bgcolor="FFFFFF">
          <td height="18" bgcolor="ECECEC"><font class="style8">&nbsp;最新消息排序:</font></td>
          <td height="18"><font class="style8">
            <input name="news_order" type="text" size="10" maxlength="10" value='10'>(數字越小越靠前)
          </font></td>
        </tr>
        <!--tr id='banner_tr1' style='display:none;' bgcolor="FFFFFF">
          <td height="18" bgcolor="ECECEC">&nbsp;主頁Banner顯示:</td>
          <td height="18"><input name="is_banner" type="radio" value="Y">
            是
              <input name="is_banner" type="radio" value="N" checked>
          否</td>
        </tr>
        <tr id='banner_tr2' style='display:none;' bgcolor="FFFFFF">
          <td height="18" bgcolor="ECECEC"><font class="style8">&nbsp;主頁Banner圖片:</font></td>
          <td height="18">
            <input type="file" name="file_banner"><br/><font class="style8" style='color:red;'>(圖片規格：1001px*450px,大小不得超過1MB)</font>
         </td>
        </tr>
        <tr id='banner_tr3' style='display:none;' bgcolor="FFFFFF">
          <td height="18" bgcolor="ECECEC"><font class="style8">&nbsp;主頁Banner排序:</font></td>
          <td height="18"><font class="style8">
            <input name="banner_order" type="text" size="10" maxlength="80" value='10'>(數字越小越靠前)
          </font></td>
        </tr-->
        <tr bgcolor="FFFFFF">
          <td height="18" bgcolor="ECECEC"><font class="style8">&nbsp;日期:</font></td>
          <td height="18"><font class="style8">
      <input id='date_day' name="date_day" type="text" size="2" maxlength="2" class="style8">
      -
      <input id='date_month' name="date_month" type="text" size="2" maxlength="2" class="style8">
      -
	  <input id='date_year' name="date_year" type="text" size="4" maxlength="4" class="style8">
&nbsp;<img src="../../images/calendar.gif" alt="calendar" border="0" onClick="showCalendar('date_year','date_day','date_month','date_year','d m y')">&nbsp;DD-MM-YYYY </font></td>
        </tr>
        <tr bgcolor="FFFFFF">
          <td height="18" bgcolor="ECECEC">&nbsp;相關連結名稱:</td>
          <td height="18"><input name="link_text" type="text" id="link_text" size="40"></td>
        </tr>
        <tr bgcolor="FFFFFF">
          <td height="18" bgcolor="ECECEC">&nbsp;相關連結網址:</td>
          <td height="18"><input name="link_url" type="text" id="link_url" value="http://" size="40"></td>
        </tr>
        <tr bgcolor="FFFFFF">
          <td height="18" bgcolor="ECECEC">&nbsp;在新視窗開啟:</td>
          <td height="18"><input name="new_window" type="radio" value="Y" checked>
      是
        <input name="new_window" type="radio" value="N">
      否</td>
        </tr>
        <tr bgcolor="FFFFFF">
          <td height="18" bgcolor="ECECEC">&nbsp;附件:</td>
          <td height="18"><input type="file" name="file"></td>
        </tr><!-- 
        <tr bgcolor="FFFFFF">
          <td height="18" bgcolor="ECECEC">&nbsp;網頁類別:</td>
          <td height="18"><?=$title?>              </td>
        </tr>
         -->
        <tr bgcolor="ECECEC">
          <td><font class="style8">&nbsp; </font></td>
          <td><font class="style8">
            <input type="submit" name="Submit" value="    確定新增    ">
            <input type="reset" name="reset" value="重設">
			<button type='button' onclick='javascript:history.go(-1)'>返回</button>
          </font></td>
        </tr>
      </table></td>
	  <td valign='top'>
		<div style='width:200px;'>
			<table border="0" cellpadding="5" cellspacing="0">
			<?php if(isset($_GET['type']) && !empty($_GET['type']) && $_GET['type'] == 'S' ){ ?>
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
