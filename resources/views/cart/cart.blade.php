@extends('layout.layout')
@section('content')
    <link rel="stylesheet" href="/css/core/shop-cart.css">
    <link rel="stylesheet" href="/css/media.css">
    <nav class="menu-breadcrumb" style="opacity: 0">
        <ul>
            <li><a href="/cutestore">Home</a></li>
            <!-- <li><a href="">購物車</a></li> -->
            <li><a href="" class="active">購物車</a></li>
        </ul>
    </nav>
    <div class="content" style="opacity: 0">
        <div class="container">
            <div class="shop-cart-table-wrapper">
                <table class="">
                    <thead>
                    <tr>
                        <th style="width:50% ;" class="center">No.商品名稱</th>
                        <th style="width:15%;" class="center">單價</th>
                        <th style="width:15%;" class="center">數量</th>
                        <!-- <th style="width: 20px;" class="center">折扣</th> -->
                        <th style="width:15%;" class="center">小計</th>
                        <th>刪除</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $index=0;?>
                    @foreach($cart as $row)
                    <tr rowid="{{$row->rowid}}" class="l{{$index}} ptr" subtotal="{{$row->subtotal}}">
                        <td>
                            <div class="media">
                                <a rowid="{{$row->rowid}}" productId="{{$row->id}}"  class="productview" href=""><img src="{{$row->options->src}}" alt=""></a>
                                <div class="desc">
                                    <a href="" ><h2 rowid="{{$row->rowid}}" productId="{{$row->id}}" class="productview">{{$row->name}}</h2></a>
                                    @foreach($row->options as $opKey => $opValue)
                                        @if($opKey=='src')
                                        @else
                                            <p class="size">{{$opKey}}：<em>{{$opValue}}</em></p>
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                        </td>
                        <td class="s{{$index}}">${{$row->price}}</td>
                        <td><input rowid="{{$row->rowid}}" key="s{{$index}}" class="qty" type="text" placeholder="1" value="{{$row->qty}}"></td>
                        <td class="product-subtotal ss{{$index}}">${{$row->subtotal}}</td>
                        <td> <a rowid="{{$row->rowid}}"  key="l{{$index}}" href="" subtotal="{{$row->subtotal}}" class="product-remove">X</a></td>
                        <input name="subtotal" class="hiddenSubtotal" type="hidden" value="{{$subtotal}}">
                    </tr>
                    <?php $index++?>
                    @endforeach
                    {{--<tr>--}}
                        {{--<td>--}}
                            {{--<div class="media">--}}
                                {{--<a href=""><img src="images/gdm1.png" alt=""></a>--}}
                                {{--<div class="desc">--}}
                                    {{--<a href=""><h2>蕾絲拼接袖領邊腰部綁帶洋裝</h2></a>--}}
                                    {{--<p class="size">尺寸：<em>XS</em></p>--}}
                                    {{--<p class="color">顏色：<em>白</em></p>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                        {{--</td>--}}
                        {{--<td>$124<em class="del">$300</em></td>--}}
                        {{--<td><input type="text" placeholder="1"></td>--}}
                        {{--<td class="product-subtotal">$124</td>--}}
                        {{--<td> <a href="" class="product-remove">X</a></td>--}}
                    {{--</tr>--}}
                    </tbody>
                </table>
            </div>
            <div class="shop-total-price-wrapper">
                <a href="/cutestore/productlist" class="btn btn-default back-to-shop"><i class="fa fa-cart-arrow-down"></i>繼續購物</a>
                <table class="table">
                    <tbody>
                    <tr>
                        <td class="right">小計：</td>
                        <td class="right strong subtotal"></td>
                    </tr>
                    <tr>
                        <td class="right">運費：</td>
                        <td class="right strong shipment">$60</td>
                    </tr>
                    {{--<tr>--}}
                        {{--<td class="right">稅：</td>--}}
                        {{--<td class="right strong">$11</td>--}}
                    {{--</tr>--}}
                    <tr>
                        <td colspan="2">
                            <!-- <div class="separator bottom"></div> -->
                            <span class="">總計　Total： <em class="product-totalprice total"></em></span>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2"><button type="submit" class="btn btn-primary submitBtn" value="shop-checkout.html"><i class="fa fa-check-square-o"></i>直接結帳</button></td>
                    </tr>
                    </tbody>
                </table>
            </div>
            {{--onclick="location.href = '/cutestore/payment'"--}}

        </div><!-- .container end -->
    </div><!-- .content end -->
    <script src="/js/lib/loading/jquery.center.js" type="text/javascript"></script>
    <script src="/js/lib/loading/jquery.loading.js" type="text/javascript"></script>
    <script src="/js/cart.js" type="text/javascript"></script>
@stop