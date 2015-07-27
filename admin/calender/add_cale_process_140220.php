<?
require("../../php-bin/function.php");
require_once("../../php-bin/image_resize.php");
require_once("../../php-bin/lib_img_resize.php");

    if (isset($_POST[Submit])){
		$date = $_POST[date_year] . "-" .  $_POST[date_month] . "-" .  $_POST[date_day];
		$title_cn = htmlspecialchars($_POST[title_cn]);
		$title_en = htmlspecialchars($_POST[title_en]);
		$content = !empty($_POST[content]) ? htmlspecialchars($_POST[content]) : '';
		$news_order = trim($_POST[news_order]) == '' ? '10' : $_POST[news_order];
		
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
			
			if($_FILES["file_banner"]['size']<='5120000'){
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
		
		  // Insert new data
		  if($banner_file_status == '100'){
			$add_sql = "INSERT INTO `tbl_calendar` ( `post_id` , `poster` , `date` , `title_cn` , `title_en` , `content` , `posttime` , `file_name` , `link_text` , `link_url` , `link_open_window` , `type`, `is_news`, `web_type` , `news_order` ) VALUES ('$_SESSION[id]', '$_SESSION[name]', '$date', '$title_cn', '$title_en', '$content', now(), '', '$_POST[link_text]', '$_POST[link_url]', '$_POST[new_window]', '$_POST[type]', '$_POST[is_news]' , '$_POST[web_type]' , '$news_order' );";
		  }else{
			$add_sql = "INSERT INTO `tbl_calendar` ( `post_id` , `poster` , `date` , `title_cn` , `title_en` , `content` , `posttime` , `file_name` , `link_text` , `link_url` , `link_open_window` , `type`, `is_news`, `web_type` , `news_order` ) VALUES ('$_SESSION[id]', '$_SESSION[name]', '$date', '$title_cn', '$title_en', '$content', now(), '', '$_POST[link_text]', '$_POST[link_url]', '$_POST[new_window]', '$_POST[type]', '$_POST[is_news]' , '$_POST[web_type]' , '$news_order');";
		  }
		  
		mysql_query($add_sql);
		$pkid = mysql_insert_id();
		$oldfilename = time().substr(md5(uniqid(rand())), 0, 16);
		$file_info = pathinfo($_FILES["file"]['name']);
		$ext = $file_info['extension'];
		$ext = strtolower($ext);
		$new_file_name = $pkid.$oldfilename.'.'.$ext;	 
		
		if (isset($_FILES["file"]["tmp_name"])&&$_FILES["file"]["tmp_name"]!=""){	
			$output_path="../../userUpload/attachment/";
				if (!copy($_FILES["file"]["tmp_name"],$output_path.$new_file_name)){
				echo "Fail to copy doc file - ". $_FILES["file"]["tmp_name"];
				exit();			
			}else{
				$query="update `tbl_calendar` set file_name ='$new_file_name' where calendarid ='$pkid' ";
				mysql_query($query);
			}
		}
		 
			$msg = "事件新增完成";
		mysql_close();
		  
		//echo $add_sql;
		header("Location:calendar.php?msg=$msg&type=$_POST[type]");
    }
?>