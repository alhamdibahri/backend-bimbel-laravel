<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MataPelajaran extends Model
{
    protected $table = "mata_pelajaran";
    protected $primaryKey = "id_mata_pelajaran";
    protected $fillable = [
        'id_category_kelas',
        'mata_pelajaran',
    ];

    public function categoriKelas(){
        return $this->belongsTo('App\CategoryKelas', 'id_category_kelas');
    }
    public function guru(){
        return $this->hasMany('App\Guru', 'id_mata_pelajaran');
    }
}
