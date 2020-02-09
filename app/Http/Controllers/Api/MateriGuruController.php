<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\MateriGuru;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class MateriGuruController extends Controller
{
    public function tampildata(){
        $data = DB::table('user')
        ->join('siswa', 'user.id', '=', 'siswa.user_id')
        ->join('history', 'history.kode_siswa', '=', 'siswa.kode_siswa')
        ->where('history.status_history', '=', '2')
        ->where('history.kode_guru', '=', Auth::user()->guru['kode_guru'])
        ->get();
        return response()->json($data);
    }

    public function store(Request $request){
        $data = $request->all();
        $this->validate($request, [
            'nama_materi' => 'required',
            'file_materi' => 'required',
            'kode_siswa' => 'required',
        ]);

        if($request->hasFile('file_materi')){
            $data['file_materi'] = uploadFoto($request->file('file_materi'), 'filemateri');
            DB::table('materi_guru')->insert([
                'nama_materi' => $request->input('nama_materi'),
                'file_materi' => $data['file_materi'],
                'kode_guru' => Auth::user()->guru['kode_guru'],
                'kode_siswa' => $request->input('kode_siswa')
            ]);
            
        }
        
        return response()->json($data);
    }

    public function index(){
        $data = DB::table('user')
            ->join('guru', 'user.id', '=', 'guru.user_id')
            ->join('category_kelas', 'category_kelas.id_category_kelas', '=', 'guru.id_category_kelas')
            ->join('mata_pelajaran', 'mata_pelajaran.id_mata_pelajaran', '=', 'guru.id_mata_pelajaran')
            ->join('materi_guru', 'materi_guru.kode_guru', '=', 'guru.kode_guru')
            ->where('materi_guru.kode_siswa', '=', Auth::user()->siswa['kode_siswa'])
            ->get();
        return response()->json($data);
    }

}
