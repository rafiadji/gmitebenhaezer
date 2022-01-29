<?php

namespace App\Http\Controllers;

use App\SetSejarah;
use Illuminate\Http\Request;

class SetSejarahController extends Controller
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
        $sejarahs = SetSejarah::orderBy('id', 'desc')->get();
        return view('setsejarah.list', compact('sejarahs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('setsejarah.create');
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
            'nama' => 'required',
        ]);

        SetSejarah::create($request->all());

        return redirect()->route('setsejarah.index')
                        ->with('success','Sejarah berhasil ditambah.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\SetSejarah  $setSejarah
     * @return \Illuminate\Http\Response
     */
    public function show(SetSejarah $setSejarah)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\SetSejarah  $setSejarah
     * @return \Illuminate\Http\Response
     */
    public function edit(SetSejarah $setSejarah)
    {
        return view('setsejarah.edit',compact('setSejarah'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\SetSejarah  $setSejarah
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SetSejarah $setSejarah)
    {
        $request->validate([
            'nama' => 'required',
        ]);

        $setSejarah->update($request->all());

        return redirect()->route('setsejarah.index')
                        ->with('success','Sejarah berhasil diubah.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\SetSejarah  $setSejarah
     * @return \Illuminate\Http\Response
     */
    public function destroy(SetSejarah $setSejarah)
    {
        $setSejarah->delete();

        return redirect()->route('setsejarah.index')
                        ->with('success','Sejarah berhasil dihapus.');
    }
}
