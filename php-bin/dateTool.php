<?php

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