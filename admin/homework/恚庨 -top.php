<?
session_start();
require("../../php-bin/function.php");
require("../../php-bin/get_class_student.php");

$year = date("Y");
$day = date("d");
$month = date("m");
$week = date("w");

if ($_GET[date]!=""){
	$s_year = substr($_GET[date], 6,4);
	$s_month = substr($_GET[date], 3,2);
	$s_day = substr($_GET[date], 0,2);	

	if (checkdate($s_month, $s_day, $s_year)==true){
		$year = $s_year;
		$month = $s_month;	
		$day = $s_day;
		
		$week = date("w", mktime(0, 0, 0, $month , $day, $month));			
	}	
}


	$date_num = mktime(0, 0, 0, $month , $day, $year) - (86400 * 7);
	$sp_y = date("Y",$date_num);
	$sp_m = date("m",$date_num);
	$sp_d = date("d",$date_num);

	$date_num = mktime(0, 0, 0, $month , $day, $year) + (86400 * 7);
	$next_y = date("Y",$date_num);
	$next_m = date("m",$date_num);
	$next_d = date("d",$date_num);	
?>

<?
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

function nextday($day,$month, $year ){
	$day++;
	if ($day > monthday($month, $year)){
		$month++;
		$day = 1;
		
	}
	if ($month > 12){
		$year++;
		$month = 1;
	}
	
$array[0] = $day;
$array[1] = $month; 
$array[2] = $year;
	return $array;
}

function lastday($day,$month, $year, $last_day){
	if ($last_day > $day){
		$last_day -= $day;
		if($month !=1){
			$month--;
		}
		else{
			$month = 12;
			$year--;
		}
		$new_month_day = monthday($month, $year);
		$day = $new_month_day - $last_day;
	
	}
	else if ($last_day == $day){
		$last_day = 1;
		if($month !=1){
			$month--;
		}
		else{
			$month = 12;
			$year--;
		}
		$new_month_day = monthday($month, $year);
		$day = $new_month_day - $last_day;	
	}
	else{
		$day -= $last_day;	
	}

	
$array[0] = $day;
$array[1] = $month; 
$array[2] = $year;
	return $array;
}
?>

<script language="JavaScript">
		function getlink(link){
			var sel_class_index = document.form1.classname.selectedIndex;
			var sel_class_name = document.form1.classname[sel_class_index].value;
			parent.show_hw.location = link + "&classname=" + sel_class_name;
		}
</script>
<html>
<head>
<title></title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<LINK REL="StyleSheet" TYPE="text/css" HREF="../../js/style.css">
<style type="text/css">
<!--
.style2 {color: #006699}
.style5 {color: #666666}
-->
</style>
</head>
<body>
<img src="admin_label.gif" width="500" height="35"><br>
<table width="650"  border="0" cellspacing="0" cellpadding="5">
  <tr>
    <td>

        <form name="form1" method="post" action="">
		<table width="100%" border="0" cellpadding="10" cellspacing="0">
          <tr>
            <td width="15%"> <span class="subHead">選舉班別：</span>              </td>
            <td align="left"><select name="classname" class="small" id="classname">
<?
$class_list = $classname_list;
require_once("../../php-bin/get_class_select_html.php");
?>
            </select>
			</td>
            <td align="right"><div align="right">
			 <a href="?date=<?=date("d") .  "-" . date("m") ."-" . date("y")?>">本星期</a> 
			&nbsp;&nbsp;|&nbsp;&nbsp;
			<a href="?date=<?=$sp_d .  "-" . $sp_m ."-" . $sp_y?>">上星期</a> 
			&nbsp;&nbsp;|&nbsp;&nbsp;
			 <a href="?date=<?=$next_d .  "-" . $next_m ."-" . $next_y?>">下星期</a>
			</div>
			</td>
          </tr>
        </table>
        <table width="100%" border="0" cellpadding="10" cellspacing="1" bgcolor="#CCCCCC">
          <tr align="center" valign="top">
<?
/*
$year = 2005;
$day = 11;
$month = 9;
$week = 0;
*/

if ($week == 0)
	$week = 7;


$array = lastday($day,$month, $year, ($week-1));
$day = $array[0];
$month = $array[1];
$year = $array[2];	
for ($i =1; $i <= 5; $i++){
	if (mktime(0,0,0, $month ,$day ,$year) <= mktime(0,0,0, date("m") ,date("d") , date("Y")) or  ($_SESSION[teacher_level] == 1 && $_SESSION[not_admin_cp] != 1)){
		$output[$i][1] = "<a href=\"#\" onClick='getlink(\"show.php?date=$year-$month-$day\");'>";
	
	}

	$output[$i][0] = $month . "月" . $day . "日";
//	$output[$i][1] = $year . "-" . $month . "-" . $day;		
	$array = nextday($day,$month, $year);
	$day = $array[0];
	$month = $array[1];
	$year = $array[2];	
}
?>
            <td width="20%" bgcolor="ECECEC">
                <?=$output[1][1] . $output[1][0]?>
                <br>
        (星期一) </td>
            <td width="20%" bgcolor="ECECEC">
                <?=$output[2][1] . $output[2][0]?>
                <br>
        (星期二) </td>
            <td width="20%" bgcolor="ECECEC">
              
                <?=$output[3][1] . $output[3][0]?>
                <br>
        (星期三) </td>
            <td width="20%" bgcolor="ECECEC">
                <?=$output[4][1] . $output[4][0]?>
                <br>
        (星期四) </td>
            <td width="20%" bgcolor="ECECEC">
                <?=$output[5][1] . $output[5][0]?>
                <br>
        (星期五)</td>
          </tr>
        </table>
        </form></td>
  </tr>
</table>
</body>
</html>