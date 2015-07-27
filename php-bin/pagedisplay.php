<?php 

  function page_display($url,$current_page,$total_page,$show_pages_no,$search_arr,$sort_arr,$class_arr,$name_arr){
	
	// check variables
	if ($current_page=="" || $total_page=="" || $current_page > $total_page || $current_page <= 0 || $total_page <= 0 || $show_pages_no <= 0){ ?>
		<script language="JavaScript">
			alert("Function Error - page_display\n\nPlease check the arguments of the functions,  specially the $current_page and $total_page");
		</script>
	<?php exit();
	}
	
	// initialize variables
	$search_arg_str = "";
	$sort_arg_str = "";
	$font_class = "";
	$table_class = "";
	$tr_class = "";
	$td_class = "";
	if ($url=="")
		$url=basename($_SERVER['PHP_SELF']);
	if ($show_pages_no=="")
		$show_pages_no = 10;

    // get $name_arr
	if ($name_arr==""){
	   $prename = "上頁";
       $nextname = "下頁";
       $firstname = "你已在最前一頁";
       $lastname = "你已在最後一頁";
       $currentname[0] = "你目前在第";
       $currentname[1] = "頁";
       $pagename[0] = "第";
       $pagename[1] = "頁";
    }else{
	   if(is_array($name_arr)){
    	   $prename = $name_arr[0];
           $nextname = $name_arr[1];
           $firstname = $name_arr[2];
           $lastname = $name_arr[3];
           $currentname = explode("%%", $name_arr[4]);
           $pagename = explode("%%", $name_arr[5]);
        }else{
    	   $prename = "上頁";
           $nextname = "下頁";
           $firstname = "你已在最前一頁";
           $lastname = "你已在最後一頁";
           $currentname[0] = "你目前在第";
           $currentname[1] = "頁";
           $pagename[0] = "第";
           $pagename[1] = "頁";
        }
    }

	// get $search_arg_str
	if ($search_arr!=""){
		if(is_array($search_arr)){
			for ($i=0;list($search_name,$search_value)=each($search_arr);$i++){
				// $search_arg[$i][name] = $search_name;
				// $search_arg[$i][value] = $search_value;
				$search_arg_str .= "&".str_replace(" ","+",$search_name)."=".str_replace(" ","+",$search_value);
			}
		}
	}
	// get $sort_arg_str
	if ($sort_arr!=""){
		if(is_array($sort_arr)){
			for ($i=0;list($sort_name,$sort_type)=each($sort_arr);$i++){
				// $sort_arg[$i][name] = $sort_name;
				// $sort_arg[$i][type] = $sort_type;
				$sort_arg_str .= "&".str_replace(" ","+",$sort_name)."=".str_replace(" ","+",$sort_type);
			}
		}
	}
	// You can add more elements by changing this and add style class on switch ($i) case
	$class_element = 4;   // set class elements number
	// get $classes
	if ($class_arr!=""){
		if(is_array($class_arr)){
			for ($i=0;$i<$class_element;$i++){
				switch ($i){
					case 0:
						$font_class = $class_arr[0];
						break;
					case 1:
						$table_class = $class_arr[1];
						break;
					case 2:
						$tr_class = $class_arr[2];
						break;
					case 3:
						$td_class = $class_arr[3];
						break;
				}
			}
		}
	}
	?>
	<table <?php if ($table_class!="") echo " class=".$table_class; ?>>
		<tr <?php if ($tr_class!="") echo " class=".$tr_class; ?>>
		<?php if ($current_page==1) { ?>
			<td <?php if ($td_class!="") echo " class=".$td_class; ?>><span title="<?php echo $firstname; ?>"><?php echo $prename; ?></span></td>
        <?php }else{ ?>
			<td <?php if ($td_class!="") echo " class=".$td_class; ?>><a href="<?php echo $url."?page=".($current_page-1).$search_arg_str.$sort_arg_str; ?>" title="<?php echo $prename; ?>"<?php if ($font_class!="") echo " class=".$font_class; ?>><?php echo $prename; ?></a></td>
        <?php } ?>
    <?php
	// print page cell
	if ($total_page<=($show_pages_no+1)){	// total pages less then display page numbers
		for ($i=1;$i<=$total_page;$i++){
			echo "<td";
			if ($td_class!="") echo " class=".$td_class;
			echo ">";
			if ($i==$current_page){
				echo "<b title=\"$currentname[0]".$i."$currentname[1]\"";
				if ($font_class!="") echo " class=".$font_class;
				echo ">$i</b>";
			}else{
				echo "<a href=\"$url?page=$i$search_arg_str$sort_arg_str\" title=\"$pagename[0]".$i."$pagename[1]\"";
				if ($font_class!="") echo " class=".$font_class;
				echo ">$i</a>";
			}
			echo "</td>";
		}
	}else if ($current_page<=(floor($show_pages_no/2)+1)){   // current page is in the first list of display page numbers
		for ($i=1;$i<=$show_pages_no;$i++){
			echo "<td";
			if ($td_class!="") echo " class=".$td_class;
			echo ">";
			if ($i==$current_page){
				echo"<b title=\"$currentname[0]".$i."$currentname[1]\"";
				if ($font_class!="") echo " class=".$font_class;
				echo ">$i</b>";
			}else{
				echo "<a href=\"$url?page=$i$search_arg_str$sort_arg_str\" title=\"$pagename[0]".$i."$pagename[1]\"";
				if ($font_class!="") echo " class=".$font_class;
				echo ">$i</a>";
			}
			echo "</td>";
		}
		echo "<td";
		if ($td_class!="") echo " class=".$td_class;
		echo ">...<a href=\"$url?page=$total_page$search_arg_str$sort_arg_str\" title=\"$pagename[0]".$total_page."$pagename[1]\"";
		if ($font_class!="") echo " class=".$font_class;
		echo ">$total_page</a></td>";   // last page link
	}else if ($total_page<=($current_page+floor($show_pages_no/2))){   // current page is in the last list of display page numbers
		echo "<td";
		if ($td_class!="") echo " class=".$td_class;
		echo "><a href=\"$url?page=1$search_arg_str$sort_arg_str\" title=\"".$pagename[0]."1".$pagename[1]."\"";
		if ($font_class!="") echo " class=".$font_class;
		echo ">1</a>...";   // first page link
		for ($i=($total_page-($show_pages_no-1));$i<=$total_page;$i++){
			echo "<td";
			if ($td_class!="") echo " class=".$td_class;
			echo ">";
			if ($i==$current_page){
				echo"<b title=\"$currentname[0]".$i."$currentname[1]\"";
				if ($font_class!="") echo " class=".$font_class;
				echo ">$i</b>";
			}else{
				echo "<a href=\"$url?page=$i$search_arg_str$sort_arg_str\" title=\"$pagename[0]".$i."$pagename[1]\"";
				if ($font_class!="") echo " class=".$font_class;
				echo ">$i</a>";
			}
			echo "</td>";
		}
	}else if (($current_page+(floor($show_pages_no/2)-1))<=$total_page){   // current page is in the middle list of display page numbers
		echo "<td";
		if ($td_class!="") echo " class=".$td_class;
		echo "><a href=\"$url?page=1$search_arg_str$sort_arg_str\" title=\"".$pagename[0]."1".$pagename[1]."\"\"";
		if ($font_class!="") echo " class=".$font_class;
		echo ">1</a>...";   // first page link
		for ($i=($current_page-(floor($show_pages_no/2)-1));$i<=($current_page+(($show_pages_no/2)-1));$i++){
			echo "<td";
			if ($td_class!="") echo " class=".$td_class;
			echo ">";
			if ($i==$current_page){
				echo"<b title=\"$currentname[0]".$i."$currentname[1]\"";
				if ($font_class!="") echo " class=".$font_class;
				echo ">$i</b>";
			}else{
				echo "<a href=\"$url?page=$i$search_arg_str$sort_arg_str\" title=\"$pagename[0]".$i."$pagename[1]\"";
				if ($font_class!="") echo " class=".$font_class;
				echo ">$i</a>";
			}
			echo "</td>";
		}
		echo "<td";
		if ($td_class!="") echo " class=".$td_class;
		echo ">...<a href=\"$url?page=$total_page$search_arg_str$sort_arg_str\" title=\"$pagename[0]".$total_page."$pagename[1]\"";
		if ($font_class!="") echo " class=".$font_class;
		echo ">$total_page</a></td>";   // last page link
	}
	?>
		<?php if ($current_page==$total_page) { ?>
        <td <?php if ($td_class!="") echo " class=".$td_class; ?>><span title="<?php echo $lastname; ?>"><?php echo $nextname; ?></span></td>
        <?php }else{ ?>
		<td<?php if ($td_class!="") echo " class=".$td_class; ?>><a href="<?php echo $url."?page=".($current_page+1).$search_arg_str.$sort_arg_str; ?>" title="<?php echo $nextname; ?>"<?php if ($font_class!="") echo " class=".$font_class; ?>><?php echo $nextname;?></a></td>
        <?php } ?>
        </tr>
	</table>
	<?php
  }
  
  
  
  function page_display_q($url,$current_page,$total_page,$show_pages_no,$search_arr,$sort_arr,$class_arr,$name_arr){
	
	/*
	 *  Function Information-----
	 *  - By : Vicglous Lam (Pak) - info@pakfocus.com
	 *  - Date : 04 May, 2005
	 *
	 *  Variable Description-----
	 *  - page_display($url,$current_page,$total_page,$show_pages_no,$search_arr,$sort_arr,$class_arr,$name_arr)
	 *  - $url           : The page the link to, usually use the page using, null for self name
	 *  - $current_page  : The current page number
	 *  - $total_page    : The total pages that would like to display
	 *  - $show_pages_no : How many pages number would you like to display for selection, default : 10
	 *  - $search_arr    : The searching arguments array, format likes : array("name1"=>"value1","name2"=>"value2")
	 *  - $sort_arr      : The sorting arguments array, format likes : array("orderby"=>"order_by_name1","seq"=>"asc/desc","orderby"=>"order_by_name2","seq"=>"asc/desc")
	 *  - $class_arr     : The style class of font,table,table row and table cell(You can add more class), default format likes : array("font_class_name","table_class_name","tr_class_name","td_class_name")
	 *  - $name_arr      : The name of Page up and Page down, %% instead of the page number, default "上一頁", "下一頁", "你已在最前一頁", "你已在最後一頁", "你目前在第%%頁", "第%%頁";, array likes : array("Previous","Next","First Page","Last Page","Current Page: %%","Page: %%")
	 *
	 *  Return Information-------
	 *  - UI :
	 *    Use table to display the page list, and you can design the interface yourself by changing the code
	 *  - Page's linking tag :
	 *    <a href="url.php?page=pagenumber&search_name1=search_value1&search_name2=search_value2&sort_name1=asc/desc"
	 *
	 *  Example------------------
	 *  - page_display("",51,67,10,array("name1"=>"value1","name2"=>"value2"),array("orderby"=>"by1","seq"=>"asc"),array("font1","table1","tr1","td1"),"");
	 *    UI   : 1... 47 48 49 50 51 52 53 54 55 ...67
	 *    link : (for Page 1) <a href="testpagedisplay.php?page=1&name1=value1&name2=value2&orderby=by1&orderseq=asc" title="第1頁" class=font1>1</a>
	 *           (for Page 49) <a href="testpagedisplay.php?page=49&name1=value1&name2=value2&orderby=by1&orderseq=asc" title="第49頁" class=font1>49</a>
	 *           (for Page 67) <a href="testpagedisplay.php?page=67&name1=value1&name2=value2&orderby=by1&orderseq=asc" title="第67頁" class=font1>67</a>
	 */
	
	// check variables
	if ($current_page=="" || $total_page=="" || $current_page > $total_page || $current_page <= 0 || $total_page <= 0 || $show_pages_no <= 0){ ?>
		<script language="JavaScript">
			alert("Function Error - page_display\n\nPlease check the arguments of the functions,  specially the $current_page and $total_page");
		</script>
	<?php exit();
	}
	
	// initialize variables
	$search_arg_str = "";
	$sort_arg_str = "";
	$font_class = "";
	$table_class = "";
	$tr_class = "";
	$td_class = "";
	if ($url=="")
		$url=basename($_SERVER['PHP_SELF']);
	if ($show_pages_no=="")
		$show_pages_no = 10;

    // get $name_arr
	if ($name_arr==""){
	   $prename = "&lt;";
       $nextname = "&gt;";
       $firstname = "你已在最前一頁";
       $lastname = "你已在最後一頁";
       $currentname[0] = "你目前在第";
       $currentname[1] = "頁";
       $pagename[0] = "第";
       $pagename[1] = "頁";
    }else{
	   if(is_array($name_arr)){
    	   $prename = $name_arr[0];
           $nextname = $name_arr[1];
           $firstname = $name_arr[2];
           $lastname = $name_arr[3];
           $currentname = explode("%%", $name_arr[4]);
           $pagename = explode("%%", $name_arr[5]);
        }else{
    	   $prename = "&lt;";
           $nextname = "&gt;";
           $firstname = "你已在最前一頁";
           $lastname = "你已在最後一頁";
           $currentname[0] = "你目前在第";
           $currentname[1] = "頁";
           $pagename[0] = "第";
           $pagename[1] = "頁";
        }
    }

	// get $search_arg_str
	if ($search_arr!="")
		if(is_array($search_arr))
			for ($i=0;list($search_name,$search_value)=each($search_arr);$i++){
				// $search_arg[$i][name] = $search_name;
				// $search_arg[$i][value] = $search_value;
				$search_arg_str .= "&".str_replace(" ","+",$search_name)."=".str_replace(" ","+",$search_value);
			}
	
	// get $sort_arg_str
	if ($sort_arr!="")
		if(is_array($sort_arr))
			for ($i=0;list($sort_name,$sort_type)=each($sort_arr);$i++){
				// $sort_arg[$i][name] = $sort_name;
				// $sort_arg[$i][type] = $sort_type;
				$sort_arg_str .= "&".str_replace(" ","+",$sort_name)."=".str_replace(" ","+",$sort_type);
			}
	
	// You can add more elements by changing this and add style class on switch ($i) case
	$class_element = 4;   // set class elements number
	// get $classes
	if ($class_arr!="")
		if(is_array($class_arr))
			for ($i=0;$i<$class_element;$i++){
				switch ($i){
					case 0:
						$font_class = $class_arr[0];
						break;
					case 1:
						$table_class = $class_arr[1];
						break;
					case 2:
						$tr_class = $class_arr[2];
						break;
					case 3:
						$td_class = $class_arr[3];
						break;
				}
			}
	?>
	<div class="digg">
		<?php if ($current_page==1) { ?>
        <span class="disabled" title="<?php echo $firstname; ?>"><?php echo $prename; ?></span>
        <?php }else{ ?>
		<a href="<?php echo $url."?page=".($current_page-1).$search_arg_str.$sort_arg_str; ?>" title="<?php echo $prename; ?>"<?php if ($font_class!="") echo " class=".$font_class; ?>><?php echo $prename; ?></a>
        <?php } ?>
    <?php
	// print page cell
	if ($total_page<=($show_pages_no+1)){	// total pages less then display page numbers
		for ($i=1;$i<=$total_page;$i++){
			if ($i==$current_page){
				echo "<span class='current' title=\"$currentname[0]".$i."$currentname[1]\"";
				if ($font_class!="") echo " class=".$font_class;
				echo ">$i</span>";
			}else{
				echo "<a href=\"$url?page=$i$search_arg_str$sort_arg_str\" title=\"$pagename[0]".$i."$pagename[1]\"";
				if ($font_class!="") echo " class=".$font_class;
				echo ">$i</a>";
			}
		}
	}else if ($current_page<=(floor($show_pages_no/2)+1)){   // current page is in the first list of display page numbers
		for ($i=1;$i<=$show_pages_no;$i++){
			if ($i==$current_page){
				echo"<span class='current' title=\"$currentname[0]".$i."$currentname[1]\"";
				if ($font_class!="") echo " class=".$font_class;
				echo ">$i</span>";
			}else{
				echo "<a href=\"$url?page=$i$search_arg_str$sort_arg_str\" title=\"$pagename[0]".$i."$pagename[1]\"";
				if ($font_class!="") echo " class=".$font_class;
				echo ">$i</a>";
			}
		}
		echo "...<a href=\"$url?page=$total_page$search_arg_str$sort_arg_str\" title=\"$pagename[0]".$total_page."$pagename[1]\"";
		echo ">$total_page</a></td>";   // last page link
	}else if ($total_page<=($current_page+floor($show_pages_no/2))){   // current page is in the last list of display page numbers
		echo "<a href=\"$url?page=1$search_arg_str$sort_arg_str\" title=\"".$pagename[0]."1".$pagename[1]."\"";
		echo ">1</a>...";   // first page link
		for ($i=($total_page-($show_pages_no-1));$i<=$total_page;$i++){
			if ($i==$current_page){
				echo"<span class='current' title=\"$currentname[0]".$i."$currentname[1]\"";
				if ($font_class!="") echo " class=".$font_class;
				echo ">$i</span>";
			}else{
				echo "<a href=\"$url?page=$i$search_arg_str$sort_arg_str\" title=\"$pagename[0]".$i."$pagename[1]\"";
				if ($font_class!="") echo " class=".$font_class;
				echo ">$i</a>";
			}
			echo "</td>";
		}
	}else if (($current_page+(floor($show_pages_no/2)-1))<=$total_page){   // current page is in the middle list of display page numbers
		echo "<a href=\"$url?page=1$search_arg_str$sort_arg_str\" title=\"".$pagename[0]."1".$pagename[1]."\"\"";
		if ($font_class!="") echo " class=".$font_class;
		echo ">1</a>...";   // first page link
		for ($i=($current_page-(floor($show_pages_no/2)-1));$i<=($current_page+(($show_pages_no/2)-1));$i++){
			if ($i==$current_page){
				echo"<span class='current' title=\"$currentname[0]".$i."$currentname[1]\"";
				if ($font_class!="") echo " class=".$font_class;
				echo ">$i</span>";
			}else{
				echo "<a href=\"$url?page=$i$search_arg_str$sort_arg_str\" title=\"$pagename[0]".$i."$pagename[1]\"";
				if ($font_class!="") echo " class=".$font_class;
				echo ">$i</a>";
			}
		}
		echo "...<a href=\"$url?page=$total_page$search_arg_str$sort_arg_str\" title=\"$pagename[0]".$total_page."$pagename[1]\"";
		if ($font_class!="") echo " class=".$font_class;
		echo ">$total_page</a>";   // last page link
	}
	?>
		<?php if ($current_page==$total_page) { ?>
        <span  class="disabled" title="<?php echo $lastname; ?>"><?php echo $nextname; ?></span></td>
        <?php }else{ ?>
		<a href="<?php echo $url."?page=".($current_page+1).$search_arg_str.$sort_arg_str; ?>" title="<?php echo $nextname; ?>"<?php if ($font_class!="") echo " class=".$font_class; ?>><?php echo $nextname;?></a>
        <?php } ?>
	</div>
	<?php
  }

?>
