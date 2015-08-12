<?php   header("Content-Type:text/html;charset=utf-8"); 
// admin checking
require_once("../../admin.inc.php");

// Connect Database
require_once("../../php-bin/function.php");

// access control checking
require_once("z_access_control.php");







$access_teacher = $_POST["access_teacher"]|0;
$access_student = $_POST["access_student"]|0;
$access_class = $_POST["access_class"]|0;
$access_activity = $_POST["access_activity"]|0; 
$access_calendar = $_POST["access_calendar"]|0;
$access_news = $_POST["access_news"]|0;
$access_outside = $_POST["access_outside"]|0;
$access_file = $_POST["access_file"]|0;
$access_match = $_POST["access_match"]|0;
$access_topmark = $_POST["access_topmark"]|0;
$access_content = $_POST["access_content"]|0;
$access_headmaster = $_POST["access_headmaster"]|0;
$access_calendar_2 = $_POST["access_calendar_2"]|0;
$access_assignment = $_POST["access_assignment"]|0;
$access_detail = $_POST["cms_category"];
$access_calendar_s = $_POST["access_calendar_s"]|0;
$access_calendar_h = $_POST["access_calendar_h"]|0;
$access_calendar_p = $_POST["access_calendar_p"]|0;



$u_name = EncodeHTMLTag($_POST['u_name']);
$u_email = EncodeHTMLTag($_POST["u_email"]);
$u_intro = EncodeHTMLTag($_POST["u_intro"]);
$u_id = EncodeHTMLTag($_POST['u_name']);
//$u_pw = EncodeHTMLTag($_POST["u_pw"]);
$u_pw = md5($_POST["u_name"]);

$subject = EncodeHTMLTag($_POST["subject"]);
$show = "N";
if ($_POST[show] == "Y")
	$show = "Y";
$order = $_POST["order"]|0;
$duty_admin = EncodeHTMLTag($_POST["duty_admin"]);
$duty_teach = EncodeHTMLTag($_POST["duty_teach"]);
$got_degree = $_POST["got_degree"]|0;
$take_train = $_POST["take_train"]|0;
$pass_english_test = $_POST["pass_english_test"]|0;
$pass_putonghua_test = $_POST["pass_putonghua_test"]|0;
$year_experience = $_POST["year_experience"]|0;
$type_id = $_POST["type_id"]|0;




















// Insert new data
//$add_sql = "INSERT INTO `tbl_teacher` VALUES ('', '".$_POST["u_name"]."', '".$_POST["u_id"]."', '".$_POST["u_pw"]."', '".$u_edit."', '".$u_admin."');";

$add_sql = "INSERT INTO `tbl_teacher` 
( `teacher_name`, `teacher_email`, `teacher_intro`, `teacher_login`, `password`, 
 `subject`, `show`, `order`, `duty_admin`, `duty_teach`, `got_degree`, `take_train`,
 `pass_english_test`, `pass_putonghua_test`, `year_experience`, `type_id` ) 
VALUES ( '$u_name', '$u_email', '$u_intro', '$u_id', '$u_pw',
 '$subject', '$show', '$order', '$duty_admin', '$duty_teach', '$got_degree', '$take_train',
 '$pass_english_test', '$pass_putonghua_test', '$year_experience', '$type_id'  );";

$run_status = mysql_query( $add_sql, $link_id );










if( ! $run_status )
{
	$msg = str_replace(" ", "+", "Query failed: " . mysql_error($link_id));
}
else
{	
	$pkid = mysql_insert_id();

	// add access control - start
	$add_access_control_sql = "INSERT INTO `tbl_access_control`
	( teacher_id, access_teacher, access_student, access_class, access_activity, access_calendar, access_news, access_outside, 
access_file, access_match, access_topmark, access_content, access_headmaster, access_calendar_2, access_assignment,access_calendar_s, access_calendar_h, access_calendar_p  )
	 VALUES 
	( $pkid, $access_teacher, $access_student, $access_class, $access_activity, $access_calendar, $access_news, $access_outside, 
$access_file, $access_match, $access_topmark, $access_content, $access_headmaster, $access_calendar_2, $access_assignment, $access_calendar_s, $access_calendar_h, $access_calendar_p );";

	mysql_query( $add_access_control_sql, $link_id );
	// add access control - end 


	$uaer_meta_data=user_meta_data();
	foreach($uaer_meta_data as $key => $val):
		if($_POST[$key]){
			$fields = array('user_id', 'meta_key', 'meta_value');
			$values = array($pkid, $key, $_POST[$key]);
			$link->insert_data('tbl_usermeta', $fields, $values);
		}
	endforeach;





	// add access control detail - start
	$sql = "INSERT INTO `tbl_access_control_detail` ( `teacher_id` , `cms_category` , `category_id` , `level` ) VALUES ";
	$sql_ary = array();
	for( $i=0; $i<count($access_detail); $i++ )
	{
		$access_detail_ary = explode("-", $access_detail[$i]);
		$cms_category = $access_detail_ary[0];
		$category_id = $access_detail_ary[1];
		$sql_ary[] = " ($pkid, $cms_category, $category_id, 1)";
	}


	$sql .= implode(" , ", $sql_ary);
	if( count($access_detail) > 0 )
		$access_status = mysql_query( $sql, $link_id );
	// update access control detail - end 









	// Start Upload Photo
	$oldfilename = $_FILES["file"]['name'];
	$new_file_name = $pkid.substr($oldfilename,-4);	 

	if( isset($_FILES["file"]["tmp_name"]) && $_FILES["file"]["tmp_name"]!="" )
	{	
		$output_path="../../gallery_staff/";
		if (!copy($_FILES["file"]["tmp_name"],$output_path.$new_file_name))
		{
			echo "Fail to copy doc file - ". $_FILES["file"]["tmp_name"];
			exit();			
		}
		else
		{
			$query="update `tbl_teacher` set docoment_name ='$new_file_name' where teacher_id=$pkid ";
			mysql_query( $query, $link_id );
		}
	}
	// End Upload Photo
	$msg = "";
}

mysql_close();


header("Location:user.php");

?>