<?php

namespace App\Http\Controllers\admin;

use App\Models\Kateqori;
use App\Models\Photo;
use App\Models\sifarish;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\mehsul;
use App\Models\MehsulDetay;

class SifarisController extends Controller
{
    public function index()
    {
        if (request()->filled('axtarilan'))
        {
            request()->flash();
            $axtarilan=request('axtarilan');
            $list=sifarish::with('sebet.istifadeci')
                ->where('adSoyad','like',"%$axtarilan%")
                ->orWhere('id',$axtarilan)
                ->orderByDesc('id')
                ->paginate(8)
                ->appends('axtarilan',$axtarilan);
        }else{
            $list= sifarish::with('sebet.istifadeci')
            ->orderByDesc('id')->paginate(8);

        }

        return view('admin/sifaris/index',compact('list'));
    }
    public  function form($id=0)
    {
        if ($id>0)
        {
            $entry= sifarish::with('sebet.sebet_mehsullar.mehsul')->find($id);
        }
        return view('admin.sifaris.form',compact('entry'));
    }

    public function yaddaSaxla($id=0)
    {


        $data=request()->only('adSoyad','adres','ev_telefon','el_telefon','veziyyet');

        if ($id > 0)
        {
            $entry= sifarish::where('id',$id)->firstOrFail();
            $entry->update($data);
        }

        return redirect()
            ->route('admin.sifaris.duzelt',$entry->id)
            ->with('mesaj','Guncellendi')
            ->with('mesaj_tur','success');

    }

    public  function sil($id)
    {

        $mehsul=mehsul::find($id);
        $mehsul->kateqoriler()->detach();
//        $mehsul->detay()->delete();
        $mehsul->delete();
        return redirect()
            ->route('admin.mehsul')
            ->with('mesaj','Qeydiyyat Silindi')
            ->with('mesaj_tur','success');
    }
}
