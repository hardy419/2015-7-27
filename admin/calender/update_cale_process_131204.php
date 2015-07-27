<?
require("../../php-bin/function.php");
require_once("../../php-bin/image_resize.php");
require_once("../../php-bin/lib_img_resize.php");

// calendarid post_id poster date title content posttime 
    if (isset($_GET[id])){
	$date = $_POST[date_year] . "-" .  $_POST[date_month] . "-" .  $_POST[date_day];
	$title_cn = htmlspecialchars($_POST[title_cn]);
	$title_en = htmlspecialchars($_POST[title_en]);
	$content = !empty($_POST[content]) ? htmlspecialchars($_POST[content]) : '';
	
	if(isset($_FILES["file_banner"]["tmp_name"])&&$_FILES["file_banner"]["tmp_name"]!="" || isset($_FILES["file"]["tmp_name"])&&$_FILES["file"]["tmp_name"]!=""){
		// check the having file.
		$sql = "SELECT `file_name`,`banner_photo` FROM `tbl_calendar` WHERE calendarid = '$pkid'";
                  
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
			
			
			
			if($_FILES["file_banner"]['size']<='1024000'){
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

	if($_POST['is_news'] == 'Y' && $banner_file_status == '100'){
      // Insert new data
      $add_sql = "update `tbl_calendar` set link_text = '$_POST[link_text]', link_url = '$_POST[link_url]', link_open_window = '$_POST[new_window]', date ='$date' , title_cn ='$title_cn' , title_en ='$title_en', content ='$content', is_news ='$_POST[is_news]', web_type = '$_POST[web_type]' , `news_order` = '$_POST[news_order]' , is_banner = '$_POST[is_banner]' , banner_order = '$_POST[banner_order]' , banner_photo = '$file_name' where calendarid = '$_GET[id]'";
	}else{
	  $add_sql = "update `tbl_calendar` set link_text = '$_POST[link_text]', link_url = '$_POST[link_url]', link_open_window = '$_POST[new_window]', date ='$date' , title_cn ='$title_cn' , title_en ='$title_en', content ='$content', is_news ='$_POST[is_news]', web_type = '$_POST[web_type]' , `news_order` = '$_POST[news_order]' where calendarid = '$_GET[id]'";
	}
	
	 mysql_query($add_sql);

	$pkid = $_GET[id];
	$oldfilename = time().substr(md5(uniqid(rand())), 0, 16);
	$new_file_name = $pkid.$oldfilename.$_FILES["file"]["name"];	 
	
	if (isset($_FILES["file"]["tmp_name"])&&$_FILES["file"]["tmp_name"]!=""){
		if ($get_rows[file_name] != "")
			unlink("../../userUpload/attachment/". $get_rows[file_name]);
		
		$output_path="../../userUpload/attachment/";
	    	if (!copy($_FILES["file"]["tmp_name"],$output_path.$new_file_name)){
			echo "Fail to copy doc file - ". $_FILES["file"]["tmp_name"];
			exit();			
		}else{
			$query="update `tbl_calendar` set file_name ='$new_file_name' where calendarid = '$pkid' ";
			mysql_query($query);
		}
	}

        $msg = "事件更改完成";




      mysql_close();
      
      //echo $add_sql;
     header("Location:calendarview.php?year=$_GET[year]&month=$_GET[month]&id=$_GET[id]&msg=$msg");

    }

?>