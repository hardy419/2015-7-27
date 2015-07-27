<?
// admin checking
require_once("../../php-bin/admin_check.php");
    // Connect Database
    require("../../php-bin/function.php");

    if (isset($_POST[Submit])){

      // Insert new data
      $add_sql = "INSERT INTO tbl_class (class_name,year) VALUES ('$_POST[class_name]', '$_POST[class_year]')";      
    
	  $run_status = mysql_query($add_sql);

	  if (!$run_status) {
        if (mysql_errno($link_id)==1062){
          $msg = '班別名稱重複';
        }else{
          $msg = str_replace(" ", "+", "Query failed: " . mysql_error($link_id));
        }
      }else{
        $msg = "班別新增完成";
      }

      mysql_close();
      
      //echo $add_sql;
	  $msg = urlencode($msg);
      header("Location:index.php?msg=$msg");

    }

?>
