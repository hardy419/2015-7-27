<?php
    require("../../php-bin/function.php");
	require("./news_list_selection.php");
	
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
<title>最新消息</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<LINK REL="StyleSheet" TYPE="text/css" HREF="../../js/style.css">
</head>
<body>
<img src="admin_label_news.gif" width="500" height="35">
<br/>
<table width="850" border="0" cellspacing="0" cellpadding="5">
  <tr>
    <td>
      <hr style="height:1px;color=ECECEC;">
		<!--sreachBox-start-->
		<table width="100%" border="0" cellpadding="10" cellspacing="1" class="small" id='tb_serach_date'>
			<tr align="left" valign="top" bgcolor="#FFFFFF">
				<td width="15%">
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
							<td width=15%>
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
							<td width=11%>
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
							<td width=21%>
								<select name="c_type">
									<option value='0'>全部</option>
									<!--option value='1' <?php if($_GET['c_type']==1) echo 'selected'; ?>>學生作品</option-->
									<option value='3' <?php if($_GET['c_type']==3) echo 'selected'; ?>>網上檔案總管</option>
									<!--option value='4' <?php if($_GET['c_type']==4) echo 'selected'; ?>>相片庫管理</option-->
									<option value='5' <?php if($_GET['c_type']==5) echo 'selected'; ?>>行事歷</option>
								</select>
							</td>
							<td width=20%>
								<select name="web_type" id="web_type">
									<option value=''>全部</option>
								<?
									require_once("../../php-bin/get_web_type_selection.php");
									require("../../php-bin/get_web_type_select_html.php");
								?>
								</select>
							</td>
							<td width=20%><input name="submit" type="submit" class="small" value="查看"></td>
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
			<td width=10%>排序order</td>
			<td width=10%>日期</td>
			<td width=10%>欄目</td>
			<td width=10%>類別</td>
			<td width=30%>標題</td>
			<td width=5%>查看</td>
		</tr>
		<?php
			while($res_arr = mysql_fetch_array($get_result_news)){
				echo "<tr align=\"center\" valign=\"top\" bgcolor=\"FFFFFF\" > ";
				echo '<td>'.$res_arr['news_order'].'</td>';
				echo "<td>".$res_arr['date']."</td>";
				switch($res_arr[0]){
					case '1':
						echo "<td>學生作品</td>";break;
					case '2':
						echo "<td>最新消息</td>";break;
					case '3':
						echo "<td>網上檔案總管</td>";break;
					case '4':
						echo "<td>相片庫管理</td>";break;
					case '5':
						echo "<td>行事歷</td>";break;
				}
				$get_c_sql = "SELECT * FROM `tbl_type` WHERE type_id = '".$res_arr['web_type']."'";
				$get_c_result = mysql_query($get_c_sql,$link_id);
				$get_c_res = mysql_fetch_array($get_c_result);
				echo "<td>".$get_c_res['type_name']."</td>";
				echo "<td>".$res_arr['title_cn']."</td>";
				if($res_arr[0]=='1'){
					echo "<td><a href='../student_work/main.php?show_type=L&from_news=1&id=".$res_arr['id']."'>查看</a></td>";
				}else if($res_arr[0]=='2'){
					echo "<td><a href='./calendar.php?type=T&from_news=1&id=".$res_arr['id']."'>查看</a></td>";
				}else if($res_arr[0]=='4'){
					echo "<td><a href='../activity/activity.php?id=".$res_arr['id']."'>查看</a></td>";
				}else if($res_arr[0]=='5'){
					echo "<td><a href='./calendarview.php?id=".$res_arr['id']."'>查看</a></td>";
				}else{
					echo "<td><a href='../parent_notice/c_parent.php?from_news=1&id=".$res_arr['id']."'>查看</a></td>";
				}
				echo "</tr>";
			}
		?>
		</tr>
		<tr bgcolor='FFFFFF'>
			<td colspan='6'><a href='calendar.php?type=S'>返回</a></td>
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
					<td>本頁只提供最新消息信息列表，如需添加請轉至相應欄目頁進行添加操作。</td>
				</tr>
			</table>
		</div>
	  </td>
  </tr>
</table>
</body>
</html>