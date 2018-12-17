function mobileTest(){
	var mobiles = new Array
			(
				"midp", "j2me", "avant", "docomo", "novarra", "palmos", "palmsource",
				"240x320", "opwv", "chtml", "pda", "windows ce", "mmp/",
				"blackberry", "mib/", "symbian", "wireless", "nokia", "hand", "mobi",
				"phone", "cdm", "up.b", "audio", "sie-", "sec-", "samsung", "htc",
				"mot-", "mitsu", "sagem", "sony", "alcatel", "lg", "eric", "vx",
				"NEC", "philips", "mmm", "xx", "panasonic", "sharp", "wap", "sch",
				"rover", "pocket", "benq", "java", "pt", "pg", "vox", "amoi",
				"bird", "compal", "kg", "voda", "sany", "kdd", "dbt", "sendo",
				"sgh", "gradi", "jb", "dddi", "moto", "iphone", "android",
				"iPod", "incognito", "webmate", "dream", "cupcake", "webos",
				"s8000", "bada", "googlebot-mobile"
			)

	var ua = navigator.userAgent.toLowerCase();
	var isMobile = false;
	for (var i = 0; i < mobiles.length; i++) {
		if (ua.indexOf(mobiles[i]) > 0) {
			isMobile = true;
			break;
		}
	}
	if(isMobile==true){
		return "isMobile";
		// if(typeof url == 'undefined') {
		// 	return true;
		// }else{
		// 	document.location.href=url;
		// }
	}else{
		var isIE = navigator.userAgent.search("MSIE") > -1; 
		var isEdge = navigator.userAgent.search("Edge") > -1; 
	    var isIE7 = navigator.userAgent.search("MSIE 7") > -1; 
	    var isFirefox = navigator.userAgent.search("Firefox") > -1; 
	    var isOpera = navigator.userAgent.search("Opera") > -1; 
	    var isSafari = navigator.userAgent.search("Safari") > -1;
		if (isIE7) { 
			return "isIE7";
	    } 
	    if (isEdge) { 
			return "isEdge";
	    } 
	    if (isIE) { 
	        return "isIE";
	    } 
	    if (isFirefox) { 
	    	return "isFirefox";
	    } 
	    if (isOpera) { 
	    	return "isOpera";
	    } 
	    if (isSafari) {
	    	return "isSafari or Chrome"; 
	    }         
	}
}

