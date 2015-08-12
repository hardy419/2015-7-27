<?php
/**
 * 图片上传类
 * 创建对象：$up = new image();
 * 设置允许上传的图片格式：$up->allow_format = array('image/jpg','image/jpeg');默认支持格式：jpg,jpeg,png,gif,bmp
 * 设置允许上传的图片尺寸：$up->allow_size = 1 (1M),默认可上传1M.
 * 设置上传图片的路径：$up->save_path = "e:/image/";
 * 上传图片：$up->upload()或$up->upload(100, 100),带参数将把上传的图片按参数改变宽、高。
 * 生成其它尺寸的图片：public function create_img($desW, $desH, $width_border = 0, $border_color = array('R' => 240, 'G' => 240, 'B' => 240), $pre_name="sm_")
 * 加水印图片：function add_water($img, $xpos, $ypos, $sxpos, $sypos, $width, $height, $source = '')
 * $xpos:水印加在图片的Ｘ坐标。
 * $ypos:水印加在图片的Ｙ坐标。
 * $sxpos:水印图片的Ｘ坐标。
 * $sxpos:水印图片的Ｙ坐标。
 * $width:加水印的宽度。
 * $height:加水印的高度。
 * $img:要加的水印图片
 * $source:为加到的图片上，若$source为空则在刚刚上传的图片上加水印！
 *
 */
class image{
	private $per_mbyte = 1048576;
	public $source; //原来图片
	public $save_name;	//最后保存的文件名
	public $save_path;	//保存文件时的路径
	public $img_width;	//图片宽度
	public $img_height;	//图片高度
	public $img_size; //图片尺寸，单位是字节Byte
	public $allow_format = array('image/jpg','image/jpeg','image/png',
	'image/pjpeg','image/gif','image/bmp','image/x-png'); //允许上传的格式jpg,jpeg,png,gif,bmp
	public $allow_size = 1; //允许上传的图片尺寸，1M。
	public $water_img; //水印图片
	var $err_log;
	
