<?php include 'header.php'; ?>
<?php include 'banner_community.php'; ?>
<?php include('./model/photo_details_list_selection.php');?>
<script src="js/jquery-1.10.2.min.js"></script>
<script src="./js/lightbox-2.6.min.js"></script>
<div class="banner_02"></div>
<div id="content">
    <div class="left_side">
        <div class="left_side_top02"><img src="images/left_top_12.jpg" width="200" height="61" /></div>
        <div class="left_side_content">
            <div class="left_side_content_in">
              <table width="176" border="0" cellspacing="0" cellpadding="0">
                <tr>
                  <td><a href="community_notice.php" target="_self"><img src="images/community_left_list_03.jpg" width="187" height="66" /></a></td>
                </tr>
                <tr>
                  <td><a href="community_meeting.php" target="_self"><img src="images/community_left_list_05.jpg" width="187" height="66" /></a></td>
                </tr>
                <!--tr>
                  <td><a href="community_classmate.php" target="_self"><img src="images/community_left_list_06.jpg" width="187" height="66" /></a></td>
                </tr>
                <tr>
                  <td><a href="community_homeschool.php" target="_self"><img src="images/community_left_list_07.jpg" width="187" height="65" /></a></td>
                </tr>
                <tr>
                  <td><a href="photos.php" target="_self"><img src="images/community_left_photos_hover.jpg" width="187" height="65" /></a></td>
                </tr-->
              </table>
               
            </div>
        </div>
    </div>
    <div class="right_side">
        <div class="right_side_top02">
          <table width="780" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td align="left"><img src="images/community_right_top_photos.jpg" /></td>
              <td align="right" class="12pxfont"><table border="0" cellspacing="0" cellpadding="0"   class="position email_hover">
                <tr>
                  <td align="left">現在位置：</td>
                  <td align="left"><a href="index.php" target="_self">首頁</a></td>
                  <td width="25" align="center">&gt;</td>
                  <td align="left"><a href="community_notice.php" target="_self">家校社區</a></td>
                  <td width="25" align="center">&gt;</td>
                  <td align="left" height="25">相片庫</td>
                </tr>
                <tr>
                  <td align="left">Position：</td>
                  <td align="left"><a href="index.php" target="_self">Home</a></td>
                  <td width="25" align="center">&gt;</td>
                  <td align="left"><a href="community_notice.php" target="_self">Community</a></td>
                  <td width="25" align="center">&gt;</td>
                  <td align="left" height="20">Photo gallery</td>
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
					<!--?php show_post_mail('相片集'); ?-->
				</td>
			</tr>
			<tr>
				<td colspan='2'	>&nbsp;</td>
			</tr>
		</table>
			<div class='details_top_box'>
			 <?php $object=mysql_fetch_object($get_result) ?>
				<h2><?php echo $object->name;?></h2>
				<p class='right'>作者：<?php echo $object->modified_by; ?> / 時間：<?php echo $object->date; ?> / 類別：<?php echo $object->category; ?></p>
				<div class='clear'></div>
				<p style='word-break:break-all;'><?php echo $object->description;?></p>
			</div><!--details_top_box-->
			<div class='details_contents'>
				<?php while($object_photo=mysql_fetch_object($get_result_photo)){ ?>
					<a class='wrap_photo left' data-lightbox="roadtrip" href='./gallery/original/<?php echo $object_photo->file_name;?>' data-lightbox="roadtrip">
						<img class='wrap_photo_img' src='./gallery/<?php echo $object_photo->file_name;?>' />
					</a><!--wrap_photo-->
				<?php } ?>
			</div><!--details_contents-->
		   <div class='clear'></div>
		   <?php 
				$search_arr['id'] = trim($_GET['id']); 
				if ($total_page>0 && $page>0){
					page_display_q("",$page,$total_page,10,'',$search_arr,'',"");
				}
		  ?>
        </div><!--right_content-->
    </div><!--right_side--> 
</div>
<?php include 'foot.php'; ?>
</body>
</html>
