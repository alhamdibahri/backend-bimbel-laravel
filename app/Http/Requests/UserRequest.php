<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
        if($this->method() == 'PATCH'){
            $rules_username = 'required|max:100|unique:user,username,'.$this->get('id');
            $rules_email = 'required|email|max:100|unique:user,email,'.$this->get('id');
        }else{
            $rules_username = 'required|max:100|unique:user,username';
            $rules_email = 'required|email|max:100|unique:user,email';
        }

        return [
            'username' => $rules_username,
            'email' => $rules_email,
            'password' => 'required|min:8',
            'nama' => 'required|max:255',
            'level' => 'required|in:Admin,Guru,Siswa',
        ];
    }
}
