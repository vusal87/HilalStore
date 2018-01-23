@extends('FrontEnd.layout.master')
@section('title','Istifadeci Paneli')
@section('content')
    <div class="breadcrumbs">
        <div class="container">
            <ol class="breadcrumb breadcrumb1 animated wow slideInLeft" data-wow-delay=".5s">
                <li><a href="index.html"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>Home</a></li>
                <li class="active">Login Page</li>
            </ol>
        </div>
    </div>

    <div class="login">
        <div class="container">
            <h3 class="animated wow zoomIn" data-wow-delay=".5s">Login Form</h3>
            <p class="est animated wow zoomIn" data-wow-delay=".5s">Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia
                deserunt mollit anim id est laborum.</p>
            <!---728x90--->
            <div class="login-form-grids animated wow slideInUp" data-wow-delay=".5s">
                {{--@include('errors.404')--}}
                <form method="post" action="{{route('istifadeci.qeydiyyatAc')}}">
                    {{csrf_field()}}
                    <input class="form-control" type="email" placeholder="Email Address" name="email" id="email" required=" " >

                    <input class="form-control" name="shifre" id="shifre" type="password" placeholder="Password" required=" " >

                    <div class="forgot">
                        <a href="#">Forgot Password?</a>
                    </div>
                    <input type="submit" value="Login">
                </form>
            </div>
            <!---728x90--->
            <h4 class="animated wow slideInUp" data-wow-delay=".5s">For New People</h4>
            <p class="animated wow slideInUp" data-wow-delay=".5s"><a href="register.html">Register Here</a> (Or) go back to <a href="index.html">Home<span class="glyphicon glyphicon-menu-right" aria-hidden="true"></span></a></p>
        </div>
    </div>
    @endsection