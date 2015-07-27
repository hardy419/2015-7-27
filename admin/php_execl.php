<?php require("../php-bin/function.php");?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>網上報名導出</title>
</head>
<body><?php   
require_once 'phpexecl/PHPExcel.php';       
require_once 'phpexecl/PHPExcel/Writer/Excel5.php';    
//$sdate=date('Y-M-D');//接受传递过来的生成时间段   
//$edate=$_POST["edate"];   
$sdate='2009-01-01';   
$edate='2009-04-01';   
$cancel_time=date('Y-M-D-H',time());
  
     
// 创建一个处理对象实例       
$objExcel = new PHPExcel();       
      
// 创建文件格式写入对象实例, uncomment       
$objWriter = new PHPExcel_Writer_Excel5($objExcel);      
    
//设置文档基本属性       
$objProps = $objExcel->getProperties();       
$objProps->setCreator("網上報名錶");       
$objProps->setLastModifiedBy("金巴崙長老會耀道中學");       
$objProps->setTitle("金巴崙長老會耀道中學網上報名表");       
$objProps->setSubject("金巴崙長老會耀道中學網上報名表");       
$objProps->setDescription("金巴崙長老會耀道中學網上報名表");       
$objProps->setKeywords("金巴崙長老會耀道中學網上報名表");       
$objProps->setCategory("網上報名表");       
      
//*************************************       
//设置当前的sheet索引，用于后续的内容操作。       
//一般只有在使用多个sheet的时候才需要显示调用。       
//缺省情况下，PHPExcel会自动创建第一个sheet被设置SheetIndex=0       
$objExcel->setActiveSheetIndex(0); 
$objActSheet = $objExcel->getActiveSheet();       
      
//设置当前活动sheet的名称       
$objActSheet->setTitle('網上報名錶');       
      
//*************************************       
//       
//设置宽度，这个值和EXCEL里的不同，不知道是什么单位，略小于EXCEL中的宽度   
$objActSheet->getColumnDimension('A')->setWidth(15);    
$objActSheet->getColumnDimension('B')->setWidth(20);    
$objActSheet->getColumnDimension('C')->setWidth(10);    
$objActSheet->getColumnDimension('D')->setWidth(15);    
$objActSheet->getColumnDimension('E')->setWidth(25);    
$objActSheet->getColumnDimension('F')->setWidth(20);    
$objActSheet->getColumnDimension('G')->setWidth(20);    
$objActSheet->getColumnDimension('H')->setWidth(18);    
$objActSheet->getColumnDimension('I')->setWidth(20);   
  
$objActSheet->getRowDimension(1)->setRowHeight(30);    
$objActSheet->getRowDimension(2)->setRowHeight(27);    
$objActSheet->getRowDimension(3)->setRowHeight(16);    
    




    



    $search_arr = array("t_name"=>$_GET["t_name"]);
    $sort_arr = array("orderby"=>$orderby,
                      "seq"=>$orderseq);
    $class_arr = array("",
                       "small border=0 cellpadding=0 cellspacing=0",
                       "",
                       "\"\" style=\"padding-left:2px;padding-right:2px;\"");

    // Get User's Information
    $get_sql = "Select * FROM `tbl_apply_form_submit` WHERE post_id =".$_GET["id"];

    if ($_GET["t_name"] != ""){
		$get_sql .= " AND ( name_chi LIKE '%".$_GET["t_name"]."%'";
		$get_sql .= " OR name_eng LIKE '%".$_GET["t_name"]."%'";
		$get_sql .= " OR tel LIKE '%".$_GET["t_name"]."%'";
		$get_sql .= " OR email LIKE '%".$_GET["t_name"]."%')";
    }
	
    if ($orderby!=""){
        $get_sql .= " ORDER BY ".$orderby." ".$orderseq;
    }
    else
    	$get_sql .= " ORDER BY DateTime DESC";

    $get_result = mysql_query($get_sql, $link_id);
    $total_record = mysql_num_rows($get_result);



$get_sql_subcat = "Select title,place,id FROM `tbl_apply` WHERE id =".$_GET["id"];
$get_result_subcat = mysql_query($get_sql_subcat, $link_id);
	
