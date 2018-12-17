<!------------------------- SIDEBAR - START ------------------------------------->
<div class="page-sidebar ">
    <!-- MAIN MENU - START -->
    <div class="page-sidebar-wrapper" id="main-menu-wrapper">
        <!-- USER INFO - START -->
        <div class="profile-info row">
            <div class="profile-image col-md-4 col-sm-4 col-xs-4">
                <a>
                    <img src="/cutestore/public/uploads/Admin_14589080722274.jpg_wh300.jpg" class="img-responsive img-circle">
                </a>
            </div>

            <div class="profile-details col-md-8 col-sm-8 col-xs-8">

                <h3>
                    <a>{{Auth::user()->name}}</a>

                    <!-- Available statuses: online, idle, busy, away and offline -->
                    <span class="profile-status online"></span>
                </h3>

                <p class="profile-title">web supervisor</p>

            </div>

        </div>
        <!-- USER INFO - END -->



        <ul class='wraplist'>

            <!-- 1 控制台 -->
            <!--<li class="open">-->
            <!--<a href="javascript:;">-->
            <!--<i class="fa fa-dashboard"></i>-->
            <!--<span class="title">1 控制台　Dashboard</span><span class="arrow "></span>-->
            <!--<span class="label label-orange"></span></a>-->
            <!--<ul class="sub-menu" >-->
            <!--<li>-->
            <!--<a class="" href="admin-1-0_index.html">1-0 控制台首頁</a>-->
            <!--</li>-->
            <!--<li>-->
            <!--<a class="" href="admin-1-1_loginRecord.html">1-1 登入者記錄</a>-->
            <!--</li>-->
            <!--<li>-->
            <!--<a class="" href="admin-1-3_config.html">1-2 系統參數設定</a>-->
            <!--</li>-->
            <!--<li>-->
            <!--<a class="" href="admin-1-3_config.html">1-3 網站設定</a>-->
            <!--</li>                               -->
            <!--<li>-->
            <!--<a class="" href="admin-1-4_accountSet.html">1-4 管理者帳號設定</a>-->
            <!--</li>-->
            <!--<li>-->
            <!--<a class="" href="admin-1-4_accountSet.html">1-5 管理者權限</a>-->
            <!--</li>-->
            <!--</ul>-->
            <!--</li>-->

            <!-- 2 文章管理 -->
            <!--<li class="open">-->
            <!--<a href="javascript:;">-->
            <!--<i class="fa fa-dashboard"></i>-->
            <!--<span class="title">2 文章管理　Article</span><span class="arrow "></span>-->
            <!--<span class="label label-orange"></span></a>-->
            <!--<ul class="sub-menu" >-->
            <!--<li>-->
            <!--<a class="" href="admin-2-1_articleAdd.html">2-1 新增文章</a>-->
            <!--</li>-->
            <!--<li>-->
            <!--<a class="" href="admin-2-2_articleCategory.html">2-2 文章分類</a>-->
            <!--</li>-->
            <!--<li>-->
            <!--<a class="" href="admin-2-3_articleList.html">2-3 文章管理</a>-->
            <!--</li>-->
            <!--<li>-->
            <!--<a class="" href="admin-2-4_articleTag.html">2-4 標籤管理</a>-->
            <!--</li>-->
            <!--</ul>-->
            <!--</li>-->

            <!-- 3 廣告管理 -->
            <!--<li class="open">-->
            <!--<a href="javascript:;">-->
            <!--<i class="fa fa-dashboard"></i>-->
            <!--<span class="title">3 廣告管理　AD</span><span class="arrow "></span>-->
            <!--<span class="label label-orange"></span></a>-->
            <!--<ul class="sub-menu" >-->
            <!--<li>-->
            <!--<a class="" href="01-home.html">3-1 新增廣告</a>-->
            <!--</li>-->
            <!--<li>-->
            <!--<a class="" href="01-home.html">3-2 廣告分類</a>-->
            <!--</li>-->
            <!--<li>-->
            <!--<a class="" href="01-home.html">3-3 廣告管理</a>-->
            <!--</li>-->
            <!--<li>-->
            <!--<a class="" href="01-home.html">3-4 廣告版面</a>-->
            <!--</li>-->
            <!--</ul>-->
            <!--</li>-->


            <!-- 4 作品管理 -->
            <!--<li class="open">-->
            <!--<a href="javascript:;">-->
            <!--<i class="fa fa-dashboard"></i>-->
            <!--<span class="title">4 作品管理　Portfolio</span><span class="arrow "></span>-->
            <!--<span class="label label-orange"></span></a>-->
            <!--<ul class="sub-menu" >-->
            <!--<li>-->
            <!--<a class="" href="admin-4-1_portfolioAdd.html">4-1 新增作品</a>-->
            <!--</li>-->
            <!--<li>-->
            <!--<a class="" href="admin-4-2_portfolioCategory.html">4-2 作品分類</a>-->
            <!--</li>-->
            <!--<li>-->
            <!--<a class="" href="admin-4-3_portfolioList.html">4-3 作品管理</a>-->
            <!--</li>-->
            <!--<li>-->
            <!--<a class="" href="admin-4-4_portfolioTag.html">4-4 作品標籤</a>-->
            <!--</li>-->
            <!--</ul>-->
            <!--</li>-->

            <!-- 5 商品管理 -->
            <li class="open">
                <a href="javascript:;">
                    <i class="fa fa-dashboard"></i>
                    <span class="title">商品管理　Products</span><span class="arrow "></span>
                    <span class="label label-orange"></span></a>
                <ul class="sub-menu" >
                    <li>
                        <a class="" href="/cutestore/admin/addproduct">新增商品</a>
                    </li>
                    <li>
                        <a class="" href="/cutestore/admin/productlist">商品管理</a>
                    </li>
                </ul>
            </li>


            <!-- 6 訂單管理 -->
            <li class="open">
                <a href="javascript:;">
                    <i class="fa fa-dashboard"></i>
                    <span class="title">訂單管理　Order</span><span class="arrow "></span>
                    <span class="label label-orange"></span></a>
                <ul class="sub-menu" >
                    <li>
                        <a class="" href="/cutestore/admin/orderlist">訂單管理</a>
                    </li>
                    <li>
                        <a class="" href="/cutestore/admin/orderlistbycheck">訂單狀態-待確認</a>
                    </li>
                    <li>
                        <a class="" href="/cutestore/admin/orderlistbyok">訂單狀態-已完成</a>
                    </li>
                </ul>
            </li>

            <!-- 7 會員管理 -->
            <li class="open">
                <a href="javascript:;">
                    <i class="fa fa-dashboard"></i>
                    <span class="title">會員管理　Member</span><span class="arrow "></span>
                    <span class="label label-orange"></span></a>
                <ul class="sub-menu" >
                    <li>
                        <a class="" href="/cutestore/admin/userlist">會員管理</a>
                    </li>
                </ul>
            </li>

            <!-- 8 客服管理 -->
            <!--<li class="open">-->
            <!--<a href="javascript:;">-->
            <!--<i class="fa fa-dashboard"></i>-->
            <!--<span class="title">8 客服管理　Service</span><span class="arrow "></span>-->
            <!--<span class="label label-orange"></span></a>-->
            <!--<ul class="sub-menu" >-->
            <!--<li>-->
            <!--<a class="" href="01-home.html">8-1 連絡我們</a>-->
            <!--</li>-->
            <!--<li>-->
            <!--<a class="" href="01-home.html">8-2 商品問答管理</a>-->
            <!--</li>                                                             -->
            <!--</ul>-->
            <!--</li>-->

            <!-- 9 頁面管理 -->
            <!--<li class="open">-->
            <!--<a href="javascript:;">-->
            <!--<i class="fa fa-dashboard"></i>-->
            <!--<span class="title">9 頁面管理　Service</span><span class="arrow "></span>-->
            <!--<span class="label label-orange"></span></a>-->
            <!--<ul class="sub-menu" >-->
            <!--<li>-->
            <!--<a class="" href="01-home.html">9-1 關於我們</a>-->
            <!--</li>-->
            <!--<li>-->
            <!--<a class="" href="01-home.html">9-2 新手上路</a>-->
            <!--</li>                                                             -->
            <!--<li>-->
            <!--<a class="" href="01-home.html">9-3 常見問題</a>-->
            <!--</li>-->
            <!--<li>-->
            <!--<a class="" href="01-home.html">9-4 隱私權政策</a>-->
            <!--</li> -->
            <!--<li>-->
            <!--<a class="" href="01-home.html">9-5 連絡我們</a>-->
            <!--</li>-->
            <!--<li>-->
            <!--<a class="" href="01-home.html">9-6 右欄設定</a>-->
            <!--</li>                                 -->
            <!--</ul>-->
            <!--</li>-->

            <!-- 10 電子報管理 -->
            <!--<li class="open">-->
            <!--<a href="javascript:;">-->
            <!--<i class="fa fa-dashboard"></i>-->
            <!--<span class="title">10 電子報管理　Service</span><span class="arrow "></span>-->
            <!--<span class="label label-orange"></span></a>-->
            <!--<ul class="sub-menu" >-->
            <!--<li>-->
            <!--<a class="" href="01-home.html">10-1 新增電子報</a>-->
            <!--</li>-->
            <!--<li>-->
            <!--<a class="" href="01-home.html">10-2 電子報管理</a>-->
            <!--</li>                                                             -->
            <!--</ul>-->
            <!--</li>-->

            <!-- 12 選單管理 -->
            <!--<li class="open">-->
            <!--<a href="javascript:;">-->
            <!--<i class="fa fa-dashboard"></i>-->
            <!--<span class="title">12 選單管理　Service</span><span class="arrow "></span>-->
            <!--<span class="label label-orange"></span></a>-->
            <!--<ul class="sub-menu" >-->
            <!--<li>-->
            <!--<a class="" href="01-home.html">12-1 選單管理</a>-->
            <!--</li>                                -->
            <!--</ul>-->
            <!--</li>-->
        </ul>
    </div>
    <!-- MAIN MENU - END -->
    <div class="project-info">
        <div class="block1">
            <div class="data">
                <span class='title'>New&nbsp;Orders</span>
                <span class='total'>2,345</span>
            </div>
            <div class="graph">
                <span class="sidebar_orders">...</span>
            </div>
        </div>

        <div class="block2">
            <div class="data">
                <span class='title'>Visitors</span>
                <span class='total'>345</span>
            </div>
            <div class="graph">
                <span class="sidebar_visitors">...</span>
            </div>
        </div>
    </div>
</div>
<!--  SIDEBAR - END -->
