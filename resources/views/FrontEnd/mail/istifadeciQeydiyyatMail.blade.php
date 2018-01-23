<h1>{{config('app.name')}}</h1>
<p>Salam {{$istifadeci->adSoyad}}, ugurlu bir shekile Qeydiyyatdan kecdiniz</p>
<p>Qeyydiyatinizi aktivlesdirmek ucun <a href="{{config('app.url')}}/istifadeci/aktivleshdir/{{$istifadeci->aktivasyon_acari}}">
        uzerine sixin</a>ve ya asagdaki baglantiyi brouzerinizde acin</p>
<p>{{config('app.url')}}/istifadeci/aktivleshdir/{{$istifadeci->aktivasyon_acari}} </p>