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


    public function mehsul()
    {
        return $this->belongsTo('App\Models\mehsul');
    }
}
