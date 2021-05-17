<?php

namespace App\Http\Controllers;

use App\Jemaat;
use App\Pengumuman;
use App\Ibadah;
use App\Baptis;
use App\Sidi;
use App\Nikah;
use App\Keuangan;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

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
        $year = date('Y');
        $chart = array(0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);
        $jum_jemaat = Jemaat::count();
        $jum_baptis = Baptis::whereDate('tgl_baptis', '>', $date)->count();
        $jum_sidi = Sidi::whereDate('tgl_sidi', '>', $date)->count();
        $jum_nikah = Nikah::whereDate('tgl_nikah', '>', $date)->count();
        $jum_ibadah = Ibadah::whereDate('tgl_ibadah', '>', $date)->count();
        $pengumumans = Pengumuman::orderBy('id', 'desc')->limit(10)->get();
        $keuangans = Keuangan::whereYear('tgl_keuangan', $year)
            ->orderby('tgl_keuangan')
            ->get();
        foreach ($keuangans as $uang) {
            $bulan = Carbon::parse($uang->tgl_keuangan)->month;
            $chart[($bulan)-1] += (int)$uang->nominal;
        }
        return view('home', [
            'jum_jemaat' => $jum_jemaat,
            'jum_baptis' => $jum_baptis,
            'jum_sidi' => $jum_sidi,
            'jum_nikah' => $jum_nikah,
            'jum_ibadah' => $jum_ibadah,
            'pengumumans' => $pengumumans,
            'datachart' => $chart,
            'year' => $year,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function editprofile()
    {
        return view('auth.changeprofile');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function updatepropfile(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'jk' => 'required',
        ]);

        $tlp = preg_replace("/[^0-9.]/", "", $request->input("no_tlp"));
        $request->merge(["no_tlp" => $tlp]);

        $user = User::where('id', Auth::user()->jemaat['id_user'])->first();
        $user->name = $request->input("name");
        $user->email = $request->input("email");
        $user->save();
  
        Auth::user()->jemaat->update($request->except(['email']));

        return redirect()->route('changeprofile.edit')
                        ->with('success','Profile berhasil diubah.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Jemaat  $jemaat
     * @return \Illuminate\Http\Response
     */
    public function uploadFoto(Request $request)
    {
        if($request->file('file')){
			$file = $request->file('file');
			$namefile = "profile-".Auth::user()->jemaat->id.".".$file->getClientOriginalExtension();
			$request->merge(["foto" => $namefile]);
			$file->move("img/upload", $namefile);
            Auth::user()->jemaat->update($request->except(['file']));
		}
        return redirect()->route('changeprofile.edit');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function editpassword()
    {
        return view('auth.changepassword');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function updatepassword(Request $request)
    {
        if (!(Hash::check($request->get('password_lama'), Auth::user()->password))) {
            // The passwords matches
            return redirect()->back()->with("err_pass_lama","Password lama anda tidak sesuai, silahkan coba kembali");
        }
        if(strcmp($request->get('password_lama'), $request->get('password_baru')) == 0){
            //Current password and new password are same
            return redirect()->back()->with("err_pass_baru","Password baru tidak boleh sama dengan password lama")->withInput($request->except('password_baru'));
        }
        if(!(strcmp($request->get('password_baru'), $request->get('konfirm_password'))) == 0){
            //New password and confirm password are not same
            return redirect()->back()->with("err_pass_konfirm","Password yang dimasukkan harus sama dengan password baru")->withInput($request->except('konfirm_password'));
        }
        //Change Password
        $user = Auth::user();
        $user->password = bcrypt($request->get('password_baru'));
        $user->save();

        Auth::logout();

        return redirect()->route('home')
                        ->with('success','Password berhasil diubah.');
    }
}
