<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\SiswaRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Siswa;

class SiswaController extends Controller
{
    public function index(){
        $data = DB::table('user')
        ->join('siswa', 'user.id', '=', 'siswa.user_id')
        ->orderBy('user.id', 'desc')
        ->get();
        return response()->json($data);
    }

    public function cari(Request $request){

        $cari = $request->cari;

        $data = DB::table('user')
        ->join('siswa', 'user.id', '=', 'siswa.user_id')
        ->where('user.nama','like',"%" . $request->cari . "%")
        ->get();
        return \response()->json($data);
    }

    public function profile(){
        $data = DB::table('user')
        ->join('siswa', 'user.id', '=', 'siswa.user_id')
        ->where('user.id', Auth::user()->id)
        ->get();
        return response()->json(['data' => $data]);
    }
    public function ubahProfile(Request $request){
        $data = $request->all();

        $this->validate($request, [
            'nama' => 'required',
            'tanggal_lahir_siswa' => 'required|date',
            'jenkel_siswa' => 'required|in:Pria,Wanita',
            'agama_siswa' => 'required|in:Islam,Kristen,Hindu,Budha,Konghucu',
            'alamat_siswa' => 'required|max:255',
            'no_handphone_siswa' => 'required|digits_between:10,12',
            'foto_siswa' => 'image'
        ]);

        $count = Siswa::where('user_id','=', Auth::user()->id)->count();

        $kode = autonumber('siswa','kode_siswa','SWS-');

        if($count == 0){
            if($request->hasFile('foto_siswa')){
                $data['foto_siswa'] = uploadFoto($request->file('foto_siswa'), 'fotosiswa');
                DB::table('siswa')->insert([
                    'kode_siswa' => $kode,
                    'user_id' => Auth::user()->id,
                    'tanggal_lahir_siswa' => $request->input('tanggal_lahir_siswa'),
                    'jenkel_siswa' => $request->input('jenkel_siswa'),
                    'agama_siswa' => $request->input('agama_siswa'),
                    'alamat_siswa' => $request->input('alamat_siswa'),
                    'no_handphone_siswa' => $request->input('no_handphone_siswa'),
                    'foto_siswa' => $data['foto_siswa'],
                ]);
                
            }
            else{
                DB::table('siswa')->insert([
                    'kode_siswa' => $kode,
                    'user_id' => Auth::user()->id,
                    'tanggal_lahir_siswa' => $request->input('tanggal_lahir_siswa'),
                    'jenkel_siswa' => $request->input('jenkel_siswa'),
                    'agama_siswa' => $request->input('agama_siswa'),
                    'alamat_siswa' => $request->input('alamat_siswa'),
                    'no_handphone_siswa' => $request->input('no_handphone_siswa'),
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
            if($request->hasFile('foto_siswa')){
                $data['foto_siswa'] = \updateFoto(Auth::user()->siswa->foto_siswa, 'foto_siswa', $request->file('foto_siswa'), 'fotosiswa');
                DB::table('siswa')
                ->where('user_id', Auth::user()->id)
                ->update([
                    'tanggal_lahir_siswa' => $request->input('tanggal_lahir_siswa'),
                    'jenkel_siswa' => $request->input('jenkel_siswa'),
                    'agama_siswa' => $request->input('agama_siswa'),
                    'alamat_siswa' => $request->input('alamat_siswa'),
                    'no_handphone_siswa' => $request->input('no_handphone_siswa'),
                    'foto_siswa' => $data['foto_siswa'],
                ]);
            }
    
            DB::table('user')
            ->where('id', Auth::user()->id)
            ->update([
                'nama' => $request->input('nama'),
            ]);

            DB::table('siswa')
                ->where('user_id', Auth::user()->id)
                ->update([
                    'tanggal_lahir_siswa' => $request->input('tanggal_lahir_siswa'),
                    'jenkel_siswa' => $request->input('jenkel_siswa'),
                    'agama_siswa' => $request->input('agama_siswa'),
                    'alamat_siswa' => $request->input('alamat_siswa'),
                    'no_handphone_siswa' => $request->input('no_handphone_siswa'),
                ]);   
            return \response()->json(['data' => 'berhasil di udpate']);
        }
    }
}
