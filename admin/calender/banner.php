<?php

	include('./banner_selection.php');
$time = time();

if ($_GET['year'] != ""){
	$year = $_GET['year'];
}

if($_GET['month'] != ""){
	$month = $_GET['month'];
}

?>
<html>
<head>
<title>banner管理</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<LINK REL="StyleSheet" TYPE="text/css" HREF="../../js/style.css">
<script src='http://code.jquery.com/jquery-1.10.2.min.js' type='text/javascript'></script>
</head>
<body>
<img src="admin_lable_banner.png" ><br>
<table width="850" border="0" cellspacing="0" cellpadding="5">
  <tr>
    <td>
    <table width="100%"  border="0" cellspacing="1" cellpadding="10">
      <tr>
        <td><font class=style8 color=red>
          <? if ($_GET['msg']!="") echo "<br>".$_GET['msg']; ?>
        </font></td>
      </tr>
    </table>
    <hr style="height:1px;color=ECECEC;">
	<!--sreachBox-start-->
	<table width="100%" border="0" cellpadding="10" cellspacing="1" class="small" id='tb_serach_date'>
		<tr align="left" valign="top" bgcolor="#FFFFFF">
			<td width="16%">
				<table border=0 cellpadding=3>
					<tr>
						<td><span class="subHead">查看事件</span>：</td>
					</tr>
				</table>
			</td>
			<td width="80%">
				<table width=100% border=0 cellpadding=0>
				<form method=GET action=''>
					<tr>
						<td width=18%>
							<select name="year">
								<option value=''>全部</option>
							<?php 
							$start = date("Y", $time) - 10;
							$end = date("Y", $time) + 2;
							for ($i =$start; $i <=$end; $i++){
								echo "<option value=$i ";
								if ($i == $year)echo "selected=selected";
								echo ">$i 年</option>";
							}
							?>
							</select>
						</td>
						<td width=15%>
							<select name="month">
								<option value=''>全部</option>
							<?php
							for ($i =1; $i <=12; $i++){
								echo "<option value=$i ";
								if ($i == $month)echo "selected=selected";
								echo ">". $i.'月</option>';
							}
							?>
							</select>
						</td>
						<td width=25%>
							<select name="type" id="doc_type">
								<option value="" <? if ($_GET[type] == "") { echo "selected"; } ?>>所有項目</option>
								<option value="N" <? if ($_GET[type] == "N") { echo "selected"; } ?>>最新消息</option>
								<option value="PC" <? if ($_GET[type] == "PC") { echo "selected"; } ?>>家校園地</option>
								<option value="P" <? if ($_GET[type] == "P") { echo "selected"; } ?>>家長通告</option>
								<option value="SR" <? if ($_GET[type] == "SR") { echo "selected"; } ?>>學校報告</option>
								<option value="D" <? if ($_GET[type] == "D") { echo "selected"; } ?>>發展計劃</option>
								<option value="S" <? if ($_GET[type] == "S") { echo "selected"; } ?>>學校發展計劃</option>
								<option value="R" <? if ($_GET[type] == "R") { echo "selected"; } ?>>學校發展報告</option>
								<option value="SH" <? if ($_GET[type] == "SH") { echo "selected"; } ?>>學校發展歷程</option>
								<option value="SI" <? if ($_GET[type] == "SI") { echo "selected"; } ?>>學生會資訊</option>
								<option value="MS" <? if ($_GET[type] == "MS") { echo "selected"; } ?>>影片庫</option>
								<option value="OA" <? if ($_GET[type] == "OA") { echo "selected"; } ?>>傑出成就</option>
								<option value="LA" <? if ($_GET[type] == "LA") { echo "selected"; } ?>>學習活動</option>
								<option value="SN" <? if ($_GET[type] == "SN") { echo "selected"; } ?>>學生報</option>
							</select>
						</td>
						<td width=42%><input name="submit" type="submit" class="small" value="查看"></td>
					</tr>
				</form>
				</table>
			</td>
		</tr>
	</table><!--sreachBox-end-->
      <hr style="height:1px;color=ECECEC;">
	<table width="100%" border="0" cellpadding="10" cellspacing="1" class="small">        
		<tr align="left" valign="top">
		  <td width="15%" bgcolor="#FFFFFF"><span class="subHead">搜尋結果：</span></td>
		  <td width="85%" align="right" bgcolor="#FFFFFF">總共有
			<?php echo $total_record; ?>
	個資料 &nbsp;&nbsp;<font color=#CCCCCC>|</font>&nbsp;&nbsp; 每頁
	<?=$record_per_page?>
	個 &nbsp;&nbsp;<font color=#CCCCCC>|</font>&nbsp;&nbsp; 分
	<?=$total_page?>
	頁顯示</td>
		</tr>        
	</table>
	<table width=100%  border=0 cellpadding=5 cellspacing=1 bgcolor="#CCCCCC" class=small id='tb_banner_list'>
		<tr align="center" valign="top" bgcolor="ECECEC" > 
			<td width=5%>排序order</td>
			<td width=10%>日期</td>
			<td width=10%>栏目</td>
			<td width=30%>標題</td>
			<td width=10%>查看</td>
		</tr>
		<?
		if(mysql_num_rows($get_result_banner)!=0){
		$tdcolor = 'FFFFFF';
			while ($res_banner_list=mysql_fetch_array($get_result_banner)){
			//var_dump($res_banner_list);
			
				echo "<tr align=\"center\" valign=\"top\" bgcolor=\"ECECEC\" > ";
				echo "<td bgcolor=$tdcolor>".$res_banner_list['banner_order']."</td>";
				echo "<td bgcolor=$tdcolor>".$res_banner_list['date']."</td>";
				echo "<td bgcolor=$tdcolor>";
				if($res_banner_list["docoment_type"]=="N"){
					echo '最新消息';
				}else if($res_banner_list["docoment_type"]=="PC"){
					echo '家校園地';
				}else if($res_banner_list["docoment_type"]=="P"){
					echo '家長通告';
				}else if($res_banner_list["docoment_type"]=="SR"){
					echo '學校報告';
				}else if($res_banner_list["docoment_type"]=="D"){
					echo '發展計劃';
				}else if($res_banner_list["docoment_type"]=="S"){
					echo '學校發展計劃';
				}else if($res_banner_list["docoment_type"]=="R"){
					echo '學校發展報告';
				}else if($res_banner_list["docoment_type"]=="SH"){
					echo '學校發展歷程';
				}else if($res_banner_list["docoment_type"]=="SI"){
					echo '學生會資訊';
				}else if($res_banner_list["docoment_type"]=="MS"){
					echo '影片庫';
				}else if($res_banner_list["docoment_type"]=="OA"){
					echo '傑出成就';
				}else if($res_banner_list["docoment_type"]=="LA"){
					echo '學習活動';
				}else if($res_banner_list["docoment_type"]=="SN"){
					echo '學生報';
				}else{
					echo '&nbsp;';
				}
				echo '</td>';
				echo "<td bgcolor=$tdcolor>".$res_banner_list['title_cn']."</td>";
				if($res_banner_list[0]=='1'){
					echo "<td bgcolor=$tdcolor><a href='../student_work/main.php?show_type=L&from_news=1&id=".$res_banner_list['id']."'>查看</a></td>";
				}else if($res_banner_list[0]=='2'){
					echo "<td bgcolor=$tdcolor><a href='./calendar.php?type=T&from_news=1&id=".$res_banner_list['id']."'>查看</a></td>";
				}else if($res_banner_list[0]=='4'){
					echo "<td bgcolor=$tdcolor><a href='../activity/activity.php?id=".$res_banner_list['id']."'>查看</a></td>";
				}else if($res_banner_list[0]=='5'){
					echo "<td bgcolor=$tdcolor><a href='./calendarview.php?id=".$res_banner_list['id']."'>查看</a></td>";
				}else{
					echo "<td bgcolor=$tdcolor><a href='../parent_notice/c_parent.php?from_news=1&id=".$res_banner_list['id']."'>查看</a></td>";
				}
				echo "</tr>";
			}
		}
		else{
			echo "<tr align=\"center\" valign=\"top\" bgcolor=\"FFFFFF\" > ";
			echo "<td colspan='5' bgcolor=$tdcolor>没有结果</td>";
			echo "</tr>";
		}
	?>
		</tr>
	</table>
	<table width="100%" border="0" cellpadding="10" cellspacing="1" class="small" id='tb_page'>
			<tr align="left" valign="top">
			  <td width="15%" bgcolor="#FFFFFF">&nbsp;</td>
			  <td width="85%" align="right" bgcolor="#FFFFFF"><?
			  $search_arr=array('hi_ST'=>'L','type'=>'S');
			if ($total_page>0 && $page>0){
				page_display("",$page,$total_page,10,$search_arr,$sort_arr,$class_arr,"");
			}
		?></td>
        </tr>
     </table>
	</td>
	<td valign='top'>
		<div style='width:200px;'>
			<table border="0" cellpadding="5" cellspacing="0">
				<tr>
					<td colspan='2'><span style='color:#0000FF;'>提示：</span></td>
				</tr>
				<tr>
					<td valign='top'><span style='color:red;'>*</span></td>
					<td>如需查看詳細或更改信息，請點擊查看后跳至相應管理欄目操作。</td>
				</tr>
				<tr>
					<td valign='top'><span style='color:red;'>*</span></td>
					<td>本頁只提供banner信息列表，如需添加請轉至相應欄目頁進行添加操作。</td>
				</tr>
			</table>
		</div>
	  </td>
  </tr>
</table>
</body>
</html>