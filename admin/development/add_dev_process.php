<?

require("../../php-bin/function.php");

if (isset($_POST[Submit])){
	
	$date = $_POST[date_year] . "-" .  $_POST[date_month] . "-" .  $_POST[date_day];
	$title = htmlspecialchars($_POST[title]);
	$content = htmlspecialchars($_POST[content]);
	$teacher_name = htmlspecialchars($_POST[teacher_name]);

    // Insert new data
    $add_sql = "INSERT INTO `tbl_development` ( `post_id` , `poster` , `date` , `title` , `content` , `teacher_name` , `posttime` , `link_url` , `link_open_window` , `develop_type`) VALUES ('$_SESSION[id]', '$_SESSION[name]', '$date', '$title', '$content', '$teacher_name', now(), '$_POST[link_url]', '$_POST[new_window]', '$_POST[develop_type]');";
   
	mysql_query($add_sql);
		 
    $msg = "事件新增完成";
	mysql_close();
      
//echo $add_sql;

	header("Location:development.php?msg=$msg");
    }

?>