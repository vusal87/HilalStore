<?php

namespace App\Http\Controllers;

use App\Models\sifarish;
use Illuminate\Http\Request;

class SifarishController extends Controller
{
    public  function index()
    {
        $cek =sifarish::with('sebet')->orderByDesc('yaradilma_tarixi')->get();
        $sifarishler = [];
        foreach ($cek as $c){
           if($c->sebet->user->id == Auth()->user()->id)
            array_push($sifarishler,$c);
        }
        return view('FrontEnd/sifarishler',compact('sifarishler'));
    }
    public function detal($id)
    {
        $sifarish=sifarish::with('sebet.sebet_mehsullar.mehsul')->where('sifarish.id',$id)->firstOrFail();
        return view('FrontEnd/sifarish',compact('sifarish'));
    }
}
