(function($){
	var snb=$('#leftMenu');
	var lnb=snb.find('#snb');
	var lnbD2=lnb.find('>li>ul.depth2');
	//var lnbD3=lnbD2.find('>li>ul');
	var delay=0;
	var delay_cl=30;
	lnbD2.hide();

	// 활성화 된 메뉴 SHOW
	function lnbInit(){
		//lnbD3.find('.on').parent().parent().parent().find('>a').addClass('on')
		lnbD2.find('.on').parent().parent().parent().find('>a').addClass('on')
		lnbD2.find('.on').parent().parent().parent().find('>.on').parent().parent().delay(delay).slideDown();
		lnbD2.find('.on').parent().parent().parent().parent().parent().siblings().find('>ul.depth2').delay(delay_cl).slideUp();
		lnbD2.find('.on').parent().parent().delay(delay).slideDown();
	}

	// 1Depth 하위 Show
	lnb.find('>li').each(function(){
		$(this).click(function(){
			$(this).siblings().find('>ul.depth2').slideUp();
			$(this).find('>ul.depth2').slideDown();
		})
	})

	snb.mouseleave(function(){
		lnbInit();
	})
	lnbInit();
})(jQuery)