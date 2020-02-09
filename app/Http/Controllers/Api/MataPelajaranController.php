<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MataPelajaranController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data = DB::table('category_kelas')
        ->join('mata_pelajaran', 'category_kelas.id_category_kelas', '=', 'mata_pelajaran.id_category_kelas')
        ->where('nama_category_kelas' , '=', $request->kelas)
        ->get();
        return response()->json([ 'data' =>  $data]);
    }
}
