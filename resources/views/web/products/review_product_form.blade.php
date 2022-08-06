@push('styles')
@endpush


    <div class="row">
        <div class="col">
            <h5>{{($product->ratings->count())}} comentario(s) para {{$product->name}}</h5>
        </div>

        <div class="col">
            <div class="buttons float-right mb-3">
                <a href="#" class="check-btn sqr-btn" data-toggle="modal" data-target="#modal-default">Escribir comentario</a>
            </div>
        </div>
    </div>

    @foreach ($product->ratings as $key => $rating)
        <div class="total-reviews">
            <div class="rev-avatar">
                <img src="{{auth()->user()->avatar}}">
            </div>
            <div class="review-box">
                <div class="ratings">
                    <input id="input_rate_{{$key}}" name="input-3" value="{{$rating->rating}}" class="rating-loading">
                    @push('scripts')
                        <script>
                            $(document).ready(function(){
                                $('#input_rate_{{$key}}').rating({
                                    displayOnly: true, 
                                    step: 1, 
                                    theme: 'krajee-fa',
                                    language: 'es',
                                    size: 'xs',
                                    starCaptions: {1: 'Muy malo', 2: 'Malo', 3: 'Está bien', 4: 'Bueno', 5: 'Muy bueno'},
                                    starCaptionClasses: {1: 'text-danger', 2: 'text-warning', 3: 'text-info', 4: 'text-primary', 5: 'text-success' },
                                });
                            });
                        </script>
                    @endpush
                </div>
                <div class="post-author">
                    <p><span>{{$rating->user->name}} - </span>{{$rating->created_at}} </p>
                    <p style="font-size:16px ">{{$rating->comment}}</p>
                </div>
            </div>
        </div>
    @endforeach
    

    
@push('modal')
        <div class="modal fade" id="modal-default">
            <div class="modal-dialog">
            <div class="modal-content rounded-0">
                {{-- <div class="modal-header">
                    <h4 class="modal-title">Editar dirección</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div> --}}

                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                {!! Form::open(['route' => ['web.rate_product', $product], 'method'=>'POST']) !!}
                <div class="modal-body">
                    
                    <div class="single-input-item">
                        <label class="col-form-label"><span class="text-danger">*</span>Calificación general</label>
                        <div class="form-group">
                            <input id="input-1" name="rate" class="rating-loading" value="">
                        </div>
                    </div>
                    <div class="single-input-item">
                        <label class="col-form-label"><span class="text-danger">*</span>Comentario</label>
                        <textarea class="form-control" name="comment" required></textarea>
                    </div>
                    
                    
                </div>

                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="check-btn sqr-btn ">Guardar cambios</button>
                </div>
                {!! Form::close() !!}

            </div>
            <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->
@endpush


  
  
@push('scripts')
<script>
    $(document).ready(function(){
        $('#input-1').rating({
            language: 'es',
            step: 1,
            theme: 'krajee-fa',
            starCaptions: {1: 'Muy malo', 2: 'Malo', 3: 'Está bien', 4: 'Bueno', 5: 'Muy bueno'},
            starCaptionClasses: {1: 'text-danger', 2: 'text-warning', 3: 'text-info', 4: 'text-primary', 5: 'text-success' }
        });
    });
</script>

@endpush