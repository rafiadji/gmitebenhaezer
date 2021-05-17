<?php

namespace App\Http\Controllers;

use App\SetKegiatan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class SetKegiatanController extends Controller
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
        $kegiatans = SetKegiatan::orderBy('id', 'desc')->get();
        return view('setkegiatan.list', compact('kegiatans'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('setkegiatan.create');
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
            'nama_kegiatan' => 'required',
            'file' => 'required',
        ]);

        if($request->file('file')){
			$file = $request->file('file');
			$namefile = "kegiatan-".time().".".$file->getClientOriginalExtension();
			$request->merge(["foto_kegiatan" => $namefile]);
			$file->move("img/kegiatan", $namefile);
		}

        SetKegiatan::create($request->except('file'));

        return redirect()->route('setkegiatan.index')
                        ->with('success','Kegiatan berhasil ditambah.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\SetKegiatan  $setKegiatan
     * @return \Illuminate\Http\Response
     */
    public function show(SetKegiatan $setKegiatan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\SetKegiatan  $setKegiatan
     * @return \Illuminate\Http\Response
     */
    public function edit(SetKegiatan $setKegiatan)
    {
        return view('setkegiatan.edit',compact('setKegiatan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\SetKegiatan  $setKegiatan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SetKegiatan $setKegiatan)
    {
        $request->validate([
            'nama_kegiatan' => 'required',
        ]);

        $setKegiatan->update($request->except('files'));

        return redirect()->route('setkegiatan.index')
                        ->with('success','Kegiatan berhasil diubah.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\SetKegiatan  $setKegiatan
     * @return \Illuminate\Http\Response
     */
    public function destroy(SetKegiatan $setKegiatan)
    {
        if(File::exists(public_path("img/kegiatan/".$setKegiatan->foto_kegiatan))){
            File::delete(public_path("img/kegiatan/".$setKegiatan->foto_kegiatan));
        }
        $setKegiatan->delete();

        return redirect()->route('setkegiatan.index')
                        ->with('success','Kegiatan berhasil dihapus.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Jemaat  $jemaat
     * @return \Illuminate\Http\Response
     */
    public function uploadFoto(Request $request, SetKegiatan $setKegiatan)
    {
        if($request->file('file')){
            if(File::exists(public_path("img/kegiatan/".$request->input('foto_kegiatan')))){
                File::delete(public_path("img/kegiatan/".$request->input('foto_kegiatan')));
            }
			$file = $request->file('file');
			$namefile = "kegiatan-".time().".".$file->getClientOriginalExtension();
			$request->merge(["foto_kegiatan" => $namefile]);
			$file->move("img/kegiatan", $namefile);
            $setKegiatan->update($request->except(['file']));
		}
        return redirect()->route('setkegiatan.edit',$setKegiatan->id);
    }
}
