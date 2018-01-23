@extends('FrontEnd.layout.master')
@section('title','anasehife')
@section('content')
    @if(session()->has('mesaj'))
<div class="container">

    <div class="alert alert-{{session('mesaj_nov')}}">{{session('mesaj')}}</div>

</div>
        @endif
    <div class="banner">
        <div class="container-fluid">
<div class="row">
                <div id="myCarousel" class="carousel slide" data-ride="carousel">
                    <!-- Indicators -->
                    <ol class="carousel-indicators">
                       @for($i=0;$i<count($mehsullar_slider);$i++)
                        <li data-target="#myCarousel" data-slide-to="{{$i}}" class="active"></li>
                        @endfor
                    </ol>

                    <!-- Wrapper for slides -->
                    <div class="carousel-inner">
                        @foreach($mehsullar_slider as $index=>$mehsul)
                        <div class="item {{$index==0 ? 'active' : ''}}">
                            <img src="http://via.placeholder.com/1300x500?text=mehsulShekli" alt="Los Angeles" style="width:100%;">

                            <div class="carousel-caption">
                                {{$mehsul->mehsul_adi}}
                            </div>
                        </div>
                            @endforeach
                    </div>

                    <!-- Left and right controls -->
                    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
                        <span class="glyphicon glyphicon-chevron-left"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="right carousel-control" href="#myCarousel" data-slide="next">
                        <span class="glyphicon glyphicon-chevron-right"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
                </div>
            </div>
            <div class="banner-info animated wow zoomIn" data-wow-delay=".5s">


                {{--<script src="js/jquery.wmuSlider.js"></script>--}}
                {{--<script>--}}
                    {{--$('.example1').wmuSlider();--}}
                {{--</script>--}}

            </div>
        </div>


    <div class="new-collections">
        <div class="container">
            <!---728x90--->
            <h3 class="animated wow zoomIn" data-wow-delay=".5s">Cox Satilanlar</h3>
            <p class="est animated wow zoomIn" data-wow-delay=".5s">Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia
                deserunt mollit anim id est laborum.</p>
            <div class="new-collections-grids">
                        <div class="row">
                            @foreach( $mehsullar_cox_satan as $mehsul)

                                <div class="col-md-4 new-collections-grid">
                                    <div class="new-collections-grid1 animated wow slideInUp" data-wow-delay=".5s">
                                        <a href="{{route('mehsul',$mehsul->slug)}}" class="new-collections-grid1-image">
                                            <img src="http://via.placeholder.com/300x200?text=mehsulShekli" alt="Los Angeles" style="width:100%;">
                                            <div class="new-collections-grid1-image-pos">
                                                <a href="single.html">Etrafli</a>
                                            </div>
                                        </a>
                                       <h4>{{$mehsul->mehsul_adi}}</h4>
                                        <p> <a href="{{route('mehsul',$mehsul->slug)}}"></a></p>
                                        <div class="new-collections-grid1-left simpleCart_shelfItem">
                                            <p class="price">{{$mehsul->qiymeti}}
                                            <form action="{{route('sebet.add')}}" method="post">
                                                {{csrf_field()}}
                                                <input type="hidden" name="id" value="{{$mehsul->id}}" >
                                                <input type="submit" class="btn btn-theme item_add" value="Sebete elave et">
                                            </form>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                            <div class="clearfix"> </div>
                        </div>

                </div>
            </div>
        <div class="container">
            <!---728x90--->
            <h3 class="animated wow zoomIn" data-wow-delay=".5s">Endirimde Olanlar</h3>
            <p class="est animated wow zoomIn" data-wow-delay=".5s">Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia
                deserunt mollit anim id est laborum.</p>
            <div class="new-collections-grids">
                <div class="row">
                    @foreach( $mehsullar_endirimli as $mehsul)

                        <div class="col-md-4 new-collections-grid">
                            <div class="new-collections-grid1 animated wow slideInUp" data-wow-delay=".5s">
                                <a href="{{route('mehsul',$mehsul->slug)}}" class="new-collections-grid1-image">
                                    <img src="http://via.placeholder.com/300x200?text=mehsulShekli" alt="Los Angeles" style="width:100%;">
                                    <div class="new-collections-grid1-image-pos">
                                        <a href="single.html">Etrafli</a>
                                    </div>
                                </a>
                                <h4>{{$mehsul->mehsul_adi}}</h4>
                                <p> <a href="{{route('mehsul',$mehsul->slug)}}"></a></p>
                                <div class="new-collections-grid1-left simpleCart_shelfItem">
                                    <p class="price">{{$mehsul->qiymeti}}
                                    <form action="{{route('sebet.add')}}" method="post">
                                        {{csrf_field()}}
                                        <input type="hidden" name="id" value="{{$mehsul->id}}" >
                                        <input type="submit" class="btn btn-theme item_add" value="Sebete elave et">
                                    </form>
                                    </p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    <div class="clearfix"> </div>
                </div>

            </div>
        </div>
        </div>



@endsection