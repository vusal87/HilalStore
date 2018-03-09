<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class sifarish extends Model
{

    protected  $table ='sifarish';

    protected $fillable=[
        'sebet_id','sifarish_deyeri','veziyyet',
        'bank','adSoyad','adres','ev_telefon','el_telefon'
    ];



    public  function sebet()
    {
        return $this ->belongsTo('App\Models\sebet');
    }


}
