<?php
	require("../../php-bin/function.php");
	
	$school_year = $_GET[school_year];

    	//$type = "P";
    	//$title = "家長通告";
    	
	$year = date("Y");
	$month = date("m");
	$day = date("d");

	$year2 = date("Y");
	$month2 = date("m");
	$day2 = date("d");
		
	$sql_category = "SELECT category FROM `tbl_notice` GROUP BY category";
	$result_category = mysql_query($sql_category,$link_id);

?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title></title>
</head>
<link rel="stylesheet" href="../../js/style.css" type="text/css">
<LINK rel="stylesheet" href="../../js/calendar.css" type="text/css">
<script LANGUAGE="JavaScript" src="../../js/calendarevents.js" type="text/javascript"></script>
<script LANGUAGE="JavaScript" src="../../js/calendar.js" type="text/javascript"></script>
<script LANGUAGE="JavaScript" src="../../js/calendar-en.js" type="text/javascript"></script>
<script type='text/javascript' src='http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js'></script>
<body>

<img src="admin_label.gif" width="500" height="35">
<script>
	$(document).ready(function(){
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
		$("#doc_type").change(function(){
			var type = $("#doc_type").find("option:selected").val();
			if(type == 'S'){
				$('#child_type').fadeIn();
			}else{
				$('#child_type').val('');
				$('#child_type').fadeOut();
			}
			
			if(type == 'OA' || type == 'LA'){
				$('#file_tr').hide();
				$('#file').val('');
			}else{
				$('#file_tr').show();
			}
		});
	});
