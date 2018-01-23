@extends('FrontEnd.layout.master')
@section('title',$kateqori->kateqori_adi)
@section('content')
    <div class="breadcrumbs">
        <div class="container">
            <ol class="breadcrumb breadcrumb1 animated wow slideInLeft" data-wow-delay=".5s">
                <li><a href="{{route('anasehife')}}"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>AnaSehife</a></li>
                <li class="active">{{$kateqori->kateqori_adi}}</li>
            </ol>
        </div>
    </div>
    <!---728x90--->
    <div class="products">
        <div class="container">
            <div class="col-md-4 products-left">

                <div class="categories animated wow slideInUp" data-wow-delay=".5s">
                    <h3>{{$kateqori->kateqori_adi}}</h3>
                    <ul class="cate">
                        @foreach($alt_kateqoriler as $alt_kateqori)

                        <li><a href="{{route('kateqori',$alt_kateqori->slug)}}">{{$alt_kateqori->kateqori_adi}}</a> <span>(15)</span></li>
                        @endforeach
                        </ul>

                    </ul>
                </div>
                <div class="new-products animated wow slideInUp" data-wow-delay=".5s">
                    <h3>Yeni Mehsullar</h3>
                    <div class="new-products-grids">
                        <div class="new-products-grid">
                            <div class="new-products-grid-left">
                                <a href="single.html"><img src="images/6.jpg" alt=" " class="img-responsive" /></a>
                            </div>
                            <div class="new-products-grid-right">
                                <h4><a href="single.html">occaecat cupidatat</a></h4>

                                <div class="simpleCart_shelfItem new-products-grid-right-add-cart">
                                    <p> <span class="item_price">$180</span><a class="item_add" href="#">add to cart </a></p>
                                </div>
                            </div>
                            <div class="clearfix"> </div>
                        </div>
                        <div class="new-products-grid">
                            <div class="new-products-grid-left">
                                <a href="single.html"><img src="images/26.jpg" alt=" " class="img-responsive" /></a>
                            </div>
                            <div class="new-products-grid-right">
                                <h4><a href="single.html">eum fugiat quo</a></h4>

                                <div class="simpleCart_shelfItem new-products-grid-right-add-cart">
                                    <p> <span class="item_price">$250</span><a class="item_add" href="#">add to cart </a></p>
                                </div>
                            </div>
                            <div class="clearfix"> </div>
                        </div>
                        <div class="new-products-grid">
                            <div class="new-products-grid-left">
                                <a href="single.html"><img src="images/11.jpg" alt=" " class="img-responsive" /></a>
                            </div>
                            <div class="new-products-grid-right">

                                <div class="simpleCart_shelfItem new-products-grid-right-add-cart">
                                    <p> <span class="item_price">$259</span><a class="item_add" href="#">add to cart </a></p>
                                </div>
                            </div>
                            <div class="clearfix"> </div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="col-md-8 products-right">
                @if(count($mehsullar)==0)
                    <div class="col-md-12">Bu kateqoriyaad heleki mehsul yoxdur</div>
                @endif
                @foreach($mehsullar as $mehsul)

                    <div class="products-right-grids-bottom">
                        <div class="col-md-4 products-right-grids-bottom-grid">
                            <div class="new-collections-grid1 products-right-grid1 animated wow slideInUp" data-wow-delay=".5s">

                                <div class="new-collections-grid1-image">
                                    <a href="{{route('mehsul',$mehsul->slug) }}" class="product-image"><img src="http://via.placeholder.com/400x400?text=mehsulShekli" alt=" " class="img-responsive"></a>
                                </div>

                                <h4><a href="{{route('mehsul',$mehsul->slug) }}">{{$mehsul->mehsul_adi}}</a></h4>

                                <p>Vel illum qui dolorem.</p>

                                <div class="simpleCart_shelfItem products-right-grid1-add-cart">
                                    <p><i>$325</i> <span class="item_price">{{$mehsul->qiymeti}}azn</span><a class="item_add" href="#">add to cart </a></p>
                                </div>

                            </div>

                        </div>

                    </div>
                @endforeach

                    <div class="clearfix"> </div>
            </div>
            {{$mehsullar->links()}}

                {{--<nav class="numbering animated wow slideInRight" data-wow-delay=".5s">--}}
                    {{--<ul class="pagination paging">--}}
                        {{--<li>--}}
                            {{--<a href="#" aria-label="Previous">--}}
                                {{--<span aria-hidden="true">&laquo;</span>--}}
                            {{--</a>--}}
                        {{--</li>--}}
                        {{--<li class="active"><a href="#">1<span class="sr-only">(current)</span></a></li>--}}
                        {{--<li><a href="#">2</a></li>--}}
                        {{--<li><a href="#">3</a></li>--}}
                        {{--<li><a href="#">4</a></li>--}}
                        {{--<li><a href="#">5</a></li>--}}
                        {{--<li>--}}
                            {{--<a href="#" aria-label="Next">--}}
                                {{--<span aria-hidden="true">&raquo;</span>--}}
                            {{--</a>--}}
                        {{--</li>--}}
                    {{--</ul>--}}
                {{--</nav>--}}
        </div>
            <div class="clearfix"> </div>
        </div>
    </div>
    @endsection