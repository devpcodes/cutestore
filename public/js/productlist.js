//$(".content").css({opacity:0});
//$("nav").css({opacity:0});
if(mobileTest()=="isMobile"){
    $(".leftCheck").removeAttr('checked');
}else{

}
$(function(){

    $("nav").velocity({
        opacity:1
    },{
        duration:700
    })
    $(".content").velocity({
        opacity:1
    },{
        duration:700,
        delay:500
    })
    //圖片延遲加載
    for (var i = 0; i < $("img").length; i++) {
        var _src = $("img").eq(i).attr("src");
        $("img").eq(i).attr("data-original",_src);
        $("img").eq(i).attr("width","267");
        $("img").eq(i).attr("height","311");
        $("img").eq(i).addClass("lazy");
    };
    $("img.lazy").lazyload({
        effect : "fadeIn"
    });

    //取得網址參數
    var order = '';
    var items = '';
    if(urlParam("order") != null){
        order = urlParam("order");
    }else{
        order = 'created_at';
    }
    if(urlParam("items") != null){
        items = urlParam("items");
    }else{
        items = '15';
    }

    //設定下拉選單為當前排序方式
    $(".orderBySelect").val(order);
    $(".pageItems").val(items);

    //排序下拉選單改變事件
    $(".orderBySelect").change(function(){
        order = $(".orderBySelect :selected").attr('value');
        document.location.href=location.pathname+"?order="+order+"&items="+items;
    })
    $(".pageItems").change(function(){
        items = $(".pageItems :selected").attr('value');
        document.location.href=location.pathname+"?order="+order+"&items="+items;
    })

    //點擊預覽產品
    $(".link-view").click(function(event){
        var id = $(this).attr('productId');
        event.preventDefault();
        //加入load html的元素和底色
        $( "body").append("<div class='htmlContent'></div><div class='page-overlaybg' style='opacity: 0'></div>");
        //加入loading
        ///images/default.svg
        //$("body").showLoading("loading...","rgb(255,255,255)","rgba(11,11,11,0.8)");
        //html讀入之後觸發的function，刪除loadin和做效果
        $(".page-overlaybg").velocity({
            opacity:0.8
        },{
            duration:300
        })
        $( ".htmlContent" ).load( "/cutestore/product/"+id,function(){
            //$("body").delLoading();
            $("#htmlpage").velocity({
                top:0,
                opacity:1
            },{
                duration:700,
                //delay:1000,
                easing:"easeOutCubic"
            })
        } );
        //load進來的html會被原先的header壓住，所以降低zindex
        $("header").css({
            zIndex:1
        })
    })

    //$(".down").click(function(){
    //    event.preventDefault();
    //    $(".dropdown-menu-new").velocity("slideUp",{duration:800});
    //    //$(this).find(".dropdown-menu-new").css({display:"none"})
    //})


    //取得網址參數
    function urlParam (name) {
        //宣告正規表達式
        var reg = new RegExp("(^|&)" + name + "=([^&]*)(&|$)");
        /*
         * window.location.search 獲取URL ?之後的參數(包含問號)
         * substr(1) 獲取第一個字以後的字串(就是去除掉?號)
         * match(reg) 用正規表達式檢查是否符合要查詢的參數
         */
        var r = window.location.search.substr(1).match(reg);
        //如果取出的參數存在則取出參數的值否則回穿null
        if (r != null) return unescape(r[2]); return null;
    }
})

//for 觸控
$.extend($.support, { touch: "ontouchend" in document });
var touchBoolean = $.support.touch;
if(touchBoolean){
    //list頁
    $(".overlay-btn").css({display:"none"});
    $(".product-item").click(function(){
        $(".overlay-btn").css({display:"none"});
        $(this).children().find($(".overlay-btn")).css({display:"block"});
    })
}

$(window).click(function(){
    $.extend($.support, { touch: "ontouchend" in document });
    var touchBoolean = $.support.touch;
    if(touchBoolean){
        for(var k=0; k<=$(".overlay-btn").length; k++){
            if($(".overlay-btn").eq(k).css("display")=="block"&&$(".overlay-btn").eq(k).css("opacity")==0){
                $(".overlay-btn").eq(k).css({display:"none"});
            }
        }
    }
})