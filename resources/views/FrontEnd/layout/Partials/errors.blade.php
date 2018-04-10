
@if(isset($errors) && $errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach($errors->all() as $error)
                <li>{{$error}}</li>
                @endforeach
        </ul>
    </div>
@endif

<div style="position: absolute;top:48%;left: 33%;color: red;font-weight: bold;font-size: 15px">
    <div>
         {{ session('error') }}
    </div>

</div>
