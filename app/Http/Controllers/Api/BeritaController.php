<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Berita;

class BeritaController extends Controller
{
    public function index(){
        $data = Berita::all();
        return response()->json($data);
    }

    public function show($id){
        $data = Berita::findOrFail($id);
        return \response()->json($data);
    }

}
