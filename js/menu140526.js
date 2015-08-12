// JavaScript Document
$(function(){
	$('.first_nav_list>li>a').click(function(e){
		$('.first_nav_list>li>a').removeClass('link_on');
		$(this).addClass('link_on');
		$('ul.checked1').slideUp('500','easeOutBack').removeClass('checked1');
		$(this).next().slideDown('500','easeOutBack');
		$(this).next().addClass('checked1');
		e.stopPropagation();
		})
	
	$('.second_nav_list>li>a').click(function(e){
		$('.second_nav_list>li>a').removeClass('link_on1');
		$(this).addClass('link_on1');
		$('ul.checked2').slideUp('500','easeOutBack').removeClass('checked2');
		$(this).next().slideDown('500','easeOutBack');
		$(this).next().addClass('checked2');
		e.stopPropagation();
		})
	
	})