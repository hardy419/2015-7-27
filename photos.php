<?php include 'header.php'; ?>
<?php include 'banner_community.php'; ?>
<?php include('./model/photo_list_selection.php');?>
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
		<?php if($total_record){ ?>
			   <?php while($object=mysql_fetch_object($get_result)){ ?>
					<?php 
						$sql_getPhoto = "SELECT `file_name` FROM `tbl_gallery` WHERE `act_id` = '".$object->id."' order by `remark` asc;";
						$get_result_getPhoto = mysql_query($sql_getPhoto, $link_id);
						$get_Photo_arr = mysql_fetch_array($get_result_getPhoto);
					?>
			   <div class='wrap_photo left' onMouseOut="toggle_title(this)">
					<?if(!empty($get_Photo_arr)){?>
						<img class='wrap_photo_img' src='./gallery/<?php echo $get_Photo_arr[0];?>' />
					<?}else{?>
						<img class='wrap_photo_img' src='./images/vedio/blank.jpg' />
					<?php } ?>
					<div class='photo_txtBox'>
						<a class='photo_txtBox_a' href="photos_details.php?id=<?php echo $object->id; ?>"><span><?php echo get_sub_string($object->name,20,'...')?><br/><?php echo $object->date;?></span></a>
					</div><!--photo_txtBox-->
			   </div><!--wrap_photo-->
			   <?php } ?>		   
		  <?php }else{ ?>
		  <div class='clear'></div>【待更新】
		  <?php } ?>
          <div class="clear"></div>
		   <?php 
				if ($total_page>0 && $page>0){
					page_display_q("",$page,$total_page,10,'','','',"");
				}
		  ?>
        </div><!--right_content-->
    </div><!--right_side--> 
</div>
<?php include 'foot.php'; ?>
</body>
</html>
