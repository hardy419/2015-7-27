<?
// admin checking
require_once("../../php-bin/admin_check.php");
require_once("../../php-bin/function.php");

	if ($fmCSV_size) {
		$temp_SQL = "";
		$xgid="";
		$tempFlag = true;
	  	// Read in CSV file to consist SQL string
	  	$fp = fopen($fmCSV, "r");
	  	while ($row = fgetcsv($fp, $fmCSV_size)) {
			if (!$tempFlag) {
				for ($i=0; $i<6; $i++) {
					$row[$i] = trim($row[$i]);
				}
				
				// When data content size > 0
				if (strlen($row[0]) && strlen($row[1])) {
					$post_year = (substr($row[4], 0,4)|0);
					$post_month = (substr($row[4], 5,2)|0);
					$post_day = (substr($row[4], 8,2)|0);
					$postdate  = date("Y-m-d", mktime(0, 0, 0, $post_month, $post_day, $post_year));
					$due_year = (substr($row[5], 0,4)|0);
					$due_month = (substr($row[5], 5,2)|0);
					$due_day = (substr($row[5], 8,2)|0);
					$submit_date  = date("Y-m-d", mktime(0, 0, 0, $due_month, $due_day, $due_year));
					$submit_date_unchange  = date("Y-m-d", mktime(0, 0, 0, $due_month, $due_day, $due_year));
					$duedate  = date("Y-m-d", mktime(0, 0, 0, $post_month, $post_day+1, $post_year));
					echo $row[5]."|";
					echo $due_year."|";
					echo $due_month."|";
					echo $due_day."|";
					echo "subject=".$row[1]."|";
					echo "submitdate=".$submit_date."|";
					echo "duedate=".$duedate."|";
					while ($submit_date >= $duedate) {
						$sql = "INSERT INTO tbl_homework (subject_id, class_id, subject_branch, text, date, submit_date) 
								VALUES ('".$row[1]."', '".$row[0]."', '".$row[3]."', '".$row[2]."', '".$postdate."', '".$submit_date_unchange."')";
						mysql_query($sql);
						$due_day--;
						$submit_date  = date("Y-m-d", mktime(0, 0, 0, $due_month, $due_day, $due_year));
						$post_day++;
						$postdate  = date("Y-m-d", mktime(0, 0, 0, $post_month, $post_day, $post_year));
						echo $postdate;
					}
				}
			}
			$tempFlag = false;
		}
		fclose($fp);
		$msg = "狀況：家課匯入完成";
		header("Location:hw_import.php?&msg=$msg");
	}
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>無標題文件</title>
</head>

<body>
</body>
</html>
