<?php
$config["db_server"] = array(
		'host' 		=> 'localhost',
		'db' 		=> 'keioi',
		'user' 		=> 'root',
		'pass' 		=> '',
		'pconnect'	=> 0
);

// $config['base_url']	= "http://www.example.com/site_path/";
$config['base_url'] = "http://localhost/keioi/";

// session key
// $config['sess_cookie_name']		= 'some char';
$config['sess_cookie_name']		= 'keitsz_testing';

// video path, relative the site root path
// $config['video_path']="video_files";
$config['video_path']="userfiles/video/";

// student's usage hours update frequency(seconde)
// $config['video_time_refresh_frequency']=30;
$config['video_time_refresh_frequency']=10;

// enrolment mail, it can be a string, or array.
// $config['enrolment_mail']="Lian <shilian.huang@gmail.com>";
$config['enrolment_mail']="Lian <414257473@qq.com>";

// enquiry mail from student submit enquiry cart, it can be a string, or array.
// $config['enquiry_mail']="Lian <shilian.huang@gmail.com>";
$config['enquiry_mail']="Lian <shilian.huang@gmail.com>";

// document upload dir, e.g. news document.
// $config['uploaddir']="userfiles/";
$config['uploaddir']="userfiles/";
?>