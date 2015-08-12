<meta http-equiv="Content-Type" content="text/html; charset=utf-8"><?php

error_reporting( E_ALL ^ E_NOTICE );





$Paging_NowPage = $_GET['p']|0;

$Paging_TotalPage = ceil( $Paging_RecordCount / $Paging_Size );

if( isset($_GET['w']) && ($_GET['w']|0)>0 )

	$Paging_Width = $_GET['w']|0;





if( $Paging_NowPage <= 0 )

	$Paging_NowPage = 1;

if( $Paging_TotalPage <= 0 )

	$Paging_TotalPage = 1;

if( $Paging_Width <= 0 )

	$Paging_Width = 1;

if( $Paging_NowPage > $Paging_TotalPage )

	$Paging_NowPage = $Paging_TotalPage ;

//if( $Paging_Width > $Paging_TotalPage )

//	$Paging_Width = $Paging_TotalPage;



/*

Fix Paging System

David @ http://dwin.net

David @ TCGlobalwork

Copyright(c) 1998-2006 dwin.net all rights reserved



Start	2006-08-20

Finish	2006-08-20

*/

function PagingSystem_fix( $nowPage=1, $tPages=20, $Width=5, $Parameter_Ary=array() )

{

	global $Paging_NowPage;

	global $Paging_Width ;

	$Parameter_Str = '';



	$pageAry = array();

/*

	$ArrowLeftAry = array(

		'|&lt;' ,

		'&lt;'

	);

	$ArrowRightAry = array(

		'&gt;' ,

		'&gt;|'

	);

*/

	$ArrowLeftAry = array(

		'|< '.$Width.'Pre' ,

		'|< Pre'

	);

	$ArrowRightAry = array(

		'Next >|' ,

		''.$Width.'Next >|'

	);



	if( $nowPage%$Width != 0 )

	{

		$start = $nowPage-$nowPage%$Width;

		if( $start%$Width == 0 )

			$start += 1;

	}

	else

		$start = $nowPage-$Width+1;



	$end = $start+$Width;

	if( $end > $tPages )

		$end = $tPages;



	for( $i=$start; count($pageAry)<$Width && $i<=$end; $i++ )

		$pageAry[] = $i;



	$Paging_NowPage = $nowPage;

	$Paging_TotalPage = $tPages;

	//$Paging_Width = $Width;



	if( count($Parameter_Ary) != 0 )

		$Parameter_Str = '&'.implode($Parameter_Ary, '&');



	if( $nowPage != 1 )

	{

		if( $nowPage-$Width <= 0 )

			$ArrowLeftAry[0] = '<a href="?p=1&w='.$Paging_Width . $Parameter_Str.'">'. $ArrowLeftAry[0] .'</a>';

		else

			$ArrowLeftAry[0] = '<a href="?p='. ($nowPage-$Width) .'&w='.$Paging_Width . $Parameter_Str.'">'. $ArrowLeftAry[0] .'</a>';



		if( $nowPage-1 <= 0 )

			$ArrowLeftAry[1] = '<a href="?p=1&w='.$Paging_Width . $Parameter_Str.'">'. $ArrowLeftAry[1] .'</a>';

		else

			$ArrowLeftAry[1] = '<a href="?p='. ($nowPage-1) .'&w='.$Paging_Width . $Parameter_Str.'">'. $ArrowLeftAry[1] .'</a>';

	}

	if( $nowPage != $tPages )

	{

		if( $nowPage+1 > $tPages )

			$ArrowRightAry[0] = '<a href="?p='.$tPages.'&w='.$Paging_Width . $Parameter_Str.'">'. $ArrowRightAry[0] .'</a>';

		else

			$ArrowRightAry[0] = '<a href="?p='. ($nowPage+1) .'&w='.$Paging_Width . $Parameter_Str.'">'. $ArrowRightAry[0] .'</a>';



		if( $nowPage+$Width > $tPages )

			$ArrowRightAry[1] = '<a href="?p='. $tPages .'&w='.$Paging_Width . $Parameter_Str.'">'. $ArrowRightAry[1] .'</a>';

		else

			$ArrowRightAry[1] = '<a href="?p='. ($nowPage+$Width) .'&w='.$Paging_Width . $Parameter_Str.'">'. $ArrowRightAry[1] .'</a>';

	}

	for( $i=0; $i<count($pageAry); $i++  )

	{

		if( $pageAry[$i] == $nowPage )

			continue;

		//$pageAry[$i] = '<a href="?'.$Parameter_Str.'p='.$pageAry[$i].'&t='.$tPages.'&w='.$Width.'">'.$pageAry[$i].'</a>';

		$pageAry[$i] = '<a href="?p='.$pageAry[$i].'&w='.$Paging_Width . $Parameter_Str.'">'.$pageAry[$i].'</a>';

	}







	echo implode($ArrowLeftAry, '&nbsp;&nbsp;&nbsp;' );

	echo '&nbsp;&nbsp;&nbsp;';

	echo implode($pageAry, '&nbsp;&nbsp;&nbsp;' );

	echo '&nbsp;&nbsp;&nbsp;';

	echo implode($ArrowRightAry, '&nbsp;&nbsp;&nbsp;' );

}



