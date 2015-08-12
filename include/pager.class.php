<?php


class pager
{

	public $record_nums;

	public $page_nums;

	public $record_from;

	public $cur_page;

	public $record_per_page;

	public $all_div_arr;

	private $arr_size=5;

	public $arr_start=1;

	public $arr_end=1;

	public $pager_border_color;


	public function __construct($record,$record_per_page=10)
	{
		global $_REQUEST;
		$in_div_arr = Array();
		$this->record_nums 	= $record;
		$this->record_per_page = $record_per_page;
		$this->page_nums   	= ceil($record/$record_per_page);
		isset($_REQUEST['page_start']) ? $this->cur_page = $_REQUEST["page_start"] : $this->cur_page=1;
		isset($_REQUEST['page']) ? $this->cur_page=$_REQUEST['page'] : $this->cur_page=1;

		$this->record_from	= ($this->cur_page>$this->page_nums)?0:($this->cur_page - 1) * $record_per_page;
		$this->cur_page = ($this->cur_page>$this->page_nums)?1:$this->cur_page;
	 }


/**
 * functionG?覡
 *
 * @param  $mpurlz
 * @param  $maxpages
 * @return
 */
	function page_function($offset_page = 10)
	{
		$multipage = "";
	//W[???eURL---------------------------------------------------------------
		$maxpages = 0;

		if(!$mpurl){
				//URLRG
				$url=$_SERVER["REQUEST_URI"];
				if(!$_REQUEST['page']) $page=1; else $page=$_REQUEST['page'];
				$parse_url=@parse_url($url);
				$url_query=$parse_url["query"]; 
				if($url_query){

				$url_query=ereg_replace("(^|&)page=$page","",$url_query);

				//??zZURLd?r??URLd?rG
				$url=str_replace($parse_url["query"],$url_query,$url);
				}

			$mpurl=$url;
		}


		 $mpurl .= strpos($mpurl, "?") ? "&" : "?";

		#if($this->record_nums > $this->record_per_page)
		#{

			$page = $offset_page;

			$offset = 4;

			$realpages = @ceil($this->record_nums / $this->record_per_page);
			$pages = $maxpages && $maxpages < $realpages ? $maxpages : $realpages;

			if($page > $pages)
			{
				$from = 1;
				$to = $pages;
			}
			else
			{

				$from = $this->cur_page - $offset;
				$to = $this->cur_page + $page - $offset - 1;
				if($from < 1)
				{
					$to = $this->cur_page + 1 - $from;
					$from = 1;
					if(($to - $from) < $page && ($to - $from) < $pages)
					{
						$to = $page;
					}
				}
				elseif($to > $pages)
				{
					$from = $this->cur_page - $pages + $to;
					$to = $pages;
					if(($to - $from) < $page && ($to - $from) < $pages)
					{
						$from = $pages - $page + 1;
					}
				}
			}

			$div_s= '<span class="pagelink">';
			$div_e='</span>';

			$multipage = ($this->cur_page - $offset > 1 && $pages > $page ? "<a href=\"".$mpurl."page=1\">$div_s$div_e</a>\n" : "").
				($this->cur_page > 1 ? "<a href=\"".$mpurl."page=".($this->cur_page - 1)."\">$div_s &lt;&lt;Prev$div_e</a>\n" : " &lt;&lt;Prev");
				$multipage .= "&nbsp;&nbsp;&nbsp;&nbsp;";
			if($this->page_nums>1){
				for($i = $from; $i <= $to; $i++)
				{
					 $multipage .= $i == $this->cur_page ? '<span class="curpage">'.$i."</span>\n" :
						'<a href="'.$mpurl.'page='.$i.'">'.$div_s.$i.$div_e."</a>\n";
				}
			}else{
			$multipage .=$this->cur_page;
			}
			$multipage .= "&nbsp;&nbsp;&nbsp;&nbsp;";
			$multipage .= ($this->cur_page < $pages ? '<a href="' . $mpurl . 'page=' . ($this->cur_page + 1) . '">' . $div_s . "Next&gt;&gt;". $div_e."</a>\n" : "Next&gt;&gt;") . ($to < $pages ? '<a href="'.$mpurl.'page='.$pages.'">'.$div_s."".$div_e."</a>\n" : "");
			//onkeypress=\"javascript:if (event.keyCode == 13){		location.href=this.name+this.value;  }\"
			$base_url = $mpurl . "page=";
			

			$multipage =  '<div class="pager">'."&nbsp;&nbsp;".$multipage."</div>";

		return $multipage;
	}

}

?>