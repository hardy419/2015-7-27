<?php include 'header.php'; ?>
<?php include 'banner_community.php'; ?>
<?php include('./model/community_homeschool_list_selection.php');?>
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
                  <td><a href="community_homeschool.php" target="_self"><img src="images/community_left_list_hover_07.jpg" width="187" height="65" /></a></td>
                </tr>
                <tr>
                  <td><a href="photos.php" target="_self"><img src="images/community_left_photos.jpg" width="187" height="65" /></a></td>
                </tr-->
              </table>
               
            </div>
        </div>
    </div>
    <div class="right_side">
        <div class="right_side_top02">
          <table width="780" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td align="left"><img src="images/community_right_top_51.jpg" /></td>
              <td align="right" class="12pxfont"><table border="0" cellspacing="0" cellpadding="0"   class="position email_hover">
                <tr>
                  <td align="left">現在位置：</td>
                  <td align="left"><a href="index.php" target="_self">首頁</a></td>
                  <td width="25" align="center">&gt;</td>
                  <td align="left"><a href="community_notice.php" target="_self">家校社區</a></td>
                  <td width="25" align="center">&gt;</td>
                  <td align="left" height="25">家校園地</td>
                </tr>
                <tr>
                  <td align="left">Position：</td>
                  <td align="left"><a href="index.php" target="_self">Home</a></td>
                  <td width="25" align="center">&gt;</td>
                  <td align="left"><a href="community_notice.php" target="_self">Community</a></td>
                  <td width="25" align="center">&gt;</td>
                  <td align="left" height="20">Home-School Garden</td>
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
					<a href="javascript:MM_openBrWindow('./pop_email.php?title=家校園地','view','toolbar=no,location=no,directories=no,status=no,menubar=no,scrollbars=no,resizable=no,width=400,height=350,top=50,left=50')" style='line-height:20px;'>
						
					</a>
				</td>
			</tr>
			<tr>
				<td colspan='2'	>&nbsp;</td>
			</tr>
		</table>
		<?php if($total_record){ ?>	
		<?php while($object=mysql_fetch_object($get_result)){ ?>
		<div class='wrap_photo left' onMouseOut="toggle_title(this)">	
		<?if(!empty($object->cover_Photo)){?>		
		<img class='wrap_photo_img' src='./userUpload/cover_Photo/<?php echo $object->cover_Photo;?>' />							<?}else{?>								
		<img class='wrap_photo_img' src='./images/vedio/blank.jpg' />		
		<?php } ?>				
		<div class='photo_txtBox'>			
		<?php if(!empty($object->docoment_name)){ ?>	
		<a target="<?php echo $object->link_open_window == 'Y' ? '_blank' : '_self'; ?>" class='photo_txtBox_a' href="./userUpload/attachment/<?php echo $object->docoment_name;?>"><span><?php echo get_sub_string($object->title_cn,20,'...')?><br/><?php echo $object->date;?></span></a>						
		<?php }else{ ?>							
		<a target="<?php echo $object->link_open_window == 'Y' ? '_blank' : '_self'; ?>" class='photo_txtBox_a' href="community_homeschool_detail.php?id=<?php echo $object->noticeid;?>"><span><?php echo get_sub_string($object->title_cn,20,'...')?><br/><?php echo $object->date;?></span></a>		
		<?php } ?>				
		</div><!--photo_txtBox-->		
		</div><!--wrap_photo-->			
		<?php } ?>
		   <?php }else{ ?>		
		   <div class='clear'></div>【待更新】
		   <?php } ?>
		   <div class='clear'></div>
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
