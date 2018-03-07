<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{

    public $timestamps = false;
    protected $guarded=[];

    protected $fillable = ['mehsul_id','img_name'];
}
