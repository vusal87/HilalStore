@extends('FrontEnd.layout.master')
@section('title','sebet')

@section('content')
    <div class="breadcrumbs">
        <div class="container">
            <ol class="breadcrumb breadcrumb1 animated wow slideInLeft" data-wow-delay=".5s">
                <li><a href="{{route('anasehife')}}"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>Ana Sehife</a></li>
                <li class="active">Checkout Page</li>
            </ol>
        </div>
    </div>

    <div class="checkout">
        <div class="container">
            <h3 class="animated wow slideInLeft" data-wow-delay=".5s">Sebetinizde: <span>{{Cart::count()}} Mehsul var</span></h3>
            <!---728x90--->
            <div class="checkout-right animated wow slideInUp" data-wow-delay=".5s">
                <table class="timetable_sub">
                    <thead>
                    <tr>
                        <th>Mehsul</th>
                        <th>Miqdari</th>
                        <th >Mehsul Adi</th>
                        <th>Qiymeti</th>
                        <th>Mehsulu sil</th>
                    </tr>
                    </thead>

                    <div class="checkout-right-basket animated wow slideInRight" data-wow-delay=".5s">
                        <a href="{{route('anasehife')}}"><i class="fas fa-chevron-left fa-2x"></i>Aliş verişe davam</a>
                    </div>
                    @if(count(Cart::content())>0)
                    @foreach(Cart::content() as $mehsulCartItem)
                    <tr class="rem1">
                        <td class="invert-image">

        {{--@php--}}
        {{--dd(\App\Models\mehsul::find($mehsulCartItem->id)->detay->mehsul_shekli);--}}
        {{--@endphp--}}
                            <a href="{{route('mehsul',$mehsulCartItem->options->slug) }}">
                                <img src="{{$mehsulCartItem->options->shekil!=null ?
                                             asset('/uploads/mehsullar/'.$mehsulCartItem->options->shekil) :'http://via.placeholder.com/300x200?text=mehsulShekli'}}"
                                     alt=""   class="img-responsive" >



                                {{--<img src="http://via.placeholder.com/150x150?text=mehsulShekli" alt=" " class="img-responsive" />--}}
                            </a>
                        </td>
                        <td class="invert">
                            <div class="quantity">
                                <div class="quantity-select">
                                    <div class="entry value-minus mehsul-azalt" data-id="{{$mehsulCartItem->rowId}}" data-eded="{{$mehsulCartItem->qty-1}}">&nbsp;</div>
                                    <div class="entry value"><span id="{{$mehsulCartItem->rowId}}">{{$mehsulCartItem->qty}}</span></div>
                                    <div class="entry value-plus mehsul-artir active" data-id="{{$mehsulCartItem->rowId}}" data-eded="{{$mehsulCartItem->qty+1}}">&nbsp;</div>
                                </div>
                            </div>
                        </td>
                        
                        <td class="invert">
                            <a href="{{route('mehsul',$mehsulCartItem->options->slug) }}">
                               <h3>{{$mehsulCartItem->name}}</h3>
                            </a>

                        </td>
                        <td class="invert">{{$mehsulCartItem->subtotal}}Azn</td>
                        <td class="invert">
                            <div class="rem">

                                    <form action="{{route('sebet.sil',$mehsulCartItem->rowId) }}" method="post">
                                        {{csrf_field()}}
                                         {{method_field('DELETE')}}
                                        <input type="submit" class="close1 btn btn-danger btn-xs " value="sil">

                                    </form>

                            </div>
                            {{--<script>$(document).ready(function(c) {--}}
                                    {{--$('.close1').on('click', function(c){--}}
                                        {{--$('.rem1').fadeOut('slow', function(c){--}}
                                            {{--$('.rem1').remove();--}}
                                        {{--});--}}
                                    {{--});--}}
                                {{--});--}}
                            {{--</script>--}}
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
                    <input type="submit" class="btn btn-info pull-left" value="Sebeti Bosalt">
                </form>

                <div class="checkout-left">
                    <div class="checkout-left-basket animated wow slideInLeft" data-wow-delay=".5s">

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

                    </div>

                    <a class="btn btn-primary pull-right" href="{{route('odeme')}}">Sifariş et</a>




                    <div class="clearfix"> </div>
                </div>
            @endif

        </div>
    </div>
    @endsection
