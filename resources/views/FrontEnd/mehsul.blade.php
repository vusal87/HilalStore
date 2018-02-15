@extends('FrontEnd.layout.master')
@section('title',$mehsul->mehsul_adi)
@section('content')
    <div class="breadcrumbs">
        <div class="container">
            <ol class="breadcrumb breadcrumb1 animated wow slideInLeft" data-wow-delay=".5s">
                <li><a href="#"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>AnaSehife</a></li>
               @foreach($kateqoriler as $kateqori)

                   <li><a href="#">{{$kateqori->kateqori_adi}}</a></li>
                   @endforeach
                <li class="active">{{$mehsul->mehsul_adi}}</li>
            </ol>
        </div>
    </div>



    <!DOCTYPE html>

        <!-- Template styles -->
        <style rel="stylesheet">
            /* TEMPLATE STYLES */

            main {
                padding-top: 3rem;
                padding-bottom: 2rem;
            }

            .reviews {
                text-align: center;
                border-top: 1px solid #e0e0e0;
                border-bottom: 1px solid #e0e0e0;
                padding: 1rem;
                margin-top: 1rem;
                margin-bottom: 2rem;
            }

            .navbar {
                background-color: #414a5c;
            }

            footer.page-footer {
                background-color: #414a5c;
                margin-top: 2rem;
            }

            .card {
                font-weight: 300;
            }

            .navbar .btn-group .dropdown-menu a:hover {
                color: #000 !important;
            }

            .navbar .btn-group .dropdown-menu a:active {
                color: #fff !important;
            }
        </style>





    <main>


        <div class="container">
            <div class="row mt-lg-5">


                <div class="col-lg-7 wow fadeIn" data-wow-delay="0.2s">


                    <div id="carousel-example-1z" class="carousel slide carousel-fade" data-ride="carousel">

                        <ol class="carousel-indicators">
                            <li data-target="#carousel-example-1z" data-slide-to="0" class="active"></li>
                            <li data-target="#carousel-example-1z" data-slide-to="1"></li>
                            <li data-target="#carousel-example-1z" data-slide-to="2"></li>
                        </ol>

                        <div class="carousel-inner" role="listbox">

                            <div class="carousel-item active">
                                {{--@foreach($mehsullar as $mehsul)--}}
                                <img src="{{$mehsul->detay->mehsul_shekli!=null ?
                                         asset('/uploads/mehsullar/'.$mehsul->detay->mehsul_shekli) :'http://via.placeholder.com/300x200?text=mehsulShekli'}}"
                                     alt=""  class="img-responsive " style="min-width:400px;min-height: 400px;max-height: 400px"  >
                            {{--@endforeach--}}
                            </div>

                        </div>

                        <a class="carousel-control-prev" href="#carousel-example-1z" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carousel-example-1z" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>

                    </div>


                </div>

                <div class="col-lg-5">


                    <div class="row wow fadeIn" data-wow-delay="0.4s">
                        <div class="col-md-12">

                            <div class="product-wrapper">

                                <!--Product data-->
                                <h2 class="h2-responsive mt-4 font-bold">{{$mehsul->mehsul_adi}}</h2>
                                <hr>
                                <h3>Qiymeti</h3>

                                <div class="new-collections-grid1-left ">
                                    <p class="price animated tada text-left">{{$mehsul->qiymeti}}
                                    <form action="{{route('sebet.add')}}" method="post">
                                        {{csrf_field()}}

                                        <dl class="row mt-4">

                                            <dt class="col-sm-3">Etrafli</dt>
                                            <dd class="col-sm-9">{{$mehsul->aciqlama}}</dd>

                                        </dl>

                                        <hr>
                                                <input type="hidden" name="id" value="{{$mehsul->id}}" >


                                        <i class="fa fa-shopping-cart" ></i>
                                        <input type="submit" class="btn btn-theme item_add animated bounceInUp" value="Sebete at">



                                    </form>


                                </div>
                            </div>


                        </div>
                    </div>

                </div>


            </div>
        </div>


    </main>


































    {{--<div class="single">--}}
        {{--<div class="container">--}}
            {{--<div class="col-md-4 products-left">--}}


            {{--</div>--}}
            {{--<div class="col-md-8 single-right">--}}
                {{--<div class="col-md-12">--}}
                    {{--<a href="single.html"><img src="http://via.placeholder.com/600x200?text=mehsulShekli" alt=" " class="img-responsive" /></a>--}}

                {{--</div>--}}
                {{--<div class="col-md-5 single-right-left animated wow slideInUp" data-wow-delay=".5s">--}}
                    {{--<div class="flexslider">--}}
                        {{--<ul class="slides">--}}
                            {{--<li data-thumb="images/si.jpg">--}}
                                {{--<div class="thumb-image"> <img src="http://via.placeholder.com/400x200?text=mehsulShekli" data-imagezoom="true" class="img-responsive"> </div>--}}
                            {{--</li>--}}
                            {{--<li data-thumb="images/si1.jpg">--}}
                                {{--<div class="thumb-image"> <img src="http://via.placeholder.com/400x200?text=mehsulShekli" data-imagezoom="true" class="img-responsive"> </div>--}}

                            {{--</li>--}}

                        {{--</ul>--}}
                    {{--</div>--}}

                {{--</div>--}}
                {{--<div class="col-md-7 single-right-left simpleCart_shelfItem animated wow slideInRight" data-wow-delay=".5s">--}}
                    {{--<h3>{{$mehsul->mehsul_adi}}</h3>--}}
                    {{--<h4><span class="item_price"></span>{{$mehsul->qiymeti}}Azn</h4>--}}

                    {{--<div class="description">--}}
                        {{--<h5><i>Aciqlama</i></h5>--}}
                        {{--<p>{{$mehsul->aciqlama}}</p>--}}
                    {{--</div>--}}


                    {{--<div class="occasion-cart">--}}
                        {{--<form action="{{route('sebet.add')}}" method="post">--}}
                            {{--{{csrf_field()}}--}}
                            {{--<input type="hidden" name="id" value="{{$mehsul->id}}" >--}}
                            {{--<input type="submit" class="btn btn-theme item_add" value="Sebete elave et">--}}
                        {{--</form>--}}
                    {{--</div>--}}
                    {{--<div class="social">--}}
                        {{--<div class="social-left">--}}
                            {{--<p>Share On :</p>--}}
                        {{--</div>--}}
                        {{--<div class="social-right">--}}
                            {{--<ul class="social-icons">--}}
                                {{--<li><a href="#" class="facebook"></a></li>--}}
                                {{--<li><a href="#" class="twitter"></a></li>--}}
                                {{--<li><a href="#" class="g"></a></li>--}}
                                {{--<li><a href="#" class="instagram"></a></li>--}}
                            {{--</ul>--}}
                        {{--</div>--}}
                        {{--<div class="clearfix"> </div>--}}
                    {{--</div>--}}
                {{--</div>--}}
                {{--<div class="clearfix"> </div>--}}
                {{--<!---728x90--->--}}
                {{--<div class="bootstrap-tab animated wow slideInUp" data-wow-delay=".5s">--}}
                    {{--<div class="bs-example bs-example-tabs" role="tabpanel" data-example-id="togglable-tabs">--}}
                        {{--<ul id="myTab" class="nav nav-tabs" role="tablist">--}}
                            {{--<li role="presentation" class="active"><a href="#home" id="home-tab" role="tab" data-toggle="tab" aria-controls="home" aria-expanded="true">Aciqlama</a></li>--}}
                            {{--<li role="presentation"><a href="#profile" role="tab" id="profile-tab" data-toggle="tab" aria-controls="profile">Reviews(2)</a></li>--}}
                            {{--<li role="presentation" class="dropdown">--}}
                                {{--<a href="#" id="myTabDrop1" class="dropdown-toggle" data-toggle="dropdown" aria-controls="myTabDrop1-contents">Information <span class="caret"></span></a>--}}
                                {{--<ul class="dropdown-menu" role="menu" aria-labelledby="myTabDrop1" id="myTabDrop1-contents">--}}
                                    {{--<li><a href="#dropdown1" tabindex="-1" role="tab" id="dropdown1-tab" data-toggle="tab" aria-controls="dropdown1">cleanse</a></li>--}}
                                    {{--<li><a href="#dropdown2" tabindex="-1" role="tab" id="dropdown2-tab" data-toggle="tab" aria-controls="dropdown2">fanny</a></li>--}}
                                {{--</ul>--}}
                            {{--</li>--}}
                        {{--</ul>--}}
                        {{--<div id="myTabContent" class="tab-content">--}}
                            {{--<div role="tabpanel" class="tab-pane fade in active bootstrap-tab-text" id="home" aria-labelledby="home-tab">--}}
                              {{--<p>{{$mehsul->aciqlama}}</p>--}}
                            {{--</div>--}}
                            {{--<div role="tabpanel" class="tab-pane fade bootstrap-tab-text" id="profile" aria-labelledby="profile-tab">--}}
                                {{--<div class="bootstrap-tab-text-grids">--}}
                                    {{--<div class="bootstrap-tab-text-grid">--}}
                                        {{--<div class="bootstrap-tab-text-grid-left">--}}
                                            {{--<img src="images/4.png" alt=" " class="img-responsive" />--}}
                                        {{--</div>--}}
                                        {{--<div class="bootstrap-tab-text-grid-right">--}}
                                            {{--<ul>--}}
                                                {{--<li><a href="#">Admin</a></li>--}}
                                                {{--<li><a href="#"><span class="glyphicon glyphicon-share" aria-hidden="true"></span>Reply</a></li>--}}
                                            {{--</ul>--}}
                                            {{--<p>Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis--}}
                                                {{--suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem--}}
                                                {{--vel eum iure reprehenderit.</p>--}}
                                        {{--</div>--}}
                                        {{--<div class="clearfix"> </div>--}}
                                    {{--</div>--}}
                                    {{--<div class="bootstrap-tab-text-grid">--}}
                                        {{--<div class="bootstrap-tab-text-grid-left">--}}
                                            {{--<img src="images/5.png" alt=" " class="img-responsive" />--}}
                                        {{--</div>--}}
                                        {{--<div class="bootstrap-tab-text-grid-right">--}}
                                            {{--<ul>--}}
                                                {{--<li><a href="#">Admin</a></li>--}}
                                                {{--<li><a href="#"><span class="glyphicon glyphicon-share" aria-hidden="true"></span>Reply</a></li>--}}
                                            {{--</ul>--}}
                                            {{--<p>Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis--}}
                                                {{--suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem--}}
                                                {{--vel eum iure reprehenderit.</p>--}}
                                        {{--</div>--}}
                                        {{--<div class="clearfix"> </div>--}}
                                    {{--</div>--}}
                                   {{----}}
                                {{--</div>--}}
                            {{--</div>--}}
                          {{----}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}
            {{--<div class="clearfix"> </div>--}}
        {{--</div>--}}
    {{--</div>--}}





    @endsection