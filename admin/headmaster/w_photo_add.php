<?php   
header("Content-Type:text/html;charset=utf-8"); 

require("w_photo_add_process.php");



header("location: w_gallery.php?id=$_POST[id]");



?>