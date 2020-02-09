<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class History extends Model
{
    protected $table = "history";
    protected $primaryKey = "id_history";

    protected $fillable = [
        'tgl_transaksi',
        'status_history',
        'kode_guru',
        'kode_siswa',
    ];

    public function guru(){
        return $this->belongsTo('App\Guru', 'kode_guru');
    }
    public function siswa(){
        return $this->belongsTo('App\Siswa', 'kode_siswa');
    }
}
