<div class="header">
    <div class="container">
        <div class="header-grid">
            <div class="header-grid-left animated wow slideInLeft" data-wow-delay=".5s">
                <ul>
                    <li><i class="glyphicon glyphicon-envelope" aria-hidden="true"></i><a href="mailto:info@example.com">HilalStore.com</a></li>
                    <li><i class="glyphicon glyphicon-earphone" aria-hidden="true"></i>+1234 567 892</li>
                    @guest
                    <li><i class="glyphicon glyphicon-log-in" aria-hidden="true"></i><a href="{{route('istifadeci.qeydiyyatAc')}}">Girish</a></li>
                    <li><i class="glyphicon glyphicon-book" aria-hidden="true"></i><a href="{{route('istifadeci.qeydiyyatOl')}}">Qeydiyyat</a></li>

                    @endguest
                    @auth
                    <li class="dropdown">

                        <a href="" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Profil
                        <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="{{route('sifarishler')}}">Sifarishlerim</a></li>
                            <li role="separator" class="divider"></li>
                            <li>
                                <form id="logout-form" method="post" action="{{route('istifadeci.akauntuBagla')}}" style="display: none">
                                    {{csrf_field()}}
                                </form>
                                <input href="#" id="logout" value="Cixish">
                            </li>
                        </ul>
                    </li>
                    @endauth
                    <script>
                        if(document.getElementById("logout"))
                        document.getElementById("logout").addEventListener('click', logout);
                        function logout(e){
                            e.preventDefault();
                            console.log('test')
                            document.getElementById('logout-form').submit()
                        }
                    </script>
                </ul>
            </div>
            <div class="header-grid-right animated wow slideInRight" data-wow-delay=".5s">
                <ul class="social-icons">
                    <li><a href="#" class="facebook"></a></li>
                    <li><a href="#" class="twitter"></a></li>
                    <li><a href="#" class="g"></a></li>
                    <li><a href="#" class="instagram"></a></li>
                </ul>
            </div>
            <div class="clearfix"> </div>
        </div>
        <div class="logo-nav">
            <div class="logo-nav-left animated wow zoomIn" data-wow-delay=".5s">
                <h1><a href="{{route('anasehife')}}"><b>HilAL</b> Store <span>Shop <b>anywhere</b></span></a></h1>
            </div>
            <div class="logo-nav-left1">
                <nav class="navbar navbar-default">

                    <div class="navbar-header nav_2">
                        <button type="button" class="navbar-toggle collapsed navbar-toggle1" data-toggle="collapse" data-target="#bs-megadropdown-tabs">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                    </div>
                    <div class="collapse navbar-collapse" id="bs-megadropdown-tabs">
                        <ul class="nav navbar-nav">
                            <li ><a href="{{route('anasehife')}}" >Anasehife</a></li>

                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Products <b class="caret"></b></a>
                                <ul class="dropdown-menu multi-column columns-3">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <ul class="multi-column-dropdown">
                                                <h6>Kateqoriyalar</h6>
                                                @php
                                                    $kateqoriler= \App\Models\Kateqori::whereRaw('ust_id is null')->take(8)->get();
                                                @endphp

                                                @foreach($kateqoriler as $kateqori)

                                                <li><a href="{{route('kateqori',$kateqori->slug)}}">{{$kateqori->kateqori_adi}}</a></li>
                                                    @endforeach
                                            </ul>
                                        </div>
                                        <div class="col-sm-4">
                                            <ul class="multi-column-dropdown">
                                                <h6>Bashlig</h6>
                                                <li><a href="products.html">AltKateqoti</a></li>
                                                <li><a href="products.html">AltKateqoti,Bags</a></li>
                                                <li><a href="products.html">AltKateqoti</a></li>
                                                <li><a href="products.html">AltKateqoti</a></li>
                                                <li><a href="products.html">AltKateqoti</a></li>
                                                <li><a href="products.html">AltKateqoti</a></li>
                                                <li><a href="products.html">AltKateqoti</a></li>
                                            </ul>
                                        </div>
                                        <div class="col-sm-4">
                                            <ul class="multi-column-dropdown">
                                                <h6>Bashlig</h6>
                                                <li><a href="products.html">AltKateqoti</a></li>
                                                <li><a href="products.html">AltKateqoti</a></li>
                                                <li><a href="products.html">AltKateqoti</a></li>
                                                <li><a href="products.html">AltKateqoti</a></li>
                                                <li><a href="products.html">AltKateqoti</a></li>
                                            </ul>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                </ul>
                            </li>
                            <li>
                                <a href="#">Partnyorlar</a>

                            </li>

                            <li><a href="mail.html">Bizimle Elaqe</a></li>
                        </ul>
                    </div>
                </nav>
            </div>
            <div class="logo-nav-right">
                <div class="search-box">
                    <div id="sb-search" class="sb-search">
                        <form action="{{route('mehsul_axtar')}}" method="post">
                            {{csrf_field()}}
                            <input name="axtarilan" class="sb-search-input" placeholder="Enter your search term..." type="search" id="search"
                                   value="{{old('axtarilan')}}">
                            <input class="sb-search-submit" type="submit" value="">
                            <span class="sb-icon-search"> </span>
                        </form>
                    </div>

                    {{--<script>--}}
                        {{--new UISearch( document.getElementById( 'sb-search' ) );--}}
                    {{--</script>--}}
                </div>
            </div>
            <div class="header-right">


                <div class="cart box_1">
                    <a href="{{route('sebet')}}">
                        <h3>
                            <div class="total">
                           <i class="fa fa-shopping-cart"></i>
                          Sebet
                                <span class="badge badge-theme">{{Cart::count()}}</span>
                            </div>
                        </h3>
                    </a>
                    <div class="clearfix"> </div>
                </div>



            </div>
            <div class="clearfix"> </div>
        </div>
    </div>
</div>

<script>

    var a = document.getElementById('sb-search');
    document.querySelector('.sb-icon-search').addEventListener('click',function(){
        a.classList.toggle('sb-search-open')
    });


        document.addEventListener('click', function (e) {
            if(a.classList.contains('sb-search-open')
                && !e.target.classList.contains('sb-icon-search')
                && !e.target.classList.contains('sb-search-input')
            ) {
                a.classList.remove('sb-search-open')
            }
        })

</script>