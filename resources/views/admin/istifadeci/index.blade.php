@extends('admin.layouts.master')
@section('title','istifadeci Idare OLunmasi')
@section('content')
    <h1 class="page-header">Istifadeci Idare Olunmasi</h1>

    <h3 class="sub-header"> Istifadeci Listesi
        <div class="well">
            <div class="btn-group pull-right" >
                <a href="{{route('admin.istifadeci.yeni')}}" class="btn btn-primary">Yeni</a>
            </div>

            <form action="{{route('admin.istifadeci')}}" class="form-inline" method="post">
                {{csrf_field()}}
                <label for="axtarilan">Axtar</label>
                <input type="text" class="form-control form-control-sm" name="axtarilan" id="axtarilan" placeholder="Ad ve ya Email axtar" value="{{old('axtarilan')}}">
            <button type="submit" class="btn btn-primary">Axtar</button>
                <a href="{{route('admin.istifadeci')}}" class="btn btn-primary">Temizle</a>
            </form>
        </div>
    </h3>
    @include('FrontEnd.layout.Partials.alert')
    <div class="table-responsive">
        <table class="table table-hover table-bordered">
            <thead class="thead-dark">
            <tr>
                <th>#</th>
                <th>Adi Soyadi</th>
                <th>Email Adresi</th>
                <th>Aktivmi</th>
                <th>admin</th>
                <th>Qeydiyyat Tarixi</th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            @foreach($list as  $entry)


            <tr>
                <td>{{$entry->id}}</td>
                <td>{{$entry->adSoyad}}</td>
                <td>{{$entry->email}}</td>
                <td>
                    @if($entry->aktif_mi)
                        <span class="label label-success">Aktiv</span>
                        @else
                    <span class="label label-warning">Passiv</span>
                        @endif
                </td>

                <td>
                    @if($entry->admin_mi)
                        <span class="label label-success">Aktiv</span>
                    @else
                        <span class="label label-warning">Passiv</span>
                    @endif
                </td>
                <td>{{$entry->created_at}}</td>

                <td style="width: 100px">
                    <a href="{{route('admin.istifadeci.duzelt',$entry->id)}}" class="btn btn-xs btn-success" data-toggle="tooltip" data-placement="top" title="duzelt">
                        <span class="fa fa-pencil"></span>
                    </a>
                    <a href="{{route('admin.istifadeci.sil',$entry->id)}}" class="btn btn-xs btn-danger" data-toggle="tooltip" data-placement="top" title="Sil" onclick="return confirm('Eminsenmi?')">
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