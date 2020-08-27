@extends('layouts.app', ['activePage' => 'tambah_luas_tanaman_dan_produksi_kelapa_dan_pinang', 'title' => 'Sistem Informasi Pusat Statistik', 'navName' => 'Table List', 'activeButton' => 'laravel'])

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
                        <form action="{{url('/update11',$tabel11->id)}}" method="post" class="account-form">                   
                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                        <input type = "hidden" name = "status" value = "Requesteded">
                        {{method_field('PUT')}}
                                
                                <h6 class="heading-small text-muted mb-4">{{ __('Luas Tanaman dan Produksi Kelapa dan Pinang Tanaman Perkebunan Rakyat Menurut Kecamatan') }}</h6>
                                
                                
        
                                <div class="pl-lg-4">
                                    <div class="form-group{{ $errors->has('') ? ' has-danger' : 'kecamatan' }}">
                                        <label class="form-control-label" for="input-kecamatan">
                                            <!-- <i class="w3-xxlarge fa fa-user"></i> -->
                                            {{ __('Kecamatan') }}
                                        </label>
                                        <input type="text" name="kecamatan" id="input-name" class="form-control{{ $errors->has('kecamatan') ? ' is-invalid' : '' }}" placeholder="{{ __('Nama Kecamatan') }}" value="{{$tabel11->kecamatan}}" required autofocus>
        
                                        @include('alerts.feedback', ['field' => 'name'])
                                    </div>
                                    <div class="form-group{{ $errors->has('') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input-luas_areal_kelapa">{{ __('Luas Areal Kelapa') }}</label>
                                        <input type="text" name="luas_areal_kelapa" id="input-luas_areal_kelapa" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Luas Areal Kelapa') }}" value="{{$tabel11->luas_areal_kelapa}}" required>
        
                                        @include('alerts.feedback', ['field' => 'name'])
                                    </div>
                                    <div class="form-group{{ $errors->has('') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input-produksi_kelapa">{{ __('Produksi Kelapa (Ton)') }}</label>
                                        <input type="text" name="produksi_kelapa" id="input-produksi_kelapa" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Produksi Kelapa (Ton)') }}" value="{{$tabel11->produksi_kelapa}}" required>
        
                                        @include('alerts.feedback', ['field' => 'name'])
                                    </div>

                                    <div class="form-group{{ $errors->has('') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input-produktivitas_kelapa">{{ __('Produktivitas Kelapa (Kg/Ha)') }}</label>
                                        <input type="text" name="produktivitas_kelapa" id="input-produktivitas_kelapa" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Produktivitas Kelapa (Kg/Ha)') }}" value="{{$tabel11->produktivitas_kelapa}}" required>
        
                                        @include('alerts.feedback', ['field' => 'name'])
                                    </div>
                                   
                                    <div class="form-group{{ $errors->has('') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input-luas_areal_pinang">{{ __('Luas Areal Pinang') }}</label>
                                        <input type="text" name="luas_areal_pinang" id="input-luas_areal_pinang" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Luas Areal Pinang') }}" value="{{$tabel11->luas_areal_pinang}}" required>
        
                                        @include('alerts.feedback', ['field' => 'name'])
                                    </div>
                                    <div class="form-group{{ $errors->has('') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input-produksi_pinang">{{ __('Produksi Pinang (Ton)') }}</label>
                                        <input type="text" name="produksi_pinang" id="input-produksi_pinang" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Produksi Kelapa Pinang (Ton)') }}" value="{{$tabel11->produksi_pinang}}" required>
        
                                        @include('alerts.feedback', ['field' => 'name'])
                                    </div>

                                    <div class="form-group{{ $errors->has('') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input-produktivitas_pinang">{{ __('Produktivitas Pinang (Kg/Ha)') }}</label>
                                        <input type="text" name="produktivitas_pinang" id="input-produktivitas_pinang" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Produktivitas Pinang (Kg/Ha)') }}" value="{{$tabel11->produktivitas_pinang}}" required>
        
                                        @include('alerts.feedback', ['field' => 'name'])
                                    </div>
                                    <div class="form-group{{ $errors->has('') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input-tahun">{{ __('Tahun') }}</label>
                                        <input type="text" name="tahun" id="input-tahun" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Tahun') }}" value="{{$tabel11->tahun}}" required>
        
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