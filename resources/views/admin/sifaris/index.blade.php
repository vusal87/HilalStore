@extends('admin.layouts.master')
@section('title','Mehsul Idare OLunmasi')
@section('content')
    <h1 class="page-header">Sifarişlerin Idare Olunmasi</h1>

    <h3 class="sub-header"> Sifariş Listi
        <div class="well">
            <form action="{{route('admin.sifaris')}}" class="form-inline" method="post">
                {{csrf_field()}}
                <label for="axtarilan">Axtar</label>
                <input type="text" class="form-control form-control-sm" name="axtarilan" id="axtarilan" placeholder="Axtar" value="{{old('axtarilan')}}">
            <button type="submit" class="btn btn-primary">Axtar</button>
                <a href="{{route('admin.sifaris')}}" class="btn btn-primary">Temizle</a>
            </form>
        </div>
    </h3>
    @include('FrontEnd.layout.Partials.alert')
    <div class="table-responsive">
        <table class="table table-hover table-bordered">
            <thead class="thead-dark">
            <tr>
                <th>Sifariş kodu</th>
                <th>Istifadeci</th>
                <th>Miqdar</th>
                <th>Veziyyeti</th>
                <th>Sifarish Tarixi</th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            @foreach($list as  $entry)

            <tr>
                <td>{{$entry->id}}</td>
                <td>{{$entry->sebet->istifadeci->adSoyad}}</td>
                <td>{{$entry->sifarish_deyeri * ((100+config('cart.tax'))/100) }}Azn</td>
                <td>{{$entry->veziyyet}}</td>
                <td>{{$entry->created_at}}</td>
                <td style="width: 100px">
                    <a href="{{route('admin.sifaris.duzelt',$entry->id)}}" class="btn btn-xs btn-success" data-toggle="tooltip" data-placement="top" title="duzelt">
                        <span class="fa fa-pencil"></span>
                    </a>
                    <a href="{{route('admin.sifaris.sil',$entry->id)}}" class="btn btn-xs btn-danger" data-toggle="tooltip" data-placement="top" title="Sil" onclick="return confirm('Eminsenmi?')">
                        <span class="fa fa-trash"></span>
                    </a>
                </td>
            </tr>

            @endforeach
            </tbody>
        </table>
        {{$list->appends('axtarilan',old('axtarilan'))->links()}}
    </div>
    @endsection