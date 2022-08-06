<div class="ratings">
    <input name="input-3" value="{{$product->averageRating}}" class="rating-loading rating_input">

    @push('scripts')
        <script>
            $(document).ready(function(){
                $('.rating_input').rating({
                    displayOnly: true, 
                    step: 1, 
                    theme: 'krajee-fa',
                    language: 'es',
                    size: 'xs',
                    showCaption: false,
                });
            });
        </script>
    @endpush
    <div class="pro-review">
        {{ number_format($product->userAverageRating, 1)}} ({{$product->timesRated()}})
    </div>
</div>