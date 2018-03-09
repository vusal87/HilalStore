<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Kateqori extends Model
{
//    use SoftDeletes;
    protected $table ='kateqori';
//    protected $fillable =['kateqori_adi','slug'];
    protected $guarded=[];


    public function mehsullar()
    {
     return $this->belongsToMany('App\Models\mehsul','kateqoriya_mehsul');
    }
    public function ust_kateqori()
    {
        return $this->belongsTo('App\Models\Kateqori','ust_id')->withDefault([

            'kateqori_adi'=>'Esas Bolme'

        ]);
    }
}
