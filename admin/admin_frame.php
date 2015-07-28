<?PHP
session_start();

error_reporting(0);

require_once("../php-bin/teacher_check.php");


?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Admin Panel</title>
</head>

<frameset rows="*" cols="170,*" framespacing="0" frameborder="No" border="0">
  <frame src="admin_center.php" name="admin_left">
  <frame src="main.htm" name="admin_main">
</frameset>
<noframes><body>

</body></noframes>
</html>
