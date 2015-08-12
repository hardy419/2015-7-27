<?php

header("Content-Type:text/html;charset=utf-8"); 

require_once("../admin.inc.php");



unset($_SESSION["admin_login"]);



session_destroy();



header("Location: index.php");



?>