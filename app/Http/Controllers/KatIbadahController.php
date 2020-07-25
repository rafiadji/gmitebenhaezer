<?php

namespace App\Http\Controllers;

use App\KatIbadah;
use Illuminate\Http\Request;

class KatIbadahController extends Controller
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
        $kategoris = KatIbadah::all();
        return view('kategori.list', compact('kategoris'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('kategori.create');
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
            'kategori' => 'required',
        ]);

        KatIbadah::create($request->all());

        return redirect()->route('kategori.index')
                        ->with('success','Kategori Ibadah baru berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\KatIbadah  $katIbadah
     * @return \Illuminate\Http\Response
     */
    public function show(KatIbadah $katIbadah)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\KatIbadah  $katIbadah
     * @return \Illuminate\Http\Response
     */
    public function edit(KatIbadah $kategori)
    {
        return view('kategori.edit', compact('kategori'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\KatIbadah  $katIbadah
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, KatIbadah $kategori)
    {
        $request->validate([
            'kategori' => 'required',
        ]);

        $kategori->update($request->all());

        return redirect()->route('kategori.index')
                        ->with('success','Kategori Ibadah berhasil diubah.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\KatIbadah  $katIbadah
     * @return \Illuminate\Http\Response
     */
    public function destroy(KatIbadah $kategori)
    {
        $kategori->delete();

        return redirect()->route('kategori.index')
                        ->with('success','Kategori Ibadah berhasil dihapus.');
    }
}
