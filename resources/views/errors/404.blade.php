@extends('FrontEnd.layout.master')
@section('content')
    {{--<div class="container">--}}
        {{--<h1>404</h1>--}}
        {{--<p>Axtardiginiz Sehife Tapilmadi</p>--}}
        {{--<a href="{{route('anasehife')}}" class="btn btn-primary">AnaSehife</a>--}}
    {{--</div>--}}
    <div class="error-page-wrap">
        <article class="error-page gradient">

                <h1>404</h1>
                <h2>oops!Sehife tapilmadi</h2>

            <i class="fas fa-chevron-left"></i>  <a href="{{route('anasehife')}}" class="btn">AnaSehife</a>
        </article>
    </div>

    @endsection