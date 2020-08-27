@extends('layouts.app', ['activePage' => 'edit-lindup_jumlah_produksi_sampah', 'title' => 'Sistem Informasi Pusat Statistik', 'navName' => 'Table List', 'activeButton' => 'laravel'])

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
                                    <h3 class="mb-0">{{ __('Edit Data') }}</h3>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                        <form action="{{url('/update59',$tabel59->id)}}" method="post" class="account-form">                   
                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                        <input type = "hidden" name = "status" value = "Requested">
                        {{method_field('PUT')}}
                                <h6 class="heading-small text-muted mb-4">{{ __('Jumlah Produksi Sampah Menurut Kecamatan') }}</h6>
                                
                    
                                <input type="hidden" name="id"  value="{{ $tabel59->id }}">
                                <div class="pl-lg-4">
                                    <div class="form-group{{ $errors->has('') ? ' has-danger' : 'name' }}">
                                        <label class="form-control-label" for="input-name">
                                            <!-- <i class="w3-xxlarge fa fa-user"></i> -->
                                            {{ __('Kecamatan') }}
                                        </label>
                                        <input type="text" name="kecamatan" id="input-name" class="form-control{{ $errors->has('kecamatan') ? ' is-invalid' : '' }}" placeholder="{{ __('Kecamatan') }}" value="{{ $tabel59->kecamatan }}" required autofocus>
        
                                        @include('alerts.feedback', ['field' => 'nama_perusahaan'])
                                    </div>
                                    <div class="form-group{{ $errors->has('') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input-bulan">
                                        {{ __('Bulan') }}</label>
                                        <input type="text" name="bulan" id="input-bulan" class="form-control{{ $errors->has('bulan') ? ' is-invalid' : '' }}" placeholder="{{ __('Mis: Januari') }}" value="{{ $tabel59->bulan }}" required>
        
                                        @include('alerts.feedback', ['field' => 'name'])
                                    </div>

                                    <div class="form-group{{ $errors->has('') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input-luas_wilayah">
                                        {{ __('Produksi (M3)') }}</label>
                                        <input type="text" name="produksi_m3" id="input-produksi_m3" class="form-control{{ $errors->has('produksi_m3') ? ' is-invalid' : '' }}" placeholder="{{ __('Produksi(M3)') }}" value="{{ $tabel59->produksi_m3 }}" required>
        
                                        @include('alerts.feedback', ['field' => 'produksi_m3'])
                                    </div>

                                    <div class="form-group{{ $errors->has('') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input-terangkat">{{ __('Terangkat (M3)') }}</label>
                                        <input type="text" name="terangkat" id="input-terangkat" class="form-control{{ $errors->has('terangkat') ? ' is-invalid' : '' }}" placeholder="{{ __('Terangkat(M3)') }}" value="{{ $tabel59->terangkat }}" required>
        
                                        @include('alerts.feedback', ['field' => 'sppl'])
                                    </div>

                                    <div class="form-group{{ $errors->has('') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input-tahun">{{ __('Tahun') }}</label>
                                        <input type="text" name="tahun" id="input-tahun" class="form-control{{ $errors->has('tahun') ? ' is-invalid' : '' }}" placeholder="{{ __('Tahun') }}" value="{{ $tabel59->tahun }}" required>
        
                                        @include('alerts.feedback', ['field' => 'sppl'])
                                    </div>

                                    <div class="text-center">
                                        <button type="submit" class="btn btn-default mt-4">{{ __('Edit') }}</button>
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