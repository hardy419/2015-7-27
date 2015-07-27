<?php include 'header.php'; ?>
<?php include 'banner_process.php'; ?>
<?php require_once('./model/process_achievement_list.php'); ?>
<div class="banner_02"></div>
<div id="content">
    <div class="left_side">
        <div class="left_side_top02"><img src="images/left_top_08.jpg" width="200" height="61" /></div>
        <div class="left_side_content">
            <div class="left_side_content_in">
              <table width="176" border="0" cellspacing="0" cellpadding="0">
                <tr>
                  <td><a href="process_achievement.php" target="_self"><img src="images/process_list_hover_03.jpg" width="187" height="66" /></a></td>
                </tr>
                <tr>
                  <td><a href="process_study.php" target="_self"><img src="images/process_list_05.jpg" width="187" height="66" /></a></td>
                </tr>
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
              <td align="left"><img src="images/process_right_top_55.jpg" /></td>
              <td align="right" class="12pxfont"><table border="0" cellspacing="0" cellpadding="0"  class="position email_hover">
                <tr>
                  <td align="left">現在位置：</td>
                  <td align="left"><a href="index.php" target="_self">首頁</a></td>
                  <td width="25" align="center">&gt;</td>
                  <td align="left"><a href="process_achievement.php" target="_self">學習歷程</a></td>
                  <td width="25" align="center">&gt;</td>
                  <td align="left" height="25">傑出成就</td>
                </tr>
                <tr>
                  <td align="left">Position：</td>
                  <td align="left"><a href="index.php" target="_self">Home</a></td>
                  <td width="25" align="center">&gt;</td>
                  <td align="left"><a href="process_achievement.php" target="_self">Learning</a></td>
                  <td width="25" align="center">&gt;</td>
                  <td align="left" height="20">Achievements</td>
                </tr>
              </table></td>
            </tr>
          </table>
      </div>
			<div class='banner_news'>
				<img style='width:740px;height:80px;' src='./images/banner/banner_achievement.jpg'/>
			</div><!--banner_news-->
        <div class="right_content" oncontextmenu="return false" ondragstart="return false" onselectstart ="return false" onselect="document.selection.empty()" oncopy="document.selection.empty()" onbeforecopy="return false">
		  <div style='width:630px;margin:0 AUTO;'>
		  <form id="form1" name="form1" method="post" action="">
			  <table width=100% border="0" align="center" cellpadding="0" cellspacing="0">
				<tr>
				  <td width="117">
					<?php require_once('./php-bin/get_process_achievement.php'); ?>
					<select id='year' name="year" size="1" style="width:100px;">
					  <option value=''>全部年份</option>
						<?php $year = $_POST['year']; ?>
						<?php showDate($year_arr,$year);?>
					</select>
				  </td>
				  <td width="120">
					<select id='web_type' name="web_type" size="1" style="width:100px;">
						<option value=''>全部類別</option>
						<option value='10' <?php if($_POST['web_type']=='10') echo 'selected'; ?>>學科活動</option>
						<option value='11' <?php if($_POST['web_type']=='11') echo 'selected'; ?>>聯課活動</option>
					</select>
				  </td>
				  <td width="100">
					<input type="submit" name="submit" id="submit" value="查看" />
				  </td>
				  <td align='right'>
					<?php show_get_back('index.php','返回首頁'); ?>
					<!--?php show_post_mail('傑出成就'); ?-->
				  </td>
				</tr>
			  </table>
		  </form>
		  </div>
		  <script type='text/javascript'>
			$(document).ready(function(){
				$(".photos_Box").bind({  
					mouseenter:function(){
						$('.photos_Box_shadow').show();
						$('.photos_Box_shadow').animate({opacity:'0.6'},300);
						$(this).find('.photos_Box_shadow').hide();
						
					} 
				}) 
				$(".photos_wrap").bind({  
					mouseleave:function(){
						$('.photos_Box_shadow').animate({opacity:'0'},300);
						$('.photos_Box_shadow').hide();
					}  
				}) 
			});
		  </script>
          <div class='photos_wrap'>
			<?php $i=0; while($rel_arr_news = mysql_fetch_array($get_result_news)){?>
			<?php $list_num[]=$i; ?>
			<?php	
					$article_id = $rel_arr_news['id'];
					$get_sql_photo = 'SELECT * FROM `tbl_notice_photo` where `n_id` = \''.$article_id.'\' order by `order` asc limit 0 , 1';
					$get_result_photo = mysql_query($get_sql_photo, $link_id);
					$get_photo_arr = mysql_fetch_array($get_result_photo);
			?>
              <div class='photos_Box left'>
				<a class='photos_IMG_a' target="_self" href='process_achievement_details.php?id=<?php echo $rel_arr_news['id'];?>&num=<?php echo $list_num[$i];?>' title='點擊查看'>
					<?php if(!empty($get_photo_arr['photo_name'])){ ?>
					<img class='photos_IMG' src="./userUpload/notice/<?php echo $get_photo_arr['photo_name']; ?>" />
					<?php }else{ ?>
					<img class='photos_IMG' src="./images/blank.jpg" />
					<?php } ?>
					<!--span class='photos_TXT'><span style='width:140px;float:left;overflow:hidden;'><?php echo $rel_arr_news['title_cn'];?></span><span style='float:right;'><?php echo $rel_arr_news['date'];?></span></span-->
				</a><!--photos_IMG_a-->
				<div class='photos_Box_shadow'></div><!--photos_Box_shadow-->
			  </div><!--photos_Box-->
			<?php 
				if(($i+1)%3==0){
					echo '<div class="clear"></div>';
				}
				$i++;
			} ?>
		      <div class="clear"></div>
          </div><!--photos_wrap-->
		  
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
