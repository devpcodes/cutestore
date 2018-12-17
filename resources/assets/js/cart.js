$(".content").css({opacity:0});
$("nav").css({opacity:0});
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

    var rowid;
    var subtotal = ($(".hiddenSubtotal").val()?$(".hiddenSubtotal").val():0);
    var total = (subtotal?parseFloat(subtotal)+60:"0") ;
    (subtotal?$(".shipment").text("$60"):$(".shipment").text("$0"));
    $(".subtotal").text("$"+subtotal);
    $(".total").text("$"+ total);

    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
    $(".product-remove").click(function(event){
        event.preventDefault();
        rowid = $(this).attr('rowid');
        var $this = $(this);
        $.ajax({
            type:'POST',
            data: {_token: CSRF_TOKEN,rowid: rowid},
            url:'/cutestore/removecart',
            success:function(data){
                var key = $this.attr("key");
                subtotal -= $("."+key).attr('subtotal');
                $(".subtotal").text("$"+subtotal);
                if(subtotal==0){
                    total =0 ;
                }else{
                    total = parseFloat(subtotal)+60;
                }
                $(".total").text("$"+ total);
                $("."+key).velocity({
                    opacity:0
                },{
                    duration:700,
                    complete:function(){
                        $("."+key).remove();
                    }
                })
            }
        });
    })

    var oldVal;
    $(".qty").click(function(){
        oldVal = $(this).val();
    })
    $(".qty").keyup(function(){
        var val = $(this).val();
        if(!/^\d+$/.test(val)&&val!=""){
            $(this).val(oldVal);
            alert("請填入數字");
        }else{
            var $this = $(this);
            var key = $this.attr("key");
            var qty ;
            if(val==""){
                val = $(this).attr("placeholder");
                qty = $(this).attr("placeholder");
            }else{
                qty = $this.val();
            }
            var rowid = $this.attr("rowid");
            subtotal = 0 ;
            $(".s"+key).text("$"+String(val*$("."+key).text().slice(1)));
            for(var i=0; i<$('.product-subtotal').length;i++){
                var subNum = $('.product-subtotal').eq(i).text().slice(1);
                subtotal+=parseFloat(subNum);
            }
            total = parseFloat(subtotal+60);
            $(".subtotal").text("$"+subtotal);
            $(".total").text("$"+ total);
            $.ajax({
                type:'POST',
                data: {_token: CSRF_TOKEN,rowid: rowid, qty: qty},
                url:'/cutestore/updatecart',
                success:function(data){
                    //
                }
            });
        }
    })

    //點擊預覽產品
    $(".productview").click(function(event){
        var id = $(this).attr('productId');
        rowid = $(this).attr('rowid');
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
        $( ".htmlContent" ).load( "/cutestore/cartproduct/"+id+"/"+rowid,function(){
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
})

