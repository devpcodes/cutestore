@extends('layout.layout')
@section('content')
<link rel="stylesheet" href="/css/core/shop-checkout.css">
<link rel="stylesheet" href="/css/media.css">
<nav class="menu-breadcrumb" style="opacity:0;">
    <ul>
        <li><a href="/cutestore">Home</a></li>
        <li><a href="/cutestore/cart">購物車</a></li>
        <li><a class="active">結帳</a></li>
    </ul>
</nav>
<div class="content" style="opacity:0;">
    <?php
        debug(\Cookie::get('cart'));
    ?>
    <!-- BEGIN FORM action="/cutestore/order"-->
    <form name="payform"  action="/cutestore/order" class="form-horizontal form-bordered" method="post">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div class="container">
            <div class="portlet">
                <div class="portlet-title">
                    <i class="fa fa-truck"></i>收件人資訊
                </div>
                <div class="portlet-body form">
                        <div class="form-body">
                            <div class="form-group">
                                <input type="checkbox" class="aaa">　　　同收件人，以下不用填寫．
                            </div>
                            <div class="form-group">
                                <label>收件人</label>
                                <div class="form-right">
                                    <input name="name" type="text" placeholder="收件人姓名" class="form-control pname">
                                        <span class="help-block">
                                        Name </span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>收件人電話</label>
                                <div class="form-right">
                                    <input name="phone" type="text" placeholder="收件人電話" class="form-control pphone">
                                        <span class="help-block">
                                        Phone</span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="">EMAIL</label>
                                <div class="form-right">
                                    <input name="email" type="text" placeholder="email" class="form-control pemail">
                                        <span class="help-block">
                                        Email </span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="">收件地址</label>
                                <div class="form-right">
                                    <input name="address" type="text" placeholder="收件地址" class="form-control paddress">
                                        <span class="help-block">
                                        Address </span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="">假日可否收貨</label>
                                <div class="form-right">
                                    <div class="group">
                                        <input name="remark" type="radio" class="icheck" checked style="" value="假日可以收貨">假日可以收貨
                                        <input name="remark" type="radio" class="icheck" style="" value="假日不可以收貨">假日不可以收貨
                                        <!-- <span class="help-block">
                                        Address </span> -->
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-actions">
                            {{--<button type="button" class="btn btn-default">取消</button>--}}
                            <button type="submit" class="btn btn-default update">更新</button>
                        </div>
                    <!-- END FORM-->
                </div>
            </div>	<!-- END portlet-->
            <div class="portlet">
                <div class="portlet-title">
                    <i class="fa fa-truck"></i>選擇您的付款方式
                </div>
                <div class="portlet-body form">
                    <div class="pay-actions">
                        <button paytype="WebATM" type="button" class="btn btn-default color-100 pay"> 線上ATM付款 </button>
                        <button paytype="Credit" type="button" class="btn btn-default color-200 pay"> 信用卡 </button>
                        <button paytype="CVS" type="button" class="btn btn-default color-300 pay"> 超商代碼代收繳費 </button>
                        <button paytype="BARCODE" type="button" class="btn btn-default color-400 pay"> 超商條碼代收繳費 </button>
                        <button paytype="ATM" type="button" class="btn btn-default color-500 pay">  一般ATM轉帳  </button>
                        <button paytype="Alipay" type="button" class="btn btn-default color-600 pay">  支付寶 </button>
                        <input class="paytype" name="pay_type" type="hidden" value="" />
                    </div>
                </div>
            </div>	<!-- END portlet-->
        </div><!-- END container-->
    </form>
</div><!-- END content-->
<script src="/js/lib/checkform/checkform_v1.js" type="text/javascript"></script>
<script src="/js/payment.js" type="text/javascript"></script>
@stop