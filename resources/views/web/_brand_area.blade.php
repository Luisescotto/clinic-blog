@if ($web_brands->count() > 0)
<div class="brand-area pt-28 pb-30 pt-md-14 pt-sm-14">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="section-title mb-30">
                    <h3>Las empresas que confían en nosotros</h3>
                </div> <!-- section title end -->
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="brand-active slick-padding slick-arrow-style">
                    @foreach ($web_brands as $web_brand)
                        <div class="brand-item text-center">
                            <img src="{{$web_brand->image->url}}" alt="{{$web_brand->name}}">
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endif