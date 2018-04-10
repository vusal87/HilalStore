
<!doctype html>
<html lang="en">
<head>

</head>
<body>
<div class="wsmenucontainer clearfix">
    <div class="overlapblackbg"></div>
    <div class="wsmobileheader clearfix"> <a id="wsnavtoggle" class="animated-arrow"><span></span></a> <a class="smallogo"></a> <a class="callusicon" href="tel:+994705004242"><span class="fa fa-phone"></span></a> </div>

    <div class="header">
        @if(isset($errors)&&$errors->has('email'))
            <div class="error">
                <strong><i class="fas fa-times-circle"></i>{{$errors->first('email')}}</strong>

            </div>
        @endif
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

                    <li>
                        <a href="#">Kateqoriyalar
                            <span class="arrow"></span>
                        </a>
                        @php
                            $kateqoriler= \App\Models\Kateqori::whereRaw('ust_id is null')->take(8)->get();
                        @endphp

                        <div class="megamenu clearfix">
                        @foreach($kateqoriler as $kateqori)
                            <ul class="col-lg-3 col-md-3 col-xs-12 link-list">
                                <li >
                                    <div class="headerSpan">
                                        <a  class="categoriHeader" href="{{route('kateqori',$kateqori->slug)}}">
                                            {{$kateqori->kateqori_adi}}
                                        </a>
                                    </div>
                                </li>
                                @foreach($kateqori->mehsullar as $mehsull)
                                <li class="productName">
                                    <a href="{{route('mehsul',$mehsull->slug)}}">   <i class="fas fa-chevron-right"></i>{{$mehsull->mehsul_adi}}

                                    </a>
                                </li>
                                @endforeach
                                <a  href="{{route('kateqori',$kateqori->slug)}}"> Etrafli</a>
                            </ul>
                            @endforeach
                        </div>
                    </li>
                    <li><a class="coxSatilanlar" href="#coxSatilanlar">Ən Çox Satilanlar</a>
                    </li>
                    <li><a class="enirimdeOlanlar" data-href="#enirimdeOlanlar" href="{{route('anasehife')}}#enirimdeOlanlar">Endirimde olanlar </a>
                    </li>
                    <li><a class="elaqe" href="#elaqe"> Elaqe </a>
                    </li>
                    @guest
                    <li>
                        <a href="#">
                            <i class="fa fa-sign-in"></i>Giriş
                            <span class="arrow"></span>
                        </a>
                        <div class="megamenu halfdiv03">
                            <h3 class="text-center">Giriş</h3>

                            <form class="menu_form" method="post" action="{{route('istifadeci.qeydiyyatAc')}}">
                                {{csrf_field()}}

                                <input class="form-control" type="email" placeholder="Email" name="email" id="email" required=" " >

                                <input class="form-control" name="shifre" id="shifre" type="password" placeholder="Şifre" required=" " >

                                <div class="forgot">
                                    <a href="#">Parolu unutdun?</a>
                                </div>
                                <input type="submit" value="Daxil ol">
                            </form>
                        </div>
                    </li>
                    <li><a href="#">
                            <i class="fa fa-sign-in"></i>
                            Qeydiyyat <span class="arrow"></span>
                        </a>
                        <div class="megamenu halfdiv03">
                            <h3 class="text-center">Qeydiyyat</h3>

                            <form class="animated wow slideInUp menu_form" data-wow-delay=".5s" action="{{route('istifadeci.qeydiyyatOl')}}" method="POST">
                                {{csrf_field()}}
                                <input class="form-control" id="adSoyad" name="adSoyad" type="text" placeholder="Ad Soyad" required=" " >


                                <input class="form-control" id="email" type="email" name="email"  placeholder="Email Address" required=" " >

                                <input class="form-control" type="password" id="shifre" name="shifre" placeholder="Şhifre" required=" " >

                                <input class="form-control" id="shifre-tekrari" name="shifre_confirmation" type="password" placeholder="Şhifre tekrari" required=" " >

                                <input type="submit" value="Qeydiyyat">
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
<div id="preloader">
    <div id="loader"></div>
</div>

</body>

</html>
