@extends('layouts.app', ['activePage' => 'formulir-jlh-penduduk-wilayah-kepadatan', 'title' => 'Sistem Informasi Pusat Statistik', 'navName' => 'Table List', 'activeButton' => 'laravel'])

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
                            <form method="post" action="{{ url('/formulir/tambah-jlh-penduduk-wilayah-kepadatan')}}" autocomplete="off">
                            {{ @csrf_field() }}
                                
                                <h6 class="heading-small text-muted mb-4">{{ __('Jumlah Penduduk, Luas Wilayah, dan Kepadatan Penduduk') }}</h6>
                                
                    

                                <div class="pl-lg-4">
                                    <div class="form-group{{ $errors->has('') ? ' has-danger' : 'name' }}">
                                        <label class="form-control-label" for="input-name">
                                            <!-- <i class="w3-xxlarge fa fa-user"></i> -->
                                            {{ __('Kecamatan') }}
                                        </label>
                                        <input type="text" name="kecamatan" id="input-name" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Nama Kecamatan') }}" value="{{ old('kecamatan') }}" required autofocus>
        
                                        @include('alerts.feedback', ['field' => 'name'])
                                    </div>
                                    <div class="form-group{{ $errors->has('') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input-jumlah_penduduk">{{ __('Jumlah Penduduk (Jiwa)') }}</label>
                                        <input type="text" name="Jlh_Penduduk" id="input-jumlah_penduduk" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Masukkan Jumlah Penduduk') }}" value="{{ old('Jlh_Penduduk') }}" required>
        
                                        @include('alerts.feedback', ['field' => 'name'])
                                    </div>

                                    <div class="form-group{{ $errors->has('') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input-luas_wilayah">{{ __('Luas Wilayah (Ha)') }}</label>
                                        <input type="text" name="Luas_Wilayah" id="input-kelurahan" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Masukkan Luas Wilayah') }}" value="{{ old('Luas_Wilayah') }}" required>
        
                                        @include('alerts.feedback', ['field' => 'name'])
                                    </div>

                                    <div class="form-group{{ $errors->has('') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input-tahun">{{ __('Tahun') }}</label>
                                        <input type="text" name="tahun" id="input-tahun" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Masukkan Tahun') }}" value="{{ old('tahun') }}" required>
        
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