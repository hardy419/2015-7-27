<?
session_start();


$_SESSION["admin_level"];
session_destroy();

header("Location:index.php");

?>