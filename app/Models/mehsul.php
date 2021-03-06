<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class mehsul extends Model
{
//    use SoftDeletes;

    protected $table="mehsul";
    protected $guarded=[];



            public  function kateqoriler()
            {
            return $this->belongsToMany('App\Models\Kateqori','kateqoriya_mehsul');
            }
            public function detay()
            {
                return $this->hasOne('App\Models\MehsulDetay')->withDefault();
            }

            public function photos()
            {
                return $this->hasMany('App\Models\Photo','mehsul_id','id');
            }
}
