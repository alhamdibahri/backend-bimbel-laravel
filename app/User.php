<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;

class User extends Authenticatable
{
    use Notifiable, HasApiTokens;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username', 'email', 'password', 'nama', 'level'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    protected $table = 'user';

    public function getAuthPassword(){
        return $this->password;
    }

    public function admin()
    {
        return $this->hasOne('App\Admin');
    }
    public function guru()
    {
        return $this->hasOne('App\Guru');
    }

    public function siswa()
    {
        return $this->hasOne('App\Siswa');
    }

    public function berita()
    {
        return $this->hasOne('App\Berita');
    }

    public function tmpChat()
    {
        return $this->hasOne('App\TmpChat');
    }

    public function findForPassport($identifier) {
        return $this->orWhere('email', $identifier)->orWhere('username', $identifier)->first();
    }
}
