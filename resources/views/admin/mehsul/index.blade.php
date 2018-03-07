@extends('admin.layouts.master')
@section('title','Mehsul Idare OLunmasi')
@section('content')
    <h1 class="page-header">Mehsul Idare Olunmasi</h1>

    <h3 class="sub-header"> Mehsul Listi
        <div class="well">
            <div class="btn-group pull-right" >
                <a href="{{route('admin.mehsul.yeni')}}" class="btn btn-primary">Yeni</a>
            </div>

            <form action="{{route('admin.mehsul')}}" class="form-inline" method="post">
                {{csrf_field()}}
                <label for="axtarilan">Axtar</label>
                <input type="text" class="form-control form-control-sm" name="axtarilan" id="axtarilan" placeholder="Axtar" value="{{old('axtarilan')}}">
            <button type="submit" class="btn btn-primary">Axtar</button>
                <a href="{{route('admin.mehsul')}}" class="btn btn-primary">Temizle</a>
            </form>
        </div>
    </h3>
    @include('FrontEnd.layout.Partials.alert')
    <div class="table-responsive">
        <table class="table table-hover table-bordered">
            <thead class="thead-dark">
            <tr>
                <th>#</th>
                <th>Şekil</th>
                <th>Slug</th>
                <th>Mehsul Adi</th>
                <th>Qiymeti</th>
                <th>Qeydiyyat Tarixi</th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            @foreach($list as  $entry)

            <tr>
                <td>{{$entry->id}}</td>
                <td>
                    {{--<img src="{{$entry->detay->mehsul_shekli!=null ?--}}
                                             {{--asset('/uploads/mehsullar/'.$entry->detay->mehsul_shekli) :'http://via.placeholder.com/300x200?text=mehsulShekli'}}"--}}
                         {{--alt=""  class="img-responsive" >--}}
                    <img src="{{count($entry->photos) && $entry->photos[0]->img_name !=null ?
                                             asset('/uploads/mehsullar/'.$entry->photos[0]->img_name) :'http://via.placeholder.com/300x200?text=mehsulShekli'}}"
                         alt="" style="max-width:80px;height: 80px" class="img-responsive" >

                </td>
                <td>{{$entry->slug}}</td>
                <td>{{$entry->mehsul_adi}}</td>
                <td>{{$entry->qiymeti}}</td>
                <td>{{$entry->yaradilma_tarixi}}</td>

                <td style="width: 100px">
                    <a href="{{route('admin.mehsul.duzelt',$entry->id)}}" class="btn btn-xs btn-success" data-toggle="tooltip" data-placement="top" title="duzelt">
                        <span class="fa fa-pencil"></span>
                    </a>
                    <a href="{{route('admin.mehsul.sil',$entry->id)}}" class="btn btn-xs btn-danger" data-toggle="tooltip" data-placement="top" title="Sil" onclick="return confirm('Eminsenmi?')">
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