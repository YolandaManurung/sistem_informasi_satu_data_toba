@extends('layouts.app', ['activePage' => 'tambah_luas_tanaman_dan_produksi_aren_dan_kemiri', 'title' => 'Sistem Informasi Pusat Statistik', 'navName' => 'Table List', 'activeButton' => 'laravel'])

@section('content')
    <div class="content">


    @if(session('error'))
            <div class="alert alert-error">
            {{ session('error') }}
            </div>
            @endif

            @if(count($errors) > 0)
            <div class="alert alert-danger">
            <strong>Perhatian !!!</strong>
            <br>
            <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
            </div>
            @endif



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
                            <form method="post" action="{{ url('/formulir/tambah_luas_tanaman_dan_produksi_aren_dan_kemiri')}}" autocomplete="off">
                            {{ @csrf_field() }}
                                
                                <h6 class="heading-small text-muted mb-4">{{ __('Luas Tanaman dan Produksi Aren dan Kemiri Tanaman Perkebunan Rakyat Menurut Kecamatan') }}</h6>
                                
                                
        
                                <div class="pl-lg-4">
                                    <div class="form-group{{ $errors->has('') ? ' has-danger' : 'kecamatan' }}">
                                        <label class="form-control-label" for="input-kecamatan">
                                            <!-- <i class="w3-xxlarge fa fa-user"></i> -->
                                            {{ __('Kecamatan') }}
                                        </label>
                                        <input type="text" name="kecamatan" id="input-name" class="form-control{{ $errors->has('kecamatan') ? ' is-invalid' : '' }}" placeholder="{{ __('Nama Kecamatan') }}" value="" required autofocus>
        
                                        @include('alerts.feedback', ['field' => 'name'])
                                    </div>
                                    <div class="form-group{{ $errors->has('') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input-luas_areal_aren">{{ __('Luas Areal Aren') }}</label>
                                        <input type="text" name="luas_areal_aren" id="input-luas_areal_aren" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Luas Areal Aren') }}" value="" required>
        
                                        @include('alerts.feedback', ['field' => 'name'])
                                    </div>
                                    <div class="form-group{{ $errors->has('') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input-produksi_aren">{{ __('Produksi Aren (Ton)') }}</label>
                                        <input type="text" name="produksi_aren" id="input-produksi_aren" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Produksi Aren (Ton)') }}" value="" required>
        
                                        @include('alerts.feedback', ['field' => 'name'])
                                    </div>

                                    <div class="form-group{{ $errors->has('') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input-produktivitas_aren">{{ __('Produktivitas Aren (Kg/Ha)') }}</label>
                                        <input type="text" name="produktivitas_aren" id="input-produktivitas_aren" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Produktivitas Aren (Kg/Ha)') }}" value="" required>
        
                                        @include('alerts.feedback', ['field' => 'name'])
                                    </div>
                                   
                                    <div class="form-group{{ $errors->has('') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input-luas_areal_kemiri">{{ __('Luas Areal Kemiri') }}</label>
                                        <input type="text" name="luas_areal_kemiri" id="input-luas_areal_kemiri" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Luas Areal Kemiri') }}" value="" required>
        
                                        @include('alerts.feedback', ['field' => 'name'])
                                    </div>
                                    <div class="form-group{{ $errors->has('') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input-produksi_kemiri">{{ __('Produksi Kelapa Kemiri (Ton)') }}</label>
                                        <input type="text" name="produksi_kemiri" id="input-produksi_kemiri" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Produksi Kelapa Kemiri (Ton)') }}" value="" required>
        
                                        @include('alerts.feedback', ['field' => 'name'])
                                    </div>

                                    <div class="form-group{{ $errors->has('') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input-produktivitas_kemiri">{{ __('Produktivitas Kemiri (Kg/Ha)') }}</label>
                                        <input type="text" name="produktivitas_kemiri" id="input-produktivitas_kemiri" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Produktivitas Kemiri (Kg/Ha)') }}" value="" required>
        
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
    </div>
@endsection                           