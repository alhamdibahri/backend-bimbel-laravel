<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\SiswaRequest;
use Illuminate\Support\Facades\DB;
use Session;
use Storage;
use App\Siswa;
use App\User;

class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     // public function __construct(){
    //     $this->middleware('auth');
    // }

    public function index()
    {
        $data_siswa = User::where('level', 'Siswa')->get();
        return view('siswa.index', compact('data_siswa'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('coba');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SiswaRequest $request)
    {
        $input = $request->all();

        //insert Foto Siswa
        if($request->hasFile('foto_siswa')){
            $input['foto_siswa'] = uploadFoto($request->file('foto_siswa'), 'fotosiswa');
        }

        $siswa = Siswa::create($input);
        $siswa->save();
        Session::flash('flash_message', 'Data Siswa berhasil di simpan');
        return redirect('siswa');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $siswa)
    {
        return view('siswa.show', compact('siswa'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $siswa)
    {
        return view('siswa.edit', compact('siswa'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(SiswaRequest $request,User $siswa)
    {
        $data = $request->all();
        $datap['foto_siswa'] = "";
        $count = Siswa::where('user_id','=',$siswa->id)->count();
        //cek adakah foto?
        if($count == 0){
            if($request->hasFile('foto_siswa')){
                $data['foto_siswa'] = uploadFoto($request->file('foto_siswa'), 'fotosiswa');
                 DB::table('siswa')->insert([
                    'kode_siswa' => $request->input('kode_siswa'),
                    'user_id' => $request->input('user_id'),
                    'tanggal_lahir_siswa' => $request->input('tanggal_lahir_siswa'),
                    'jenkel_siswa' => $request->input('jenkel_siswa'),
                    'agama_siswa' => $request->input('agama_siswa'),
                    'alamat_siswa' => $request->input('alamat_siswa'),
                    'no_handphone_siswa' => $request->input('no_handphone_siswa'),
                    'foto_siswa' => $data['foto_siswa'],
                ]);
            }
            DB::table('siswa')->insert([
                'kode_siswa' => $request->input('kode_siswa'),
                'user_id' => $request->input('user_id'),
                'tanggal_lahir_siswa' => $request->input('tanggal_lahir_siswa'),
                'jenkel_siswa' => $request->input('jenkel_siswa'),
                'agama_siswa' => $request->input('agama_siswa'),
                'alamat_siswa' => $request->input('alamat_siswa'),
                'no_handphone_siswa' => $request->input('no_handphone_siswa'),
            ]);
           
        }
        else{
            if($request->hasFile('foto_siswa')){
                $data['foto_siswa'] = \updateFoto($siswa->siswa->foto_siswa, 'foto_siswa', $request->file('foto_siswa'), 'fotosiswa');
                DB::table('siswa')
                ->where('kode_siswa', $data['kode_siswa'])
                ->update([
                    'tanggal_lahir_siswa' => $request->input('tanggal_lahir_siswa'),
                    'jenkel_siswa' => $request->input('jenkel_siswa'),
                    'agama_siswa' => $request->input('agama_siswa'),
                    'alamat_siswa' => $request->input('alamat_siswa'),
                    'no_handphone_siswa' => $request->input('no_handphone_siswa'),
                    'foto_siswa' => $data['foto_siswa'],
                ]);
            }
    
            DB::table('siswa')
                ->where('kode_siswa', $data['kode_siswa'])
                ->update([
                    'tanggal_lahir_siswa' => $request->input('tanggal_lahir_siswa'),
                    'jenkel_siswa' => $request->input('jenkel_siswa'),
                    'agama_siswa' => $request->input('agama_siswa'),
                    'alamat_siswa' => $request->input('alamat_siswa'),
                    'no_handphone_siswa' => $request->input('no_handphone_siswa'),
                ]);     
        }
        
        Session::flash('flash_message', 'Data siswa berhasil di simpan');
        return \redirect('siswa');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $siswa)
    {
        deleteFoto($siswa->siswa->foto_siswa, 'foto_siswa');
        $siswa->siswa()->delete();
        Session::flash('flash_message', 'Data siswa berhasil di hapus');
        return \redirect('siswa');
    }
}
