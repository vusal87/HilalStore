
@if(isset($errors) && $errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach($errors->all() as $error)
                <li>{{$error}}</li>
                @endforeach
        </ul>
    </div>
@endif

<div style="position: absolute; bottom: 50px;right: 10px">
    {{ session('error') }}
</div>
