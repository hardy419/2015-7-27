<?php
	
	$urlshang = $_SERVER['HTTP_REFERER'];
	$url_arr = explode('/',$urlshang);
	$num = count($url_arr);
	$url_page = $url_arr[$num-1];
	
	session_start();
	unset($_SESSION['UID']);
	unset($_SESSION['UTPYE']);
	unset($_SESSION['UNAME']);
	
	header('location:./'.$url_page);
?>