// JavaScript Document

$(function(){
	var timer = null;
	var z = 0;
	$('.menu>li').mouseover(function(e){
		var i = $(this).index();
		if(z != i){
			$('.second_menu_box').eq(z).slideUp(100);
			}
		clearTimeout(timer);
		timer = setTimeout(function(){
			$('.second_menu_box').eq(i).slideDown(300);
			},300)
		e.stopPropagation();
		});
	$('.menu>li').mouseout(function(e){
		clearTimeout(timer);
		var i = $(this).index();
		z = i;
		timer = setTimeout(function(){
			$('.second_menu_box').eq(i).slideUp(100);
			},100)
		})
	
	$('.second_menu_list>li').mouseover(function(){
		$(this).children(".third_menu_box").show();
		})
	$('.second_menu_list>li').mouseout(function(){
		$(this).children(".third_menu_box").hide();
		})
	$('.third_menu_list>li').mouseover(function(){
		$(this).children('.fourth_menu_box').show();
		})
	$('.third_menu_list>li').mouseout(function(){
		$(this).children('.fourth_menu_box').hide();
		})
	})