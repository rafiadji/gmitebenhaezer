<?php

namespace App\Http\Controllers;

use App\Renungan;
use Illuminate\Http\Request;

class RenunganController extends Controller
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
        $setrenungan = Renungan::orderBy('id', 'desc')->get();
        return view('setrenungan.list', compact('setrenungan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('setrenungan.create');
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
            'renungan' => 'required',
        ]);

        Renungan::create($request->except(['files']));

        return redirect()->route('setrenungan.index')
                        ->with('success','Renungan baru berhasil ditambahkan.');;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Renungan  $renungan
     * @return \Illuminate\Http\Response
     */
    public function show(Renungan $renungan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Renungan  $renungan
     * @return \Illuminate\Http\Response
     */
    public function edit(Renungan $renungan)
    {
        return view('setrenungan.edit', compact('renungan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Renungan  $renungan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Renungan $renungan)
    {
        $request->validate([
            'renungan' => 'required',
        ]);

        $renungan->update($request->except(['files']));

        return redirect()->route('setrenungan.index')
                        ->with('success','Renungan berhasil diubah.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Renungan  $renungan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Renungan $renungan)
    {
        //
    }
}
