<?php

namespace App\Http\Controllers;

use App\Pengumuman;
use App\Ibadah;
use App\Baptis;
use App\Sidi;
use App\Nikah;
use App\SetMajelis;
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
        return view('welcome', [
            'pengumumans' => $pengumumans,
            'ibadahs' => $ibadahs,
            'majelis' => $majelis,
        ]);
    }
}