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
                        <a>商品管理</a>
                    </li>
                    <li class="active">
                        <strong>{{$choiceList}}</strong>
                    </li>
                </ol>
            </div>
        </div>
        <!---------------------------------------------------------------------->
        <!----------------------------------標題區-------------------------------->
        <div class='col-lg-12 col-md-12 col-sm-12 col-xs-12'>
            <div class="page-title">
                <div class="pull-left">
                    <h1 class="title">商品列表</h1>
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
                    <h2 class="title pull-left">商品管理</h2>
                    <a style="margin-left: 20px; line-height: 53px;" href="/cutestore/admin/productlist">日期</a>
                    <a style="margin-left: 20px; line-height: 53px;" href="/cutestore/admin/productlist/category">分類</a>
                    <a style="margin-left: 20px; line-height: 53px;" href="/cutestore/admin/productlist/hot">熱門</a>
                </header>
                <div class="content-body">
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th class="TITLE">NO</th>
                                        <th class="TITLE">所屬分類</th>
                                        <th class="TITLE">商品名稱</th>
                                        <th class="TITLE">商品說明1</th>
                                        <th class="TITLE">商品說明2</th>
                                        <th class="TITLE">售價</th>
                                        <th class="TITLE">瀏灠數</th>
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
                                    @foreach($product as $pKey => $pValue)
                                        <?php $i++ ;?>
                                        <form class="product-form{{$pValue->id}}" action="" method="post">
                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                            <input type="hidden" name="id" value="{{ $pValue->id }}">
                                            <tr>
                                                <td style="width: 2%;">{{$i}}</td>
                                                <td style="width: 15%">
                                                    <select name="category_id" class="form-control input-sm m-bot15">
                                                        @foreach($categories as $csKey => $csValue)
                                                            @if($pValue->category_id == $csValue->id)
                                                                <option selected value="{{$csValue->id}}">{{$csValue->name}}</option>
                                                            @else
                                                                <option value="{{$csValue->id}}">{{$csValue->name}}</option>
                                                            @endif
                                                        @endforeach
                                                    </select>
                                                </td>
                                                 <td style="width: 15%">
                                                    <div class="form-group">
                                                        <input name="name" value="{{$pValue->name}}" type="text" class="form-control" id="exampleInputEmail3" placeholder="">
                                                    </div>
                                                </td>
                                                <td style="width: 15%">
                                                    <div class="form-group">
                                                        <input name="description1" value="{{$pValue->description1}}" type="text" class="form-control" id="exampleInputEmail3" placeholder="">
                                                    </div>
                                                </td>
                                                <td style="width: 15%">
                                                    <div class="form-group">
                                                        <input name="description2" value="{{$pValue->description2}}" type="text" class="form-control" id="exampleInputEmail3" placeholder="">
                                                    </div>
                                                </td>
                                                <td style="width: 10%">
                                                    <div class="form-group">
                                                        <input name="price" value="{{$pValue->price}}" type="text" class="form-control" id="exampleInputEmail3" placeholder="">
                                                    </div>
                                                </td>
                                                <td style="width: 10%">
                                                    <div class="form-group">
                                                        <input name="view" value="{{$pValue->view}}" type="text" class="form-control" id="exampleInputEmail3" placeholder="">
                                                    </div>
                                                </td>
                                                <td style="width: 18%">
                                                    <div class="form-group">
                                                        <button key="{{$pValue->id}}" type="button" class="btn btn-purple pull-right product-del">刪除</button>
                                                        <button key="{{$pValue->id}}"  type="button" class="btn btn-success pull-right product-update">更新</button>　
                                                        <button key="{{$pValue->id}}" type="submit" class="btn btn-primary pull-right product-view">查看</button>
                                                    </div>
                                                </td>
                                            </tr>
                                        </form>
                                    @endforeach
                                </tbody>
                            </table>
                            <div style="margin: 0 auto; width: 100%; text-align: center;">
                                {!! $product->appends([])->render() !!}
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
<script src="/cutestore/public/admin/assets/js/productlist.js" type="text/javascript"></script>

@stop