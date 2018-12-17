@extends('admin.layout.layout')
@section('content')
@include('admin.nav.nav')
        <!------------------------- START CONTENT ---------------------------------------->
<section id="main-content" class=" ">
    <section class="wrapper" style='margin-top:60px;display:inline-block;width:100%;padding:15px 0 0 15px;'>
        <!-- 麵包屑 -->
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <ol class="breadcrumb">
                    <li>
                        <a><i class="fa fa-home"></i>Home</a>
                    </li>
                    <li>
                        <a href="/cutestore/admin/userlist">會員管理</a>
                    </li>
                    <li class="active">
                        <strong></strong>
                    </li>
                </ol>
            </div>
        </div>
        <!---------------------------------------------------------------------->
        <!----------------------------------標題區-------------------------------->
        <div class='col-lg-12 col-md-12 col-sm-12 col-xs-12'>
            <div class="page-title">
                <div class="pull-left">
                    <h1 class="title">會員管理</h1>
                </div>
            </div>
        </div>
        <div class="clearfix"></div>
        <!----------------------------標題區END---------------------------------------->

        <!---------------------------------上稿區------------------------------------------>
        <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
            <!----------------------------------- 商品列表 ------------------------------------------------>
            <section class="box ">
                <header class="panel_header">
                    <h2 class="title pull-left">訂單管理</h2>
                </header>
                <div class="content-body">
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th style="width: 2%;" class="TITLE">NO</th>
                                    <th style="width: 10%" class="TITLE">id</th>
                                    <th style="width: 15%" class="TITLE">facebook</th>
                                    <th style="width: 15%" class="TITLE">google</th>
                                    <th style="width: 10%" class="TITLE">姓名</th>
                                    <th style="width: 10%" class="TITLE">EMAIL</th>
                                    <th style="width: 10%" class="TITLE">密碼</th>
                                    <th style="width: 10%" class="TITLE">管理者</th>
                                    <th style="width: 18%" class="TITLE"></th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                $i = 0;
                                if(isset($_GET['page'])){
                                    if($_GET['page']=="1"){
                                        $i = 0;
                                    }else{
                                        $i = ($_GET['page']-1)*20;
                                    }
                                }
                                ?>
                                @foreach($user as $usKey => $usValue)
                                    <?php $i++ ;?>
                                    <tr>
                                        <td>{{$i}}</td>
                                        <td>
                                            <input disabled name="user_id" value="{{$usValue->id}}" type="text" class="form-control" id="exampleInputEmail3">
                                        </td>
                                        <td>
                                            <div class="form-group">
                                                <input disabled name="fb_id" value="{{$usValue->fb_id}}" type="text" class="form-control" id="exampleInputEmail3" placeholder="">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-group">
                                                <input disabled name="goo_id" value="{{$usValue->goo_id}}" type="text" class="form-control" id="exampleInputEmail3" placeholder="">
                                            </div>
                                        </td>
                                        <form class="user-form{{$usValue->id}}" action="" method="post">
                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                            <input name="id" value="{{$usValue->id}}" type="hidden" class="form-control" id="exampleInputEmail3">
                                            <td>
                                                <input name="name" value="{{$usValue->name}}" type="text" class="form-control" id="exampleInputEmail3" placeholder="">
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <input name="email" value="{{$usValue->email}}" type="text" class="form-control" id="exampleInputEmail3" placeholder="">
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <input name="password" value="{{$usValue->password}}" type="text" class="form-control" id="exampleInputEmail3" placeholder="">
                                                </div>
                                            </td>
                                            <td>
                                                <select name="isadmin" class="form-control input-sm m-bot15">
                                                    @if($usValue->isadmin == 1)
                                                        <option selected value="1">是</option>
                                                        <option value="0">否</option>
                                                    @else
                                                        <option value="1">是</option>
                                                        <option selected value="0">否</option>
                                                    @endif
                                                </select>
                                            </td>
                                        </form>
                                        <td>
                                            <div class="form-group">
                                                <button key="{{$usValue->id}}" type="button" class="btn btn-purple pull-right user-del">刪除</button>
                                                <button key="{{$usValue->id}}" type="submit" class="btn btn-primary pull-right user-update">更新</button>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div style="margin: 0 auto; width: 100%; text-align: center;">
                                {!! $user->appends([])->render() !!}
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!----------------------------------- 商品列表end ------------------------------------------------>
        </div>
        <!------------------------------------------上稿區END------------------------------------------------->

    </section>
</section>
<!-------------------------- END CONTENT ------------------------------------->
<!-- OTHER SCRIPTS INCLUDED ON THIS PAGE - START -->
<script src="/cutestore/public/admin/assets/plugins/autosize/autosize.min.js" type="text/javascript"></script>
<script src="/cutestore/public/admin/assets/plugins/icheck/icheck.min.js" type="text/javascript"></script>
<!-- OTHER SCRIPTS INCLUDED ON THIS PAGE - END -->

<!-- CORE TEMPLATE JS - START -->
<script src="/cutestore/public/admin/assets/js/scripts.js" type="text/javascript"></script>
<!-- END CORE TEMPLATE JS - END -->

<!-- Sidebar Graph - START -->
{{--<script src="/cutestore/public/admin/assets/plugins/sparkline-chart/jquery.sparkline.min.js" type="text/javascript"></script>--}}
{{--<script src="/cutestore/public/admin/assets/js/chart-sparkline.js" type="text/javascript"></script>--}}
        <!-- Sidebar Graph - END -->
<script src="/cutestore/public/admin/assets/js/userlist.js" type="text/javascript"></script>

@stop