<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Chat;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class ChatController extends Controller
{
    public function chatSiswa(){
        $data = DB::table('user')
            ->join('guru', 'user.id', '=', 'guru.user_id')
            ->join('chat', 'chat.kode_guru', '=', 'guru.kode_guru')
            ->where('chat.kode_siswa', '=', Auth::user()->siswa['kode_siswa'])
            ->get();
        return response()->json($data);
    }

    public function chatGuru(){
        $data = DB::table('user')
            ->join('siswa', 'user.id', '=', 'siswa.user_id')
            ->join('chat', 'chat.kode_siswa', '=', 'siswa.kode_siswa')
            ->where('chat.kode_guru', '=', Auth::user()->guru['kode_guru'])
            ->get();
        return response()->json($data);
    }

    public function guru($id){
        $data = DB::table('user')
            ->join('siswa', 'user.id', '=', 'siswa.user_id')
            ->where('siswa.kode_siswa', '=', $id)
            ->get();

            return response()->json($data);
    }

    public function siswa($id){
        $data = DB::table('user')
            ->join('guru', 'user.id', '=', 'guru.user_id')
            ->where('guru.kode_guru', '=', $id)
            ->get();

            return response()->json($data);
    }

    public function detailChatGuru($id){
        $data = DB::table('tmp_chat')
            ->where('id_chat', '=', $id)
            ->get();

        return response()->json($data);
    }

    public function store(Request $request){
        if(Auth::user()->level == 'Guru'){
                $data = DB::table('chat')
                            ->where('kode_guru', Auth::user()->guru['kode_guru'])
                            ->where('kode_siswa', $request->input('kode_siswa'))->first();

                $kode = $data->id_chat;
                
                DB::table('tmp_chat')->insert([
                    'isi_chat' => $request->input('isi_chat'),
                    'id_chat' => $kode,
                    'user_id' =>  Auth::user()->id
                ]);
                            
                return response()->json('data berhasil di simpan');
        }
        else{
            $kode = autonumber('chat','id_chat','CHT-');
            $count = Chat::where('kode_siswa', '=', Auth::user()->siswa['kode_siswa'])
                            ->where('kode_guru', '=', $request->input('kode_guru'))
                            ->count();
        
            if($count == 0){
                $tomorrow = Carbon::now();
                DB::table('chat')->insert([
                    'id_chat' => $kode,
                    'tgl_chat' => $tomorrow->toDateTimeString(),
                    'kode_siswa' => Auth::user()->siswa['kode_siswa'],
                    'kode_guru' => $request->input('kode_guru')
                ]);
                DB::table('tmp_chat')->insert([
                    'isi_chat' => $request->input('isi_chat'),
                    'id_chat' => $kode,
                    'user_id' =>  Auth::user()->id
                ]);
            }
            else{
                    $data = DB::table('chat')
                    ->where('kode_siswa', Auth::user()->siswa['kode_siswa'])
                    ->where('kode_guru', $request->input('kode_guru'))->first();
    
                    $kode = $data->id_chat;
                    
                    DB::table('tmp_chat')->insert([
                        'isi_chat' => $request->input('isi_chat'),
                        'id_chat' => $kode,
                        'user_id' =>  Auth::user()->id
                    ]);
                                
                    return response()->json('data berhasil di simpan');
            }
        }
        
    }
}
