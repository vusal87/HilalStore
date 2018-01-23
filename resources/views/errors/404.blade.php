@extends('FrontEnd.layout.master')
@section('content')
    <div class="container">
        <h1>404</h1>
        <p>Axtardiginiz Sehife Tapilmadi</p>
        <a href="{{route('anasehife')}}" class="btn btn-primary">AnaSehife</a>
    </div>


    @endsection