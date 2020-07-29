<?php

namespace App\Http\Controllers;

use App\Nikah;
use App\Jemaat;
use Illuminate\Http\Request;

class NikahController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $nikahs = Nikah::orderBy('id', 'desc')->get();
        return view('nikah.list', compact('nikahs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $jemaats = Jemaat::all();
        return view('nikah.create', ['jemaats' => $jemaats]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'id_jemaat_pria' => 'required',
            'id_jemaat_wanita' => 'required',
            'tgl_nikah' => 'required',
            'id_jemaat_pendeta' => 'required',
        ]);

        Nikah::create($request->all());

        return redirect()->route('nikah.index')
                        ->with('success','Jadwal pernikahan baru berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Nikah  $nikah
     * @return \Illuminate\Http\Response
     */
    public function show(Nikah $nikah)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Nikah  $nikah
     * @return \Illuminate\Http\Response
     */
    public function edit(Nikah $nikah)
    {
        $jemaats = Jemaat::all();
        return view('nikah.edit', compact('nikah'), ['jemaats' => $jemaats]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Nikah  $nikah
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Nikah $nikah)
    {
        $request->validate([
            'id_jemaat_pria' => 'required',
            'id_jemaat_wanita' => 'required',
            'tgl_nikah' => 'required',
            'id_jemaat_pendeta' => 'required',
        ]);

        $nikah->update($request->all());

        return redirect()->route('nikah.index')
                        ->with('success','Jadwal pernikahan berhasil diubah.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Nikah  $nikah
     * @return \Illuminate\Http\Response
     */
    public function destroy(Nikah $nikah)
    {
        $nikah->delete();

        return redirect()->route('nikah.index')
                        ->with('success','Jadwal pernikahan berhasil dihapus.');
    }
}
