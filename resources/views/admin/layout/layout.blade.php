<!DOCTYPE html>
<html class=" ">
<head>
    <!--
         * @Package: Ultra Admin - Responsive Theme
         * @Subpackage: Bootstrap
         * @Version: 1.0
         * This file is part of Ultra Admin Theme.
        -->
    <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
    <meta charset="utf-8" />
    <title>Cutestore 管理系統</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta content="" name="description" />
    <meta content="" name="author" />
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <link rel="shortcut icon" href="/cutestore/public/admin/assets/images/favicon.png" type="image/x-icon" />    <!-- Favicon -->
    <link rel="apple-touch-icon-precomposed" href="/cutestore/public/admin/assets/images/apple-touch-icon-57-precomposed.png">	<!-- For iPhone -->
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="/cutestore/public/admin/assets/images/apple-touch-icon-114-precomposed.png">    <!-- For iPhone 4 Retina display -->
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="/cutestore/public/admin/assets/images/apple-touch-icon-72-precomposed.png">    <!-- For iPad -->
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="/cutestore/public/admin/assets/images/apple-touch-icon-144-precomposed.png">    <!-- For iPad Retina display -->

    <!-- CORE CSS FRAMEWORK - START -->
    <link href="/cutestore/public/admin/assets/plugins/pace/pace-theme-flash.css" rel="stylesheet" type="text/css" media="screen"/>
    <link href="/cutestore/public/admin/assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
    <link href="/cutestore/public/admin/assets/plugins/bootstrap/css/bootstrap-theme.min.css" rel="stylesheet" type="text/css"/>
    <link href="/cutestore/public/admin/assets/fonts/font-awesome/css/font-awesome.css" rel="stylesheet" type="text/css"/>
    <link href="/cutestore/public/admin/assets/css/animate.min.css" rel="stylesheet" type="text/css"/>
    <link href="/cutestore/public/admin/assets/plugins/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet" type="text/css"/>
    <!-- CORE CSS FRAMEWORK - END -->

    <!-- OTHER SCRIPTS INCLUDED ON THIS PAGE - START -->
    <link href="/cutestore/public/admin/assets/plugins/icheck/skins/all.css" rel="stylesheet" type="text/css" media="screen"/>        <!-- OTHER SCRIPTS INCLUDED ON THIS PAGE - END -->

    <!-- CORE CSS TEMPLATE - START -->
    <link href="/cutestore/public/admin/assets/css/style.css" rel="stylesheet" type="text/css"/>
    <link href="/cutestore/public/admin/assets/css/responsive.css" rel="stylesheet" type="text/css"/>
    <!-- CORE CSS TEMPLATE - END -->
    <link href="/cutestore/public/admin/assets/css/select2.css" rel="stylesheet"/>

    <!-- CORE JS FRAMEWORK - START -->
    <script src="/cutestore/public/admin/assets/js/jquery-1.11.2.min.js" type="text/javascript"></script>
    <script src="/cutestore/public/admin/assets/js/jquery.easing.min.js" type="text/javascript"></script>
    <script src="/cutestore/public/admin/assets/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="/cutestore/public/admin/assets/plugins/pace/pace.min.js" type="text/javascript"></script>
    <script src="/cutestore/public/admin/assets/plugins/perfect-scrollbar/perfect-scrollbar.min.js" type="text/javascript"></script>
    <script src="/cutestore/public/admin/assets/plugins/viewport/viewportchecker.js" type="text/javascript"></script>
    <!-- CORE JS FRAMEWORK - END -->
</head>
<!-------------------------------------- END HEAD ----------------------------------------->

