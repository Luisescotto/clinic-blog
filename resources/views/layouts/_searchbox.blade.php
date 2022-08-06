
<form id="form_search_products" action="{{route('web.search_products')}}" method="GET">
    <input class="badge-pill" type="text" id="search_products" name="search_words" placeholder="Buscar...">
    <button type="submit" class="search-btn badge-pill"><i class="fa fa-search"></i></button>
</form>

@push('scripts')
<script>
    $(function(){
        var products = new Bloodhound({
        datumTokenizer: Bloodhound.tokenizers.whitespace,
        queryTokenizer: Bloodhound.tokenizers.whitespace,
        prefetch: "{{route('products.json')}}",
        });

        $('#search_products').typeahead({
        hint: true,
        highlight: true,
        minLength: 1
        },
        {
            name: 'products',
            source: products,
        }).on('typeahead:selected', function(event, selection){
            $('#form_search_products').submit();
        });
    });
    
</script>

@endpush