</script>
<form name="form1" method="post" action="add_notice_process.php" enctype="multipart/form-data">
<table width="850" border="0" cellpadding="5" cellspacing="0" class="table1">
    <tr> 
      <td  valign="top"> <table width="100%"  border="0" align="left" cellpadding="10" cellspacing="1" bgcolor="CCCCCC" class="admin_maintain_form_table">
        <tr bgcolor="ECECEC">
          <td class="subHead">新增</td>
          <td style='text-align:right;' class="subHead"><a href="c_parent.php">回上一頁</a></td>
        </tr>
        <tr>
          <td height="18" width='118' bgcolor="ECECEC">&nbsp;年度:</td>
          <td height="18" bgcolor="FFFFFF">
		  <select name="school_year" id="school_year">
		  <?php
			$now_Year = date("Y")|0;
			$now_Month = date("m")|0;
			$start_Year = $now_Year+2;
			$end_Year = 2000;

			for( $i=$start_Year; $i>=$end_Year; $i-- )
			{
				if( ($i==$now_Year && $now_Month>=9) || ($i==$now_Year-1 && $now_Month<=8) )
					echo '<option value="'.$i.'-'.($i+1).'" selected>'.$i.'-'.($i+1).'</option>';
				else
					echo '<option value="'.$i.'-'.($i+1).'">'.$i.'-'.($i+1).'</option>';
			}
			?>
			</select>
          </td>
        </tr>
        <tr>
          <td height="18" bgcolor="ECECEC">&nbsp;網頁項目:</td>
          <td height="18" bgcolor="FFFFFF">
		  <select name="type" id="doc_type">
            <!--option value="N">最新消息</option-->
            <option value="PC">家校園地</option>
            <option value="P">家長通告</option>
            <option value="SR">學校報告</option>
            <option value="D">發展計劃</option>
            <option value="S">學校發展計劃</option>
            <option value="R">學校發展報告</option>
            <option value="SH">學校發展歷程</option>
            <option value="SI">學生會資訊</option>
            <option value="MS">影片庫</option>
            <option value="OA">傑出成就</option>
            <option value="LA">學習活動</option>
            <option value="SN">學生報</option>
		  </select>
		  <select name='child_type' id='child_type' style='display:none;'>
            <option value="">請選擇</option>
            <option value="1">五年發展計劃</option>
            <option value="2">三年發展計劃</option>
            <option value="3">三年多元活動津貼計劃</option>
            <option value="4">週年計劃</option>
            <option value="5">發展津貼計劃</option>
            <option value="6">學生支援</option>
            <option value="7">其他</option>
		  </select>
		  </td>
        </tr>
        <tr>
          <td height="18" bgcolor="ECECEC"><font class="style8">&nbsp;類別 :</font></td>
          <td height="18" bgcolor="FFFFFF">
                    <select name="web_type" id="web_type">
          <?
			require_once("../../php-bin/get_web_type_selection.php");
		    require_once("../../php-bin/get_web_type_select_html.php");
          ?>
            </select>
		  </td>
        </tr>
        <tr>
          <td height="18" bgcolor="ECECEC"><font class="style8"> &nbsp;編號(期數) :</font></td>
          <td height="18" bgcolor="FFFFFF"><font class="style8">
            <input name="no" type="text" id="no" size="40" maxlength="40">
          </font></td>
        </tr>
        <tr>
          <td height="18" bgcolor="ECECEC"><font class="style8"> &nbsp;對象 :</font></td>
          <td height="18" bgcolor="FFFFFF"><font class="style8">
            <input name="target" type="text" id="target" value="" size="40">
          </font></td>
        </tr>
        <tr>
          <td height="18" bgcolor="ECECEC"><font class="style8"> &nbsp;標題(中文) :</font></td>
          <td height="18" bgcolor="FFFFFF"><font class="style8">
            <input name="title_cn" type="text" id="title_cn" value="" size="40">
          </font></td>
        </tr>
        <tr>
          <td height="18" bgcolor="ECECEC"><font class="style8"> &nbsp;標題(English) :</font></td>
          <td height="18" bgcolor="FFFFFF"><font class="style8">
            <input name="title_en" type="text" id="title_en" value="" size="40">
          </font></td>
        </tr>
        <tr>
          <td height="18" bgcolor="ECECEC"><font class="style8"> &nbsp;描述 :</font></td>
          <td height="18" bgcolor="FFFFFF"><font class="style8">
            <textarea name="description" type="" id="description" style='width:273px;height:70px;resize:none;'></textarea>
          </font></td>
        </tr>
        <tr bgcolor="FFFFFF">
          <td height="18" bgcolor="ECECEC">&nbsp;相關連結名稱:</td>
          <td height="18"><input name="link_text" type="text" id="link_text" size="40"></td>
        </tr>
        <tr bgcolor="FFFFFF">
          <td height="18" bgcolor="ECECEC">&nbsp;相關連結網址:</td>
          <td height="18"><input name="link_url" type="text" id="link_url" value="http://" size="40"><span style='color:red;'>連接地址務必以 http:// 開頭</span></td>
        </tr>
        <tr bgcolor="FFFFFF">
          <td height="18" bgcolor="ECECEC">&nbsp;在新視窗開啟:</td>
          <td height="18"><input name="new_window" type="radio" value="Y" checked>
    是
      <input name="new_window" type="radio" value="N">
    否</td>
        </tr>
        <tr>
          <td height="18" bgcolor="ECECEC"><font class="style8">&nbsp;日期:</font></td>
          <td height="18" bgcolor="FFFFFF"><font class="style8">
      <input id='date_day' name="date_day" type="text" size="2" maxlength="2" class="style8" value="<?=$day?>">      
      -
      <input id='date_month' name="date_month" type="text" size="2" maxlength="2" class="style8" value="<?=$month?>">
      -
	  <input id='date_year' name="date_year" type="text" size="4" maxlength="4" class="style8" value="<?=$year?>">
&nbsp;<img src="../../images/calendar.gif" alt="calendar" border="0" onClick="showCalendar('date_year','date_day','date_month','date_year','d m y')">&nbsp;DD -MM-YYYY </font></td>
        </tr>
        <!--tr>
          <td height="18" bgcolor="ECECEC">有效日期:</td>
          <td height="18" bgcolor="FFFFFF"><font class="style8">
      <input id='date_day2' name="date_day2" type="text" size="2" maxlength="2" class="style8" value="<?=$day2?>">
      -
      <input id='date_month2' name="date_month2" type="text" size="2" maxlength="2" class="style8" value="<?=$month2?>">
      -
	  <input id='date_year2' name="date_year2" type="text" size="4" maxlength="4" class="style8" value="<?=$year2?>">
