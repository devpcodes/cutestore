var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
$(".add-cart").bind('click',addCart);
function addCart(event) {
    var optionJson= new Object();
    event.preventDefault();
    var id = $(this).attr("key");
    var name = $(".p"+id).contents().find($("h3 a")).text();
    var price = $(".p"+id).contents().find($(".price")).text();
    price = price.slice(1);
    var opLength = $(".p"+id).find($(".options")).length;//有幾個細項
    $op = $(".p"+id).find($(".options"));
    for(var i=0; i<opLength; i++){
        optionJson[$op.eq(i).attr("key")]=$op.eq(i).val();
    }
    var opJson=JSON.stringify(optionJson);
    //console.log(id+":"+name+","+price+","+opJson);
    $.ajax({
        type: 'POST',
        data: {_token: CSRF_TOKEN, id: id, name: name, price: price, qty: 1, optionJson: opJson},
        url: '/cutestore/addcart',
        success: function (data) {
            $(".home-info").centerScroll();
            $(".home-info").css({
                display:"block"
            })
            $(".home-info").velocity({
                opacity:[1,0]
            },{
                duration:300
            });
        }
    });
}
$(".home-closeinfo").click(function(event){
    event.preventDefault();
    $(".home-info").velocity({opacity:0},{
        duration:300,
        complete:function(){
            $(".page-overlay-info").css({
                opacity:1,
                display:"none"
            })
        }
    });
})