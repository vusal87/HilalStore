@extends('FrontEnd.layout.master')
@section('title','odeme')
@section('content')
    <section class="section">
        <div class="container-fluid">
            <form action="{{route('odemeEt')}}" method="post">
                                         {{csrf_field()}}
            <div class="section-inner col-md-12">
                <div class="section-body">
                    <div class="account-form">
                        <div class="section-subtitle" id="shipping-address">Gonderilecek Adress</div>
                        <div class="row">
                            <div class="col-md-4 col-md-offset-4">
                                <div class="row">
                                    <div class="col-md-12 col-sm-12">
                                        <div class="form-group">
                                            <label>Ad Soyad<span class="required"></span></label>
                                            <input type="text" name="adSoyad" class="form-control" value="{{auth()->user()->adSoyad}}">
                                        </div> <!-- /.form-group -->
                                    </div> <!-- /.col-md-6 -->

                                </div> <!-- /.row -->
                                <div class="form-group">
                                    <label>Ünvan<span class="required"></span></label>
                                    <input type="text" name="adres" class="form-control" value="{{$istifadeci_melumat->adres}}">
                                </div> <!-- /.form-group -->
                                <div class="row">
                                    <div class="col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <label>Şəhər <span class="required"></span></label>
                                            <select class="form-control" name="country" value="{{$istifadeci_melumat->adres}}">
                                                <optgroup label="Country" >
                                                    <option>Baki</option>
                                                    <option>Bileceri</option>
                                                    <option>Xirdalan</option>
                                                    <option>Saray</option>
                                                    <option>Sumqayit</option>
                                                </optgroup>
                                            </select> <!-- /.form-control -->
                                        </div> <!-- /.form-group -->
                                    </div> <!-- /.col-md-6 -->
                                    <div class="col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <label>Inzibati Rayon <span class="required"></span></label>
                                            <input type="text" name="city" class="form-control" placeholder="Bakinin her hansi bir rayonu nezerde tututlur">
                                        </div> <!-- /.form-group -->
                                    </div> <!-- /.col-md-6 -->
                                </div> <!-- /.row -->
                                <div class="row">
                                    <div class="col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <label>Şəhər Nomrə<span class="required"></span></label>
                                            <input type="text" name="ev_telefon" class="form-control phone" value="{{$istifadeci_melumat->ev_telefon}}">
                                        </div> <!-- /.form-group -->
                                    </div> <!-- /.col-md-6 -->
                                    <div class="col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <label>Mobil Nomrə<span class="required"></span></label>
                                            <input type="text" name="el_telefon" class="form-control phone" value="{{$istifadeci_melumat->el_telefon}}">
                                        </div> <!-- /.form-group -->
                                    </div> <!-- /.col-md-6 -->
                                </div> <!-- /.row -->
                            </div> <!-- /.col-md-12 -->
                        </div> <!-- /.row -->
                    </div> <!-- /.account-form -->
                </div> <!-- /.section-body -->

            </div> <!-- /.section-inner -->

                {{--<div class="section-inner col-md-6">--}}
                    {{--<div class="section-body">--}}

                        {{--<h2 class="section-title padding-top">Odenish Novu</h2>--}}
                        {{--<div class="line"></div>--}}
                        {{--<div class="grand-total">--}}
                            {{--<div class="grand-total-inner" data-slide=".grand-total-details," data-active=".grand-total-inner">--}}
                                {{--<div class="grand-total-toggle">--}}
                                    {{--<div class="grand-total-icon">--}}
                                        {{--<i class="ion-bag"></i>--}}
                                    {{--</div> <!-- /.grand-total-icon -->--}}
                                    {{--<div class="grand-total-label">--}}
                                        {{--Odenilecek Mebleg <span>3 Items</span>--}}
                                    {{--</div> <!-- /.grand-total-label -->--}}
                                    {{--<div class="grand-total-price">--}}
                                        {{--<span class="price">{{Cart::total()}} <small>Azn</small></span>--}}
                                    {{--</div> <!-- /.grand-total-price -->--}}
                                {{--</div>--}}

                            {{--</div> <!-- /.grand-total-inner -->--}}
                        {{--</div> <!-- /.grand-total -->--}}

                            {{--<div class="payment-method-form show" id="credit-card">--}}
                                {{--<div class="section-subtitle">Credit Card</div>--}}
                                {{--<div class="payment-method-form-inner">--}}
                                    {{--<div class="row">--}}
                                        {{--<div class="col-md-8 col-sm-8">--}}
                                            {{--<div class="form-group">--}}
                                                {{--<label for="kart_nomresi">Kart Nomresi</label>--}}
                                                {{--<input type="text" name="kart_nomresi" id="kart_nomresi" class="form-control cc bg" placeholder="&bull; &bull; &bull; &bull;   &bull; &bull; &bull; &bull;   &bull; &bull; &bull; &bull;   &bull; &bull; &bull; &bull;">--}}
                                            {{--</div> <!-- /.form-group -->--}}
                                        {{--</div> <!-- /.col-md-8 -->--}}
                                        {{--<div class="col-md-4 col-sm-4">--}}
                                            {{--<div class="form-group">--}}
                                                {{--<label for="son_istifade_tarixi">Son istifade tarixi</label>--}}
                                                {{--<input type="text" name="son_istifade_tarixi" id="son_istifade_tarixi" class="form-control cc-date" placeholder="MM / YY">--}}
                                            {{--</div> <!-- /.form-group -->--}}
                                        {{--</div> <!-- /.col-md-4 -->--}}
                                    {{--</div> <!-- /.row -->--}}
                                    {{--<div class="kartin-adi">--}}
                                        {{--<div class="row ">--}}
                                            {{--<div class="col-md-8 col-sm-8">--}}
                                                {{--<div class="form-group">--}}
                                                    {{--<label for="kartin_adi">Kart uzerinde Ad</label>--}}
                                                    {{--<input type="text" name="kartin_adi" id="kartin_adi" class="form-control">--}}
                                                {{--</div> <!-- /.form-group -->--}}
                                            {{--</div> <!-- /.col-md-8 -->--}}
                                            {{--<div class="col-md-4 col-sm-4">--}}
                                                {{--<div class="form-group">--}}
                                                    {{--<label for="kartin_3reqemli_kodu">uc reqemli kod</label>--}}
                                                    {{--<input type="text" name="kartin_3reqemli_kodu"id="kartin_3reqemli_kodu" maxlength="3" class="form-control" placeholder="&bull; &bull; &bull;">--}}
                                                {{--</div> <!-- /.form-group -->--}}
                                            {{--</div> <!-- /.col-md-4 -->--}}
                                        {{--</div> <!-- /.row -->--}}
                                        {{--<input type="submit" class="btn btn-primary pull-right odeme" value="Odeme Et" >--}}
                                    {{--</div>--}}


                                {{--</div> <!-- /.payment-method-form-inner -->--}}
                            {{--</div> <!-- /.payment-method-form -->--}}


                    {{--</div> <!-- /.section-body -->--}}

                {{--</div> <!-- /.section-inner -->--}}
            </form>
        </div> <!-- /.container -->

    </section> <!-- /.section -->

    @endsection