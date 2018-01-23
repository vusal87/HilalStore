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
    Route::patch('/guncelle/{rowid}','SebetController@guncelle')->name('sebet.guncelle');

});

Route::get('/odeme','OdemeController@index')->name('odeme');
Route::post('/odemeEt','OdemeController@odemeEt')->name('odemeEt');

Route::group(['middleware'=>'auth'],function (){
    Route::get('/sifarishler','SifarishController@index')->name('sifarishler');
    Route::get('/sifarishler/{id}','SifarishController@detal')->name('sifarish');

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




