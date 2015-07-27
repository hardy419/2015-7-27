<?php include 'header.php'; ?>
<?php include 'banner_school.php'; ?>
<?php include('./model/news_list_selection.php');?>

<!--行事历-use-start-->
<?php include './php-bin/dateTool.php'; ?>
<?php
$time = time();
if ($_GET['month'] != "" && $_GET['year'] != ""){
	$year = $_GET['year'];
	$month = $_GET['month'];
}
else{
	$year = date("Y", $time);
	$month = date("m", $time);

	$_GET['year'] = $year;
	$_GET['month'] = $month;
}
$day = date("j", $time);
$loadmonth = mktime(0, 0, 0 ,$month, 1, $year);
$mstr = date("F", $loadmonth);
$mstr = monthstr($month);
?>
<!--行事历-use-end-->
<div class="banner_02"></div>
<div id="content">
    <div class="left_side">
        <div class="left_side_top02"><img src="images/news_top_03.jpg" width="200" height="61" /></div>
    </div>
    <div class="right_side">
        <div class="right_side_top02">
        <table width="780" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td align="left"><img src="images/News_right.jpg" /></td>
            <td align="right" class="12pxfont"><table border="0" cellspacing="0" cellpadding="0"  class="position email_hover">
              <tr>
                <td height="25">現在位置：</td>
                <td><a href="index.php" target="_self">首頁</a></td>
                <td width="25" align="center">&gt;</td>
                <td align="center">最新消息</td>
              </tr>
              <tr>
                <td height="20">Position：</td>
                <td><a href="index.php" target="_self">Home</a></td>
                <td width="25" align="center">&gt;</td>
                <td>News</td>
              </tr>
            </table></td>
          </tr>
        </table>
      </div>
			<div class='banner_news'>
				<img style='width:740px;height:80px;' src='./images/banner/banner_news_<?php echo $_GET[web_type];?>.jpg'/>
			</div><!--banner_news-->
        <div class="right_content">
          <table width="100%" border="0" cellspacing="0" cellpadding="0">
			<tr>
				<td colspan='2' align='right'>
					<div style='float:left;'>
						<form name="form1" method="get" action="">
						<select name="web_type" id="web_type">
							  <option value="">所有類別</option>
							  <?
								require_once("./php-bin/get_web_type_selection.php");
								$type_selected = $_GET[web_type];
								require_once("./php-bin/get_web_type_select_html.php");
							  ?>
							  <option value="study_record" <? if($_GET[web_type]=='study_record') echo 'selected'; ?>>學生作品</option>
							  <option value="calendar" <? if($_GET[web_type]=='calendar') echo 'selected'; ?>>行事曆</option>
							  <option value="P" <? if($_GET[web_type]=='P') echo 'selected'; ?>>家長通告</option>
							  <option value="photos" <? if($_GET[web_type]=='photos') echo 'selected'; ?>>相片集</option>
						</select>
						<input name="Submit" type="submit" class="small" value="搜尋">
						</form>
					</div>	
					<?php show_get_back(); ?>
					<!--?php show_post_mail('最新消息'); ?-->
				</td>
			</tr>
		</table>
          <?php if($_GET[web_type]==='calendar'){ ?>
          <table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td align="center">
			    <form id="form1" name="form1" method="get" action="" enctype="multipart/form-data">
				<input type='hidden' value='calendar' name='web_type' />
				<table width=100% border="0" align="center" cellpadding="0" cellspacing="0">
					<tr>
						<td>&nbsp;</td>
					</tr>
					<tr>
					  <td width="127">
						<select name="year" size="1" id="select" style="width:100px;">
						  <?php
							$start = date("Y", $time) - 1;
							$end = date("Y", $time) + 2;
							for ($i =$start; $i <=$end; $i++){
							echo "<option value=$i ";
							if ($i == $year)
							echo "selected=selected";
							echo ">$i 年";
							}
						  ?>
						</select>
					  </td>
					  <td width="117">
						<select name="month" size="1" id="select" style="width:100px;">
						  <?php
							for ($i =1; $i <=12; $i++){
							echo "<option value=$i ";
							if ($i == $month)
							echo "selected=selected";
							echo ">". monthstr($i);
							}
						  ?>
						</select>
					  </td>
					  <td width="156"><form id="form2" name="form2" method="post" action="">
						<input type="submit" name="button" id="button" value="查看行事歷" />
					  </form></td>
					  <td style='text-align:right;'>&nbsp;</td>
					</tr>
				  </table>
				  </form>
			  </td>
            </tr>
            <tr>
              <td align="center">&nbsp;</td>
            </tr>
            <tr>
              <td align="center">
			  <table width="100%" border="0" cellspacing="1" cellpadding="0" bgcolor="#8BA5D3">
                <tr style="color:#fff;">
                  <td height="35" align="center" bgcolor="#5b7bb6">星期日</td>
                  <td align="center" bgcolor="#5b7bb6">星期一</td>
                  <td align="center" bgcolor="#5b7bb6">星期二</td>
                  <td align="center" bgcolor="#5b7bb6">星期三</td>
                  <td align="center" bgcolor="#5b7bb6">星期四</td>
                  <td align="center" bgcolor="#5b7bb6">星期五</td>
                  <td align="center" bgcolor="#5b7bb6">星期六</td>
                </tr>
				<?
					$startday = date('w', $loadmonth) ;
					$mdays = monthday($month,$year);
				 // calendarid userid username date title content time classid year public schoolid
					$i = 1;
					$i1 = 1;
					$trHeight=50;
					
					
					if ($startday != 0){
						echo "<tr height=\"$trHeight\" valign=\"top\" bgcolor='#ffffff'>";
						for ($y =0; $y < $startday; $y++){
							$show = 0;
							echo "<td width='100'>&nbsp;</td>";
						}

					}
					else{
						echo "<tr height=\"$trHeight\" valign=\"top\" bgcolor='#ffffff'>";
					}
						$i1++;
					do {
						
						if ($i != 1)
							echo "<tr  height=\"$trHeight\" valign=\"top\" bgcolor='#ffffff'>";
						for ($y = $startday; $y <= 6; $y++){
							$query="SELECT * FROM `tbl_calendar` WHERE `date` = '$year-$month-$i'";
							
							
							$result = mysql_query($query, $link_id);	
							
							$isToday= (date("Y")==$_GET["year"] && date("m")==$_GET["month"] && date("d")==$i)?true:false;	
							$numTxt=$isToday?"<b style='color:#5B7BB6;'>".$i."</b>":$i;
							
							if (mysql_num_rows($result)!=0){
								$show = 1;
									echo "<td width='80' style='padding:10px;'>".$numTxt;			
								while ($object=mysql_fetch_object($result)){
									if($object->link_open_window == 'Y'){
										echo "<br><a style='word-break:break-all;' target='_blank' href='./userUpload/attachment/$object->file_name'>$object->title_cn</a>";
									}else{
										echo "<br><a style='word-break:break-all;' target='_self' href='./userUpload/attachment/$object->file_name'>$object->title_cn</a>";
									}
								}
							}
							else{
								$show = 0;
								echo "<td width='100'><span class=brown2>".$numTxt."</span>";			
							}
							
							echo "</td>";
							$i++;
							if ($i > $mdays && $y !=6){
								$y1 = $y;
								for ($z =0; (6 - $y) > $z; $z++){
									$show = 0;
									echo "<td width='100'>&nbsp;</td>";
									$y1++;
								}
									
								$y = 7;
							}
						}
						echo "</tr>";
						$startday = 0;
						$i1++;
					} while ($i <= $mdays);
				?>
              </table></td>
            </tr>
            <tr>
              <td align="center">&nbsp;</td>
            </tr>
          </table>
		  
		  <?php }else{  ?>
		  
          <table width="745" border="0" cellspacing="1" cellpadding="0" bgcolor="#B4B4B4" style="margin-top:30px;" class="email_hover">
            <tr>
              <td width="129" height="40" align="center" bgcolor="#F9F5EF" class="wordfamily_01">日期</td>
              <td width="150" align="center" bgcolor="#F9F5EF" class="wordfamily_01">項目</td>
              <td width="462" align="center" bgcolor="#F9F5EF" class="wordfamily_01">標題</td>
            </tr>
			<?php while($rel_arr_news = mysql_fetch_array($get_result_news)){ ?>
			<tr>
              <td height="40" align="center" bgcolor="#FFFFFF"><?php echo $rel_arr_news['date'];?></td>
			  <td align='center' bgcolor='#FFFFFF'>
			  <?php 
			   if($rel_arr_news[0]==4){
					echo '相片集';
			   }else if($rel_arr_news[0]==3){
					$sql_doc_type = 'select `docoment_type` from tbl_notice where noticeid = \''.$rel_arr_news['id'].'\'';
					$get_doc_type = mysql_query($sql_doc_type, $link_id);
					$res_doc_type = mysql_fetch_array($get_doc_type);
					if($res_doc_type['docoment_type'] == 'P'){								
							echo  '家長通告';
					}
			   }else if($rel_arr_news[0]==1){
					echo '学生作品';
			   }
				require_once("./php-bin/get_web_type_selection.php");
				$type_selected = $rel_arr_news["web_type"];
				for ($i=0;$i<count($type_list);$i++){ 
					if ($type_selected==$type_list[$i]["type_id"]){
						echo '('.$type_list[$i]["type_name"].')';break;
					}
				}
			  ?>
			  </td>
              <td align="center" bgcolor="#FFFFFF">
				<table width="100%" border="0" cellspacing="0" cellpadding="0">
					<tr>
					  <td width="5%">&nbsp;</td>
					  <?php if($rel_arr_news[0]==4){ ?>
								<td align="left">
									<a href='<?php echo 'photos_details.php?id='.$rel_arr_news['id'];?>'>
										<?php echo $rel_arr_news['title_cn'];?>
									</a>
								</td>	
					  
					  <?php }else if($rel_arr_news[0]==3){
								if($res_doc_type['docoment_type']=='P'){
					  ?>
									<td align="left">
										<a href='./userUpload/attachment/<?php echo $rel_arr_news['file'];?>'>
											<?php echo $rel_arr_news['title_cn'];?>
										</a>
									</td>	
					  <?php
								}else if($rel_arr_news['web_type']=='9'){
					  ?>
									<td align="left">
										<a href='./process_study.php'>
											<?php echo $rel_arr_news['title_cn'];?>
										</a>
									</td>	
					  <?php
								}else if($res_doc_type['docoment_type']=='PC'){
					  ?>
									<td align="left">
										<a href='./community_homeschool_detail.php?id=<?php echo $rel_arr_news['id']; ?>'>
											<?php echo $rel_arr_news['title_cn'];?>
										</a>
									</td>
					 <?php
								}else if($res_doc_type['docoment_type']=='S'){
					  ?>
									<td align="left">
										<a href='./userUpload/attachment/<?php echo $rel_arr_news['file'];?>'>
											<?php echo $rel_arr_news['title_cn'];?>
										</a>
									</td>
					 <?php
								}else if($res_doc_type['docoment_type']=='R'){
					  ?>
									<td align="left">
										<a href='./userUpload/attachment/<?php echo $rel_arr_news['file'];?>'>
											<?php echo $rel_arr_news['title_cn'];?>
										</a>
									</td>
					 <?php
								}else if($res_doc_type['docoment_type']=='SI'){
					  ?>
									<td align="left">
										<a href='./userUpload/attachment/<?php echo $rel_arr_news['file'];?>'>
											<?php echo $rel_arr_news['title_cn'];?>
										</a>
									</td>
					 <?php
								}else if($res_doc_type['docoment_type']=='MS'){
					  ?>
									<td align="left">
										<a href='./userUpload/attachment/<?php echo $rel_arr_news['file'];?>'>
											<?php echo $rel_arr_news['title_cn'];?>
										</a>
									</td>
					 <?php
								}else if($res_doc_type['docoment_type']=='OA'){
					  ?>
									<td align="left">
										<a href='./process_achievement_details.php?id=<?php echo $rel_arr_news['id']; ?>'>
											<?php echo $rel_arr_news['title_cn'];?>
										</a>
									</td>
					 <?php
								}else if($res_doc_type['docoment_type']=='LA'){
					  ?>
									<td align="left">
										<a href='./process_study_details.php?id=<?php echo $rel_arr_news['id'];?>'>
											<?php echo $rel_arr_news['title_cn'];?>
										</a>
									</td>
					  <?php
								}
					  ?>
						
					  <?php }else if($rel_arr_news[0]==1){?>
								<td align="left">
										<a href='./process_works.php'>
											<?php echo $rel_arr_news['title_cn'];?>
										</a>
									</td>	
					  <?php }else{ ?>
						<td align="left">
							<a href='./news_detail.php?id=<?php echo $rel_arr_news['id'];?>&tp=<?php echo $rel_arr_news[0];?>'>
								<?php echo $rel_arr_news['title_cn'];?>
							</a>
						</td>
					  <?php } ?>
					</tr>
				</table>
			  </td>
            </tr>
			<?php } ?>
          </table>
          <div class="clear"></div>
		  
		  <?php 
			$search_arr = array('web_type'=>$_GET['web_type']);
				if ($total_page>0 && $page>0){
					page_display_q("",$page,$total_page,10,$search_arr,'','',"");
				}
		  ?>
		  
		  <?php } ?>
        </div>
    </div> 
</div>
<?php include 'foot.php'; ?>
</body>
</html>
