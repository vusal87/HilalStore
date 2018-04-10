@extends('FrontEnd.layout.master')
@section('title','www.hilalstore.com')
@section('content')
    @if(session()->has('mesaj'))
<div class="container">

{{--    <div class="alert alert-{{session('mesaj_nov')}}">{{session('mesaj')}}</div>--}}

</div>
        @endif
    <div class="banner">
        <div class="container-fluid">
                <div class="row">
                    <div class="owl-carousel owl-theme ">
                        @foreach($mehsullar_slider as $index=>$mehsul)
                            <div class=" item slide zoomInLeft {{$index==0 ? 'active' : ''}}">
                                <img src="{{count($mehsul->photos) && $mehsul->photos[0]->img_name !=null ?
                                             asset('/uploads/mehsullar/'.$mehsul->photos[0]->img_name) :'http://via.placeholder.com/300x200?text=mehsulShekli'}}"
                                     alt=""   class="img-responsive" >
                                    <div class="item-caption">
                                        <h4 class="mehsul_adi">
                                            {{$mehsul->mehsul_adi}}
                                        </h4>
                                        {{--<h4 >--}}
                                            {{--{{$mehsul->aciqlama}}--}}
                                        {{--</h4>--}}
                                        <h4 class="qiymeti">
                                            {{$mehsul->qiymeti}}
                                            <span>Azn</span>
                                        </h4>
                                    </div>

                            </div>
                        @endforeach
                    </div>

                </div>
            </div>
        </div>
    <div  id="coxSatilanlar" >
        <div class="container">
            <div class="headerBashlig row">

                    <h2 class="animated wow zoomIn coxSatilanlar" data-wow-delay=".5s">Çox Satilanlar</h2>
                <hr>

            </div>

            <div class="new-collections-grids">
                        <div class="row">
                            @foreach( $mehsullar_cox_satan as $mehsul)

                                <div class="col-md-3 col-sm-6 col-xs-12 new-collections-grid ">
                                    <div class="new-collections-grid1 item-contents" data-wow-delay=".5s">
                                        <a href="{{route('mehsul',$mehsul->slug)}}" class="new-collections-grid1-image">
                                            <img src="{{count($mehsul->photos) && $mehsul->photos[0]->img_name !=null ?
                                             asset('/uploads/mehsullar/'.$mehsul->photos[0]->img_name) :'http://via.placeholder.com/300x200?text=mehsulShekli'}}"
                                                 alt="" style="min-height: 250px;max-height: 250px"  class="img-responsive" >
                                        </a>
                                        {{--<p> <a href="{{route('mehsul',$mehsul->slug)}}"></a></p>--}}
                                        <div class="new-collections-grid1-left ">
                                            <a href="">
                                                <h4 class="text-left itemName">{{$mehsul->mehsul_adi}}</h4>
                                            </a>
                                                <h4 class="text-left itemPrice">{{$mehsul->qiymeti}}Azn
                                                </h4>
                                                <form action="{{route('sebet.add')}}" method="post">
                                                    {{csrf_field()}}
                                                    <input type="hidden" name="id" value="{{$mehsul->id}}" >
                                                    <span class="sebetSpan">
                                                        <i class="fa fa-shopping-cart" ></i>
                                                         <button class="shopingCart hover">Sebete at</button>
                                                    </span>
                                                </form>

                                        </div>
                                    </div>
                                </div>
                            @endforeach
                            <div class="clearfix"> </div>
                        </div>

                </div>
            </div>
        <div class="container" id="enirimdeOlanlar">

            <h2 class="animated wow zoomIn text-center enirimdeOlanlar" data-wow-delay=".5s">Endirimde Olanlar</h2>
            <hr>
            <div class="new-collections-grids">
                <div class="row">
                    @foreach( $mehsullar_endirimli as $mehsul)

                        <div class="col-md-3 col-sm-6 col-xs-12 new-collections-grid">
                            <div class="new-collections-grid1 animated wow slideInUp" data-wow-delay=".5s">
                                <a href="{{route('mehsul',$mehsul->slug)}}" class="new-collections-grid1-image">
                                    <img src="{{count($mehsul->photos) && $mehsul->photos[0]->img_name !=null ?
                                             asset('/uploads/mehsullar/'.$mehsul->photos[0]->img_name) :'http://via.placeholder.com/300x200?text=mehsulShekli'}}"
                                         alt="" style="min-height: 250px;max-height: 250px"  class="img-responsive" >

                                </a>
                                <div class="new-collections-grid1-left ">
                                    <a href="">
                                        <h4 class="text-left itemName">{{$mehsul->mehsul_adi}}</h4>
                                    </a>

                                    <h4 class="text-left itemPrice">{{$mehsul->qiymeti}}Azn
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
                    @endforeach
                    <div class="clearfix"> </div>
                </div>

            </div>
        </div>
        <div id="elaqe">
            <h2 class="text-center">Bizimle Elaqe</h2>
            <hr>
            <div id="map_view">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d8855.34254082143!2d49.77733412062443!3d40.32664723407502!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x40307f1adf8c1cd3%3A0x3a773a101ecbc724!2z0KLQvtGA0LPQvtCy0YvQuSDQptC10L3RgtGAINCh0LDQtNCw0YDQsNC6!5e0!3m2!1sru!2s!4v1517939206925" width="600" height="450" frameborder="0" style="border:0;width: 100%;margin-top: 40px" allowfullscreen></iframe>

            </div>
        </div>
        </div>


@endsection



