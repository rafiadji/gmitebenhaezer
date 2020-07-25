<?php

namespace App\Http\Controllers;

use App\Baptis;
use App\Jemaat;
use Illuminate\Http\Request;

class BaptisController extends Controller
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
        $baptiss = Baptis::all();
        return view('baptis.list', compact('baptiss'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $jemaats = Jemaat::all();
        return view('baptis.create', ['jemaats' => $jemaats]);
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
            'id_jemaat_baptis' => 'required',
            'tgl_baptis' => 'required',
            'id_jemaat_pendeta' => 'required',
        ]);

        Baptis::create($request->all());

        return redirect()->route('baptis.index')
                        ->with('success','Jadwal pembabtisan baru berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Baptis  $baptis
     * @return \Illuminate\Http\Response
     */
    public function show(Baptis $baptis)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Baptis  $baptis
     * @return \Illuminate\Http\Response
     */
    public function edit(Baptis $baptis)
    {
        $jemaats = Jemaat::all();
        return view('baptis.edit', compact('baptis'), ['jemaats' => $jemaats]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Baptis  $baptis
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Baptis $baptis)
    {
        $request->validate([
            'id_jemaat_baptis' => 'required',
            'tgl_baptis' => 'required',
            'id_jemaat_pendeta' => 'required',
        ]);

        $baptis->update($request->all());

        return redirect()->route('baptis.index')
                        ->with('success','Jadwal pembabtisan baru berhasil diubah.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Baptis  $baptis
     * @return \Illuminate\Http\Response
     */
    public function destroy(Baptis $baptis)
    {
        $baptis->delete();

        return redirect()->route('baptis.index')
                        ->with('success','Jadwal pembabtisan baru berhasil dihapus.');
    }
}
