<?php include 'header.php'; ?>
<?php include 'banner_process.php'; ?>
<?php require_once('./model/process_study_details.php');?>
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
                  <td><a href="process_study.php" target="_self"><img src="images/process_list_hover_05.jpg" width="187" height="66" /></a></td>
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
              <td align="left"><img src="images/process_right_top_57.jpg" /></td>
              <td align="right" class="12pxfont"><table border="0" cellspacing="0" cellpadding="0"  class="position email_hover">
                <tr>
                  <td align="left">現在位置：</td>
                  <td align="left"><a href="index.php" target="_self">首頁</a></td>
                  <td width="25" align="center">&gt;</td>
                  <td align="left"><a href="process_achievement.php" target="_self">學習歷程</a></td>
                  <td width="25" align="center">&gt;</td>
                  <td align="left" height="25">學習活動</td>
                </tr>
                <tr>
                  <td align="left">Position：</td>
                  <td align="left"><a href="index.php" target="_self">Home</a></td>
                  <td width="25" align="center">&gt;</td>
                  <td align="left"><a href="process_achievement.php" target="_self">Process</a></td>
                  <td width="25" align="center">&gt;</td>
                  <td align="left" height="20">Learning Activities</td>
                </tr>
              </table></td>
            </tr>
          </table>
      </div>
        <div class="right_content" oncontextmenu="return false" ondragstart="return false" onselectstart ="return false" onselect="document.selection.empty()" oncopy="document.selection.empty()" onbeforecopy="return false" onmouseup="document.selection.empty()">

          <table width="100%" border="0" cellspacing="0" cellpadding="0">
			<tr>
				<td width="71%" align='right'>&nbsp;						</td>
				<?php if(($_GET['num']-1)<0){ ?>
					<td width="7%" align='center'>&nbsp;</td>
				<?php }else{ ?>
					<td width="7%" align='center'><a href="?num=<?php echo $_GET['num']-1;?>&id=<?php if(isset($article_id)){ echo $article_id;}else{ echo $_GET['id'];} ?>&act=prev" target="_self">上一頁</a></td>
				<?php } ?>
				<?php if(($_GET['num']+1)>=$total_record){?>
					<td width="7%" align='center'>&nbsp;</td>
				<?php }else{ ?>
					<td width="7%" align='center'><a href="?num=<?php echo $_GET['num']+1;?>&id=<?php if(isset($article_id)){ echo $article_id;}else{ echo $_GET['id'];} ?>&act=next" target="_self">下一頁</a></td>
				<?php } ?>
				<td width="15%" align='right'>
					<?php show_get_back('process_study.php','返回上一級'); ?>
					<!--?php show_post_mail('傑出成就'); ?-->
				</td>
			</tr>
		</table>
		<script src='http://code.jquery.com/jquery-1.10.2.min.js'></script>
		<script>
			$(document).ready(function(){
				//init
				function initPhoto(){
					var Bimg_name = $('.details_IMGBox').first().children('img').attr('src');
					var Bimg_desc = $('.details_IMGBox').first().children('span').text();
					var Bimg_name_arr = new Array();
					var Bimg_a_src = '';
					Bimg_name_arr = Bimg_name.split('/');  
					Bimg_a_src = './userUpload/notice/original/'+Bimg_name_arr[3];
					$('.details_BIMG_a').attr('href',Bimg_a_src);
					$('.details_BIMG').attr('src',Bimg_name);
					$('.details_BIMDESCGBox').text(Bimg_desc);
				}
			
				$('.details_IMGBox').click(function(){
					var img_name = $(this).children('img').attr('src');
					var img_desc = $(this).children('span').text();
					var Bimg_name_arr = new Array();
					var Bimg_a_src = '';
					Bimg_name_arr = img_name.split('/');  
					Bimg_a_src = './userUpload/notice/original/'+Bimg_name_arr[3];
					$('.details_BIMG_a').attr('href',Bimg_a_src);
					$('.details_BIMG').hide();
					$('.details_BIMG').attr('src',img_name);
					$('.details_BIMG').fadeIn(300);
					$('.details_BIMDESCGBox').text(img_desc);
				});
				
				initPhoto();
			});
		</script>
			<div class='details_Top_Box_warp' >
				<table width="740" height="35" border="0" cellpadding="0" cellspacing="0">
                  <tr>
                    <td width="23" valign="top" bgcolor="#94B4DB"><img src="images/detail_left.jpg" width="23" height="35" /></td>
                    <td width="519" valign="middle" background="images/detail_center.jpg" bgcolor="#94B4DB"><h2 class='h2_title' style="color:#fff; font-family:Verdana, Arial, Helvetica, sans-serif"><?php echo $res_arr_details['title_cn'];?></h2></td>
                    <td width="23" valign="top" bgcolor="#94B4DB"><img src="images/detail_right.jpg" width="23" height="35" /></td>
                    <td width="375" align="right" background="images/detail_center_line.jpg"><?php echo $res_arr_details['date'];?></td>
                  </tr>
                </table>
				<?php if(!empty($res_arr_details['description'])){ ?>
				<div class='details_descriptionBox'><?php echo $res_arr_details['description'];?></div>
				<?php } ?>
		  </div>
			<div class='detailsBox_warp'>
				<div class='details_BIMGBox'>
					<a class='details_BIMG_a' target='_blank' href='javascript:;'>
						<img class="details_BIMG" src="./images/blank.jpg"/>
					</a>
					<div class='details_BIMDESCGBox'></div><!--details_BIMDESCGBox-->
				</div><!--details_BIMGBox-->
				<div class='details_IMGlistBox'>
					<?php
						while($get_photos_arr = mysql_fetch_array($get_result_photo)){
							echo '<a class="details_IMGBox left"><img src="./userUpload/notice/'.$get_photos_arr['photo_name'].'" /><span class="img_desc" style="display:none;">'.$get_photos_arr['p_info'].'</span></a><!--details_IMGBox-->';
						}
					?>
				</div><!--details_IMGlistBox-->
				<div class='clear'></div>
			</div><!--detailsBox_warp-->
		</div><!--right_content-->
    </div> 
</div>
<?php include 'foot.php'; ?>
</body>
</html>
