{{--<div class="header">--}}
    {{--<div class="container">--}}
        {{--<div class="header-grid">--}}

            {{--<div class="header-grid-left animated wow slideInLeft" data-wow-delay=".5s">--}}
                {{--<ul>--}}
                    {{--<li><i class="glyphicon glyphicon-envelope" aria-hidden="true"></i><a href="mailto:info@example.com">HilalStore.com</a></li>--}}
                    {{--<li><i class="glyphicon glyphicon-earphone" aria-hidden="true"></i>+994 70 5975151</li>--}}
                    {{--@guest--}}
                    {{--<li><i class="glyphicon glyphicon-log-in" aria-hidden="true"></i><a href="{{route('istifadeci.qeydiyyatAc')}}">Girish</a></li>--}}
                    {{--<li><i class="glyphicon glyphicon-book" aria-hidden="true"></i><a href="{{route('istifadeci.qeydiyyatOl')}}">Qeydiyyat</a></li>--}}

                    {{--@endguest--}}
                    {{--@auth--}}
                    {{--<li class="dropdown">--}}
                        {{--<a href="" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Profil--}}
                        {{--<span class="caret"></span></a>--}}
                        {{--<ul class="dropdown-menu">--}}
                            {{--<li class="dropdown-item"><a href="{{route('sifarishler')}}">Sifarishlerim</a></li>--}}
                            {{--<li role="separator" class="divider"></li>--}}
                            {{--<li class="dropdown-item">--}}
                                {{--<form id="logout-form" method="post" action="{{route('istifadeci.akauntuBagla')}}" style="display: none">--}}
                                    {{--{{csrf_field()}}--}}
                                {{--</form>--}}
                                {{--<a href="#" id="logout">Cixish</a>--}}
                            {{--</li>--}}
                        {{--</ul>--}}
                    {{--</li>--}}

                    {{--@endauth--}}
                    {{--<script>--}}
                        {{--if(document.getElementById("logout"))--}}
                        {{--document.getElementById("logout").addEventListener('click', logout);--}}
                        {{--function logout(e){--}}
                            {{--e.preventDefault();--}}
                            {{--console.log('test')--}}
                            {{--document.getElementById('logout-form').submit()--}}
                        {{--}--}}
                    {{--</script>--}}
                {{--</ul>--}}
            {{--</div>--}}
            {{--<div class="header-grid-right animated wow slideInRight" data-wow-delay=".5s">--}}
                {{--<ul class="social-icons">--}}
                    {{--<li><a href="#" class="facebook"></a></li>--}}
                    {{--<li><a href="#" class="twitter"></a></li>--}}
                    {{--<li><a href="#" class="g"></a></li>--}}
                    {{--<li><a href="#" class="instagram"></a></li>--}}
                {{--</ul>--}}
            {{--</div>--}}
            {{--<div class="clearfix"> </div>--}}
        {{--</div>--}}


        {{--<div class="logo-nav">--}}
            {{--<div class="logo-nav-left animated wow zoomIn" data-wow-delay=".5s">--}}
                {{--<h1><a href="{{route('anasehife')}}"><b>HilAL</b> Store <span>Shop <b>anywhere</b></span></a></h1>--}}
            {{--</div>--}}
            {{--<div class="logo-nav-left1">--}}
                {{--<nav class="navbar navbar-default">--}}

                    {{--<div class="navbar-header nav_2">--}}
                        {{--<button type="button" class="navbar-toggle collapsed navbar-toggle1" data-toggle="collapse" data-target="#bs-megadropdown-tabs">--}}
                            {{--<span class="sr-only">Toggle navigation</span>--}}
                            {{--<span class="icon-bar"></span>--}}
                            {{--<span class="icon-bar"></span>--}}
                            {{--<span class="icon-bar"></span>--}}
                        {{--</button>--}}
                    {{--</div>--}}
                    {{--<div class="collapse navbar-collapse" id="bs-megadropdown-tabs">--}}
                        {{--<ul class="nav navbar-nav">--}}
                            {{--<li ><a href="{{route('anasehife')}}" >Anasehife</a></li>--}}

                            {{--<li class="dropdown">--}}
                                {{--<a href="#" class="dropdown-toggle" data-toggle="dropdown">Products <b class="caret"></b></a>--}}
                                {{--<ul class="dropdown-menu multi-column columns-3">--}}
                                    {{--<div class="row">--}}
                                        {{--<div class="col-sm-4">--}}
                                            {{--<ul class="multi-column-dropdown">--}}
                                                {{--<h6>Kateqoriyalar</h6>--}}
                                                {{--@php--}}
                                                    {{--$kateqoriler= \App\Models\Kateqori::whereRaw('ust_id is null')->take(8)->get();--}}
                                                {{--@endphp--}}

                                                {{--@foreach($kateqoriler as $kateqori)--}}

                                                {{--<li><a href="{{route('kateqori',$kateqori->slug)}}">{{$kateqori->kateqori_adi}}</a></li>--}}
                                                    {{--@endforeach--}}
                                            {{--</ul>--}}
                                        {{--</div>--}}
                                        {{--<div class="col-sm-4">--}}
                                            {{--<ul class="multi-column-dropdown">--}}
                                                {{--<h6>Bashlig</h6>--}}
                                                {{--<li><a href="products.html">AltKateqoti</a></li>--}}
                                                {{--<li><a href="products.html">AltKateqoti</a></li>--}}
                                                {{--<li><a href="products.html">AltKateqoti</a></li>--}}
                                                {{--<li><a href="products.html">AltKateqoti</a></li>--}}
                                                {{--<li><a href="products.html">AltKateqoti</a></li>--}}
                                                {{--<li><a href="products.html">AltKateqoti</a></li>--}}
                                                {{--<li><a href="products.html">AltKateqoti</a></li>--}}
                                            {{--</ul>--}}
                                        {{--</div>--}}
                                        {{--<div class="col-sm-4">--}}
                                            {{--<ul class="multi-column-dropdown">--}}
                                                {{--<h6>Bashlig</h6>--}}
                                                {{--<li><a href="products.html">AltKateqoti</a></li>--}}
                                                {{--<li><a href="products.html">AltKateqoti</a></li>--}}
                                                {{--<li><a href="products.html">AltKateqoti</a></li>--}}
                                                {{--<li><a href="products.html">AltKateqoti</a></li>--}}
                                                {{--<li><a href="products.html">AltKateqoti</a></li>--}}
                                            {{--</ul>--}}
                                        {{--</div>--}}
                                        {{--<div class="clearfix"></div>--}}
                                    {{--</div>--}}
                                {{--</ul>--}}
                            {{--</li>--}}
                            {{--<li>--}}
                                {{--<a href="#">Partnyorlar</a>--}}

                            {{--</li>--}}

                            {{--<li><a href="mail.html">Bizimle Elaqe</a></li>--}}
                        {{--</ul>--}}
                    {{--</div>--}}
                {{--</nav>--}}
            {{--</div>--}}
            {{--search--}}
            {{--<div class="logo-nav-right">--}}
                {{--<div class="search-box">--}}
                    {{--<div id="sb-search" class="sb-search">--}}
                        {{--<form action="{{route('mehsul_axtar')}}" method="post">--}}
                            {{--{{csrf_field()}}--}}
                            {{--<input name="axtarilan" class="sb-search-input" placeholder="Axtaracagin mehsulun adini daxil et" type="search" id="search"--}}
                                   {{--value="{{old('axtarilan')}}">--}}
                            {{--<input class="sb-search-submit" type="submit" value="">--}}
                            {{--<span class="sb-icon-search"> </span>--}}
                        {{--</form>--}}
                    {{--</div>--}}

                {{--</div>--}}
            {{--</div>--}}
            {{--<div class="header-right">--}}


                {{--<div class="cart box_1">--}}
                    {{--<a href="{{route('sebet')}}">--}}
                        {{--<h3>--}}
                            {{--<div class="total">--}}
                           {{--<i class="fa fa-shopping-cart"></i>--}}
                          {{--Sebet--}}
                                {{--<span class="badge badge-theme">{{Cart::count()}}</span>--}}
                            {{--</div>--}}
                        {{--</h3>--}}
                    {{--</a>--}}
                    {{--<div class="clearfix"> </div>--}}
                {{--</div>--}}



            {{--</div>--}}
            {{--<div class="clearfix"> </div>--}}
        {{--</div>--}}
    {{--</div>--}}
{{--</div>--}}

