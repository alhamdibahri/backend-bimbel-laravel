<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MateriGuru extends Model
{
    protected $table = "materi_guru";
    protected $primaryKey = "id_materi_guru";

    protected $fillable = [
        'nama_materi',
        'file_materi',
        'kode_guru',
        'kode_siswa'
    ];

    public function siswa(){
        return $this->belongsTo('App\Siswa', 'kode_siswa');
    }
    
    public function guru(){
        return $this->belongsTo('App\Guru', 'kode_guru');    
    }
}
