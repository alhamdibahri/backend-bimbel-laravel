<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    protected $table = 'siswa';
    protected $primaryKey = "kode_siswa";
    public $incrementing = false;


    protected $fillable = [
        'kode_siswa',
        'username_siswa',
        'email_siswa',
        'password_siswa',
        'nama_siswa',
        'tanggal_lahir_siswa',
        'jenkel_siswa',
        'agama_siswa',
        'alamat_siswa',
        'no_handphone_siswa',
        'foto_siswa',
    ];

    public function user(){
        return $this->belongsTo('App\User', 'user_id');
    }
    public function history()
    {
        return $this->hasOne('App\History');
    }
    public function materi()
    {
        return $this->hasOne('App\MateriGuru');
    }
    public function chat()
    {
        return $this->hasOne('App\Chat');
    }
}
