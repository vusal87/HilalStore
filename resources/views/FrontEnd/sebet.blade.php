@extends('FrontEnd.layout.master')
@section('title','sebet')

@section('content')
    <div class="breadcrumbs">
        <div class="container">
            <ol class="breadcrumb breadcrumb1 animated wow slideInLeft" data-wow-delay=".5s">
                <li><a href="{{route('anasehife')}}"><i class="fa fa-home"></i>Ana Sehife</a></li>
                <li class="active">Sebet sehifesi</li>
            </ol>
        </div>
    </div>






    <div class="checkout">
        <div class="container">
            <div class="row">
            <h3 class="animated wow slideInLeft" data-wow-delay=".5s">Sebetinizde: <span>{{Cart::count()}} Mehsul var</span></h3>


            <div class="checkout-right animated wow slideInUp" data-wow-delay=".5s">
                <table class="timetable_sub table">
                    <thead>
                    <tr>
                        <th scope ="col">Mehsul</th>
                        <th scope ="col">Miqdari</th>
                        <th scope ="col" >Mehsul Adi</th>
                        <th scope ="col">Qiymeti</th>
                        <th scope ="col">Mehsulu sil</th>
                    </tr>
                    </thead>

                    <div class="checkout-right-basket animated wow slideInRight" data-wow-delay=".5s">
                        <a href="{{route('anasehife')}}"><i class="fas fa-chevron-left fa-2x"></i>Aliş verişe davam</a>
                    </div>
                    @if(Cart::content())

                    @foreach(Cart::content() as $mehsulCartItem)
                    <tr class="rem1">
                        <td class="invert-image row">

        {{--@php--}}
        {{--dd( Cart::content());--}}
        {{--@endphp--}}
                            <a href="{{route('mehsul',$mehsulCartItem->options->slug) }}">
                                <img src="{{$mehsulCartItem->options->shekil && $mehsulCartItem->options->shekil[0]->img_name !=null ?
                                             asset('/uploads/mehsullar/'.$mehsulCartItem->options->shekil[0]->img_name) :'http://via.placeholder.com/300x200?text=mehsulShekli'}}"
                                     alt="" style="max-height: 250px"  class="img-responsive" >

                            </a>
                        </td>
                        <td class="invert">
                            <div class="quantity">
                                <div class="quantity-select">

                                    <div  class="entry value-minus mehsul-azalt" data-id="{{$mehsulCartItem->rowId}}" data-eded="{{$mehsulCartItem->qty-1}}">&nbsp;</div>
                                    <div  class="entry value"><span id="{{$mehsulCartItem->rowId}}">{{$mehsulCartItem->qty}}</span></div>
                                    <div  class="entry value-plus mehsul-artir active" data-id="{{$mehsulCartItem->rowId}}" data-eded="{{$mehsulCartItem->qty+1}}">&nbsp;</div>
                                </div>
                            </div>
                        </td>

                        <td class="invert invertName">
                            <a href="{{route('mehsul',$mehsulCartItem->options->slug) }}">
                               <h3>{{$mehsulCartItem->name}}</h3>
                            </a>

                        </td>
                        <td class="invert invertPrice">{{$mehsulCartItem->subtotal}}Azn</td>
                        <td class="invert">
                            <div class="rem">

                                    <form action="{{route('sebet.sil',$mehsulCartItem->rowId) }}" method="post">
                                        {{csrf_field()}}
                                         {{method_field('DELETE')}}
                                        <button type="submit" class="close1 btn btn-danger btn-xs ">
                                                    </button>
                                    </form>

                            </div>

                        </td>
                    </tr>
                  @endforeach

                    @else
                    <p>Sebetinizde Mehsul yoxdur</p>
                        @endif
                </table>
            </div>
            @if(count(Cart::content())>0)
                <form action="{{route('sebet.boshalt')}}" method="post">
                    {{csrf_field()}}
                    {{method_field('DELETE')}}
                    <input type="submit" class="Sebeti_Bosalt pull-left" value="Sebeti Bosalt">
                </form>

                <div class="checkout-left">
                    <div class="checkout-left-basket animated wow slideInLeft" data-wow-delay=".5s">
            <p class="text-right">
                        <tr>
                            <th colspan="4" class="text-left">Toplam Mehsul deyeri</th>
                            <th class="text-left">{{Cart::subtotal()}}Azn</th>
                        </tr><br>

                        <tr>
                            <th colspan="4" class="text-left">Xidmet Haqqi</th>
                            <th class="text-left">{{Cart::tax()}}Azn</th>
                        </tr><br>

                        <tr>
                            <th colspan="4" class="text-left">Yekun Qiymet</th>
                            <th class="text-left">{{Cart::total()}}Azn</th>
                        </tr>
            </p>
                    </div>

                    <a style="text-decoration: none" class="shopingCart hover pull-right"  href="{{route('odeme')}}">Sifariş et</a>


                    <div class="clearfix"> </div>
                </div>
            @endif
            </div>
        </div>
    </div>
    @endsection
