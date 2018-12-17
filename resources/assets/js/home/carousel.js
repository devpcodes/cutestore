//css 圖片設定自動縮放
//html基本架構
//<div class="slide-wrap">
//    <ul class="slide">
//    <li><a href="/xxx"><img src="images/xxx.jpg" alt=""></a></li>
//    <li><a href="/xxx"><img src="images/xxx.jpg" alt=""></a></li>
//    <li><a href="/xxx"><img src="images/xxx.jpg" alt=""></a></li>
//</ul>
//</div>

$win = $(window);
$win.load(function(){
    var $btn=$(".bullet-group li");//小icon按鈕
    var $right = $(".arrow-right");//下一張按鈕
    var $left = $(".arrow-left");//上一張按鈕
    var $target=$(".slide");//要移動的元素
    var activeMove=200;//拖動多遠觸發換圖
    var tweenTime = 1000;//動畫時間
    var timer=4000;//輪播切換時間
    var $targetParent = $(".slide-wrap");
    var winResizeWidth = 1171;//要開始縮放的寬度
    var resizePercent = "100%";//圖片縮放的比例

    //=============程式設定=========================
    var moveWidth;//一次位移量
    var nowX;
    var current=0;//目前第幾個card
    var dragBoolean=true;
    var dragMove=0;//拖動量
    var childNum=$target.children().length;
    var timeoutHandle = null;
    timeoutHandle = setTimeout(auto, timer);

    $target.css('width',99999);
    var oldWidth = $target.find('img').width();
    moveWidth = oldWidth;
    $win.resize(function() {
        if($win.innerWidth()<=winResizeWidth){
            $target.find('img').css('width', $win.innerWidth());
            $targetParent.css({"width":resizePercent,"margin":"0 auto"});
            moveWidth = $win.innerWidth();
            $target.velocity({left:-(moveWidth*current)},0)
        }else{
            $target.find('img').css('width',oldWidth);
            $targetParent.css({"width":"100%","margin":"0 auto"});
            moveWidth = oldWidth;
            $target.velocity({left:-(moveWidth*current)},0)
        }
    }).resize();

    //icon點擊
    $btn.click(function(event){
        event.preventDefault();
        clearTimeout(timeoutHandle);
        timeoutHandle = setTimeout(auto, timer);
        $btn.find("a").css({"background-color": "#ffffff"})
        $(this).find("a").css({"background-color": "#A391BB"})
        //$btn.find("a").removeClass('bullet-active');
        //$(this).find("a").addClass('bullet-active');
        if($(this).index()==current){
            return false;
        }
        current=$(this).index();
        $target.velocity({left:-(moveWidth*current)},tweenTime)
    })
    $btn.eq(0).find("a").css({"background-color": "#A391BB"})
    function btnActive(){
        $btn.find("a").css({"background-color": "#ffffff"});
        for(var i=0; i<=$btn.length; i++){
            if(current == $btn.eq(i).index()){
                $btn.eq(i).find("a").css({"background-color": "#A391BB"})
            }
        }
    }


    //下一張按鈕點擊
    $right.click(function(event){
        event.preventDefault();
        clearTimeout(timeoutHandle);
        if(current==childNum-1){
            current=0;
        }else{
            current+=1;
        }
        btnActive();
        $target.velocity({left:-(moveWidth*current)},{
            duration:tweenTime,
            complete:function(){
                clearTimeout(timeoutHandle);
                timeoutHandle = setTimeout(auto, timer);
            }
        })
    })
    //上一張按鈕點擊
    $left.click(function(event){
        event.preventDefault();
        clearTimeout(timeoutHandle);
        timeoutHandle = setTimeout(auto, timer);
        if(current==0){
            current=childNum-1;
        }else{
            current-=1;
        }
        btnActive();
        $target.velocity({left:-(moveWidth*current)},{
            duration:tweenTime,
            complete:function(){
                clearTimeout(timeoutHandle);
                timeoutHandle = setTimeout(auto, timer);
            }
        })
    })
    //滑入廣告暫停輪播，滑出繼續輪播
    $target.mouseover(function(){
        clearTimeout(timeoutHandle);
    })
    $target.mouseout(function(){
        timeoutHandle = setTimeout(auto, timer);
    })
    //自動輪播fun
    function auto(){
        clearTimeout(timeoutHandle);
        if(current==childNum-1){
            current=0;
        }else{
            current+=1;
        }
        btnActive();
        // 捲動 $block 的 scrollTop
        $target.velocity({left:-(moveWidth*current)},{
            duration:tweenTime,
            complete:function(){
                clearTimeout(timeoutHandle);
                timeoutHandle = setTimeout(auto, timer);
            }
        })
    }

    //drag控制
    $target.draggable({
        start:function(){
            nowX= $target.offset().left;
            clearTimeout(timeoutHandle);
        },
        cursor: "move",
        axis: "x" ,
        stop:function(){
            dragMove=nowX-$target.offset().left;
            if(dragMove>=activeMove){
                if(current==childNum-1){
                    $target.animate({
                        left:-(moveWidth*current)
                    },300,"easeOutCubic",function(){
                        //clearTimeout(timeoutHandle);
                    })
                    current=childNum-1;
                    btnActive();
                    return;
                }else{
                    current+=1;
                    btnActive();
                }
                $target.animate({
                    left:"-="+(moveWidth*1-dragMove)
                },500,"easeOutCubic",function(){
                    //clearTimeout(timeoutHandle);
                })
            }else if(dragMove<-activeMove){
                if(current==0){
                    $target.animate({
                        left:0
                    },300,"easeOutCubic",function(){
                        //clearTimeout(timeoutHandle);
                     })
                    current=0;
                    btnActive();
                    return;
                }else{
                    current-=1;
                    btnActive();
                }
                $target.animate({
                    left:"+="+(moveWidth*1+dragMove)
                },500,"easeOutCubic",function(){
                    //clearTimeout(timeoutHandle);
                })
            }else{
                $target.animate({
                    left:-(moveWidth*current)
                },300,"easeOutCubic",function(){
                    //clearTimeout(timeoutHandle);
                })
            }
        }
    });
})
