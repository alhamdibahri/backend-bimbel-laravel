<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\CategoryKelas;

class KelasContoroller extends Controller
{
    public function index(){
        $data = CategoryKelas::all();
        return response()->json(['data' => $data]);
    }
}
