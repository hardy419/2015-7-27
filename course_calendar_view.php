<?php include 'header.php'; ?>
<?php include 'banner_school.php'; ?>
<div class="banner_02"></div>
<div id="content">
    <div class="left_side">
        <div class="left_side_top02"><img src="images/left_top_03.jpg" width="200" height="61" /></div>
        <div class="left_side_content">
            <div class="left_side_content_in">
              <table width="176" border="0" cellspacing="0" cellpadding="0">
                <tr>
                  <td><a href="course_course.php"><img src="images/course_left_03.jpg" width="187" height="66" /></a></td>
                </tr>
                <tr>
                  <td><a href="course_train.php"><img src="images/course_left_05.jpg" width="187" height="66" /></a></td>
                </tr>
                <!--tr>
                  <td><a href="course_class.php"><img src="images/course_left_06.jpg" width="187" height="66" /></a></td>
                </tr-->
                <tr>
                  <td><a href="course_nimble.php"><img src="images/course_left_07.jpg" width="187" height="66" /></a></td>
                </tr>
                <!--tr>
                  <td><a href="course_calendar.php"><img src="images/course_left_hover_08.jpg" width="187" height="65" /></a></td>
                </tr-->
                <!--tr>
                  <td><a href="school_apply.php"><img src="images/course_left_OnlineApplication.jpg" width="187" height="65" /></a></td>
                </tr-->
              </table>
               
            </div>
        </div>
    </div>
<?
$query="SELECT * FROM `tbl_calendar` WHERE  `calendarid` = '$_GET[id]'";;
$result = mysql_query($query, $link_id);
if (mysql_num_rows($result)!=0){
	while ($object=mysql_fetch_object($result)){
	// calendarid userid username date title content time classid year public schoolid
		$id=$object->calendarid;
		$title_cn=$object->title_cn;
		$content=$object->content;
		$username=$object->poster;
		$timestr =$object->posttime;
		$date =$object->date;	
		$type_post =$object->type;			
		$link_text =$object->link_text;
		$link_url =$object->link_url;
		$new_window =$object->link_open_window;
		$file_name =$object->file_name;			
		$content =ereg_replace("\n","<BR>",$content);
	}
}

if ($type_post == "S"){
	$type = "S";
	$title_1 = "最新消息";
}
else{
	$type = "T";
	$title_1 = "行事歷";
} 

?>
	<div class="right_side">
        <div class="right_side_top02">
          <table width="780" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td align="left"><img src="images/course_top_44.jpg" /></td>
              <td align="right" class="12pxfont"><table border="0" cellspacing="0" cellpadding="0"  class="position email_hover">
                <tr>
                  <td align="left">現在位置：</td>
                  <td align="left"><a href="index.php" target="_self">首頁</a></td>
                  <td width="25" align="center">&gt;</td>
                  <td align="left"><a href="course_course.php" target="_self">學校課程</a></td>
                  <td width="25" align="center">&gt;</td>
                  <td align="left" height="25"><a href="course_calendar.php" target="_self">校歷表</a></td>
                  <td width="25" align="center">&gt;</td>
                  <td align="left" height="25"><?php echo get_sub_string($title_cn,16);?></td>
                </tr>
                <tr>
                  <td align="left">Position：</td>
                  <td align="left"><a href="index.php" target="_self">Home</a></td>
                  <td width="25" align="center">&gt;</td>
                  <td align="left"><a href="course_course.php" target="_self">Curriculum</a></td>
                  <td width="25" align="center">&gt;</td>
                  <td align="left" height="20"><a href="course_calendar.php" target="_self">School calendars</a></td>
                  <td width="25" align="center">&gt;</td>
                  <td align="left" height="25"><?php echo get_sub_string($title_cn,16);?></td>
                </tr>
              </table></td>
            </tr>
          </table>
      </div>

          <table width="100%" border="0" cellspacing="0" cellpadding="0">
			<tr>
				<td colspan='2' align='right'>&nbsp;</td>
			</tr>
			<tr>
				<td colspan='2' align='right'>
					<?php show_get_back(); ?>
					<!--?php show_post_mail('留言板'); ?-->
				</td>
			</tr>
			<tr>
				<td colspan='2' align='right'>&nbsp;</td>
			</tr>
		</table>
		<table width="780" border="0" align="left" cellpadding="0" cellspacing="0" style="background-repeat:no-repeat;background-position:right ">
		  <tr>
			<td width="780" valign="top" >
				<table width="780" border="0" cellpadding="0" cellspacing="0">
				<tr>
				  <td width="780" valign="top"><br>
					<table width="780" border="1" cellpadding="10" cellspacing="0" bgcolor="#ffffff" style='border:1px solid #5B7BB6;'>
					<tr>
					  <td width="49" background="../images/tbg2.jpg">日期:</td>
					  <td width="476" background="../images/tbg1.jpg"><span class="admin_maintain_contents"><font class="style8">
						<?=substr($date,8,2)."-".substr($date,5,2)."-".substr($date,0,4)?>
					  </font></span>
					  </td>
					</tr>
					<tr>
					  <td valign="top" background="../images/tbg2.jpg">標題:</td>
					  <td valign="top" background="../images/tbg1.jpg"><?=$title?></td>
					</tr>
					<tr>
					  <td valign="top" background="../images/tbg2.jpg">內容:</td>
					  <td valign="top" background="../images/tbg1.jpg"><?=$content?>
					  </td>
					</tr>
					<tr>
					  <td valign="top" background="../images/tbg2.jpg">連結:</td>
					  <td valign="top" background="../images/tbg1.jpg"><? echo "<a href=$link_url ". ($new_window == "Y" ? "target=_blank":"") .">$link_text</a>"; ?></td>
					</tr>
					<tr>
					  <td valign="top" background="../images/tbg2.jpg">附件:</td>
					  <td valign="top" background="../images/tbg1.jpg"><div align="left">
						  <?
						if ($file_name != ""){
						?>
									  <a href="calendar/attachment/<?=$file_name?>" target="_blank">下載</a>
									  <?
						}
						?>
					  </div>                <div align="right"><font size="-1">
					  </font> </div></td>
					  </tr>
				  </table></td>
				</tr>
			</table></td>
		  </tr>
		</table>
		<a style='position:relative;top:10px;'	href='javascript:void(0);' onclick='javascript:history.go(-1);'>返回</a>
</body>
</html>