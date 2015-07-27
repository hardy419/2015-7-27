<?
    function image_resize($upfile,$output_filename,$output_path,$width,$height,$quality){   //copy and resize image
        $size = GetImageSize($upfile); // Read the size
        if ($width==0)  $width=$size[0];
        if ($height==0)  $height=$size[1];
        if ($size[2]==2)
            $src = ImageCreateFromJpeg($upfile);
        else if ($size[2]==3)
            $src = ImageCreateFromPng($upfile);
        $res = ImageCreateTrueColor($width, $height);
        ImageCopyResampled($res, $src,0,0,0,0,$width, $height, $size[0], $size[1]);
        ImageJpeg($res,$output_path.$output_filename,$quality);
    }
?>
