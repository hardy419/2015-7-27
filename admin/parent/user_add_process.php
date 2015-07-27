<?
// admin checking
require_once("../../php-bin/admin_check.php");
    // Connect Database
    require("../../php-bin/function.php");

    if (isset($_POST["submit"])){
	 $name = mysql_escape_string(trim($_POST['name']));
	 $u_name = mysql_escape_string(trim($_POST['u_name']));
	 $u_psd = mysql_escape_string(trim($_POST['u_psd']));
	 
	 $sql_check = 'select * from `tbl_parent` where `u_name` = \''.$u_name.'\'';
	 $check_res = mysql_query($sql_check,$link_id);
	 $res_check = mysql_fetch_array($check_res);
	 if($res_check){
		$msg = '家長帳號重複';
		header("Location:user.php?msg=$msg");
		exit();
	 }else{
		// Insert new data
      $add_sql = "INSERT INTO `tbl_parent` (`name`, `u_name`, `u_psd` , `type`)  VALUES ('".$name."', '".$u_name."', '".$u_psd."' , 'P');";
    
	  $run_status = mysql_query($add_sql);

	  if ($run_status) {
        $msg = "家長新增完成";
      }

      mysql_close();
      
      //echo $add_sql;
      header("Location:user.php?msg=$msg&s_name=$_POST[name]");
	 }
	 
      

    }

?>
