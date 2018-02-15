@extends('admin.layouts.master')
@section('title','Kateqoriyanin Idare OLunmasi')
@section('content')





    <form method="post" action="{{route('admin.kateqori.yaddaSaxla',@$entry->id)}}">
        {{csrf_field()}}
        <div class="pull-rught">
            <button type="submit" class="btn btn-primary">
                {{@$entry->id>0? "duzelt":"yaddaSaxla"}}
            </button>
        </div>
        <h1 class="page-header">
            Kateqori {{@$entry->id>0? "duzelt":"yeni"}}
        </h1>

        @include('FrontEnd.layout.Partials.errors')
        @include('FrontEnd.layout.Partials.alert')
        <div class="row">
            <div class="col-md-4    ">
                <div class="form-group">
                    <label for="kateqori_adi"> Ust Kateqoriya</label>
                    <select name="ust_id" id="ust_id">
                        <option value="" ></option>
                    @foreach($kateqoriler as $kateqori)

                        <option value="{{$kateqori->id}}">{{$kateqori->kateqori_adi}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="kateqori_adi">Kateqoriya Adi</label>
                    <input type="text" id="kateqori_adi" name="kateqori_adi" class="form-control" placeholder="Kateqoriya Adi" value="{{old('kateqori_adi',$entry->kateqori_adi)}}">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <label for="slug">Slug</label>
                    <input type="hidden" name="original_slug" value="{{old('slug',$entry->slug)}}" >
                    <input type="text" class="form-control" name="slug" id="slug" placeholder="slug" value="{{old('slug',$entry->slug)}}">
                </div>
            </div>
        </div>
    </form>
    @endsection