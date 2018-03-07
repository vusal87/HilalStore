<?php

namespace App\Http\Controllers;
use App\Models\mehsul;
use App\Models\Kateqori;
use Illuminate\Http\Request;

class MehsulController extends Controller
{
   public function index($slug_mehsuladi)
   {
       $mehsul= mehsul::whereSlug($slug_mehsuladi)->firstOrFail();
       $kateqoriler=$mehsul->kateqoriler()->distinct()->get();
//
       return view('FrontEnd/mehsul',compact('mehsul','kateqoriler'));
   }
   public function axtar ()
   {
       $axtarilan=request()->input('axtarilan');
       $mehsullar=mehsul::where('mehsul_adi','like',"%$axtarilan%")
           ->orwhere('aciqlama','like',"%$axtarilan%")
           ->paginate(20);
       request()->flash();
       return view('FrontEnd.axtar',compact('mehsullar'));
   }
}
