$(function(){
    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
    $(".product-update").click(function(event){
        event.preventDefault();
        var index = $(this).attr("key");
        $.ajax({
            url: "/cutestore/admin/updateproduct",
            data: $('.product-form'+index).serialize()+"&_token="+CSRF_TOKEN,
            type:"POST",
            //dataType:'json',
            success: function(msg){
                console.log(msg);
                if(msg=="OK"){
                    document.location.href="/cutestore/admin/productlist";
                }
            },
            error:function(xhr, ajaxOptions, thrownError){
                alert(xhr.status);
                alert(thrownError);
            }
        });
    })

    $(".product-del").click(function(event){
        event.preventDefault();
        var index = $(this).attr("key");
        $.ajax({
            url: "/cutestore/admin/delproduct",
            data: $('.product-form'+index).serialize()+"&_token="+CSRF_TOKEN,
            type:"POST",
            //dataType:'json',
            success: function(msg){
                console.log(msg);
                if(msg=="OK"){
                    document.location.href="/cutestore/admin/productlist";
                }
            },
            error:function(xhr, ajaxOptions, thrownError){
                alert(xhr.status);
                alert(thrownError);
            }
        });
    })

    $(".product-view").click(function(event){
        event.preventDefault();
        var id = $(this).attr("key");
        document.location.href="/cutestore/admin/productdetail/"+id;
    })
})