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
                        <strong>新增商品</strong>
                    </li>
                </ol>
            </div>
        </div>
        <!---------------------------------------------------------------------->
        <!----------------------------------標題區-------------------------------->
        <div class='col-lg-12 col-md-12 col-sm-12 col-xs-12'>
            <div class="page-title">
                <div class="pull-left">
                    <h1 class="title">新增商品</h1>
                </div>
            </div>
        </div>
        <div class="clearfix"></div>
        {{--<div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">--}}
            {{--<div class="box" style="">--}}
                {{--<div class="pull-left">--}}
                    {{--<button type="submit" class="btn btn-success btn-primary">儲存</button>--}}
                    {{--<button type="button" class="btn btn-purple">清除/取消</button>--}}
                    {{--<button class="btn btn-default btn-icon" rel="tooltip" data-color-class="primary" data-animate=" animated fadeIn" data-toggle="tooltip" data-original-title="Trash" data-placement="top">--}}
                        {{--<i class="fa fa-trash-o icon-xs"></i>--}}
                    {{--</button>--}}
                {{--</div>--}}

            {{--</div>--}}
        {{--</div>--}}
        <!----------------------------標題區END---------------------------------------->

        <!---------------------------------上稿區------------------------------------------>
        <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
            <!---------------------------- 新增系列 --------------------------------------->
            <section class="box">
                <header class="panel_header" style="background: #888888;border-color: transparent;">
                    <h2 class="title pull-left" style="  color: #FFFFFF;">新增系列</h2>
                    <div class="actions panel_actions pull-right">
                        <i class="box_toggle fa fa-chevron-down"></i>
                        <i class="box_setting fa fa-cog" data-toggle="modal" href="#section-settings"></i>
                        <i class="box_close fa fa-times"></i>
                    </div>
                </header>
                <div class="content-body" style="background: rgba(232, 232, 232, 1);">
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <table class="table table-striped" style="background-color: #ffffff">
                                <thead>
                                    <tr>
                                        <th class="TITLE">NO</th>
                                        <th class="TITLE" style="width:160px;">文章名稱</th>
                                        <th class="TITLE" style="width:70px;">更新日期</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $serIndex = 0;
                                    ?>
                                    @foreach($series as $serKey => $serValue)
                                        <?php $serIndex++?>
                                        <form method="post" class="series-control{{ $serValue->id }}">
                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                            <input type="hidden" name="id" value="{{ $serValue->id }}">
                                            <tr>
                                                <td>{{$serIndex}}</td>
                                                <td style="width: 50%">
                                                    <div class="form-group">
                                                        <input name="name" value="{{$serValue->name}}" type="" class="form-control" id="exampleInputEmail3" placeholder="文章分類名稱">
                                                    </div>
                                                </td>
                                                <td style="width: 20%">{{$serValue->updated_at}}</td>
                                                <td style="vertical-align: middle;">
                                                    <div class="form-group">
                                                        <button key="{{ $serValue->id }}" type="button" class="btn btn-success pull-right series-update">更新</button>　
                                                        <button key="{{ $serValue->id }}" type="button" class="btn btn-purple pull-right series-delete">刪除</button>
                                                    </div>
                                                </td>
                                            </tr>
                                        </form>
                                    @endforeach
                                </tbody>
                            </table>
                            <form action="/cutestore/admin/addseries" method="post">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <div class="col-md-8">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <h5>系列名稱</h5>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="form-group">
                                                {{--<label class="sr-only" for="exampleInputEmail3">Email address</label>--}}
                                                <input name="name" type="text" class="form-control" id="exampleInputEmail3" placeholder="系列名稱">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4"></div>
                                <div class="clearfix"></div>
                                <!--儲存-->
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary pull-right">儲存</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </section>
            <!----------------------------------- 新增系列END ------------------------------------------------>
            <!----------------------------------- 新增分類 ------------------------------------------------>
            <section class="box">
                <header class="panel_header" style="background: #888888;border-color: transparent;">
                    <h2 class="title pull-left" style="  color: #FFFFFF;">新增分類</h2>
                    <div class="actions panel_actions pull-right">
                        <i class="box_toggle fa fa-chevron-down"></i>
                        <i class="box_setting fa fa-cog" data-toggle="modal" href="#section-settings"></i>
                        <i class="box_close fa fa-times"></i>
                    </div>
                </header>
                <div class="content-body" style="background: rgba(232, 232, 232, 1);">
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="row">
                                <table class="table table-striped" style="background-color: #ffffff">
                                    <thead>
                                        <tr>
                                            <th class="TITLE">NO</th>
                                            <th class="TITLE" style="width:160px;">系列名稱</th>
                                            <th class="TITLE" style="width:160px;">系列選擇</th>
                                            <th class="TITLE" style="width:160px;">分類名稱</th>
                                            <th class="TITLE" style="width:70px;">更新日期</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                        //dd($categories);
                                        $cateIndex = 0;
                                    ?>
                                        @foreach($categories as $cateKey => $cateArrayValue)
                                            @foreach($cateArrayValue as $cateArrKey => $cateValue)
                                                <?php $cateIndex++;?>
                                                @if($cateValue->name!="")
                                                    <form method="post" class="categories-control c{{$cateValue->id}}">
                                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                        <input type="hidden" name="id" value="{{$cateValue->id}}">
                                                        <tr>
                                                            <td>{{$cateIndex}}</td>
                                                            <td style="width: 20%">
                                                                <div class="form-group">
                                                                    {{$cateValue->sname}}
                                                                </div>
                                                            </td>
                                                            <td style="width: 10%">
                                                                <div class="form-group">
                                                                    <select name="series_id" class="form-control input-sm m-bot15 add-category-series-chooise">
                                                                        @foreach($series as $serKey => $serValue)
                                                                            @if($cateValue->sid == $serValue->id)
                                                                                <option selected='selected' value="{{$serValue->id}}">{{$serValue->name}}</option>
                                                                            @else
                                                                                <option value="{{$serValue->id}}">{{$serValue->name}}</option>
                                                                            @endif
                                                                        @endforeach
                                                                    </select>
                                                                    {{--<input name="sid" value="{{$cateValue->sid}}" type="" class="form-control" id="exampleInputEmail3" placeholder="文章分類名稱">--}}
                                                                </div>
                                                            </td>
                                                            <td style="width: 30%">
                                                                <div class="form-group">
                                                                    <input name="name" value="{{$cateValue->name}}" type="" class="form-control" id="exampleInputEmail3" placeholder="文章分類名稱">
                                                                </div>
                                                            </td>
                                                            <td style="width: 20%">{{$cateValue->updated_at}}</td>
                                                            <td style="vertical-align: middle;">
                                                                <div class="form-group">
                                                                    <button key="c{{$cateValue->id}}" type="button" class="btn btn-success pull-right categories-update">更新</button>　
                                                                    <button key="c{{$cateValue->id}}" type="button" class="btn btn-purple pull-right categories-delete">刪除</button>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    </form>
                                                @endif
                                            @endforeach
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <form action="/cutestore/admin/addcategory" method="post">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <div class="col-md-8">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <h5>選擇系列</h5>
                                        </div>
                                        <div class="col-md-8">
                                            <select name="series_id" class="form-control input-sm m-bot15 add-category-series-chooise">
                                                @foreach($series as $serKey => $serValue)
                                                    <option value="{{$serValue->id}}">{{$serValue->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <h5>分類名稱</h5>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="form-group">
                                                <input name="name" type="text" class="form-control" id="exampleInputEmail3" placeholder="分類名稱">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4"></div>

                                <div class="clearfix"></div>

                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary pull-right">儲存</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </section>
            <!----------------------------------- 新增分類end ------------------------------------------------>
            <section class="box">
                <header class="panel_header" style="background: #888888;border-color: transparent;">
                    <h2 class="title pull-left" style="  color: #FFFFFF;">新增商品</h2>
                </header>
                <div class="content-body" style="background: rgba(232, 232, 232, 1);">
                    <div class="row">
                        <form method="post" class="addProduct" action="">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <h5>選擇分類</h5>
                                            </div>
                                            <div class="col-md-8">
                                                <select name="category_id" class="form-control input-sm m-bot15">
                                                    @foreach($categories as $cateKey => $cateArrayValue)
                                                        @foreach($cateArrayValue as $cateArrKey => $cateValue)
                                                            <option value="{{$cateValue->id}}">{{$cateValue->name}}</option>
                                                        @endforeach
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <br>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <h5>商品名稱</h5>
                                            </div>
                                            <div class="col-md-8">
                                                <div class="form-group">
                                                    <input name="name" type="text" class="form-control" id="exampleInputEmail3" placeholder="商品名稱">
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <h5>商品說明1</h5>
                                            </div>
                                            <div class="col-md-8">
                                                <div class="form-group">
                                                    <input name="description1" type="text" class="form-control" id="exampleInputEmail3" placeholder="商品簡述">
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <h5>商品說明2</h5>
                                            </div>
                                            <div class="col-md-8">
                                                <div class="form-group">
                                                    <input name="description2" type="text" class="form-control" id="exampleInputEmail3" placeholder="商品簡述">
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <h5>商品價格</h5>
                                            </div>
                                            <div class="col-md-8">
                                                <div class="form-group">
                                                    <input name="price" type="text" class="form-control" id="exampleInputEmail3" placeholder="整數金額">
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <h5>商品圖片</h5>
                                            </div>
                                            <div class="col-md-8">
                                                <div class="form-group">
                                                    <div class="drop" style="background-color: #c9c9c9;display:block; width:100%;height: 100px; border:1px; text-align: center;line-height: 100px; color: #e5e5e5">
                                                        上傳作用區
                                                    </div>
                                                    <div id="progress">
                                                        <div class="bar" style="width:0%; height: 2px; background-color: #37b4ba;"></div>
                                                        <div class="item"></div>
                                                    </div>
                                                    <input type="file" id="fileupload" name="img" multiple />
                                                    <button type="button" class="btn btn-primary pull-right startupload">上傳</button>
                                                </div>
                                            </div>
                                            <div class="col-md-4" style="display: block; height: 50px; width: 100%;"></div>

                                            <div class="specification-container">
                                                <div class="col-md-4">
                                                    <h5>商品規格</h5>
                                                </div>
                                                <div class="col-md-8">
                                                    <div class="form-group">
                                                        <input type="text" class="form-control specification" id="exampleInputEmail3" placeholder="規格名稱">
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <h5>規格選項</h5>
                                                </div>
                                                <div class="col-md-8">
                                                    <div class="form-group">
                                                        <select name="tag_list[]" id="tag_list" class="specification-item form-control js-example-basic-multiple" multiple="multiple">
                                                            <option value=""></option>
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="col-md-4">
                                                    <h5>規格樣式</h5>
                                                </div>
                                                <div class="col-md-8">
                                                    <select class="form-control input-sm m-bot15 specification-class">
                                                        <option selected value="size">size</option>
                                                        <option value="color">color</option>
                                                    </select>
                                                    <br>
                                                </div>
                                                <div class="col-md-4" style="display: block; height: 50px; width: 100%;"></div>
                                            </div>
                                            <button type="button" class="btn btn-primary pull-right add-specification">新增規格</button>
                                        </div>
                                    </div>
                                    <div class="col-md-4"></div>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            <div class="col-lg-12">

                                    <header class="panel_header">
                                        <h2 class="title pull-left">文章內容</h2>
                                    </header>
                                    <div class="content-body">    <div class="row">
                                            <div class="col-md-12 col-sm-12 col-xs-12">
                                                <textarea style="width: 100%" class="ckeditor" cols="80" id="editor1" name="content">
                                                </textarea>
                                            </div>
                                        </div>
                                    </div>

                            </div>
                            <div class="form-group">
                                <button type="button" class="btn btn-primary pull-right addproduct">儲存</button>
                            </div>
                        </form>
                    </div>
                </div>
            </section>

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

<script src="/cutestore/public/admin/assets/js/select2.js"></script>
<script src="/cutestore/public/admin/assets/plugins/ckeditor/ckeditor.js" type="text/javascript"></script>
<script src="/cutestore/public/admin/assets/js/lib/jquery.ui.widget.js"></script>
<script src="/cutestore/public/admin/assets/js/lib/jquery.iframe-transport.js"></script>
<script src="/cutestore/public/admin/assets/js/lib/jquery.fileupload.js"></script>
<script src="/cutestore/public/admin/assets/js/product-upload.js"></script>
<script src="/cutestore/public/admin/assets/js/product.js"></script>

@stop