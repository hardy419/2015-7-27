<?php
require_once('Classes/Checkcode.class.php');
$check_code = new Checkcode(70, 20);
$checknum=$check_code->createCode();
setcookie("checkcode",$checknum,0,'/');
$check_code->write();
?>