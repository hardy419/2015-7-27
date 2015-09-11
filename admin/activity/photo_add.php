<?php   


// Used to pass type_id to gallery.php
$type = mysql_escape_string ($_GET['type']);

require_once("photo_add_process.php"); 

header("location:gallery.php?id=$_POST[id]&type=$type");



?>