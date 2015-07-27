<?php include 'header.php'; ?>
<?php include 'banner_school.php'; ?>
<?php include('./model/development_list_selection.php');?>
<div class="banner_02"></div>
<div id="content">
    <div class="left_side">
        <div class="left_side_top02"><img src="images/left_top_03.jpg" width="200" height="61" /></div>
        <div class="left_side_content">
            <div class="left_side_content_in">
              <table width="176" border="0" cellspacing="0" cellpadding="0">
                <tr>
                  <td><a href="school_intro.php" target="_self"><img src="images/left_03.jpg" border="0"/></a></td>
                </tr>
                <tr>
                  <td><a href="school_philosophy.php" target="_self"><img src="images/left_05.jpg" width="187" height="66" /></a></td>
                </tr>
                <tr>
                  <td><a href="school_mottoandcrest.php" target="_self"><img src="images/left_06.jpg" width="187" height="66" /></a></td>
                </tr>
                <tr>
                  <td><a href="school_development.php" target="_self"><img src="images/left_hover_07.jpg" width="187" height="66" /></a></td>
                </tr>
                <tr>
                  <td><a href="school_words.php" target="_self"><img src="images/left_08.jpg" width="187" height="66" /></a></td>
                </tr>
                <tr>
                  <td><a href="school_directors.php" target="_self"><img src="images/left_09.jpg" width="187" height="66" /></a></td>
                </tr>
                <tr>
                  <td><a href="school_teacher.php" target="_self"><img src="images/left_10.jpg" width="187" height="66" /></a></td>
                </tr>
                <tr>
                  <td><a href="school_goldintro.php"><img src="images/left_11.jpg" width="187" height="66" /></a></td>
                </tr>
                <tr>
                  <td><a href="school_church.php" target="_self"><img src="images/left_12.jpg" width="187" height="66" /></a></td>
                </tr>
                <tr>
                  <td><a href="school_report.php" target="_self"><img src="images/left_13.jpg" width="187" height="66" /></a></td>
                </tr>
                <tr>
                  <td><a href="school_position.php" target="_self"><img src="images/left_14.jpg" width="187" height="65" /></a></td>
                </tr>
              </table>
               
            </div>
        </div>
    </div>
    <div class="right_side">
        <div class="right_side_top02">
        <table width="780" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td align="left"><img src="images/school_right_top_85.jpg" /></td>
            <td align="right" class="12pxfont"><table border="0" cellspacing="0" cellpadding="0"  class="position email_hover">
              <tr>
                <td align="left">現在位置：</td>
                <td align="left"><a href="index.php" target="_self">首頁</a></td>
                <td width="25" align="center">&gt;</td>
                <td align="left"><a href="school_intro.php" target="_self">學校</a></td>
                <td width="25" align="center">&gt;</td>
                <td align="left" height="25">學校發展歷程 </td>
              </tr>
              <tr>
                <td align="left">Position：</td>
                <td align="left"><a href="index.php" target="_self">Home</a></td>
                <td width="25" align="center">&gt;</td>
                <td align="left"><a href="school_intro.php" target="_self">School</a></td>
                <td width="25" align="center">&gt;</td>
                <td align="left" height="20">School Development</td>
              </tr>
            </table></td>
          </tr>
        </table>
      </div>
        <div class="right_content">
          <table width="100%" border="0" cellspacing="0" cellpadding="0">
			<tr>
				<td colspan='2' align='right'>
					<?php show_get_back('index.php','返回首頁'); ?>
					<!--?php show_post_mail('學校發展歷程'); ?-->
				</td>
			</tr>
		  </table>
				 <!--  <table width="100%" border="0" cellpadding="0" cellspacing="1" bgcolor="#B4B4B4" class="email_hover" style="margin-top:30px; margin-bottom:30px;">
					<tr>
					  <td width="14%" height="40" align="center" bgcolor="#F9F5EF" class="wordfamily_01">年份</td>
					  <td width="86%" align="center" bgcolor="#F9F5EF" class="wordfamily_01">簡介</td>
					</tr>
					<?php if($total_record){ ?>
						<?php while($object=mysql_fetch_object($get_result)){ ?>
							<tr>
								<td align='center' height=40 bgcolor="#FFFFFF"><?php echo $object->school_year;?></td>
								<td align='center' bgcolor="#FFFFFF"><a target='_blank' style='color:#666666;' href='./userUpload/attachment/<?php echo $object->docoment_name;?>'><?php echo $object->title_cn;?></a></td>
							</tr>
						<?php } ?>
					<?php }else{ ?> 
						<tr>
							<td align='center' height=40 bgcolor="#FFFFFF" colspan='2'>暫無內容</tr>
						</tr>
					<?php } ?>
				   </table>--><div style="margin-top:20px;"><img src="images/development.jpg" /></div>
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
