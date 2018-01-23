<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'adSoyad' => 'required|string|min:3|max:255',
            'email' => 'required|string|email|max:255|unique:istifadeci',
            'shifre' => 'required|string|min:6',
            'shifre_confirmation' => 'required|same:shifre'
        ];
    }

    public function messages()
    {
       return [
           'email.unique' => 'Bele bir email artiq qeydiyyatdan kecmisdir',
           'adSoyad.min' => 'Adiniz ve Soyadiniz en az 7 simvol olmalidir',
           'shifre.min' => 'sifreniz en az 6 reqem olmalidir herifden ibaret olamalidir',
           'shifre.required' =>'Sifre xanasi bos ola bilmez',
           'shifre_confirmation.same' =>'sifreniz  tekrari ile uygun gelmir'

       ];
    }
}
