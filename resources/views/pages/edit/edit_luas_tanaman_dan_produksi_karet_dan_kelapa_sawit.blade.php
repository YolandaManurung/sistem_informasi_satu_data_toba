@extends('layouts.app', ['activePage' => 'tambah_luas_tanaman_dan_produksi_karet_dan_kelapa_sawit', 'title' => 'Sistem Informasi Pusat Statistik', 'navName' => 'Table List', 'activeButton' => 'laravel'])

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
                                    <h3 class="mb-0">{{ __('Edit Data') }}</h3>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                        <form action="{{url('/update9',$tabel9->id)}}" method="post" class="account-form">                   
                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                        <input type = "hidden" name = "status" value = "Requested">
                        {{method_field('PUT')}}
                                
                                <h6 class="heading-small text-muted mb-4">{{ __('Luas Tanaman dan Produksi Karet dan Kelapa Sawit Tanaman Perkebunan Rakyat Menurut Kecamatan') }}</h6>
                                
                                
        
                                <div class="pl-lg-4">
                                    <div class="form-group{{ $errors->has('') ? ' has-danger' : 'kecamatan' }}">
                                        <label class="form-control-label" for="input-kecamatan">
                                            <!-- <i class="w3-xxlarge fa fa-user"></i> -->
                                            {{ __('Kecamatan') }}
                                        </label>
                                        <input type="text" name="kecamatan" id="input-name" class="form-control{{ $errors->has('kecamatan') ? ' is-invalid' : '' }}" placeholder="{{ __('Nama Kecamatan') }}" value="{{$tabel9->kecamatan}}" required autofocus>
        
                                        @include('alerts.feedback', ['field' => 'name'])
                                    </div>
                                    <div class="form-group{{ $errors->has('') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input-luas_areal_karet">{{ __('Luas Areal Karet') }}</label>
                                        <input type="text" name="luas_areal_karet" id="input-luas_areal_karet" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Luas Areal Karet') }}" value="{{$tabel9->luas_areal_karet}}" required>
        
                                        @include('alerts.feedback', ['field' => 'name'])
                                    </div>
                                    <div class="form-group{{ $errors->has('') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input-produksi_karet">{{ __('Produksi Karet (Ton)') }}</label>
                                        <input type="text" name="produksi_karet" id="input-produksi_karet" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Produksi Karet (Ton)') }}" value="{{$tabel9->produksi_karet}}" required>
        
                                        @include('alerts.feedback', ['field' => 'name'])
                                    </div>

                                    <div class="form-group{{ $errors->has('') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input-produktivitas_karet">{{ __('Produktivitas Karet (Kg/Ha)') }}</label>
                                        <input type="text" name="produktivitas_karet" id="input-produktivitas_karet" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Produktivitas Karet (Kg/Ha)') }}" value="{{$tabel9->produktivitas_karet}}" required>
        
                                        @include('alerts.feedback', ['field' => 'name'])
                                    </div>
                                   
                                    <div class="form-group{{ $errors->has('') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input-luas_areal_kelapa_sawit">{{ __('Luas Areal Kelapa Sawit') }}</label>
                                        <input type="text" name="luas_areal_kelapa_sawit" id="input-luas_areal_kelapa_sawit" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Luas Areal Kelapa Sawit') }}" value="{{$tabel9->luas_areal_kelapa_sawit}}" required>
        
                                        @include('alerts.feedback', ['field' => 'name'])
                                    </div>
                                    <div class="form-group{{ $errors->has('') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input-produksi_kelapa_sawit">{{ __('Produksi Kelapa Sawit (Ton)') }}</label>
                                        <input type="text" name="produksi_kelapa_sawit" id="input-produksi_kelapa_sawit" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Produksi Kelapa Sawit (Ton)') }}" value="{{$tabel9->produksi_kelapa_sawit}}" required>
        
                                        @include('alerts.feedback', ['field' => 'name'])
                                    </div>

                                    <div class="form-group{{ $errors->has('') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input-produktivitas_kelapa_sawit">{{ __('Produktivitas Kelapa Sawit (Kg/Ha)') }}</label>
                                        <input type="text" name="produktivitas_kelapa_sawit" id="input-produktivitas_kelapa_sawit" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Produktivitas Kelapa Sawit (Kg/Ha)') }}" value="{{$tabel9->produktivitas_kelapa_sawit}}" required>
        
                                        @include('alerts.feedback', ['field' => 'name'])
                                    </div>
                                    <div class="form-group{{ $errors->has('') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input-tahun">{{ __('Tahun') }}</label>
                                        <input type="text" name="tahun" id="input-tahun" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Tahun') }}" value="{{$tabel9->tahun}}" required>
        
                                        @include('alerts.feedback', ['field' => 'name'])
                                    </div>
                                    <div class="text-center">
                                        <button type="submit" class="btn btn-primary mt-4">{{ __('Simpan') }}</button>
                                    </div>
                                </div>
                            </form>
                            <hr class="my-4" />
                            
                        </div>
                    </div>

                   
                </div>
            </div>
       
@endsection                           