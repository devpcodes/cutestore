@extends('layout.layout')
@section('content')
    <link rel="stylesheet" href="/css/core/shop-cart.css">
    <nav class="menu-breadcrumb">
        <ul>
            <li><a href="/cutestore">Home</a></li>
            <!-- <li><a href="">購物車</a></li> -->
            <li><a href="" class="active">訂單查詢</a></li>
        </ul>
    </nav>
    <div class="content">
        <div class="container">
            <div class="shop-cart-table-wrapper">
                <table class="">
                    <thead>
                    <tr>
                        <th style="width:10px;" class="center">No.</th>
                        <th style="width:20% ;" class="center">訂單日期</th>
                        <th style="width:20%;" class="center">訂單編號</th>
                        <th style="width:15%;" class="center">金額</th>
                        <th style="width:20%;" class="center">付款狀態</th>
                        <th style="width:15%;" class="center">訂單狀態</th>
                        <th style="width:30px;" class="center">出貨日</th>
                        <th style="width:20%;" class="center">查看</th>
                    </tr>
                    </thead>
                    <tbody class="order-list">
                    <?php
                        if(!empty($order[0])) {
                            $payDate = strstr($order[0]->pay_memo, ':');
                            $payDate = substr($payDate,1);
                        }

                        $index = 0;
                        if(isset($_GET['page'])){
                            if($_GET['page']=="1"){
                                $index = 0;
                            }else{
                                $index = $_GET['page']*$item - 2;
                            }
                        }

                    ?>
                    @foreach($order as $orKey => $orValue)
                        <?php
                            $index++;
                            if($index<10){
                                $list = "0".(string)$index;
                            }else{
                                $list = (string)$index;
                            }
                        ?>
                        <tr>
                            <td>{{$list}}</td>
                            <td class="order-date">{{date('Y.m.d',strtotime($orValue->order_date))}} <em>{{date('H:i:s',strtotime($orValue->order_date))}}</em></td>
                            <td class="order-num">
                                <a href="order-done.html"><i class="fa fa-file-text-o"></i>{{$orValue->ordno}}</a></td>
                            <td class="order-price">${{$orValue->order_price}}
                            </td>
                            @if($orValue->ispay==0)
                                <td class="order-pay-no">待付款</td>
                            @else
                                <td class="order-pay">已付款<br><em>{{date('Y.m.d',strtotime($payDate))}}</em></td>
                            @endif
                            @if($orValue->send_type == 0)
                                <td>未出貨</td>
                                <td>0000.00.00</td>
                            @else
                                <td>已出貨</td>
                                <td>{{date('Y.m.d',strtotime($orValue->send_date))}}</td>
                            @endif
                            <td><a href="/cutestore/cartdone/{{$orValue->ordno}}">查看訂單</a> <br>
                            @if($orValue->ispay==0)
                                <a href="/cutestore/delorder/{{$orValue->id}}">取消訂單</a>
                            @endif
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>

            <div class="pagination">
                {!! $order->appends([])->render() !!}
                {{--<ul>--}}
                    {{--<li><a href="#"></a></li>--}}
                    {{--<li><a href="#">1</a></li>--}}
                    {{--<li><a href="#">2</a></li>--}}
                    {{--<li class="active"><a href="#">3</a></li>--}}
                    {{--<li><a href="#">......</a></li>--}}
                    {{--<li><a href="#">10</a></li>--}}
                    {{--<li><a href="#"></a></li>--}}
                {{--</ul>--}}
            </div>
        </div><!-- .container end -->
    </div><!-- .content end -->
@stop