<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CategoryKelas extends Model
{
    protected $primaryKey = 'id_category_kelas';

    protected $fillable = [
        'nama_category_kelas',
    ];


    public function mataPelajaran(){
        return $this->hasMany('App\MataPelajaran', 'id_category_kelas');
    }

    public function guru(){
        return $this->hasMany('App\Guru', 'id_category_kelas');
    }
}
