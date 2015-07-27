<?
session_start();


require("../../php-bin/function.php");
require_once("../../php-bin/image_resize.php");
require_once("../../php-bin/lib_img_resize.php");

for ($i =1; $i <=5 ; $i++){

	if ($_FILES["file".$i]["tmp_name"]!=""){

		$oldfilename = $_FILES["file".$i]['name'];
		$name = htmlspecialchars($_POST["name".$i]);
		$desc = htmlspecialchars($_POST["desc".$i]);
		$t_desc = htmlspecialchars($_POST["t_desc".$i]);
		$mark = htmlspecialchars($_POST["mark".$i]);

		$resize_type = array('file_banner'=>array(
								'little'=>array('width'=>448,'height'=>225),
								'big'=>array('width'=>1001,'height'=>450)
								)
							);
		
		if(isset($_FILES["file_banner"]["tmp_name"])&&$_FILES["file_banner"]["tmp_name"]!=""){
		
			if($_FILES["file_banner"]['name']=='')
			{
				continue;
			}
			
			if($_FILES["file_banner"]['size']<='1024000'){
				$uploaddir = '../../userUpload/banner/';
				$file_info = pathinfo($_FILES["file_banner"]['name']);
				$ext = $file_info['extension'];
				$ext = strtolower($ext);
				$types = '.gif|.jpeg|.png|.bmp|.jpg';
				$key = '';
				if($ext!=='')
				{
					if(strpos($types,$ext)!==false)
					{
						$sec = '';
						foreach(explode(".", microtime(true)) as $val){
							$sec .= $val;
						}
						$key  = $sec.'.'.$ext;
						$upfile = $_FILES["file_banner"]['tmp_name'];
						$file_name = time().substr(md5(uniqid(rand())), 0, 16).'.'.$ext;
						//begin to use image_resize_lib
						$output_path = $uploaddir;
						foreach($resize_type['file_banner'] as $type_key=>$type_value)
						{
							if($type_key == 'little')
							{
								$ret = image_resize_lib($upfile,$file_name,$output_path.'small/',$type_value['width'],$type_value['height'],70);
							}
							else
							{
								$ret = image_resize_lib($upfile,$file_name,$output_path,$type_value['width'],$type_value['height'],70);
							}
						}
						//end to use image_resize_lib
						if ($ret) {
							$banner_file_status='100';//上传成功
						} else {
							$banner_file_status='101';//上传失败
						}
					}
					else
					{
						$banner_file_status='201';//不是图片
					}
				}
			}else{
				$banner_file_status='301';//超出大小
			}
		}
		
		if($_POST['is_news'] == 'Y' && $banner_file_status == '100'){
		$query = "INSERT INTO `tbl_study_record` ( `study_record_id` , `study_type_id` , `student_id` , `subject_id` , `FileName` , `name` , `desc` , `t_desc` , `post_date` , `modified_by`, `is_news`, `year`, `web_type` ) 
						VALUES  ( '', '$_POST[study_type_id]', '$_POST[student_id]', '$_POST[subjectid]', '', '$name', '$desc', '$t_desc', now(), '$_SESSION[name]', '$_POST[is_news]', '$_POST[year]', '$_POST[web_type]' )";

		
		}else{
		$query = "INSERT INTO `tbl_study_record` ( `study_record_id` , `study_type_id` , `student_id` , `subject_id` , `FileName` , `name` , `desc` , `t_desc` , `post_date` , `modified_by`, `is_news`, `year`, `web_type` ) 
						VALUES  ( '', '$_POST[study_type_id]', '$_POST[student_id]', '$_POST[subjectid]', '', '$name', '$desc', '$t_desc', now(), '$_SESSION[name]', '$_POST[is_news]', '$_POST[year]', '$_POST[web_type]' )";

		}
		mysql_query($query,$link_id); 
		$pkid = mysql_insert_id();
		$new_file_name = $pkid.substr($oldfilename,-4);


	        if (isset($_FILES["file".$i]["tmp_name"])&&$_FILES["file".$i]["tmp_name"]!=""){	


            $upfile = $_FILES["file".$i]["tmp_name"];
            $orgfile_output=$new_file_name;
            $smallfile_output= $new_file_name;
            $output_path="../../userUpload/attachment/";

            image_resize($upfile,$orgfile_output,$output_path,0,0,120);
            image_resize($upfile,$smallfile_output,$output_path."small/",132,99,120);

			$query="update `tbl_study_record` set FileName ='$new_file_name' where study_record_id ='$pkid' ";
		}
		else{
			$query="delete form `tbl_study_record` where study_record_id ='$pkid'";
		}
		mysql_query($query,$link_id); 
	}
}

$returnURL="main.php?student=".$_POST[student_id]."&class_id=".$_POST[class_id]."&subjectid=".$_POST[subjectid];
?>

<META HTTP-EQUIV="refresh" content="0;URL=<?=$returnURL?>">
