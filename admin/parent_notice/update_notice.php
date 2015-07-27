<?php
require_once("update_selection.php");

$sql_category = "SELECT category FROM `tbl_notice` GROUP BY category";
$result_category = mysql_query($sql_category,$link_id);

?>
<html>
<head>
<title>家長通告</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link rel="stylesheet" href="../../js/style.css" type="text/css">
<LINK rel="stylesheet" href="../../js/calendar.css" type="text/css">
<script LANGUAGE="JavaScript" src="../../js/calendarevents.js" type="text/javascript"></script>
<script LANGUAGE="JavaScript" src="../../js/calendar.js" type="text/javascript"></script>
<script LANGUAGE="JavaScript" src="../../js/calendar-en.js" type="text/javascript"></script>
<form name="form1" method="post" action="update_notice_process.php?id=<?=$get_rows[noticeid]?>" enctype="multipart/form-data">
<body>
<script type='text/javascript' src='http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js'></script>
<script>
	$(document).ready(function(){
		//init
		if($('#is_news').val()){
			$('#news_tr1').fadeIn(100,function(){
				$('#banner_tr1').fadeIn(100,function(){
					$('#banner_tr2').fadeIn(100,function(){
						$('#banner_tr3').fadeIn(100);
					});
				});
			});
		}
		
		$('#is_news').change(function(){
			$('#news_tr1').fadeIn(100,function(){
				$('#banner_tr1').fadeIn(100,function(){
					$('#banner_tr2').fadeIn(100,function(){
						$('#banner_tr3').fadeIn(100);
					});
				});
			});
		});
		$('#is_news').siblings("#is_news").change(function(){
			$('#news_tr1').fadeOut(100,function(){
				$('#banner_tr1').fadeOut(100,function(){
					$('#banner_tr2').fadeOut(100,function(){
						$('#banner_tr3').fadeOut(100);
					});
				});
			});
		});
		
		<?php if($get_rows['docoment_type'] == 'S'){ ?>
				$('#child_type').fadeIn();
		<?php } ?>
		
		
		$("#doc_type").change(function(){
			var type = $("#doc_type").find("option:selected").val();
			if(type == 'S'){
				$('#child_type').fadeIn();
			}else{
				$('#child_type').val('');
				$('#child_type').fadeOut();
			}
			
			if(type == 'OA' || type == 'LA'){
				if($('#del_file').length > 0){
					alert('附件為空時，才可選擇傑出成就');
				}else{
					$('#file_tr').hide();
					$('#file').val('');
				}
			}else{
				$('#file_tr').show();
			}
		});
	});
