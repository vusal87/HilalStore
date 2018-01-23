@extends('FrontEnd.layout.master')
@section('title','odeme')
@section('content')
    <div class="container">
        <div class="bg-content">
            <h2>Siparişler</h2>
            @if(count($sifarishler)==0)
                <p>Heleki sifarisiniz yoxdu</p>
            @else
            <table class="table table-bordererd table-hover">
                <tr>
                    <th>Sipariş Kodu</th>
                    <th>Deyer</th>
                    <th>Cemi mehsul</th>
                    <th>Veziyyet</th>

                </tr>
                @foreach($sifarishler as $sifarish)
                <tr>
                    <td>SP-{{$sifarish->id}}</td>
                    <td>{{$sifarish->sifarish_deyeri}}</td>
                    <td>{{$sifarish->sebet->sebet_mehsul_eded()}}</td>
                    <td>{{$sifarish->veziyyet}}</td>

                    <td><a href="{{route('sifarish',$sifarish->id )}}" class="btn btn-sm btn-success">Detay</a></td>
                </tr>
                    @endforeach
            </table>
                @endif
        </div>
    </div>
    @endsection