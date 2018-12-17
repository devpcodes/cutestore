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
                        <a>訂單管理</a>
                    </li>
                    <li class="active">
                        @if(isset($type))
                            <strong>{{$type}}</strong>
                        @endif
                    </li>
                </ol>
            </div>
        </div>
        <!---------------------------------------------------------------------->
        <!----------------------------------標題區-------------------------------->
        <div class='col-lg-12 col-md-12 col-sm-12 col-xs-12'>
            <div class="page-title">
                <div class="pull-left">
                    <h1 class="title">訂單</h1>
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
                                    <th style="width: 10%" class="TITLE">訂購人</th>
                                    <th style="width: 10%" class="TITLE">訂單日期</th>
                                    <th style="width: 15%" class="TITLE">訂單編號</th>
                                    <th style="width: 5%" class="TITLE">金額</th>
                                    <th style="width: 10%" class="TITLE">付款狀態</th>
                                    <th style="width: 10%" class="TITLE">訂單狀態</th>
                                    <th style="width: 10%" class="TITLE">出貨日</th>
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
                                    @foreach($order as $orKey => $orValue)
                                        <?php $i++ ;?>
                                            <tr>
                                                <td>{{$i}}</td>
                                                <td>
                                                    <input disabled name="user_id" value="{{$orValue->user_name}}" type="text" class="form-control" id="exampleInputEmail3" placeholder="">
                                                </td>
                                                <td>
                                                    <input disabled name="order_date" value="{{$orValue->order_date}}" type="text" class="form-control" id="exampleInputEmail3" placeholder="">
                                                </td>
                                                <td>
                                                    <div class="form-group">
                                                        <input name="ordno" disabled value="{{$orValue->ordno}}" type="text" class="form-control" id="exampleInputEmail3" placeholder="">
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-group">
                                                        <input disabled name="order_price" value="{{$orValue->order_price}}" type="text" class="form-control" id="exampleInputEmail3" placeholder="">
                                                    </div>
                                                </td>
                                                <td>
                                                    <select disabled name="ispay" class="form-control input-sm m-bot15">
                                                        @if($orValue->ispay == 0)
                                                            <option selected value="0">未付款</option>
                                                            <option value="1">已付款</option>
                                                        @else
                                                            <option selected value="1">已付款</option>
                                                            <option value="0">未付款</option>
                                                        @endif
                                                    </select>
                                                </td>
                                                <form class="order-form{{$orValue->id}}" action="" method="post">
                                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                    <input type="hidden" name="id" value="{{$orValue->id}}">
                                                    <td>
                                                        <select name="send_type" class="form-control input-sm m-bot15">
                                                            @if($orValue->send_type == 0)
                                                                <option selected value="0">未出貨</option>
                                                                <option value="1">已出貨</option>
                                                            @else
                                                                <option selected value="1">已出貨</option>
                                                                <option value="0">未出貨</option>
                                                            @endif
                                                        </select>
                                                    </td>
                                                    <td>
                                                        <div class="form-group">
                                                            @if(date('Y-m-d',strtotime($orValue->send_date))=="1970-01-01")
                                                                <input name="send_date" value="0000-00-00" type="date" class="form-control" id="exampleInputEmail3" placeholder="">
                                                            @else
                                                                <input name="send_date" value="{{date('Y-m-d',strtotime($orValue->send_date))}}" type="date" class="form-control" id="exampleInputEmail3" placeholder="">
                                                            @endif
                                                        </div>
                                                    </td>
                                                </form>
                                                <td>
                                                    <div class="form-group">
                                                        <button key="{{$orValue->id}}" key="" type="button" class="btn btn-purple pull-right order-del">刪除</button>
                                                        <button key="{{$orValue->id}}"  type="button" class="btn btn-success pull-right order-update">更新</button>　
                                                        <button ordno="{{$orValue->ordno}}" key="" type="submit" class="btn btn-primary pull-right order-view">查看</button>
                                                    </div>
                                                </td>
                                            </tr>

                                    @endforeach
                                </tbody>
                            </table>
                            <div style="margin: 0 auto; width: 100%; text-align: center;">
                                {!! $order->appends([])->render() !!}
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
<script src="/cutestore/public/admin/assets/js/orderlist.js" type="text/javascript"></script>

@stop