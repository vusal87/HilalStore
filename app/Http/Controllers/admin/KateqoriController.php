<?php

namespace App\Http\Controllers\admin;

use App\Models\Kateqori;
use App\Models\mehsul;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use Hash;

class KateqoriController extends Controller
{
    public function index()
    {
        if (request()->filled('axtarilan')|| request()->filled('ust_id'))
        {
            request()->flash();
            $axtarilan=request('axtarilan');
            $ust_id=request('ust_id');

            $list=Kateqori::with('ust_kateqori')
                ->where('kateqori_adi','like',"%$axtarilan%")
                ->where('ust_id',$ust_id)
                ->orderByDesc('id')
                ->paginate(2)
                ->appends(['axtarilan'=>$axtarilan,'ust_id'=>$ust_id]);
        }else{
            request()->flush();
            $list= Kateqori::with('ust_kateqori')->orderByDesc('id')->paginate(8);

        }
        $anakateqoriler=Kateqori::whereRaw('ust_id is null')->get();


        return view('admin/kateqori/index',compact('list','anakateqoriler'));
    }
    public  function form($id=0)
    {
        $entry= new Kateqori;
        if ($id>0)
        {
            $entry= Kateqori::find($id);

        }
        $kateqoriler=Kateqori::all();
        return view('admin.kateqori.form',compact('entry','kateqoriler'));
    }

    public function yaddaSaxla($id=0)
    {

        $data=request()->only('kateqori_adi','slug','ust_id');
            if (!request()->filled('slug'))
                $data['slug']=str_slug(request('kateqori_adi'));
            request()->merge(['slug'=>$data['slug']]);

        $this->validate(request(),[
            'kateqori_adi'=>'required',
            'slug'        =>(request('original_slug')!=request('slug')? 'unique:kateqori' :'')

        ]);
        if ($id > 0)
        {
            $entry= Kateqori::where('id',$id)->firstOrFail();
            $entry->update($data);

        }
        else{
            $entry= Kateqori::create( $data);
        }

        return redirect()
            ->route('admin.kateqori.duzelt',$entry->id)
            ->with('mesaj',($id>0 ?"guncellendi":"elave edildi"))
            ->with('mesaj_tur','success');

    }

    public  function sil($id)
    {
        $kateqori=Kateqori::find($id);
        $kateqori->mehsullar()->detach();
        $kateqori->delete();

        Kateqori::destroy($id);
        return redirect()
            ->route('admin.kateqori')
            ->with('mesaj','Qeydiyyat Silindi')
            ->with('mesaj_tur','success');
    }
}
