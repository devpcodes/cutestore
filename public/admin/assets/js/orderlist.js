$(function(){
    $(".order-view").click(function(event){
        event.preventDefault();
        var ordno = $(this).attr("ordno");
        window.open("/cutestore/cartdone/"+ordno,'_blank');
        //document.location.href="/cutestore/cartdone/"+ordno;
    })
    $(".order-update").click(function(){
        var index = $(this).attr("key");
        $.ajax({
            url: "/cutestore/admin/updateorder",
            data: $('.order-form'+index).serialize(),
            type:"POST",
            //dataType:'json',
            success: function(msg){
                console.log(msg);
                if(msg=="OK"){
                    document.location.href="/cutestore/admin/orderlist";
                }
            },
            error:function(xhr, ajaxOptions, thrownError){
                alert(xhr.status);
                alert(thrownError);
            }
        });
    })

    $(".order-del").click(function(){
        var index = $(this).attr("key");
        $.ajax({
            url: "/cutestore/admin/delorder",
            data: $('.order-form'+index).serialize(),
            type:"POST",
            //dataType:'json',
            success: function(msg){
                console.log(msg);
                if(msg=="OK"){
                    document.location.href="/cutestore/admin/orderlist";
                }
            },
            error:function(xhr, ajaxOptions, thrownError){
                alert(xhr.status);
                alert(thrownError);
            }
        });
    })
})