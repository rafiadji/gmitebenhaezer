<?php

namespace App\Http\Controllers;

use App\Sidi;
use App\Jemaat;
use Illuminate\Http\Request;

class SidiController extends Controller
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
        $sidis = Sidi::all();
        return view('sidi.list', compact('sidis'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $jemaats = Jemaat::all();
        return view('sidi.create', ['jemaats' => $jemaats]);
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
            'id_jemaat_sidi' => 'required',
            'tgl_sidi' => 'required',
        ]);

        Sidi::create($request->all());

        return redirect()->route('sidi.index')
                        ->with('success','Jadwal Sidi baru berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Sidi  $sidi
     * @return \Illuminate\Http\Response
     */
    public function show(Sidi $sidi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Sidi  $sidi
     * @return \Illuminate\Http\Response
     */
    public function edit(Sidi $sidi)
    {
        $jemaats = Jemaat::all();
        return view('sidi.edit', compact('sidi'), ['jemaats' => $jemaats]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Sidi  $sidi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Sidi $sidi)
    {
        $request->validate([
            'id_jemaat_sidi' => 'required',
            'tgl_sidi' => 'required',
        ]);

        $sidi->update($request->all());

        return redirect()->route('sidi.index')
                        ->with('success','Jadwal Sidi baru berhasil diubah.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Sidi  $sidi
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sidi $sidi)
    {
        $sidi->delete();

        return redirect()->route('sidi.index')
                        ->with('success','Jadwal Sidi baru berhasil dihapus.');
    }
}
