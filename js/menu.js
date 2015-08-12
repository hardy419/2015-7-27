// JavaScript Document
$(function(){
	var location=window.location.pathname;
	var index=location.lastIndexOf('/')+1;
	var php=location.substr(index);
	
	$(".first_nav_list>li").each(function(){
		var len=$(this).find('ul').length;
		var index=$(this).index();
		if(len>0){
			var obj=$(this).find('li');
			$(obj).each(function(){
				var href=$(this).find('a').attr('href');
				var len=$(this).find('ul').length;
				var self=this;
				if(len>0){
					var obj=$(this).find('li');
					$(obj).each(function(){
						var href=$(this).find('a').attr('href');
						var len=$(this).find('ul').length;
						
						if(href==php){
						$(".first_nav_list>li").eq(index).find('a').addClass("link_on");
						$(self).parent('.second_nav_list').show();
						$(this).parent('.third_nav_list').show();
						$(this).find('a').addClass('link_on1');
					    }
					});
				}else{
					if(href==php){
					$(".first_nav_list>li").eq(index).find('a').addClass("link_on");
					$(this).parent('.second_nav_list').show();
					$(this).find('a').addClass('link_on1');
				    }
				}
			});
		}else{
			var href=$(this).find('a').attr('href');
			if(href==php){
				$(this).find('a').addClass('link_on');
			}
		} 
	});
	$('.first_nav_list>li>a').click(function(e){
		//e=e||windiw.event;
		//e.prevetDefault();
		$('.first_nav_list>li>a').removeClass('link_on');
		$(this).addClass('link_on');
		$('ul.checked1').slideUp('500','easeOutBack').removeClass('checked1');
		$(this).next().slideDown('500','easeOutBack');
		$(this).next().addClass('checked1');
		e.stopPropagation();
		})
	
	$('.second_nav_list>li>a').click(function(e){
		//e=e||windiw.event;
		//e.prevetDefault();
		$('.second_nav_list>li>a').removeClass('link_on1');
		$(this).addClass('link_on1');
		$('ul.checked2').slideUp('500','easeOutBack').removeClass('checked2');
		$(this).next().slideDown('500','easeOutBack');
		$(this).next().addClass('checked2');
		e.stopPropagation();
		})
	
	})