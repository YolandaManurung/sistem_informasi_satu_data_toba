@extends('layouts.app', ['activePage' => 'tambah_luas_dan_produksi_kopi_dan_kakao', 'title' => 'Sistem Informasi Pusat Statistik', 'navName' => 'Table List', 'activeButton' => 'laravel'])

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
                        <form action="{{url('/update8',$tabel8->id)}}" method="post" class="account-form">                   
                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                        <input type = "hidden" name = "status" value = "Requested">
                        {{method_field('PUT')}}
                                
                                <h6 class="heading-small text-muted mb-4">{{ __('Luas Tanaman dan Produksi Kopi dan Kakao Tanaman Perkebunan Rakyat Menurut Kecamatan') }}</h6>

                                <div class="pl-lg-4">
                                    <div class="form-group{{ $errors->has('') ? ' has-danger' : 'kecamatan' }}">
                                        <label class="form-control-label" for="input-kecamatan">
                                            <!-- <i class="w3-xxlarge fa fa-user"></i> -->
                                            {{ __('Kecamatan') }}
                                        </label>
                                        <input type="text" name="kecamatan" id="input-name" class="form-control{{ $errors->has('kecamatan') ? ' is-invalid' : '' }}" placeholder="{{ __('Nama Kecamatan') }}" value="{{$tabel8->kecamatan}}" required autofocus>
        
                                        @include('alerts.feedback', ['field' => 'name'])
                                    </div>
                                    <div class="form-group{{ $errors->has('') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input-luas_areal_kopi">{{ __('Luas Areal Kopi') }}</label>
                                        <input type="text" name="luas_areal_kopi" id="input-luas_areal_kopi" class="form-control{{ $errors->has('ayam_kampung') ? ' is-invalid' : '' }}" placeholder="{{ __('Luas Areal Kopi') }}" value="{{$tabel8->luas_areal_kopi}}" required>
        
                                        @include('alerts.feedback', ['field' => 'name'])
                                    </div>
                                    <div class="form-group{{ $errors->has('') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input-produksi_kopi">{{ __('Produksi Kopi (Ton)') }}</label>
                                        <input type="text" name="produksi_kopi" id="input-produksi_kopi" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Produksi Kopi (Ton)') }}" value="{{$tabel8->produksi_kopi}}" required>
        
                                        @include('alerts.feedback', ['field' => 'name'])
                                    </div>

                                    <div class="form-group{{ $errors->has('') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input-produktivitas_kopi">{{ __('Produktivitas Kopi (Kg/Ha)') }}</label>
                                        <input type="text" name="produktivitas_kopi" id="input-produktivitas_kopi" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Produktivitas Kopi (Kg/Ha)') }}" value="{{$tabel8->produktivitas_kopi}}" required>
        
                                        @include('alerts.feedback', ['field' => 'name'])
                                    </div>
                                   
                                    <div class="form-group{{ $errors->has('') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input-luas_areal_kakao">{{ __('Luas Areal Kakao') }}</label>
                                        <input type="text" name="luas_areal_kakao" id="input-luas_areal_kakao" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Luas Areal Kakao') }}" value="{{$tabel8->luas_areal_kakao}}" required>
        
                                        @include('alerts.feedback', ['field' => 'name'])
                                    </div>
                                    <div class="form-group{{ $errors->has('') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input-produksi_kakao">{{ __('Produksi Kakao (Ton)') }}</label>
                                        <input type="text" name="produksi_kakao" id="input-produksi_kakao" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Produksi Kopi (Ton)') }}" value="{{$tabel8->produksi_kakao}}" required>
        
                                        @include('alerts.feedback', ['field' => 'name'])
                                    </div>

                                    <div class="form-group{{ $errors->has('') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input-produktivitas_kakao">{{ __('Produktivitas Kakao (Kg/Ha)') }}</label>
                                        <input type="text" name="produktivitas_kakao" id="input-produktivitas_kakao" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Produktivitas Kakao (Kg/Ha)') }}" value="{{$tabel8->produktivitas_kakao}}" required>
        
                                        @include('alerts.feedback', ['field' => 'name'])
                                    </div>
                                    <div class="form-group{{ $errors->has('') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input-tahun">{{ __('Tahun') }}</label>
                                        <input type="text" name="tahun" id="input-tahun" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Tahun') }}" value="{{$tabel8->tahun}}" required>
        
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