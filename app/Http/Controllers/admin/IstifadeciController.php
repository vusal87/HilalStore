<?php

namespace App\Http\Controllers\admin;

use App\Models\istifadeci;
use App\Models\istifadeci_melumat;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use Hash;

class IstifadeciController extends Controller
{
    public function girish()
    {

        if (request()->isMethod('POST'))
        {
            $this->validate(request(),[
                'email'=>'required|email',
                'shifre'=>'required'
            ]);
            $credentials=[
                'email'=>request()->get('email'),
                'password'=>request()->get('shifre'),
                'admin_mi'=>1,
                'aktif_mi'=>1
            ];
            if (Auth::guard('admin')->attempt($credentials,request()->has('yaddaSaxla')))
            {
                return redirect()->route('admin.anasehife');
            }
            else{
                return back()->withInput()->withErrors(['email'=>'Girish xetali']);
            }
        }
        return view('admin/girish');
    }
    public function cixish()
    {

        Auth::guard('admin')->logout();
        request()->session()->flush();
        request()->session()->regenerate();
        return redirect()->route('admin.girish');
    }


    public function index()
    {
        if (request()->filled('axtarilan'))
        {
            request()->flash();
            $axtarilan=request('axtarilan');
            $list=istifadeci::where('adSoyad','like',"%$axtarilan%")
                ->orWhere('email','like',"%$axtarilan%")
                ->orderByDesc('yaradilma_tarixi')
                ->paginate(8);
        }else{
            $list= istifadeci::orderByDesc('yaradilma_tarixi')->paginate(8);

        }

        return view('admin/istifadeci/index',compact('list'));
    }
    public  function form($id=0)
    {
        $entry= new istifadeci;
        if ($id>0)
        {
            $entry= istifadeci::find($id);
        }
        return view('admin.istifadeci.form',compact('entry'));
    }

    public function yaddaSaxla($id=0)
    {
    $this->validate(request(),[
       'adSoyad'=>'required',
        'email'=>'required|email'
    ]);
    $data=request()->only('adSoyad','email');
    if (request()->filled('shifre'))
    {
        $data['shifre']=Hash::make(request('shifre'));
    }

        $data['aktif_mi']=request()->has('aktif_mi') && request('aktif_mi')==1 ? 1 :0;
        $data['admin_mi']=request()->has('admin_mi') && request('aktif_mi')==1 ? 1 :0;
        if ($id > 0)
        {
        $entry= istifadeci::where('id',$id)->firstOrFail();
        $entry->update($data);

        }
        else{
            $entry= istifadeci::create( $data);
        }
        istifadeci_melumat::updateOrcreate(
            ['istifadeci_id'=>$entry->id],
            ['adres'=>request('adres'),
                'ev_telefonu'=>request('ev_telefonu'),
                'el_telefonu'=>request('el_telefonu')
            ]
        );
        return redirect()
            ->route('admin.istifadeci.duzelt',$entry->id)
            ->with('mesaj',($id>0 ?"guncellendi":"elave edildi"))
            ->with('mesaj_tur','success');

    }

    public  function sil($id)
    {
        istifadeci::destroy($id);
        return redirect()
            ->route('admin.istifadeci')
            ->with('mesaj','Qeydiyyat Silindi')
            ->with('mesaj_tur','success');
    }
}
