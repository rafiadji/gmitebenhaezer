<?php

namespace App\Http\Controllers;

use App\Pengumuman;
use App\Ibadah;
use App\SetKegiatan;
use App\SetMajelis;
use App\Renungan;
use App\SetSejarah;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $pengumumans = Pengumuman::orderBy('id', 'desc')->limit(10)->get();
        $ibadahs = Ibadah::orderBy('id', 'desc')->limit(10)->get();
        $majelis = SetMajelis::all();
        $kegiatans = SetKegiatan::orderBy('id', 'desc')->limit(6)->get();
        $sejarahs = SetSejarah::orderBy('id', 'asc')->get();
        $renungans = Renungan::orderBy('id', 'desc')->first();
        return view('welcome', [
            'pengumumans' => $pengumumans,
            'ibadahs' => $ibadahs,
            'majelis' => $majelis,
            'kegiatans' => $kegiatans,
            'renungans' => $renungans,
            'sejarahs' => $sejarahs,
        ]);
    }
}