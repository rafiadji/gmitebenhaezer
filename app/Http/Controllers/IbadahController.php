<?php

namespace App\Http\Controllers;

use App\Ibadah;
use App\KatIbadah;
use App\User;
use Illuminate\Http\Request;

class IbadahController extends Controller
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
        $ibadahs = Ibadah::orderBy('id', 'desc')->get();
        return view('ibadah.list', compact('ibadahs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kategoris = KatIbadah::all();
        return view('ibadah.create', ['kategoris' => $kategoris]);
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
            'id_kategori' => 'required',
            'tgl_ibadah' => 'required',
            'waktu_ibadah' => 'required',
            'tempat_ibadah' => 'required',
        ]);

        Ibadah::create($request->all());

        return redirect()->route('ibadah.index')
                        ->with('success','Jadwal Ibadah baru berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Ibadah  $ibadah
     * @return \Illuminate\Http\Response
     */
    public function show(Ibadah $ibadah)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Ibadah  $ibadah
     * @return \Illuminate\Http\Response
     */
    public function edit(Ibadah $ibadah)
    {
        $kategoris = KatIbadah::all();
        return view('ibadah.edit', compact('ibadah'), ['kategoris' => $kategoris]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Ibadah  $ibadah
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ibadah $ibadah)
    {
        $request->validate([
            'id_kategori' => 'required',
            'tgl_ibadah' => 'required',
            'waktu_ibadah' => 'required',
            'tempat_ibadah' => 'required',
        ]);

        $ibadah->update($request->all());

        return redirect()->route('ibadah.index')
                        ->with('success','Jadwal Ibadah berhasil diubah.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Ibadah  $ibadah
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ibadah $ibadah)
    {
        $ibadah->delete();

        return redirect()->route('ibadah.index')
                        ->with('success','Jadwal Ibadah berhasil dihapus.');
    }
}
