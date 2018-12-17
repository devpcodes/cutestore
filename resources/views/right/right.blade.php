<div class="sidebar">
    <nav>
        @inject('right','App\Composer\Right')
        <?php
            $ser=[];
            $ser = $right->getlist();
        ?>
        <h2>CATEGORY</h2>
        <ul id="accordion" class="accordion">
            @foreach($ser as $serKey => $serValue)
                {{--<label class="down accordion-list" for="ac-{{$serKey}}" > <a href="/cutestore/productseries/{{$serValue[0]->sid}}" >{{$serValue[0]->sname}}<i class="fa fa-chevron-down"></i></a></label>--}}
                <li class="accordion-list">
                    <input class="leftCheck" id="ac-{{$serKey}}" name="accordion-1" type="checkbox" checked />
                    <label for="ac-{{$serKey}}" >
                        @if(isset($sId)&&$sId==$serValue[0]->sid)
                            <a style="color: #D4D4D4;" class="down" href="/cutestore/productseries/{{$serValue[0]->sid}}" >
                                {{$serValue[0]->sname}}
                                <i class="fa fa-chevron-down"></i>
                            </a>
                        @else
                            <a class="down" href="/cutestore/productseries/{{$serValue[0]->sid}}" >
                                {{$serValue[0]->sname}}
                                <i class="fa fa-chevron-down"></i>
                            </a>
                        @endif
                    </label>
                    <ul class="dropdown-menu">
                        @foreach($serValue as $categoryKey => $category)
                            @if(isset($cId) && $cId==$category->id)
                                <li>
                                    <a style="color:#D4D4D4;" href="/cutestore/productcategory/{{ $category->id }}">
                                        {{ $category->name }}
                                    </a>
                                </li>
                            @else
                                <li>
                                    <a href="/cutestore/productcategory/{{ $category->id }}">
                                        {{ $category->name }}
                                    </a>
                                </li>
                            @endif
                        @endforeach
                    </ul>
                </li>
            @endforeach
        </ul>

        {{--<ul class="list-group">--}}
            {{--@foreach($ser as $serKey => $serValue)--}}
            {{--<li class="list-group-item">--}}
                {{--<a href="/cutestore/productseries/{{$serValue[0]->sid}}" class="collapsed">{{$serValue[0]->sname}}<i>－</i></a>--}}
                {{--<ul class="dropdown-menu">--}}
                    {{--@foreach($serValue as $categoryKey => $category)--}}
                    {{--<li><a href="/cutestore/productcategory/{{ $category->id }}">{{ $category->name }}</a></li>--}}
                    {{--@endforeach--}}
                {{--</ul>--}}
            {{--</li>--}}
            {{--@endforeach--}}
            {{--<li class="list-group-item">--}}
                {{--<a href="" class="collapsed">小物<i>＋</i></a>--}}
                {{--<!-- <ul class="dropdown-menu">--}}
                    {{--<li><a href="">小物分類1</a></li>--}}
                    {{--<li><a href="">小物分類2</a></li>--}}
                    {{--<li><a href="">小物分類3</a></li>--}}
                {{--</ul> -->--}}
            {{--</li>--}}
            {{--<li class="list-group-item">--}}
                {{--<a href="" class="collapsed">飾品<i>－</i></a>--}}
                {{--<!-- <ul class="dropdown-menu">--}}
                    {{--<li><a href="">飾品分類1</a></li>--}}
                    {{--<li><a href="">飾品分類2</a></li>--}}
                    {{--<li><a href="">飾品分類3</a></li>--}}
                {{--</ul> -->--}}
            {{--</li>--}}
            {{--<li class="list-group-item">--}}
                {{--<a href="" class="collapsed">陶瓷<i>－</i></a>--}}
                {{--<!-- <ul class="dropdown-menu">--}}
                    {{--<li><a href="">陶瓷分類1</a></li>--}}
                    {{--<li><a href="">陶瓷分類2</a></li>--}}
                    {{--<li><a href="">陶瓷分類3</a></li>--}}
                {{--</ul> -->--}}
            {{--</li>--}}
            {{--<li class="list-group-item">--}}
                {{--<a href="" class="collapsed">居家<i>－</i></a>--}}
                {{--<!-- <ul class="dropdown-menu">--}}
                    {{--<li><a href="">居家分類1</a></li>--}}
                    {{--<li><a href="">居家分類2</a></li>--}}
                    {{--<li><a href="">居家分類3</a></li>--}}
                {{--</ul> -->--}}
            {{--</li>--}}
        {{--</ul>--}}
    </nav>
    {{--<div class="banner">--}}
        {{--<figure class="slide">--}}
            {{--<img src="/cutestore/public/images/sidebarbanner1.jpg" alt="">--}}
        {{--</figure>--}}
        {{--<!-- <div class="arrow">--}}
            {{--<a href="" class="arrow-right"></a>--}}
            {{--<a href="" class="arrow-left"></a>--}}
        {{--</div> -->--}}
        {{--<div class="bullet-group">--}}
            {{--<ul>--}}
                {{--<li><a href="" class="bullet first">1</a></li>--}}
                {{--<li><a href="" class="bullet">2</a></li>--}}
                {{--<li><a href="" class="bullet">3</a></li>--}}
                {{--<li><a href="" class="bullet">4</a></li>--}}
                {{--<li><a href="" class="bullet">5</a></li>--}}
            {{--</ul>--}}
        {{--</div>--}}
    {{--</div>--}}
</div>
