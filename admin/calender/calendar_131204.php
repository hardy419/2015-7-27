<?
    require("../../php-bin/function.php");
    
    if ($_GET[type] == "S"){
    	$type = "S";
    	$title = "最新消息";
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
?>
<html>
<head>
<title>相片庫管理</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<LINK REL="StyleSheet" TYPE="text/css" HREF="../../js/style.css">
<script src='http://code.jquery.com/jquery-1.10.2.min.js' type='text/javascript'></script>
</head>
<body>
<? if ($_GET[type] == "S"){ ?>
<img src="admin_label_news.gif" width="500" height="35"><br>
<? } else { ?>
<img src="admin_label.gif" width="500" height="35"><br>
<? } ?>
<table width="650" border="0" cellspacing="0" cellpadding="5">
  <tr>
    <td>
	
	<?

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
 // date("d-m-Y  H:i:s", $post_dateline)
?>
    <table width="100%"  border="0" cellspacing="1" cellpadding="10">
      <tr>
        <td><font class=style8 color=red>
          <? if ($msg!="") echo "<br>".$msg; ?>
        </font></td>
      </tr>
    </table>
      <br>
      <table width="100%" border="0" cellpadding="10" cellspacing="1" class="small">
        <tr align="left" valign="top" bgcolor="#FFFFFF">
          <td width="15%"><span class="subHead">新增事件</span>：</td>
          <td width="85%" bgcolor="#FFFFFF">
			<a href="add_cale.php?type=<?=$type?>&year=<?=$_GET[year]?>&month=<?=$_GET[month]?>">新增事件</a>
			<div style='float:right;'>
				<font>瀏覽模式</font>
				<select name='showType' id='showType'>
					<option value='C' <?php if($_GET['hi_ST']!='L') echo 'selected';?>>日曆模式</option>
					<option value='L' <?php if($_GET['hi_ST']=='L') echo 'selected';?>>列表模式</option>
				</select>
				<script>
					$(document).ready(function(){
						<?php if($_GET['hi_ST']!='L'){ ?>
							$('#tb_list').fadeOut(100,function(){
								$('#tb_calender').fadeIn();
							});
							$('#hi_ST').val('C');
						<?php }else{ ?>
							$('#tb_calender').fadeOut(100,function(){
								$('#tb_list').fadeIn();
							});
							$('#hi_ST').val('L');
						<?php } ?>
						$('#showType').change(function(){
							var tp = $(this).val();
							if(tp == 'C'){
								$('#tb_list').fadeOut(100,function(){
									$('#tb_calender').fadeIn();
								});
								$('#hi_ST').val('C');
							}else{
								$('#tb_calender').fadeOut(100,function(){
									$('#tb_list').fadeIn();
								});
								$('#hi_ST').val('L');
							}
						});
					});
				</script>
			</div>
		  </td>
        </tr>
      </table>
      <hr style="height:1px;color=ECECEC;">
      <table width="100%" border="0" cellpadding="10" cellspacing="1" class="small">
        <tr align="left" valign="top" bgcolor="#FFFFFF">
          <td width="15%"><span class="subHead">查看事件</span>：</td>
          <td width="85%"><table border=0 cellpadding=3>
            <form method=GET action='' enctype="multipart/form-data">
              <input type="hidden" name="type" value="<?=$type?>">
              <input type="hidden" id='hi_ST' name="hi_ST" value="">
              <tr>
                <td><select name="year">
                    <?
$start = date("Y", $time) - 10;
$end = date("Y", $time) + 2;
for ($i =$start; $i <=$end; $i++){
	echo "<option value=$i ";
	if ($i == $year)
		echo "selected=selected";
	echo ">$i 年";
}
?>
                </select></td>
                <td><select name="month">
                    <?
for ($i =1; $i <=12; $i++){
	echo "<option value=$i ";
	if ($i == $month)
		echo "selected=selected";
	echo ">". monthstr($i);
}
?>
                  </select>
                </td>
                <td><input name="submit" type="submit" class="small" value="查看<?=$title?>"></td>
              </tr>
            </form>
          </table></td>
        </tr>
      </table>
      <table width="100%" border="0" cellpadding="10" cellspacing="1" class="small">
        <tr align="left" valign="top" bgcolor="#FFFFFF">
          <td width="15%">&nbsp;</td>
          <td width="85%" align="right" bgcolor="#FFFFFF"><a href=calendar.php?type=<?=$type?>&year=<?=date("Y")?>&month=<?=date("m")?>>今天是
              <?=date("Y")?>
年
<?=date("m")?>
月
<?=date("d")?>
日</a> </td>
        </tr>
      </table>
      <table width=100%  border=0 cellpadding=5 cellspacing=1 bgcolor="#CCCCCC" style='display:none;' class=small id='tb_calender'>
      <tr align="center" valign="top" bgcolor="ECECEC" > 
        <td width=14% nowrap>星期日</td>
        <td width=14% nowrap >星期一</td>
        <td width=14% nowrap>星期二</td>
        <td width=14% nowrap >星期三</td>
        <td width=14% nowrap>星期四</td>
        <td width=14% nowrap >星期五</td>
        <td width=14% nowrap>星期六</td>
</tr>
<?



//	<hr width="98%">
	$startday = date('w', $loadmonth) ;
	$mdays = monthday($month,$year);
 // calendarid userid username date title content time classid year public schoolid
 	$i = 1;
 	$i1 = 1;
	if ($startday != 0){
		echo "<tr bgcolor=#FFFFFF height=\"80\" valign=\"top\">";
		for ($y =0; $y < $startday; $y++){
			$show = 0;
			echo "<td >&nbsp;</td>";
		}

	}
	else{
		echo "<tr height=\"80\" valign=\"top\">";
	}
		$i1++;
	do {
		if ($i1 % 2 == 0){
			//$trcolor = "#FFFFFF";
			$tdcolor = "#FFFFFF";
		}
		else{
			//$trcolor = "#FFFFFF";
			$tdcolor = "#FFFFFF";
		}
		if ($i != 1)
			echo "<tr  height=\"80\" valign=\"top\">";
		for ($y = $startday; $y <= 6; $y++){
				
			$query="SELECT * FROM `tbl_calendar` WHERE `date` = '$year-$month-$i' and type ='$type'";
			$result = mysql_query($query, $link_id);
			$isToday= (date("Y")==$_GET["year"] && date("m")==$_GET["month"] && date("d")==$i)?true:false;
			$tdcolor=($isToday)?"#ECECEC":"#FFFFFF";
					
			if (mysql_num_rows($result)!=0){
				$show = 1;
				echo "<td bgcolor=$tdcolor>";
				if ($isToday) echo "<b>";
				echo $i;			
				if ($isToday) echo "</b>";
				while ($object=mysql_fetch_object($result)){
					echo "<br><a href=calendarview.php?id=$object->calendarid&year=$_GET[year]&month=$_GET[month]>$object->title_cn</a>";
				}
			}
			else{
				$show = 0;
				echo "<td bgcolor=$tdcolor>";
				if ($isToday) echo "<b>";
				echo $i;			
				if ($isToday) echo "</b>";
			}
			
			echo "</td>";
			$i++;
			if ($i > $mdays && $y !=6){
				$y1 = $y;
				for ($z =0; (6 - $y) > $z; $z++){
					$show = 0;
					echo "<td bgcolor=$tdcolor>&nbsp;</td>";
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
</table>

<table width=100%  border=0 cellpadding=5 cellspacing=1 bgcolor="#CCCCCC" class=small id='tb_list' style='display:none;'>
    <tr align="center" valign="top" bgcolor="ECECEC" > 
		<td width=15%>日期</td>
		<td width=40%>标题</td>
		<td width=10%>是否最新消息</td>
		<td width=10%>是否横幅显示</td>
		<td width=10%>查看</td>
	</tr>
	<?



//	<hr width="98%">
	$startday = date('w', $loadmonth) ;
	$mdays = monthday($month,$year);
 // calendarid userid username date title content time classid year public schoolid
 
	$query_list="SELECT * FROM `tbl_calendar` WHERE `date` between '$year-$month-01' and '$year-$month-31' and type ='$type'";
	$result_list = mysql_query($query_list, $link_id);
			
	if (mysql_num_rows($result_list)!=0){
		while ($object_list=mysql_fetch_object($result_list)){
			echo "<tr align=\"center\" valign=\"top\" bgcolor=\"FFFFFF\" > ";
			echo "<td>$object_list->date</td>";
			echo "<td>$object_list->title_cn</td>";
			echo "<td>$object_list->is_news</td>";
			echo "<td>$object_list->is_banner</td>";
			echo "<td><a href=calendarview.php?id=$object_list->calendarid&year=$_GET[year]&month=$_GET[month]>查看</a></td>";
			echo "</tr>";
		}
	}
	else{
		echo "<tr align=\"center\" valign=\"top\" bgcolor=\"ECECEC\" > ";
		echo "<td bgcolor=$tdcolor>&nbsp;</td>";
		echo "<td bgcolor=$tdcolor>&nbsp;</td>";
		echo "<td bgcolor=$tdcolor>&nbsp;</td>";
		echo "<td bgcolor=$tdcolor>&nbsp;</td>";
		echo "<td bgcolor=$tdcolor>&nbsp;</td>";
		echo "</tr>";
	}
?>
	</tr>
</table>
	
	
	</td>
  </tr>
</table>

</body>
</html>
<?

function check29($year){

$check = false;

if ($year % 4 ==0)
	$check = true;
if ($year % 100==0)
	$check = false;
if ($year % 400==0)
	$check = true;
return $check;
}

function monthstr($month){
if ($month=="01")
	$mstr = "一月";
else if ($month=="02")
	$mstr = "二月";
else if ($month=="03")
	$mstr = "三月";
else if ($month=="04")
	$mstr = "四月";
else if ($month=="05")
	$mstr = "五月";
else if ($month=="06")
	$mstr = "六月";
else if ($month=="07")
	$mstr = "七月";
else if ($month=="08")
	$mstr = "八月";
else if ($month=="09")
	$mstr = "九月";
else if ($month=="10")
	$mstr = "十月";
else if ($month=="11")
	$mstr = "十一月";
else if ($month=="12")
	$mstr = "十二月";
return $mstr;
}

function monthday($month, $year){
// 1 = 31 2=29 3=31 4 = 30 5 =31 6=30  7= 31 8 =31 9 = 30 10=31 11=30 12=31
if ($month=="01" || $month=="03" ||$month=="05" ||$month=="07" ||$month=="08" ||$month=="10" ||$month=="12")
	$mdays = 31;
else if ($month=="04" || $month=="06" ||$month=="09" ||$month=="11")
	$mdays = 30;
else if ($month=="02" && check29($year)==true)
	$mdays = 29;
else if ($month=="02")
	$mdays = 28;
return $mdays;
}

function rand_num($show, $type){
	if ($show ==0 or $type =="S"){
		$rand = 10;
		return $rand;
	}
	
	do{
		$rand = substr(rand() , -2,1)+1;
	}
	while($rand >= 8);
	
	settype($rand, "int");
	return $rand;
}
?>