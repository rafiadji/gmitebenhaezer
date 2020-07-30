<?php

namespace App\Http\Controllers;

use App\Jemaat;
use App\Pengumuman;
use App\Ibadah;
use App\Baptis;
use App\Sidi;
use App\Nikah;
use Illuminate\Http\Request;

class HomeController extends Controller
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
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $date = date('Y-m-d');
        $jum_jemaat = Jemaat::count();
        $jum_baptis = Baptis::whereDate('tgl_baptis', '>', $date)->count();
        $jum_sidi = Sidi::whereDate('tgl_sidi', '>', $date)->count();
        $jum_nikah = Nikah::whereDate('tgl_nikah', '>', $date)->count();
        $jum_ibadah = Ibadah::whereDate('tgl_ibadah', '>', $date)->count();
        $pengumumans = Pengumuman::orderBy('id', 'desc')->limit(10)->get();
        return view('home', [
            'jum_jemaat' => $jum_jemaat,
            'jum_baptis' => $jum_baptis,
            'jum_sidi' => $jum_sidi,
            'jum_nikah' => $jum_nikah,
            'jum_ibadah' => $jum_ibadah,
            'pengumumans' => $pengumumans,
        ]);
    }
}
