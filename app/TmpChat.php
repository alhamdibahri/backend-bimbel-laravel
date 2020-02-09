<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TmpChat extends Model
{
    protected $table = 'tmp_chat';

    protected $fillable = [
        'isi_chat',
        'id_chat',
        'user_id'
    ];

    public function chat(){
        return $this->belongsTo('App\Chat', 'id_chat');
    }
    public function user(){
        return $this->belongsTo('App\user', 'user_id');
    }
    
}
