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
                  <td><a href="community_notice.php" target="_self"><img src="images/community_left_list_03.jpg" /></a></td>
                </tr>
                <tr>
                  <td><a href="community_meeting.php" target="_self"><img src="images/community_left_list_05.jpg" /></a></td>
                </tr>
                <tr>
                  <td><a href="community_classmate.php" target="_self"><img src="images/community_left_list_06.jpg" /></a></td>
                </tr>
                <tr>
                  <td><a href="community_homeschool.php" target="_self"><img src="images/community_left_list_hover_07.jpg" /></a></td>
                </tr>
                <!--tr>
                  <td><a href="photos.php" target="_self"><img src="images/community_left_photos.jpg" /></a></td>
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
          <table width=100% border="0" cellpadding="0" cellspacing="0" style="padding-bottom:30px;">
          <form id="form1" name="form1" method="get" action="">
            <tr>
              <td width="107">
				<select name="web_type" id="web_type">
				<option value="">全部類別</option>
                  <?php
					require_once("./php-bin/get_web_type_selection.php");
					$type_selected = $_GET[web_type];
					require_once("./php-bin/get_web_type_select_html.php");
				  ?>
                </select>
              </td>
              <td width="127">
                <select name="year" size="1" id="select" style="width:100px;">
                  <option value=''>全部年份</option>
				  <?php require_once('./php-bin/get_community_homeschool_date_selection.php');?>
				  <?php showDate($year_arr);?>
                </select>
              </td>
              <td width="117">
                <select name="month" size="1" id="select" style="width:100px;">
                  <option value=''>全部月份</option>
				  <?php for($i = 1 ;$i<=12;$i++){?>
							<?php if(strlen($i)==1)$i='0'.$i; ?>
							<option value='<?php echo $i; ?>' <?php if(isset($_GET['month']) && $_GET['month'] == $i ) echo 'selected'; ?> ><?php echo $i; ?></option>
				  <?php } ?>
                </select>
              </td>
              <td width="156">
                <input type="submit" name="submit" id="submit" value="查看" />
              </td>
			  <td align='right'>
					<?php show_get_back('index.php','返回首頁'); ?>
					<!--?php show_post_mail('留言板'); ?-->
				</td>
            </tr>
		  </form>
          </table>
          <table width="745" border="0" cellspacing="1" cellpadding="0" bgcolor="#B4B4B4" class="email_hover">
            <tr>
              <td height="40" align="center" bgcolor="#F9F5EF" class="wordfamily_01">日期</td>
              <td align="center" bgcolor="#F9F5EF" class="wordfamily_01">編號</td>
              <td align="center" bgcolor="#F9F5EF" class="wordfamily_01">標題</td>
              <td align="center" bgcolor="#F9F5EF" class="wordfamily_01">對象</td>
              <!--td align="center" bgcolor="#F9F5EF" class="wordfamily_01">連接</td-->
              <td align="center" bgcolor="#F9F5EF" class="wordfamily_01">下載</td>
            </tr>
            <?php while($rel_arr_news = mysql_fetch_array($get_result_news)){?>
			<tr>
              <td height="40" align="center" bgcolor="#FFFFFF"><?php echo $rel_arr_news['date'];?></td>
			  <td align='center' bgcolor='#FFFFFF'>
			  <?php echo $rel_arr_news['serialno'];?>
			  </td>
              <td align="center" bgcolor="#FFFFFF">
				<table width="100%" border="0" cellspacing="0" cellpadding="0">
					<tr>
					  <td width="5%">&nbsp;</td>
					  <?php if(!empty($rel_arr_news['docoment_name'])){?>
						<td align="left">
							<a target="<?php echo $rel_arr_news['link_open_window'] == 'Y' ? '_blank' : '_self';?>" href='./userUpload/attachment/<?php echo $rel_arr_news['docoment_name'];?>' title='點擊查看'>
								<?php echo get_sub_string($rel_arr_news['title_cn'],40);?>
							</a>
						</td>
					  <?php }else{?>
						<td align="left">
							<a target="<?php echo $rel_arr_news['link_open_window'] == 'Y' ? '_blank' : '_self';?>" href='javascript:void(0);' title='暫無內容瀏覽'>
								<?php echo get_sub_string($rel_arr_news['title_cn'],40);?>
							</a>
						</td>
					  <?php }?>
					</tr>
				</table>
			  </td>
			  <td align="center" bgcolor="#FFFFFF">
				<?php echo isset($rel_arr_news['target']) ? $rel_arr_news['target'] : "&nbsp;";?>
			  </td>
			  <!--td align="center" bgcolor="#FFFFFF">
				<?php if(!empty($rel_arr_news['link_text']) && ($rel_arr_news['link_text'] != 'http://')){ ?>
							<a target='_blank' href="<?php echo $rel_arr_news['link_text'];?>" title='<?php echo $rel_arr_news['link_text'];?>'>連接</a>
				<?php }else{ ?>
							&nbsp;
				<?php } ?>
			  </td-->
			  <td align="center" bgcolor="#FFFFFF">
				<?php if($rel_arr_news['docoment_name']){?>
					<a target='_blank' href='./userUpload/attachment/<?php echo $rel_arr_news['docoment_name'];?>'><img src="images/pdf.jpg" width="12" height="12" /></a>
				<?php }else{?>
				 &nbsp;
				<?php }?>
			  </td>
            </tr>
			<?php } ?>
          </table>
		  <div class="clear"></div>
		  <?php 
				$search_arr = array('web_type'=>$_GET['web_type'],
								'year'=>$_GET['year'],
								'month'=>$_GET['month']
								);
				if ($total_page>0 && $page>0){
					page_display_q("",$page,$total_page,10,$search_arr,'','',"");
				}
		  ?>
        </div>
    </div> 
</div>
<?php include 'foot.php'; ?>
</body>
</html>
