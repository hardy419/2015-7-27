<?php
require_once("../../../admin.inc.php");
// this function was be got from phpmyadmin
function PMA_get_real_size($size = 0)
{
    if (! $size) {
        return 0;
    }

    $scan['gb'] = 1073741824; //1024 * 1024 * 1024;
    $scan['g']  = 1073741824; //1024 * 1024 * 1024;
    $scan['mb'] = 1048576;
    $scan['m']  = 1048576;
    $scan['kb'] =    1024;
    $scan['k']  =    1024;
    $scan['b']  =       1;

    foreach ($scan as $unit => $factor) {
        if (strlen($size) > strlen($unit)
         && strtolower(substr($size, strlen($size) - strlen($unit))) == $unit) {
            return substr($size, 0, strlen($size) - strlen($unit)) * $factor;
        }
    }

    return $size;
} // end function PMA_get_real_size()


$upload_max_filesize = PMA_get_real_size(ini_get('upload_max_filesize'));
$post_max_size = PMA_get_real_size(ini_get('post_max_size'));
$min_upload_size = $upload_max_filesize > $post_max_size ? $post_max_size : $upload_max_filesize;

$max_upload_filesize  = ($min_upload_size/1024/1024) . ' MB';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title></title>
<link href="css/default.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="swfupload/swfupload.js"></script>
<script type="text/javascript" src="js/swfupload.swfobject.js"></script>
<script type="text/javascript" src="js/swfupload.queue.js"></script>
<script type="text/javascript" src="js/fileprogress.js"></script>
<script type="text/javascript" src="js/handlers.js"></script>
<script type="text/javascript">
var swfu;

SWFUpload.onload = function () {
	var settings = {
		flash_url : "swfupload/swfupload.swf",
		upload_url: "upload.php",
		post_params: {
			"PHPSESSID" : "<?php echo session_id();?>",
			"id" : <?php echo $_GET['id']|0;?>
		},
		file_size_limit : "<?php echo $max_upload_filesize;?>",
		file_types : "*.jpg",
		file_types_description : "JPEG",
		file_upload_limit : 100,
		file_queue_limit : 0,
		custom_settings : {
			form_id: "form1",
			progressTarget : "fsUploadProgress",
			cancelButtonId : "btnCancel"
		},
		debug: false,
		
		// Button Settings
		button_image_url : "images/XPButtonNoText_110x22.png",
		button_placeholder_id : "spanButtonPlaceholder",
		button_width: 110,
		button_height: 22,
		button_text : '<span class="button">Select Images</span>',
		button_text_style : '.button{font-family:Arial,Helvetica,sans-serif;font-size:12px;}',
		button_text_top_padding: 0,
		button_text_left_padding: 18,
		button_window_mode: SWFUpload.WINDOW_MODE.TRANSPARENT,
		button_cursor: SWFUpload.CURSOR.HAND,

		// The event handler functions are defined in handlers.js
		swfupload_loaded_handler : swfUploadLoaded,
		file_queued_handler : fileQueued,
		file_queue_error_handler : fileQueueError,
		file_dialog_complete_handler : fileDialogComplete,
		upload_start_handler : uploadStart,
		upload_progress_handler : uploadProgress,
		upload_error_handler : uploadError,
		upload_success_handler : uploadSuccess,
		upload_complete_handler : uploadComplete,
		queue_complete_handler : queueComplete,	// Queue plugin event
		
		// SWFObject settings
		minimum_flash_version : "9.0.28",
		swfupload_pre_load_handler : swfUploadPreLoad,
		swfupload_load_failed_handler : swfUploadLoadFailed
	};

	swfu = new SWFUpload(settings);
}

function submitForm(btn){
	btn.disabled=true;
	swfu.startUpload();
}

</script>
</head>

<body>
<form id="form1" action="finished.php" method="post" enctype="multipart/form-data">
		<div id="divSWFUploadUI">
			<span class="legend">Upload Queue</span>
			<div class="fieldset  flash" id="fsUploadProgress">
			</div>
            <div class="foot">
			<p id="divStatus">0 Files Uploaded</p>
			<p>
				<span id="spanButtonPlaceholder"></span>&nbsp;&nbsp;(Max Size:<?php echo $max_upload_filesize;?>)<br />
			</p>
			<p>&nbsp;</p>
			<p>
			  <input name="startUpload" type="button" id="startUpload" style="margin-left: 2px; height: 22px; font-size: 8pt;" value="Start Upload" onclick="submitForm(this);" disabled="disabled" />
			  &nbsp;&nbsp;
			  <input id="btnCancel" type="button" value="Cancel All Uploads" disabled="disabled" style="margin-left: 2px; height: 22px; font-size: 8pt;" />
			</p>
			</div>
		</div>
</form>
		<div id="divLoadingContent" class="content" style="background-color: #FFFF66; border-top: solid 4px #FF9966; border-bottom: solid 4px #FF9966; margin: 10px 25px; padding: 10px 15px; display: none;">
			SWFUpload is loading. Please wait a moment...
		</div>
		<div id="divLongLoading" class="content" style="background-color: #FFFF66; border-top: solid 4px #FF9966; border-bottom: solid 4px #FF9966; margin: 10px 25px; padding: 10px 15px; display: none;">
			SWFUpload is taking a long time to load or the load has failed.  Please make sure that the Flash Plugin is enabled and that a working version of the Adobe Flash Player is installed.
		</div>
		<div id="divAlternateContent" class="content" style="background-color: #FFFF66; border-top: solid 4px #FF9966; border-bottom: solid 4px #FF9966; margin: 10px 25px; padding: 10px 15px; display: none;">
			We're sorry.  SWFUpload could not load.  You may need to install or upgrade Flash Player.
			Visit the <a href="http://www.adobe.com/shockwave/download/download.cgi?P1_Prod_Version=ShockwaveFlash">Adobe website</a> to get the Flash Player.
		</div>
</body>
</html>
