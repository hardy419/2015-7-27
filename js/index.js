// JavaScript Document
//运动框架

function css(obj, attr, value)
{
	if(arguments.length==2)
	{
		if(attr!='opacity')
		{
			return parseInt(obj.currentStyle?obj.currentStyle[attr]:document.defaultView.getComputedStyle(obj, false)[attr]);
		}
		else
		{
			return Math.round(100*parseFloat(obj.currentStyle?obj.currentStyle[attr]:document.defaultView.getComputedStyle(obj, false)[attr]));
		}
	}
	else if(arguments.length==3)
		switch(attr)
		{
			case 'width':
			case 'height':
			case 'paddingLeft':
			case 'paddingTop':
			case 'paddingRight':
			case 'paddingBottom':
				value=Math.max(value,0);
			case 'left':
			case 'top':
			case 'marginLeft':
			case 'marginTop':
			case 'marginRight':
			case 'marginBottom':
				obj.style[attr]=value+'px';
				break;
			case 'opacity':
				obj.style.filter="alpha(opacity:"+value+")";
				obj.style.opacity=value/100;
				break;
			default:
				obj.style[attr]=value;
		}
	
	return function (attr_in, value_in){css(obj, attr_in, value_in)};
}

var MIAOV_MOVE_TYPE={
	BUFFER: 1,
	FLEX: 2
};

function miaovStopMove(obj)
{
	clearInterval(obj.timer);
}

function miaovStartMove(obj, oTarget, iType, fnCallBack, fnDuring)
{
	var fnMove=null;
	if(obj.timer)
	{
		clearInterval(obj.timer);
	}
	
	switch(iType)
	{
		case MIAOV_MOVE_TYPE.BUFFER:
			fnMove=miaovDoMoveBuffer;
			break;
		case MIAOV_MOVE_TYPE.FLEX:
			fnMove=miaovDoMoveFlex;
			break;
	}
	
	obj.timer=setInterval(function (){
		fnMove(obj, oTarget, fnCallBack, fnDuring);
	}, 30);
}

function miaovDoMoveBuffer(obj, oTarget, fnCallBack, fnDuring)
{
	var bStop=true;
	var attr='';
	var speed=0;
	var cur=0;
	
	for(attr in oTarget)
	{
		cur=css(obj, attr);
		if(oTarget[attr]!=cur)
		{
			bStop=false;
			
			speed=(oTarget[attr]-cur)/5;
			speed=speed>0?Math.ceil(speed):Math.floor(speed);
			
			css(obj, attr, cur+speed);
		}
	}
	
	if(fnDuring)fnDuring.call(obj);
	
	if(bStop)
	{
		clearInterval(obj.timer);
		obj.timer=null;
		
		if(fnCallBack)fnCallBack.call(obj);
	}
}

function miaovDoMoveFlex(obj, oTarget, fnCallBack, fnDuring)
{
	var bStop=true;
	var attr='';
	var speed=0;
	var cur=0;
	
	for(attr in oTarget)
	{
		if(!obj.oSpeed)obj.oSpeed={};
		if(!obj.oSpeed[attr])obj.oSpeed[attr]=0;
		cur=css(obj, attr);
		if(Math.abs(oTarget[attr]-cur)>=1 || Math.abs(obj.oSpeed[attr])>=1)
		{
			bStop=false;
			
			obj.oSpeed[attr]+=(oTarget[attr]-cur)/5;
			obj.oSpeed[attr]*=0.7;
			
			css(obj, attr, cur+obj.oSpeed[attr]);
		}
	}
	
	if(fnDuring)fnDuring.call(obj);
	
	if(bStop)
	{
		clearInterval(obj.timer);
		obj.timer=null;
		
		if(fnCallBack)fnCallBack.call(obj);
	}
}

$(function(){
	var opic_list=document.getElementById("md_project_picList");
	var wz_list=document.getElementById("md_project_wzList");
	
	var opic_li=opic_list.getElementsByTagName("li");
	var wz_li=wz_list.getElementsByTagName("li");
	
	opic_list.innerHTML+=opic_list.innerHTML;
	wz_list.innerHTML+=wz_list.innerHTML;
	
	var f_n=f_m=0;
	$('#md_project_turn_r').click(function(){
		
		f_n=f_n-312;
		f_m=f_m-323;
		miaovStartMove(opic_list, {left:f_n},MIAOV_MOVE_TYPE.BUFFER);
		miaovStartMove(wz_list, {left:f_m},MIAOV_MOVE_TYPE.BUFFER);
		if(f_n==-(opic_li.length/2+1)*312){
			opic_list.style.left=0;
			f_n=-312;
			miaovStartMove(opic_list, {left:f_n},MIAOV_MOVE_TYPE.BUFFER);
			}
		if(f_m==-(wz_li.length/2+1)*323){
			wz_list.style.left=0;
			f_m=-323;
			miaovStartMove(wz_list, {left:f_m},MIAOV_MOVE_TYPE.BUFFER);
			}
		})
	
	$('#md_project_turn_l').click(function(){
		f_n=f_n+312;
		f_m=f_m+323;
		miaovStartMove(opic_list, {left:f_n},MIAOV_MOVE_TYPE.BUFFER);
		miaovStartMove(wz_list, {left:f_m},MIAOV_MOVE_TYPE.BUFFER);
		if(f_n==312){
			opic_list.style.left=-(opic_li.length/2)*312+"px";
			f_n=-(opic_li.length/2-1)*312;
			miaovStartMove(opic_list, {left:f_n},MIAOV_MOVE_TYPE.BUFFER);
			}
		if(f_m==323){
			wz_list.style.left=(-wz_li.length/2)*323+"px";
			f_m=-(wz_li.length/2-1)*323;
			miaovStartMove(wz_list, {left:f_m},MIAOV_MOVE_TYPE.BUFFER);
			}
		
		})
	})


