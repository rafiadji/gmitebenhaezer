<?php

namespace App\Http\Controllers;

use App\Pengumuman;
use App\Ibadah;
use App\Baptis;
use App\Sidi;
use App\Nikah;
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
        $baptiss = Baptis::orderBy('id', 'desc')->limit(10)->get();
        $sidis = Sidi::orderBy('id', 'desc')->limit(10)->get();
        $nikahs = Nikah::orderBy('id', 'desc')->limit(10)->get();
        return view('welcome', [
            'pengumumans' => $pengumumans,
            'ibadahs' => $ibadahs,
            'baptiss' => $baptiss,
            'sidis' => $sidis,
            'nikahs' => $nikahs,
        ]);
    }
}