	public function upload($width = null, $height = null){
		$this->check_source();	//是否上传了图片
		$this->check_size();	//尺寸是否在允许上传的范围内
		$this->check_format();	//是否允许上传该格式的文件
		if(empty($this->save_name))$this->set_name();		//设置文件名
		if(!move_uploaded_file($this->source, $this->save_path.$this->save_name)){
			$this->halt('上传图片过程中发生未知错误，请重试！');
			return false;
		}
		if(!empty($width) && !empty($height))
			$this->create_img($width, $height, 0, null, '');
		$imgData=getimagesize($this->save_path.$this->save_name);
		$this->img_width = $imgData[0];
		$this->img_height = $imgData[1];
		$this->img_size = $this->source['size'];
		return true;
	}
	public function create_img($desW, $desH, $width_border = 0, $border_color = array('R' => 240, 'G' => 240, 'B' => 240), $pre_name="sm_"){
		$width=$desW;
		$height=$desH;
		$img_path = $this->save_path.$this->save_name;
		$img_d_path = $this->save_path.$pre_name.$this->save_name;
		list($width_orig, $height_orig) = getimagesize($img_path);
		
		if ($width && ($width_orig < $height_orig)) {
			$width = ($height / $height_orig) * $width_orig;
		} else {
			$height = ($width / $width_orig) * $height_orig;
		}
		if($width_orig <= $desW && $height_orig <= $desH){
			$width = $width_orig;
			$height = $height_orig;
		}
		
		$image_p = imagecreatetruecolor($desW, $desH);
		
		$bg=imagecolorallocate($image_p,255,255,255);
		imagefill($image_p,0,0,$bg);
		$iinfo=getimagesize($img_path,$iinfo);
		
		switch ($iinfo[2])
        {
            case 1:
            $image =imagecreatefromgif($img_path);
            imagecopyresampled($image_p, $image, ($desW-$width)/2, ($desH-$height)/2, 0, 0, $width, $height, $width_orig, $height_orig);
			if($width_border){
				$border=imagecolorallocate($image_p,$border_color['R'],$border_color['G'],$border_color['B']);
				imagerectangle($image_p,0,0,$desW-1,$desH-1,$border);
			}
            imagegif($image_p,$img_d_path);
            break;
            case 2:
            $image =imagecreatefromjpeg($img_path);
            imagecopyresampled($image_p, $image, ($desW-$width)/2, ($desH-$height)/2, 0, 0, $width, $height, $width_orig, $height_orig);
			if($width_border){
				$border=imagecolorallocate($image_p,$border_color['R'],$border_color['G'],$border_color['B']);
				imagerectangle($image_p,0,0,$desW-1,$desH-1,$border);
			}
            imagejpeg($image_p,$img_d_path);
            break;
            case 3:
            $image =imagecreatefrompng($img_path);
            imagecopyresampled($image_p, $image, ($desW-$width)/2, ($desH-$height)/2, 0, 0, $width, $height, $width_orig, $height_orig);
			if($width_border){
				$border=imagecolorallocate($image_p,$border_color['R'],$border_color['G'],$border_color['B']);
				imagerectangle($image_p,0,0,$desW-1,$desH-1,$border);
			}
            imagepng($image_p,$img_d_path);
            break;
            case 6:
            $image =imagecreatefromwbmp($img_pathe);
            imagecopyresampled($image_p, $image, ($desW-$width)/2, ($desH-$height)/2, 0, 0, $width, $height, $width_orig, $height_orig);
			if($width_border){
				$border=imagecolorallocate($image_p,$border_color['R'],$border_color['G'],$border_color['B']);
				imagerectangle($image_p,0,0,$desW-1,$desH-1,$border);
			}
            imagewbmp($image_p,$img_d_path);
            break;
            default:break;
        }
	}
	function add_water($img, $xpos, $ypos, $sxpos, $sypos, $width, $height, $source = ''){
		$im = empty($source) ? $this->save_path.$this->save_name : $source;
		if(!is_file($img))
			$this->halt('选择的水印图片不可用！');
		if(!is_file($im))
			$this->halt('待加水印的图片不可用！');
		$iinfo=getimagesize($img, $iinfo);
		switch ($iinfo[2])
        {
            case 1:
            $simage1 =imagecreatefromgif($img);
            break;
            case 2:
            $simage1 =imagecreatefromjpeg($img);
            break;
            case 3:
            $simage1 =imagecreatefrompng($img);
            break;
            case 6:
            $simage1 =imagecreatefromwbmp($img);
            break;
            default:break;
        }
		$iinfo=getimagesize($im,$iinfo);
		switch ($iinfo[2])
        {
            case 1:
            $image =imagecreatefromgif($im);
            break;
            case 2:
            $image =imagecreatefromjpeg($im);
            break;
            case 3:
            $image =imagecreatefrompng($im);
            break;
            case 6:
            $image =imagecreatefromwbmp($im);
            break;
            default:break;
        }
        imagecopy($image,$simage1,$xpos, $ypos, $sxpos, $sypos, $width, $height);
        switch ($iinfo[2])
        {
            case 1:
            imagegif($image, $im);
            break;
            case 2:
            imagejpeg($image, $im);
            break;
            case 3:
            imagepng($image, $im);
            break;
            case 6:
            imagewbmp($image, $im);
            break;
        }
        imagedestroy($simage1);
        imagedestroy($image);
	}
	
	private function set_name(){
		srand ((double) microtime() * 1000000);
    	$rnd = rand(100,999);
    	$name = date('U') + $rnd;
    	$rnd = rand(0,9);
    	$name .= substr(time(),$rnd);
    	$arr = array('a','b','c','d','e','f','g','h','i','j','k','l','m','n','o','p','q','r','s','t','u','v','w','x','y','z','A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z');
    	$rnd = rand(0,51);
    	$name .= $arr[$rnd];
    	$pinfo = pathinfo($this->source['name']);
    	$extension = $pinfo['extension'];
     	$this->save_name = $name.'.'.$extension;
	}
	private function check_format(){
		if(!in_array($this->source['type'], $this->allow_format))
			$this->halt('不允许上传'.$this->source['type'].'格式的文件');
		return true;
	}
	private function check_size(){
		if($this->source['size'] > ($this->allow_size * $this->per_mbyte))
			$this->halt('上传图片尺寸超过'.$this->allow_size/$this->per_mbyte.'MB');
		return true;
	}
	private function check_source(){
		if(empty($this->source))
			$this->halt('请选择上传的图片！');
		return true;
	}
	private function halt($msg){
		$this->err_log=$msg;
		//die($msg);
	}
}
?>