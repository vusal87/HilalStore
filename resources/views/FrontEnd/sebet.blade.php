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
            <!---728x90--->
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
        {{--dd(\App\Models\mehsul::find($mehsulCartItem->id)->detay->mehsul_shekli);--}}
        {{--@endphp--}}
                            <a href="{{route('mehsul',$mehsulCartItem->options->slug) }}">
                                <img src="{{$mehsulCartItem->photos &&$mehsulCartItem->options->shekil && $mehsulCartItem->options->shekil[0]->img_name !=null ?
                                             asset('/uploads/mehsullar/'.$mehsulCartItem->options->shekil[0]->img_name) :'http://via.placeholder.com/300x200?text=mehsulShekli'}}"
                                     alt="" style="max-height: 250px"  class="img-responsive" >



                                {{--<img src="http://via.placeholder.com/150x150?text=mehsulShekli" alt=" " class="img-responsive" />--}}
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

                    <a class="shopingCart hover pull-right"  href="{{route('odeme')}}">Sifariş et</a>


                    <div class="clearfix"> </div>
                </div>
            @endif
            </div>
        </div>
    </div>





    {{--<section class="main-container col1-layout">--}}
        {{--<div class="main container">--}}
            {{--<div class="col-main">--}}
                {{--<div class="shopping-cart-inner">--}}
                    {{--<div class="page-title">--}}
                        {{--<h2>Shopping Cart Summary</h2>--}}
                    {{--</div>--}}
                    {{--<div class="page-content">--}}
                        {{--<ul class="step">--}}
                            {{--<li class="current-step"><span>01. Summary</span></li>--}}
                            {{--<li><span>02. Sign in</span></li>--}}
                            {{--<li><span>03. Address</span></li>--}}
                            {{--<li><span>04. Shipping</span></li>--}}
                            {{--<li><span>05. Payment</span></li>--}}
                        {{--</ul>--}}
                        {{--<div class="heading-counter warning">Your shopping cart contains: <span>2 Product</span> </div>--}}
                        {{--<div class=" table-responsive"> <div class="order-detail-content">--}}
                                {{--<table class="table table-bordered jtv-cart-summary">--}}
                                    {{--<thead>--}}
                                    {{--<tr>--}}
                                        {{--<th class="cart_product">Product</th>--}}
                                        {{--<th>Description</th>--}}
                                        {{--<th>Avail.</th>--}}
                                        {{--<th>Unit price</th>--}}
                                        {{--<th>Qty</th>--}}
                                        {{--<th>Total</th>--}}
                                        {{--<th class="action"><i class="fa fa-trash-o"></i></th>--}}
                                    {{--</tr>--}}
                                    {{--</thead>--}}
                                    {{--<tbody>--}}
                                    {{--<tr>--}}
                                        {{--<td class="cart_product"><a href="#"><img class="img-responsive" src="images/products/img02.jpg" alt="Product"></a></td>--}}
                                        {{--<td class="cart_description"><p class="product-name"><a href="#"> Product Title Here </a></p>--}}
                                            {{--<small class="cart_ref">SKU : #987654</small><br>--}}
                                            {{--<small><a href="#">Color : Pink</a></small><br></td>--}}
                                        {{--<td class="cart_avail"><span class="label label-success">In stock</span></td>--}}
                                        {{--<td class="price"><span>$99.00</span></td>--}}
                                        {{--<td class="qty"><input class="form-control input-sm" type="text" value="1">--}}
                                            {{--<a href="#"><i class="fa fa-plus"></i></a> <a href="#"><i class="fa fa-minus"></i></a></td>--}}
                                        {{--<td class="price"><span>$99.00</span></td>--}}
                                        {{--<td class="action"><a href="#">Delete item</a></td>--}}
                                    {{--</tr>--}}
                                    {{--<tr>--}}
                                        {{--<td class="cart_product"><a href="#"><img class="img-responsive" src="images/products/img03.jpg" alt="Product"></a></td>--}}
                                        {{--<td class="cart_description"><p class="product-name"><a href="#"> Product Title Here </a></p>--}}
                                            {{--<small class="cart_ref">SKU : #123654999</small><br>--}}
                                            {{--<small><a href="#">Color : Orange</a></small><br></td>--}}
                                        {{--<td class="cart_avail"><span class="label label-success">In stock</span></td>--}}
                                        {{--<td class="price"><span>$49.00</span></td>--}}
                                        {{--<td class="qty"><input class="form-control input-sm" type="text" value="2">--}}
                                            {{--<a href="#"><i class="fa fa-plus"></i></a> <a href="#"><i class="fa fa-minus"></i></a></td>--}}
                                        {{--<td class="price"><span>$98.00</span></td>--}}
                                        {{--<td class="action"><a href="#">Delete item</a></td>--}}
                                    {{--</tr>--}}
                                    {{--<tr>--}}
                                        {{--<td class="cart_product"><a href="#"><img class="img-responsive" src="images/products/img04.jpg" alt="Product"></a></td>--}}
                                        {{--<td class="cart_description"><p class="product-name"><a href="#"> Product Title Here </a></p>--}}
                                            {{--<small class="cart_ref">SKU : #123654999</small><br>--}}
                                            {{--<small><a href="#">Color : Red</a></small><br></td>--}}
                                        {{--<td class="cart_avail"><span class="label label-success">In stock</span></td>--}}
                                        {{--<td class="price"><span>$89.00</span></td>--}}
                                        {{--<td class="qty"><input class="form-control input-sm" type="text" value="1">--}}
                                            {{--<a href="#"><i class="fa fa-plus"></i></a> <a href="#"><i class="fa fa-minus"></i></a></td>--}}
                                        {{--<td class="price"><span>$89.00</span></td>--}}
                                        {{--<td class="action"><a href="#">Delete item</a></td>--}}
                                    {{--</tr>--}}
                                    {{--<tr>--}}
                                        {{--<td class="cart_product"><a href="#"><img class="img-responsive" src="images/products/img08.jpg" alt="Product"></a></td>--}}
                                        {{--<td class="cart_description"><p class="product-name"><a href="#"> Product Title Here </a></p>--}}
                                            {{--<small class="cart_ref">SKU : #123654999</small><br>--}}
                                            {{--<small><a href="#">Color : Grey</a></small><br></td>--}}
                                        {{--<td class="cart_avail"><span class="label label-success">In stock</span></td>--}}
                                        {{--<td class="price"><span>$69.00</span></td>--}}
                                        {{--<td class="qty"><input class="form-control input-sm" type="text" value="1">--}}
                                            {{--<a href="#"><i class="fa fa-plus"></i></a> <a href="#"><i class="fa fa-minus"></i></a></td>--}}
                                        {{--<td class="price"><span>$69.00</span></td>--}}
                                        {{--<td class="action"><a href="#">Delete item</a></td>--}}
                                    {{--</tr>--}}
                                    {{--</tbody>--}}
                                    {{--<tfoot>--}}
                                    {{--<tr>--}}
                                        {{--<td colspan="2" rowspan="2"></td>--}}
                                        {{--<td colspan="3">Total products (tax incl.)</td>--}}
                                        {{--<td colspan="2">$355.00</td>--}}
                                    {{--</tr>--}}
                                    {{--<tr>--}}
                                        {{--<td colspan="3"><strong>Total</strong></td>--}}
                                        {{--<td colspan="2"><strong>$355.00</strong></td>--}}
                                    {{--</tr>--}}
                                    {{--</tfoot>--}}
                                {{--</table>--}}
                                {{--<div class="cart_navigation">--}}
                                    {{--<button class="button continue-shopping" title="Continue shopping" type="button"><span>Continue shopping</span></button>--}}
                                    {{--<button class="button btn-proceed-checkout" title="Proceed to Checkout" type="button"><span>Proceed to Checkout</span></button>--}}
                                {{--</div>--}}
                            {{--</div></div>--}}
                    {{--</div>--}}
                {{--</div>--}}
                {{--<div class="crosssel">--}}
                    {{--<div class="jtv-title">--}}
                        {{--<h2>You may be interested</h2>--}}
                    {{--</div>--}}
                    {{--<div class="category-products">--}}
                        {{--<ul class="products-grid">--}}
                            {{--<li class="item col-lg-3 col-md-3 col-sm-4 col-xs-6">--}}
                                {{--<div class="item-inner">--}}
                                    {{--<div class="item-img">--}}
                                        {{--<div class="item-img-info"> <a class="product-image" title="Product Title Here" href="single_product.html"> <img class="img-responsive" alt="Product Title Here" src="images/products/img13.jpg"> </a>--}}
                                            {{--<div class="action"> <a href="compare.html" title="Compare" ><i class="fa fa-signal"></i></a> <a href="quick_view.html" title="Quick view" ><i class="fa fa-search"></i></a> <a href="wishlist.html" title="Wishlist" ><i class="fa fa-heart-o"></i></a> <a href="shopping_cart.html" title="Add to cart" ><i class="fa fa-shopping-cart"></i></a> </div>--}}
                                        {{--</div>--}}
                                    {{--</div>--}}
                                    {{--<div class="item-info">--}}
                                        {{--<div class="info-inner">--}}
                                            {{--<div class="item-title"> <a title="Product Title Here" href="single_product.html"> Product Title Here </a> </div>--}}
                                            {{--<div class="item-content">--}}
                                                {{--<div class="rating"> <i class="fa fa-star-o"></i> <i class="fa fa-star-o"></i> <i class="fa fa-star-o"></i> <i class="fa fa-star-o"></i> <i class="fa fa-star-o"></i> </div>--}}
                                                {{--<div class="item-price">--}}
                                                    {{--<div class="price-box"> <span class="regular-price"> <span class="price">$155.00</span> </span> </div>--}}
                                                {{--</div>--}}

                                            {{--</div>--}}
                                        {{--</div>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                            {{--</li>--}}
                            {{--<li class="item col-lg-3 col-md-3 col-sm-4 col-xs-6">--}}
                                {{--<div class="item-inner">--}}
                                    {{--<div class="item-img">--}}
                                        {{--<div class="item-img-info"> <a class="product-image" title="Product Title Here" href="single_product.html"> <img class="img-responsive" alt="Product Title Here" src="images/products/img01.jpg"> </a>--}}
                                            {{--<div class="action"> <a href="compare.html" title="Compare" ><i class="fa fa-signal"></i></a> <a href="quick_view.html" title="Quick view" ><i class="fa fa-search"></i></a> <a href="wishlist.html" title="Wishlist" ><i class="fa fa-heart-o"></i></a> <a href="shopping_cart.html" title="Add to cart" ><i class="fa fa-shopping-cart"></i></a> </div>--}}
                                        {{--</div>--}}
                                    {{--</div>--}}
                                    {{--<div class="item-info">--}}
                                        {{--<div class="info-inner">--}}
                                            {{--<div class="item-title"> <a title="Product Title Here" href="single_product.html"> Product Title Here </a> </div>--}}
                                            {{--<div class="item-content">--}}
                                                {{--<div class="rating"> <i class="fa fa-star-o"></i> <i class="fa fa-star-o"></i> <i class="fa fa-star-o"></i> <i class="fa fa-star-o"></i> <i class="fa fa-star-o"></i> </div>--}}
                                                {{--<div class="item-price">--}}
                                                    {{--<div class="price-box"> <span class="regular-price"> <span class="price">$225.00</span> </span> </div>--}}
                                                {{--</div>--}}

                                            {{--</div>--}}
                                        {{--</div>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                            {{--</li>--}}
                            {{--<li class="item col-lg-3 col-md-3 col-sm-4 col-xs-6">--}}
                                {{--<div class="item-inner">--}}
                                    {{--<div class="item-img">--}}
                                        {{--<div class="item-img-info"> <a class="product-image" title="Product Title Here" href="single_product.html"> <img class="img-responsive" alt="Product Title Here" src="images/products/img02.jpg"> </a>--}}
                                            {{--<div class="action"> <a href="compare.html" title="Compare" ><i class="fa fa-signal"></i></a> <a href="quick_view.html" title="Quick view" ><i class="fa fa-search"></i></a> <a href="wishlist.html" title="Wishlist" ><i class="fa fa-heart-o"></i></a> <a href="shopping_cart.html" title="Add to cart" ><i class="fa fa-shopping-cart"></i></a> </div>--}}
                                        {{--</div>--}}
                                    {{--</div>--}}
                                    {{--<div class="item-info">--}}
                                        {{--<div class="info-inner">--}}
                                            {{--<div class="item-title"> <a title="Product Title Here" href="single_product.html"> Product Title Here </a> </div>--}}
                                            {{--<div class="item-content">--}}
                                                {{--<div class="rating"> <i class="fa fa-star-o"></i> <i class="fa fa-star-o"></i> <i class="fa fa-star-o"></i> <i class="fa fa-star-o"></i> <i class="fa fa-star-o"></i> </div>--}}
                                                {{--<div class="item-price">--}}
                                                    {{--<div class="price-box"> <span class="regular-price"> <span class="price">$99.00</span> </span> </div>--}}
                                                {{--</div>--}}

                                            {{--</div>--}}
                                        {{--</div>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                            {{--</li>--}}
                            {{--<li class="item col-lg-3 col-md-3 col-sm-4 col-xs-6">--}}
                                {{--<div class="item-inner">--}}
                                    {{--<div class="item-img">--}}
                                        {{--<div class="item-img-info"> <a class="product-image" title="Product Title Here" href="single_product.html"> <img class="img-responsive" alt="Product Title Here" src="images/products/img03.jpg"> </a>--}}
                                            {{--<div class="new-label new-top-left">new</div>--}}
                                            {{--<div class="action"> <a href="compare.html" title="Compare" ><i class="fa fa-signal"></i></a> <a href="quick_view.html" title="Quick view" ><i class="fa fa-search"></i></a> <a href="wishlist.html" title="Wishlist" ><i class="fa fa-heart-o"></i></a> <a href="shopping_cart.html" title="Add to cart" ><i class="fa fa-shopping-cart"></i></a> </div>--}}
                                        {{--</div>--}}
                                    {{--</div>--}}
                                    {{--<div class="item-info">--}}
                                        {{--<div class="info-inner">--}}
                                            {{--<div class="item-title"> <a title="Product Title Here" href="single_product.html"> Product Title Here </a> </div>--}}
                                            {{--<div class="item-content">--}}
                                                {{--<div class="rating"> <i class="fa fa-star-o"></i> <i class="fa fa-star-o"></i> <i class="fa fa-star-o"></i> <i class="fa fa-star-o"></i> <i class="fa fa-star-o"></i> </div>--}}
                                                {{--<div class="item-price">--}}
                                                    {{--<div class="price-box">--}}
                                                        {{--<p class="special-price"> <span class="price-label">Special Price</span> <span class="price"> $156.00 </span> </p>--}}
                                                        {{--<p class="old-price"> <span class="price-label">Regular Price:</span> <span class="price"> $167.00 </span> </p>--}}
                                                    {{--</div>--}}
                                                {{--</div>--}}

                                            {{--</div>--}}
                                        {{--</div>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                            {{--</li>--}}
                        {{--</ul>--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</section>--}}
    @endsection
