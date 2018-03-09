<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;


class sebet extends Model
{

   protected $table='sebet';

    protected $guarded=[];


    public  function sifarish()
    {
        return $this ->hasOne('App\Models\sifarish');
    }
    public  function sebet_mehsullar()
    {
        return $this ->hasMany('App\Models\SebetMehsul');
    }
    public static function aktiv_sebet_id()
    {
        $aktiv_sebet=DB::table('sebet as s')
        ->leftJoin('sifarish as si','si.sebet_id','=','s.id')
            ->where('s.istifadeci_id',auth()->id())
            ->whereRaw('si.id is null')
            ->orderByDesc('s.created_at')
            ->select('s.id')
            ->first();
            if(!is_null($aktiv_sebet)) return $aktiv_sebet->id;
    }
    public function sebet_mehsul_eded()
    {
        return DB::table('sebet_mehsul')->where('sebet_id',$this->id)->sum('eded');
    }

    public function user(){
        return $this->belongsTo('App\Models\istifadeci', 'istifadeci_id','id');
    }


    public function istifadeci(){
        return $this->belongsTo('App\Models\istifadeci');
    }
}
