<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    protected $table = "admin";
    protected $primaryKey = 'kode_admin';
    public $incrementing = false;

    protected $fillable = [
        'kode_admin',
        'user_id',
        'tanggal_lahir_admin',
        'jenkel_admin',
        'agama_admin',
        'alamat_admin',
        'foto_admin',
    ];

    public function user(){
        return $this->belongsTo('App\User', 'user_id');
    }
}
