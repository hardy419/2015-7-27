<?php

require("../../php-bin/function.php");
require_once("../../php-bin/image_resize.php");
require_once("../../php-bin/lib_img_resize.php");



// calendarid post_id poster date title content posttime 
    if (isset($_GET[id])){
	$date = $_POST[date_year] . "-" .  $_POST[date_month] . "-" .  $_POST[date_day];
	//$date2 = $_POST[date_year2] . "-" .  $_POST[date_month2] . "-" .  $_POST[date_day2];
	$date2 = date('Y-m-d',time());
	$_POST[title_cn] = htmlspecialchars($_POST[title_cn]);
	$_POST[title_en] = htmlspecialchars($_POST[title_en]);
	$_POST['description'] = htmlspecialchars($_POST['description']);
	$_POST[no] = htmlspecialchars($_POST[no]);
	
	if ( $_POST[Category_Input] == '' ){
		$category = $_POST[category];
	}else{
		$category = $_POST[Category_Input];	
	}
	if(isset($_FILES["file_banner"]["tmp_name"])&&$_FILES["file_banner"]["tmp_name"]!="" || isset($_FILES["file"]["tmp_name"])&&$_FILES["file"]["tmp_name"]!=""){
		// check the having file.
		$sql = "SELECT `file_name`,`banner_photo` FROM `tbl_notice` WHERE calendarid = '$_GET[id]'";
                  
		$result = mysql_query($sql,$link_id); 
		$get_rows = mysql_fetch_array($result);
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
				if ($get_rows[file_name] != "")
					unlink("../../userUpload/banner/". $get_rows[file_name]);
				
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
	if(!empty($_POST[is_banner])){
		if($banner_file_status == '100'){
		$add_sql = "update `tbl_notice` set `date` ='$date' , `exp_date` = '$date2' , `serialno` ='$_POST[no]', `title_cn` ='$_POST[title_cn]', `title_en` ='$_POST[title_en]' , `description` = '$_POST[description]' , `docoment_type` = '$_POST[type]' , `doc_child_type` = '$_POST[child_type]', `month` ='$_POST[date_month]', `school_year` = '$_POST[school_year]' , `modified_by` = '$_SESSION[name]' , `modified_date` = now(), `link_text` = '$_POST[link_text]', `link_url` = '$_POST[link_url]', `link_open_window` = '$_POST[new_window]', `category` = '$category', is_news ='$_POST[is_news]', web_type ='$_POST[web_type]' , target ='$_POST[target]' , `news_order` = '$_POST[news_order]' , is_banner = '$_POST[is_banner]' , banner_order = '$_POST[banner_order]' , banner_photo = '$file_name' , `access_type` = 'N' where `noticeid`  = '$_GET[id]'";
		}else{
		$add_sql = "update `tbl_notice` set `date` ='$date' , `exp_date` = '$date2' , `serialno` ='$_POST[no]', `title_cn` ='$_POST[title_cn]', `title_en` ='$_POST[title_en]' , `description` = '$_POST[description]' , `docoment_type` = '$_POST[type]' , `doc_child_type` = '$_POST[child_type]', `month` ='$_POST[date_month]', `school_year` = '$_POST[school_year]' , `modified_by` = '$_SESSION[name]' , `modified_date` = now(), `link_text` = '$_POST[link_text]', `link_url` = '$_POST[link_url]', `link_open_window` = '$_POST[new_window]', `category` = '$category', is_news ='$_POST[is_news]', web_type ='$_POST[web_type]' , target ='$_POST[target]' , `news_order` = '$_POST[news_order]' , is_banner = '$_POST[is_banner]' , banner_order = '$_POST[banner_order]' , `access_type` = 'N' where `noticeid`  = '$_GET[id]'";	
		}
	}else{
		$add_sql = "update `tbl_notice` set `date` ='$date' , `exp_date` = '$date2' , `serialno` ='$_POST[no]', `title_cn` ='$_POST[title_cn]', `title_en` ='$_POST[title_en]' , `description` = '$_POST[description]' , `docoment_type` = '$_POST[type]' , `doc_child_type` = '$_POST[child_type]', `month` ='$_POST[date_month]', `school_year` = '$_POST[school_year]' , `modified_by` = '$_SESSION[name]' , `modified_date` = now(), `link_text` = '$_POST[link_text]', `link_url` = '$_POST[link_url]', `link_open_window` = '$_POST[new_window]', `category` = '$category', is_news ='$_POST[is_news]', web_type ='$_POST[web_type]' , target ='$_POST[target]' , `news_order` = '$_POST[news_order]' , `access_type` = 'N' where `noticeid`  = '$_GET[id]'";
	}
	mysql_query($add_sql);

	$pkid = $_GET[id];
	
	$oldfilename = time().substr(md5(uniqid(rand())), 0, 16);
	$file_info = pathinfo($_FILES["file"]["name"]);
	$ext = $file_info['extension'];
	$ext = strtolower($ext);
	$new_file_name = $pkid.$oldfilename.'.'.$ext;
	
	if (isset($_FILES["file"]["tmp_name"])&&$_FILES["file"]["tmp_name"]!=""){
		// check the having file.
		$sql = "SELECT `docoment_name` FROM `tbl_notice` WHERE noticeid  = '$pkid'";
                  
		$result = mysql_query($sql,$link_id); 
		$get_rows = mysql_fetch_array($result);

		if ($get_rows[file_name] != "")
			unlink("../../userUpload/attachment/". $get_rows[file_name]);
		
			$output_path="../../userUpload/attachment/";
	    	if (!copy($_FILES["file"]["tmp_name"],$output_path.$new_file_name)){
			echo "Fail to copy doc file - ". $_FILES["file"]["tmp_name"];
			exit();			
		}else{
			$query="update `tbl_notice` set docoment_name ='$new_file_name' where noticeid  = '$pkid' ";
			mysql_query($query);
		}
	}
	
	$oldfilename_cover = time().substr(md5(uniqid(rand())), 0, 16);
	$file_info = pathinfo($_FILES["cover_Photo"]["name"]);
	$ext = $file_info['extension'];
	$ext = strtolower($ext);
	$new_file_name_cover = $pkid.$oldfilename_cover.'.'.$ext;
	$size = GetImageSize($_FILES["cover_Photo"]["tmp_name"]);
	if (isset($_FILES["cover_Photo"]["tmp_name"])&&$_FILES["cover_Photo"]["tmp_name"]!=""){
		// check the having file.
		$sql_get_cover = "SELECT `cover_Photo` FROM `tbl_notice` WHERE noticeid  = '$pkid'";
                  
		$result_get_cover = mysql_query($sql_get_cover,$link_id); 
		$get_cover_rows = mysql_fetch_array($result_get_cover);

		if ($get_cover_rows[file_name] != ""){
			unlink("../../userUpload/cover_Photo/". $get_cover_rows[file_name]);
			unlink("../../userUpload/cover_Photo/original/". $get_cover_rows[file_name]);
		}
	
		$oldfilename_cover="../../userUpload/cover_Photo/";
		image_resize_lib($_FILES["cover_Photo"]["tmp_name"],$new_file_name_cover,$oldfilename_cover."original/",$size[0],$size[1]);
		image_resize_lib($_FILES["cover_Photo"]["tmp_name"],$new_file_name_cover,$oldfilename_cover,200,150,120);
		
		$query_cover="update `tbl_notice` set cover_Photo ='$new_file_name_cover' where noticeid  = '$pkid' ";
		mysql_query($query_cover);
	}

        $msg = "更新完成";




      mysql_close();
      
     //echo $add_sql;
     header("Location:c_parent.php?msg=$msg&id=$pkid");

    }

?>