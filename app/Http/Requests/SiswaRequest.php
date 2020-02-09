<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SiswaRequest extends FormRequest
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
        $kode = autonumber('siswa','kode_siswa','SWS-');

        if($this->method() == 'PATCH'){
            $rules_kode = 'required|unique:siswa,kode_siswa,'.$this->get('kode_siswa').',kode_siswa';
        
        }

        return [
            'kode_siswa' => $rules_kode,
            'tanggal_lahir_siswa' => 'required|date',
            'jenkel_siswa' => 'required|in:Pria,Wanita',
            'agama_siswa' => 'required|in:Islam,Kristen,Hindu,Budha,Konghucu',
            'alamat_siswa' => 'required|max:255',
            'no_handphone_siswa' => 'required|digits_between:10,12',
            'foto_siswa' => 'image|mimes:jpeg,jpg,png'
        ];

        // $kode = autonumber('siswa','kode_siswa','SWS-');
        // if($this->method() == 'PATCH'){
        //     $rules_kode = 'required|unique:siswa,kode_siswa,'.$this->get('kode_siswa').',kode_siswa';
        //     $rules_username = 'required|max:100|unique:siswa,username_siswa,'.$this->get('kode_siswa').',kode_siswa|unique:siswa,username_siswa|unique:guru,username_guru';
        //     $rules_email = 'required|email|max:100|unique:siswa,email_siswa,'.$this->get('kode_siswa').',kode_siswa|unique:siswa,email_siswa|unique:guru,email_guru';
        // }else{
        //     $rules_kode = 'required|unique:siswa,kode_siswa|in:'. $kode;
        //     $rules_username = 'required|max:100|unique:siswa,username_siswa|unique:siswa,username_siswa|unique:guru,username_guru';
        //     $rules_email = 'required|email|max:100|unique:siswa,email_siswa|unique:siswa,email_siswa|unique:guru,email_guru';
        // }

        // return [
        //     'kode_siswa' => $rules_kode,
        //     'username_siswa' => $rules_username,
        //     'email_siswa' => $rules_email,
        //     'password_siswa' => 'required|min:8|max:100',
        //     'nama_siswa' => 'required|max:255',
        //     'tanggal_lahir_siswa' => 'required|date',
        //     'jenkel_siswa' => 'required|in:Pria,Wanita',
        //     'agama_siswa' => 'required|in:Islam,Kristen,Hindu,Budha,Konghucu',
        //     'alamat_siswa' => 'required|max:255',
        //     'no_handphone_siswa' => 'required|min:10|max:12',
        //     'foto_siswa' => 'image|mimes:jpeg,jpg,png'
        // ];
    }
}
