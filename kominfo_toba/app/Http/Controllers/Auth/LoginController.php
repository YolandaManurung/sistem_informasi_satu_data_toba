<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function login(Request $request)
    {   
        $input = $request->all();

        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if(auth()->attempt(array('email' => $input['email'], 'password' => $input['password'])))
        {
            if (auth()->user()->role == 0) {
                return redirect()->route('dashboard');
            }
            elseif(auth()->user()->role == 1){
                return redirect()->route('pemerintahan_jlh_desa_kel');
            }
            elseif(auth()->user()->role == 2) {
                return redirect()->route('kependudukan_jumlah_penduduk');
            }
            elseif(auth()->user()->role == 3) {
                return redirect()->route('kesehatan_rekapitulasi_penyandang_masalah');
            }
            elseif(auth()->user()->role == 4) {
                return redirect()->route('pariwisata');
            }
            elseif(auth()->user()->role == 5) {
                return redirect()->route('pendidikanpaud');
            }
            elseif(auth()->user()->role == 6) {
                return redirect()->route('peternakan_populasi_ternak_besar');
            }
            elseif(auth()->user()->role == 7) {
                return redirect()->route('daftar_industri_kecil_dan_menengah');
            }
            elseif(auth()->user()->role = 8) {
                return redirect()->route('infrastruktur_aplikasi_opd_toba');
            }
            elseif(auth()->user()->role = 9) {
                return redirect()->route('pegawai_menurut_jenis_kelamin');
            }
            elseif(auth()->user()->role = 10) {
                return redirect()->route('pdam_jumlah_pemakaian_air_bersih');
            }
            elseif(auth()->user()->role = 11) {
                return redirect()->route('lindup_izin_lingkungan_berdasarkan_perusahaan');
            }
            elseif(auth()->user()->role = 12) {
                return redirect()->route('rsud_kamar_rawat_inap');
            }
            elseif(auth()->user()->role = 13) {
                return redirect()->route('ketapang');
            }
            else{
                return redirect()->route('home');
            }
        }else{
            return redirect()->route('login')
                ->with('error','email And Password Are Wrong.');
        }
        
    }
}
