<?
require("../../php-bin/function.php");
require_once("../../php-bin/image_resize.php");



// calendarid post_id poster date title content posttime 
    if (isset($_GET[id])){
	$date = $_POST[date_year] . "-" .  $_POST[date_month] . "-" .  $_POST[date_day];
	$title = htmlspecialchars($_POST[title]);
	$content = htmlspecialchars($_POST[content]);

      // Insert new data
      $add_sql = "update `tbl_development` set teacher_name = '$_POST[teacher_name]', link_url = '$_POST[link_url]', link_open_window = '$_POST[new_window]', date ='$date' , title ='$title', content ='$content', develop_type = '$_POST[develop_type]' where development_id = '$_GET[id]'";
  //    echo  $add_sql;

	 mysql_query($add_sql);

     $msg = "事件更改完成";

     mysql_close();
      
     header("Location:develop_view.php?year=$_GET[year]&month=$_GET[month]&id=$_GET[id]&msg=$msg&develop_type=$_GET[develop_type]");

    }

?>