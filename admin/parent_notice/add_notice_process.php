<?
	require("../../php-bin/function.php");
	require_once("../../php-bin/image_resize.php");
	require_once("../../php-bin/lib_img_resize.php");
	
	if (isset($_POST[Submit])){
		$date = $_POST[date_year] . "-" .  $_POST[date_month] . "-" .  $_POST[date_day];
		//$date2 = $_POST[date_year2] . "-" .  $_POST[date_month2] . "-" .  $_POST[date_day2];
		$date2 = date('Y-m-d',time());
		$description = htmlspecialchars($_POST[description]);
		$title_cn = htmlspecialchars($_POST[title_cn]);
		$title_en = htmlspecialchars($_POST[title_en]);

		if ( $_POST[Category_Input] == '' ){
			$category = $_POST[category];
		}else{
			$category = $_POST[Category_Input];	
		}
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
			
			if($_FILES["file_banner"]['size']<='10240000'){
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
		
		if(empty($_POST['news_order'])){
			$_POST['news_order'] = '10';
		}
		// Insert new data
		if($banner_file_status == '100'){
			$add_sql = "INSERT INTO `tbl_notice` (`date` , `exp_date` , `serialno` , `title_cn` , `title_en` , `description` , `docoment_name` , `docoment_type` , `doc_child_type` , `school_year` , `month`, `modified_by`, `modified_date` , `link_text` , `link_url` , `link_open_window`, `category`, `is_news` , `web_type` , `target` , `news_order` , `is_banner` , `banner_order` , `banner_photo` , `access_type`) 
			VALUES ('$date', '$date2', '$_POST[no]', '$_POST[title_cn]', '$_POST[title_en]', '$description' , '', '$_POST[type]', '$_POST[child_type]', '$_POST[school_year]', '$_POST[date_month]' , '$_SESSION[name]', now(), '$_POST[link_text]', '$_POST[link_url]', '$_POST[new_window]', '$category', '$_POST[is_news]', '$_POST[web_type]', '$_POST[target]' , '$_POST[news_order]' , '$_POST[is_banner]' , '$_POST[banner_order]' , '$file_name' , 'N');";
		}else{
			$add_sql = "INSERT INTO `tbl_notice` (`date` , `exp_date` , `serialno` , `title_cn` , `title_en` , `description` , `docoment_name` , `docoment_type` , `doc_child_type` , `school_year` , `month`, `modified_by`, `modified_date` , `link_text` , `link_url` , `link_open_window`, `category`, `is_news` , `web_type` , `target` , `news_order` , `is_banner` , `banner_order`  , `access_type`) 
			VALUES ('$date', '$date2', '$_POST[no]', '$_POST[title_cn]', '$_POST[title_en]', '$description' , '', '$_POST[type]', '$_POST[child_type]', '$_POST[school_year]', '$_POST[date_month]' , '$_SESSION[name]', now(), '$_POST[link_text]', '$_POST[link_url]', '$_POST[new_window]', '$category', '$_POST[is_news]', '$_POST[web_type]', '$_POST[target]' , '$_POST[news_order]' , '$_POST[is_banner]' , '$_POST[banner_order]' , 'N');";
		}
		
	mysql_query($add_sql);
	$pkid = mysql_insert_id();
	
	$oldfilename = time().substr(md5(uniqid(rand())), 0, 16);
	$file_info = pathinfo($_FILES["file"]["name"]);
	$ext = $file_info['extension'];
	$ext = strtolower($ext);
	$new_file_name = $pkid.$oldfilename.'.'.$ext;
	if (isset($_FILES["file"]["tmp_name"])&&$_FILES["file"]["tmp_name"]!=""){	
		$output_path="../../userUpload/attachment/";
	    	if (!copy($_FILES["file"]["tmp_name"],$output_path.$new_file_name)){
			echo "Fail to copy doc file - ". $_FILES["file"]["tmp_name"];
			exit();			
		}else{
			$query="update `tbl_notice` set docoment_name ='$new_file_name' where noticeid ='$pkid' ";
			mysql_query($query);
		}
	}
	
	
	$upfile_cover_Photo = $_FILES["cover_Photo"]["tmp_name"];
	$size = GetImageSize($upfile_cover_Photo);
	$oldfilename_cover = time().substr(md5(uniqid(rand())), 0, 16);
	$file_info = pathinfo($_FILES["cover_Photo"]["name"]);
	$ext = $file_info['extension'];
	$ext = strtolower($ext);
	$new_file_name_cover = $pkid.$oldfilename_cover.'.'.$ext;
	if (isset($_FILES["cover_Photo"]["tmp_name"])&&$_FILES["cover_Photo"]["tmp_name"]!=""){	
		$output_path_cover="../../userUpload/cover_Photo/";
		image_resize_lib($_FILES["cover_Photo"]["tmp_name"],$new_file_name_cover,$output_path_cover."original/",$size[0],$size[1]);
		image_resize_lib($_FILES["cover_Photo"]["tmp_name"],$new_file_name_cover,$output_path_cover,200,150);
		
		$query_cover="update `tbl_notice` set `cover_Photo` ='$new_file_name_cover' where noticeid ='$pkid' ";
		mysql_query($query_cover);
	}
	 
        $msg = "新增完成";
	mysql_close();

	//echo $add_sql;
	header("Location:c_parent.php?msg=$msg&id=$pkid");
    }
?>