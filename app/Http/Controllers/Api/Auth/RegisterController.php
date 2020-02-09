<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\User;
use Laravel\Passport\Client;

class RegisterController extends Controller
{

    private $client;

    public function __construct(){
        $this->client = Client::find(2);
    }

    public function register(Request $request){
        $this->validate($request, [
            'username' => 'required|unique:user,username',
            'email' => 'required|email|unique:user,email',
            'password' => 'required|min:8',
            'nama' => 'required',
            'level' => 'required|in:Admin,Guru,Siswa'
        ]);
        
        $user = User::create([
            'username' => $request['username'],
            'email' => $request['email'],
            'password' => bcrypt($request['password']),
            'nama' => $request['nama'],
            'level' => $request['level']
        ]);

        $params = [
            'grant_type' => 'password',
            'client_id' => $this->client->id,
            'client_secret' => $this->client->secret,
            'username' => $request['username'],
            'password' => $request['password'],
            'scope' => '*'
        ];
        $request->request->add($params);
        $proxy = Request::create('oauth/token', 'POST');
        return Route::dispatch($proxy);

    }
}
