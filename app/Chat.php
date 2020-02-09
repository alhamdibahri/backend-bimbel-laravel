<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Chat extends Model
{
    protected $table = 'chat';
    protected $primaryKey = "id_chat";
    public $incrementing = false;

    protected $fillable = [
        'id_chat',
        'tgl_chat',
        'kode_siswa',
        'kode_guru',
    ];

    public function tmpChat()
    {
        return $this->hasOne('App\TmpChat');
    }
    public function siswa(){
        return $this->belongsTo('App\Siswa', 'kode_siswa');
    }
    public function guru(){
        return $this->belongsTo('App\Guru', 'kode_guru');
    }
}
