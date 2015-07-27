<?php require("../php-bin/function.php"); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>網上報名導入</title>
</head>
<body><table width="60%" border="0" cellpadding="10" cellspacing="1" class="small" bgcolor="#CCCCCC">
                        <tr>
  
                          <td width="85%" bgcolor="#FFFFFF" align="center">網上報名導入系統 <a href="apply/apply_result.php?id=<?=$_GET["id"]?>" target="admin_main">返回</a></td>
                        </tr>
                        <tr>
 
                          <td width="85%" bgcolor="#FFFFFF" align="center"><form action="" method="post" enctype="multipart/form-data"> 
    <input type="hidden" name="leadExcel" value="true"> 
    <table align="center" width="90%" border="0">
      <tr>
         <td><input type="file" name="inputExcel" id="inputExcel" ><input type="submit" value="导入数据"></td>
      </tr>
    </table>
</form>  </td>
                        </tr>
      </table>

<?php
//include "PHPExcel/Classes/phpExcel/Writer/IWriter.php";
//include "PHPExcel/Classes/phpExcel/Writer/Excel5.php";
//require_once 'PHPExcel/Classes/phpExcel/Writer/Excel2007.php';
require("../php-bin/pagedisplay.php");  
require_once 'phpexecl/PHPExcel.php';       
require_once 'phpexecl/PHPExcel/Writer/Excel5.php';   
//include 'PHPExcel/Classes/phpExcel/IOFactory.php';
 
//设定缓存模式为经gzip压缩后存入cache（PHPExcel导入导出及大量数据导入缓存方式的修改 ） 
$cacheMethod = PHPExcel_CachedObjectStorageFactory::cache_in_memory_gzip; 
$cacheSettings = array(); 
PHPExcel_Settings::setCacheStorageMethod($cacheMethod,$cacheSettings); 
 
 $objPHPExcel = new PHPExcel();
//读入上传文件
if($_POST){
    $objPHPExcel = PHPExcel_IOFactory::load($_FILES["inputExcel"]["tmp_name"]);
    //内容转换为数组 
    $indata = $objPHPExcel->getSheet(0)->toArray();
    //echo $objPHPExcel->getSheetCount();

    //把数据新增到mysql数据库中
	$post_id=$_GET["id"];
	if($post_id==""){
		$post_id=34;
		}

$i=1;
    foreach($indata as $item){
		if(trim($item[2])==="女"){
			$xb="f";
			}else{
				$xb="m";
				}
       if($i>2){
        $sql = "insert into tbl_apply_form_submit(`post_id`,`name_chi`,`name_eng`,`sex`,`tel`,`email`,`special_question_1`,`special_question_2`,`remark`) values('$post_id','$item[0]','$item[1]','$xb','$item[3]','$item[4]','$item[5]','$item[6]','$item[7]')";
        mysql_query($sql);}
		$i++;
    }
	echo "<a href='apply/apply_result.php?id=".$_GET["id"]."' target='admin_main'>導入成功,返回查看</a>";
}  
//查看是否导入成功

?>
</body>
</html>