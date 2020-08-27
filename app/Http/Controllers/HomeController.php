<?php

namespace App\Http\Controllers;

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
        return view('dashboard');
    }
    public function adminHome()
    {
        return view('adminHome');
    }

    public function infrastrukturHome()
    {
        return view('pages.infrastruktur_jembatan');
    }

    public function PendidikanHome()
    {
        return view('pendidikanHome');
    }

    public function KependudukanHome()
    {
        return view('a');
    }
    public function PemerintahanHome()
    {
        return view('pemerintahan');
    }
    public function a()
    {
        return view('pages.pendidikanpaud');
    }
    
}
