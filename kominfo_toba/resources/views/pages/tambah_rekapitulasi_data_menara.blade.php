@extends('layouts.app', ['activePage' => 'tambah_rekapitulasi_data_menara', 'title' => 'Sistem Informasi Pusat Statistik', 'navName' => 'Table List', 'activeButton' => 'laravel'])

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
                            <form method="post" action="{{ url('/formulir/tambah_rekapitulasi_data_menara')}}" autocomplete="off">
                            {{ @csrf_field() }}
                                
                                <h6 class="heading-small text-muted mb-4">{{ __('Rekapitulasi Data Menara, Pengguna, Tinggi Menara Kabupaten Toba Samosir') }}</h6>
                                
                                
        
                                <div class="pl-lg-4">
                                    <div class="form-group{{ $errors->has('') ? ' has-danger' : 'kecamatan' }}">
                                        <label class="form-control-label" for="input-kecamatan">
                                            <!-- <i class="w3-xxlarge fa fa-user"></i> -->
                                            {{ __('Kategori') }}

                                            <select name="kategori_kecamatan" class="form-control" id="exampleFormControlSelect1">
                                            <option value="Kec. Tampahan">Kec. Tampahan</option>
                                            <option value="Kec. Balige">Kec. Balige</option>
                                            <option value="Kec. Laguboti">Kec. Laguboti</option>
                                            <option value="Kec. Sigumpar">Kec. Sigumpar</option>
                                            <option value="Kec. Silaen">Kec. Silaen</option>
                                            <option value="Kec. Habinsaran">Kec. Habinsaran</option>
                                            <option value="Kec. Borbor">Kec. Borbor</option>
                                            <option value="Kec. Nassau">Kec. Nassau</option>
                                            <option value="Kec. Siantar Narumonda">Kec. Siantar Narumonda</option>
                                            <option value="Kec. Porsea">Kec. Porsea</option>
                                            <option value="Kec. Parmaksian">Kec. Parmaksian</option>
                                            <option value="Kec. Pintu Pohan Meranti">Kec. Pintu Pohan Meranti</option>
                                            <option value="Kec. Uluan">Kec. Uluan</option>
                                            <option value="Kec. Lumban Julu">Kec. Lumban Julu</option>
                                            <option value="Kec. Bonatua Lunasi">Kec. Bonatua Lunasi</option>
                                            <option value="Kec. Ajibata">Kec. Ajibata</option>
                                           
                                            
                                        </select>

                                        </label>
                                        <!-- <input type="text" name="kecamatan" id="input-name" class="form-control{{ $errors->has('kecamatan') ? ' is-invalid' : '' }}" placeholder="{{ __('Nama Kecamatan') }}" value="" required autofocus> -->
        
                                        @include('alerts.feedback', ['field' => 'name'])
                                    </div>

                                    <div class="form-group{{ $errors->has('') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input-kecamatan">{{ __('Lokasi Penerima Bantuan') }}</label>
                                        <input type="text" name="kecamatan" id="input-kecamatan" class="form-control{{ $errors->has('ayam_buras') ? ' is-invalid' : '' }}" placeholder="{{ __('Kecamatan/Alamat Site') }}" value="" required>
        
                                        @include('alerts.feedback', ['field' => 'name'])
                                    </div>
                                    <div class="form-group{{ $errors->has('') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input-name">{{ __('IMB') }}</label>
                                        <input type="text" name="imb" id="input-name" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('IMB') }}" value="" required>
        
                                        @include('alerts.feedback', ['field' => 'name'])
                                    </div>

                                    <div class="form-group{{ $errors->has('') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input-name">{{ __('Tinggi Menara') }}</label>
                                        <input type="text" name="tinggi_menara" id="input-name" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Tinggi Menara') }}" value="" required>
        
                                        @include('alerts.feedback', ['field' => 'name'])
                                    </div>

                                    <div class="form-group{{ $errors->has('') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input-jumlah_ternak">{{ __('Pemilik') }}</label>
                                        <input type="text" name="pemilik" id="input-jumlah_ternak" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Nama Pemilik') }}" value="" required>
        
                                        @include('alerts.feedback', ['field' => 'name'])
                                    </div>

                                    <div class="form-group{{ $errors->has('') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input-name">{{ __('Pengguna') }}</label>
                                        <input type="text" name="pengguna" id="input-name" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Nama Pengguna') }}" value="" required>
        
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