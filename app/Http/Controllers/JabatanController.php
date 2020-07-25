<?php

namespace App\Http\Controllers;

use App\Jabatan;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class JabatanController extends Controller
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
        $jabatans = Jabatan::all();
        return view('jabatan.list', compact('jabatans'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('jabatan.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Jabatan::create(['jabatan' => $request->input('jabatan')]);
        $newRole = Role::create(['name' => $request->input('jabatan')]);
        foreach($request->input('permission') as $perm){
            $newRole->givePermissionTo($perm); 
        }

        return redirect()->route('jabatan.index')
                        ->with('success','Jabatan baru berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Jabatan  $jabatan
     * @return \Illuminate\Http\Response
     */
    public function show(Jabatan $jabatan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Jabatan  $jabatan
     * @return \Illuminate\Http\Response
     */
    public function edit(Jabatan $jabatan)
    {
        $arr = [];
        $roles = Role::findByName($jabatan['jabatan']);
        foreach($roles->permissions as $rol_perm){
            $arr = Arr::add($arr, $rol_perm['name'], NULL);
        }
        return view('jabatan.edit',compact('jabatan'), ['roles' => $arr]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Jabatan  $jabatan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Jabatan $jabatan)
    {
        $roles = Role::findByName($request->input('jabatan'));
        $roles->syncPermissions($request->input('permission'));

        return redirect()->route('jabatan.index')
                        ->with('success','Jabatan berhasil diubah.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Jabatan  $jabatan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Jabatan $jabatan)
    {
        $jabatan->delete();
        $roles = Role::findByName($jabatan['jabatan']);
        $roles->delete();

        return redirect()->route('jabatan.index')
                        ->with('success','Jabatan berhasil dihapus.');
    }
}
