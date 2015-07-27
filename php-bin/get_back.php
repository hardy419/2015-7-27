<?php
	function show_get_back($url='',$txt=''){
		$url = empty($url) ? 'javascript:history.go(-1)' : $url;
		$txt = empty($txt) ? ' 返回' : $txt;
		echo "<a href='".$url."' style='position:relative;margin:0 5px;line-height:20px;'><img style='position:relative;top:-2px;line-height:20px;margin:0px 5px;' src='images/arrow.jpg' width='4' height='10' />".$txt."</a>";
	}
?>