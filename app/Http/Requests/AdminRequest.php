<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminRequest extends FormRequest
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
        $kode = autonumber('admin','kode_admin','ADM-');

        if($this->method() == 'PATCH'){
            $rules_kode = 'required|unique:admin,kode_admin,'.$this->get('kode_admin').',kode_admin';
        
        }

        return [
            'kode_admin' => $rules_kode,
            'tanggal_lahir_admin' => 'required|date',
            'jenkel_admin' => 'required|in:Pria,Wanita',
            'agama_admin' => 'required|in:Islam,Kristen,Hindu,Budha,Konghucu',
            'alamat_admin' => 'required|max:255',
            'foto_admin' => 'image|mimes:jpeg,jpg,png'
        ];
    }
}
