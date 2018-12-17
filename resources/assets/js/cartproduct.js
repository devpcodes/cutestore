
//大圖載入完成後做淡入動畫
//$(".product-main-image img").css({opacity:0});
//$(".product-main-image img").load(function() {
//    $(".product-main-image img").velocity({
//        opacity: 1
//    },{
//        duration:500,
//        delay:300,
//        complete:function(){
//            $("#htmlpage").focus();
//            //$(".product-overlay-container").mCustomScrollbar({
//            //    theme:"dark-3", // 設定捲軸樣式
//            //    scrollbarPosition: "outside",
//            //    mouseWheel:{ scrollAmount: 100 },
//            //});
//        }
//    })
//});

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
//$('.poption').each(function( index ) {
//    optionJson[$(this).text()]=$(this).attr('default');
//});
$(".active.select").each(function(){
    optionJson[$(this).parent().attr("parent")]=$(this).text();
})
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
var rowid;

var oldVal;
$(".quantity").click(function(){
    oldVal = $(this).val();
})
var val;
$(".quantity").keyup(function(){
     val = $(this).val();
    if(!/^\d+$/.test(val)&&val!=""){
        $(this).val(oldVal);
        alert("請填入數字");
    }
})

$(".btn-addcart").click(function(event){
    if(val==""){
        qty = $(".quantity").attr("placeholder");
    }else{
        qty = $(".quantity").val();
    }
    if(qty==""){
        qty="1";
    }
    rowid = $(this).attr("rowid");
    event.preventDefault();
    $.ajax({
        type:'POST',
        data: {_token: CSRF_TOKEN, rowid:rowid, id: id, name: name, price: price, qty:qty, optionJson: opJson},
        url:'/cutestore/updatecartall',
        success:function(data){
            parentControll();
        }
    });
})
//更新serve成功後
function parentControll(){
    //更改被調整的細項
    for(var i=0; i<$(".ptr").length; i++){
        //alert($(this).attr("rowid"))
        if($(".ptr").eq(i).attr("rowid")==rowid){
            $(".ptr").eq(i).contents().find("input").val(qty);
            $(".ptr").eq(i).contents().find("p").remove();

            $(".ptr").eq(i).contents().find($(".product-remove")).attr("subtotal",qty*price);

            $(".ptr").eq(i).find($(".product-subtotal")).text("$"+String(qty*price));

            var optionsArr = JSON.parse ( opJson );
            $.each(optionsArr,function( key, value ) {
                if(key=="src"){

                }else{
                    $(".ptr").eq(i).contents().find(".desc").append("<p class='size'>"+key+"：<em>"+value+"</em></p>");
                }
            });
        }
    }
    //價格加總
    var subtotal = 0 ;
    var total = 0;
    for(var i=0; i<$('.product-subtotal').length;i++){
        var subNum = $('.product-subtotal').eq(i).text().slice(1);
        subtotal+=parseFloat(subNum);
    }
    total = parseFloat(subtotal+60);
    $(".subtotal").text("$"+subtotal);
    $(".total").text("$"+ total);


    //關閉
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
}



