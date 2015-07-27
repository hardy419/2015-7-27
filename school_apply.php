<?php include 'header.php'; ?>
<?php include 'banner_school.php'; ?>
<?php include('./model/school_apply_list.php');?>
<div class="banner_02"></div>
<div id="content">
    <div class="left_side">
        <div class="left_side_top02"><img src="images/left_top_06.jpg" width="200" height="61" /></div>
        <div class="left_side_content">
            <div class="left_side_content_in">
              <table width="176" border="0" cellspacing="0" cellpadding="0">
                <tr>
                  <td><a href="course_course.php"><img src="images/course_left_03.jpg" width="187" height="66" /></a></td>
                </tr>
                <tr>
                  <td><a href="course_train.php"><img src="images/course_left_05.jpg" width="187" height="66" /></a></td>
                </tr>
                <tr>
                  <td><a href="course_class.php"><img src="images/course_left_06.jpg" width="187" height="66" /></a></td>
                </tr>
                <tr>
                  <td><a href="course_nimble.php"><img src="images/course_left_07.jpg" width="187" height="66" /></a></td>
                </tr>
                <!--tr>
                  <td><a href="course_calendar.php"><img src="images/course_left_08.jpg" width="187" height="65" /></a></td>
                </tr-->
                <tr>
                  <td><a href="school_apply.php"><img src="images/course_left_OnlineApplication_hover.jpg" /></a></td>
                </tr>
              </table>
               
            </div>
        </div>
    </div>
    <div class="right_side">
        <div class="right_side_top02">
          <table width="780" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td align="left"><img src="images/community_right_top_OnlineApplication.jpg" /></td>
              <td align="right" class="12pxfont"><table border="0" cellspacing="0" cellpadding="0"  class="position email_hover">
                <tr>
                  <td align="left">現在位置：</td>
                  <td align="left"><a href="index.php" target="_self">首頁</a></td>
                  <td width="25" align="center">&gt;</td>
                  <td align="left"><a href="Organ_news.php" target="_self">學校課程</a></td>
                  <td width="25" align="center">&gt;</td>
                  <td align="left" height="25">網上報名</td>
                </tr>
                <tr>
                  <td align="left">Position：</td>
                  <td align="left"><a href="index.php" target="_self">Home</a></td>
                  <td width="25" align="center">&gt;</td>
                  <td align="left"><a href="Organ_news.php" target="_self">School Curriculum</a></td>
                  <td width="25" align="center">&gt;</td>
                  <td align="left" height="20">Online Registration</td>
                </tr>
              </table></td>
            </tr>
          </table>
      </div>
        <div class="right_content">
          <table width="100%" border="0" cellspacing="0" cellpadding="0">
			<tr>
				<?php echo "<td><span style='color:red'>".$_GET["msg"]."</span></td>"; ?>
				<td align='right'>
					<?php show_get_back('index.php','返回首頁'); ?>
					<!--?php show_post_mail('網上報名'); ?-->
				</td>
			</tr>
		  </table>
			<table width="745" border="0" cellspacing="1" cellpadding="0" bgcolor="#B4B4B4" style="margin-top:30px;" class="email_hover">
            <tr>
              <td width="129" height="40" align="center" bgcolor="#F9F5EF" class="wordfamily_01">日期</td>
              <td width="462" align="center" bgcolor="#F9F5EF" class="wordfamily_01">網上報名表</td>
            </tr>
			<?php while($rel_arr_news = mysql_fetch_array($get_result_news)){?>
			<tr>
              <td height="40" align="center" bgcolor="#FFFFFF"><?php echo $rel_arr_news['date'];?></td>
              <td align="left" bgcolor="#FFFFFF">
				<table width="100%" border="0" cellspacing="0" cellpadding="0">
					<tr>
					  <?php if(!empty($rel_arr_news['title'])){?>
						<td align="left">
							<a target="<?php echo $rel_arr_news['link_open_window'] == 'Y' ? '_blank' : '_self';?>" href='./school_notice.php?id=<?php echo $rel_arr_news['id'];?>' style="padding-left:10px;">
								<?php echo $rel_arr_news['title'];?>
							</a>
						</td>
					  <?php }else{?>
						<td align="center">
							<a target="<?php echo $rel_arr_news['link_open_window'] == 'Y' ? '_blank' : '_self';?>" href='javascript:void(0);' alt='暫無內容瀏覽'  style="padding-left:10px;">
								<?php echo $rel_arr_news['title'];?>
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
