<?
// admin checking
require_once("../../php-bin/admin_check.php");

    // Connect Database

    require("../../php-bin/function.php");



    if (isset($_GET["id"])){

	// check the student at this class id 
	      $check_sql = "select * FROM `tbl_student` WHERE class_id='".$_GET["id"]."';";

	  $check_status = mysql_query($check_sql, $link_id);
	if (mysql_num_rows($check_status)==0){
	


      // Delete data

      $del_sql = "DELETE

                  FROM `tbl_class`

                  WHERE class_id='".$_GET["id"]."';";

	  $run_status = mysql_query($del_sql, $link_id);



	  if (!$run_status) {

        $msg = str_replace(" ", "+", "Query failed: " . mysql_error($link_id));

	 }else{

		$msg = "班別刪除完成";

	}
	
     }
     else{
		$msg = "這個班別還有學生存在，不能刪除";     
     }
     



      mysql_close();

    

    header("Location:index.php?msg=".urlencode($msg));
      

    }



?>

