<div class="blog-sidebar mb-30">
    <div class="sidebar-serch-form">
        <form action="{{route('web.search_posts')}}" method="GET">
            <input type="text" class="search-field typeahead" id="search" name="search_words" placeholder="Buscar">
            <button type="submit" class="search-btn"><i class="fa fa-search"></i></button>
        </form>
    </div>
</div> <!-- single sidebar end -->

<div class="blog-sidebar mb-24">
    <h4 class="title mb-20">categorías</h4>
    <ul class="blog-archive">
        @foreach ($post_categories as $post_category)
        <li><a href="{{route('web.get_posts_category', $post_category)}}">{{$post_category->name}} ({{$post_category->posts->count()}})</a></li>
        @endforeach
    </ul>
</div> <!-- single sidebar end -->
<div class="blog-sidebar mb-24">
    <h4 class="title mb-20">Archivos</h4>
    <ul class="blog-archive">
        @foreach ($months as $month)
            <li><a href="{{route('web.get_posts_month', $month->date)}}">{{$month->date}} ({{$month->count}})</a></li>
        @endforeach
    </ul>
</div> <!-- single sidebar end -->

<div class="blog-sidebar mb-24">
    <h4 class="title mb-30">Publicaciones recientes</h4>

    @foreach ($recent_posts as $recent_post)
        <div class="recent-post mb-20">
            {{-- <div class="recent-post-thumb">
                <a href="blog-details.html">
                    <img src="galio/assets/img/product/product-img1.jpg" alt="">
                </a>
            </div> --}}
            <div class="recent-post-des">
                <span><a href="{{route('web.blog_details', $recent_post)}}">{{$recent_post->title}}</a></span>
                <span class="post-date">{{$recent_post->published_at}}</span>
            </div>
        </div> <!-- end single popular item -->
    @endforeach
    
</div> <!-- single sidebar end -->

<div class="blog-sidebar mb-24">
    <h4 class="title mb-30">Tags</h4>
    <ul class="blog-tags">
        @foreach ($post_tags as $post_tag)
            <li><a href="{{route('web.get_posts_tag', $post_tag)}}">{{$post_tag->name}}</a></li>
        @endforeach
        
    </ul>
</div> <!-- single sidebar end -->

@push('scripts')

<script>
    $(function(){
        var posts = new Bloodhound({
        datumTokenizer: Bloodhound.tokenizers.whitespace,
        queryTokenizer: Bloodhound.tokenizers.whitespace,
        prefetch: "{{route('posts.json')}}",
        });

        $('#search').typeahead({
        hint: true,
        highlight: true,
        minLength: 1
        },
        {
            name: 'posts',
            source: posts
        });
    });
    
</script>

@endpush