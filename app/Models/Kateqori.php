<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Kateqori extends Model
{
    use SoftDeletes;
    protected $table ='kateqori';
//    protected $fillable =['kateqori_adi','slug'];
    protected $guarded=[];
    const CREATED_AT = 'yaradilma_tarixi';
    const UPDATED_AT = 'guncellenme_tarixi';
    const DELETED_AT='silinme_tarixi';

    public function mehsullar()
    {
     return $this->belongsToMany('App\Models\mehsul','kateqoriya_mehsul');
    }
}