&nbsp;<img src="../../images/calendar.gif" alt="calendar" border="0" onClick="showCalendar('date_year2','date_day2','date_month2','date_year2','d m y')">&nbsp; DD-MM-YYYY </font></td>
        </tr-->
        <tr id='file_tr' bgcolor="FFFFFF">
          <td height="18" bgcolor="ECECEC">&nbsp;附件:</td>
          <td height="18" bgcolor="FFFFFF"><input id='file' type="file" name="file"></td>
        </tr>
        <tr bgcolor="FFFFFF">
          <td height="18" bgcolor="ECECEC">&nbsp;最新消息:</td>
          <td height="18"><input id='is_news' name="is_news" type="radio" value="Y">
    是
      <input id='is_news' name="is_news" type="radio" value="N" checked>
    否</td>
        </tr>
        <tr id='news_tr1' style='display:none;' bgcolor="FFFFFF">
          <td height="18" bgcolor="ECECEC">&nbsp;最新消息排序:</td>
          <td height="18">
		  <input id='news_order' name="news_order" type="text" value="10"><span style='color:red'>&nbsp;数字越小越靠前</span>
		  </td>
        </tr>
        <tr id='banner_tr1' style='display:none;' bgcolor="FFFFFF">
          <td height="18" bgcolor="ECECEC">&nbsp;主頁Banner顯示:</td>
          <td height="18"><input name="is_banner" type="radio" value="Y">
            是
              <input name="is_banner" type="radio" value="N" checked>
          否</td>
        </tr>
        <tr id='banner_tr2' style='display:none;' bgcolor="FFFFFF">
          <td height="18" bgcolor="ECECEC"><font class="style8">&nbsp;主頁Banner圖片:</font></td>
          <td height="18"><font class="style8">
            <input type="file" name="file_banner"><span style='color:red'>建议尺寸大小：1001*450</span>
          </font></td>
        </tr>
        <tr id='banner_tr3' style='display:none;' bgcolor="FFFFFF">
          <td height="18" bgcolor="ECECEC"><font class="style8">&nbsp;主頁Banner排序:</font></td>
          <td height="18"><font class="style8">
            <input name="banner_order" type="text" size="10" maxlength="80" value='10'>(數字越小越靠前)
          </font></td>
        </tr>
        <tr>
          <td height="18" bgcolor="ECECEC">&nbsp;封面圖片:</td>
          <td height="18" bgcolor="FFFFFF"><input type="file" name="cover_Photo"><span style='color:red;'>(學生報專用 建議圖片大小200*150)</span></td>
        </tr>
		<!--tr>
			<td height="18" bgcolor="ECECEC">&nbsp;瀏覽權限:</td>
			<td height="18" bgcolor="FFFFFF">
					<select name='acc_type' id='acc_type'>
						<option value='N'>遊客</option>
						<option value='S'>學生</option>
						<option value='T'>教師</option>
						<option value='P'>家長</option>
					</select>
			</td>
		</tr-->
        <tr bgcolor="ECECEC">
          <td><font class="style8">&nbsp; </font></td>
          <td><font class="style8">
            <input type="submit" name="Submit" value="    確定新增    ">
            <input type="reset" name="reset" value="重設">
          </font></td>
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
					<td>如想新增或修改主頁Banner的圖片，請先在「最新消息」按「是」，然後在「主頁Banner顯示」按「是」，<span style='color:red;'>最後請上載Banner顯示圖片至「主頁Banner圖片」，將內容圖片添加至「附件」即可</span></td>
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
</form>
  <p><a href=c_parent.php?month=<?=$_GET[month]?>&school_year=<?=$school_year?>>回上一頁</a></p>
</body>

</html>
