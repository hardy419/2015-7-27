<?php include 'header.php'; ?>
<?php include 'banner_school.php'; ?>
<?php require_once('./model/school_report_list_selection.php');?>
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
                <!--tr>
                  <td><a href="school_development.php" target="_self"><img src="images/left_07.jpg" width="187" height="66" /></a></td>
                </tr-->
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
                  <td><a href="school_report.php" target="_self"><img src="images/left_hover_13.jpg" width="187" height="66" /></a></td>
                </tr>
                <tr>
                  <td><a href="school_position.php" target="_self"><img src="images/left_14.jpg" width="187" height="66" /></a></td>
                </tr>
              </table>
               
            </div>
        </div>
    </div>
    <div class="right_side">
        <div class="right_side_top02">
        <table width="780" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td align="left"><img src="images/school_right_top_98.jpg"/></td>
            <td align="right" class="12pxfont"><table border="0" cellspacing="0" cellpadding="0"  class="position email_hover">
              <tr>
                <td>現在位置：</td>
                <td><a href="index.php" target="_self">首頁</a></td>
                <td width="25" align="center">&gt;</td>
                <td align="center"><a href="school_intro.php" target="_self">學校</a></td>
                <td width="25" align="center">&gt;</td>
                <td height="25">學校發展計劃/報告</td>
              </tr>
              <tr>
                <td>Position：</td>
                <td><a href="index.php" target="_self">Home</a></td>
                <td width="25" align="center">&gt;</td>
                <td><a href="school_intro.php" target="_self">School</a></td>
                <td width="25" align="center">&gt;</td>
                <td height="20">Plans and Reports</td>
              </tr>
            </table></td>
          </tr>
        </table>
      </div>
      <div class="right_content">
          <table width="100%" border="0" cellspacing="0" cellpadding="0">
			<tr>
				<td colspan='2' align='right'>
					<div style='float:left;'>
						<form name="form1" method="get" action="">
						<select name="document_type" id="document_type">
							  <option value="">全部</option>
							  <option value="1" <? if ($_GET["document_type"]=="1") { echo "selected"; } ?>>五年發展計劃</option>
							  <option value="2" <? if ($_GET["document_type"]=="2") { echo "selected"; } ?>>三年發展計劃</option>
							  <option value="3" <? if ($_GET["document_type"]=="3") { echo "selected"; } ?>>三年多元活動津貼計劃</option>
							  <option value="4" <? if ($_GET["document_type"]=="4") { echo "selected"; } ?>>周年計劃</option>
							  <option value="5" <? if ($_GET["document_type"]=="5") { echo "selected"; } ?>>發展津貼計劃</option>
							  <option value="6" <? if ($_GET["document_type"]=="6") { echo "selected"; } ?>>學生支援</option>
							  <option value="R" <? if($_GET[document_type]=='R') echo 'selected'; ?>>學校發展報告</option>
						</select>
						<input name="Submit" type="submit" class="small" value="搜尋">
						</form>
					</div>
					<a href='javascript:;' style='position:relative;margin:0 5px;line-height:20px;' onclick='javascript:history.go(-1);'>
						<img style='position:relative;top:-2px;line-height:20px;margin:0px 5px;' src="images/arrow.jpg" width="4" height="10" /> 返回 
					</a>
					<a href="javascript:MM_openBrWindow('./pop_email.php?title=學校發展計劃/報告','view','toolbar=no,location=no,directories=no,status=no,menubar=no,scrollbars=no,resizable=no,width=400,height=350,top=50,left=50')" style='line-height:20px;'>
						<img style='line-height:20px;' src="./images/email.gif" border="0" style="margin-bottom:-3px;"> <font style="font-size:12px;">電郵本頁</font>
					</a>
				</td>
			</tr>
			<tr>
				<td colspan='2'	>&nbsp;</td>
			</tr>
		</table>
          <table width="745" border="0" cellspacing="1" cellpadding="0" bgcolor="#B4B4B4" style="margin-top:30px;" class="email_hover">
            <tr>
              <td width="129" height="40" align="center" bgcolor="#F9F5EF" class="wordfamily_01">日期</td>
              <td width="220" align="center" bgcolor="#F9F5EF" class="wordfamily_01">類別</td>
              <td width="392" align="center" bgcolor="#F9F5EF" class="wordfamily_01">介紹</td>
            </tr>
			<?php while($rel_arr_news = mysql_fetch_array($get_result_news)){?>
			<tr>
              <td height="40" align="center" bgcolor="#FFFFFF"><?php echo get_sub_string($rel_arr_news['date'],4,'').' - '.get_sub_string($rel_arr_news['exp_date'],4,'');?></td>
			  <td align='center' bgcolor='#FFFFFF'>
			  <?php 
				switch($rel_arr_news['docoment_type']){
					case 'S':
					echo '学校發展計劃';
					break;
					case 'R':
					echo '学校發展報告';
					break;
				}
				if(!empty($rel_arr_news['doc_child_type'])){
					switch($rel_arr_news['doc_child_type']){
						case '1':
						echo '-五年發展計劃';
						break;
						case '2':
						echo '-三年發展計劃';
						break;
						case '3':
						echo '-三年多元活動津貼計劃';
						break;
						case '4':
						echo '-周年計劃';
						break;
						case '5':
						echo '-發展津貼計劃';
						break;
						case '6':
						echo '-學生支援';
						break;
					}
				}
			  ?>
			  </td>
              <td align="center" bgcolor="#FFFFFF">
				<table width="100%" border="0" cellspacing="0" cellpadding="0">
					<tr>
					  <td width="5%">&nbsp;</td>
					  <?php if(!empty($rel_arr_news['docoment_name'])){?>
						<td align="left">
							<a target="_self" href='./userUpload/attachment/<?php echo $rel_arr_news['docoment_name'];?>'>
								<?php echo $rel_arr_news['title_cn'];?>
							</a>
						</td>
					  <?php }else{?>
						<td align="left">
							<a target="_self" href='javascript:void(0);' alt='暫無內容瀏覽'>
								<?php echo $rel_arr_news['title_cn'];?>
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
<?php include 'foot.php'; ?>
</body>
</html>
