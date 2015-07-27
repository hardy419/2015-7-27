<?
require("../../php-bin/function.php");

    if (isset($_POST['Submit'])){
		if(isset($_FILES["file_pdf"]["tmp_name"])&&$_FILES["file_pdf"]["tmp_name"]!=""){
			
			if($_FILES["file_pdf"]['size']<='2048000'){
				$uploaddir = '../../userUpload/pdf/';
				$file_info = pathinfo($_FILES["file_pdf"]['name']);
				$ext = $file_info['extension'];
				$ext = strtolower($ext);
				$types = '.pdf';
				if($ext!=='')
				{
					if(strpos($types,$ext)!==false && $_FILES["file_pdf"]["type"] == 'application/pdf')
					{
						$sec = '';
						foreach(explode(".", microtime(true)) as $val){
							$sec .= $val;
						}
						$upfile = $_FILES["file_pdf"]['tmp_name'];
						$file_name = time().substr(md5(uniqid(rand())), 0, 16).'.'.$ext;
						//begin to use image_resize_lib
						$output_path = $uploaddir;
						
						//end to use image_resize_lib
						if (copy($_FILES["file_pdf"]["tmp_name"],$output_path.$file_name)) {
							$query="update `tbl_school_calendar` set file_name ='$file_name' where id = 1;";
							mysql_query($query);
							$msg='100';//上传成功
						} else {
							$msg='101';//上传失败
						}
					}
					else
					{
						$msg='201';//不是PDF
					}
				}
			}else{
				$msg='301';//超出大小
			}
		}
		
		header("Location:school_calendar.php?msg=$msg&type=$_POST[type]");
    }
?>