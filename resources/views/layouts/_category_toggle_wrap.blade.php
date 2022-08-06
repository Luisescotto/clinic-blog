<div class="category-toggle-wrap">
    <div class="category-toggle badge-pill text-center">
        Categorías
        <div class="cat-icon badge-pill">
            <i class="fa fa-angle-down"></i>
        </div>
    </div>
    <nav class="category-menu category-style-2">
        <ul>
            @foreach ($web_categories as $web_category)
            

            <li class="
            @if ($web_category->subcategories->count() > 0)
            menu-item-has-children
            @endif
            ">
                <a href="{{route('web.get_products_category',$web_category)}}"><i class="fa {{$web_category->icon}}"></i> {{$web_category->name}}
                </a>


                @if ($web_category->subcategories->count() > 0)
                
                <ul class="category-mega-menu">
                    @foreach ($web_category->subcategories as $subcategory)
                        
                    
                    <li class="menu-item-has-children">
                        <a href="{{route('web.get_products_category',$subcategory)}}">{{$subcategory->name}}</a>
                        @if ($subcategory->subcategories->count() > 0)

                        <ul>
                            @foreach ($subcategory->subcategories as $subcategorya)
                                <li><a href="{{route('web.get_products_category',$subcategorya)}}">{{$subcategorya->name}}</a></li>
                            @endforeach
                        </ul>

                        @endif
                    </li>
                    @endforeach
                </ul>
                @endif
            </li>

            @endforeach
            
            
        </ul>
    </nav>
</div>