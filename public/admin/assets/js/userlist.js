$(function(){
    $(".user-update").click(function(){
        var index = $(this).attr("key");
        $.ajax({
            url: "/cutestore/admin/updateuser",
            data: $('.user-form'+index).serialize(),
            type:"POST",
            //dataType:'json',
            success: function(msg){
                console.log(msg);
                if(msg=="OK"){
                    document.location.href="/cutestore/admin/userlist";
                }
            },
            error:function(xhr, ajaxOptions, thrownError){
                alert(xhr.status);
                alert(thrownError);
            }
        });
    })

    $(".user-del").click(function(){
        var index = $(this).attr("key");
        $.ajax({
            url: "/cutestore/admin/deluser",
            data: $('.user-form'+index).serialize(),
            type:"POST",
            //dataType:'json',
            success: function(msg){
                console.log(msg);
                if(msg=="OK"){
                    document.location.href="/cutestore/admin/userlist";
                }
            },
            error:function(xhr, ajaxOptions, thrownError){
                alert(xhr.status);
                alert(thrownError);
            }
        });
    })
})