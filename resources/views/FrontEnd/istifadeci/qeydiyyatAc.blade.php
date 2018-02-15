@extends('FrontEnd.layout.master')
@section('title','Istifadeci Paneli')
@section('content')
    <div class="breadcrumbs">
        <div class="container">
            <ol class="breadcrumb breadcrumb1 animated wow slideInLeft" data-wow-delay=".5s">
                <li><a href="{{route('anasehife')}}"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>Anasehife</a></li>
                <li class="active">Daxil ol</li>
            </ol>
        </div>
    </div>

    <div class="login">
        <div class="container">
            <div class="col-md-4 col-md-offset-4">
                <h3 class="animated wow zoomIn" data-wow-delay=".5s">Daxil ol</h3>

                <!---728x90--->
                <div class="login-form-grids animated wow slideInUp" data-wow-delay=".5s">
                    {{--@include('errors.404')--}}
                    <form method="post" action="{{route('istifadeci.qeydiyyatAc')}}">
                        {{csrf_field()}}
                        <input class="form-control" type="email" placeholder="Email Address" name="email" id="email" required=" " >

                        <input class="form-control" name="shifre" id="shifre" type="password" placeholder="Password" required=" " >

                        <div class="forgot">
                            <a href="#">Parolu unutdun?</a>
                        </div>
                        <input type="submit" value="Daxil ol">
                    </form>
                </div>
                <p class="animated wow slideInUp" data-wow-delay=".5s"><a href="{{route('istifadeci.qeydiyyatOl')}}">Qiydiyyatdan kecin</a></p>

            </div>

            <!---728x90--->
        </div>
    </div>
    @endsection