</script>

  <p><img src="admin_label.gif" width="500" height="35"></p>
  <table width="850" border="0" cellpadding="5" cellspacing="0" class="table1">
    <tr> 
      <td  valign="top"> <table width="100%"  border="0" align="left" cellpadding="10" cellspacing="1" bgcolor="CCCCCC">
        <tr bgcolor="ECECEC">
          <td bgcolor="ECECEC" class="subHead">更改事件</td>
          <td style='text-align:right;' bgcolor="ECECEC" class="subHead"><a href="c_parent.php">回上一頁</a></td>
        </tr>
        <tr>
          <td height="25" bgcolor="ECECEC">&nbsp;年度:</td>
          <td height="18" bgcolor="FFFFFF">
			<select name="school_year" id="school_year">
			<?php
			$now_Year = date("Y")|0;
			$doc_Year_str = $get_rows[school_year];
			$start_Year = $now_Year+2;
			$end_Year = 2000;

			for( $i=$start_Year; $i>=$end_Year; $i-- )
			{
				if( ($i.'-'.($i+1)) == $doc_Year_str )
					echo '<option value="'.$i.'-'.($i+1).'" selected>'.$i.'-'.($i+1).'</option>';
				else
					echo '<option value="'.$i.'-'.($i+1).'">'.$i.'-'.($i+1).'</option>';
			}
			?>
			</select>
			</td>
        </tr>
        <tr>
          <td height="25" bgcolor="ECECEC">&nbsp;網頁項目:</td>
          <td height="18" bgcolor="FFFFFF">
		  <select name="type" id="doc_type">
            <!--option value="N" <? if ($get_rows["docoment_type"]=="N") { echo "selected"; } ?>>最新消息</option-->
            <option value="PC" <? if ($get_rows["docoment_type"]=="PC") { echo "selected"; } ?>>家校園地</option>
            <option value="P" <? if ($get_rows["docoment_type"]=="P") { echo "selected"; } ?>>家長通告</option>
            <option value="SR" <? if ($get_rows["docoment_type"]=="SR") { echo "selected"; } ?>>學校報告</option>
            <option value="D" <? if ($get_rows["docoment_type"]=="D") { echo "selected"; } ?>>發展計劃</option>
            <option value="S" <? if ($get_rows["docoment_type"]=="S") { echo "selected"; } ?>>學校發展計劃</option>
            <option value="R" <? if ($get_rows["docoment_type"]=="R") { echo "selected"; } ?>>學校發展報告</option>
            <option value="SH" <? if ($get_rows["docoment_type"]=="SH") { echo "selected"; } ?>>學校發展歷程</option>
            <option value="SI" <? if ($get_rows["docoment_type"]=="SI") { echo "selected"; } ?>>學生會資訊</option>
            <option value="MS" <? if ($get_rows["docoment_type"]=="MS") { echo "selected"; } ?>>影片庫</option>
            <option value="OA" <? if ($get_rows["docoment_type"]=="OA") { echo "selected"; } ?>>傑出成就</option>
            <option value="LA" <? if ($get_rows["docoment_type"]=="LA") { echo "selected"; } ?>>學習活動</option>
            <option value="SN" <? if ($get_rows["docoment_type"]=="SN") { echo "selected"; } ?>>學生報</option>
		  </select>
		  <select name="child_type" id="child_type" style='display:none;'>
            <option value="">請選擇</option>
            <option value="1" <? if ($get_rows["doc_child_type"]=="1") { echo "selected"; } ?>>五年發展計劃</option>
            <option value="2" <? if ($get_rows["doc_child_type"]=="2") { echo "selected"; } ?>>三年發展計劃</option>
            <option value="3" <? if ($get_rows["doc_child_type"]=="3") { echo "selected"; } ?>>三年多元活動津貼計劃</option>
            <option value="4" <? if ($get_rows["doc_child_type"]=="4") { echo "selected"; } ?>>週年計劃</option>
            <option value="5" <? if ($get_rows["doc_child_type"]=="5") { echo "selected"; } ?>>發展津貼計劃</option>
            <option value="6" <? if ($get_rows["doc_child_type"]=="6") { echo "selected"; } ?>>學生支援</option>
            <option value="7" <? if ($get_rows["doc_child_type"]=="7") { echo "selected"; } ?>>其他</option>
		  </select>

          </td>
        </tr>
        <tr class="admin_maintain_form_table">
          <td height="18" bgcolor="ECECEC"><font class="style8">&nbsp;類別 :</font></td>
          <td height="18" bgcolor="FFFFFF">
		  <select name="web_type" id="web_type">
          <?
			require_once("../../php-bin/get_web_type_selection.php");
			$type_selected = $get_rows[web_type];
		    require_once("../../php-bin/get_web_type_select_html.php");
          ?>
		  </select>
          </td>
        </tr>
        <tr>
          <td width="118" height="25" bgcolor="ECECEC"><font class="style8">&nbsp;編號(期數) :</font></td>
          <td width="362" height="18" bgcolor="FFFFFF"><font class="style8">
            <input name="no" type="text" id="no" value="<?=$get_rows[serialno]?>" size="40" maxlength="40">
          </font></td>
        </tr>
        <tr class="admin_maintain_form_contents">
          <td height="25" bgcolor="ECECEC" class="admin_maintain_form_contents"><font class="style8">&nbsp;對象 :</font></td>
          <td height="18" bgcolor="FFFFFF"><font class="style8">
            <input name="target" type="text" id="target" value="<?=$get_rows[target]?>" size="40">
          </font></td>
        </tr>
        <tr class="admin_maintain_form_contents">
          <td height="25" bgcolor="ECECEC" class="admin_maintain_form_contents"><font class="style8">&nbsp;標題（中文）:</font></td>
          <td height="18" bgcolor="FFFFFF"><font class="style8">
            <input name="title_cn" type="text" id="title_cn" value="<?=$get_rows[title_cn]?>" size="40">
          </font></td>
        </tr>
        <tr bgcolor="FFFFFF">
          <td width="101" height="18" bgcolor="ECECEC"><font class="style8">&nbsp;標題（English）:</font></td>
          <td width="496" height="18"><font class="style8">
            <input name="title_en" type="text" style='width:326px;' value="<?=$get_rows[title_en]?>" maxlength="80">
          </font></td>
        </tr>
        <tr class="admin_maintain_form_contents">
          <td height="25" bgcolor="ECECEC" class="admin_maintain_form_contents"><font class="style8">&nbsp;描述 :</font></td>
          <td height="18" bgcolor="FFFFFF"><font class="style8">
            <textarea name="description" type="" id="description" style='width:273px;height:70px;resize:none;'><?=$get_rows[description]?></textarea>
          </font></td>
        </tr>
        <tr class="admin_maintain_form_table">
          <td bgcolor="ECECEC">&nbsp;Link Text:</td>
          <td bgcolor="FFFFFF"><input name="link_text" type="text" id="link_text" value="<?=$get_rows[link_text]?>" size="40"></td>
        </tr>
        <tr class="admin_maintain_form_table">
          <td bgcolor="ECECEC">&nbsp;Link URL:</td>
          <td bgcolor="FFFFFF"><input name="link_url" type="text" id="link_url" value="<? echo ($get_rows[link_url] == "" ? "http://" : $get_rows[link_url])?>" size="40"><span style='color:red;'>連接地址務必以 http:// 開頭</span></td>
        </tr>
        <tr class="admin_maintain_form_table">
          <td bgcolor="ECECEC">&nbsp;在新視窗開啟:</td>
          <td bgcolor="FFFFFF"><input name="new_window" type="radio" value="Y" <? echo ($get_rows[link_open_window] == "Y" ? "checked" : "")?>>
    是
      <input name="new_window" type="radio" value="N" <? echo ($get_rows[link_open_window] == "N" ? "checked" : "")?>>
    否</td>
        </tr>
        <tr>
          <td height="25" bgcolor="ECECEC"><font class="style8">&nbsp;日期:</font></td>
          <td height="18" bgcolor="FFFFFF"><font class="style8">
      <input id='date_day' name="date_day" type="text" size="2" maxlength="2" class="style8" value="<?=substr($get_rows[date], 8,2)?>">
      -
      <input id='date_month' name="date_month" type="text" size="2" maxlength="2" class="style8" value="<?=substr($get_rows[date], 5,2)?>">
      -
	  <input id='date_year' name="date_year" type="text" size="4" maxlength="4" class="style8" value="<?=substr($get_rows[date], 0,4)?>">
