<?




    // Connect Database

    require("../../php-bin/function.php");

    require("../../php-bin/pagedisplay.php");



    // Initial variables

    $msg = "";

    if (isset($_GET["msg"])){  // GET status message

      $msg = $_GET["msg"];

    }



    $orderby = "id";

    $orderseq = "desc";

    $page = 1;

    $record_per_page = 15;   // records display each page

    if (isset($_GET["page"])){

        $page = $_GET["page"];

    }


    $search_arr = array("s_name"=>$_GET["s_name"]);





    // Get User's Information

    $get_sql = "Select * FROM `tbl_parent` ";

    if (isset($_GET[s_name]) != ""){
	$get_sql .= " WHERE name LIKE '%" . $_GET[s_name]. "%'"; 
    }
	
	if (isset($_GET["seq"])){

        $orderseq = $_GET["seq"];

    }

    if ($orderby!=""){

        $get_sql .= " ORDER BY ".$orderby.' '.$orderseq;

    }

    $get_result = mysql_query($get_sql, $link_id);

    $total_record = mysql_num_rows($get_result);

    $offset = $record_per_page * ($page-1);

    $total_page = ceil($total_record/$record_per_page);

    $get_result = mysql_query($get_sql." limit $offset,$record_per_page;", $link_id);



    mysql_close();



?>

