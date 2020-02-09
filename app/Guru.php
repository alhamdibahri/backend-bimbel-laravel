<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Guru extends Model
{
    protected $table = 'guru';
    protected $primaryKey = "kode_guru";
    public $incrementing = false;

    protected $fillable = [
        'kode_guru',
        'user_id',
        'tanggal_lahir_guru',
        'jenkel_guru',
        'agama_guru',
        'alamat_guru',
        'no_handphone_guru',
        'foto_guru',
        'status_guru',
        'id_category_kelas',
        'id_mata_pelajaran',
    ];

    public function user(){
        return $this->belongsTo('App\User', 'user_id');
    }
    public function mataPelajaran(){
        return $this->belongsTo('App\MataPelajaran', 'id_mata_pelajaran');
    }
    public function categoryKelas(){
        return $this->belongsTo('App\CategoryKelas', 'id_category_kelas');
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