&nbsp;<img src="../../images/calendar.gif" alt="calendar" border="0" onClick="showCalendar('date_year','date_day','date_month','date_year','d m y')">&nbsp; DD-MM-YYYY</font></td>
        </tr>
        <!--tr>
          <td height="25" valign="top" bgcolor="ECECEC">&nbsp;有效日期:</td>
          <td height="18" valign="top" bgcolor="FFFFFF"><font class="style8">
      <input id='date_day2' name="date_day2" type="text" size="2" maxlength="2" class="style8" value="<?=substr($get_rows[exp_date], 8,2)?>">
      -
      <input id='date_month2' name="date_month2" type="text" size="2" maxlength="2" class="style8" value="<?=substr($get_rows[exp_date], 5,2)?>">
      -
	  <input id='date_year2' name="date_year2" type="text" size="4" maxlength="4" class="style8" value="<?=substr($get_rows[exp_date], 0,4)?>">
      
&nbsp;<img src="../../images/calendar.gif" alt="calendar" border="0" onClick="showCalendar('date_year2','date_day2','date_month2','date_year2','d m y')">&nbsp; DD-MM-YYYY</font></td>
        </tr-->
        <tr id='file_tr' bgcolor="FFFFFF">
          <td height="25" valign="top" bgcolor="ECECEC">&nbsp;附件:</td>
          <td height="18" valign="top" bgcolor="FFFFFF"><input id='file' type="file" name="file">
              <br>
              <? if (file_exists("../../userUpload/attachment/" . $get_rows["docoment_name"]) && $get_rows["docoment_name"] !=""  && $delete != 1){ ?>
&nbsp;<font color=red>(你目前而上載檔案
      <?=$get_rows["docoment_name"]?>
      <a onClick="return confirm('你確定要刪除這份檔案嗎?')" href="?year=<?=$_GET[year]?>&month=<?=$_GET[month]?>&id=<?=$_GET[id]?>&Dfile=1" class="style8">刪除檔案</a> )</font>
      <? } ?>
          </td>
        </tr>
        <tr class="admin_maintain_form_table">
          <td bgcolor="ECECEC">&nbsp;最新消息:</td>
          <td bgcolor="FFFFFF">
            <input id='is_news' name="is_news" type="radio" value="Y" <? if($get_rows[is_news]=='Y') { echo "checked"; } ?>>
            是
            <input id='is_news' name="is_news" type="radio" value="N" <? if($get_rows[is_news]=='N') { echo "checked"; } ?>>
            否 </td>
        </tr>
		 <tr id='news_tr1' style='display:none;' bgcolor="FFFFFF">
          <td height="18" bgcolor="ECECEC">&nbsp;最新消息排序:</td>
          <td height="18">
		  <input id='news_order' name="news_order" type="text" value="<?php echo $get_rows["news_order"];?>"><span style='color:red'>数字越小越靠前</span>
		  </td>
        </tr>
        <tr id='banner_tr1' style='display:none;' bgcolor="FFFFFF">
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
&nbsp;<font color=red>(你目前已上載檔案 <a id='del_file' onClick="return confirm('你確定要刪除這份檔案嗎?')" href="?year=<?=$_GET[year]?>&month=<?=$_GET[month]?>&id=<?=$_GET[id]?>&Dfile=3" class="style8">刪除檔案</a> )
      <? } ?>
          </font></td>
        </tr>
        <tr id='banner_tr3' style='display:none;' bgcolor="FFFFFF">
          <td height="18" bgcolor="ECECEC"><font class="style8">&nbsp;主頁Banner排序:</font></td>
          <td height="18"><font class="style8">
            <input name="banner_order" type="text" size="10" maxlength="80" value='<?php echo $get_rows['banner_order'];?>'>(數字越小越靠前)
          </font></td>
        </tr>
        <tr>
          <td height="25" valign="top" bgcolor="ECECEC">&nbsp;封面圖片:</td>
          <td height="18" valign="top" bgcolor="FFFFFF"><input type="file" name="cover_Photo">
              <br>
              <? if (file_exists("../../userUpload/cover_Photo/" . $get_rows["cover_Photo"]) && $get_rows["cover_Photo"] !=""  && $delete != 1){ ?>
&nbsp;<font color=red>(你目前已上載檔案
      <?=$get_rows["cover_Photo"]?>
      <a href="?year=<?=$_GET[year]?>&month=<?=$_GET[month]?>&id=<?=$_GET[id]?>&Dfile=2" onClick="return confirm('你確定要刪除這份檔案嗎?')" class="style8">刪除檔案</a> )</font>
      <? } ?>
          <p style='color:red;'>(學生報專用 建議圖片大小200*150)</p></td>
        </tr>
		<!--tr>
			<td height="18" bgcolor="ECECEC">&nbsp;瀏覽權限:</td>
			<td height="18" bgcolor="FFFFFF">
					<select name='acc_type' id='acc_type'>
						<option value='N' <? if ($get_rows["access_type"]=="N") { echo "selected"; } ?>>遊客</option>
						<option value='S' <? if ($get_rows["access_type"]=="S") { echo "selected"; } ?>>學生</option>
						<option value='T' <? if ($get_rows["access_type"]=="T") { echo "selected"; } ?>>教師</option>
						<option value='P' <? if ($get_rows["access_type"]=="P") { echo "selected"; } ?>>家長</option>
					</select>
			</td>
		</tr-->
        <tr bgcolor="ECECEC">
          <td bgcolor="ECECEC"><font class="style8">&nbsp; </font></td>
          <td><input type="submit" name="Submit" value="    確定更改    ">
              <input type="reset" name="reset" value="重設"></td>
        </tr>
      </table>
	  </td>
	  <td valign='top'>
		<div style='width:200px;'>
			<table border="0" cellpadding="5" cellspacing="0">
				<!--tr>
					<td colspan='2'><span style='color:#0000FF;'>影片庫提示：</span></td>
				</tr>
				<tr>
					<td valign='top'><span style='color:red;'>*</span></td>
					<td>如想新增或修改影片庫連接，請將影片連接填寫至「相關連結網址」,影片名稱填寫至「相關連結名稱」,圖片添加至附件即可</td>
				</tr-->
				<tr>
					<td colspan='2'><span style='color:#0000FF;'>學校發展計劃/報告：</span></td>
				</tr>
				<tr>
					<td valign='top'><span style='color:red;'>*</span></td>
					<td>在網頁項目內分為「學校發展計劃」與「學校發展報告」,這兩個同為「學校發展計劃/報告」的內容</td>
				</tr>
				<tr>
					<td colspan='2'><span style='color:#0000FF;'>添加主頁Banner提示：</span></td>
				</tr>
				<tr>
					<td valign='top'><span style='color:red;'>*</span></td>
					<td>如想新增或修改主頁Banner的圖片，請先在「最新消息」按「是」，然後在「主頁Banner顯示」按「是」，<span style='color:red;'>最後請上載封面顯示圖片至「主頁Banner圖片」，將內容圖片添加至「附件」即可</span></td>
				</tr>
				<tr>
					<td colspan='2'><span style='color:#0000FF;'>學生報提示：</span></td>
				</tr>
				<tr>
					<td valign='top'><span style='color:red;'>*</span></td>
					<td>在網頁項目選擇「學生報」，PDF添加至附件，顯示圖片添加至封面圖片即可。</td>
				</tr>
				<tr>
					<td colspan='2'><span style='color:#0000FF;'>「傑出成就」，「學習活動」提示：</span></td>
				</tr>
				<tr>
					<td valign='top'><span style='color:red;'>*</span></td>
					<td>內容圖片的添加，請在添加完文字信息（eg:描述），并自動跳轉至列表后，在點擊圖片連接至圖片添加頁進行操作。（選擇該欄目時，附件將自動隱藏，所以請不要嘗試添加附件）</td>
				</tr>
				<tr>
					<td colspan='2'><span style='color:#0000FF;'>文件上傳提示：</span></td>
				</tr>
				<tr>
					<td valign='top'><span style='color:red;'>*</span></td>
					<td>所有上傳文件均不得超過8MB（包括圖片）。圖片格式僅支持：jpg，pdf，爲了瀏覽器的正常顯示，請不要上載其他格式的圖片文件</td>
				</tr>
			</table>
		</div>
	  </td>
    </tr>
</table>

  <p><a href=c_parent.php?school_year=<?=$_GET[school_year]?>&month=<?=$_GET[month]?>&id=<?=$_GET[id]?>>回上一頁</a></p>
</body>
</form>
</html>
