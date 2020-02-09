<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Laravel\Passport\Client;
use App\User;

class SettingController extends Controller
{
    public function settingAkun(){
        $akun = Auth::user()->where('id', Auth::user()->id)->get();
        return response()->json(['akun' => $akun]);
    }
    public function ubahAkun(Request $request){
        $this->validate($request, [
            'username' => 'required|unique:user,username,'. Auth::user()->id,
            'email' => 'required|email|unique:user,email,'. Auth::user()->id,
            'password' => 'required|min:8',
        ]);

        DB::table('user')
                ->where('id', Auth::user()->id)
                ->update([
                    'username' => $request->input('username'),
                    'email' => $request->input('email'),
                    'password' => bcrypt($request->input('password'))
                ]);
        return response()->json('Data Berhasil di simpan');
    }
}
