<?php   
header("Content-Type:text/html;charset=utf-8"); 
require_once("php-bin/function.php");
include_once("php-bin/lib_header.php");
define('file_Path','userfiles/pdf/');
$search_SQL    = "SELECT    *    FROM     tbl_notice   WHERE  a_type=1 ORDER BY  a_date  DESC LIMIT 6";
$search_Result = mysql_query( $search_SQL, $link_id );
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>聖公會基愛小學 S.K.H. Kei Oi Primary School</title>
<link href="css/all.css" rel="stylesheet" type="text/css" />
<link href="css/text1.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="js/jquery-1.11.0.min.js"></script>
<script type="text/javascript" src="js/text1.js"></script>
<style>
.boxmain{width:1100px; margin:0 auto;}
.box{position:relative;}
#header{ height:102px; width:1100px; margin-top:45px;}
img{border:none;}
.hide{ display:none;}
*{padding:0px; margin:0px;}
#banner {position:relative; width:1100px; height:545px; overflow:hidden;} 
#header{position:absolute; z-index:1002;}
#logo{width:411px; height:102px; float:left;}
#links{float:right;}
#banner_list img {border:0px;} 
#banner_bg {position:absolute; top:435px;height:110px;left:0px;z-index:9999;width:1100px; } 
#banner_list a{position:absolute; z-index:1;width:1100px; height:545px;}
#banner_list{width:1100px; height:585px; overflow:hidden; position:absolute; z-index:1;}
#banner_list .bannerbox{position:relative;width:1100px; height:545px; }
.bannerbox a img{height:545px; width:1100px;}
.word{position:absolute; z-index:2;left:40px;top:267px;}
.people{ position: absolute; z-index:3;}
.people .peo-1{left: 530px;position: absolute; z-index:1004;top: 212px;}
.people .peo-2	{left: 670px;position: absolute; z-index:1005;top:152px;}
.people .peo-3	{left: 870px;position: absolute; z-index:1006;top:212px;}
.nav{
	width:100%;
	background:#5dac59;
	position:absolute;
	z-index:1003;
	/*top:112px;*/
	height:35px;
	}

</style>
</head>

<body>

