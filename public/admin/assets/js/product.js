$(function(){
    $('.js-example-basic-multiple').select2({
        tags:[],
        maximumInputLength: 20
    });

    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
    $(".series-delete").click(function(event){
        event.preventDefault();
        var index = $(this).attr("key");
        $.ajax({
            url: "/cutestore/admin/delseries",
            data: $('.series-control'+index).serialize()+"&_token="+CSRF_TOKEN,
            type:"POST",
            //dataType:'json',
            success: function(msg){
                console.log(msg);
                if(msg=="OK"){
                    document.location.href="/cutestore/admin/addproduct";
                }
            },
            error:function(xhr, ajaxOptions, thrownError){
                alert(xhr.status);
                alert(thrownError);
            }
        });
    })

    $(".series-update").click(function(event){
        event.preventDefault();
        var index = $(this).attr("key");
        $.ajax({
            url: "/cutestore/admin/updateseries",
            data: $('.series-control'+index).serialize()+"&_token="+CSRF_TOKEN,
            type:"POST",
            //dataType:'json',
            success: function(msg){
                console.log(msg);
                if(msg=="OK"){
                    document.location.href="/cutestore/admin/addproduct";
                }
            },
            error:function(xhr, ajaxOptions, thrownError){
                alert(xhr.status);
                alert(thrownError);
            }
        });
    })

    $(".categories-delete").click(function(event){
        event.preventDefault();
        var key = $(this).attr("key");
        $.ajax({
            url: "/cutestore/admin/delcategories",
            data: $('.'+key).serialize()+"&_token="+CSRF_TOKEN,
            type:"POST",
            success: function(msg){
                console.log(msg);
                if(msg=="OK"){
                    document.location.href="/cutestore/admin/addproduct";
                }
            },
            error:function(xhr, ajaxOptions, thrownError){
                alert(xhr.status);
                alert(thrownError);
            }
        });
    })

    $(".categories-update").click(function(event){
        event.preventDefault();
        var key = $(this).attr("key");
        $.ajax({
            url: "/cutestore/admin/updatecategories",
            data: $('.'+key).serialize()+"&_token="+CSRF_TOKEN,
            type:"POST",
            success: function(msg){
                console.log(msg);
                if(msg=="OK"){
                    document.location.href="/cutestore/admin/addproduct";
                }
            },
            error:function(xhr, ajaxOptions, thrownError){
                alert(xhr.status);
                alert(thrownError);
            }
        });
    })
//===============================================================
    //新增規格區
    $(".add-specification").click(function(){
        $(".specification-container").append('<div class="col-md-4">' +
                '<h5>商品規格</h5>' +
            '</div>' +
            '<div class="col-md-8">' +
                '<div class="form-group">' +
                    '<input type="text" class="form-control specification" id="exampleInputEmail3" placeholder="規格名稱">' +
                '</div>' +
            '</div>' +
            '<div class="col-md-4">' +
                '<h5>規格選項</h5>' +
            '</div>' +
            '<div class="col-md-8">' +
                '<div class="form-group">' +
                    '<select name="tag_list[]" id="tag_list" class="specification-item form-control js-example-basic-multiple" multiple="multiple">' +
                        '<option value=""></option>' +
                    '</select>' +
                '</div>' +
            '</div>' +
            '<div class="col-md-4">' +
                '<h5>規格樣式</h5>' +
            '</div>' +
            '<div class="col-md-8">' +
                '<select class="form-control input-sm m-bot15 specification-class">' +
                    '<option selected value="size">size</option>' +
                    '<option value="color">color</option>' +
                '</select>' +
                '<br>' +
            '</div>' +
            '<div class="col-md-4" style="display: block; height: 50px; width: 100%;"></div>');

        $('.js-example-basic-multiple').select2({
            tags:[],
            maximumInputLength: 20
        });
    })


    $(".addproduct").click(function(event){
        event.preventDefault();
        var error=[];
        //整理圖片路徑成json
        if($(".ctrl").length>0){
            var imgJson= new Object();
            var bigPathArr = [];
            for(var i=0; i<$(".ctrl").length; i++){
                var str = $(".ctrl").eq(i).attr("bigPath");
                if(typeof str !== typeof undefined && str !== false){
                    var allPath = str.split("/");
                    allPath = allPath.splice(4,allPath.length);
                    allPath = allPath.join("/");
                    bigPathArr.push("/"+allPath);
                }else{
                    //alert("資料未完整");
                    //return;
                    //error.push("error");
                }
            }

            var thumbstr = $(".ctrl").eq(0).attr("thumbPath");
            var allthumbPath = thumbstr.split("/");
            allthumbPath = allthumbPath.splice(4,allthumbPath.length);
            allthumbPath = allthumbPath.join("/");

            imgJson["thumbImg"] = "/"+allthumbPath;
            imgJson["detailImg"] = bigPathArr;
            var imageJsonStr=JSON.stringify(imgJson);
            console.log(imageJsonStr);
        }else{
            //error.push("error");
        }

        //整理規格內容成json
        var itemJsonStr;
        if($(".specification").length>=1&&$(".specification").eq(0).val()!=""){
            var itemJson= new Object();
            var $opItem;
            for(var j=0; j<$(".specification").length; j++){
                var itemArr = [];
                var specification = $(".specification").eq(j).val();

                for(var k=0; k<$(".specification-item").eq(j).find("option").length; k++){
                    $opItem = $(".specification-item").eq(j).find("option");
                    if($opItem.eq(k).val()!=""){
                        itemArr.push($opItem.eq(k).val());
                    }
                }
                var style = $(".specification-class :selected").eq(j).attr('value');
                itemJson[specification+"_"+style] = itemArr;
                if(itemArr.length==0){
                    error.push("error");
                }
            }
            itemJsonStr=JSON.stringify(itemJson);
            console.log(itemJsonStr);
        }else if($(".specification").val()==""&& $(".specification-item").find("option").val()==""){

        }else{
            error.push("error");
        }
        if(error.length>0){
            alert("資料未完整");
        }else{
            for (instance in CKEDITOR.instances) {
                CKEDITOR.instances[instance].updateElement();
            }
            $.ajax({
                url: "/cutestore/admin/insertproduct",
                data: $('.addProduct').serialize()+"&images="+imageJsonStr+"&items="+itemJsonStr+"&_token="+CSRF_TOKEN,
                type:"POST",
                dataType: 'json',
                success: function(msg){
                    console.log(msg);
                    document.location.href="/cutestore/admin/addproduct";
                },
                error:function(xhr, ajaxOptions, thrownError){
                    alert(xhr.status);
                    alert(thrownError);
                }
            });
        }
    })

})