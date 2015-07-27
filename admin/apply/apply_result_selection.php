<?
    // Connect Database
    require("../../php-bin/function.php");
    require("../../php-bin/pagedisplay.php");

    // Initial variables
    $msg = "";
    $u_name = "";
    $u_type = "";
    $u_status = "";

    if (isset($_GET["msg"])){  // GET status message
      $msg = $_GET["msg"];
    }

    $orderby = "";
    $orderseq = "asc";
    $page = 1;
    $record_per_page = 15;   // records display each page

    if (isset($_GET["page"])){
        $page = $_GET["page"];
    }
    
    if (isset($_GET["orderby"])){
        $orderby = $_GET["orderby"];
    }
    
    if (isset($_GET["seq"])){
        $orderseq = $_GET["seq"];
    }
    /* pagedisplay function's arrays
     * $search_arr : The searching arguments array, format likes :
     *               array("name1"=>"value1",
     *                     "name2"=>"value2");
     * $sort_arr : The sorting arguments array, format likes :
     *             array("orderby"=>"order_by_name1",
     *                   "seq"=>"asc/desc",
     *                   "orderby"=>"order_by_name2",
     *                   "seq"=>"asc/desc");
	 * $class_arr : The style class of font,table,table row and table cell, format likes :
     *              array("font_class_name",
     *                    "table_class_name",
     *                    "tr_class_name",
     *                    "td_class_name");  
    */
    $id=$_GET["id"];
	if($_GET["classid"]=""){
		$classid=$_GET["id"];
		}else{
			$id=$_GET["classid"];
			}
    $search_arr = array("t_name"=>$_GET["t_name"],"id"=>$_GET["id"]);
	
    $sort_arr = array("orderby"=>$orderby,
                      "seq"=>$orderseq);
    $class_arr = array("",
                       "small border=0 cellpadding=0 cellspacing=0",
                       "",
                       "\"\" style=\"padding-left:2px;padding-right:2px;\"");

    // Get User's Information
    $get_sql = "Select * FROM `tbl_apply_form_submit` WHERE post_id = $_GET[id]";

    if ($_GET[t_name] != ""){
		$get_sql .= " AND ( name_chi LIKE '%".$_GET[t_name]."%'";
		$get_sql .= " OR name_eng LIKE '%".$_GET[t_name]."%'";
		$get_sql .= " OR tel LIKE '%".$_GET[t_name]."%'";
		$get_sql .= " OR email LIKE '%".$_GET[t_name]."%')";
    }
	
    if ($orderby!=""){
        $get_sql .= " ORDER BY ".$orderby." ".$orderseq;
    }
    else
    	$get_sql .= " ORDER BY DateTime DESC";

    $get_result = mysql_query($get_sql, $link_id);
    $total_record = mysql_num_rows($get_result);
    $offset = $record_per_page * ($page-1);
    $total_page = ceil($total_record/$record_per_page);
    $get_result = mysql_query($get_sql." limit $offset,$record_per_page;", $link_id);

    mysql_close();
?>

