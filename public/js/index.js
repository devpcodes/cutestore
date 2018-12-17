$(function(){
	var $win = $(window);
	var effectBoolean = true;
	$win.scroll(function(){
		$("header").addClass("header-fixed");
		effectBoolean = false;
		if($win.scrollTop()==0){
			$("header").removeClass("header-fixed");
			effectBoolean = true;
			logoEffect();
		}
	})
	function logoEffect(){
		if(effectBoolean==true){
			$("h1").css({opacity:0});
			$("h1").velocity({
				opacity:1
			},{
				duration:500,
				delay:200
			})
		}
	}
	$(window).load(function(){
		$("header").velocity({
			opacity:1
		},{
			duration:500
		})
	})
})


