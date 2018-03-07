<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group(['prefix'=>'admin','namespace'=>'admin'],function(){
    Route::redirect('','/admin/girish');

    Route::get('/cixish','IstifadeciController@cixish')->name('admin.cixish');


    Route::match(['get','post'],'/girish','IstifadeciController@girish')->name('admin.girish');

    Route::group(['middleware'=>'admin'],function (){
    Route::get('/anasehife','AnasehifeController@index')->name('admin.anasehife');


    Route::group(['prefix'=>'istifadeci'],function (){

        Route::match(['get','post'],'/','IstifadeciController@index')->name('admin.istifadeci');
        Route::get('/yeni','IstifadeciController@form')->name('admin.istifadeci.yeni');
        Route::get('/duzelt/{id}','IstifadeciController@form')->name('admin.istifadeci.duzelt');
        Route::post('/yaddaSaxla/{id?}','IstifadeciController@yaddaSaxla')->name('admin.istifadeci.yaddaSaxla');
        Route::get('/sil/{id}','IstifadeciController@sil')->name('admin.istifadeci.sil');

    });

        Route::group(['prefix'=>'kateqori'],function (){

            Route::match(['get','post'],'/','KateqoriController@index')->name('admin.kateqori');
            Route::get('/yeni','KateqoriController@form')->name('admin.kateqori.yeni');
            Route::get('/duzelt/{id}','KateqoriController@form')->name('admin.kateqori.duzelt');
            Route::post('/yaddaSaxla/{id?}','KateqoriController@yaddaSaxla')->name('admin.kateqori.yaddaSaxla');
            Route::get('/sil/{id}','KateqoriController@sil')->name('admin.kateqori.sil');

        });

        Route::group(['prefix'=>'mehsul'],function (){

            Route::match(['get','post'],'/','MehsulController@index')->name('admin.mehsul');
            Route::get('/yeni','MehsulController@form')->name('admin.mehsul.yeni');
            Route::get('/duzelt/{id}','MehsulController@form')->name('admin.mehsul.duzelt');
            Route::post('/yaddaSaxla/{id?}','MehsulController@yaddaSaxla')->name('admin.mehsul.yaddaSaxla');
            Route::get('/sil/{id}','MehsulController@sil')->name('admin.mehsul.sil');

        });

        Route::group(['prefix'=>'sifaris'],function (){

            Route::match(['get','post'],'/','SifarisController@index')->name('admin.sifaris');
            Route::get('/yeni','SifarisController@form')->name('admin.sifaris.yeni');
            Route::get('/duzelt/{id}','SifarisController@form')->name('admin.sifaris.duzelt');
            Route::post('/yaddaSaxla/{id?}','SifarisController@yaddaSaxla')->name('admin.sifaris.yaddaSaxla');
            Route::get('/sil/{id}','SifarisController@sil')->name('admin.sifaris.sil');

        });

    });
});


Route::get('/','AnasehifeController@index')->name('anasehife');
Route::get('/kateqori/{slug_kateqoriadi}','kateqoriyaController@index')->name('kateqori');
Route::get('/mehsul/{slug_mehsuladi}','MehsulController@index')->name('mehsul');


Route::post('/axtar','MehsulController@axtar')->name('mehsul_axtar');
Route::get('/axtar','MehsulController@axtar')->name('mehsul_axtar');


Route::group(['prefix'=>'sebet'],function (){
    Route::get('/','SebetController@index')->name('sebet');
    Route::post('add','SebetController@add')->name('sebet.add');
    Route::delete('/sil/{rowId}','SebetController@sil')->name('sebet.sil');
    Route::delete('/boshalt','SebetController@boshalt')->name('sebet.boshalt');
    Route::post('/guncelle/{rowid}','SebetController@guncelle')->name('sebet.guncelle');

});

Route::get('/odeme','OdemeController@index')->name('odeme');
Route::post('/odemeEt','OdemeController@odemeEt')->name('odemeEt');

Route::group(['middleware'=>'auth'],function (){
    include __DIR__.'/user/user.php';
});


Route::group(['prefix'=>'istifadeci'],function(){

    Route::get('/qeydiyyatAc','IstifadeciController@giris_form')->name('istifadeci.qeydiyyatAc');
    Route::post('/qeydiyyatAc','IstifadeciController@giris');

    Route::get('/qeydiyyatOl','IstifadeciController@qeydiyyat_form')->name('istifadeci.qeydiyyatOl');
    Route::post('/qeydiyyatOl','IstifadeciController@qeydiyyat');
    Route::get('/aktivlesdir/{acar}','IstifadeciController@aktivleshdir')->name('aktivleshdir');

    Route::post('/akauntuBagla','IstifadeciController@akauntuBagla')->name('istifadeci.akauntuBagla');

});
Route::get('test/mail',function(){
    $istifadeci = \App\Models\istifadeci::find(1);
   return new App\Mail\IstifadeciQeydiyyatMail($istifadeci);
});




