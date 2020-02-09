<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Laravel\Passport\Client;
use App\User;


class LoginController extends Controller
{
    use IssueTokenTrait;
    private $client;
    public function __construct(){
        $this->client = Client::find(2);
    }

    public function data(Request $request){
        $user = User::where('username', $request->username)->orWhere('email', '=', $request->username)->get()->first();
        return \response()->json($user);
    }
    public function login(Request $request){

        $this->validate($request, [
            'username' => 'required',
            'password' => 'required',
        ]);
        $role = User::where('username', $request->username)->get()->first();
        if($role['level'] == 'Admin'){
            return \response()->json("Username & Password salah", 400);
        }
        else{
            $params = [
                'grant_type' => 'password',
                'client_id' => $this->client->id,
                'client_secret' => $this->client->secret,
                'username' => request('username'),
                'password' => request('password'),
                'scope' => '*'
            ];
            $request->request->add($params);
            $proxy = Request::create('oauth/token', 'POST');
            return Route::dispatch($proxy);
        }
    }
    public function refresh(Request $request){
        $this->validate($request, [
            'refresh_token' => 'required'
        ]);
        return $this->issueToken($request, 'refresh_token');
    }
    public function logout(Request $request){
        $accessToken = Auth::user()->token();
        DB::table('oauth_refresh_tokens')
            ->where('access_token_id', $accessToken->id)
            ->update(['revoked' => true]);
        $accessToken->revoke();
        return response()->json([], 204);
    }
}