//头部图片转换
$(function(){
	var status=i=0;
	var btn_list=document.getElementById("btm_smallpic_c_list");
	var top_pic_box=document.getElementById("big_pic_box");
	var btn_pic_length=document.getElementById("btm_smallpic_c_list").getElementsByTagName("li").length;
	function turn_timer(){
		status++;
		//点击底部图片时，图片转换
		for(i=0;i<big_pic_box_img.length;i++){
			miaovStartMove(big_pic_box_img[i], {opacity:0},MIAOV_MOVE_TYPE.BUFFER);
			$('#big_pic_box>div').css("z-index","2");
			}
		if(status>5||status==5){
			
			var leftpx=-(status-4)*168;
			miaovStartMove(btn_list, {left:leftpx},MIAOV_MOVE_TYPE.BUFFER);
			}
		if(status==btn_pic_length){
			status=0;
			miaovStartMove(btn_list, {left:0},MIAOV_MOVE_TYPE.BUFFER);
			}
		$('.top_btm_smallpic').removeClass("status_on");
		$('.top_btm_smallpic:eq('+status+')').addClass("status_on");
			
		miaovStartMove(big_pic_box_img[status], {opacity:100},MIAOV_MOVE_TYPE.BUFFER);
		$('#big_pic_box>div').eq(status).css("z-index","3");
		
		}
	var timer=setInterval(turn_timer,10000);
	
	var big_pic_box_img=document.getElementById("big_pic_box").getElementsByTagName("div");
	miaovStartMove(big_pic_box_img[0], {opacity:100},MIAOV_MOVE_TYPE.BUFFER);
	$('.big_pic_box6').css("z-index","3");
	//点击底部图片时，底部图片高亮
	$('.top_btm_smallpic').click(function(){
		$('.top_btm_smallpic').removeClass("status_on");
		$(this).addClass("status_on");
		status=$('.top_btm_smallpic').index(this);
		
		//点击底部图片时，图片转换
		for(i=0;i<big_pic_box_img.length;i++){
			miaovStartMove(big_pic_box_img[i], {opacity:0},MIAOV_MOVE_TYPE.BUFFER);
			$('#big_pic_box>div').css("z-index","2");
			}
		miaovStartMove(big_pic_box_img[status], {opacity:100},MIAOV_MOVE_TYPE.BUFFER);
		$('#big_pic_box>div').eq(status).css("z-index","3");
	})
	
	$('#top_turn_right').click(function(){
		
		status++;
		if(status>5||status==5&&status<btn_pic_length){
			var leftpx=-(status-4)*168;
			miaovStartMove(btn_list, {left:leftpx},MIAOV_MOVE_TYPE.BUFFER);
			}
		if(status==btn_pic_length){
			
			status=0;
			miaovStartMove(btn_list, {left:0},MIAOV_MOVE_TYPE.BUFFER);
			}
		$('.top_btm_smallpic').removeClass("status_on");
		$('.top_btm_smallpic:eq('+status+')').addClass("status_on");
		
		for(i=0;i<big_pic_box_img.length;i++){
			miaovStartMove(big_pic_box_img[i], {opacity:0},MIAOV_MOVE_TYPE.BUFFER);
			$('#big_pic_box>div').css("z-index","2");
			}
		miaovStartMove(big_pic_box_img[status], {opacity:100},MIAOV_MOVE_TYPE.BUFFER);
		$('#big_pic_box>div').eq(status).css("z-index","3");
		})
	$('#top_turn_left').click(function(){
		if(status==0){
			status=btn_pic_length;
			miaovStartMove(btn_list, {left:-186},MIAOV_MOVE_TYPE.BUFFER);
			
			}
		if(status==1&&$('#btm_smallpic_c_list').css("left")=="-186px"){
			
			miaovStartMove(btn_list, {left:0},MIAOV_MOVE_TYPE.BUFFER);
			}
		status--;
		$('.top_btm_smallpic').removeClass("status_on");
		$('.top_btm_smallpic:eq('+status+')').addClass("status_on");
		
		for(i=0;i<big_pic_box_img.length;i++){
			miaovStartMove(big_pic_box_img[i], {opacity:0},MIAOV_MOVE_TYPE.BUFFER);
			$('#big_pic_box>div').css("z-index","2");
			}
		miaovStartMove(big_pic_box_img[status], {opacity:100},MIAOV_MOVE_TYPE.BUFFER);
		$('#big_pic_box>div').eq(status).css("z-index","3");
		})
	
	
//lang 上面关注
		
	
	})
