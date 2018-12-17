@extends('layout.layout')
@section('content')
    <link rel="stylesheet" href="/css/core/shop-cart.css">
    <link rel="stylesheet" href="/css/core/shop-checkout.css">
    <link rel="stylesheet" href="/css/media.css">
    <nav class="menu-breadcrumb" style="opacity: 0">
        <ul>
            <li><a href="">Home</a></li>
            <!-- <li><a href="">購物車</a></li> -->
            <li><a href="" class="active">訂單查詢</a></li>
        </ul>
    </nav>
    <div class="content" style="opacity: 0">
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
                        <!-- <th style="width:20%;" class="center">查看</th>							 -->
                    </tr>
                    </thead>
                    <tbody class="order-list">
                    @foreach($order as $orKey => $orValue)
                        <tr>
                            <td>01</td>
                            <td class="order-date">{{date('Y.m.d',strtotime($orValue->order_date))}}<em> {{date('H:i:s',strtotime($orValue->order_date))}}</em></td>
                            <td class="order-num">
                                <i class="fa fa-file-text-o"></i>{{$orValue->ordno}}</td>
                            <td class="product-subtotal">${{$orValue->order_price}}
                            </td>
                            @if($orValue->ispay==0)
                                <td class="order-pay-no">待付款</td>
                            @else
                                <td class="order-pay-no">已付款</td>
                            @endif
                            @if($orValue->send_type == 0)
                                <td>未出貨</td>
                                <td>0000.00.00</td>
                            @else
                                <td>已出貨</td>
                                <td>{{date('Y.m.d',strtotime($orValue->send_date))}}</td>
                            @endif
                            <!-- <td><a href="">查看訂單</a> <br> <a href="">取消訂單</a></td> -->
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <h3 class="list-title">訂單明細</h3>
            <div class="shop-cart-table-wrapper">
                <table class="">
                    <thead>
                    <tr>
                        <th style="width:50% ;" class="center">訂單明細</th>
                        <th style="width:15%;" class="center">單價</th>
                        <th style="width:15%;" class="center">數量</th>
                        <!-- <th style="width: 20px;" class="center">折扣</th> -->
                        <th style="width:15%;" class="center">小計</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($orderDetails as $detailKey => $detailValue)
                        <?php
                            $options = json_decode($detailValue->product_options,true)
                        ?>
                        <tr>
                            <td>
                                <div class="media">
                                    <a><img src="{{$detailValue->product_src}}" alt=""></a>
                                    <div class="desc">
                                        <h2>{{$detailValue->product_name}}</h2>
                                        @foreach($options as $opKey => $opValue)
                                            @if($opKey!="src")
                                                <p class="size">{{$opKey}}：<em>{{$opValue}}</em></p>
                                            @endif
                                        @endforeach
                                    </div>
                                </div>
                            </td>
                            <td>${{$detailValue->product_pricy}}</td>
                            <td><input type="text" placeholder="{{$detailValue->product_qty}}" disabled></td>
                            <td class="product-subtotal">${{$detailValue->product_subtotal}}</td>
                        </tr>
                    @endforeach
                    <tr>
                        <td colspan="3" class="td-sub">
                            運費
                        </td>

                        <td class="product-subtotal-normal">$60</td>
                    </tr>
                    <tr>
                        <td colspan="3" class="td-sub" >
                            訂單總金額
                        </td>

                        <td class="product-subtotal">${{$orValue->order_price}}</td>
                    </tr>
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
                    {{--</tr>--}}
                    </tbody>
                </table>
            </div>
            <div class="portlet">
                <div class="portlet-title">
                    <i class="fa fa-truck"></i>收件人資訊
                </div>
                <div class="portlet-body form">
                    <!-- BEGIN FORM-->
                    <form action="#" class="form-horizontal form-bordered">
                        <div class="form-body">
                            <div class="form-group">
                                <label>收件人</label>
                                <div class="form-right">
                                    <input type="text" placeholder="{{$order[0]->name}}" class="form-control" disabled>
									<span class="help-block">
									Name </span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>收件人電話</label>
                                <div class="form-right">
                                    <input type="text" placeholder="{{$order[0]->phone}}" class="form-control" disabled>
									<span class="help-block">
									Phone</span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>電子郵件</label>
                                <div class="form-right">
                                    <input type="text" placeholder="{{$order[0]->email}}" class="form-control" disabled>
									<span class="help-block">
									Email</span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="">收件地址</label>
                                <div class="form-right">
                                    <input type="text" placeholder="{{$order[0]->address}}" class="form-control" disabled>
									<span class="help-block">
									Address </span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="">假日可否收貨</label>
                                <div class="form-right">
                                    <div class="group">
                                        <input type="radio" name="radio1" class="icheck" style="" checked>{{$order[0]->order_memo}}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- <div class="form-actions">
                            <button type="button" class="btn btn-default">取消</button>
                            <button type="submit" class="btn btn-default">更新</button>
                        </div> -->
                    </form>
                    <!-- END FORM-->
                </div>
            </div>	<!-- END portlet-->
            <div class="portlet">
                <div class="portlet-title">
                    <i class="fa fa-cc-diners-club"></i>您的付款狀態為下
                </div>
                <div class="portlet-body form">
                    <div class="pay-actions">
                        <!-- <button type="submit" class="btn btn-default color-100"> 線上ATM付款 </button> -->
                        <?php
                            $pay_id = $order[0]->pay_type;
                            if($pay_id==1){
                                $paytype="Credit";
                                $paytype="信用卡";
                            }elseif($pay_id==2){
                                $paytype="WebATM";
                            }elseif($pay_id==3){
                                $paytype="ATM";
                            }elseif($pay_id==4){
                                $paytype="CVS";
                                $paytype="超商代碼";
                            }elseif($pay_id==5){
                                $paytype="BARCODE";
                                $paytype="超商條碼";
                            }elseif($pay_id==6){
                                $paytype="Alipay";
                                $paytype="支付寶";
                            }
                        ?>
                        <button type="submit" class="btn btn-default color-200 color-200-active"> {{$paytype}} </button>
                        <?php
                            $payDate = strstr($order[0]->pay_memo, ':');
                            $payDate = substr($payDate,1);
                            $memoArr = explode(",", $order[0]->pay_memo);
                            $payDayLine = strstr($memoArr[count($memoArr)-1],':');
                            $payDayLine = substr($payDayLine,1);

                            //  :後面是空值的資料就不show
                            $newMemoArr = [];
                            foreach($memoArr as $memoKey => $memoValue){
                                $value = strstr($memoValue, ':');
                                $value = substr($value,1);
                                if($value==""){

                                }else{
                                    array_push($newMemoArr,$memoValue);
                                }
                            }
                            $memo = implode(" ",$newMemoArr)
                        ?>
                        @if($order[0]->ispay==1)
                            <p class="order-pay">已付款<br><em>{{date('Y.m.d',strtotime($payDate))}}</em></p>
                        @else
                            @if($payDayLine!="")
                                <p class="order-pay-no">未付款<br><em>付款期限：{{date('Y.m.d',strtotime($payDayLine))}}</em></p>
                            @else
                                <p class="order-pay-no">未付款<br></p>
                            @endif
                            @if($memo != "")
                                <p>付款資訊  <em> {{ $memo }}</em></p>
                            @endif
                        @endif
                    </div>
                </div>
            </div>	<!-- END portlet-->
        </div><!-- .container end -->
    </div><!-- .content end -->
    <script src="/js/orderdone.js"></script>
@stop