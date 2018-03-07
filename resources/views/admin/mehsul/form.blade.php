@extends('admin.layouts.master')
@section('title','Mehsul Idare OLunmasi')
@section('content')





    <form method="post" action="{{route('admin.mehsul.yaddaSaxla',@$entry->id)}}" enctype="multipart/form-data">
        {{csrf_field()}}
        <div class="pull-rught">
            <button type="submit" class="btn btn-primary">
                {{@$entry->id>0? "duzelt":"yaddaSaxla"}}
            </button>
        </div>
        <h1 class="page-header">
            Mehsul {{@$entry->id>0? "duzelt":"yeni"}}
        </h1>

        @include('FrontEnd.layout.Partials.errors')
        @include('FrontEnd.layout.Partials.alert')

        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="mehsul_adi">Mehsul Adi</label>
                    <input type="text" id="mehsul_adi" name="mehsul_adi" class="form-control" placeholder="Mehsul Adi" value="{{old('mehsul_adi',$entry->mehsul_adi)}}">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="slug">Slug</label>
                    <input type="hidden" name="original_slug" value="{{old('slug',$entry->slug)}}" >
                    <input type="text" class="form-control" name="slug" id="slug" placeholder="slug" value="{{old('slug',$entry->slug)}}">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label for="aciqlama">Aciqlama</label>
                    <textarea id="aciqlama" name="aciqlama" class="form-control" placeholder="Aciqlama">{{old('mehsul_adi',$entry->aciqlama)}}</textarea>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="qiymeti">Qiymeti</label>
                    <input type="text" id="qiymeti" name="qiymeti" class="form-control" placeholder="Qiymeti" value="{{old('qiymeti',$entry->qiymeti)}}">
                </div>
            </div>
        </div>
        <div class="checkbox">
            <label>
                <input type="hidden" name="goster_slider" value="0">
                <input type="checkbox" name="goster_slider" value="1" {{old('goster_slider',$entry->detay->goster_slider) ? 'checked':''}}> Sliderde Goster
            </label>
            <label>
                <input type="hidden" name="cox_satilan" value="0">
                <input type="checkbox" name="cox_satilan" value="1" {{old('cox_satilan',$entry->detay->cox_satilan) ? 'checked':''}}> Cox satilan bolmesinde Goster
            </label>
            <label>
                <input type="hidden" name="endirimli" value="0">
                <input type="checkbox" name="endirimli" value="1" {{old('endirimli',$entry->detay->endirimli) ? 'checked':''}}> Endirimli bolmesinde Goster
            </label>
        </div>

        <div class="col-md-12">
            <div class="form-group">
                <label for="kateqoriyalar">Kateqoriyalar</label>
                <select name="kateqoriler[]" class="form-control" id="kateqoriyalar"  multiple>
            @foreach($kateqoriler as $kateqori)
                        <option value="{{$kateqori->id}}"{{collect(old('$kateqoriler',$mehsul_kateqoriler))->contains($kateqori->id)?'selected':''}}>{{$kateqori->kateqori_adi}}</option>
                @endforeach
                </select>
            </div>
        </div>

        <div class="form-group images-groups">
            @if($entry->detay->mehsul_shekli!= null)
                <img src="/uploads/mehsullar/{{$entry->detay->mehsul_shekli}}" alt="" style="height: 100px; width: 100px">
                @endif
            {{csrf_field()}}
            <label for="mehsul_shekli">Mehsul_shekli</label>
            <input type="file" id="mehsul_shekli" name="mehsul_shekli[]" multiple>
        </div>


    </form>
    @endsection

@section('head')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />

@endsection

@section('footer')

    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
    <script>
        $(function () {
            $('#kateqoriyalar').select2({
                placeholder:'Kateqoriya secin'
            })
        });
    </script>
@endsection