@extends('layouts.app', ['activePage' => 'formulir_jumlah_tenaga_kerja', 'title' => 'Sistem Informasi Pusat Statistik', 'navName' => 'Table List', 'activeButton' => 'laravel'])

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="section-image">
                <!--   you can change the color of the filter page using: data-color="blue | purple | green | orange | red | rose " -->
                <div class="row">

                    <div class="card col-md-8">
                        <div class="card-header">
                            <div class="row align-items-center">
                                <div class="col-md-8">
                                    <h3 class="mb-0">{{ __('Tambahkan Data') }}</h3>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <form method="post" action="{{ url('/formulir/jumlah_tenaga_kerja')}}" autocomplete="off">
                            {{ @csrf_field() }}
                                
                                <h6 class="heading-small text-muted mb-4">{{ __('Jumlah Penduduk Menurut Kecamatan dan Jenis Kelamin Kabupaten Toba Samosir') }}</h6>
                                
                                
        
                                <div class="pl-lg-4">
                                    <div class="form-group{{ $errors->has('') ? ' has-danger' : 'name' }}">
                                        <label class="form-control-label" for="input-name">
                                            <!-- <i class="w3-xxlarge fa fa-user"></i> -->
                                            {{ __('Kelompok Umur') }}
                                        </label>
                                        <input type="text" name="kelompok_umur" id="input-name" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Tuliskan Kelompok Umur') }}" value="" required autofocus>
        
                                        @include('alerts.feedback', ['field' => 'name'])
                                    </div>
                                    <div class="form-group{{ $errors->has('') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input-bekerja">{{ __('Jumlah Yang Bekerja') }}</label>
                                        <input type="bekerja" name="bekerja" id="input-bekerja" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Masukkan Jumlah Bekerja') }}" value="" required>
        
                                        @include('alerts.feedback', ['field' => 'name'])
                                    </div>
                                    <div class="form-group{{ $errors->has('') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input-pencari_kerja">{{ __('Jumlah Pencari Kerja') }}</label>
                                        <input type="pencari_kerja" name="pencari_kerja" id="input-pencari_kerja" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Masukkan Jumlah Pencari Kerja') }}" value="" required>
        
                                        @include('alerts.feedback', ['field' => 'name'])
                                    </div>
                                    <div class="form-group{{ $errors->has('') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input-angkatan_kerja">{{ __('Jumlah Angkatan Kerja') }}</label>
                                        <input type="angkatan_kerja" name="angkatan_kerja" id="input-angkatan_kerja" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Masukkan Jumlah Angkatan Kerja') }}" value="" required>
        
                                        @include('alerts.feedback', ['field' => 'name'])
                                    </div>
                                    <div class="form-group{{ $errors->has('') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input-bukan_angkatan_kerja">{{ __('Jumlah Bukan Angkatan Kerja') }}</label>
                                        <input type="bukan_angkatan_kerja" name="bukan_angkatan_kerja" id="input-bukan_angkatan_kerja" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Masukkan  Bukan Angkatan Kerja') }}" value="" required>
        
                                        @include('alerts.feedback', ['field' => 'name'])
                                    </div>
                                    <div class="form-group{{ $errors->has('') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input-angkatan_kerja">{{ __('Jumlah Tenaga Kerja') }}</label>
                                        <input type="tenaga_kerja" name="tenaga_kerja" id="input-tenaga_kerja" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Masukkan Jumlah Tenaga Kerja') }}" value="" required>
        
                                        @include('alerts.feedback', ['field' => 'name'])
                                    </div>
                                    <div class="form-group{{ $errors->has('') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input-APAK">{{ __('Jumlah APAK') }}</label>
                                        <input type="APAK" name="APAK" id="input-APAK" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Masukkan Jumlah APAK') }}" value="" required>
        
                                        @include('alerts.feedback', ['field' => 'name'])
                                    </div>
                                    <div class="form-group{{ $errors->has('') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input-pengangguran_terbuka">{{ __('Jumlah Penggangguran Terbuka') }}</label>
                                        <input type="pengangguran_terbuka" name="pengangguran_terbuka" id="input-pengangguran_terbuka" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Masukkan Jumlah Penggangguran Terbuka') }}" value="" required>
        
                                        @include('alerts.feedback', ['field' => 'name'])
                                    </div>
                                    <div class="form-group{{ $errors->has('') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input-tahun">{{ __('Tahun') }}</label>
                                        <input type="tahun" name="tahun" id="input-tahun" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Masukkan Tahun') }}" value="" required>
        
                                        @include('alerts.feedback', ['field' => 'name'])
                                    </div>
                                    <div class="text-center">
                                        <button type="submit" class="btn btn-primary mt-4">{{ __('Tambah') }}</button>
                                    </div>
                                </div>
                            </form>
                            <hr class="my-4" />
                            
                        </div>
                    </div>
            </div>
        </div>
        </div>
 
@endsection                           