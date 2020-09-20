<?php

namespace App\Http\Controllers;

use App\Keuangan;
use App\SetKeuangan;
use App\User;
use Illuminate\Http\Request;

class KeuanganController extends Controller
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
        $keuangans = Keuangan::orderBy('id', 'desc')->get();
        return view('keuangan.list', compact('keuangans'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index_keluar()
    {
        $keuangans = Keuangan::orderBy('id', 'desc')->get();
        return view('keuangan.listkeluar', compact('keuangans'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('keuangan.create');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create_keluar()
    {
        return view('keuangan.createkeluar');
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
            'nominal' => 'required',
            'tgl_keuangan' => 'required',
            'id_set' => 'required',
        ]);

        $nominal = preg_replace("/([^0-9])/i", "", $request->input("nominal"));
        $request->merge(["nominal" => $nominal]);
        if ($request->input("jenis_keuangan") == "pengeluaran") {
            $request->merge(["nominal" => "-".$request->input("nominal")]);
        }

        Keuangan::create($request->except(['jenis_keuangan']));

        if ($request->input("jenis_keuangan") == "pengeluaran") {
            return redirect()->route('keuangankeluar.index')
                            ->with('success','Data Keuangan baru berhasil ditambahkan.');
        }
        else{
            return redirect()->route('keuangan.index')
                            ->with('success','Data Keuangan baru berhasil ditambahkan.');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Keuangan  $keuangan
     * @return \Illuminate\Http\Response
     */
    public function show(Keuangan $keuangan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Keuangan  $keuangan
     * @return \Illuminate\Http\Response
     */
    public function edit(Keuangan $keuangan)
    {
        return view('keuangan.edit', compact('keuangan'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Keuangan  $keuangan
     * @return \Illuminate\Http\Response
     */
    public function edit_keluar(Keuangan $keuangan)
    {
        return view('keuangan.editkeluar', compact('keuangan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Keuangan  $keuangan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Keuangan $keuangan)
    {
        $request->validate([
            'nominal' => 'required',
            'tgl_keuangan' => 'required',
            'id_set' => 'required',
        ]);

        $nominal = preg_replace("/([^0-9])/i", "", $request->input("nominal"));
        $request->merge(["nominal" => $nominal]);
        if ($request->input("jenis_keuangan") == "pengeluaran") {
            $request->merge(["nominal" => "-".$request->input("nominal")]);
        }

        $keuangan->update($request->except(['jenis_keuangan']));

        if ($request->input("jenis_keuangan") == "pengeluaran") {
            return redirect()->route('keuangankeluar.index')
                            ->with('success','Data Keuangan berhasil diubah.');
        }
        else{
            return redirect()->route('keuangan.index')
                            ->with('success','Data Keuangan berhasil diubah.');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Keuangan  $keuangan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Keuangan $keuangan)
    {
        $keuangan->delete();

        return redirect()->route('keuangan.index')
                        ->with('success','Data Keuangan berhasil dihapus.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Keuangan  $keuangan
     * @return \Illuminate\Http\Response
     */
    public function destroy_keluar(Keuangan $keuangan)
    {
        $keuangan->delete();

        return redirect()->route('keuangankeluar.index')
                        ->with('success','Data Keuangan berhasil dihapus.');
    }

    public function getDaftarKeuangan(Request $request)
    {
        $settings = SetKeuangan::where('jenis_keuangan', $request->input('jenis'))->get();
        if($request->input('id_set')){
            echo "<option value='' disabled>Pilih Keterangan keuangan</option>";
        }else{
            echo "<option value='' disabled selected>Pilih Keterangan keuangan</option>";
        }
        foreach ($settings as $setting) {
            if($request->input('id_set')){
                $select = "";
                if ($setting->id == $request->input('id_set')) {
                    $select = "selected";
                }
                echo "<option value='$setting->id' $select>$setting->keterangan</option>";
            }
            else{
                echo "<option value='$setting->id'>$setting->keterangan</option>";
            }
        }
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
            $str .= "<td colspan='4' style='text-align:center'>Tidak Ada Data Pemasukan</td>";
            $str .= "</tr>";
        }
        else{
            foreach ($keuangans as $keuangan):
                if ($keuangan->setting->jenis_keuangan == 'pemasukan') {
                    $str .= "<tr>";
                    $str .= "<td>$keuangan->tgl_keuangan</td>";
                    if ($keuangan->id_set == '1') {
                        $str .= "<td>".$keuangan->keterangan_lain."</td>";
                    }
                    else{
                        $str .= "<td>".$keuangan->setting->keterangan."</td>";
                    }
                    $str .= "<td>";
                    $str .= number_format($keuangan->nominal, 0, ',', '.');
                    
                    $str .= "</td>";
                    $str .= "<td>";
                    $str .= "<div class='btn-group'>";
                    if (auth()->user()->can('update keuangan')){
                    $str .= "<a href='route('keuangan.edit',$keuangan->id)' class='btn btn-sm bg-gradient-info'><i class='fas fa-pencil-alt'></i> Ubah</a>";
                    }
                    if (auth()->user()->can('delete keuangan')) {
                    $str .= "<button type='button' class='btn btn-sm bg-gradient-danger' data-toggle='modal' data-target='#confrimModal$keuangan->id'><i class='fas fa-trash'></i> Hapus</button>";
                    }
                    $str .= "</div>";
                    $str .= "</td>";
                    $str .= "</tr>";
                }
            endforeach;
        }
        echo $str;
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getTableKeluar(Request $request)
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
            $str .= "<td colspan='4' style='text-align:center'>Tidak Ada Data Pengeluaran</td>";
            $str .= "</tr>";
        }
        else{
            foreach ($keuangans as $keuangan):
                if ($keuangan->setting->jenis_keuangan == 'pengeluaran') {
                    $str .= "<tr>";
                    $str .= "<td>$keuangan->tgl_keuangan</td>";
                    if ($keuangan->id_set == '2') {
                        $str .= "<td>".$keuangan->keterangan_lain."</td>";
                    }
                    else{
                        $str .= "<td>".$keuangan->setting->keterangan."</td>";
                    }
                    $str .= "<td>";
                    $str .= number_format(abs($keuangan->nominal), 0, ',', '.');
                    
                    $str .= "</td>";
                    $str .= "<td>";
                    $str .= "<div class='btn-group'>";
                    if (auth()->user()->can('update keuangan')){
                    $str .= "<a href='route('keuangan.edit',$keuangan->id)' class='btn btn-sm bg-gradient-info'><i class='fas fa-pencil-alt'></i> Ubah</a>";
                    }
                    if (auth()->user()->can('delete keuangan')) {
                    $str .= "<button type='button' class='btn btn-sm bg-gradient-danger' data-toggle='modal' data-target='#confrimModal$keuangan->id'><i class='fas fa-trash'></i> Hapus</button>";
                    }
                    $str .= "</div>";
                    $str .= "</td>";
                    $str .= "</tr>";
                }
            endforeach;
        }
        echo $str;
    }
}
