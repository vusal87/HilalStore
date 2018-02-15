<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use App\Mail\IstifadeciQeydiyyatMail;
use App\Models\istifadeci_melumat;
use App\Models\SebetMehsul;
use App\Models\sebet;
//use Gloudemans\Shoppingcart\Cart;
use Gloudemans\Shoppingcart\Facades\Cart;
//use Cart;
use Illuminate\Http\Request;
use App\Models\istifadeci;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class IstifadeciController extends Controller
{
    public  function __construct()
    {
        $this->middleware('guest')->except('akauntuBagla');
    }
    public function giris_form()
    {
        return view('FrontEnd/istifadeci.qeydiyyatAc');
    }
    public  function giris()
    {
        $this->validate(request(),[
            'email'=>'required|email',
            'shifre'=>'required'
        ]);
            $credentials =[
                'email'=>request('email'),
                'password'=>request('shifre'),
                'aktif_mi'=>1
            ];
            if (auth()->attempt($credentials))
        {
            request()->session()->regenerate();

            $aktiv_sebet_id= sebet::aktiv_sebet_id();
            if (is_null($aktiv_sebet_id))
            {
                $aktiv_sebet=sebet::create(['istifadeci_id'=>auth()->id()]);
                $aktiv_sebet_id=$aktiv_sebet->id;
            }

            session()->put('aktiv_sebet_id',$aktiv_sebet_id);

            if (Cart::count()>0)
            {
                foreach (Cart::content() as $cartItem){
                    SebetMehsul::updateOrCreate(
                        ['sebet_id'=>$aktiv_sebet_id,'mehsul_id'=>$cartItem->id],
                        ['eded'=>$cartItem->qty,'qiymeti'=>$cartItem->price, 'veziyyet'=>'Gozlemede']
                    );
                }
            }
            Cart::destroy();

            $sebetMehsullar=SebetMehsul::where('sebet_id',$aktiv_sebet_id)->get();
            foreach ($sebetMehsullar as $sebetMehsul)
            {
                Cart::add($sebetMehsul->mehsul->id,$sebetMehsul->mehsul->mehsul_adi,$sebetMehsul->eded,
                    $sebetMehsul->qiymeti,['slug'=>$sebetMehsul->mehsul->slug]);
            }



            return redirect()->intended('/');
        }else{
                $errors=['email'=>'Xetali Giris'];
                return back()->withErrors($errors);
            }
    }


    public function qeydiyyat_form()
    {
        return view('FrontEnd/istifadeci.qeydiyyatOl');
    }

    public function qeydiyyat(RegisterRequest $request)
    {
        $this->validate($request,[
            'adSoyad' =>'required|min:3|max:60',
            'sifre'   =>'require|confirmed|min:5|max:15'
        ]);
        $istifadeci=istifadeci::create([
           'adSoyad'            => $request->adSoyad,
            'email'             => $request->email,
            'shifre'             => Hash::make($request->shifre),
            'aktivasyon_acari'  => Str::random(60),
            'aktif_mi'          => 0

        ]);
        $istifadeci->melumat()->save(new istifadeci_melumat());

        Mail::to(request('email'))->send(new IstifadeciQeydiyyatMail($istifadeci));
        auth()->login($istifadeci);
        return redirect()->route('anasehife');
    }
    public function aktivleshdir($acar)
    {
        $istifadeci = istifadeci::where('aktivasyon_acari',$acar)->first();
        if (!is_null($istifadeci))
        {
            $istifadeci->aktivasyon_acari =null;
            $istifadeci->aktif_mi=1;
            $istifadeci->save();
            return redirect()->to(' /')
                ->with('mesaj','Istifadeci qeydiyyatiniz aktivlesdirildi')
                ->with('mesaj_nov','success');
        }
        else{
            return redirect()->to(' /')
                ->with('mesaj','Istifadeci qeydiyyatiniz aktivlesdirilmedi')
                ->with('mesaj_nov','success');
        }
    }
    public function akauntuBagla()
    {

        auth()->logout();
//        request()->session()->flush();
//        request()->session()->regenerate();
        return redirect()->route('anasehife');
    }
}
