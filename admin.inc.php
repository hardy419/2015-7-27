<?php
session_start();
require dirname(__FILE__)."/config.inc.php";
require dirname(__FILE__)."/include/global.func.php";
$link=load("model.class.php");
$session=load("session.class.php");
/* ================= 权限控制 ================= */

$is_login=$session->userdata("is_login");
if($_SESSION["admin_login"]<=0||$_SESSION["access_teacher"]==0){
	exit("access denial.<BR><a href='./index.php'>Please Login!</a>");

} 

?>