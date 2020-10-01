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
            ->orderby('tgl_keuangan')
            ->get();
        }
        else{
            $keuangans = Keuangan::whereYear('tgl_keuangan', $request->input('tahun'))
            ->whereMonth('tgl_keuangan', $request->input('bulan'))
            ->orderby('tgl_keuangan')
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
                $str .= "<td style='text-align:right'>";
                if ($keuangan->setting->jenis_keuangan == 'pemasukan') {
                    $str .= number_format($keuangan->nominal, 0, ',', '.');
                }
                $str .= "</td>";
                $str .= "<td style='text-align:right'>";
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
        $bulans = array('Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember');
        $str = "";
        $ttl_pemasukan = 0;
        $ttl_pengeluaran = 0;
        if ($request->input('bulan') == 'all') {
            $keuangans = Keuangan::whereYear('tgl_keuangan', $request->input('tahun'))
            ->get();
            $saldo = Keuangan::whereYear('tgl_keuangan', '<=', $request->input('tahun'))
            ->sum('nominal');
            $saldo_sebelum = Keuangan::whereYear('tgl_keuangan', '<', $request->input('tahun'))
            ->sum('nominal');
            $ttl_saldo = Keuangan::sum('nominal');

            foreach ($keuangans as $keuangan) {
                if ($keuangan->setting->jenis_keuangan == 'pemasukan') {
                    $ttl_pemasukan += $keuangan->nominal;
                }
                if ($keuangan->setting->jenis_keuangan == 'pengeluaran') {
                    $ttl_pengeluaran += abs($keuangan->nominal);
                }
            }

            $str .= "<tr>";
            $str .= "<th style='width:50%'>Saldo Awal Tahun ".$request->input('tahun')."</th>";
            $str .= "<th>:</th>";
            $str .= "<td>Rp. ".number_format($saldo_sebelum, 0, ',', '.')."</td>";
            $str .= "</tr>";

            $str .= "<tr>";
            $str .= "<th style='width:50%'>Total Pemasukan Tahun ".$request->input('tahun')."</th>";
            $str .= "<th>:</th>";
            $str .= "<td>Rp. ".number_format($ttl_pemasukan, 0, ',', '.')."</td>";
            $str .= "</tr>";

            $str .= "<tr>";
            $str .= "<th style='width:50%'>Total Pengeluaran Tahun ".$request->input('tahun')."</th>";
            $str .= "<th>:</th>";
            $str .= "<td>Rp. ".number_format($ttl_pengeluaran, 0, ',', '.')."</td>";
            $str .= "</tr>";

            $str .= "<tr>";
            $str .= "<th style='width:50%'>Saldo Tahun ".$request->input('tahun')."</th>";
            $str .= "<th>:</th>";
            $str .= "<td>Rp. ".number_format($saldo, 0, ',', '.')."</td>";
            $str .= "</tr>";

            $str .= "<tr>";
            $str .= "<th style='width:50%'>Saldo Di Bendahara</th>";
            $str .= "<th>:</th>";
            $str .= "<td>Rp. ".number_format($ttl_saldo, 0, ',', '.')."</td>";
            $str .= "</tr>";
        }
        else{
            $i_bln = $request->input('bulan') - 1;
            $keuangans = Keuangan::whereYear('tgl_keuangan', $request->input('tahun'))
            ->whereMonth('tgl_keuangan', $request->input('bulan'))
            ->get();

            foreach ($keuangans as $keuangan) {
                if ($keuangan->setting->jenis_keuangan == 'pemasukan') {
                    $ttl_pemasukan += $keuangan->nominal;
                }
                if ($keuangan->setting->jenis_keuangan == 'pengeluaran') {
                    $ttl_pengeluaran += abs($keuangan->nominal);
                }
            }

            if($request->input('bulan') == 1){
                $saldo_sebelum = Keuangan::whereYear('tgl_keuangan', '<', $request->input('tahun'))
                ->sum('nominal');
            }
            else{
                $saldo_bln= Keuangan::whereYear('tgl_keuangan', $request->input('tahun'))
                ->whereMonth('tgl_keuangan', '<', $request->input('bulan'))
                ->sum('nominal');

                $saldo_jan = Keuangan::whereYear('tgl_keuangan', '<', $request->input('tahun'))
                ->sum('nominal');

                $saldo_sebelum = $saldo_bln + $saldo_jan;
            }
            $saldo = ($ttl_pemasukan - $ttl_pengeluaran) + $saldo_sebelum;
            $ttl_saldo = Keuangan::sum('nominal');

            $str .= "<tr>";
            $str .= "<th style='width:50%'>Saldo Awal Bulan ".$bulans[$i_bln]." ".$request->input('tahun')."</th>";
            $str .= "<th>:</th>";
            $str .= "<td>Rp. ".number_format($saldo_sebelum, 0, ',', '.')."</td>";
            $str .= "</tr>";

            $str .= "<tr>";
            $str .= "<th style='width:50%'>Total Pemasukan Bulan ".$bulans[$i_bln]." ".$request->input('tahun')."</th>";
            $str .= "<th>:</th>";
            $str .= "<td>Rp. ".number_format($ttl_pemasukan, 0, ',', '.')."</td>";
            $str .= "</tr>";

            $str .= "<tr>";
            $str .= "<th style='width:50%'>Total Pengeluaran Bulan ".$bulans[$i_bln]." ".$request->input('tahun')."</th>";
            $str .= "<th>:</th>";
            $str .= "<td>Rp. ".number_format($ttl_pengeluaran, 0, ',', '.')."</td>";
            $str .= "</tr>";

            $str .= "<tr>";
            $str .= "<th style='width:50%'>Saldo Bulan ".$bulans[$i_bln]." ".$request->input('tahun')."</th>";
            $str .= "<th>:</th>";
            $str .= "<td>Rp. ".number_format($saldo, 0, ',', '.')."</td>";
            $str .= "</tr>";

            $str .= "<tr>";
            $str .= "<th style='width:50%'>Saldo Di Bendahara</th>";
            $str .= "<th>:</th>";
            $str .= "<td>Rp. ".number_format($ttl_saldo, 0, ',', '.')."</td>";
            $str .= "</tr>";
        }
        echo $str;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getJumlah(Request $request)
    {
        $bulans = array('Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember');
        $str = "";
        $ttl_pemasukan = 0;
        $ttl_pengeluaran = 0;
        if ($request->input('bulan') == 'all') {
            $keuangans = Keuangan::whereYear('tgl_keuangan', $request->input('tahun'))
            ->get();

            foreach ($keuangans as $keuangan) {
                if ($keuangan->setting->jenis_keuangan == 'pemasukan') {
                    $ttl_pemasukan += $keuangan->nominal;
                }
                if ($keuangan->setting->jenis_keuangan == 'pengeluaran') {
                    $ttl_pengeluaran += abs($keuangan->nominal);
                }
            }

            $str .= "<tr>";
            $str .= "<th colspan='2'>Jumlah</th>";
            $str .= "<th style='width: 15%; text-align:right;'>".number_format($ttl_pemasukan, 0, ',', '.')."</th>";
            $str .= "<th style='width: 15%; text-align:right;'>".number_format($ttl_pengeluaran, 0, ',', '.')."</th>";
            $str .= "</tr>";
        }
        else{
            $i_bln = $request->input('bulan') - 1;
            $keuangans = Keuangan::whereYear('tgl_keuangan', $request->input('tahun'))
            ->whereMonth('tgl_keuangan', $request->input('bulan'))
            ->get();

            foreach ($keuangans as $keuangan) {
                if ($keuangan->setting->jenis_keuangan == 'pemasukan') {
                    $ttl_pemasukan += $keuangan->nominal;
                }
                if ($keuangan->setting->jenis_keuangan == 'pengeluaran') {
                    $ttl_pengeluaran += abs($keuangan->nominal);
                }
            }

            $str .= "<tr>";
            $str .= "<th colspan='2'>Jumlah</th>";
            $str .= "<th style='width: 15%'>".number_format($ttl_pemasukan, 0, ',', '.')."</th>";
            $str .= "<th style='width: 15%'>".number_format($ttl_pengeluaran, 0, ',', '.')."</th>";
            $str .= "</tr>";
        }
        echo $str;
    }

}
