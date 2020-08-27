
@extends('layouts.app', ['activePage' => 'formulir_jumlah_bayi_bblr', 'title' => 'Sistem Informasi Pusat Statistik', 'navName' => 'Table List', 'activeButton' => 'laravel'])

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
                            <form method="post" action="{{ url('/formulir/jumlah_bayi_lahir_bblr')}}" autocomplete="off">
                            {{ @csrf_field() }}
                                
                                <h6 class="heading-small text-muted mb-4">{{ __('Jumlah Bayi Lahir, Bayi Berat Badan Lahir Rendah (BBLR)') }}</h6>
                                
                                
        
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
                                        <label class="form-control-label" for="input-bayi_lahir">{{ __('Bayi Lahir') }}</label>
                                        <input type="bayi_lahir" name="bayi_lahir" id="input-bayi_lahir" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Masukkan Jumlah Bayi Lahir') }}" value="" required>
        
                                        @include('alerts.feedback', ['field' => 'name'])
                                    </div>
                                    <div class="form-group{{ $errors->has('') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input-BBLR_jumlah">{{ __('BBLR Jumlah') }}</label>
                                        <input type="BBLR_jumlah" name="BBLR_jumlah" id="input-BBLR_jumlah" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Masukkan Jumlah BBLR Jumlah') }}" value="" required>
        
                                        @include('alerts.feedback', ['field' => 'name'])
                                    </div>
                                    <div class="form-group{{ $errors->has('') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input-BBLR_dirujuk">{{ __('BBLR Dirujuk') }}</label>
                                        <input type="BBLR_dirujuk" name="BBLR_dirujuk" id="input-BBLR_dirujuk" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Masukkan Jumlah BBLR Dirujuk') }}" value="" required>
        
                                        @include('alerts.feedback', ['field' => 'name'])
                                    </div>
                                    <div class="form-group{{ $errors->has('') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input-BBLR_giji_buruk">{{ __('BBLR Giji Buruk') }}</label>
                                        <input type="BBLR_giji_buruk" name="BBLR_giji_buruk" id="input-BBLR_giji_buruk" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Masukkan Jumlah BBLR Giji Buruk') }}" value="" required>
        
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