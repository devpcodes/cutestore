@extends('admin.layout.layout')
@section('content')
@include('admin.nav.nav')
        <!------------------------- START CONTENT ---------------------------------------->
<script src="/cutestore/public/admin/assets/js/select2.js"></script>
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
            <section class="box">
                <header class="panel_header" style="background: #888888;border-color: transparent;">
                    <h2 class="title pull-left" style="  color: #FFFFFF;">新增商品</h2>
                    <div class="actions panel_actions pull-right">
                        <i class="box_toggle fa fa-chevron-down"></i>
                        <i class="box_setting fa fa-cog" data-toggle="modal" href="#section-settings"></i>
                        <i class="box_close fa fa-times"></i>
                    </div>
                </header>
                <div class="content-body" style="background: rgba(232, 232, 232, 1);">
                    <div class="row">
                        <form method="post" class="addProduct" action="">
                            <input type="hidden" name="id" value="{{$product->id}}">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <h5>選擇分類</h5>
                                            </div>
                                            <div class="col-md-8">
                                                <select name="category_id" class="form-control input-sm m-bot15">
                                                    @foreach($categories as $cKey => $cValue)
                                                        @if($product->category_id == $cValue->id)
                                                            <option selected value="{{$cValue->id}}">{{$cValue->name}}</option>
                                                        @else
                                                            <option value="{{$cValue->id}}">{{$cValue->name}}</option>
                                                        @endif
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
                                                    <input value="{{$product->name}}" name="name" type="text" class="form-control" id="exampleInputEmail3" placeholder="商品名稱">
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <h5>商品說明1</h5>
                                            </div>
                                            <div class="col-md-8">
                                                <div class="form-group">
                                                    <input value="{{$product->description1}}" name="description1" type="text" class="form-control" id="exampleInputEmail3" placeholder="商品簡述">
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <h5>商品說明2</h5>
                                            </div>
                                            <div class="col-md-8">
                                                <div class="form-group">
                                                    <input value="{{$product->description2}}" name="description2" type="text" class="form-control" id="exampleInputEmail3" placeholder="商品簡述">
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <h5>商品價格</h5>
                                            </div>
                                            <div class="col-md-8">
                                                <div class="form-group">
                                                    <input value="{{$product->price}}" name="price" type="text" class="form-control" id="exampleInputEmail3" placeholder="整數金額">
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
                                                        <div class="item">
                                                            <?php
                                                            $pImages = (array)json_decode($product->images);
                                                            ?>
                                                            @foreach($pImages["detailImg"] as $iKey => $iValue)
                                                                <div class="working" style="width:100%">
                                                                    <img class="preview img-thumbnail" src="{{$iValue}}" style="margin: 10px 0;width: 70px;height: 70px;">
                                                                    <span class="info"></span>
                                                                    <?php
                                                                    // /cutestore/public/uploads/Admin_1458746308Koala - 複製.jpg
                                                                    $outputArr = explode("/", $iValue);
                                                                    $thumbPath = "261_".$outputArr[count($outputArr)-1];
                                                                    $thumbPath = public_path()."/uploads/".$thumbPath;
                                                                    $bigPath = public_path()."/uploads/".$outputArr[count($outputArr)-1];
                                                                    ?>
                                                                    <span thumbPath="{{$thumbPath}}" bigPath="{{$bigPath}}" style="cursor: pointer;line-height: 90px; clear: both" num='+z+' class="oldctrl pull-right"><i style="color: #464646" class="fa fa-times"></i></span>
                                                                    {{--<span style="line-height: 100px" num='+z+' class="ctrl pull-right" thumbPath="{{$thumbPath}}" bigPath="{{$bigPath}}">取消</span>--}}
                                                                </div>
                                                            @endforeach
                                                        </div>
                                                    </div>

                                                    <input type="file" id="fileupload" name="img" multiple />
                                                    <button type="button" class="btn btn-primary pull-right startupload">上傳</button>
                                                </div>
                                            </div>
                                            <div class="col-md-4" style="display: block; height: 50px; width: 100%;"></div>
                                            <?php
                                                $pItems = (array)json_decode($product->items);
                                            ?>
                                            <div class="specification-container">
                                                @if(!empty($pItems))
                                                    @foreach($pItems as $key => $valueArr)
                                                        <div class="col-md-4">
                                                            <h5>商品規格</h5>
                                                        </div>
                                                        <div class="col-md-8">
                                                            <div class="form-group">
                                                                <input value="{{strstr($key,'_',true)}}" type="text" class="form-control specification" id="exampleInputEmail3" placeholder="規格名稱">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <h5>規格選項</h5>
                                                        </div>
                                                        <div class="col-md-8">
                                                            <div class="form-group">
                                                                <select name="tag_list[]" id="tag_list" class="specification-item form-control js-example-basic-multiple" multiple="multiple">
                                                                    @if(count($valueArr)>0)
                                                                        @foreach($valueArr as $valueKey => $value)
                                                                            <option selected value="{{$value}}">{{$value}}</option>
                                                                        @endforeach
                                                                    @endif
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <h5>規格樣式</h5>
                                                        </div>
                                                        <div class="col-md-8">
                                                            <select class="form-control input-sm m-bot15 specification-class">
                                                                @if(substr(strstr($key,'_'),1) == "size")
                                                                    <option selected value="size">size</option>
                                                                    <option value="color">color</option>
                                                                @else
                                                                    <option value="size">size</option>
                                                                    <option selected value="color">color</option>
                                                                @endif
                                                            </select>
                                                            <br>
                                                        </div>
                                                        <div class="col-md-4" style="display: block; height: 50px; width: 100%;"></div>
                                                    @endforeach
                                                @endif
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
                                                    {{$product->content}}
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


<script src="/cutestore/public/admin/assets/plugins/ckeditor/ckeditor.js" type="text/javascript"></script>
<script src="/cutestore/public/admin/assets/js/lib/jquery.ui.widget.js"></script>
<script src="/cutestore/public/admin/assets/js/lib/jquery.iframe-transport.js"></script>
<script src="/cutestore/public/admin/assets/js/lib/jquery.fileupload.js"></script>
<script src="/cutestore/public/admin/assets/js/product-upload.js"></script>
<script src="/cutestore/public/admin/assets/js/productdetail.js"></script>
{{--<script src="/cutestore/public/admin/assets/js/product.js"></script>--}}

@stop