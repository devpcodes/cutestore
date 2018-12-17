<!DOCTYPE html>
<html lang="zh-TW">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>Cutestore</title>
    <link rel="stylesheet" href="/css/font-awesome.css">
    <link rel="stylesheet" href="/css/all.css">

    <script src="/js/jquery-2.1.0.min.js"></script>
    <script src="/js/lib/velocity.min.js" type="text/javascript"></script>
    <script src="/js/lib/velocity.ui.min.js" type="text/javascript"></script>
</head>
<body>
<div class="wrapper">
    <header style="opacity: 1">
        <div class="header-inner">
            <div class="topline">
                <div class="topline-inner">
                    {{--<p class="email">info@gmail.com</p>--}}
                    <nav class="menu-user">
                        <h2>usermenu</h2>
                        <ul>
                            <li><i></i><a href="/cutestore/cart" class="cart">My Cart</a></li>
                            <li><i></i><a href="/cutestore/orderlist" class="order">訂單查詢</a></li>
                            {{--<li><i></i><a href="" class="account">會員中心</a></li>--}}
                            @if(Auth::check())
                                <li><i></i><a class="login">Hi,{{Auth::user()->name}}</a></li>
                                <li><i></i><a href="/cutestore/logout" class="account">登出</a></li>
                            @else
                                <li><i></i><a href="/cutestore/login" class="login">登入</a></li>
                                <a href="/cutestore/googlelogin" class="gplus">google</a>
                                <a href="/cutestore/facebooklogin" class="fb">Facdbook</a>
                            @endif
                        </ul>

                    </nav>
                </div>
            </div>
            <div class="topmenu">
                <p class="slogan">Alittlefable，一個手工製作的珠寶設計品牌創立於2014年2月，“花”,是我們的主要設計元素。</p>
                <h1 class="logo"><a href="/cutestore/">logo</a></h1>
                <input type="checkbox" id="nav-trigger" class="nav-trigger" />
                <label for="nav-trigger"><i class="fa fa-bars"></i></label>
                <nav class="menu-primary">
                    <h2>primarymenu</h2>
                    <ul>
                        <?php
                            $series = App\Series::select('id','name')->get();
                            //debug($series);
                        ?>
                        <li><a href="/cutestore/">HOME</a></li>
                        @if(isset($sId)&&$sId==0)
                            <li class="active"><a href="/cutestore/productlist">All</a></li>
                        @else
                            <li><a href="/cutestore/productlist">All</a></li>
                        @endif
                        @foreach($series as $serKey => $serValue)
                            @if(isset($sId)&&$sId==$serValue->id)
                                <li class="active"><a href="/cutestore/productseries/{{$serValue->id}}">{{$serValue->name}}</a></li>
                            @else
                                <li><a href="/cutestore/productseries/{{$serValue->id}}">{{$serValue->name}}</a></li>
                            @endif
                        @endforeach()
                        {{--<li><a href="">HOME</a></li>--}}
                        {{--<li><a href="productlist.html">時尚</a></li>--}}
                        {{--<li><a href="">小物</a></li>--}}
                        {{--<li><a href="">飾品</a></li>--}}
                        {{--<li><a href="">陶瓷</a></li>--}}
                        {{--<li><a href="">居家</a></li>--}}
                    </ul>
                </nav>
            </div>
        </div>
    </header>
    @yield('content')
</div>
<footer>
    {{--<div class="container">--}}
        {{--<div class="ft-logo">--}}
            {{--<h1><a href="index.html">logo</a></h1>--}}
            {{--<p class="slogan">Alittlefable，一個手工製作的珠寶設計品牌創立於2014年2月，“花”,是我們的主要設計元素。</p>--}}
        {{--</div>--}}
        {{--<div class="ft-contact">--}}
            {{--<h2>Contact</h2>--}}
            {{--<a href="#" class="fb"></a>--}}
            {{--<a href="" class="gplus"></a>--}}
            {{--<a href="" class="subs"></a>--}}
            {{--<p class="service">Service hours: <em>09:00 - 20:00</em></p>--}}
            {{--<a href="" class="phone">886-02-3456-1313</a>--}}
            {{--<p class="slogan">Alittlefable，一個手工製作的珠寶設計品牌創立於2014年。</p>--}}
        {{--</div>--}}
        {{--<div class="ft-join">--}}
            {{--<h2>Join  US</h2>--}}
            {{--<input type="text" placeholder="your@email.com">--}}
        {{--</div>--}}
    {{--</div>--}}
    <div class="copyright">
        {{--<ul>--}}
        {{--<li><a href="">About us</a></li>--}}
        {{--<li><a href="">Infomation</a></li>--}}
        {{--<li><a href="">Terms & Conditions </a></li>--}}
        {{--<li><a href="">Privacy Policy</a></li>--}}
        {{--<li><a href="">Sitemap</a></li>--}}
        {{--<li><a href="">Free Delivery</a></li>--}}
        {{--<li><a href="">Privacy</a></li>--}}
        {{--</ul>--}}
        <p>Alittlefable，一個手工製作的珠寶設計品牌創立於2014年2月，“花”,是我們的主要設計元素。</p>
        <p>© 2016 Copyright © 2016, A Little Fable - Handmade Designs.</p>
    </div>
</footer>
<script type="text/javascript" src="/js/index.js"></script>
</body>
</html>