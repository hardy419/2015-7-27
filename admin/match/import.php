<?php

header("Content-Type:text/html;charset=utf-8"); 

// admin checking

require_once("../../php-bin/admin_check.php");



// access control checking

require_once("z_access_control.php");



// Connect Database

require_once("../../php-bin/function.php");





$file_input_name = "input_csv";

$temp_folder = "../../file_download/";







$csv_array = array();

$student_add_count = 0;

$student_count = 0;

$match_count = 0;

$row = 0;







if( $_FILES[$file_input_name]["tmp_name"] != "" )

{

	$ext = 'csv'; //strrchr($_FILES[$file_input_name]['name'], ".");

/*

	if( !($ext== '.csv' || $ext== '.txt') )

	{

		$msg = "請導入csv or txt文件.";

		header("Location: m_search.php?msg=".$msg);

	}

*/

	$new_name = "temp_match_import_".(time()|0).$ext;

	if (!copy($_FILES[$file_input_name]["tmp_name"], $temp_folder.$new_name))

	{

		echo "Fail to copy doc file - ". $_FILES[$file_input_name]["tmp_name"];

		exit();			

	}







	$handle = fopen($temp_folder.$new_name, "r");

	while( ($data=fgetcsv($handle, 100000, "\t")) !== FALSE )

	{

		if( $row++ != 0 ) // skip the header in cvs file.

		{

			$num = count($data);



			//if( $num!=8 || ($num==8&&$data[7]=='') )

				//continue;



			for( $c=0; $c<$num; $c++ )

			{

				$csv_array[$student_count][$c] = EncodeHTMLTag($data[$c]);

			}

			$student_count++;

		}

	}

	fclose($handle);



	// Delete import file

	unlink($temp_folder.$new_name);	









	// init

	$change = false;

	$match_title = "";

	$match_date = "";

	$year = 0;

	$month = 0;

	$day = 0;



	$match_year = "";

	$match_subject = "";

	$match_sponsor = "";

	$insert_id = 0;











	// insert the student to database - start

	foreach( $csv_array as $student_csv )

	{

		if( $match_title!=$student_csv[0] && $student_csv[0]!="" )

		{

			$change = true;

			$match_title = $student_csv[0];

		}

		if( $match_date!=$student_csv[1] && $student_csv[1]!="" )

		{

			$change = true;

			$year = substr($student_csv[1],0,4)|0;

			$month = substr($student_csv[1],5,2)|0;

			$day = substr($student_csv[1],8,2)|0;



			$match_year = $year|0;

			if( $month <= 8 )

				$match_year--;

		}

		if( $match_subject!=$student_csv[2] && $student_csv[2]!="" )

			$match_subject = $student_csv[2];

		if( $match_sponsor!=$student_csv[3] && $student_csv[3]!="" )

			$match_sponsor = $student_csv[3];

		if( $change )

		{

			$match_count++;

			$change = false;

			$add_sql = "

				INSERT INTO `tbl_match` 

				( `match_name`, `match_date`, `match_subject`, `match_sponsor`, `match_year` )

				VALUES

				( '$match_title', '$year-$month-$day', '$match_subject', '$match_sponsor', $match_year )

				"; 



			mysql_query($add_sql, $link_id);

			$insert_id = mysql_insert_id($link_id)|0;

		}

		$outside_praise = $student_csv[4];

		$inside_praise = $student_csv[5];

		$student_class_name = $student_csv[6];

		$student_name = $student_csv[7];

		$add_sql = "

INSERT INTO `tbl_match_record` 

( `match_id`, `match_record_student_name`, `match_record_class_name`, `match_record_outside_praise`, `match_record_inside_praise` )

VALUES

( $insert_id, '$student_name', '$student_class_name', '$outside_praise', '$inside_praise' )

"; 


		if ($student_name!="" && $student_class_name)

		{


			$run_status = mysql_query($add_sql, $link_id);

			$student_add_count+=( $run_status ) ? 1 : 0 ;


		}

	}

	// insert the student to database - end


	$msg = "共有".($student_count-1)."個學生, 導入了".$match_count."個比賽 和 ".$student_add_count."個學生.";

	header("Location: m_search.php?msg=".$msg);

}



?><html>

<head>

<title>校內校外比賽管理</title>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8">

<LINK REL="StyleSheet" TYPE="text/css" HREF="../../js/style.css">

<style type="text/css">

<!--

.style3 {color: #666666}

-->

</style>

</head>







<body>

  <span class="main_small"><img src="admin_label.gif" width="500" height="35"></span>

  <table width="650" border="0" align="left" cellpadding="5" cellspacing="0" class="table1">

    <tr>

      <td  valign="top">

                <table width="100%"  border="0" align="left" cellpadding="10" cellspacing="1" bgcolor="#CCCCCC" class="small">

                  <form method="POST" action="" enctype="multipart/form-data" >

                    <tr bgcolor="ECECEC">

                      <td colspan="2"><span class="subHead">導入比賽資料</span></td>

                    </tr>

                    <tr bgcolor="#FFFFFF">

                      <td width="82" height="18">Sample:</td>

                      <td height="18"><a href="match_import.xls" target="_blank">下載Excel Sample</a><BR>

請修改這個 Excel 檔案, 然后導出為CSV, 再在下面導入.<BR>

<font color="#FF66CC">請在導出時選 ( 繁體中文 [Cht], &nbsp; &nbsp; 定位鍵 [Tab], &nbsp; &nbsp; " [Double Quote] )</font></td>

                    </tr>

                    <tr bgcolor="#FFFFFF">

                      <td width="82" height="18">CSV檔案:</td>

                      <td height="18"><input type="file" name="<?php echo $file_input_name?>" >

                        <font color="#FF0000">* </font></td>

                    </tr>

                    <tr bgcolor="ECECEC">

                      <td>&nbsp;</td>

                      <td><input type=submit class="style8" value="    確定導入    "> &nbsp;

                          <input type="button" class="style5" id="back" onClick="history.go(-1)" value="返回">

                      </td>

                    </tr>

                  </form>

              </table>

      </td>

    </tr>

  </table>

</body>







</html>