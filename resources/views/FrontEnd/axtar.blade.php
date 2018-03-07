@extends('FrontEnd.layout.master')
@section('content')
    <div class="container">
        <div class="row">
            <ol class="breadcrumb">
                <li><a href="{{route('anasehife')}}">Anasehife</a></li>
                <li>Axtarish Neticasi</li>
            </ol>
            <div class="col-md-12">
                <h2>
                    Axtariş üzre mehsullar
                </h2>
            </div>
            <div class="products bg-content">
                <div class="row">
                    @if(count($mehsullar)==0)
                        <div class="col-md-12 text-center">
                           <p><b>Bir Mehsul Tapilmadi</b></p>
                        </div>
                    @endif
                        @foreach( $mehsullar as $mehsul)

                            <div class="col-md-3 col-sm-6 col-xs-12 new-collections-grid ">
                                <div class="overlay">
                                    <div class="borderTop"></div>
                                    <div class="borderRight"></div>
                                    <div class="borderLeft"></div>
                                    <div class="borderBottom"></div>

                                </div>
                                <div class="new-collections-grid1 item-contents" data-wow-delay=".5s">
                                    <a href="{{route('mehsul',$mehsul->slug)}}" class="new-collections-grid1-image">
                                        <img class="img-responsive" src="{{$mehsul->detay->mehsul_shekli!=null ?
                                             asset('/uploads/mehsullar/'.$mehsul->detay->mehsul_shekli) :'http://via.placeholder.com/300x200?text=mehsulShekli'}}"
                                             alt="" style="min-height: 250px;max-height: 250px"  >
                                    </a>
                                    {{--<p> <a href="{{route('mehsul',$mehsul->slug)}}"></a></p>--}}
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
                                                    </span>
                                        </form>

                                    </div>
                                </div>
                            </div>
                        @endforeach
                </div>
                {{$mehsullar->appends(['axtarilan'=> old('axtarilan')])->links() }}
            </div>
        </div>
    </div>
    @endsection