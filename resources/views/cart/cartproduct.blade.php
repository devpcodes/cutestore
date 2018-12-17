{{--<div class="page-overlaybg"></div>--}}
{{--<meta name="csrf-token" content="{{ csrf_token() }}" />--}}
{{--<link rel="stylesheet" type="text/css" href="css/lib/jquery.mCustomScrollbar.css">--}}
<div id="htmlpage" class="page-overlay" style="opacity: 0">
    <a href="#" class="overlay-close">X</a>
    {{--style="overflow: hidden"--}}
    <div class="product-overlay-container" >
        <div class="detail-left">
            <figure class="product-main-image">
                <?php
                $pImages = (array)json_decode($productData->images);
                ?>
                @foreach($pImages["detailImg"] as $bigKey => $bigValue)
                    <a><img src="{{$bigValue}}" alt="{{$productData->name}}" style="opacity:0;"></a>
                @endforeach
            </figure>
            <div class="product-other-images">
                @if(count($pImages["detailImg"])>0)
                    @foreach($pImages["detailImg"] as $pKey => $pValue)
                        <?php
                        $outputArr = explode("/", $pValue);
                        $thumbPath = "/cutestore/public/uploads/261_".$outputArr[count($outputArr)-1];
                        ?>
                        <a href="" class="">
                            <img src="{{$thumbPath}}" alt="{{$productData->name}}">
                        </a>
                    @endforeach
                @endif
            </div>
        </div>
        <div class="detail-right">
            <h2 pid="{{$productData->id}}" class="pname">{{$productData->name}}</h2>
            <p class="stock">{{$productData->description1}}</p>
            {{--<p class="number">Product：483512569</p>--}}
            <p class="hot">{{$productData->description2}}</p>
            <?php
                $pItems = (array)json_decode($productData->items);
                $cartOptions = $cart->options;
            ?>
            @foreach($pItems as $key => $valueArr)
                <nav class="{{substr(strstr($key,'_'),1)}}">
                    <h3 default="{{$valueArr[0]}}" class="poption">{{strstr($key,'_',true)}}</h3>

                    <ul>
                        <?php $i=0;?>
                        @foreach($valueArr as $valueKey => $value)
                            @if($cartOptions->contains($value))
                                <li parent="{{strstr($key,'_',true)}}" class="pitem"><a class="active select" href="">{{$value}}</a></li>
                            @else
                                <li parent="{{strstr($key,'_',true)}}" class="pitem"><a href="select">{{$value}}</a></li>
                            @endif
                        @endforeach
                    </ul>
                </nav>
            @endforeach
            {{--<nav class="color">--}}
                {{--<h3>顏色</h3>--}}
                {{--<ul>--}}
                    {{--<li><a href="">藍</a></li>--}}
                    {{--<li><a href="">粉</a></li>--}}
                    {{--<li><a href="">白</a></li>--}}
                {{--</ul>--}}
            {{--</nav>--}}
            <div class="price">
                <h2 class="pprice">${{$productData->price}}</h2>
                {{--<span>$300</span>--}}
            </div>
            <div class="cart-add">
                <input type="text" placeholder="1" class="quantity" value="{{$cart->qty}}">
                <a rowid="{{$cart->rowid}}" href="/cutestore/addcart" class="btn btn-addcart">
                    確認變更
                </a>
            </div>
        </div>

        <div class="more-detail">
            {!! $productData->content !!}
            {{--<p>Lorem ipsum dolor ut sit ame dolore adipiscing elit, sed sit nonumy nibh sed euismod laoreet dolore magna aliquarm erat sit volutpat Nostrud duis molestie at dolore. Lorem ipsum dolor ut sit ame dolore adipiscing elit, sed sit nonumy nibh sed euismod laoreet dolore magna aliquarm erat sit volutpat Nostrud duis molestie at dolore. Lorem ipsum dolor ut sit ame dolore adipiscing elit, sed sit nonumy nibh sed euismod laoreet dolore magna aliquarm erat sit volutpat Nostrud duis molestie at dolore.</p>--}}
        </div>
    </div>
    <input class="img" type="hidden" value="{{$pImages["thumbImg"]}}" />
</div>
<script src="/cutestore/public/js/lib/scroll/jquery.mCustomScrollbar.min.js"></script>
<script src="/cutestore/public/js/cartproduct.js" type="text/javascript"></script>

