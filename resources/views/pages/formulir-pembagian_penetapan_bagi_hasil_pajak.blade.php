@extends('layouts.app', ['activePage' => 'formulir-pembangunanbersumberdanadesa', 'title' => 'Sistem Informasi Pusat Statistik', 'navName' => 'Table List', 'activeButton' => 'laravel'])

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
                            <form method="post" action="{{ url('/formulir/tambah-pembagianpenetapanbagihasilpajak')}}" autocomplete="off">
                            {{ @csrf_field() }}
                                
                                <h6 class="heading-small text-muted mb-4">{{ __('Pembagian dan Penetapan Bagi Hasil Pajak Daerah Kepada Pemerintah Desa') }}</h6>
                                
                                
        
                                <div class="pl-lg-4">
                                    <div class="form-group{{ $errors->has('') ? ' has-danger' : 'name' }}">
                                        <label class="form-control-label" for="input-name">
                                           
                                            {{ __('Kecamatan') }}
                                        </label>
                                        <input type="text" name="kecamatan" id="input-name" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Kecamatan') }}" value="" required autofocus>
        
                                        @include('alerts.feedback', ['field' => 'name'])
                                    </div>

                                    <div class="form-group{{ $errors->has('') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input-desa">{{ __('Desa') }}</label>
                                        <input type="desa" name="desa" id="input-desa" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Desa') }}" value="" required>
        
                                        @include('alerts.feedback', ['field' => 'name'])
                                    </div>

                                    <div class="form-group{{ $errors->has('') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input-desa">{{ __('Alokasi Dasar') }}</label>
                                        <input type="text" name="alokasi_dasar" id="input-desa" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Alokasi Dasar') }}" value="" required>
        
                                        @include('alerts.feedback', ['field' => 'name'])
                                    </div>

                                    <div class="form-group{{ $errors->has('') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input-desa">{{ __('Realisasi PBB') }}</label>
                                        <input type="text" name="realisasi_PBB" id="input-desa" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Realisasi_PBB') }}" value="" required>
        
                                        @include('alerts.feedback', ['field' => 'name'])
                                    </div>

                                    <div class="form-group{{ $errors->has('') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input-desa">{{ __('Bobot') }}</label>
                                        <input type="text" name="bobot" id="input-desa" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Bobot') }}" value="" required>
        
                                        @include('alerts.feedback', ['field' => 'name'])
                                    </div>

                                    <div class="form-group{{ $errors->has('') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input-desa">{{ __('Alokasi Formula') }}</label>
                                        <input type="text" name="alokasi_formula" id="input-desa" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Alokasi Formula') }}" value="" required>
        
                                        @include('alerts.feedback', ['field' => 'name'])
                                    </div>

                                    <div class="form-group{{ $errors->has('') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input-desa">{{ __('Pagu Bagi Hasil Pajak Per-Desa') }}</label>
                                        <input type="text" name="pagu_bagi" id="input-desa" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Pagu Bagi Hasil Pajak Per-Desa') }}" value="" required>
    
                                        @include('alerts.feedback', ['field' => 'name'])
                                    </div>

                                    <div class="form-group{{ $errors->has('') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input-tahun">{{ __('Tahun') }}</label>
                                        <input type="text" name="tahun" id="input-tahun" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Tahun') }}" value="" required>      
                                        @include('alerts.feedback', ['field' => 'name'])
                                    </div>
                                   
                                    <div class="text-center">
                                        <button type="submit" class="btn btn-default mt-4">{{ __('Tambah') }}</button>
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