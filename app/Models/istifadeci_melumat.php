<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class istifadeci_melumat extends Model
{
    protected  $table='istifadeci_melumat';
    public  $timestamps = false;
    protected $guarded=[];


    public  function istifadeci()
    {
        return $this->belongsTo('App\Models\istifadeci');
    }
}
