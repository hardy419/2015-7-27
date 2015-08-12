<?php

set_time_limit( 600 );





function image_resize( $upfile, $output_filename, $output_path, $dst_w=100, $dst_h=100, $isRadio=1, $trans_color=array(254, 254, 254) )

{

	$imagedata = GetImageSize($upfile); // Read the size

	$src_w = $imagedata[0];

	$src_h = $imagedata[1];

	$src_type = $imagedata[2];



	$re_dst_x = 0;

	$re_dst_y = 0;



	if( $isRadio|0 > 0 )

	{

	

		if( $dst_w>=$src_w && $dst_h>=$src_h )

		{

			$re_dst_w = $src_w;

			$re_dst_h = $src_h;

		}

		else

		{

			$p_w = ($dst_w/$src_w);

			$p_h = ($dst_h/$src_h);

			$p = min( $p_w, $p_h );

			$re_dst_w = $src_w*$p;

			$re_dst_h = $src_h*$p;

		}

	}

	else

	{

		$re_dst_w = $dst_w;

		$re_dst_h = $dst_h;

	}



	if ($src_type==1)

		$src_image = ImageCreateFromGif($upfile);

	else if ($src_type==2)

		$src_image = ImageCreateFromJpeg($upfile);

	else if ($src_type==3)

		$src_image = ImageCreateFromPng($upfile);

	else if ($src_type==16)

		$src_image = imagecreatefromxbm($upfile);

	//else if ($src_type==6)

	//	return;













	$dst_image = imagecreatetruecolor( $re_dst_w, $re_dst_h );



	$bgc = imagecolorallocate( $dst_image, $trans_color[0], $trans_color[1], $trans_color[2] );

	imagefilledrectangle( $dst_image, 0, 0, $re_dst_w, $re_dst_h, $bgc );

	imagecolortransparent( $dst_image, $bgc );



	imagecopyresampled( $dst_image, $src_image, $re_dst_x, $re_dst_y, 0, 0, $re_dst_w, $re_dst_h, $src_w, $src_h );

	imagepng( $dst_image, $output_path.$output_filename );

}



?>