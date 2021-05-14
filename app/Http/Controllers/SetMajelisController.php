<?php

namespace App\Http\Controllers;

use App\Jabatan;
use App\Jemaat;
use App\SetMajelis;
use Illuminate\Http\Request;

class SetMajelisController extends Controller
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
        $setmajelis = SetMajelis::orderBy('id', 'asc')->get();
        return view('setmajelis.list', compact('setmajelis'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $jabatan = Jabatan::where('jabatan', 'like', '%majelis%')->first();
        $jemaats = Jemaat::where('id_jabatan', $jabatan->id)->get();
        $urut = SetMajelis::orderBy('id', 'desc')->first();
        return view('setmajelis.create', ['jemaats' => $jemaats, 'urut' => $urut]);
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
            'jabatan_majelis' => 'required',
            'urutan' => 'required',
            'animasi' => 'required',
        ]);

        SetMajelis::create($request->all());

        return redirect()->route('setmajelis.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\SetMajelis  $setMajelis
     * @return \Illuminate\Http\Response
     */
    public function show(SetMajelis $setMajelis)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\SetMajelis  $setMajelis
     * @return \Illuminate\Http\Response
     */
    public function edit(SetMajelis $setMajelis)
    {
        $jabatan = Jabatan::where('jabatan', 'like', '%majelis%')->first();
        $jemaats = Jemaat::where('id_jabatan', $jabatan->id)->get();
        return view('setmajelis.edit', ['jemaats' => $jemaats, 'setMajelis' => $setMajelis]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\SetMajelis  $setMajelis
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SetMajelis $setMajelis)
    {
        $request->validate([
            'jabatan_majelis' => 'required',
            'urutan' => 'required',
            'animasi' => 'required',
        ]);

        $setMajelis->update($request->all());

        return redirect()->route('setmajelis.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\SetMajelis  $setMajelis
     * @return \Illuminate\Http\Response
     */
    public function destroy(SetMajelis $setMajelis)
    {
        //
    }
}
