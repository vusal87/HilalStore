<?php

namespace App\Http\Controllers;

use App\Models\SebetMehsul;
use App\Models\sebet;
use Dotenv\Validator;
use Illuminate\Http\Request;
use App\Models\mehsul;
use Cart;

class SebetController extends Controller
{
 public function index()
 {
//     dd(cart::content());
     return view('FrontEnd/sebet');
 }
 public function add()
 {
     $mehsul=mehsul::find(request('id'));
     $cartItem=Cart::add($mehsul->id,$mehsul->mehsul_adi,1,$mehsul->qiymeti,['slug'=>$mehsul->slug,'shekil'=>$mehsul->detay->mehsul_shekli]);


     if (auth()->check()) {
         $aktiv_sebet_id=session('aktiv_sebet_id');
         if (!isset($aktiv_sebet_id)) {

             $aktiv_sebet = Sebet::create([
                 'istifadeci_id' => auth()->id()
             ]);
             $aktiv_sebet_id = $aktiv_sebet->id;
             session()->put('aktiv_sebet_id', $aktiv_sebet_id);
         }

         SebetMehsul::updateOrCreate(
             ['sebet_id'=>$aktiv_sebet_id,'mehsul_id'=>$mehsul->id],
             ['eded'=>$cartItem->qty,'qiymeti'=>$mehsul->qiymeti,'veziyyet'=>'Gozlemede']
         );

     }

     return redirect()->route('sebet')->with('mesaj','Mehsul sebete elave edildi');
 }


 function sil($rowId)
 {

     if (auth()->check())
     {
         $aktiv_sebet_id = session('aktiv_sebet_id');
         $cartItem=Cart::get($rowId);
         SebetMehsul::where('sebet_id',$aktiv_sebet_id)->where('mehsul_id',$cartItem->id)->delete();
     }
     Cart::remove($rowId);
     return redirect()->route('sebet');
 }
 function boshalt()
 {
     if (auth()->check())
     {
         $aktiv_sebet_id = session('aktiv_sebet_id');

         SebetMehsul::where('sebet_id',$aktiv_sebet_id)->delete();
     }
     Cart::destroy();
     return redirect()->route('sebet');

 }
 public  function guncelle($rowId)
 {
         $validator=Validator::make(request()->all(),[
             'eded'=>'required|numeric|between:1,5'
             ]);
         if ($validator->fails())
         {
             session()->flash('mesaj_tur','danger');
             session()->flash('mesaj','eded deyeri 1 ile 5 arasinda olmaliir');
             return response()->json(['success'=>false]);
         }

     if (auth()->check())
     {
         $aktiv_sebet_id = session('aktiv_sebet_id');
         $cartItem=Cart::get($rowId);

            if (request('eded')==0)
                SebetMehsul::where('sebet_id',$aktiv_sebet_id)->where('mehsul_id',$cartItem->id)->delete();

            else
         SebetMehsul::where('sebet_id',$aktiv_sebet_id)->where('mehsul_id',$cartItem->id)
             ->update(['eded'=>request('eded')]);

     }

     Cart::update($rowId,request('eded'));
     session()->flash('mesaj_tur','success');
     session()->flash('mesaj','Eded ile guncellendi');
     return response()->json(['session'=>true,'eded'=>request('eded')]);
 }
}
