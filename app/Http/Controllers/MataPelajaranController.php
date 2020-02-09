<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\MataPelajaranRequest;
use App\MataPelajaran;
use App\CategoryKelas;
use Session;

class MataPelajaranController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data_mata_pelajaran = MataPelajaran::all();
        return view('mata-pelajaran.index', compact('data_mata_pelajaran'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $list_category = CategoryKelas::pluck('nama_category_kelas', 'id_category_kelas');
        return view('mata-pelajaran.create', compact('list_category'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MataPelajaranRequest $request)
    {
        $mata_pelajaran = MataPelajaran::create($request->all());
        $mata_pelajaran->save();
        Session::flash('flash_message', 'Data mata pelajaran berhasil di simpan');
        return redirect('mata-pelajaran');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(MataPelajaran $mata_pelajaran)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(MataPelajaran $mata_pelajaran)
    {
        $list_category = CategoryKelas::pluck('nama_category_kelas', 'id_category_kelas');
        return view('mata-pelajaran.edit', compact('mata_pelajaran', 'list_category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(MataPelajaranRequest $request, MataPelajaran $mata_pelajaran)
    {
        $mata_pelajaran->update($request->all());
        Session::flash('flash_message', 'Data mata pelajaran berhasil di update');
        return \redirect('mata-pelajaran');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(MataPelajaran $mata_pelajaran)
    {
        $mata_pelajaran->delete();
        Session::flash('flash_message', 'Data mata pelajaran berhasil di hapus');
        return \redirect('mata-pelajaran');
    }
}
