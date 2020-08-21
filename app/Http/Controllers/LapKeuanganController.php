<?php

namespace App\Http\Controllers;

use App\Keuangan;
use Illuminate\Http\Request;

class LapKeuanganController extends Controller
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
        return view('lapkeuangan.list');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getTable(Request $request)
    {
        $str = "";
        if ($request->input('bulan') == 'all') {
            $keuangans = Keuangan::whereYear('tgl_keuangan', $request->input('tahun'))
            ->orderby('tgl_keuangan', 'desc')
            ->get();
        }
        else{
            $keuangans = Keuangan::whereYear('tgl_keuangan', $request->input('tahun'))
            ->whereMonth('tgl_keuangan', $request->input('bulan'))
            ->orderby('tgl_keuangan', 'desc')
            ->get();
        }
        if(count($keuangans) == 0){
            $str .= "<tr>";
            $str .= "<td colspan='4' style='text-align:center'>Tidak Ada Laporan</td>";
            $str .= "</tr>";
        }
        else{
            foreach ($keuangans as $keuangan):
                $str .= "<tr>";
                $str .= "<td>$keuangan->tgl_keuangan</td>";
                if ($keuangan->id_set == '1' || $keuangan->id_set == '2') {
                    $str .= "<td>".$keuangan->keterangan_lain."</td>";
                }
                else{
                    $str .= "<td>".$keuangan->setting->keterangan."</td>";
                }
                $str .= "<td>";
                if ($keuangan->setting->jenis_keuangan == 'pemasukan') {
                    $str .= number_format($keuangan->nominal, 0, ',', '.');
                }
                $str .= "</td>";
                $str .= "<td>";
                if ($keuangan->setting->jenis_keuangan == 'pengeluaran') {
                    $str .= number_format(abs($keuangan->nominal), 0, ',', '.');
                }
                $str .= "</td>";
                $str .= "</tr>";
            endforeach;
        }
        echo $str;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getSaldo(Request $request)
    {
        if ($request->input('bulan') == 'all') {
            $saldo = Keuangan::whereYear('tgl_keuangan', $request->input('tahun'))
            ->sum('nominal');
        }
        else{
            $saldo = Keuangan::whereYear('tgl_keuangan', $request->input('tahun'))
            ->whereMonth('tgl_keuangan', $request->input('bulan'))
            ->sum('nominal');
        }
        echo "Rp. ".number_format($saldo, 0, ',', '.');
    }

}
