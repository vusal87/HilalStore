<?php

namespace App\Http\Controllers;

use App\Models\kateqori;
use App\Models\mehsul;
use Illuminate\Http\Request;

class kateqoriyaController extends Controller
{
    public function index($slug_kateqoriadi){
        $kateqori=Kateqori::where('slug',$slug_kateqoriadi)->firstOrFail();
        $alt_kateqoriler=Kateqori::where('ust_id',$kateqori->id)->get();


        $mehsullar=$kateqori->mehsullar()->paginate(12);
        return view('FrontEnd/kateqoriyalar',compact('kateqori','alt_kateqoriler','mehsullar'));
    }
}
