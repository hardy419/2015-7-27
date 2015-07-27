<?php include 'header.php'; ?>
<?php include 'banner_process.php'; ?>
<?php require_once('./model/process_works_list.php'); ?>
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
                  <td><a href="process_works.php" target="_self"><img src="images/process_list_hover_06.jpg" width="187" height="66" /></a></td>
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
              <td align="left"><img src="images/process_right_top_59.jpg" /></td>
              <td align="right" class="12pxfont"><table border="0" cellspacing="0" cellpadding="0"  class="position email_hover">
                <tr>
                  <td align="left">現在位置：</td>
                  <td align="left"><a href="index.php" target="_self">首頁</a></td>
                  <td width="25" align="center">&gt;</td>
                  <td align="left"><a href="process_achievement.php" target="_self">學習歷程</a></td>
                  <td width="25" align="center">&gt;</td>
                  <td align="left" height="25">學生報</td>
                </tr>
                <tr>
                  <td align="left">Position：</td>
                  <td align="left"><a href="index.php" target="_self">Home</a></td>
                  <td width="25" align="center">&gt;</td>
                  <td align="left"><a href="process_achievement.php" target="_self">Learning</a></td>
                  <td width="25" align="center">&gt;</td>
                  <td align="left" height="20">Student Newsletter</td>
                </tr>
              </table></td>
            </tr>
          </table>
      </div>
			<div class='banner_news'>
				<img style='width:740px;height:80px;' src='./images/banner/banner_works.jpg'/>
			</div><!--banner_news-->
        <div class="right_content" onmousemove=\HideMenu()\ oncontextmenu="return false" ondragstart="return false" onselectstart ="return false" onselect="document.selection.empty()" oncopy="document.selection.empty()" onbeforecopy="return false" >
		  <div style='width:630px;margin:0 AUTO;'>
		  <form id="form1" name="form1" method="post" action="">
			  <table width=100% border="0" align="center" cellpadding="0" cellspacing="0">
				<tr>
				  <td width="117">
					<?php require_once('./php-bin/get_process_SN.php'); ?>
					<select id='year' name="year" size="1" style="width:100px;">
					  <option value=''>全部年份</option>
						<?php $year = $_POST['year'];?>
						<?php showDate($year_arr,$year);?>
					</select>
				  </td>
				  <td width="120">
					<?php require_once('./php-bin/get_process_SN_no.php'); ?>
					<select id='serialno' name="serialno" size="1" style="width:100px;">
					  <option value=''>全部期數</option>
						<?php $no = $_POST['serialno'];?>
						<?php showNo($no_arr,$no);?>
					</select>
				  </td>
				  <td width="100">
					<input type="submit" name="submit" id="submit" value="查看" />
				  </td>
					<td align='right'>
						<?php show_get_back('index.php','返回首頁'); ?>
						<!--?php show_post_mail('學生作品'); ?-->
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
			<?php while($rel_arr_news = mysql_fetch_array($get_result_news)){ ?>
              <div class='photos_Box left'>
				<?php if(!empty($rel_arr_news['docoment_name'])){ ?>
				<a class='photos_IMG_a' target="_blank" href='./userUpload/attachment/<?php echo $rel_arr_news['docoment_name']; ?>' title='點擊查看'>
				<?php }else{ ?>
				<a class='photos_IMG_a' target="_self" href='javascript:;' title='點擊查看'>
				<?php }?>
					<?php if(!empty($rel_arr_news['cover_Photo'])){ ?>
					<img class='photos_IMG' src="./userUpload/cover_Photo/<?php echo $rel_arr_news['cover_Photo']; ?>" />
					<?php }else{ ?>
					<img class='photos_IMG' src="./images/blank.jpg" />
					<?php } ?>
					<!--span class='photos_TXT'><span style='width:140px;float:left;overflow:hidden;'><?php echo $rel_arr_news['title_cn'];?></span></span-->
				</a><!--photos_IMG_a-->
				<div class='photos_Box_shadow'></div><!--photos_Box_shadow-->
			  </div><!--photos_Box-->
			<?php $i++; } ?>
		      <div class="clear"></div>
          </div><!--photos_wrap-->
		  
		  <?php 
				if ($total_page>0 && $page>0){
					page_display_q("",$page,$total_page,10,'','','',"");
				}
		  ?>
        </div><!--right_content-->
    </div> 
</div>
<?php include 'foot.php'; ?>
</body>
</html>