<!--------------------------------------- BEGIN BODY -------------------------------------------->
<body class=" ">
<!-------------------------------- START TOPBAR ----------------------------------------->
<div class='page-topbar '>
    <a href="/cutestore" target="_blank"><div class='logo-area'>

    </div></a>
    <div class='quick-area'>
        <div class='pull-left'>
            <ul class="info-menu left-links list-inline list-unstyled">
                <li class="">
                    <a href="#" data-toggle="sidebar" class="sidebar_toggle">
                        <i class="fa fa-bars"></i>
                    </a>
                </li>
                {{--<li class="">--}}
                    {{--<a href="#" data-toggle="dropdown" class="toggle">--}}
                        {{--<i class="fa fa-envelope"></i>--}}
                        {{--<span class="badge badge-primary">7</span>--}}
                    {{--</a>--}}
                    {{--<ul class="dropdown-menu messages animated fadeIn">--}}

                        {{--<li class="list">--}}

                            {{--<ul class="dropdown-menu-list list-unstyled ps-scrollbar">--}}
                                {{--<li class="unread status-available">--}}
                                    {{--<a href="javascript:;">--}}
                                        {{--<div class="user-img">--}}
                                            {{--<img src="data/profile/avatar-1.png" alt="user-image" class="img-circle img-inline">--}}
                                        {{--</div>--}}
                                        {{--<div>--}}
                                                    {{--<span class="name">--}}
                                                        {{--<strong>Clarine Vassar</strong>--}}
                                                        {{--<span class="time small">- 15 mins ago</span>--}}
                                                        {{--<span class="profile-status available pull-right"></span>--}}
                                                    {{--</span>--}}
                                                    {{--<span class="desc small">--}}
                                                        {{--Sometimes it takes a lifetime to win a battle.--}}
                                                    {{--</span>--}}
                                        {{--</div>--}}
                                    {{--</a>--}}
                                {{--</li>--}}
                                {{--<li class=" status-away">--}}
                                    {{--<a href="javascript:;">--}}
                                        {{--<div class="user-img">--}}
                                            {{--<img src="data/profile/avatar-2.png" alt="user-image" class="img-circle img-inline">--}}
                                        {{--</div>--}}
                                        {{--<div>--}}
                                                    {{--<span class="name">--}}
                                                        {{--<strong>Brooks Latshaw</strong>--}}
                                                        {{--<span class="time small">- 45 mins ago</span>--}}
                                                        {{--<span class="profile-status away pull-right"></span>--}}
                                                    {{--</span>--}}
                                                    {{--<span class="desc small">--}}
                                                        {{--Sometimes it takes a lifetime to win a battle.--}}
                                                    {{--</span>--}}
                                        {{--</div>--}}
                                    {{--</a>--}}
                                {{--</li>--}}
                                {{--<li class=" status-busy">--}}
                                    {{--<a href="javascript:;">--}}
                                        {{--<div class="user-img">--}}
                                            {{--<img src="data/profile/avatar-3.png" alt="user-image" class="img-circle img-inline">--}}
                                        {{--</div>--}}
                                        {{--<div>--}}
                                                    {{--<span class="name">--}}
                                                        {{--<strong>Clementina Brodeur</strong>--}}
                                                        {{--<span class="time small">- 1 hour ago</span>--}}
                                                        {{--<span class="profile-status busy pull-right"></span>--}}
                                                    {{--</span>--}}
                                                    {{--<span class="desc small">--}}
                                                        {{--Sometimes it takes a lifetime to win a battle.--}}
                                                    {{--</span>--}}
                                        {{--</div>--}}
                                    {{--</a>--}}
                                {{--</li>--}}
                                {{--<li class=" status-offline">--}}
                                    {{--<a href="javascript:;">--}}
                                        {{--<div class="user-img">--}}
                                            {{--<img src="data/profile/avatar-4.png" alt="user-image" class="img-circle img-inline">--}}
                                        {{--</div>--}}
                                        {{--<div>--}}
                                                    {{--<span class="name">--}}
                                                        {{--<strong>Carri Busey</strong>--}}
                                                        {{--<span class="time small">- 5 hours ago</span>--}}
                                                        {{--<span class="profile-status offline pull-right"></span>--}}
                                                    {{--</span>--}}
                                                    {{--<span class="desc small">--}}
                                                        {{--Sometimes it takes a lifetime to win a battle.--}}
                                                    {{--</span>--}}
                                        {{--</div>--}}
                                    {{--</a>--}}
                                {{--</li>--}}
                                {{--<li class=" status-offline">--}}
                                    {{--<a href="javascript:;">--}}
                                        {{--<div class="user-img">--}}
                                            {{--<img src="data/profile/avatar-5.png" alt="user-image" class="img-circle img-inline">--}}
                                        {{--</div>--}}
                                        {{--<div>--}}
                                                    {{--<span class="name">--}}
                                                        {{--<strong>Melissa Dock</strong>--}}
                                                        {{--<span class="time small">- Yesterday</span>--}}
                                                        {{--<span class="profile-status offline pull-right"></span>--}}
                                                    {{--</span>--}}
                                                    {{--<span class="desc small">--}}
                                                        {{--Sometimes it takes a lifetime to win a battle.--}}
                                                    {{--</span>--}}
                                        {{--</div>--}}
                                    {{--</a>--}}
                                {{--</li>--}}
                                {{--<li class=" status-available">--}}
                                    {{--<a href="javascript:;">--}}
                                        {{--<div class="user-img">--}}
                                            {{--<img src="data/profile/avatar-1.png" alt="user-image" class="img-circle img-inline">--}}
                                        {{--</div>--}}
                                        {{--<div>--}}
                                                    {{--<span class="name">--}}
                                                        {{--<strong>Verdell Rea</strong>--}}
                                                        {{--<span class="time small">- 14th Mar</span>--}}
                                                        {{--<span class="profile-status available pull-right"></span>--}}
                                                    {{--</span>--}}
                                                    {{--<span class="desc small">--}}
                                                        {{--Sometimes it takes a lifetime to win a battle.--}}
                                                    {{--</span>--}}
                                        {{--</div>--}}
                                    {{--</a>--}}
                                {{--</li>--}}
                                {{--<li class=" status-busy">--}}
                                    {{--<a href="javascript:;">--}}
                                        {{--<div class="user-img">--}}
                                            {{--<img src="data/profile/avatar-2.png" alt="user-image" class="img-circle img-inline">--}}
                                        {{--</div>--}}
                                        {{--<div>--}}
                                                    {{--<span class="name">--}}
                                                        {{--<strong>Linette Lheureux</strong>--}}
                                                        {{--<span class="time small">- 16th Mar</span>--}}
                                                        {{--<span class="profile-status busy pull-right"></span>--}}
                                                    {{--</span>--}}
                                                    {{--<span class="desc small">--}}
                                                        {{--Sometimes it takes a lifetime to win a battle.--}}
                                                    {{--</span>--}}
                                        {{--</div>--}}
                                    {{--</a>--}}
                                {{--</li>--}}
                                {{--<li class=" status-away">--}}
                                    {{--<a href="javascript:;">--}}
                                        {{--<div class="user-img">--}}
                                            {{--<img src="data/profile/avatar-3.png" alt="user-image" class="img-circle img-inline">--}}
                                        {{--</div>--}}
                                        {{--<div>--}}
                                                    {{--<span class="name">--}}
                                                        {{--<strong>Araceli Boatright</strong>--}}
                                                        {{--<span class="time small">- 16th Mar</span>--}}
                                                        {{--<span class="profile-status away pull-right"></span>--}}
                                                    {{--</span>--}}
                                                    {{--<span class="desc small">--}}
                                                        {{--Sometimes it takes a lifetime to win a battle.--}}
                                                    {{--</span>--}}
                                        {{--</div>--}}
                                    {{--</a>--}}
                                {{--</li>--}}

                            {{--</ul>--}}

                        {{--</li>--}}

                        {{--<li class="external">--}}
                            {{--<a href="javascript:;">--}}
                                {{--<span>Read All Messages</span>--}}
                            {{--</a>--}}
                        {{--</li>--}}
                    {{--</ul>--}}

                {{--</li>--}}
                <li class="">
                    <a href="/cutestore/admin/orderlistbycheck"  class="toggle">
                        <i class="fa fa-bell"></i>
                        @inject('orderCheck','App\Composer\Admin\OrderCheck')
                        <span class="badge badge-orange">{{$orderCheck->checkNum()}}</span>
                    </a>
                    {{--<ul class="dropdown-menu notifications animated fadeIn">--}}
                        {{--<li class="total">--}}
                                    {{--<span class="small">--}}
                                        {{--You have <strong>3</strong> new notifications.--}}
                                        {{--<a href="javascript:;" class="pull-right">Mark all as Read</a>--}}
                                    {{--</span>--}}
                        {{--</li>--}}
                        {{--<li class="list">--}}

                            {{--<ul class="dropdown-menu-list list-unstyled ps-scrollbar">--}}
                                {{--<li class="unread available"> <!-- available: success, warning, info, error -->--}}
                                    {{--<a href="javascript:;">--}}
                                        {{--<div class="notice-icon">--}}
                                            {{--<i class="fa fa-check"></i>--}}
                                        {{--</div>--}}
                                        {{--<div>--}}
                                                    {{--<span class="name">--}}
                                                        {{--<strong>Server needs to reboot</strong>--}}
                                                        {{--<span class="time small">15 mins ago</span>--}}
                                                    {{--</span>--}}
                                        {{--</div>--}}
                                    {{--</a>--}}
                                {{--</li>--}}
                                {{--<li class="unread away"> <!-- available: success, warning, info, error -->--}}
                                    {{--<a href="javascript:;">--}}
                                        {{--<div class="notice-icon">--}}
                                            {{--<i class="fa fa-envelope"></i>--}}
                                        {{--</div>--}}
                                        {{--<div>--}}
                                                    {{--<span class="name">--}}
                                                        {{--<strong>45 new messages</strong>--}}
                                                        {{--<span class="time small">45 mins ago</span>--}}
                                                    {{--</span>--}}
                                        {{--</div>--}}
                                    {{--</a>--}}
                                {{--</li>--}}
                                {{--<li class=" busy"> <!-- available: success, warning, info, error -->--}}
                                    {{--<a href="javascript:;">--}}
                                        {{--<div class="notice-icon">--}}
                                            {{--<i class="fa fa-times"></i>--}}
                                        {{--</div>--}}
                                        {{--<div>--}}
                                                    {{--<span class="name">--}}
                                                        {{--<strong>Server IP Blocked</strong>--}}
                                                        {{--<span class="time small">1 hour ago</span>--}}
                                                    {{--</span>--}}
                                        {{--</div>--}}
                                    {{--</a>--}}
                                {{--</li>--}}
                                {{--<li class=" offline"> <!-- available: success, warning, info, error -->--}}
                                    {{--<a href="javascript:;">--}}
                                        {{--<div class="notice-icon">--}}
                                            {{--<i class="fa fa-user"></i>--}}
                                        {{--</div>--}}
                                        {{--<div>--}}
                                                    {{--<span class="name">--}}
                                                        {{--<strong>10 Orders Shipped</strong>--}}
                                                        {{--<span class="time small">5 hours ago</span>--}}
                                                    {{--</span>--}}
                                        {{--</div>--}}
                                    {{--</a>--}}
                                {{--</li>--}}
                                {{--<li class=" offline"> <!-- available: success, warning, info, error -->--}}
                                    {{--<a href="javascript:;">--}}
                                        {{--<div class="notice-icon">--}}
                                            {{--<i class="fa fa-user"></i>--}}
                                        {{--</div>--}}
                                        {{--<div>--}}
                                                    {{--<span class="name">--}}
                                                        {{--<strong>New Comment on blog</strong>--}}
                                                        {{--<span class="time small">Yesterday</span>--}}
                                                    {{--</span>--}}
                                        {{--</div>--}}
                                    {{--</a>--}}
                                {{--</li>--}}
                                {{--<li class=" available"> <!-- available: success, warning, info, error -->--}}
                                    {{--<a href="javascript:;">--}}
                                        {{--<div class="notice-icon">--}}
                                            {{--<i class="fa fa-check"></i>--}}
                                        {{--</div>--}}
                                        {{--<div>--}}
                                                    {{--<span class="name">--}}
                                                        {{--<strong>Great Speed Notify</strong>--}}
                                                        {{--<span class="time small">14th Mar</span>--}}
                                                    {{--</span>--}}
                                        {{--</div>--}}
                                    {{--</a>--}}
                                {{--</li>--}}
                                {{--<li class=" busy"> <!-- available: success, warning, info, error -->--}}
                                    {{--<a href="javascript:;">--}}
                                        {{--<div class="notice-icon">--}}
                                            {{--<i class="fa fa-times"></i>--}}
                                        {{--</div>--}}
                                        {{--<div>--}}
                                                    {{--<span class="name">--}}
                                                        {{--<strong>Team Meeting at 6PM</strong>--}}
                                                        {{--<span class="time small">16th Mar</span>--}}
                                                    {{--</span>--}}
                                        {{--</div>--}}
                                    {{--</a>--}}
                                {{--</li>--}}

                            {{--</ul>--}}

                        {{--</li>--}}

                        {{--<li class="external">--}}
                            {{--<a href="javascript:;">--}}
                                {{--<span>Read All Notifications</span>--}}
                            {{--</a>--}}
                        {{--</li>--}}
                    {{--</ul>--}}
                </li>
                {{--<li class="hidden-sm hidden-xs searchform">--}}
                    {{--<div class="input-group">--}}
                                {{--<span class="input-group-addon input-focus">--}}
                                    {{--<i class="fa fa-search"></i>--}}
                                {{--</span>--}}
                        {{--<form action="search-page.html" method="post">--}}
                            {{--<input type="text" class="form-control animated fadeIn" placeholder="Search & Enter">--}}
                            {{--<input type='submit' value="">--}}
                        {{--</form>--}}
                    {{--</div>--}}
                {{--</li>--}}
            </ul>
        </div>
        {{--<div class='pull-right'>--}}
            {{--<ul class="info-menu right-links list-inline list-unstyled">--}}
                {{--<li class="profile">--}}
                    {{--<a href="#" data-toggle="dropdown" class="toggle">--}}
                        {{--<img src="data/profile/profile.png" alt="user-image" class="img-circle img-inline">--}}
                        {{--<span>Jason Bourne <i class="fa fa-angle-down"></i></span>--}}
                    {{--</a>--}}
                    {{--<ul class="dropdown-menu profile animated fadeIn">--}}
                        {{--<li>--}}
                            {{--<a href="#settings">--}}
                                {{--<i class="fa fa-wrench"></i>--}}
                                {{--Settings--}}
                            {{--</a>--}}
                        {{--</li>--}}
                        {{--<li>--}}
                            {{--<a href="#profile">--}}
                                {{--<i class="fa fa-user"></i>--}}
                                {{--Profile--}}
                            {{--</a>--}}
                        {{--</li>--}}
                        {{--<li>--}}
                            {{--<a href="#help">--}}
                                {{--<i class="fa fa-info"></i>--}}
                                {{--Help--}}
                            {{--</a>--}}
                        {{--</li>--}}
                        {{--<li class="last">--}}
                            {{--<a href="ui-login.html">--}}
                                {{--<i class="fa fa-lock"></i>--}}
                                {{--Logout--}}
                            {{--</a>--}}
                        {{--</li>--}}
                    {{--</ul>--}}
                {{--</li>--}}
                {{--<li class="chat-toggle-wrapper">--}}
                    {{--<a href="#" data-toggle="chatbar" class="toggle_chat">--}}
                        {{--<i class="fa fa-comments"></i>--}}
                        {{--<span class="badge badge-warning">9</span>--}}
                    {{--</a>--}}
                {{--</li>--}}
            {{--</ul>--}}
        {{--</div>--}}
    </div>
</div>
<!-------------------------------- END TOPBAR -------------------------------->
<!------------------------------- START CONTAINER ------------------------------>
<div class="page-container row-fluid">
    @yield('content')
    <div class="chatapi-windows ">
    </div>
</div>
<!-- END CONTAINER -->
<!-- LOAD FILES AT PAGE END FOR FASTER LOADING -->


<!-- General section box modal start -->
<div class="modal" id="section-settings" tabindex="-1" role="dialog" aria-labelledby="ultraModal-Label" aria-hidden="true">
    <div class="modal-dialog animated bounceInDown">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Section Settings</h4>
            </div>
            <div class="modal-body">

                Body goes here...

            </div>
            <div class="modal-footer">
                <button data-dismiss="modal" class="btn btn-default" type="button">Close</button>
                <button class="btn btn-success" type="button">Save changes</button>
            </div>
        </div>
    </div>
</div>
<!-- modal end -->
</body>
</html>


