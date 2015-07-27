<?

// admin checking
require_once("../../php-bin/admin_check.php");

// Connect Database
require("../../php-bin/function.php");


$del_sql = "DELETE  FROM  tbl_subject  WHERE  subject_id=".$_GET['id'];
mysql_query($del_sql,$link_id);


header("Location: add_hw.php");
?>