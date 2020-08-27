@extends('layouts.app', ['activePage' => 'formulir-panjang-jalan', 'title' => 'Sistem Informasi Pusat Statistik', 'navName' => 'Table List', 'activeButton' => 'laravel'])

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
                            <form method="post" action="{{ url('/formulir/lindup_izin_lingkungan_berdasarkan_perusahaan')}}" autocomplete="off">
                            {{ @csrf_field() }}
                                
                                <h6 class="heading-small text-muted mb-4">{{ __('Izin Lingkungan Berdasarkan Jenis Perusahaan') }}</h6>
                                
                                
        
                                <div class="pl-lg-4">
                                    <div class="form-group{{ $errors->has('') ? ' has-danger' : 'name' }}">
                                        <label class="form-control-label" for="input-name">
                                            <!-- <i class="w3-xxlarge fa fa-user"></i> -->
                                            {{ __('Nama Perusahaan') }}
                                        </label>
                                        <input type="text" name="nama_perusahaan" id="input-name" class="form-control{{ $errors->has('nama_perusahaan') ? ' is-invalid' : '' }}" placeholder="{{ __('Nama Perusahaan') }}" value="{{ old('nama_perusahaan') }}" required autofocus>
        
                                        @include('alerts.feedback', ['field' => 'nama_perusahaan'])
                                    </div>
                                    <div class="form-group{{ $errors->has('') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input-jumlah_penduduk">
                                        {{ __('Amdal') }}</label>
                                        <input type="text" name="amdal" id="input-jumlah_penduduk" class="form-control{{ $errors->has('amdal') ? ' is-invalid' : '' }}" placeholder="{{ __('Amdal') }}" value="{{ old('amdal') }}" required>
        
                                        @include('alerts.feedback', ['field' => 'name'])
                                    </div>

                                    <div class="form-group{{ $errors->has('') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input-luas_wilayah">{{ __('UKL/UPL') }}</label>
                                        <input type="text" name="ukl_upl" id="input-ukl_upl" class="form-control{{ $errors->has('ukl_upl') ? ' is-invalid' : '' }}" placeholder="{{ __('UKL/UPL') }}" value="{{ old('ukl_upl') }}" required>
        
                                        @include('alerts.feedback', ['field' => 'ukl_upl'])
                                    </div>

                                    <div class="form-group{{ $errors->has('') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input-sppl">{{ __('SPPL') }}</label>
                                        <input type="text" name="sppl" id="input-sppl" class="form-control{{ $errors->has('sppl') ? ' is-invalid' : '' }}" placeholder="{{ __('SPPL') }}" value="{{ old('sppl') }}" required>
        
                                        @include('alerts.feedback', ['field' => 'sppl'])
                                    </div>

                                    <div class="form-group{{ $errors->has('') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input-jumlah">{{ __('Jumlah') }}</label>
                                        <input type="text" name="jumlah" id="input-jumlah" class="form-control{{ $errors->has('jumlah') ? ' is-invalid' : '' }}" placeholder="{{ __('Jumlah') }}" value="{{ old('jumlah') }}" required>
        
                                        @include('alerts.feedback', ['field' => 'jumlah'])
                                    </div>

                                    <div class="form-group{{ $errors->has('') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input-tahun">{{ __('Tahun') }}</label>
                                        <input type="text" name="tahun" id="input-tahun" class="form-control{{ $errors->has('tahun') ? ' is-invalid' : '' }}" placeholder="{{ __('Tahun') }}" value="{{ old('tahun') }}" required>
        
                                        @include('alerts.feedback', ['field' => 'tahun'])
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