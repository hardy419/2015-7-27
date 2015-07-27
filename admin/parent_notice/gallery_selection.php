<?
    // Connect Database
    require("../../php-bin/function.php");
    require("../../php-bin/pagedisplay.php");

    // Initial variables
    $msg = "";

    if (isset($_GET["msg"])){  // GET status message
      $msg = $_GET["msg"];
    }

    $page = 1;
    $record_per_page = 20;   // records display each page

    if (isset($_GET["page"])){
        $page = $_GET["page"];
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

    $search_arr = array("id"=>"$_GET[id]");

    $class_arr = array("",
                       "small border=0 cellpadding=0 cellspacing=0",
                       "",
                       "\"\" style=\"padding-left:2px;padding-right:2px;\"");

                       
    // Get Photo
    $get_sql = "SELECT * FROM `tbl_notice_photo` WHERE n_id = '$_GET[id]' order by `order` asc";

    $get_result = mysql_query($get_sql, $link_id);
    $total_record = mysql_num_rows($get_result);
    $offset = $record_per_page * ($page-1);
    $total_page = ceil($total_record/$record_per_page);
    $get_result = mysql_query($get_sql." limit $offset,$record_per_page;", $link_id);
    $get_result2 = mysql_query($get_sql." limit $offset,$record_per_page;", $link_id);
	$get_result3 = mysql_query($get_sql." limit $offset,$record_per_page;", $link_id);
       
    mysql_close();

?>