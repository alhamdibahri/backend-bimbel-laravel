<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Storage;
use App\Berita;
use Session;

class BeritaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data_berita = Berita::all();
        return view('berita.index', \compact('data_berita'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('berita.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->all();
        
        if($request->hasFile('foto_berita')){
            $input['foto_berita'] = uploadFoto($request->file('foto_berita'), 'fotoberita');
        }

        $berita = Berita::create($input);
        $berita->save();
        Session::flash('flash_message', 'Data Berita berhasil di simpan');
        return redirect('berita');
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
    public function edit($id)
    {
        $berita = Berita::findOrFail($id);
        return view('berita.edit', \compact('berita'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $berita = Berita::findOrFail($id);

        $data = $request->all();

        if($request->hasFile('foto_berita')){
            $data['foto_berita'] = \updateFoto($berita->foto_berita, 'foto_berita', $request->file('foto_berita'), 'fotoberita');
        }

        $berita->update($data);
        Session::flash('flash_message', 'Data Berita berhasil di update');
        return \redirect('berita');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $berita = Berita::findOrFail($id);
        deleteFoto($berita->foto_berita, 'foto_berita');
        $berita->delete();
        Session::flash('flash_message', 'Data berita berhasil di hapus');
        return \redirect('berita');
    }
}
