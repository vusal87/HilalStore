<!DOCTYPE html>
<html lang="{{config('app.locale')}}">

<head>

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>@yield('title',config('app.name'))</title>
    @include('FrontEnd.layout.Partials.head')
    @yield('head')
</head>

<body>
<!-- header -->
@include('FrontEnd.layout.Partials.nav')

@yield('content')






<!-- footer -->
@include('FrontEnd.layout.Partials.footer')
@yield('footer')
<!-- //footer -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
{{--<script src="{{asset('frontend/js/owl.carousel.min.js')}} "></script>--}}

{{--<script src="{{asset('frontend/js/bootstrap.min.js')}} "></script>--}}

<script src="{{asset('frontend/js/classie.js')}} "></script>

<script src="{{asset('frontend/js/uisearch.js')}} "></script>

<script src="{{asset('frontend/js/jquery.min.js')}} "></script>
<script src="{{asset('frontend/js/script.js')}} "></script>

<script src="{{asset('frontend/js/bootstrap-3.1.1.min.js')}} "></script>

<script src="{{asset('frontend/js/payment_js/demo.js')}} "></script>


<script src="{{asset('frontend/js/payment_js/config.js')}} "></script>


<script src="{{asset('frontend/js/app.js')}} "></script>


<script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>

</body>

</html>