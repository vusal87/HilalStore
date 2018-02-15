@extends('admin.layouts.master')
@section('title','istifadeci Idare OLunmasi')
@section('content')





    <form method="post" action="{{route('admin.istifadeci.yaddaSaxla',@$entry->id)}}">
        {{csrf_field()}}
        <div class="pull-rught">
            <button type="submit" class="btn btn-primary">
                {{@$entry->id>0? "duzelt":"yaddaSaxla"}}
            </button>
        </div>
        <h1 class="page-header">
        Istifadeci {{@$entry->id>0? "duzelt":"yeni"}}
        </h1>

        @include('FrontEnd.layout.Partials.errors')
        @include('FrontEnd.layout.Partials.alert')
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="adsoyad">AdSoyad</label>
                    <input type="text" id="adsoyad" name="adSoyad" class="form-control" placeholder="Ad Soyad" value="{{old('adSoyad',$entry->adSoyad)}}">
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" class="form-control" placeholder="Email" value="{{old('email',$entry->email)}}">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="shifre">Shifre</label>
                    <input type="password" class="form-control" name="shifre" id="shifre" placeholder="shifre">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label for="adres">Adres</label>
                    <input type="text" class="form-control" name="adres" id="adres" placeholder="Adres" value="{{old('adres',$entry->melumat->adres)}}">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label for="telefon">Telefon</label>
                    <input type="text" class="form-control" id="telefon" name="ev_telefonu" placeholder="Telefon" value="{{old('ev_telefonu',$entry->melumat->ev_telefonu)}}">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label for="mobil">Mobil</label>
                    <input type="text" class="form-control" id="mobil" placeholder="Mobil" name="el_telefonu" value="{{old('el_telefonu',$entry->melumat->el_telefonu )}}">
                </div>
            </div>
        </div>

        <div class="checkbox">
            <label>
                <input type="hidden" name="aktif_mi" value="0">
                <input type="checkbox" name="aktif_mi" value="1" {{old('aktif_mi',$entry->aktif_mi) ? 'checked':''}}> Aktif_mi
            </label>
        </div>
        <div class="checkbox">
            <label>
                <input type="hidden" name="admin_mi" value="0">
                <input type="checkbox" name="admin_mi" value="1" {{old('admin_mi',$entry->admin_mi) ? 'checked':''}}> admin_mi
            </label>
        </div>
    </form>
    @endsection