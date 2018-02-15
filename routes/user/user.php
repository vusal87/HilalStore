<?php
Route::get('/sifarishler','SifarishController@index')->name('sifarishler');
Route::get('/sifarishler/{id}','SifarishController@detal')->name('sifarish');