{{--<script>--}}

    {{--var a = document.getElementById('sb-search');--}}
    {{--document.querySelector('.sb-icon-search').addEventListener('click',function(){--}}
        {{--a.classList.toggle('sb-search-open')--}}
    {{--});--}}


        {{--document.addEventListener('click', function (e) {--}}
            {{--if(a.classList.contains('sb-search-open')--}}
                {{--&& !e.target.classList.contains('sb-icon-search')--}}
                {{--&& !e.target.classList.contains('sb-search-input')--}}
            {{--) {--}}
                {{--a.classList.remove('sb-search-open')--}}
            {{--}--}}
        {{--})--}}

{{--</script>--}}


<!doctype html>
<html lang="en">
<head>

</head>
<body>
<div class="wsmenucontainer clearfix">
    <div class="overlapblackbg"></div>
    <div class="wsmobileheader clearfix"> <a id="wsnavtoggle" class="animated-arrow"><span></span></a> <a class="smallogo"></a> <a class="callusicon" href="tel:123456789"><span class="fa fa-phone"></span></a> </div>

    <div class="header">
        <a class="logo-top" href="{{route('anasehife')}}" style="position: absolute;left: 3%"></a>

        <div class="wsmain">
            <div class="smllogo"><a href="{{route('anasehife')}}"></a></div>
            <nav class="wsmenu clearfix">
                <ul class="mobile-sub wsmenu-list">
                    <li class="rightmenu">
                        <form class="topmenusearch" action="{{route('mehsul_axtar')}}" method="post">
                            {{csrf_field()}}
                            <input name="axtarilan" class="sb-search-input" placeholder="mehsulun adini daxil et" type="search" id="search"
                                   value="{{old('axtarilan')}}">
                            {{--<input class="sb-search-submit" type="submit" value="">--}}
                            {{--<span class="sb-icon-search btnstyle"> </span>--}}
                            <button class="btnstyle"><i class="searchicon fa fa-search" aria-hidden="true"></i></button>
                        </form>
                    </li>
                    <li><a href="{{route('anasehife')}}" class="active menuhomeicon"><i class="fa fa-home"></i></a></li>

                    <li><a href="#">Kateqoriyalar <span class="arrow"></span></a>
                        @php
                            $kateqoriler= \App\Models\Kateqori::whereRaw('ust_id is null')->take(8)->get();
                        @endphp
                        <div class="megamenu clearfix">
                        @foreach($kateqoriler as $kateqori)
                            <ul class="col-lg-3 col-md-3 col-xs-12 link-list">
                                <li > <a  class="categoriHeader" href="{{route('kateqori',$kateqori->slug)}}">{{$kateqori->kateqori_adi}}</a></li>
                                @foreach($kateqori->mehsullar as $mehsull)
                                <li><a href="{{route('mehsul',$mehsull->slug)}}">{{$mehsull->mehsul_adi}}<i class="fas fa-chevron-right"></i></a></li>
                                @endforeach
                                <a href="">Etrafli</a>
                            </ul>
                            @endforeach
                        </div>
                    </li>
                    <li><a class="coxSatilanlar" href="#coxSatilanlar">Ən Çox Satilanlar</a>

                    </li>

                    <li><a class="enirimdeOlanlar" href="#enirimdeOlanlar">Endirimde olanlar </a>
                    </li>
                    <li><a class="elaqe" href="#elaqe"> ELAQE </a>
                    </li>


                    @guest
                    <li><a href="#"><i class="fa fa-sign-in"></i>Giriş <span class="arrow"></span></a>
                        <div class="megamenu halfdiv03">
                            <h3 class="title">Giriş</h3>

                            <form class="menu_form" method="post" action="{{route('istifadeci.qeydiyyatAc')}}">
                                {{csrf_field()}}
                                <input class="form-control" type="email" placeholder="Email Address" name="email" id="email" required=" " >

                                <input class="form-control" name="shifre" id="shifre" type="password" placeholder="Password" required=" " >

                                <div class="forgot">
                                    <a href="#">Parolu unutdun?</a>
                                </div>
                                <input type="submit" value="Daxil ol">
                            </form>
                        </div>
                    </li>
                    <li><a href="#"><i class="fa fa-sign-in"></i>Qiydiyyat <span class="arrow"></span></a>
                        <div class="megamenu halfdiv03">
                            <h3 class="title">Qeydiyyat</h3>

                            <form class="animated wow slideInUp" data-wow-delay=".5s" action="{{route('istifadeci.qeydiyyatOl')}}" method="POST">
                                {{csrf_field()}}
                                <input id="adSoyad" name="adSoyad" type="text" placeholder="Ad Soyad" required=" " >
                                @if($errors->has('email'))
                                    <strong>{{$errors->first('email')}}</strong>
                                @endif

                                <input id="email" type="email" name="email"  placeholder="Email Address" required=" " >

                                <input type="password" id="shifre" name="shifre" placeholder="Shifre" required=" " >

                                <input id="shifre-tekrari" name="shifre_confirmation" type="password" placeholder="Password Confirmation" required=" " >

                                <div class="register-check-box">
                                    <div class="check">
                                        <label class="checkbox"><input type="checkbox" name="checkbox"><i> </i>I accept the terms and conditions</label>
                                    </div>
                                </div>
                                <input type="submit" value="Register">
                            </form>
                        </div>
                    </li>
            @endguest
                    @auth
                        <li class="dropdown">
                            <a href="" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Profil
                                <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li class="dropdown-item"><a href="{{route('sifarishler')}}">Sifarishlerim</a></li>
                                <li role="separator" class="divider"></li>
                                <li class="dropdown-item">
                                    <form id="logout-form" method="post" action="{{route('istifadeci.akauntuBagla')}}" style="display: block">
                                        {{csrf_field()}}
                                    </form>
                                    <a href="#" id="logout">Cixish</a>
                                </li>
                            </ul>
                        </li>

                    @endauth
                    <li class="carticon">
                        <a href="{{route('sebet')}}">
                            {{--<i class="fa fa-shopping-basket" ></i>--}}
                            <i class="fas fa-shopping-basket" style="font-size: 14px"></i>
                            <em class="roundpoint">{{Cart::count()}}</em>
                            <span class="mobiletext">Sebet</span>
                        </a>
                    </li>
                    <script>
                        if(document.getElementById("logout"))
                            document.getElementById("logout").addEventListener('click', logout);
                        function logout(e){
                            e.preventDefault();
                            document.getElementById('logout-form').submit()
                        }
                    </script>
                </ul>
            </nav>
        </div>

    </div>



</div>
</body>

</html>