<div class="box">
    <div class="boxmain">
        <div class="box">
            <div id="header">
               <div id="logo"><img src="images/logo.png" /></div>
               <div id="links"><img src="images/links.png" /></div>
            </div>  
        </div>
    </div>
    <div class="nav">
        	<div id="menu">
            	<ul class="menu">
                	<li>
                    	<a class="nav_link" href="#"><span>學校簡介</span></a>
                        <div class="second_menu_box menu_box" style="">
                        	<ul class="second_menu_list">
                            	<li>
                                	<a class="second_nav_link" href="About.php"><span>辦學團體</span></a>                                </li>
                                <li>
                                	<a class="second_nav_link" href="#"><span>辦學理念 &gt;</span></a>
                                    <div class="third_menu_box">
                                    	<ul class="third_menu_list">
                                        	<li><a class="third_nav_link" href="About_Idea_Aim.php"><span>辦學宗旨</span></a></li>
                                            <li><a class="third_nav_link" href="About_Idea_Policy.php"><span>教學政策</span></a></li>
                                        </ul>
                                    </div>
                                </li>
                                <li><a class="second_nav_link" href="About_Member.php"><span>校董會成員</span></a></li>
                                <li>
                                	<a class="second_nav_link" href="#"><span>專業團隊 &gt;</span></a>
                                    <div class="third_menu_box">
                                    	<ul class="third_menu_list">
                                        	<li><a class="third_nav_link" href="About_Team_Organ.php"><span>學校組織</span></a></li>
                                            <li><a class="third_nav_link" href="About_Team_Word.php"><span>校長的話</span></a></li>
                                            <li><a class="third_nav_link" href="About_Team_Teacher.php"><span>教職員資料</span></a></li>
                                        </ul>
                                    </div>
                                </li>
                                <li>
                                	<a class="second_nav_link" href="#"><span>學校發展 &gt;</span></a>
                                    <div class="third_menu_box">
                                    	<ul class="third_menu_list">
                                        	<li><a class="third_nav_link" href="About_Develop_Report.php"><span>週年報告及計劃</span></a></li>
                                            <li><a class="third_nav_link" href="About_Develop_LifeEdu.php"><span>生命教育</span></a></li>
                                            <li><a class="third_nav_link" href="About_Develop_NewsEdu.php"><span>資訊科技教育</span></a></li>
                                        </ul>
                                    </div>
                                </li>
                                <li>
                                	<a class="second_nav_link" href="#"><span>學校事務 &gt;</span></a>
                                    <div class="third_menu_box">
                                    	<ul class="third_menu_list">
                                        	<li><a class="third_nav_link" href="About_Affair_Facilities.php"><span>校園設施</span></a></li>
                                            <li><a class="third_nav_link" target="_blank" href="files/1314schoolCalendar.pdf"><span>校曆表</span></a></li>
                                            <li><a class="third_nav_link" href="About_Affair_Clothes.php"><span>校服樣式</span></a></li>
                                            <li><a class="third_nav_link" href="About_Affair_Lunch.php"><span>午膳安排</span></a></li>
                                            <li><a class="third_nav_link" href="About_Affair_Bus.php"><span>校車服務</span></a></li>
                                            <li><a class="third_nav_link" href="About_Affair_SchoolTime.php"><span>學生上學時間及安排</span></a></li>
                                            <li><a class="third_nav_link" href="About_Affair_Song.php"><span>校歌</span></a></li>
                                        </ul>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li>
                    	<a class="nav_link" href="#"><span>學與教</span></a>
                        <div class="second_menu_box menu_box">
                        	<ul class="second_menu_list">
                            	<li>
                                	<a class="second_nav_link" href="#"><span>課程 &gt;</span></a>
                                    <div class="third_menu_box">
                                    	<ul class="third_menu_list">
                                        	<li>
                                            	<a class="third_nav_link" href="#"><span>主要學習領域 &gt;</span></a>
                                            	<div class="fourth_menu_box">
                                                	<ul class="fourth_menu_link">
                                                    	<li><a class="fourth_nav_link" href="LearnTeach_Course_AreaChi.php"><span>中國語文</span></a></li>
                                                        <li><a class="fourth_nav_link" href="LearnTeach_Course_AreaEnglish.php"><span>English</span></a></li>
                                                        <li><a class="fourth_nav_link" href="LearnTeach_Course_AreaMath.php"><span>數學</span></a></li>
                                                        <li><a class="fourth_nav_link" href="LearnTeach_Course_AreaSocial.php"><span>常識科</span></a></li>
                                                        <li><a class="fourth_nav_link" href="LearnTeach_Course_AreaMandarin.php"><span>普通話科</span></a></li>
                                                        <li><a class="fourth_nav_link" href="LearnTeach_Course_AreaArt.php"><span>視覺藝術</span></a></li>
                                                        <li><a class="fourth_nav_link" href="LearnTeach_Course_AreaSports.php"><span>體育科</span></a></li>
                                                        <li><a class="fourth_nav_link" href="LearnTeach_Course_AreaMusic.php"><span>音樂科</span></a></li>
                                                        <li><a class="fourth_nav_link" href="LearnTeach_Course_AreaGod.php"><span>宗教科</span></a></li>
                                                        <li><a href="LearnTeach_Course_Citizen.php" class="fourth_nav_link"><span>公民教育科</span></a></li>
                                                        <li><a href="LearnTeach_Course_Computer.php" class="fourth_nav_link"><span>電腦科</span></a></li>
                                                    </ul>
                                                </div>    
                                            </li>
                                            <!--li><a class="third_nav_link" href="LearnTeach_Course_Omni.php"><span>全方位活動</span></a></li-->
                                            <li><a class="third_nav_link" href="LearnTeach_Course_Read.php"><span>從閱讀中學習</span></a></li>
                                            <li><a class="third_nav_link" href="LearnTeach_Course_Health.php"><span>健康校園</span></a></li>
                                            <li><a class="third_nav_link" href="LearnTeach_Course_News.php"><span>資訊科技教育</span></a></li>
                                            <li><a href="LearnTeach_Course_Plan.php" class="third_nav_link"><span>校本專業支援計劃</span></a></li>
                                            <li><a href="LearnTeach_Course_Education.php" class="third_nav_link"><span>資優教育</span></a></li>
                                        </ul>
                                    </div>
                                </li>
                                <!--li><a class="second_nav_link" href="LearnTeach_Time.php"><span>學習時間表</span></a></li-->
                                <li><a class="second_nav_link" href="LearnTeach_SelfStudy.php"><span>自學園地</span></a></li>
                            </ul>
                        </div>
                    </li>
                    <li>
                    	<a class="nav_link" href="#"><span>學生成長</span></a>
                        <div class="second_menu_box menu_box">
                        	<ul class="second_menu_list">
                            	<li><a class="second_nav_link" href="GrowUp.php"><span>健康校園</span></a></li>
                                <li>
                                	<a class="second_nav_link" href="#"><span>生命教育 &gt;</span></a>
                                    <div class="third_menu_box">
                                    	<ul class="third_menu_list">
                                        	<li><a class="third_nav_link" href="GrowUp_leftEdu_Aim.php"><span>目的及政策</span></a></li>
                                            <li><a class="third_nav_link" href="GrowUp_leftEdu_Activity.php"><span>最近活動</span></a></li>
                                        </ul>
                                    </div>
                                </li>
                                <li><a class="second_nav_link" href="GrowUp_Tutorial.php"><span>訓育及輔導</span></a></li>
                                <li><a class="second_nav_link" href="GrowUp_Support.php"><span>學生支援</span></a></li>
                                <li>
                                	<a class="second_nav_link" href="#"><span>學生社會服務 &gt;</span></a>
                                    <div class="third_menu_box">
                                    	<ul class="third_menu_list">
                                        	<li><a class="third_nav_link" href="GrowUp_SocialService_Bb.php"><span>基督少年軍</span></a></li>
                                            <li><a class="third_nav_link" href="GrowUp_SocialService_BoyScouts.php"><span>男童軍</span></a></li>
                                            <li><a class="third_nav_link" href="GrowUp_SocialService_GirlScouts.php"><span>女童軍</span></a></li>
                                            <li><a class="third_nav_link" href="GrowUp_SocialService_CYC.php"><span>公益少年團</span></a></li>
                                        </ul>
                                    </div>
                                </li>
                                <li>
                                	<a class="second_nav_link" href="#"><span>學校事務 &gt;</span></a>
                                    <div class="third_menu_box">
                                    	<ul class="third_menu_list">
                                        	<li><a class="third_nav_link" href="GrowUp_Affair_Outof.php"><span>校外比賽</span></a></li>
                                            <li><a class="third_nav_link" href="GrowUp_Affair_InSchool.php"><span>校內比賽</span></a></li>
                                            <li><a class="third_nav_link" href="GrowUp_Affair_works.php"><span>學生作品</span></a></li>
                                            <li><a class="third_nav_link" href="GrowUp_Affair_scholarship.php"><span>獎學金</span></a></li>
                                        </ul>
                                    </div>
                               	</li>
                            </ul>
                        </div>
                    </li>
                    <li>
                    	<a class="nav_link" href="#"><span>學校資訊</span></a>
                        <div class="second_menu_box menu_box">
                        	<ul class="second_menu_list">
                            	<li><a class="second_nav_link" href="News.php"><span>通告下載</span></a></li>
                                <li><a class="second_nav_link" href="News_Photo_2014.php"><span>活動照片</span></a></li>
                                <li><a class="second_nav_link" href="News_Video.php"><span>活動影片</span></a></li>
                                <li><a class="second_nav_link" href="News_Magazine.php"><span>校園刊物</span></a></li>
                                <li><a class="second_nav_link" href="News_Meida.php"><span>媒體報導</span></a></li>
                                <li><a class="second_nav_link" href="News_Overseas.php"><span>境外學習活動</span></a></li>
                                <li>
                                	<a class="second_nav_link" href="#"><span>教學交流 &gt;</span></a>
                                    <div class="third_menu_box">
                                    	<ul class="third_menu_list">
                                        	<li><a class="third_nav_link" href="News_Exange_Young.php"><span>幼小聯繫</span></a></li>
                                            <li><a class="third_nav_link" href="News_Exange_Mid.php"><span>中小聯繫</span></a></li>
                                            <li><a class="third_nav_link" href="News_Exange_College.php"><span>大學交流</span></a></li>
                                        </ul>
                                    </div>
                                </li>
                                <li><a class="second_nav_link" href="News_Link.php"><span>網址連結</span></a></li>
                            </ul>
                        </div>
                    </li>
                    <li>
                    	<a class="nav_link" href="#"><span>學校協作</span></a>
                        <div class="second_menu_box menu_box">
                        	<ul class="second_menu_list">
                            	<li><a class="second_nav_link" href="TeamWork.php"><span>基愛堂</span></a></li>
                                <li><a class="second_nav_link" href="TeamWork_Parents.php"><span>家長教師會</span></a></li>
                                <li><a class="second_nav_link" href="TeamWork_Alumnus.php"><span>校友會</span></a></li>
                            </ul>
                        </div>
                    </li>
                    <li>
                    	<a class="nav_link" href="#"><span>資料下載區</span></a>
                        <div class="second_menu_box menu_box">
                        	<ul class="second_menu_list">
                            	<li><a class="second_nav_link" href="DownLoad.php"><span>通告</span></a></li>
                                <!-- <li><a class="second_nav_link" href="DownLoad_About.php"><span>學校簡介</span></a></li> -->
                                <li><a class="second_nav_link" href="DownLoad_Application.php"><span>入學申請</span></a></li>
                                <li><a class="second_nav_link" href="DownLoad_Report.php"><span>學校報告及發展計劃</span></a></li>
                                <li><a class="second_nav_link" href="DownLoad_Invitation.php"><span>招標公告</span></a></li>
                            </ul>
                        </div>
                    </li>
                    <!--<li><a class="nav_link" target="_blank" href="http://203.186.111.157/"><span>內聯網</span></a></li>-->
                </ul>
            </div>
        </div>
    <div class="boxmain">  
        <div id="banner"> 
            <div id="banner_bg"><img src="images/line.png" /></div>
            <div class="word"><img src="images/solgan.png" /></div>
                <div class="people">
                     <div class="box">
                         <div class="peo-1"><img src="images/person_01.png" /></div>
                         <div class="peo-2"><img src="images/person_02.png" /></div>
                         <div class="peo-3"><img src="images/person_03.png" /></div>
                     </div>
                </div>
            <div id="banner_list"> 
                <a href="#" target="_blank"><img src="images/banner-01.png" /></a> 
                <a href="#" target="_blank"><img src="images/banner-02.png" /></a> 
                <a href="#" target="_blank"><img src="images/banner-04.png" /></a>
                <a href="#" target="_blank"><img src="images/banner-03.png" /></a> 
            </div> 
      </div> 
    </div>
