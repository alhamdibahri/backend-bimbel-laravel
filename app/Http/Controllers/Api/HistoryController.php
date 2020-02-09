<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\History;

class HistoryController extends Controller
{
    public function insert(Request $request){

        $count = History::where([
            ['kode_siswa','=', Auth::user()->siswa['kode_siswa']],
            ['status_history', '=', '0']
        ])->count();

        if($count == 0){
            $tomorrow = Carbon::now();
            DB::table('history')->insert([
                'tgl_transaksi' => $tomorrow->toDateTimeString(),
                'status_history' => '0',
                'kode_guru' => $request->input('kode_guru'),
                'kode_siswa' => Auth::user()->siswa['kode_siswa']
            ]);
        }else{
            return \response()->json('anda sudah melakukan booking silahkan tunggu konfirmasi!', 400); 
        }
    }

    public function historyGuru(){
        $data = DB::table('user')
            ->join('siswa', 'user.id', '=', 'siswa.user_id')
            ->join('history', 'history.kode_siswa', '=', 'siswa.kode_siswa')
            ->where('history.status_history', '!=', '1')
            ->where('history.kode_guru', '=', Auth::user()->guru['kode_guru'])
            ->get();
            return response()->json($data);
    }

    public function historySiswa(){
        $data = DB::table('user')
            ->join('guru', 'user.id', '=', 'guru.user_id')
            ->join('category_kelas', 'category_kelas.id_category_kelas', '=', 'guru.id_category_kelas')
            ->join('mata_pelajaran', 'mata_pelajaran.id_mata_pelajaran', '=', 'guru.id_mata_pelajaran')
            ->join('history', 'history.kode_guru', '=', 'guru.kode_guru')
            ->where('history.kode_siswa', '=', Auth::user()->siswa['kode_siswa'])
            ->get();
            return response()->json($data);
    }

    public function detailHistorySiswa(Request $request){
        $data = DB::table('user')
            ->join('guru', 'user.id', '=', 'guru.user_id')
            ->join('category_kelas', 'category_kelas.id_category_kelas', '=', 'guru.id_category_kelas')
            ->join('mata_pelajaran', 'mata_pelajaran.id_mata_pelajaran', '=', 'guru.id_mata_pelajaran')
            ->join('history', 'history.kode_guru', '=', 'guru.kode_guru')
            ->where('history.kode_guru', '=', $request->kode_guru)
            ->where('history.id_history', '=', $request->id_history)
            ->get();
            return response()->json($data);
    }

    public function detailHistoryGuru(Request $request){
        $data = DB::table('user')
            ->join('siswa', 'user.id', '=', 'siswa.user_id')
            ->join('history', 'history.kode_siswa', '=', 'siswa.kode_siswa')
            ->where('history.kode_siswa', '=', $request->kode_siswa)
            ->where('history.id_history', '=', $request->id_history)
            ->get();
            return response()->json($data);
    }

    public function batalkanBooking($id){
        $history = History::findOrFail($id);
        $history->delete();
        return \response()->json('data berhasil di hapus');
    }

    public function terimaBooking(Request $request){
        $history = History::findOrFail($request->id_history);
        $history->status_history = '2';
        $history->save();

        DB::table('guru')
            ->where('kode_guru', Auth::user()->guru['kode_guru'])
            ->update([
                'status_guru' => '1',
            ]);

        return \response()->json('data berhasil di ubah');
    }

    public function tolakBooking(Request $request){
        $history = History::findOrFail($request->id_history);
        $history->status_history = '1';
        $history->save();
        return \response()->json('data berhasil di ubah');
    }

    public function selesaiBooking(Request $request){
        $history = History::findOrFail($request->id_history);
        $history->status_history = '3';
        $history->save();

        DB::table('guru')
            ->where('kode_guru', $request->kode_guru)
            ->update([
                'status_guru' => '0',
            ]);

        return \response()->json('data berhasil di ubah');
    }
}
