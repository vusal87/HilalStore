@extends('FrontEnd.layout.master')
@section('content')
    <div class="container">
        <div class="row">
            <ol class="breadcrumb">
                <li><a href="{{route('anasehife')}}">Anasehife</a></li>
                <li>Axtarish Neticasi</li>
            </ol>
            <div class="products bg-content">
                <div class="row">
                    @if(count($mehsullar)==0)
                        <div class="col-md-12 text-center">
                           <p><b>Bir Mehsul Tapilmadi</b></p>
                        </div>
                    @endif
                    @foreach($mehsullar as $mehsul)
                        <div class="col-md-3 product">
                            <a href="{{route('mehsul',$mehsul->slug)}}">
                                <img src="http://via.placeholder.com/250x250?text=mehsulShekli" alt="Los Angeles"
                                     alt="{{$mehsul->mehsul_adi}}">
                            </a>
                        <p>
                            <a href="{{route('mehsul',$mehsul->slug)}}">
                                {{$mehsul->mehsul_adi}}
                            </a>

                        </p>
                            <p>{{$mehsul->qiymeti}} Azn</p>
                        </div>
                        @endforeach
                </div>
                {{$mehsullar->appends(['axtarilan'=> old('axtarilan')])->links() }}
            </div>
        </div>
    </div>
    @endsection