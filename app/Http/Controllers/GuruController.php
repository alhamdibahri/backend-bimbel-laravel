<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\GuruRequest;
use Illuminate\Support\Facades\DB;
use App\Guru;
use App\User;
use App\CategoryKelas;
use App\MataPelajaran;
use Session;
use Storage;


class GuruController extends Controller
{

    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data_guru = User::where('level', 'Guru')->get();
        return view('guru.index', compact('data_guru'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = CategoryKelas::pluck('nama_category_kelas', 'id_category_kelas');
        return view('guru.create', compact('category'));
    }
    public function mata_pelajaran($id)
    {
        $mata_pelajaran = MataPelajaran::where("id_category_kelas", "=", $id)->get();
        return response()->json(['mata_pelajaran' => $mata_pelajaran], 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(GuruRequest $request)
    {
        $input = $request->all();
        //insert Foto Guru
        if($request->hasFile('guru')){
            $input['guru'] = uploadFoto($request->file('guru'), 'fotoguru');
        }
        $guru = Guru::create($input);
        $guru->save();
        Session::flash('flash_message', 'Data Guru berhasil di simpan');
        return redirect('guru');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $guru)
    {
        $data_guru = Guru::where('kode_guru', $guru->guru->kode_guru)->get()->first();

        return view('guru.show', compact('guru', 'data_guru'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $guru)
    {
        $count = Guru::where('user_id','=',$guru->id)->count();
        
        $query = Guru::where('user_id', $guru->id)->get()->first();

        $category = CategoryKelas::pluck('nama_category_kelas', 'id_category_kelas');
        $mata_pelajaran = MataPelajaran::where('id_category_kelas',$query['id_category_kelas'])->pluck('mata_pelajaran', 'id_mata_pelajaran');
        return view('guru.edit', compact('guru', 'category', 'mata_pelajaran'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(GuruRequest $request,User $guru)
    {
        $data = $request->all();

        // dd($data);

        $data['foto_guru'] = "";
        $count = Guru::where('user_id','=',$guru->id)->count();

        //cek adakah foto?
        if($count == 0){
            if($request->hasFile('foto_guru')){
                $data['foto_guru'] = uploadFoto($request->file('foto_guru'), 'fotoguru');
            }

            DB::table('guru')->insert([
                'kode_guru' => $request->input('kode_guru'),
                'user_id' => $request->input('user_id'),
                'tanggal_lahir_guru' => $request->input('tanggal_lahir_guru'),
                'jenkel_guru' => $request->input('jenkel_guru'),
                'agama_guru' => $request->input('agama_guru'),
                'alamat_guru' => $request->input('alamat_guru'),
                'no_handphone_guru' => $request->input('no_handphone_guru'),
                'foto_guru' => $data['foto_guru'],
                'status_guru' => '0',
                'id_category_kelas' => $request->input('id_category_kelas'),
                'id_mata_pelajaran' => $request->input('id_mata_pelajaran'),
            ]);
        }
        else{
            if($request->hasFile('foto_guru')){
                $data['foto_guru'] = \updateFoto($guru->guru->guru, 'foto_guru', $request->file('foto_guru'), 'fotoguru');
                DB::table('guru')
                ->where('kode_guru', $data['kode_guru'])
                ->update([
                    'tanggal_lahir_guru' => $request->input('tanggal_lahir_guru'),
                    'jenkel_guru' => $request->input('jenkel_guru'),
                    'agama_guru' => $request->input('agama_guru'),
                    'alamat_guru' => $request->input('alamat_guru'),
                    'no_handphone_guru' => $request->input('no_handphone_guru'),
                    'foto_guru' => $data['foto_guru'],
                    'id_category_kelas' => $request->input('id_category_kelas'),
                    'id_mata_pelajaran' => $request->input('id_mata_pelajaran'),
                ]);
            }
    
            DB::table('guru')
                ->where('kode_guru', $data['kode_guru'])
                ->update([
                    'tanggal_lahir_guru' => $request->input('tanggal_lahir_guru'),
                    'jenkel_guru' => $request->input('jenkel_guru'),
                    'agama_guru' => $request->input('agama_guru'),
                    'alamat_guru' => $request->input('alamat_guru'),
                    'no_handphone_guru' => $request->input('no_handphone_guru'),
                    'id_category_kelas' => $request->input('id_category_kelas'),
                    'id_mata_pelajaran' => $request->input('id_mata_pelajaran'),
                ]);     
        }
        
        Session::flash('flash_message', 'Data guru berhasil di simpan');
        return \redirect('guru');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $guru)
    {
        deleteFoto($guru->guru->foto_guru, 'foto_guru');
        $guru->guru()->delete();
        Session::flash('flash_message', 'Data guru berhasil di hapus');
        return \redirect('guru');
    }
}
