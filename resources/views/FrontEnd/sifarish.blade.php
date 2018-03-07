@extends('FrontEnd.layout.master')
@section('title','sifaris')
@section('content')
    <div class="container">
        <div class="bg-content">
            <a href="{{route('sifarishler')}}" class="btn btn-group btn-danger ">
                <i class="glyphicon glyphicon-arrow-left"> Sifarishlere qayit</i>
            </a>
            <h2>Sipariş (SP-{{$sifarish->id}})</h2>
            <table class="table table-bordererd table-hover">
                <tr>
                    <th colspan="2">Mehsul</th>
                    <th>Qiymeti</th>
                    <th>Eded</th>
                    <th>Toplam</th>
                    <th>Veziyyeti</th>
                </tr>
                @foreach($sifarish->sebet->sebet_mehsullar as $sebet_mehsul)
                <tr>

                    <td style="width: 120px">
                        <a href="{{route('mehsul',$sebet_mehsul->mehsul->slug)}}">
                            <img src="{{($sebet_mehsul->photos) && $sebet_mehsul->photos[0]->img_name !=null ?
                                             asset('/uploads/mehsullar/'.$sebet_mehsul->photos[0]->img_name) :'http://via.placeholder.com/300x200?text=mehsulShekli'}}"
                                 alt="" style="min-height:120px;max-height: 100px"  class="img-responsive" >
                         </a>
                    </td>
                    <td>
                        <a href="{{route('mehsul',$sebet_mehsul->mehsul->slug)}}">
                           {{$sebet_mehsul->mehsul->mehsul_adi}}
                        </a>

                    </td>
                    <td>{{$sebet_mehsul->qiymeti}}azn</td>
                    <td>{{$sebet_mehsul->eded}}</td>
                    <td>{{$sebet_mehsul->qiymeti * $sebet_mehsul->eded}}azn</td>
                    <td>{{$sebet_mehsul->veziyyet}}</td>
                </tr>
                @endforeach
                <tr>

                    <th colspan="4">Toplam Odenilecek Mebleg</th>
                    <td colspan="2">{{$sifarish->sifarish_deyeri}}azn</td>

                </tr>
                <tr>
                    <th colspan="4">Sifarish Veziyyeti</th>
                    <td colspan="2">{{$sifarish->veziyyet}}</td>

                </tr>


            </table>
        </div>
    </div>
    @endsection