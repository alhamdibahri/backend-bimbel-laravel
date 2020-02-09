<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Berita extends Model
{
    protected $table = "berita";

    protected $fillable = [
        'user_id',
        'nama_berita',
        'tanggal_berita',
        'foto_berita',
        'deskripsi'
    ];

    public function user(){
        return $this->belongsTo('App\User', 'user_id');
    }
}
