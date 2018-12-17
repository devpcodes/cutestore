//$("figure").css({opacity:0});
//$(".menu-style").css({opacity:0});
//$(".gdm-block-wrap").css({opacity:0});
//$('.product-list').css({opacity:0});
//$('.banner').css({opacity:0});
$win = $(window);
$win.load(function(){
    $("figure").velocity({opacity:1},{
        duration:700,
        delay:300
    });
    $('.banner').velocity({opacity:1},{
        duration:800,
        delay:500
    });
    $(".gdm-block-wrap").velocity({opacity:1},{
        duration:800,
        delay:900
    });
    $win.scroll(function(){
        if($win.scrollTop()>=$(".content").offset().top-100){
            $(".menu-style").velocity({opacity:1},{
                duration:800
            });
            $('.product-list').velocity({opacity:1},{
                duration:800,
                delay:800
            });
        }
    }).scroll();
})


//點擊預覽產品
$(".link-view").bind('click',linkView);

function linkView(event){
    var id = $(this).attr('productId');
    event.preventDefault();
    //加入load html的元素和底色
    $( "body").append("<div class='htmlContent'></div><div class='page-overlaybg' style='opacity: 0'></div>");
    //加入loading
    //$("body").showLoading("loading...","rgb(255,255,255)","rgba(11,11,11,0.8)");///images/default.svg
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
            //delay:400,
            easing:"easeOutCubic"
        })
    } );
    //load進來的html會被原先的header壓住，所以降低zindex
    $("header").css({
        zIndex:1
    })
}

var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
$(".news").click(function(event){
    event.preventDefault();
    $.ajax({
        url: "/cutestore/news",
        data: {_token: CSRF_TOKEN},
        type:"POST",
        dataType:'json',
        success: function(msg){
            var holdHeight = $(".product-list").height();
            $(".product-list").css({height:holdHeight});
            $(".product-list").children().remove();
            putItems(msg);
        },
        error:function(xhr, ajaxOptions, thrownError){
            alert(xhr.status);
            alert(thrownError);
        }
    });
})

$(".hot").click(function(event){
    event.preventDefault();
    $.ajax({
        url: "/cutestore/hot",
        data: {_token: CSRF_TOKEN},
        type:"POST",
        dataType:'json',
        success: function(msg){
            var holdHeight = $(".product-list").height();
            $(".product-list").css({height:holdHeight});
            $(".product-list").children().remove();
            putItems(msg);
        },
        error:function(xhr, ajaxOptions, thrownError){
            alert(xhr.status);
            alert(thrownError);
        }
    });
})

function putItems(result){
    var pLists = result.productLists;

    for(var i=0; i<pLists.length; i++){
        //console.log(JSON.parse(pLists[i].images));
        var thumbImg = JSON.parse(pLists[i].images).thumbImg;

        var options;
        if(pLists[i].items!="undefined"){
            options = JSON.parse(pLists[i].items);
        }else{
            options = new Object();
        }
        var opTag="";
        $.each( options, function( key, value ) {
            //console.log( key + ": " + value );
            var title = key.split("_",1)
            opTag += '<input class="options" type="hidden" key="'+ title +'"'+ "value="+value[0]+'>';
        });

        $(".product-list").append('<div style="top:100px;opacity:0" class="product-item p'+pLists[i].id+'"'+'>' +
                '<figure class="product-image" style="">' +
                    '<a><img src="'+thumbImg+'"'+'></a>' +
                '</figure>' +
                '<div class="product-overlay">' +
                    '<div class="product-decs">' +
                        '<h3><a>'+pLists[i].name+'</a></h3>' +
                        '<p>'+pLists[i].description1+'</p>' +
                        '<p class="price">$'+pLists[i].price+'</p>' +
                        '<a key="'+pLists[i].id+'"'+'href="#" class="add-cart"><i class="i-cart2"></i></a>' +
                        '<a href="#" productId="'+pLists[i].id+'"'+'class="link-view"></a>' +
                    '</div>' +
                '</div>' +
                '<input class="options" type="hidden" key="src" value="'+thumbImg+'"'+ '/>' +
                opTag +
            '</div>'
        );

    }
    for(var k=0; k<=$(".product-item").length; k++){
        $(".product-item").eq(k).velocity({
            opacity:1,
            top:[0,150]
        },{
            duration:450,
            easing:"easeOutCubic",//easeOutCubic
            delay:100*(k-0.3*k)
        })
    }

    $(".link-view").bind('click',linkView);
    $(".add-cart").bind('click',addCart);

    $.extend($.support, { touch: "ontouchend" in document });
    var touchBoolean = $.support.touch;
    if(touchBoolean){
        $(".product-decs").css({display:"none"});
        $(".product-item").bind('click',touchHandler);
    }

}


//for觸控
$.extend($.support, { touch: "ontouchend" in document });
var touchBoolean = $.support.touch;
if(touchBoolean){
    //home頁
    $(".product-decs").css({display:"none"});
    $(".product-item").bind('click',touchHandler);
}
$(window).click(function(){
    $.extend($.support, { touch: "ontouchend" in document });
    var touchBoolean = $.support.touch;
    if(touchBoolean){
        for(var i=0; i<=$(".product-decs").length; i++){
            if($(".product-decs").eq(i).css("display")=="block"&&$(".product-decs").eq(i).css("opacity")==0){
                $(".product-decs").eq(i).css({display:"none"});
            }
        }
    }
})
function touchHandler(){
    $(".product-decs").css({display:"none"});
    $(this).children().find($(".product-decs")).css({display:"block"});
}