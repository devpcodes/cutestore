/*
<div class="drop" style="background-color: #c9c9c9;display:block; width:100%;height: 100px; border:1px; text-align: center;line-height: 100px; color: #e5e5e5">
    上傳作用區
</div>
<div id="progress">
    <div class="bar" style="width:0%; height: 2px; background-color: #37b4ba;"></div>
    <div class="item"></div>
</div>
<input type="file" id="fileupload" name="img" multiple />
<button type="button" class="btn btn-primary pull-right startupload">上傳</button>
*/
var maxItem = 4;//最大上傳數
var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
$(function(){
    var $start = $(".startupload");//上傳按鈕
    var $fileUpload = $('#fileupload');//選擇檔案按鈕
    var $drop = $('.drop');//滑入區域
    var dataArray = new Array();
    var uploadPath = "/cutestore/admin/uploadimg";//php上傳處理
    var delPath = "/cutestore/admin/delimg";//php刪除處理 限returnPath為true
    var returnPath = true;//後台有回傳路徑為true 且為bigPath,thumbPath
    //====以下程式羅輯
    var fileNum;
    var z=0;
    var nowBigPath;
    var nowThumbPath;
    $fileUpload.fileupload({
        dropZone: $drop,	//拖曳上傳區域
        url: uploadPath,		//上傳處理的PHP
        dataType: 'json',
        limitConcurrentUploads:maxItem,//每次同時最大上傳數是
        //將要上傳的資料顯示
        add: function (e, data) {
            //========================限制=============================
            var acceptFileTypes = /^image\/(gif|jpe?g|png)$/i;
            if(data.originalFiles[0]['type'].length && !acceptFileTypes.test(data.originalFiles[0]['type'])) {
                alert('Not an accepted file type');
                return;
            }
            //10M
            if(data.originalFiles[0]['size'] > 10000000) {
                alert('Filesize is too big');
                return;
            }
            //=========================================================
            dataArray.push(data);
            if(dataArray.length>maxItem){
                dataArray.splice(maxItem,1);
                alert("超過限制張數");
                return false;
            }
            data.num=z;
            data.fileType="yes";
            //console.log(data);
            var tpl = $('<div class="working" style="width:100%"><img class="preview img-thumbnail" src="" style="margin: 10px 0;width: 70px;height: 70px;"><span style="margin-left: 10px;" class="info"></span><span style="margin-left: 20px" class="pro" /><span style="cursor: pointer;line-height: 90px; clear: both" num='+z+' key='+data.num+' class="ctrl pull-right"><i style="color: #464646" class="fa fa-times"></i></span></div>');
            tpl.find('.info').text(data.files[0].name);
            //=========================縮圖預覽==============================
            if (data.files && data.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    for(var u=0; u <= $(".ctrl").length-1;u++){
                        if(data.num==$('.ctrl').eq(u).attr('num')){
                            $('.ctrl').eq(u).siblings('.preview').attr('src', e.target.result);
                        }
                    }
                }
                reader.readAsDataURL(data.files[0]);
            }
            data.context = tpl.appendTo($(".item"));
            //===========================================================
            z++;
            //===========================取消======================================
            tpl.find('.ctrl').click(function(){
                fileNum = $(this).attr('num');
                tpl.fadeOut(function(){

                    for (var k = 0; k <= dataArray.length - 1; k++) {
                        if(dataArray[k].num==fileNum){
                            dataArray[k].abort();
                            dataArray[k].fileType='no';
                            dataArray.splice(k,1);
                        }
                    };
                    //===========刪遠端====================
                    if(returnPath==true){
                        var bigPath = tpl.find('.ctrl').attr("bigPath");
                        var thumbPath = tpl.find('.ctrl').attr("thumbPath");
                        if(bigPath!=""&&bigPath!=undefined){
                            $.ajax({
                                url: delPath,
                                data: "bigPath="+bigPath+"&thumbPath="+thumbPath+"&_token="+CSRF_TOKEN,
                                type:"POST",
                                success: function(msg){
                                    alert(msg);
                                },
                                error:function(xhr, ajaxOptions, thrownError){
                                    alert(xhr.status);
                                    alert(thrownError);
                                }
                            });
                        }
                    }
                    //===================================
                    tpl.remove();
                });
            });
            //====================================================================
            //執行 data.submit() 開始上傳
            $start.click(function() {
                //jqXHR = data.submit();
                //console.log(data);
                //data.submit();
                for (var i = 0; i <= dataArray.length - 1; i++) {
                    if(dataArray[i].fileType!="no"){
                        dataArray[i].submit();
                    }
                };
            });
        },

        //單一檔案進度
        progress: function(e, data){
            var progress = parseInt(data.loaded / data.total * 100, 10);
            data.context.find('.pro').text(progress+"%　　").change();
            if(progress == 100){
                data.context.removeClass('working');
            }
        },

        //整體進度
        progressall: function (e, data) {
            var progress = parseInt(data.loaded / data.total * 100, 10);
            $('#progress .bar').css('width', progress + '%');
            //$('#progress .bar').text(progress + '%');
        },

        //上傳失敗
        fail:function(e, data){
            data.context.addClass('error');
        },

        //單一檔案上傳完成
        done: function (e, data) {
            for (var j = 0; j <= dataArray.length - 1; j++) {
                if(data.num==dataArray[j].num){
                    dataArray[j].fileType='no';
                }
            };
            var tmp = data.context.find('.pro').text();
            //data.context.find('.pro').text(tmp + data.result.status + "　　");
            data.context.find('.pro').text(tmp + "success");

            console.log(data.num);
            if(returnPath==true){
                for(var i=0; i<$(".ctrl").length; i++){
                    if($(".ctrl").eq(i).attr('key')==data.num){
                        $(".ctrl").eq(i).attr("bigPath",nowBigPath);
                        $(".ctrl").eq(i).attr("thumbPath",nowThumbPath);
                    }
                }
            }
        },

        //全部上傳完畢
        stop: function (e,data) {
            $('#progress .bar').css('width', 0);
            $('#progress .bar').text('');
            //data.fileType="no";
            alert("上傳完畢");
        },
        success: function(msg){
            console.log(msg);
            if(returnPath==true){
                nowBigPath = msg.bigPath;
                nowThumbPath = msg.thumbPath;
            }
            //流程為success->done->stop  ...
        }
    });

    //拖曳成功讓框變色
    $drop.bind({
        dragenter: function() {
            $(this).addClass("active");
        },
        dragleave: function() {
            $(this).removeClass("active");
        }
    });
})

