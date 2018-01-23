<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MehsulDetay extends Model
{
    protected $table = "mehsul_detay";

    public $timestamps = false;

    public function mehsul()
    {
        return $this->belongsTo('App\Models\mehsul');
    }
}
