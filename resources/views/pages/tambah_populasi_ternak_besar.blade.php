@extends('layouts.app', ['activePage' => 'tambah_populasi_ternak_besar', 'title' => 'Sistem Informasi Pusat Statistik', 'navName' => 'Table List', 'activeButton' => 'laravel'])

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
                            <form method="post" action="{{ url('/formulir/tambah_populasi_ternak_besar')}}" autocomplete="off">
                            {{ @csrf_field() }}
                                
                                <h6 class="heading-small text-muted mb-4">{{ __('Populasi Ternak Besar Menurut Kecamatan dan Jenis Ternak (Ekor)') }}</h6>
                                
                                
        
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
                                        <label class="form-control-label" for="input-sapi_perah">{{ __('Jumlah Sapi Perah') }}</label>
                                        <input type="text" name="sapi_perah" id="input-desa" class="form-control{{ $errors->has('sapi_perah') ? ' is-invalid' : '' }}" placeholder="{{ __('Jumlah Sapi Perah') }}" value="" required>
        
                                        @include('alerts.feedback', ['field' => 'sapi_perah'])
                                    </div>
                                    <div class="form-group{{ $errors->has('') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input-sapi_potong">{{ __('Jumlah Sapi Potong') }}</label>
                                        <input type="text" name="sapi_potong" id="input-sapi_potong" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Jumlah Sapi Potong') }}" value="" required>
        
                                        @include('alerts.feedback', ['field' => 'sapi_potong'])
                                    </div>
                                    <div class="form-group{{ $errors->has('') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input-kerbau">{{ __('Jumlah Kerbau') }}</label>
                                        <input type="text" name="kerbau" id="input-kerbau" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Jumlah Kerbau') }}" value="" required>
        
                                        @include('alerts.feedback', ['field' => 'kerbau'])
                                    </div>
                                    <div class="form-group{{ $errors->has('') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input-kuda">{{ __('Jumlah Kuda') }}</label>
                                        <input type="text" name="kuda" id="input-kuda" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Jumlah Kuda') }}" value="" required>
        
                                        @include('alerts.feedback', ['field' => 'kuda'])
                                    </div>
                                    <div class="form-group{{ $errors->has('') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input-kambing">{{ __('Jumlah Kambing') }}</label>
                                        <input type="text" name="kambing" id="input-kuda" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Jumlah Kambing') }}" value="" required>
        
                                        @include('alerts.feedback', ['field' => 'kambing'])
                                    </div>
                                    <div class="form-group{{ $errors->has('') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input-domba">{{ __('Jumlah Domba') }}</label>
                                        <input type="text" name="domba" id="input-domba" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Jumlah Domba') }}" value="" required>
        
                                        @include('alerts.feedback', ['field' => 'domba'])
                                    </div>
                                    <div class="form-group{{ $errors->has('') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input-babi">{{ __('Jumlah Babi') }}</label>
                                        <input type="text" name="babi" id="input-babi" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Jumlah Babi') }}" value="" required>
        
                                        @include('alerts.feedback', ['field' => 'babi'])
                                    </div>
                                    <div class="form-group{{ $errors->has('') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input-tahun">{{ __('Tahun') }}</label>
                                        <input type="text" name="tahun" id="input-tahun" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Tahun') }}" value="" required>
        
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
    </div>
@endsection                           