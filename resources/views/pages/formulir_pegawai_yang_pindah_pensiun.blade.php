@extends('layouts.app', ['activePage' => 'formulir_pegawai_yang_pindah_pensiun', 'title' => 'Sistem Informasi Pusat Statistik', 'navName' => 'Table List', 'activeButton' => 'laravel'])

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
                            <form method="post" action="{{ url('/formulir/pegawai_yang_pindah_pensiun')}}" autocomplete="off">
                            {{ @csrf_field() }}
                                
                                <h6 class="heading-small text-muted mb-4">{{ __('Jumlah Pegawai Negeri Sipil Pindah, Pesiun') }}</h6>
        
                                <div class="pl-lg-4">
                                    <div class="form-group{{ $errors->has('') ? ' has-danger' : 'name' }}">
                                        <label class="form-control-label" for="input-name">
                                            <!-- <i class="w3-xxlarge fa fa-user"></i> -->
                                            {{ __('Tahun') }}
                                        </label>
                                        <input type="text" name="tahun" id="input-name" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Tahun') }}" value="" required autofocus>
        
                                        @include('alerts.feedback', ['field' => 'name'])
                                    </div>
                                    <div class="form-group{{ $errors->has('') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input-pindah_keluar_tobasa">
                                        {{ __('Pegawai Pindah Keluar Tobasa') }}
                                        </label>
                                        <input type="pindah_keluar_tobasa" name="pindah_keluar_tobasa" id="input-pindah_keluar_tobasa" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Masukkan Jumlah Pegawai Keluar Tobasa') }}" value="" required>
        
                                        @include('alerts.feedback', ['field' => 'name'])
                                    </div>
                                    <div class="form-group{{ $errors->has('') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input-pindah_masuk_tobasa">{{ __('Pegawai Pindah Masuk Tobasa') }}</label>
                                        <input type="pindah_masuk_tobasa" name="pindah_masuk_tobasa" id="input-pindah_masuk_tobasa" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Masukkan Jumlah Pegawai Keluar Tobasa') }}" value="" required>
        
                                        @include('alerts.feedback', ['field' => 'name'])
                                    </div>
                                    <div class="form-group{{ $errors->has('') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input-pensiun">{{ __('Pensiun') }}</label>
                                        <input type="pensiun" name="pensiun" id="input-pensiun" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Masukkan Jumlah Pegawai Pensiun') }}" value="" required>
        
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