while($get_rows_subcat=mysql_fetch_array($get_result_subcat))
{
//设置单元格的值     
$objActSheet->setCellValue('A1',  $get_rows_subcat["title"]."(".$get_rows_subcat["place"].")");   
}
//合并单元格   
$objActSheet->mergeCells('A1:I1');    
//设置样式   
$objStyleA1 = $objActSheet->getStyle('A1');       
$objStyleA1->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);   
$objFontA1 = $objStyleA1->getFont();       
$objFontA1->setName('新細明體');       
$objFontA1->setSize(18);     
$objFontA1->setBold(true);       
  
//设置居中对齐   
  
$objActSheet->setCellValue('A2', '中文姓名');    
$objActSheet->setCellValue('B2', '英文名稱');    
$objActSheet->setCellValue('C2', '性別');    
$objActSheet->setCellValue('D2', '電話');    
$objActSheet->setCellValue('E2', '電郵');    
$objActSheet->setCellValue('F2', '參與人數（家長）');    
$objActSheet->setCellValue('G2', '參與人數（學生）');    
$objActSheet->setCellValue('H2', '備註');    
$objActSheet->setCellValue('I2', '提交時間');

  
//设置边框   

  $i=1;
//从数据库取值循环输出  
while ($get_rows=mysql_fetch_array($get_result,MYSQL_BOTH))
{
$name_chi=$get_rows["name_chi"];
$name_eng=$get_rows["name_eng"];  
$sex=$get_rows["sex"];
if($sex=="f"){
	$sexname="女";
	}else{$sexname="男";}
$tel=$get_rows["tel"];  
$email=$get_rows["email"];
$special_question_1=$get_rows["special_question_1"];  
$special_question_2=$get_rows["special_question_2"];
$remark=$get_rows["remark"];
$DateTime=$get_rows["DateTime"];   

  
$n=$i+2;       
    $objActSheet->getStyle('B'.$n)->getNumberFormat()->setFormatCode('@');   
    $objActSheet->getStyle('E'.$n)->getNumberFormat()->setFormatCode('@');   
       
    $objActSheet->getRowDimension($n)->setRowHeight(16);    

      
    $objActSheet->setCellValue('A'.$n, ' '.$name_chi.' ');    
    $objActSheet->setCellValue('B'.$n, ' '.$name_eng);    
    $objActSheet->setCellValue('C'.$n, ' '.$sexname);    
    $objActSheet->setCellValue('D'.$n, $tel.' ');    
    $objActSheet->setCellValue('E'.$n, ' '.$email);    
    $objActSheet->setCellValue('F'.$n, $special_question_1.' ');    
    $objActSheet->setCellValue('G'.$n, $special_question_2.' ');    
    $objActSheet->setCellValue('H'.$n, ' '.$remark.' '); 
	$objActSheet->setCellValue('I'.$n, ' '.$DateTime);  

$i++; 

}
  
//*************************************
//输出内容       
//       
    mysql_close();
$outputFileName = "phpexecl/apply".$cancel_time.$_GET["id"].".xls";       
//到文件       
$objWriter->save($outputFileName); 

  
?>
<script>
	function click_a(){
		var secs =5;
		document.getElementById('a_down').click();
		for(var i=secs;i>=0;i--)         
		{         
			window.setTimeout('doUpdate(' + i + ')', (secs-i) * 1000);         
		}   
	}
	function doUpdate(num)         
	{         
		document.getElementById('ShowDiv').innerHTML = '系统将在 <strong>'+num+'</strong> 秒后自动返回' ;         
		if(num == 0) { document.getElementById('a_back').click(); }         
	}   

	window.onload = click_a;
</script>
<?php echo("<a style='display:none;' id='a_down' href='phpexecl/apply".$cancel_time.$_GET["id"].".xls' mce_href='phpexecl/apply".$cancel_time.$_GET["id"].".xls'>点击下载報名學生</a>"); ?>
<a  style='display:none;' id='a_back' href="javascript:history.go(-1)">返回上一步</a>
<span>導出中，請稍後……</span><br/>
<div id="ShowDiv"></div>  
</body>
</html>