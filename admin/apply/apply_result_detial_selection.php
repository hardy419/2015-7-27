<?
    // Connect Database
    require("../../php-bin/function.php");
    require("../../php-bin/pagedisplay.php");

    // Get User's Information
    $get_sql = "Select tafs.*, ta.special_question_1 AS sq1, ta.special_question_2 AS sq2, ta.special_question_3 AS sq3 FROM `tbl_apply_form_submit` tafs, `tbl_apply` ta WHERE ta.id = tafs.post_id AND form_id = $_GET[id]";

    $get_result = mysql_query($get_sql,$link_id);

	$record = mysql_fetch_object($get_result);

    mysql_close();
?>