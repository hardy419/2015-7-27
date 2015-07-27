<?php include 'header.php'; ?>
<?php include 'banner_course.php'; ?>
<?php include './php-bin/dateTool.php'; ?>
<?php
if ($_GET[type] == "S"){
	$type = "S";
	$title = "校曆";
	$logo = "../../parent/images/c2_title_calen.gif";
	$width="41";
	$height="19";
}
else{
	$type = "T";
	$title = "行事曆";
	$logo = "../images/a2_title_sch.gif";
	$width="61";
	$height="19";
}    

$time = time();
if ($_GET['month'] != "" && $_GET['year'] != ""){
	$year = $_GET['year'];
	$month = $_GET['month'];
}
else{
	$year = date("Y", $time);
	$month = date("m", $time);

	$_GET['year'] = $year;
	$_GET['month'] = $month;
}
$day = date("j", $time);
$loadmonth = mktime(0, 0, 0 ,$month, 1, $year);
$mstr = date("F", $loadmonth);
$mstr = monthstr($month);
?>
<div class="banner_02"></div>
<div id="content">
    <div class="left_side">
        <div class="left_side_top02"><img src="images/left_top_06.jpg" width="200" height="61" /></div>
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
                  <td align="left" height="25">校歷表</td>
                </tr>
                <tr>
                  <td align="left">Position：</td>
                  <td align="left"><a href="index.php" target="_self">Home</a></td>
                  <td width="25" align="center">&gt;</td>
                  <td align="left"><a href="course_course.php" target="_self">Curriculum</a></td>
                  <td width="25" align="center">&gt;</td>
                  <td align="left" height="20">School calendars</td>
                </tr>
              </table></td>
            </tr>
          </table>
      </div>
        <div class="right_content">
          <table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td align="center">
			    <form id="form1" name="form1" method="get" action="" enctype="multipart/form-data">
				<table width=100% border="0" align="center" cellpadding="0" cellspacing="0">
					<tr>
					  <td width="127">
						<select name="year" size="1" id="select" style="width:100px;">
						  <?php
							$start = date("Y", $time) - 1;
							$end = date("Y", $time) + 2;
							for ($i =$start; $i <=$end; $i++){
							echo "<option value=$i ";
							if ($i == $year)
							echo "selected=selected";
							echo ">$i 年";
							}
						  ?>
						</select>
					  </td>
					  <td width="117">
						<select name="month" size="1" id="select" style="width:100px;">
						  <?php
							for ($i =1; $i <=12; $i++){
							echo "<option value=$i ";
							if ($i == $month)
							echo "selected=selected";
							echo ">". monthstr($i);
							}
						  ?>
						</select>
					  </td>
					  <td width="156"><form id="form2" name="form2" method="post" action="">
						<input type="submit" name="button" id="button" value="查看行事歷" />
					  </form></td>
					  <td style='text-align:right;'>
						<?php show_get_back(); ?>
						<!--?php show_post_mail('留言板'); ?-->
					  </td>
					</tr>
				  </table>
				  </form>
			  </td>
            </tr>
            <tr>
              <td align="center">&nbsp;</td>
            </tr>
            <tr>
              <td align="center">
			  <table width="100%" border="0" cellspacing="1" cellpadding="0" bgcolor="#8BA5D3">
                <tr style="color:#fff;">
                  <td height="35" align="center" bgcolor="#5b7bb6">星期日</td>
                  <td align="center" bgcolor="#5b7bb6">星期一</td>
                  <td align="center" bgcolor="#5b7bb6">星期二</td>
                  <td align="center" bgcolor="#5b7bb6">星期三</td>
                  <td align="center" bgcolor="#5b7bb6">星期四</td>
                  <td align="center" bgcolor="#5b7bb6">星期五</td>
                  <td align="center" bgcolor="#5b7bb6">星期六</td>
                </tr>
				<?
					$startday = date('w', $loadmonth) ;
					$mdays = monthday($month,$year);
				 // calendarid userid username date title content time classid year public schoolid
					$i = 1;
					$i1 = 1;
					$trHeight=50;
					
					
					if ($startday != 0){
						echo "<tr height=\"$trHeight\" valign=\"top\" bgcolor='#ffffff'>";
						for ($y =0; $y < $startday; $y++){
							$show = 0;
							echo "<td width='100'>&nbsp;</td>";
						}

					}
					else{
						echo "<tr height=\"$trHeight\" valign=\"top\" bgcolor='#ffffff'>";
					}
						$i1++;
					do {
						
						if ($i != 1)
							echo "<tr  height=\"$trHeight\" valign=\"top\" bgcolor='#ffffff'>";
						for ($y = $startday; $y <= 6; $y++){
							$query="SELECT * FROM `tbl_calendar` WHERE `date` = '$year-$month-$i' and type ='$type'";
							
							
							
							
							$result = mysql_query($query, $link_id);	
							
							$isToday= (date("Y")==$_GET["year"] && date("m")==$_GET["month"] && date("d")==$i)?true:false;	
							$numTxt=$isToday?"<b style='color:#5B7BB6;'>".$i."</b>":$i;
							
							if (mysql_num_rows($result)!=0){
								$show = 1;
									echo "<td width='80' style='padding:10px;'>".$numTxt;			
								while ($object=mysql_fetch_object($result)){
									if($object->link_open_window == 'Y'){
										echo "<br><a style='word-break:break-all;' target='_blank' href=course_calendar_view.php?id=$object->calendarid&year=$_GET[year]&month=$_GET[month]>$object->title_cn</a>";
									}else{
										echo "<br><a style='word-break:break-all;' href=course_calendar_view.php?id=$object->calendarid&year=$_GET[year]&month=$_GET[month]>$object->title_cn</a>";
									}
								}
							}
							else{
								$show = 0;
								echo "<td width='100'><span class=brown2>".$numTxt."</span>";			
							}
							
							echo "</td>";
							$i++;
							if ($i > $mdays && $y !=6){
								$y1 = $y;
								for ($z =0; (6 - $y) > $z; $z++){
									$show = 0;
									echo "<td width='100'>&nbsp;</td>";
									$y1++;
								}
									
								$y = 7;
							}
						}
						echo "</tr>";
						$startday = 0;
						$i1++;
					} while ($i <= $mdays);
				?>
              </table></td>
            </tr>
            <tr>
              <td align="center">&nbsp;</td>
            </tr>
          </table>
           
        </div>
    </div> 
</div>
<?php include 'foot.php'; ?>
</body>
</html>
