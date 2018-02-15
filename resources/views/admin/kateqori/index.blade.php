@extends('admin.layouts.master')
@section('title','Kateqotiya Idare OLunmasi')
@section('content')
    <h1 class="page-header">Kateqotiya Idare Olunmasi</h1>

    <h3 class="sub-header"> Kateqotiya Listesi
        <div class="well">
            <div class="btn-group pull-right" >
                <a href="{{route('admin.kateqori.yeni')}}" class="btn btn-primary">Yeni</a>
            </div>

            <form action="{{route('admin.kateqori')}}" class="form-inline" method="post">
                {{csrf_field()}}
                <label for="axtarilan">Axtar</label>
                <input type="text" class="form-control form-control-sm" name="axtarilan" id="axtarilan" placeholder="Kateqoriya axtar" value="{{old('axtarilan')}}">
                <label for="ust_id">Esas Bolme</label>
                <select name="ust_id" id="ust_id" class="form-control">
                    <option value="">Secin</option>
                    @foreach($anakateqoriler as $kateqori)
                        <option value="{{$kateqori->id}}" {{old('ust_id')==$kateqori->id ?'selected':''}}>{{$kateqori->kateqori_adi}}</option>
                        @endforeach
                </select>
            <button type="submit" class="btn btn-primary">Axtar</button>
                <a href="{{route('admin.kateqori')}}" class="btn btn-primary">Temizle</a>
            </form>
        </div>
    </h3>
    @include('FrontEnd.layout.Partials.alert')
    <div class="table-responsive">
        <table class="table table-hover table-bordered">
            <thead class="thead-dark">
            <tr>
                <th>#</th>
                <th>Esas Bolme</th>
                <th>Slug</th>
                <th>Bolme Adi</th>
                <th>Qeydiyyat Tarixi</th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            @if(count($list)==0)
                <tr><td colspan="6" class="text-center">Bu kateqoriya ucun hec bir mehsul yoxdur</td></tr>
                @endif
            @foreach($list as  $entry)


            <tr>
                <td>{{$entry->id}}</td>
                <td>{{$entry->ust_kateqori->kateqori_adi}}</td>
                <td>{{$entry->slug}}</td>
                <td>{{$entry->kateqori_adi}}</td>
                <td>{{$entry->yaradilma_tarixi}}</td>

                <td style="width: 100px">
                    <a href="{{route('admin.kateqori.duzelt',$entry->id)}}" class="btn btn-xs btn-success" data-toggle="tooltip" data-placement="top" title="duzelt">
                        <span class="fa fa-pencil"></span>
                    </a>
                    <a href="{{route('admin.kateqori.sil',$entry->id)}}" class="btn btn-xs btn-danger" data-toggle="tooltip" data-placement="top" title="Sil" onclick="return confirm('Eminsenmi?')">
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