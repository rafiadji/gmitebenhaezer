<?php

namespace App\Http\Controllers;

use App\Jemaat;
use App\Jabatan;
use App\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class JemaatController extends Controller
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
        $jemaats = Jemaat::all();
        return view('jemaat.list', compact('jemaats'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $jabatans = Jabatan::all();
        return view('jemaat.create', ['jabatans' => $jabatans]);
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
            'name' => 'required',
            'email' => 'required',
            'jk' => 'required',
        ]);

        $tlp = preg_replace("/[^0-9.]/", "", $request->input("no_tlp"));
        $request->merge(["no_tlp" => $tlp]);

        $jabatan = Jabatan::where('id', $request->input("id_jabatan"))->first();
        $roles = Role::findByName($jabatan->jabatan);
        $newUser = User::create([
            'name' => $request->input("name"),
            'email' => $request->input("email"),
            'password'  => bcrypt('jemaat123')
        ]);
        $newUser->assignRole($roles);
        $id_user = $newUser->id;
        $request->merge(["id_user" => $id_user]);

        Jemaat::create($request->except(['email']));

        return redirect()->route('jemaat.index')
                        ->with('success','Jemaat baru berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Jemaat  $jemaat
     * @return \Illuminate\Http\Response
     */
    public function show(Jemaat $jemaat)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Jemaat  $jemaat
     * @return \Illuminate\Http\Response
     */
    public function edit(Jemaat $jemaat)
    {
        $jabatans = Jabatan::all();
        return view('jemaat.edit',compact('jemaat'), ['jabatans' => $jabatans]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Jemaat  $jemaat
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Jemaat $jemaat)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'jk' => 'required',
        ]);

        $tlp = preg_replace("/[^0-9.]/", "", $request->input("no_tlp"));
        $request->merge(["no_tlp" => $tlp]);

        $jabatan = Jabatan::where('id', $request->input("id_jabatan"))->first();
        $roles = Role::findByName($jabatan->jabatan);
        $user = User::where('id', $jemaat['id_user'])->first();
        $user->name = $request->input("name");
        $user->email = $request->input("email");
        $user->save();
        $user->syncRoles($roles);
  
        $jemaat->update($request->except(['email']));
  
        return redirect()->route('jemaat.index')
                        ->with('success','Jemaat updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Jemaat  $jemaat
     * @return \Illuminate\Http\Response
     */
    public function destroy(Jemaat $jemaat)
    {
        $user = User::where('id', $jemaat['id_user'])->first();
        $user->delete();
        $jemaat->delete();
  
        return redirect()->route('jemaat.index')
                        ->with('success','Jemaat berhasil dihapus');
    }
}
