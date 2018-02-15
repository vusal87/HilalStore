<?php

namespace App\Http\Controllers;

use App\Models\Kateqori;
use App\Models\MehsulDetay;
use Illuminate\Http\Request;
use App\Models\mehsul;

class AnasehifeController extends Controller
{
    public function index()
    {
        $kateqoriler=Kateqori::whereRaw('ust_id is null')->take(8)->get();//all();->take(2);

//        MehsulDetay::where('goster_slider',1)->take(7)->get();
        $mehsullar_slider= mehsul::select('mehsul.*')
            ->join('mehsul_detay','mehsul_detay.mehsul_id','mehsul.id')
            ->where('mehsul_detay.goster_slider',1)
            ->orderBy('guncellenme_tarixi','desc')
            ->take(9)->get();

//        MehsulDetay::with('mehsul')->where('cox_satilan',1)->take(9)->get();
        $mehsullar_cox_satan=mehsul::select('mehsul.*')
            ->join('mehsul_detay','mehsul_detay.mehsul_id','mehsul.id')
            ->where('mehsul_detay.cox_satilan',1)
            ->orderBy('guncellenme_tarixi','desc')
            ->take(40)->get();

//        MehsulDetay::with('mehsul')->where('endirimli',1)->take(9)->get();

        $mehsullar_endirimli=mehsul::select('mehsul.*')
            ->join('mehsul_detay','mehsul_detay.mehsul_id','mehsul.id')
            ->where('mehsul_detay.endirimli',1)
            ->orderBy('guncellenme_tarixi','desc')
            ->take(12)->get();



        return view('FrontEnd/anasehife',compact('kateqoriler','mehsullar_slider','mehsullar_cox_satan','mehsullar_endirimli'));
    }
}
