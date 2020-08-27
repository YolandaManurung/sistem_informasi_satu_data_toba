
@extends('layouts.app', ['activePage' => 'register', 'title' => 'Sistem Informasi Pusat Statistik', 'navName' => 'Table List', 'activeButton' => 'laravel'])

@section('content')

 <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header" align="center">{{ __('Buat Akun Dinas') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ url('/register_dinas') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="nama_dinas" class="col-md-4 col-form-label text-md-right">{{ __('Nama Dinas') }}</label>

                            <div class="col-md-6">
                                <input id="nama_dinas" type="text" class="form-control @error('nama_dinas') is-invalid @enderror" name="nama_dinas" value="{{ old('nama_dinas') }}" required autocomplete="nama_dinas" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                        <label for="role" class="col-md-4 col-form-label text-md-right">{{ __('Role') }}</label>
                        <div class="col-md-6">
                                                    <select name="role" class="form-control">
                                                        <option value="1">Pemerintahan</option>
                                                        <option value="2">Kependudukan dan Tenaga Kerja</option>
                                                        <option value="3">Kesehatan</option>
                                                        <option value="4">Pariwisata</option>
                                                        <option value="5">Pendidikan</option>
                                                        <option value="6">Peternakan, Perikanan, Perkebunan, dan Pertanian</option>
                                                        <option value="7">Perindustrian dan Teknologi</option>
                                                        <option value="8">Infrastruktur</option>
                                                        <option value="9">Pegawai(BKD)</option>
                                                        <option value="10">PDAM</option>
                                                        <option value="11">Lingkungan Hidup</option>
                                                        <option value="12">RSUD</option>
                                                        <option value="13">Ketahanan Pangan</option>
                                                        <option value="12">Admin</option>
                                                    </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="username" class="col-md-4 col-form-label text-md-right">{{ __('Username') }}</label>

                            <div class="col-md-6">
                                <input id="username" type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('nama_dinas') }}" required autocomplete="nama_dinas" autofocus>

                                @error('username')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Email') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="text" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="alamat_kantor" class="col-md-4 col-form-label text-md-right">{{ __('Alamat Kantor') }}</label>

                            <div class="col-md-6">
                                <input id="alamat_kantor" type="text" class="form-control @error('alamat_kantor') is-invalid @enderror" name="alamat_kantor" value="{{ old('alamat_kantor') }}" required autocomplete="alamat_kantor" autofocus>

                                @error('alamat_kantor')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="nomor_telepon" class="col-md-4 col-form-label text-md-right">{{ __('Nomor Telepon Kantor') }}</label>

                            <div class="col-md-6">
                                <input id="nomor_telepon" type="text" class="form-control @error('nomor_telepon') is-invalid @enderror" name="nomor_telepon" value="{{ old('nomor_telepon') }}" required autocomplete="nomor_telepon" autofocus>

                                @error('nomor_telepon')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>



                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Daftarkan') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
