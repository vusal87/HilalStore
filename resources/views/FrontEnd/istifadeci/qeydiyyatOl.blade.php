@extends('FrontEnd.layout.master')
@section('title','Qeydiyyatdan Kec')
@section('content')
    <div class="breadcrumbs">
        <div class="container">
            <ol class="breadcrumb breadcrumb1 animated wow slideInLeft" data-wow-delay=".5s">
                <li><a href="{{route('anasehife')}}"><i class="fa fa-home"></i>Anasehife</a></li>
                <li class="active">Qeyiyyat</li>
            </ol>
        </div>
    </div>
    <!-- //breadcrumbs -->
    <!---728x90--->
    <!-- register -->
    <div class="register">
        <div class="container">
         <div class="col-md-4 col-md-offset-4">
             <h2 class="animated wow zoomIn" data-wow-delay=".5s">Qeydiyyat </h2>

             <!---728x90--->
             <div class="login-form-grids">
                 @if(count($errors)>0)
                     <div class="alert alert-danger">
                         <ul>
                             @foreach($errors->all() as $error)
                                 <li>{{$error}}</li>
                             @endforeach
                         </ul>
                     </div>
                 @endif



                 <form class="animated wow slideInUp" data-wow-delay=".5s" action="{{route('istifadeci.qeydiyyatOl')}}" method="POST">
                     {{csrf_field()}}
                     <input id="adSoyad" name="adSoyad" type="text" placeholder="Ad Soyad" required=" " >
                     @if($errors->has('email'))
                         <strong>{{$errors->first('email')}}</strong>
                     @endif

                     <input id="email" type="email" name="email"  placeholder="Email Address" required=" " >

                     <input type="password" id="shifre" name="shifre" placeholder="Shifre" required=" " >

                     <input id="shifre-tekrari" name="shifre_confirmation" type="password" placeholder="Password Confirmation" required=" " >


                     <input type="submit" value="Register">
                 </form>
             </div>
             <div class="register-home animated wow slideInUp" data-wow-delay=".5s">
                 <a href="{{route('anasehife')}}">Anasehife</a>
             </div>
         </div>
        </div>
    </div>
    @endsection