<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CategoryKelas;
use App\Http\Requests\CategoryKelasRequest;
use Session;

class CategoryKelasController extends Controller
{


    // public function __construct(){
    //     $this->middleware('auth');
    // }

    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $category = CategoryKelas::all();
        return view('category-kelas.index', compact('category'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('category-kelas.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryKelasRequest $request)
    {
        $input = $request->all();
        $category_kelas = CategoryKelas::create($input);
        $category_kelas->save();
        Session::flash('flash_message', 'Data kategori kelas berhasil di simpan');
        return redirect('category-kelas');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(CategoryKelas $category_kelas)
    {
        return view('category-kelas.edit', compact('category_kelas'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryKelasRequest $request, CategoryKelas $category_kelas)
    {
        $data = $request->all();

        $category_kelas->update($data);
        Session::flash('flash_message', 'Data kategori kelas berhasil di update');
        return \redirect('category-kelas');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(CategoryKelas $category_kelas)
    {
        $category_kelas->delete();
        Session::flash('flash_message', 'Data kategori kelas berhasil di hapus');
        return \redirect('category-kelas');
    }
}
