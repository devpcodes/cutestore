$(".detail-info").center();
$(".detail-info").css({
    //transform: 'scale(0.1,0.1)',
    //opacity:0,
    display:"none"
})
//大圖載入完成後做淡入動畫
//$(".product-main-image img").css({opacity:0});
//$(".product-main-image img").load(function() {
//    $(".product-main-image img").velocity({
//        opacity: 1
//    },{
//        duration:500,
//        delay:300
//    })
//});
$('img').each(function(i) {
    if (this.complete) {
        initFullImage($(this));
    } else {
        $(this).load(function() {
            initFullImage($(this));
        });
    }
});
function initFullImage($data){
    $data.velocity({
        opacity: 1
    },{
        duration:500,
        delay:300
    })
}
$("#htmlpage").css({
    top:-200
},0)
$("#htmlpage").css({overflow : "auto"});
//$("body").css({overflow : "hidden"});

//點擊關閉按鈕
$(".overlay-close").click(function(event){
    event.preventDefault();
    $(".page-overlaybg").velocity({opacity:0},200)
    $(".page-overlay").velocity({
        opacity:0.1
    },{
        duration:200,
        complete:function(){
            //$('.product-overlay-container').mCustomScrollbar("destroy",true);
            $( ".htmlContent" ).remove();
            $(".page-overlaybg").remove();
            //$("body").css({overflow:"auto"});
        }
    });
})
//==============================cart=======================
var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
var name = $('.pname').text();
var src = $(".img").val();
//option預設值
var optionJson= new Object();
optionJson["src"] = src;
$('.poption').each(function( index ) {
    optionJson[$(this).text()]=$(this).attr('default');
});
var opJson=JSON.stringify(optionJson);

//點擊item
$(".pitem").click(function(event){
    event.preventDefault();
    $(this).siblings().find("a").removeClass("active");
    $(this).find("a").addClass("active");
    optionJson[$(this).attr("parent")]=$(this).text();
    opJson=JSON.stringify(optionJson);
})

var price = $('.pprice').text().slice(1);
var qty;
var id = $(".pname").attr("pid");

var oldVal;
$(".quantity").click(function(){
    oldVal = $(this).val();
})
$(".quantity").keyup(function(){
    var val = $(this).val();
    if(!/^\d+$/.test(val)){
        $(this).val(oldVal);
        alert("請填入數字");
    }
})

$(".btn-addcart").click(function(event){
    qty = $(".quantity").val();
    if(qty==""){
        qty="1";
    }
    event.preventDefault();
    $.ajax({
         type:'POST',
         data: {_token: CSRF_TOKEN,id: id, name: name, price: price, qty:qty, optionJson: opJson},
         url:'/cutestore/addcart',
         success:function(data){
             $(".detail-info").css({
                 display:"block"
             })
             $(".detail-info").velocity({
                 //scale:[1,0.1]
                 opacity:[1,0]
             },{
                 easing:"easeOutBack",
                 duration:300
             });
             $(".detail-closeinfo").click(function(event){
                 event.preventDefault();
                 $(".detail-info").velocity({opacity:0},{
                     duration:300,
                     complete:function(){
                         $(".page-overlay-info").css({
                             opacity:1,
                             display:"none"
                         })
                     }
                 });
             })
         }
    });
})