</div>
<script type="text/javascript" src="js/jquery.slides.js"></script>
<script type="text/javascript">
var t = n = 0, count; 
$(document).ready(function(){ 
        $('#banner_list').slidesjs({
        width: 1100,
        height: 545,
		navigation: {
		  active:false
        },
        pagination: {
		  active:false,
        },
        effect: {
          fade: {
            speed: 600
          }
        },
		
		play: {
          active:false,
          auto: true,
		  effect: "fade",
          interval: 5000,
          swap: false
        },
		callback: {
			  start: function(number) {
				if(number==3){
				  $(".word,.people").fadeOut();	
				}else{
					$(".word,.people").fadeIn();
				}
			  }
			} 
      });
});


</script>

<div id="main">
        <div id="aside_left">
            <div id="history">
                本校是聖公宗小學監理委員會藉下一所基督教小學，由政府資助。<br/>
                於1958年創校，至今已有五十五年歷史
            </div>
            
            <div class="title" style="margin:18px 0px 4px 15px;font-weight:bold;font-family:'Times New Roman';font-size:14px;color:#57a72f">學生作品</div>
            <div style="border:1px solid #b3db97;border-radius:8px;background:#f9fff4;">
                <div>
                    <div class="product">
                        <img src="images/product_01.png">
                        <div class="product_title">“童心畫節期”得獎作品選（水粉畫）</div>
                        <div class="product_date">21.09.2013</div>
                    </div>
                    <div style="height:2px;margin:0px 10px 0px 10px;border-top:1px solid #dddddd;"></div>
                    <div class="product">
                        <img src="images/product_02.png">
                        <div class="product_title">2012-2013年度學生作品選集（國畫）</div>
                        <div class="product_date">21.09.2013</div>
                    </div>
                </div>
            </div>
        </div>
        <div id="aside_middle">
            <div style="float:left;">

                <div class="navi_aside_focus" id="notify_navi" onclick="change_news(this.id)">最新通告</div>
                <div id="notify_board" class="middle_board" style="height:174px;">
                    <div>
                     <?php
						while( $Report_Obj = mysql_fetch_object($search_Result) ){
					  ?>
                        <div class="news"><img src="images/pointer.png"><a href="<?php if(is_file(file_Path.$Report_Obj->down_file))echo file_Path.$Report_Obj->down_file; else echo "javascript:void(0);"?>" target="_blank"><?php echo $Report_Obj->a_title;?> </a><div style="float:right;"><?php echo $Report_Obj->a_date;?></div></div>
                      <?php } ?>
                    </div>
                </div>
                <div id="photo_gallery">
                    <div id="photo_student">學生相冊</div>
                    <div style="height:126px;border-radius:5px;float:left;width:100%;background:#f8f8f8;border:1px solid #e3e3e3;">
                        <div style="width:26px;margin-top:58px;float:left;"><img id="preImg" style="display:none;width:26px;margin-bottom:30px;margin-right:0px;" src="images/photo_left.png" onclick="Photo_preImg()"></div>
                        <div class="photo_div" id="0"><img src="images/photo_01.png"></div>
                        <div class="photo_div" id="1"><img src="images/photo_02.png"></div>
                        <div class="photo_div" id="2"><img src="images/photo_03.png"></div>
                        <div class="photo_div" id="3"><img src="images/photo_04.png"></div>
                        <div class="photo_div" id="4"><img src="images/photo_01.png"></div>
                        <div class="photo_div" id="5" style="margin-right:0px;"><img src="images/photo_02.png"></div>
                        <div class="photo_div" id="6" style="display:none;"><img src="images/photo_03.png"></div>
                        <div class="photo_div" id="7" style="display:none;"><img src="images/photo_04.png"></div>
                        <div class="photo_div" id="8" style="display:none;"><img src="images/photo_01.png"></div>
                        <div class="photo_div" id="9" style="display:none;"><img src="images/photo_02.png"></div>
                        <div class="photo_div" id="10" style="display:none;"><img src="images/photo_03.png"></div>
                        <div class="photo_div" id="11" style="display:none;"><img src="images/photo_04.png"></div>
                        <div style="width:26px;margin-top:58px;float:left;"><img id="nextImg" src="images/photo_right.png" onclick="Photo_nextImg()"></div>
                    </div>
                </div>
            </div>
        </div>
        <div id="aside_right">
            <div id="video">
                <div class="title" style="color:#5ba333;font-weight:bold;margin-bottom:6px;font-size:14px;">基愛視頻</div>
                <img src="images/video.png">
            </div>
            <div>
                <div class="title" style="margin-top:22px;color:#5ba333;font-weight:bold; font-size:14px;">聯絡我們</div>
                <div style="border-radius:5px;padding:13px 10px;width:200px;background:#f9fff4;border:1px solid #b3db97;">
                    地址：九龍深水步廣利道十五號<br/>
                    電郵：info@keioi.edu.hk<br/>
                    電話：+852 23862463<br/>
                    傳真：+852 23876695<br/>
                </div>
            </div>
        </div>
    </div>
    <script>
    function change_news(objID){
		if(objID=="news_navi")
		{
			document.getElementById("news_navi").className="navi_aside_focus";
			document.getElementById("notify_navi").className="navi_aside_blur";
			document.getElementById("news_board").style.display="block";
			document.getElementById("notify_board").style.display="none";
		}else if(objID=="notify_navi")
		{
			document.getElementById("notify_navi").className="navi_aside_focus";
			document.getElementById("news_navi").className="navi_aside_blur";
			document.getElementById("news_board").style.display="none";
			document.getElementById("notify_board").style.display="block";
		}
	}
    var thelastImgNum=5;
	var ImgSize=$(".photo_div").size();
    function Photo_nextImg(){
		
		if(thelastImgNum<ImgSize-1)
		{
			$("#"+(thelastImgNum-5)).css("display","none");
			$("#"+thelastImgNum).css("margin-right","8px");
			$("#"+(thelastImgNum+1)).css("margin-right","0px").css("display","block");
			thelastImgNum=thelastImgNum+1;
			$("#preImg").css("display","block");
		}
		if(thelastImgNum==(ImgSize-1))
		{
			$("#nextImg").css("display","none");
		}
	}
	function Photo_preImg(){
		if((thelastImgNum-5)>0)
		{
			$("#"+thelastImgNum).css("margin-right","8px").css("display","none");
			$("#"+(thelastImgNum-1)).css("margin-right","0px");
			$("#"+(thelastImgNum-6)).css("display","block");
			thelastImgNum=thelastImgNum-1;
			$("#nextImg").css("display","block");
		}
		if((thelastImgNum-5)==0)
		{
			$("#preImg").css("display","none");
		}
	}
</script>
<?php include('foot.php'); ?>
</body>
</html>
