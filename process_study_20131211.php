<?php include 'header.php'; ?>
<?php include 'banner_process.php'; ?>
<?php require_once('./model/process_study_list_selection.php');?>
<div class="banner_02"></div>
<div id="content">
    <div class="left_side">
        <div class="left_side_top02"><img src="images/left_top_08.jpg" width="200" height="61" /></div>
        <div class="left_side_content">
            <div class="left_side_content_in">
              <table width="176" border="0" cellspacing="0" cellpadding="0">
                <tr>
                  <td><a href="process_achievement.php" target="_self"><img src="images/process_list_03.jpg" width="187" height="66" /></a></td>
                </tr>
                <!--tr>
                  <td><a href="process_study.php" target="_self"><img src="images/process_list_hover_05.jpg" width="187" height="66" /></a></td>
                </tr-->
                <tr>
                  <td><a href="process_works.php" target="_self"><img src="images/process_list_06.jpg" width="187" height="66" /></a></td>
                </tr>
                <!--tr>
                  <td><a href="process_movie.php" target="_self"><img src="images/process_list_07.jpg" width="187" height="65" /></a></td>
                </tr-->
              </table>
               
            </div>
        </div>
    </div>
    <div class="right_side">
        <div class="right_side_top02">
          <table width="780" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td align="left"><img src="images/process_right_top_57.jpg" /></td>
              <td align="right" class="12pxfont"><table border="0" cellspacing="0" cellpadding="0"  class="position email_hover">
                <tr>
                  <td>現在位置：</td>
                  <td><a href="index.php" target="_self">首頁</a></td>
                  <td width="25" align="center">&gt;</td>
                  <td align="center"><a href="process_achievement.php" target="_self">學習歷程</a></td>
                  <td width="25" align="center">&gt;</td>
                  <td height="25">學習活動</td>
                </tr>
                <tr>
                  <td>Position：</td>
                  <td><a href="index.php" target="_self">Home</a></td>
                  <td width="25" align="center">&gt;</td>
                  <td><a href="process_achievement.php" target="_self">Process</a></td>
                  <td width="25" align="center">&gt;</td>
                  <td height="20">Learning Activities</td>
                </tr>
              </table></td>
            </tr>
          </table>
      </div>
        <div class="right_content">

          <table width="100%" border="0" cellspacing="0" cellpadding="0">
			<tr>
				<td colspan='2' align='right'>
					<a href='javascript:;' style='position:relative;margin:0 5px;line-height:20px;' onclick='javascript:history.go(-1);'>
						<img style='position:relative;top:-2px;line-height:20px;margin:0px 5px;' src="images/arrow.jpg" width="4" height="10" /> 返回 
					</a>
					<a href="javascript:MM_openBrWindow('./pop_email.php?title=學習活動','view','toolbar=no,location=no,directories=no,status=no,menubar=no,scrollbars=no,resizable=no,width=400,height=350,top=50,left=50')" style='line-height:20px;'>
						
					</a>
				</td>
			</tr>
		</table>
			<table width="745" border="0" cellspacing="1" cellpadding="0" bgcolor="#B4B4B4" style="margin-top:30px;" class="email_hover">
            <tr>
              <td width="129" height="40" align="center" bgcolor="#F9F5EF" class="wordfamily_01">日期</td>
              <td width="462" align="center" bgcolor="#F9F5EF" class="wordfamily_01">介紹</td>
            </tr>
			<?php while($rel_arr_news = mysql_fetch_array($get_result_news)){?>
			<tr>
              <td height="40" align="center" bgcolor="#FFFFFF"><?php echo $rel_arr_news['date'].' - '.$rel_arr_news['exp_date'];?></td>
              <td align="center" bgcolor="#FFFFFF">
				<table width="100%" border="0" cellspacing="0" cellpadding="0">
					<tr>
					  <?php if(!empty($rel_arr_news['docoment_name'])){?>
						<td align="center">
							<a target="<?php echo $rel_arr_news['link_open_window'] == 'Y' ? '_blank' : '_self';?>" href='./parent_notice/att/<?php echo $rel_arr_news['docoment_name'];?>'>
								<?php echo $rel_arr_news['title_cn'];?>
							</a>
						</td>
					  <?php }else{?>
						<td align="center">
							<a target="<?php echo $rel_arr_news['link_open_window'] == 'Y' ? '_blank' : '_self';?>" href='process_study_details.php?id=<?php echo $rel_arr_news['id'];?>' alt='暫無內容瀏覽'>
								<?php echo $rel_arr_news['title_cn'];?>
							</a>
						</td>
					  <?php }?>
					</tr>
				</table>
			  </td>
            </tr>
			<?php } ?>
          </table>
          <div class="clear"></div>
		  
		  <?php 
				if ($total_page>0 && $page>0){
					page_display_q("",$page,$total_page,10,'','','',"");
				}
		  ?>
        </div>
    </div> 
</div>
<?php include 'foot.php'; ?>
</body>
</html>
