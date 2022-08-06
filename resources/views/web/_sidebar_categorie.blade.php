<div class="sidebar-widget mb-30">
    <div class="sidebar-category rounded">
        <ul>
            <li class="title"><i class="fa fa-bars"></i> Categorías</li>
            @foreach ($web_categories as $web_category)
                <li>
                    @if($web_category->products->count() >= 1)
                    <a href="{{route('web.get_products_category',$web_category)}}">{{$web_category->name}}</a>
                    <span>{{$web_category->products->count()}}</span>
                    @endif
                </li>
            @endforeach
        </ul>
    </div>
</div>