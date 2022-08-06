@extends('web.my_account')
@section('title', 'Mi código QR')
@section('content_tab')

{{-- <div class="row"> --}}


<div class="col-lg-8 col-md-6" style="text-align: center">
    <a href="{{route('web.seminars', auth()->user())}}">
    {!! $qrcode !!}</a>
    <h1 class="mt-5">Tu código QR personal</h1>
    <p style="color: #e6a15c">No necesitas una entrada física! Solo tienes que presentar tu código en la entrada.</p>
</div> 

<div class="col-lg-8 col-md-6" style="text-align: right">
    
    
</div>

{{-- </div> --}}

@endsection