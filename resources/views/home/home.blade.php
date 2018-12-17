@extends('layout.layout')
@section('content')
    <link rel="stylesheet" href="/css/core/index.css">
    <link rel="stylesheet" href="/css/media.css">
    <div class="banner" style="opacity: 0">
        <?php
            $adtopArray = json_decode($adtopArray);
            $imgArray = $adtopArray->images;
            $urlArray = $adtopArray->urls;
        ?>
        <div class="slide-wrap">
            <ul class="slide">
                @foreach($imgArray as $imgKey => $imgValue)
                    <li><a href="{{$urlArray[$imgKey]}}"><img src="{{$imgValue}}" alt=""></a></li>
{{--                <li><a href="{{$urlArray[$imgKey]}}"><img src="{{$imgValue}}" alt=""></a></li>--}}
                @endforeach
            </ul>
        </div>
        {{--<figure class="slide">--}}
            {{--@foreach($imgArray as $imgKey => $imgValue)--}}
                {{--<a href="{{$urlArray[$imgKey]}}"><img src="{{$imgValue}}" alt=""></a>--}}
            {{--@endforeach--}}
        {{--</figure>--}}

        <a href="" class="arrow-right"></a>
        <a href="" class="arrow-left"></a>
        <!-- <div class="arrow"></div> -->
        <div class="bullet-group">
            <ul>
                @foreach($imgArray as $imgKey => $imgValue)
                    <li><a href="" class="bullet">{{$imgKey+1}}</a></li>
                @endforeach
                {{--<li><a href="" class="bullet active">2</a></li>--}}
                {{--<li><a href="" class="bullet">3</a></li>--}}
                {{--<li><a href="" class="bullet">4</a></li>--}}
                {{--<li><a href="" class="bullet">5</a></li>--}}
            </ul>
        </div>
    </div>
    <?php
        $adcenterArray = json_decode($adcenterArray);
    ?>
    <div class="content">
        <div class="container">
            <div class="gdm">
                <div class="gdm-wrap-left">
                    <div class="gdm-block-wrap" style="opacity:0;">
                        <a href="{{$adcenterArray->urls[0]}}"><img src="{{$adcenterArray->images[0]}}" alt=""></a>
                    </div>
                </div>
                <div class="gdm-wrap-right">
                    <div class="gdm-block-inner">
                        <div class="gdm-block-wrap" style="opacity:0;">
                            <a href="{{$adcenterArray->urls[1]}}"><img src="{{$adcenterArray->images[1]}}" alt=""></a>
                        </div>
                        <div class="gdm-block-wrap" style="opacity:0;">
                            <a href="{{$adcenterArray->urls[2]}}"><img src="{{$adcenterArray->images[2]}}" alt=""></a>
                        </div>
                    </div>
                    <div class="gdm-block-wrap" style="opacity:0;">
                        <a href="{{$adcenterArray->urls[3]}}"><img src="{{$adcenterArray->images[3]}}" alt=""></a>
                    </div>
                </div>
            </div>
        </div>
        <nav class="menu-style" style="opacity: 0">
            <ul>
                <li><a class="hot" href="">熱門</a></li>
                <li><a class="news" href="">最新</a></li>
                {{--<li><a href="">Special</a></li>--}}
                {{--<li><a href="">Special</a></li>--}}
                {{--<li><a href="">Special</a></li>--}}
            </ul>
        </nav>
        <div class="product-list" style="opacity: 0">
            <!-- * * *item1 * * * -->
            @foreach($productLists as $productKey => $productValue)
                <?php
                    $img = json_decode( $productValue->images );
                    if(!empty($productValue->items)){
                        $options = json_decode( $productValue->items,true );
                    }
                ?>
                <div class="product-item p{{$productValue->id}}">
                    <figure class="product-image" style="opacity: 0">
                        <a><img src="{{$img->thumbImg}}" alt=""></a>
                    </figure>
                    <!-- <div class="product-desc"></div> -->
                    <div class="product-overlay">
                        <div class="product-decs">
                            <h3><a>{{$productValue->name}}</a></h3>
                            <p>{{$productValue->description1}}</p>
                            <p class="price">${{$productValue->price}}</p>
                            <a key="{{$productValue->id}}" href="#" class="add-cart"><i class="i-cart2"></i></a>
                            <a href="#" productId="{{$productValue->id}}" class="link-view"></a>
                        </div>
                    </div>
                    <input class="options" type="hidden" key="src" value="{{$img->thumbImg}}" />
                    @if(!empty($options))
                        @foreach($options as $opKey => $opValue)
                            <input class="options" type="hidden" key="{{strstr($opKey,'_',true)}}" value="{{$opValue[0]}}">
                        @endforeach
                    @endif
                </div>
            @endforeach

        </div><!-- .product-list end -->
        <div class="loadmore">
            <a href="/cutestore/productlist">Load more</a>
        </div>
    </div><!-- .content end -->
    <div class="page-overlay-info home-info" style="display: none">
        <h3>已添加成功</h3>
        <div class="page-overlay-info-action">
            <a class="btn btn-default home-closeinfo"><i class="fa fa-cart-arrow-down"></i>繼續購物</a>
            <a href="/cutestore/cart" class="btn btn-primary"><i class="fa fa-check-square-o"></i>前往購物車結帳</a>
        </div>
        <a href="#" class="close home-closeinfo">X</a>
    </div>
    <script src="/js/all/homeall.js" type="text/javascript"></script>
    {{--<script src="js/lib/jquery_ui/jquery.easing.1.3.js"></script>--}}
    {{--<script src="js/lib/jquery_ui/jquery-ui.min.js"></script>--}}
    {{--<script src="js/lib/jquery_ui/jquery.ui.touch-punch.js"></script>--}}
    {{--<script src="js/home/carousel.js" type="text/javascript"></script>--}}
    {{--<script src="js/lib/loading/jquery.center.js" type="text/javascript"></script>--}}
    {{--<script src="js/lib/loading/jquery.loading.js" type="text/javascript"></script>--}}
    {{--<script src="js/home/home.js" type="text/javascript"></script>--}}
    {{--<script src="js/fastaddcart.js" type="text/javascript"></script>--}}
@stop

