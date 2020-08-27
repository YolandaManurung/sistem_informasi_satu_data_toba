@extends('layouts.app', ['activePage' => 'formulir_jumlah_tenaga_kesehatan', 'title' => 'Sistem Informasi Pusat Statistik', 'navName' => 'Table List', 'activeButton' => 'laravel'])

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
                            <form method="post" action="{{ url('/formulir/jumlah_tenaga_kesehatan')}}" autocomplete="off">
                            {{ @csrf_field() }}
                                
                                <h6 class="heading-small text-muted mb-4">{{ __('Jumlah Tenaga Kesehatan Menurut Kecamatan') }}</h6>
                                
                                
        
                                <div class="pl-lg-4">
                                    <div class="form-group{{ $errors->has('') ? ' has-danger' : 'name' }}">
                                        <label class="form-control-label" for="input-name">
                                            <!-- <i class="w3-xxlarge fa fa-user"></i> -->
                                            {{ __('Kecamatan') }}
                                        </label>
                                        <input type="text" name="kecamatan" id="input-name" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Nama Kecamatan') }}" value="" required autofocus>
        
                                        @include('alerts.feedback', ['field' => 'name'])
                                    </div>
                                    <div class="form-group{{ $errors->has('') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input-tenaga_medis">{{ __('Tenaga Medis') }}</label>
                                        <input type="tenaga_medis" name="tenaga_medis" id="input-tenaga_medis" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Masukkan Jumlah Tenaga Medis') }}" value="" required>
        
                                        @include('alerts.feedback', ['field' => 'name'])
                                    </div>
                                    <div class="form-group{{ $errors->has('') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input-tenaga_keperawatan">{{ __('Tenaga Keperawatan') }}</label>
                                        <input type="tenaga_keperawatan" name="tenaga_keperawatan" id="input-tenaga_keperawatan" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Masukkan Jumlah Tenaga Keperawatan') }}" value="" required>
        
                                        @include('alerts.feedback', ['field' => 'name'])
                                    </div>
                                    <div class="form-group{{ $errors->has('') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input-tenaga_kebidanan">{{ __('Tenaga Kebidanan') }}</label>
                                        <input type="tenaga_kebidanan" name="tenaga_kebidanan" id="input-tenaga_kebidanan" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Masukkan Jumlah Tenaga Kebidanan') }}" value="" required>
        
                                        @include('alerts.feedback', ['field' => 'name'])
                                    </div>
                                    <div class="form-group{{ $errors->has('') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input-tenaga_kefarmasian">{{ __('Tenaga Kefarmasian') }}</label>
                                        <input type="tenaga_kefarmasian" name="tenaga_kefarmasian" id="input-tenaga_kefarmasian" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Masukkan Jumlah Tenaga Kefarmasian') }}" value="" required>
        
                                        @include('alerts.feedback', ['field' => 'name'])
                                    </div>
                                    <div class="form-group{{ $errors->has('') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input-tenaga_kesehatan_lainnya">{{ __('Tenaga Kesehatan Lainnya') }}</label>
                                        <input type="tenaga_kesehatan_lainnya" name="tenaga_kesehatan_lainnya" id="input-tenaga_kesehatan_lainnya" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Masukkan Jumlah Tenaga Kesehatan Lainnya') }}" value="" required>
        
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