<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\AdminRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

use App\User;
use App\Admin;
use Session;
use Storage;


class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct(){
        $this->middleware('auth');
    }

    public function index()
    {
        $admins = User::where('level', 'Admin')->get();
        return view('admin.index', ['admins' => $admins]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $admin)
    {
        return view('admin.edit', ['admin' => $admin]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AdminRequest $request, User $admin)
    {
        $data = $request->all();
        $datap['foto_admin'] = "";
        $count = Admin::where('user_id','=',$admin->id)->count();

        //cek adakah foto?
        if($count == 0){
            if($request->hasFile('foto_admin')){
                $data['foto_admin'] = uploadFoto($request->file('foto_admin'), 'fotoadmin');
            }

            DB::table('admin')->insert([
                'kode_admin' => $request->input('kode_admin'),
                'user_id' => $request->input('user_id'),
                'tanggal_lahir_admin' => $request->input('tanggal_lahir_admin'),
                'jenkel_admin' => $request->input('jenkel_admin'),
                'agama_admin' => $request->input('agama_admin'),
                'alamat_admin' => $request->input('alamat_admin'),
                'foto_admin' => $data['foto_admin'],
            ]);
        }
        else{
            if($request->hasFile('foto_admin')){
                $data['foto_admin'] = \updateFoto($admin->admin->foto_admin, 'foto_admin', $request->file('foto_admin'), 'fotoadmin');
                DB::table('admin')
                ->where('kode_admin', $data['kode_admin'])
                ->update([
                    'tanggal_lahir_admin' => $request->input('tanggal_lahir_admin'),
                    'jenkel_admin' => $request->input('jenkel_admin'),
                    'agama_admin' => $request->input('agama_admin'),
                    'alamat_admin' => $request->input('alamat_admin'),
                    'foto_admin' => $data['foto_admin'],
                ]);
            }
    
            DB::table('admin')
                ->where('kode_admin', $data['kode_admin'])
                ->update([
                    'tanggal_lahir_admin' => $request->input('tanggal_lahir_admin'),
                    'jenkel_admin' => $request->input('jenkel_admin'),
                    'agama_admin' => $request->input('agama_admin'),
                    'alamat_admin' => $request->input('alamat_admin'),
                ]);     
        }
        
        Session::flash('flash_message', 'Data admin berhasil di simpan');
        return \redirect('admin');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $admin)
    {
        //hapus foto
        deleteFoto($admin->admin->foto_admin, 'foto_admin');
        $admin->admin()->delete();
        Session::flash('flash_message', 'Data admin berhasil di hapus');
        return \redirect('admin');
    }


    public function profile(){
        $admin = User::where('id', Auth::user()->id)->first();
        return view('profile', \compact('admin'));
    }

    
    public function actionProfile(Request $request){
        $admin = User::where('id', Auth::user()->id)
                    ->first();
        
        $data = $request->all();

        if($request->hasFile('foto_admin')){
            $data['foto_admin'] = \updateFoto($admin->admin->foto_admin, 'foto_admin', $request->file('foto_admin'), 'fotoadmin');
            DB::table('admin')
                ->where('user_id', Auth::user()->id)
                ->update([
                    'tanggal_lahir_admin' => $request->input('tanggal_lahir_admin'),
                    'jenkel_admin' => $request->input('jenkel_admin'),
                    'agama_admin' => $request->input('agama_admin'),
                    'alamat_admin' => $request->input('alamat_admin'),
                    'foto_admin' => $data['foto_admin'],
                ]);
        }

        if($admin->password != $data['password']){
            $data['password'] = Hash::make($data['password']);
        }

        DB::table('user')
                ->where('id', Auth::user()->id)
                ->update([
                    'username' => $request->input('username'),
                    'email' => $request->input('email'),
                    'password' => $data['password'],
                    'nama' => $request->input('nama'),
                ]);

        DB::table('admin')
                ->where('user_id', Auth::user()->id)
                ->update([
                    'tanggal_lahir_admin' => $request->input('tanggal_lahir_admin'),
                    'jenkel_admin' => $request->input('jenkel_admin'),
                    'agama_admin' => $request->input('agama_admin'),
                    'alamat_admin' => $request->input('alamat_admin'),
                ]);

        
        Session::flash('flash_message', 'Data berhasil di perbaharui');
        return \redirect('profile');
    }
}
