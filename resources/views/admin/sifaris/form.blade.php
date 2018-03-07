@extends('admin.layouts.master')
@section('title','Sifarişin idare OLunmasi')
@section('content')





    <form method="post" action="{{route('admin.sifaris.yaddaSaxla',@$entry->id)}}">
        {{csrf_field()}}
        <div class="pull-rught">
            <button type="submit" class="btn btn-primary">
                {{@$entry->id>0? "duzelt":"yaddaSaxla"}}
            </button>
        </div>
        <h1 class="page-header">
            Sifariş {{@$entry->id>0? "duzelt":"yeni"}}
        </h1>

        @include('FrontEnd.layout.Partials.errors')
        @include('FrontEnd.layout.Partials.alert')

        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <label for="adsoyad">Ad Soyad</label>
                    <input type="text" id="adsoyad" name="adsoyad" class="form-control" placeholder="adsoyad" value="{{old('adsoyad',$entry->adSoyad)}}">
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="ev_telefonu">Ev telefonu</label>
                    <input type="text" class="form-control" name="telefon" id="ev_telefonu" placeholder="ev_telefonu" value="{{old('ev_telefon',$entry->ev_telefon)}}">
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="el_telefonu">Əl telefonu</label>
                    <input type="text" class="form-control" name="el_telefonu" id="el_telefonu" placeholder="el_telefonu" value="{{old('el_telefon',$entry->el_telefon)}}">
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="adres">Adres</label>
                    <input type="text" class="form-control" name="adres" id="adres" placeholder="adres" value="{{old('adres',$entry->adres)}}">
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label for="veziyyet">Veziyyeti</label>
                <select name="veziyyet" class="form-control" id="veziyyet">
                    <option {{old('veziyyet',$entry->veziyyet)=='Sifarişiniz alindi'?'selected':''}}>Sifarişiniz alindi</option>
                    <option {{old('veziyyet',$entry->veziyyet)=='Ödeme təsdiqləndi'?'selected':''}}>Ödeme təsdiqləndi</option>
                    <option {{old('veziyyet',$entry->veziyyet)=='Gönderilir'?'selected':''}}>Gönderilir</option>
                    <option {{old('veziyyet',$entry->veziyyet)=='Sifarişiniz tamamlandi'?'selected':''}}>Sifarişiniz tamamlandi</option>
                </select>
            </div>
        </div>
    </form>
    <h2>Sipariş (SP-{{$entry->id}})</h2>
    <table class="table table-bordererd table-hover">
        <tr>
            <th colspan="2">Mehsul</th>
            <th>Qiymeti</th>
            <th>Eded</th>
            <th>Toplam</th>
            <th>Veziyyeti</th>
        </tr>
        @foreach($entry->sebet->sebet_mehsullar as $sebet_mehsul)
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
            <td colspan="2">{{$entry->sifarish_deyeri}}azn</td>

        </tr>
        <tr>
            <th colspan="4">Sifarish Veziyyeti</th>
            <td colspan="2">{{$entry->veziyyet}}</td>

        </tr>


    </table>
    @endsection