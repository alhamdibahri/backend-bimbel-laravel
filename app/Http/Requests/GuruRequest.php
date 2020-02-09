<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GuruRequest extends FormRequest
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

        $kode = autonumber('guru','kode_guru','GR-');

        if($this->method() == 'PATCH'){
            $rules_kode = 'required|unique:guru,kode_guru,'.$this->get('kode_guru').',kode_guru';
        
        }

        return [
            'kode_guru' => $rules_kode,
            'tanggal_lahir_guru' => 'required|date',
            'jenkel_guru' => 'required|in:Pria,Wanita',
            'agama_guru' => 'required|in:Islam,Kristen,Hindu,Budha,Konghucu',
            'alamat_guru' => 'required|max:255',
            'no_handphone_guru' => 'required|digits_between:10,12',
            'foto_guru' => 'image|mimes:jpeg,jpg,png'
        ];

        // $kode = autonumber('guru','kode_guru','GR-');
        // if($this->method() == 'PATCH'){
        //     $rules_kode = 'required|unique:guru,kode_guru,'.$this->get('kode_guru').',kode_guru';
        //     $rules_username = 'required|max:100|unique:guru,username_guru,'.$this->get('kode_guru').',kode_guru|unique:admin,username_admin|unique:guru,username_guru';
        //     $rules_email = 'required|email|max:100|unique:guru,email_guru,'.$this->get('kode_guru').',kode_guru|unique:admin,email_admin|unique:guru,email_guru';
        // }else{
        //     $rules_kode = 'required|unique:guru,kode_guru|in:'. $kode;
        //     $rules_username = 'required|max:100|unique:guru,username_guru|unique:admin,username_admin|unique:guru,username_guru';
        //     $rules_email = 'required|email|max:100|unique:guru,email_guru|unique:admin,email_admin|unique:guru,email_guru';
        // }

        // return [
        //     'kode_guru' => $rules_kode,
        //     'username_guru' => $rules_username,
        //     'email_guru' => $rules_email,
        //     'password_guru' => 'required|min:8|max:100',
        //     'nama_guru' => 'required|max:255',
        //     'tanggal_lahir_guru' => 'required|date',
        //     'jenkel_guru' => 'required|in:Pria,Wanita',
        //     'agama_guru' => 'required|in:Islam,Kristen,Hindu,Budha,Konghucu',
        //     'alamat_guru' => 'required|max:255',
        //     'no_handphone_guru' => 'required|min:10|max:12',
        //     'foto_guru' => 'image|mimes:jpeg,jpg,png'
        // ];
    }
}
