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
            {{--<div class="col-md-4 products-left">--}}

                {{--<div class="categories animated wow slideInUp" data-wow-delay=".5s">--}}
                    {{--<h3>{{$kateqori->kateqori_adi}}</h3>--}}
                    {{--<ul class="cate">--}}
                        {{--@foreach($alt_kateqoriler as $alt_kateqori)--}}

                        {{--<li><a href="{{route('kateqori',$alt_kateqori->slug)}}">{{$alt_kateqori->kateqori_adi}}</a> <span>(15)</span></li>--}}
                        {{--@endforeach--}}
                        {{--</ul>--}}

                    {{--</ul>--}}
                {{--</div>--}}


            {{--</div>--}}
            <div class="col-md-12 products-right">
                @if(count($mehsullar)==0)
                    <div class="col-md-12">Bu kateqoriyaad heleki mehsul yoxdur</div>
                @endif
                @foreach($mehsullar as $mehsul)

                    <div class="products-right-grids-bottom">
                        <div class="col-md-3 products-right-grids-bottom-grid">
                            <div class="new-collections-grid1 products-right-grid1 animated wow slideInUp" data-wow-delay=".5s">

                                <div class="new-collections-grid1-image">
                                    <a href="{{route('mehsul',$mehsul->slug) }}" class="product-image">
                                        <img class="img-responsive" src="{{$mehsul->detay->mehsul_shekli!=null ?
                                             asset('/uploads/mehsullar/'.$mehsul->detay->mehsul_shekli) :'http://via.placeholder.com/300x200?text=mehsulShekli'}}"
                                                                                                                 alt="" style="min-height: 250px;max-height: 250px"  >
                                    </a>
                                </div>

                                <div class="new-collections-grid1-left ">
                                    <a href="">
                                        <h4 class="text-left itemName">{{$mehsul->mehsul_adi}}</h4>
                                    </a>

                                    <h4 class="text-left itemPrice">{{$mehsul->qiymeti}}
                                    </h4>
                                    <form action="{{route('sebet.add')}}" method="post">
                                        {{csrf_field()}}
                                        <input type="hidden" name="id" value="{{$mehsul->id}}" >
                                        <span class="sebetSpan">
                                            <i class="fa fa-shopping-cart" ></i>
                                            <button class="shopingCart hover">Sebete at</button>
                                            {{--<input type="submit"  value="">--}}
                                        </span>
                                    </form>

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