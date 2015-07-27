<?
session_start();

if ($_SESSION[admin_level] != 1){

	header("Location:../admin/index.php");
}


?>