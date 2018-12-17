jQuery.fn.showLoading = function (msg,rgb,rgba) {
	if (msg.indexOf(".GIF")>0 || msg.indexOf(".gif")>0 || msg.indexOf(".svg")>0) {
		$("body").append("<div class='ploading'><img src="+msg+" class='loadingMsg'></div>");
	}else{
		$("body").append("<div class='ploading'><p class='loadingMsg'>"+msg+"</p></div>");
		$('.loadingMsg').css({
			"color":rgb,
			"font-weigh":"bold",
			"fontSize":20
		})
		loop();
	}
	
	
	$(".ploading").animate({
		opacity: 0
	},0)

	function loop(){
		//$('.loadingMsg').animate({
		//	opacity:0.2
		//},500,function(){
		//	$('.loadingMsg').animate({
		//		opacity:1
		//	},500,function(){
		//		loop();
		//	})
		//})
	}
	$this=$(this);
	$(window).resize(function(){
		if($this.selector=="body"){
			$(".ploading").css({
				"position":"fixed",
				"width":$(window).width(),
				"height":$(window).height(),
				"display":"block",
				"background-color":rgba,//"rgba(0,0,0,0.7)"
				"zIndex":"999",
				"top":0,
				"left":0
			})
			$('.loadingMsg').center();
		}else{
			$(".ploading").css({
				"position":"absolute",
				"width":$this.width(),
				"height":$this.height(),
				"display":"block",
				"background-color":rgba,//"rgba(0,0,0,0.7)"
				"zIndex":"999",
				"top":$this.offset().top,
				"left":$this.offset().left
			})
			$('.loadingMsg').center();
		}

	}).resize();

	$(".ploading").animate({
		opacity: 1
	},300)
}
jQuery.fn.delLoading = function () {
	//$(".ploading").animate({
	//	opacity: 0
	//},300,function(){
	//	$(".ploading").remove();
	//})
	$(".ploading").velocity({
		opacity:0
	},{
		duration:700,
		complete:function(){
			$(".ploading").remove();
		}
	})
}
