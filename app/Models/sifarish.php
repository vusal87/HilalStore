<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class sifarish extends Model
{
    use SoftDeletes;

    protected  $table ='sifarish';

    protected $fillable=[
        'sebet_id','sifarish_deyeri','veziyyet',
        'bank','adSoyad','adres','ev_telefon','el_telefon'
    ];

    const CREATED_AT = 'yaradilma_tarixi';
    const UPDATED_AT = 'guncellenme_tarixi';
    const DELETED_AT='silinme_tarixi';

    public  function sebet()
    {
        return $this ->belongsTo('App\Models\sebet');
    }


}
