<?php

namespace App\Http\Controllers;

use App\Models\sifarish;
use Illuminate\Http\Request;

class SifarishController extends Controller
{
    public  function index()
    {
        $sifarishler=sifarish::with('sebet')->orderByDesc('yaradilma_tarixi')->get();
        return view('FrontEnd/sifarishler',compact('sifarishler'));
    }
    public function detal($id)
    {
        $sifarish=sifarish::with('sebet.sebet_mehsullar.mehsul')->where('sifarish.id',$id)->firstOrFail();
        return view('FrontEnd/sifarish',compact('sifarish'));
    }
}
