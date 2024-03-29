<?php

namespace App\Http\Controllers;

use App\SetKeuangan;
use Illuminate\Http\Request;

class SetKeuanganController extends Controller
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
        $setKeuangans = SetKeuangan::all();
        return view('setKeuangan.list', compact('setKeuangans'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('setKeuangan.create');
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
            'keterangan' => 'required',
            'jenis_keuangan' => 'required',
        ]);

        setKeuangan::create($request->all());

        return redirect()->route('setKeuangan.index')
                        ->with('success','Setting Keuangan baru berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\setKeuangan  $setKeuangan
     * @return \Illuminate\Http\Response
     */
    public function show(SetKeuangan $setKeuangan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\setKeuangan  $setKeuangan
     * @return \Illuminate\Http\Response
     */
    public function edit(SetKeuangan $setKeuangan)
    {
        return view('setKeuangan.edit', compact('setKeuangan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\setKeuangan  $setKeuangan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SetKeuangan $setKeuangan)
    {
        $request->validate([
            'keterangan' => 'required',
            'jenis_keuangan' => 'required',
        ]);

        $setKeuangan->update($request->all());

        return redirect()->route('setKeuangan.index')
                        ->with('success','Setting Keuangan berhasil diubah.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\setKeuangan  $setKeuangan
     * @return \Illuminate\Http\Response
     */
    public function destroy(SetKeuangan $setKeuangan)
    {
        $setKeuangan->delete();

        return redirect()->route('setKeuangan.index')
                        ->with('success','Setting Keuangan berhasil dihapus.');
    }
}
