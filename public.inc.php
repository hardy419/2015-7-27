<?php
require dirname(__FILE__)."/config.inc.php";
require dirname(__FILE__)."/include/global.func.php";
$link=load("model.class.php");
$session=load("session.class.php");
session_start();