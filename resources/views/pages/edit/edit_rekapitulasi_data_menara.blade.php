@extends('layouts.app', ['activePage' => 'tambah_rekapitulasi_data_menara', 'title' => 'Sistem Informasi Pusat Statistik', 'navName' => 'Table List', 'activeButton' => 'laravel'])

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
                        <form action="{{url('/update16',$tabel16->id)}}" method="post" class="account-form">                   
                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                        <input type = "hidden" name = "status" value = "Requested">
                        {{method_field('PUT')}}

                                <h6 class="heading-small text-muted mb-4">{{ __('Rekapitulasi Data Menara, Pengguna, Tinggi Menara Kabupaten Toba Samosir') }}</h6>
                                
                                
        
                                <div class="pl-lg-4">
                                    <div class="form-group{{ $errors->has('') ? ' has-danger' : 'kecamatan' }}">
                                        <label class="form-control-label" for="input-kecamatan">
                                            <!-- <i class="w3-xxlarge fa fa-user"></i> -->
                                            {{ __('Kategori') }}

                                            <select name="kategori_kecamatan" class="form-control" id="exampleFormControlSelect1">
                                            <option value="Kec. Tampahan" @if($tabel16->kategori_kecamatan == 'Kec. Tampahan') selected @endif>Kec. Tampahan</option>
                                            <option value="Kec. Balige" @if($tabel16->kategori_kecamatan == 'Kec. Balige') selected @endif>Kec. Balige</option>
                                            <option value="Kec. Laguboti" @if($tabel16->kategori_kecamatan == 'Kec. Laguboti') selected @endif>Kec. Laguboti</option>
                                            <option value="Kec. Sigumpar" @if($tabel16->kategori_kecamatan == 'Kec. Sigumpar') selected @endif>Kec. Sigumpar</option>
                                            <option value="Kec. Silaen" @if($tabel16->kategori_kecamatan == 'Kec. Silaen') selected @endif>Kec. Silaen</option>
                                            <option value="Kec. Habinsaran" @if($tabel16->kategori_kecamatan == 'Kec. Habinsaran') selected @endif>Kec. Habinsaran</option>
                                            <option value="Kec. Borbor" @if($tabel16->kategori_kecamatan == 'Kec. Borbor') selected @endif>Kec. Borbor</option>
                                            <option value="Kec. Nassau" @if($tabel16->kategori_kecamatan == 'Kec. Nassau') selected @endif>Kec. Nassau</option>
                                            <option value="Kec. Siantar Narumonda" @if($tabel16->kategori_kecamatan == 'Kec. Siantar Narumonda') selected @endif>Kec. Siantar Narumonda</option>
                                            <option value="Kec. Porsea" @if($tabel16->kategori_kecamatan == 'Kec. Porsea') selected @endif>Kec. Porsea</option>
                                            <option value="Kec. Parmaksian" @if($tabel16->kategori_kecamatan == 'Kec. Parmaksian') selected @endif>Kec. Parmaksian</option>
                                            <option value="Kec. Pintu Pohan Meranti" @if($tabel16->kategori_kecamatan == 'Kec. Pintu Pohan Meranti') selected @endif>Kec. Pintu Pohan Meranti</option>
                                            <option value="Kec. Uluan" @if($tabel16->kategori_kecamatan == 'Kec. Uluan') selected @endif>Kec. Uluan</option>
                                            <option value="Kec. Lumban Julu" @if($tabel16->kategori_kecamatan == 'Kec. Lumban Julu') selected @endif>Kec. Lumban Julu</option>
                                            <option value="Kec. Bonatua Lunasi" @if($tabel16->kategori_kecamatan == 'Kec. Bonatua Lunasi') selected @endif>Kec. Bonatua Lunasi</option>
                                            <option value="Kec. Ajibata" @if($tabel16->kategori_kecamatan == 'Kec. Ajibata') selected @endif>Kec. Ajibata</option>
                                           
                                            
                                        </select>

                                        </label>
                                        <!-- <input type="text" name="kecamatan" id="input-name" class="form-control{{ $errors->has('kecamatan') ? ' is-invalid' : '' }}" placeholder="{{ __('Nama Kecamatan') }}" value="" required autofocus> -->
        
                                        @include('alerts.feedback', ['field' => 'name'])
                                    </div>

                                    <div class="form-group{{ $errors->has('') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input-kecamatan">{{ __('Lokasi Penerima Bantuan') }}</label>
                                        <input type="text" name="kecamatan" id="input-kecamatan" class="form-control{{ $errors->has('ayam_buras') ? ' is-invalid' : '' }}" placeholder="{{ __('Kecamatan/Alamat Site') }}" value="{{$tabel16->kecamatan}}" required>
        
                                        @include('alerts.feedback', ['field' => 'name'])
                                    </div>
                                    <div class="form-group{{ $errors->has('') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input-name">{{ __('IMB') }}</label>
                                        <input type="text" name="imb" id="input-name" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('IMB') }}" 
                                        value="{{$tabel16->imb}}" required>
        
                                        @include('alerts.feedback', ['field' => 'name'])
                                    </div>

                                    <div class="form-group{{ $errors->has('') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input-name">{{ __('Tinggi Menara') }}</label>
                                        <input type="text" name="tinggi_menara" id="input-name" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Tinggi Menara') }}" value="{{$tabel16->tinggi_menara}}" required>
        
                                        @include('alerts.feedback', ['field' => 'name'])
                                    </div>

                                    <div class="form-group{{ $errors->has('') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input-jumlah_ternak">{{ __('Pemilik') }}</label>
                                        <input type="text" name="pemilik" id="input-jumlah_ternak" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Nama Pemilik') }}" value="{{$tabel16->pemilik}}" required>
        
                                        @include('alerts.feedback', ['field' => 'name'])
                                    </div>

                                    <div class="form-group{{ $errors->has('') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input-name">{{ __('Pengguna') }}</label>
                                        <input type="text" name="pengguna" id="input-name" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Nama Pengguna') }}" 
                                        value="{{$tabel16->pengguna}}" required>
        
                                        @include('alerts.feedback', ['field' => 'name'])
                                    </div>
                                   
                                    <div class="form-group{{ $errors->has('') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input-tahun">{{ __('Tahun') }}</label>
                                        <input type="text" name="tahun" id="input-tahun" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Tahun') }}" value="{{$tabel16->tahun}}" required>
        
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