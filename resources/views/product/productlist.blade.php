@extends('layout.layout')
@section('content')
    <link rel="stylesheet" href="/css/core/productlist.css">
    <link rel="stylesheet" href="/css/media.css">
    @include('nav.nav')
   {{--<nav class="menu-breadcrumb">--}}
        {{--<ul>--}}
            {{--<li><a href="">Home</a></li>--}}
            {{--<li><a href="">Store</a></li>--}}
            {{--<li><a href="" class="active">{{$seriesName}}</a></li>--}}
        {{--</ul>--}}
    {{--</nav>--}}
    <div class="content" style="opacity: 0;">
        <div class="container">
            @include('right.right')
            <div class="product-list-container">
                <div class="list-view-sorting">
                    <div class="list-sorting">
                        <select name="" id="" class="form-control orderBySelect">
                            {{--<option value="created_at" selected>排序依：Default </option>--}}
                            <option value="view">熱門</option>
                            <option selected value="created_at">最新</option>
                            <option value="price">價錢</option>
                        </select>
                    </div>
                    <div class="list-view">
                        <select name="" id="" class="form-control pageItems">
                            <option value="15" selected>顯示：15筆</option>
                            <option value="30">顯示：30筆</option>
                            <option value="45">顯示：45筆</option>
                        </select>
                    </div>
                </div>
                <div class="product-list">
                    <!-- * * *item1 * * * -->
                    @foreach($productList as $proKey => $productValue)
                        <?php
                            $img = json_decode( $productValue->images );
                            if(!empty($productValue->items)){
                                $options = json_decode( $productValue->items,true );
                            }
                        ?>
                    <div class="product-item p{{$productValue->id}}">
                        <div class="product-item-wrap">
                            <figure class="product-image">
                                <a href="#"><img src="{{$img->thumbImg}}" alt=""></a>
                            </figure>
                            <!-- <div class="product-desc"></div> -->
                            <div class="product-overlay">
                                <div class="overlay-btn">
                                    <a key="{{$productValue->id}}" href="#" class="add-cart"><i class="i-cart2"></i></a>
                                    <a href="#" productId="{{$productValue->id}}" class="link-view"></a>
                                </div>
                            </div>
                        </div>
                        <div class="product-decs">
                            <h3><a href="">{{$productValue->name}}</a></h3>
                            <p>{{$productValue->description1}}</p>
                            <p class="price">${{$productValue->price}}</p>
                        </div>
                            <input class="options" type="hidden" key="src" value="{{$img->thumbImg}}" />
                        @if(!empty($options))
                            @foreach($options as $opKey => $opValue)
                                <input class="options" type="hidden" key="{{strstr($opKey,'_',true)}}" value="{{$opValue[0]}}">
                            @endforeach
                        @endif
                    </div>
                    @endforeach
                </div> <!-- .product-list end -->
                <div class="pagination-container">{!! $productList->appends(['order'=>$order,'items'=>$items])->render() !!}</div>
            </div> <!-- .product-list-container end -->
        </div> <!-- .container end -->
        <div class="page-overlay-info home-info" style="display: none">
            <h3>已添加成功</h3>
            <div class="page-overlay-info-action">
                <a class="btn btn-default home-closeinfo"><i class="fa fa-cart-arrow-down"></i>繼續購物</a>
                <a href="/cutestore/cart" class="btn btn-primary"><i class="fa fa-check-square-o"></i>前往購物車結帳</a>
            </div>
            <a href="#" class="close home-closeinfo">X</a>
        </div>
        {{--<div class="loadmore"><a href="#" class="">Load More</a>	</div>--}}
    </div><!-- .content end -->

    <script src="/js/lib/lazyload/jquery.lazyload.min.js" type="text/javascript"></script>
    <script src="/js/lib/loading/jquery.center.js" type="text/javascript"></script>
    <script src="/js/lib/loading/jquery.loading.js" type="text/javascript"></script>
    <script src="/js/lib/mobiletest.js"></script>
    <script src="/js/productlist.js" type="text/javascript"></script>
    <script src="/js/fastaddcart.js" type="text/javascript"></script>
@stop