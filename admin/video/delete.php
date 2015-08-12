<?php

// admin checking
require_once("../../admin.inc.php");

// Connect Database
require_once("../../php-bin/function.php");

// access control checking
require_once("z_access_control.php");

$id = $_GET['id']|0;

$http_referer_array = parse_url($_SERVER['HTTP_REFERER']);
parse_str($http_referer_array['query'], $referer_qstring);
$referer_qstring['msg']="R";
$referer_qstring=http_build_query($referer_qstring);

mysql_query("DELETE FROM tbl_video WHERE id={$id}") or die ("Excute Error");

echo "<script>location.href='{$http_referer_array['path']}?{$referer_qstring}'</script>";
exit;
?>