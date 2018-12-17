$(".content").css({opacity:0});
$("nav").css({opacity:0});
$(function(){
    $("nav").velocity({
        opacity:1
    },{
        duration:1000,
        delay:500
    })
    $(".content").velocity({
        opacity:1
    },{
        duration:1000,
        delay:500
    })
})

$(".pay").click(function(event){
    event.preventDefault();
    if(check()==false){
        return;
    }
    var pay_type = $(this).attr("paytype");
    event.preventDefault();
    $(".paytype").val(pay_type);

    $.ajax({
        url: "/cutestore/delcart",
        data: "_token="+CSRF_TOKEN,
        type:"POST",
        success: function(msg){
            if(msg=="OK"){
                document.payform.submit();
            }
        },
        error:function(xhr, ajaxOptions, thrownError){
            alert(xhr.status);
            alert(thrownError);
        }
    });


    //document.payform.submit();
})

var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
$(".update").click(function(event){
    event.preventDefault();
    if(check()==false){
        return;
    }
    $.ajax({
        url: "/cutestore/saveorder",
        data: $('.form-horizontal').serialize()+"&_token="+CSRF_TOKEN,
        type:"POST",
        //dataType:'json',
        success: function(msg){
            if(msg=="OK"){
                alert("更新成功");
            }
        },
        error:function(xhr, ajaxOptions, thrownError){
            alert(xhr.status);
            alert(thrownError);
        }
    });
})
$(".aaa").change(function(){
    if($(".aaa").prop('checked')==true){
        $.ajax({
            url: "/cutestore/loadorder",
            data: "_token="+CSRF_TOKEN,
            type:"POST",
            dataType:'json',
            success: function(msg){
                $(".pname").val(msg[0].name);
                $(".pphone").val(msg[0].phone);
                $(".pemail").val(msg[0].email);
                $(".paddress").val(msg[0].address);
            },
            error:function(xhr, ajaxOptions, thrownError){
                alert(xhr.status);
                alert(thrownError);
            }
        });
    }else{
        $(".pname").val("");
        $(".pphone").val("");
        $(".pemail").val("");
        $(".paddress").val("");
    }
})

