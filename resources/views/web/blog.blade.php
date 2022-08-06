@extends('layouts.web')
@section('meta_description', '')
@section('title', '')
@section('styles')



@endsection
@section('content')

<!-- breadcrumb area start -->
<div class="breadcrumb-area">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="breadcrumb-wrap">
                    <nav aria-label="breadcrumb">
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('web.welcome')}}">Inicio</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Blog</li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- breadcrumb area end -->

<!-- blog main wrapper start -->
<div class="blog-main-wrapper">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 order-2 order-lg-1">
                <div class="blog-sidebar-wrapper">
                   
                    @include('web.blog._blog_sidebar_wrapper', ['mb' => 'mb-30'])

                    {{-- web.get_posts_category --}}
                </div>
            </div>
            <div class="col-lg-9 order-1 order-lg-2">
                <div class="blog-wrapper-inner">
                    <div class="row">
                        <!-- start single blog item -->
                        
                        @foreach ($posts as $post)
                        <div class="col-lg-6 col-md-6">
                            @include('web.blog._blog_item', [
                                'read_more' => true
                            ])
                        </div>
                        @endforeach
                    
                       
                    </div>
                </div>
                <!-- start pagination area -->
                <div class="paginatoin-area text-center pt-30 pb-30">
                    @include('web.blog._pagination_area', ['items' => $posts])
                </div>
                <!-- end pagination area -->
            </div>
        </div>
    </div>
</div>
<!-- blog main wrapper end -->

<!-- brand area start -->
@include('web._brand_area')
<!-- brand area end -->

@endsection

@section('scripts')
@endsection