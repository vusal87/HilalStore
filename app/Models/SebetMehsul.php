<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\mehsul;

class SebetMehsul extends Model
{
use SoftDeletes;

protected  $table="sebet_mehsul";
    protected $guarded=[];
    const CREATED_AT = 'yaradilma_tarixi';
    const UPDATED_AT = 'guncellenme_tarixi';
    const DELETED_AT='silinme_tarixi';


    public function mehsul()
    {
        return $this->belongsTo('App\Models\mehsul');
    }
}
