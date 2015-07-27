<?php include 'header.php'; ?>
<?php include 'banner_process.php'; ?>
<?php require_once('./model/vedio_list_selection.php');?>
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
                <tr>
                  <td><a href="process_study.php" target="_self"><img src="images/process_list_05.jpg" width="187" height="66" /></a></td>
                </tr>
                <tr>
                  <td><a href="process_works.php" target="_self"><img src="images/process_list_06.jpg" width="187" height="66" /></a></td>
                </tr>
                <tr>
                  <td><a href="process_movie.php" target="_self"><img src="images/process_list_hover_07.jpg" width="187" height="65" /></a></td>
                </tr>
              </table>
               
            </div>
        </div>
    </div>
    <div class="right_side">
        <div class="right_side_top02">
          <table width="780" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td align="left"><img src="images/process_right_top_61.jpg" /></td>
              <td align="right" class="12pxfont"><table border="0" cellspacing="0" cellpadding="0"  class="position email_hover">
                <tr>
                  <td align="left">現在位置：</td>
                  <td align="left"><a href="index.php" target="_self">首頁</a></td>
                  <td width="25" align="center">&gt;</td>
                  <td align="left"><a href="process_achievement.php" target="_self">學習歷程</a></td>
                  <td width="25" align="center">&gt;</td>
                  <td align="left" height="25">影片庫</td>
                </tr>
                <tr>
                  <td align="left">Position：</td>
                  <td align="left"><a href="index.php" target="_self">Home</a></td>
                  <td width="25" align="center">&gt;</td>
                  <td align="left"><a href="process_achievement.php" target="_self">Learning</a></td>
                  <td width="25" align="center">&gt;</td>
                  <td align="left" height="20">Videos</td>
                </tr>
              </table></td>
            </tr>
          </table>
      </div>
        <div class="right_content">
          <table width="100%" border="0" cellspacing="0" cellpadding="0">
			<tr>
				<td colspan='2' align='right'>
					<?php show_get_back(); ?>
					<!--?php show_post_mail('影片庫'); ?-->
				</td>
			</tr>
		  </table>
		  <?php while($rel_arr_news = mysql_fetch_array($get_result_news)){?>
		  <div class='movieBox_wrap left'>
			<a target='_blank' class='movie_a' href='<?php echo $rel_arr_news['link_url']?>' title='<?php echo $rel_arr_news['link_text']?>'>
				<?php if(!empty($rel_arr_news['cover_Photo'])){?>
					<img src="./userUpload/cover_Photo/<?php echo $rel_arr_news['cover_Photo'];?>" width="230" height="189" />
					<div class='play_bg'></div>
				<?php }else{?>
					<img src="./images/vedio/blank.jpg">
					<div class='play_bg'></div>
				<?php }?>
			</a>
			<div class='movie_txtBox'>
				<p>影片標題：<?php echo $rel_arr_news['link_text'];?></p>
				<p>上傳時間：<?php echo $rel_arr_news['date'];?></p>
			</div><!--movie_txtBox-->
		  </div><!--movieBox_wrap-->
		  <?php } ?>
          <div class="clear"></div>
        </div><!--right_content-->
      </div> 
</div>
<?php include 'foot.php'; ?>
</body>
</html>
