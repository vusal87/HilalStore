<?php

namespace App\Http\Controllers\admin;

use App\Models\Kateqori;
use App\Models\Photo;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\mehsul;
use App\Models\MehsulDetay;

class MehsulController extends Controller
{
    public function index()
    {
        if (request()->filled('axtarilan'))
        {
            request()->flash();
            $axtarilan=request('axtarilan');
            $list=mehsul::where('mehsul_adi','like',"%$axtarilan%")
                ->orWhere('aciqlama','like',"%$axtarilan%")
                ->orderByDesc('id')
                ->paginate(8)
                ->appends('axtarilan',$axtarilan);
        }else{
            $list= mehsul::orderByDesc('id')->paginate(8);

        }

        return view('admin/mehsul/index',compact('list'));
    }
    public  function form($id=0)
    {
        $entry= new mehsul;
        $mehsul_kateqoriler=[];
        if ($id>0)
        {
            $entry= mehsul::find($id);
            $mehsul_kateqoriler=$entry->kateqoriler()->pluck('kateqori_id')->all();
        }
        $kateqoriler=Kateqori::all();
        return view('admin.mehsul.form',compact('entry','kateqoriler','mehsul_kateqoriler'));
    }

    public function yaddaSaxla($id=0)
    {
//        dd(mehsul::orderBy('id', 'desc')->first());
        $data=request()->only('mehsul_adi','slug','qiymeti','aciqlama');

        if (!request()->filled('slug'))
            $data['slug']=str_slug(request('mehsul_adi'));
        request()->merge(['slug'=>$data['slug']]);

        $this->validate(request(),[
            'mehsul_adi'=>'required',
            'qiymeti'=>'required',
            'slug'        =>(request('original_slug')!=request('slug')? 'unique:mehsul,slug' :'')

        ]);

        $data_detay=request()->only('goster_slider','cox_satilan','endirimli');

        $kateqoriler=request('kateqoriler');

        if ($id > 0)
        {
            $entry= mehsul::where('id',$id)->firstOrFail();
            $entry->update($data);
            if (isset($entry->detay->goster_slider)) {
                $entry->detay()->update($data_detay);
            } else {
                $entry->detay()->create($data_detay);
            }
            $entry->kateqoriler()->sync($kateqoriler);
        }
        else{
            $entry= mehsul::create($data);
            $entry->detay()->create($data_detay);
            $entry->kateqoriler()->attach($kateqoriler);
        }
        if (request()->hasFile('mehsul_shekli'))
        {
            $this->validate(request(),[
               'mehsul_shekli.*'=>'image|mimes:jpg,png,jpeg,gif|max:2048'
            ]);
            $mehsul_shekli=request()->file('mehsul_shekli');
            $mehsul_shekli=request()->mehsul_shekli;
//            dd($mehsul_shekli);
            foreach ($mehsul_shekli as $shekil) {
                $fayladi=$entry->id . "-" . round(microtime(true) * 1000) . "." . $shekil->extension();
                $shekil->move('uploads/mehsullar',$fayladi);
                Photo::create(['mehsul_id' => $entry->id,'img_name' => $fayladi]);
            }
            //$mehsul_shekli->extension();
            //$mehsul_shekli->getClientOriginalName();
            //$mehsul_shekli->hashName();

//                $fayladi=$entry->id . "-" . time() . "." . $mehsul_shekli->extension();
               // $fayladi=$mehsul_shekli->getClientOriginalName();
               // $fayladi=$mehsul_shekli->hashName();

//                if ($mehsul_shekli->isValid())
//                {
//                 $mehsul_shekli->move('uploads/mehsullar',$fayladi);
//                 MehsulDetay::updateOrCreate(
//                     ['mehsul_id'=>$entry->id],
//                     ['mehsul_shekli'=>$fayladi]
//                 );
//                }
        }

        return redirect()
            ->route('admin.mehsul.duzelt',$entry->id)
            ->with('mesaj',($id>0 ?"guncellendi":"elave edildi"))
            ->with('mesaj_tur','success');

    }

    public  function sil($id)
    {

        $mehsul=mehsul::find($id);
//        $mehsul->kateqoriler()->detach();
//        $mehsul->detay()->delete();
        $mehsul->delete();
        return redirect()
            ->route('admin.mehsul')
            ->with('mesaj','Qeydiyyat Silindi')
            ->with('mesaj_tur','success');
    }
}
