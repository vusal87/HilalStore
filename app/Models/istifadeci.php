<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class istifadeci extends Authenticatable
{
    use SoftDeletes;

    protected  $table='istifadeci';

    protected $fillable = ['adSoyad', 'email', 'shifre','aktif_mi','aktivasyon_acari'];

    protected $hidden = ['shifre', 'aktivasyon_acari',];

    const CREATED_AT = 'yaradilma_tarixi';
    const UPDATED_AT = 'guncellenme_tarixi';
    const DELETED_AT='silinme_tarixi';

    public function getAuthPassword()
    {
        return $this->shifre;
    }
    public  function melumat()
    {
        return $this->hasOne('App\Models\istifadeci_melumat');
    }

}
