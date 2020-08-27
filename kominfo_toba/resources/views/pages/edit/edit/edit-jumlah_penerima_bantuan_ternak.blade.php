@extends('layouts.app', ['activePage' => 'edit-jumlah_penerima_bantuan_ternak', 'title' => 'Sistem Informasi Pusat Statistik', 'navName' => 'Table List', 'activeButton' => 'laravel'])

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
                        <form action="{{url('/update7',$tabel7->id)}}" method="post" class="account-form">                   
                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                        <input type = "hidden" name = "status" value = "Requested">
                        {{method_field('PUT')}}
                                
                                <h6 class="heading-small text-muted mb-4">{{ __('Jumlah Penerima Kelompok Bantuan Ternak') }}</h6>
  
                            
                                    <div class="form-group{{ $errors->has('') ? ' has-danger' : 'kategori' }}">
                                        <label class="form-control-label" for="input-name">
                                            <!-- <i class="w3-xxlarge fa fa-user"></i> -->
                                            {{ __('Kategori') }}

                                            <select name="kategori" id="exampleFormControlSelect1" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Nama Kategori') }}" value="{{ $tabel7->kategori }}" required autofocus>>
                                            <option value="Penerima Ternak Babi" @if($tabel7->kategori == 'Penerima Ternak Babi') selected @endif>Penerima Ternak Babi</option>
                                            <option value="Penerima Ternak Kerbau" @if($tabel7->kategori == 'Penerima Ternak Kerbau') selected @endif>Penerima Ternak Kerbau</option>
                                            <option value="Penerima Ternak Sapi" @if($tabel7->kategori == 'Penerima Ternak Sapi') selected @endif>Penerima Ternak Sapi</option>
                                            <option value="Penerima Ternak Ayam" @if($tabel7->kategori == 'Penerima Ternak Ayam') selected @endif>Penerima Ternak Ayam</option>
                                            <option value="Penerima Ternak Itik" @if($tabel7->kategori == 'Penerima Ternak Itik') selected @endif>Penerima Ternak Itik</option>
                                            <option value="Penerima Ternak Kambing" @if($tabel7->kategori == 'Penerima Ternak Kambing') selected @endif>Penerima Ternak Kambing</option>
                                        </select>
                                        </label>
                                       
        
                                        @include('alerts.feedback', ['field' => 'name'])
                                    </div>

                                <div class="form-group{{ $errors->has('') ? ' has-danger' : 'name' }}">
                                        <label class="form-control-label" for="input-name">
                                            <!-- <i class="w3-xxlarge fa fa-user"></i> -->
                                            {{ __('Kecamatan') }}
                                        </label>
                                        <input type="text" name="kecamatan" id="input-name" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Nama Kecamatan') }}" value="{{ $tabel7->kecamatan }}" required autofocus>
        
                                        @include('alerts.feedback', ['field' => 'name'])
                                    </div>

                                    <div class="form-group{{ $errors->has('') ? ' has-danger' : 'name' }}">
                                        <label class="form-control-label" for="input-name">
                                            <!-- <i class="w3-xxlarge fa fa-user"></i> -->
                                            {{ __('Desa/Kelurahan') }}
                                        </label>
                                        <input type="text" name="desa_kelurahan" id="input-name" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Nama Desa/Kelurahan') }}" value="{{ $tabel7->desa_kelurahan }}" required autofocus>
        
                                        @include('alerts.feedback', ['field' => 'name'])
                                    </div>

                                    <div class="form-group{{ $errors->has('') ? ' has-danger' : 'name' }}">
                                        <label class="form-control-label" for="input-name">
                                            <!-- <i class="w3-xxlarge fa fa-user"></i> -->
                                            {{ __('Jumlah Kelompok') }}
                                        </label>
                                        <input type="text" name="jumlah_kelompok" id="input-name" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Jumlah Kelompok') }}" value="{{ $tabel7->jumlah_kelompok }}" required autofocus>
        
                                        @include('alerts.feedback', ['field' => 'name'])
                                    </div>

                                    <div class="form-group{{ $errors->has('') ? ' has-danger' : 'name' }}">
                                        <label class="form-control-label" for="input-name">
                                            <!-- <i class="w3-xxlarge fa fa-user"></i> -->
                                            {{ __('Jumlah Ternak') }}
                                        </label>
                                        <input type="text" name="jumlah_ternak" id="input-name" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Jumlah Ternak') }}" value="{{ $tabel7->jumlah_ternak }}" required autofocus>
        
                                        @include('alerts.feedback', ['field' => 'name'])
                                    </div>
                                   
                                   
                                    <div class="form-group{{ $errors->has('') ? ' has-danger' : 'name' }}">
                                        <label class="form-control-label" for="input-name">
                                            <!-- <i class="w3-xxlarge fa fa-user"></i> -->
                                            {{ __('Tahun') }}
                                        </label>
                                        <input type="text" name="tahun" id="input-name" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Tahun') }}" value="{{ $tabel7->tahun }}" required autofocus>
        
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