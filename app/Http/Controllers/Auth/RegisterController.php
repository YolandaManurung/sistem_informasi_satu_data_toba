<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
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
        $this->middleware('admin');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'nama_dinas' => ['required', 'string'],
            'email' => ['required', 'string', 'email', 'unique:users'],
            'alamat_kantor' => ['required', 'string'],
            'username' => ['required', 'string', 'unique:users'],
            'nomor_telepon' => ['required', 'string', 'max:20'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'role' => ['required', 'string'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return User::create([
            'nama_dinas' => $data['nama_dinas'],
            'email' => $data['email'],
            'role' => $data['role'],
            'username' => $data['username'],
            'alamat_kantor' => $data['alamat_kantor'],
            'nomor_telepon' => $data['nomor_telepon'],
            'password' => Hash::make($data['password']),
        ]);
    }

    public function register(){
        return view ("auth.register_admin");
    }
}
