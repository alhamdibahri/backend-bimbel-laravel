<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Guru;
use App\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class GuruController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = DB::table('user')
            ->join('guru', 'user.id', '=', 'guru.user_id')
            ->join('category_kelas', 'category_kelas.id_category_kelas', '=', 'guru.id_category_kelas')
            ->join('mata_pelajaran', 'mata_pelajaran.id_mata_pelajaran', '=', 'guru.id_mata_pelajaran')
            ->where('guru.status_guru', '=', '0')
            ->orderBy('user.id', 'desc')
            ->get();
        return response()->json($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function tampil()
    {
        $dataUser = User::where('id', '=' ,Auth::user()->id)->get();
        $dataGuru = Guru::where('user_id', '=', Auth::user()->id)->get();
        return \response()->json(['datauser' => $dataUser, 'dataguru' => $dataGuru]);
    }

    public function cariguru(Request $request){
        $data = DB::table('user')
            ->join('guru', 'user.id', '=', 'guru.user_id')
            ->join('category_kelas', 'category_kelas.id_category_kelas', '=', 'guru.id_category_kelas')
            ->join('mata_pelajaran', 'mata_pelajaran.id_mata_pelajaran', '=', 'guru.id_mata_pelajaran')
            ->where('user.nama', '=', $request->nama)
            ->get();
        return response()->json($data);
    }

    public function carigurukelas(Request $request){
        $data = DB::table('user')
            ->join('guru', 'user.id', '=', 'guru.user_id')
            ->join('category_kelas', 'category_kelas.id_category_kelas', '=', 'guru.id_category_kelas')
            ->join('mata_pelajaran', 'mata_pelajaran.id_mata_pelajaran', '=', 'guru.id_mata_pelajaran')
            ->where('user.nama', 'like', '%' . $request->nama . '%')
            ->orWhere('category_kelas.nama_category_kelas', '=', $request->kelas)
            ->where('mata_pelajaran.mata_pelajaran', '=', $request->pelajaran)
            ->get();
        return response()->json($data);
    }

    public function show()
    {
        $data = DB::table('user')
            ->join('guru', 'user.id', '=', 'guru.user_id')
            ->join('category_kelas', 'category_kelas.id_category_kelas', '=', 'guru.id_category_kelas')
            ->join('mata_pelajaran', 'mata_pelajaran.id_mata_pelajaran', '=', 'guru.id_mata_pelajaran')
            ->where('user.id', '=', Auth::user()->id)
            ->get();
        return response()->json(['data' => $data]);
    }

    public function ubahProfile(Request $request){
        $data = $request->all();

        $this->validate($request, [
            'nama' => 'required',
            'tanggal_lahir_guru' => 'required|date',
            'jenkel_guru' => 'required|in:Pria,Wanita',
            'agama_guru' => 'required|in:Islam,Kristen,Hindu,Budha,Konghucu',
            'alamat_guru' => 'required|max:255',
            'no_handphone_guru' => 'required|digits_between:10,12',
            'foto_guru' => 'image',
            'id_category_kelas' => 'required',
            'id_mata_pelajaran' => 'required' 
        ]);

        $count = Guru::where('user_id','=', Auth::user()->id)->count();

        $kode = autonumber('guru','kode_guru','GR-');

        if($count == 0){
            if($request->hasFile('foto_guru')){
                $data['foto_guru'] = uploadFoto($request->file('foto_guru'), 'fotoguru');
                DB::table('guru')->insert([
                    'kode_guru' => $kode,
                    'user_id' => Auth::user()->id,
                    'tanggal_lahir_guru' => $request->input('tanggal_lahir_guru'),
                    'jenkel_guru' => $request->input('jenkel_guru'),
                    'agama_guru' => $request->input('agama_guru'),
                    'alamat_guru' => $request->input('alamat_guru'),
                    'no_handphone_guru' => $request->input('no_handphone_guru'),
                    'foto_guru' => $data['foto_guru'],
                    'status_guru' => '0',
                    'id_category_kelas' => $request->input('id_category_kelas'),
                    'id_mata_pelajaran' => $request->input('id_mata_pelajaran') 
                ]);
                
            }
            else{
                DB::table('guru')->insert([
                    'kode_guru' => $kode,
                    'user_id' => Auth::user()->id,
                    'tanggal_lahir_guru' => $request->input('tanggal_lahir_guru'),
                    'jenkel_guru' => $request->input('jenkel_guru'),
                    'agama_guru' => $request->input('agama_guru'),
                    'alamat_guru' => $request->input('alamat_guru'),
                    'no_handphone_guru' => $request->input('no_handphone_guru'),
                    'status_guru' => '0',
                    'id_category_kelas' => $request->input('id_category_kelas'),
                    'id_mata_pelajaran' => $request->input('id_mata_pelajaran')
                ]);
            }

            DB::table('user')
            ->where('id', Auth::user()->id)
            ->update([
                'nama' => $request->input('nama'),
            ]);
            
            return \response()->json(['data' => 'berhasil di tambahkan']);
        }
        else{
            if($request->hasFile('foto_guru')){
                $data['foto_guru'] = \updateFoto(Auth::user()->guru->foto_guru, 'foto_guru', $request->file('foto_guru'), 'fotoguru');
                DB::table('guru')
                ->where('user_id', Auth::user()->id)
                ->update([
                    'tanggal_lahir_guru' => $request->input('tanggal_lahir_guru'),
                    'jenkel_guru' => $request->input('jenkel_guru'),
                    'agama_guru' => $request->input('agama_guru'),
                    'alamat_guru' => $request->input('alamat_guru'),
                    'no_handphone_guru' => $request->input('no_handphone_guru'),
                    'foto_guru' => $data['foto_guru'],
                    'id_category_kelas' => $request->input('id_category_kelas'),
                    'id_mata_pelajaran' => $request->input('id_mata_pelajaran')
                ]);
            }
    
            DB::table('user')
            ->where('id', Auth::user()->id)
            ->update([
                'nama' => $request->input('nama'),
            ]);

            DB::table('guru')
                ->where('user_id', Auth::user()->id)
                ->update([
                    'tanggal_lahir_guru' => $request->input('tanggal_lahir_guru'),
                    'jenkel_guru' => $request->input('jenkel_guru'),
                    'agama_guru' => $request->input('agama_guru'),
                    'alamat_guru' => $request->input('alamat_guru'),
                    'no_handphone_guru' => $request->input('no_handphone_guru'),
                    'id_category_kelas' => $request->input('id_category_kelas'),
                    'id_mata_pelajaran' => $request->input('id_mata_pelajaran')
                ]);   
            return \response()->json(['data' => 'berhasil di udpate']);
        }
    }

    public function detailguru($id){
        $data = DB::table('user')
            ->join('guru', 'user.id', '=', 'guru.user_id')
            ->join('category_kelas', 'category_kelas.id_category_kelas', '=', 'guru.id_category_kelas')
            ->join('mata_pelajaran', 'mata_pelajaran.id_mata_pelajaran', '=', 'guru.id_mata_pelajaran')
            ->where('guru.kode_guru', '=', $id)
            ->get();
        return response()->json($data);
    }
}