/*

Dynamic Paging System

David @ http://dwin.net

David @ TCGlobalwork http://www.tcglobalwork.com

Copyright(c) 1998-2006 dwin.net all rights reserved



Start	2006-08-20

Finish	2006-08-20

*/

function PagingSystem_dynamic( $nowPage=1, $tPages=20, $Width=5, $Parameter_Ary=array() )

{

	global $Paging_NowPage;

	global $Paging_TotalPage ;

	global $Paging_Width ;

	$Parameter_Str = '';



	$pageAry = array();

/*

	$ArrowLeftAry = array(

		'|&lt;' ,

		'&lt;'

	);

	$ArrowRightAry = array(

		'&gt;' ,

		'&gt;|'

	);

*/



	$ArrowLeftAry = array(

		'' ,

		'|< Pre'

	);

	$ArrowRightAry = array(

		' Next >|' ,

		''

	);

	

	

	$HalfWidth = ceil($Width/2);



	// option 1

	if( $nowPage+$HalfWidth > $tPages )

	{

		for( $Paging_NowPage=$tPages; count($pageAry)<$Width; $Paging_NowPage-- )

		{

			if( $Paging_NowPage <= 0 )

				break;

			$pageAry[] = $Paging_NowPage;

		}

		$pageAry = array_reverse($pageAry);	

	}

	// option 2

	else if( $nowPage-$HalfWidth <= 0 )

	{

		for( $Paging_NowPage=1; count($pageAry)<$Width; $Paging_NowPage++ )

		{

			if( $Paging_NowPage > $tPages )

				break;

			$pageAry[] = $Paging_NowPage;

		}

	}

	// option 3

	else

	{

		for( $i=$nowPage-$HalfWidth+1; count($pageAry)<$Width; $i++ )

			$pageAry[] = $i;

	}



	$Paging_NowPage = $nowPage;

	$Paging_TotalPage = $tPages;

	//$Paging_Width = $Width;



	if( count($Parameter_Ary) != 0 )

		$Parameter_Str = '&'.implode($Parameter_Ary, '&');



	if( $nowPage != 1 )

	{

		if( $nowPage-$Width <= 0 )

			$ArrowLeftAry[0] = '<a href="?p=1&w='.$Paging_Width . $Parameter_Str.'">'. $ArrowLeftAry[0] .'</a>';

		else

			$ArrowLeftAry[0] = '<a href="?p='. ($nowPage-$Width) .'&w='.$Paging_Width . $Parameter_Str.'">'. $ArrowLeftAry[0] .'</a>';



		if( $nowPage-1 <= 0 )

			$ArrowLeftAry[1] = '<a href="?p=1&w='.$Paging_Width . $Parameter_Str.'">'. $ArrowLeftAry[1] .'</a>';

		else

			$ArrowLeftAry[1] = '<a href="?p='. ($nowPage-1) .'&w='.$Paging_Width . $Parameter_Str.'">'. $ArrowLeftAry[1] .'</a>';

	}

	if( $nowPage != $tPages )

	{

		if( $nowPage+1 > $tPages )

			$ArrowRightAry[0] = '<a href="?p='.$tPages.'&w='.$Paging_Width . $Parameter_Str.'">'. $ArrowRightAry[0] .'</a>';

		else

			$ArrowRightAry[0] = '<a href="?p='. ($nowPage+1) .'&w='.$Paging_Width . $Parameter_Str.'">'. $ArrowRightAry[0] .'</a>';



		if( $nowPage+$Width > $tPages )

			$ArrowRightAry[1] = '<a href="?p='. $tPages .'&w='.$Paging_Width . $Parameter_Str.'">'. $ArrowRightAry[1] .'</a>';

		else

			$ArrowRightAry[1] = '<a href="?p='. ($nowPage+$Width) .'&w='.$Paging_Width . $Parameter_Str.'">'. $ArrowRightAry[1] .'</a>';

	}

	for( $i=0; $i<count($pageAry); $i++  )

	{

		if( $pageAry[$i] == $nowPage )

			continue;

		//$pageAry[$i] = '<a href="?'.$Parameter_Str.'p='.$pageAry[$i].'&t='.$tPages.'&w='.$Width.'">'.$pageAry[$i].'</a>';

		$pageAry[$i] = '<a href="?p='.$pageAry[$i].'&w='.$Paging_Width . $Parameter_Str.'">'.$pageAry[$i].'</a>';

	}







	echo implode($ArrowLeftAry, '&nbsp;&nbsp;&nbsp;' );

	echo '&nbsp;&nbsp;&nbsp;';

	echo implode($pageAry, '&nbsp;&nbsp;&nbsp;' );

	echo '&nbsp;&nbsp;&nbsp;';

	echo implode($ArrowRightAry, '&nbsp;&nbsp;&nbsp;' );

}

















?>