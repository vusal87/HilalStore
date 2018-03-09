<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class istifadeci extends Authenticatable
{
    use SoftDeletes;

    protected  $table='istifadeci';

    protected $fillable = ['adSoyad', 'email', 'shifre','aktif_mi','aktivasyon_acari','admin_mi'];

    protected $hidden = ['shifre', 'aktivasyon_acari',];



    public function getAuthPassword()
    {
        return $this->shifre;
    }
    public  function melumat()
    {
        return $this->hasOne('App\Models\istifadeci_melumat')->withDefault();
    }

}
