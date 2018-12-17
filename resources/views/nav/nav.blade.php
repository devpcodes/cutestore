<nav class="menu-breadcrumb" style="opacity: 0">
    <ul>
        <li><a href="/cutestore">Home</a></li>
        <li><a href="/cutestore/productlist">Store</a></li>
        @if($seriesId != 0)
            <li><a href="/cutestore/productseries/{{$seriesId}}" class="active">{{$seriesName}}</a></li>
        @endif
        @if(!empty($categoryName))
            <li><a href="/cutestore/productcategory/{{$categoryId}}" class="active">{{$categoryName}}</a></li>
        @endif
    </ul>
</nav>