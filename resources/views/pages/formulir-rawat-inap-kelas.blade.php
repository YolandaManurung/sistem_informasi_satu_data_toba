@extends('layouts.app', ['activePage' => 'formulir-rawat-inap-kelas', 'title' => 'Sistem Informasi Pusat Statistik', 'navName' => 'Table List', 'activeButton' => 'laravel'])

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
                            <form method="post" action="{{ url('/formulir/formulir-rawat-inap-kelas')}}" autocomplete="off">
                            {{ @csrf_field() }}
                                
                                <h6 class="heading-small text-muted mb-4">{{ __('Jenis Bantuan Pemerintah ke Masyarakat perkecamatan Tahun 2019') }}</h6>
                               
                                    <div class="form-group{{ $errors->has('') ? ' has-danger' : 'name' }}">
                                        <label class="form-control-label" for="input-name">
                                            <!-- <i class="w3-xxlarge fa fa-user"></i> -->
                                            {{ __('Jumlah Kamar VIP') }}
                                        </label>
                                        <input type="text" name="VIP" id="input-name" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Jumlah Kamar VIP') }}" value="" required autofocus>
        
                                        @include('alerts.feedback', ['field' => 'name'])
                                    </div>

                                    <div class="form-group{{ $errors->has('') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input-desa">{{ __('Jumlah Kamar Kelas I') }}</label>
                                        <input type="desa" name="kelas1" id="input-desa" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Jumlah Kamar Kelas I') }}" value="" required>
        
                                        @include('alerts.feedback', ['field' => 'desa'])
                                    </div>
                                    <div class="form-group{{ $errors->has('') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input-kelurahan">{{ __('Jumlah Kamar Kelas II') }}</label>
                                        <input type="kelurahan" name="kelas2" id="input-kelurahan" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Jumlah Kamar Kelas II') }}" value="" required>
                                    
                                    @include('alerts.feedback', ['field' => 'Jumlah Kamar Kelas III'])
                                    </div>
                                    <div class="form-group{{ $errors->has('') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input-kelurahan">{{ __('Jumlah Kamar Kelas III') }}</label>
                                        <input type="kelurahan" name="kelas3" id="input-kelurahan" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Jumlah Kamar Kelas III') }}" value="" required>
                                    
                                    @include('alerts.feedback', ['field' => 'desa'])
                                    </div>
                                    <div class="form-group{{ $errors->has('') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input-kelurahan">{{ __('Tahun') }}</label>
                                        <input type="kelurahan" name="tahun" id="input-kelurahan" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Tahun') }}" value="" required>
        
                                        @include('alerts.feedback', ['field' => 'kelurahan'])
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
       
@endsection                           