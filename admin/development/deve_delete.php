<?

    // Connect Database

    require("../../php-bin/function.php");




    if (isset($_GET["id"])){

      // Delete data

      $del_sql = "DELETE

                  FROM `tbl_development`

                  WHERE development_id ='".$_GET["id"]."';";

	  $run_status = mysql_query($del_sql);



	  if (!$run_status) {

        $msg = str_replace(" ", "+", "Query failed: " . mysql_error($link_id));

      }else{

        $msg = "事件刪除完成";

      }



      mysql_close();

    

      header("Location:development.php?develop_type=$_GET[develop_type]&year=$_GET[year]&month=$_GET[month]&msg=$msg");

      

    }
?>