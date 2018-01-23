<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Cart;
use App\Models\sifarish;
class OdemeController extends Controller
{
    public function index()
    {
        if (!auth()->check())
        {
            return redirect()->route('istifadeci.qeydiyyatAc')
                ->with('mesaj_nov','info')
                ->with('mesaj','Odeme etmek ucun Istifadeci hesabiniza daxil olmaniz ve ya yeni istifadeci hesabi acmaginiz lazimdir');


        }
        elseif (count(Cart::content())==0)
        {
            return redirect()->route('anasehife')
                ->with('mesaj_nov','info')
                ->with('Odeme etmek ucun sbetinizde bir mehsul olmalidir');
        }

        $istifadeci_melumat=auth()->user()->melumat;

        return view('FrontEnd/odeme',compact('istifadeci_melumat'));
    }
    public  function odemeEt()
    {
        $sifarish= request()->all();
        $sifarish['sebet_id']=session('aktiv_sebet_id');
        $sifarish['bank']='azerbank';
        $sifarish['veziyyet']="sifarishiniz alindi";
        $sifarish['sifarish_deyeri']=Cart::subtotal();

        sifarish::create($sifarish);
        Cart::destroy();
        session()->forget('aktiv_sebet_id');
        return redirect()->route('sifarishler')
            ->with('mesaj_nov','success')
            ->with('mesaj','odemeniz alindi tewekkurler');
    }
}
