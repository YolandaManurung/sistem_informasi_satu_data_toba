@extends('layouts.app', ['activePage' => 'tambah_daftar_internet_dan_game_monitoring', 'title' => 'Sistem Informasi Pusat Statistik', 'navName' => 'Table List', 'activeButton' => 'laravel'])

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
                            <form method="post" action="{{ url('/formulir/tambah_daftar_internet_dan_game_monitoring')}}" autocomplete="off">
                            {{ @csrf_field() }}
                                
                                <h6 class="heading-small text-muted mb-4">{{ __('Daftar Internet/Game Net yang Dimonitoring') }}</h6>
                                
                                <div class="pl-lg-4">
                                    <div class="form-group{{ $errors->has('') ? ' has-danger' : 'kecamatan' }}">
                                        <label class="form-control-label" for="input-kecamatan">
                                            <!-- <i class="w3-xxlarge fa fa-user"></i> -->
                                            {{ __('Kategori') }}

                                            <select name="kecamatan" class="form-control" id="exampleFormControlSelect1">
                                            <option value="Kecamatan Tampahan">Kecamatan Tampahan</option>
                                            <option value="Kecamatan Balige">Kecamatan Balige</option>
                                            <option value="Kecamatan Laguboti">Kecamatan Laguboti</option>
                                            <option value="Kecamatan Sigumpar">Kecamatan Sigumpar</option>
                                            <option value="Kecamatan Silaen">Kecamatan Silaen</option>
                                            <option value="Kecamatan Habinsaran">Kecamatan Habinsaran</option>
                                            <option value="Kecamatan Borbor">Kecamatan Borbor</option>
                                            <option value="Kecamatan Nassau">Kecamatan Nassau</option>
                                            <option value="Kecamatan Siantar Narumonda">Kecamatan Siantar Narumonda</option>
                                            <option value="Kecamatan Porsea">Kecamatan Porsea</option>
                                            <option value="Kecamatan Parmaksian">Kecamatan Parmaksian</option>
                                            <option value="Kecamatan Pintu Pohan Meranti">Kecamatan Pintu Pohan Meranti</option>
                                            <option value="Kecamatan Uluan">Kecamatan Uluan</option>
                                            <option value="Kecamatan Lumban Julu">Kecamatan Lumban Julu</option>
                                            <option value="Kecamatan Bonatua Lunasi">Kecamatan Bonatua Lunasi</option>
                                            <option value="Kecamatan Ajibata">Kecamatan Ajibata</option>
                                           
                                            
                                        </select>

                                        </label>
        
                                



                                    <div class="form-group{{ $errors->has('') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input-name">{{ __('Nama Internet') }}</label>
                                        <input type="text" name="nama_internet" id="input-name" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Nama Internet') }}" value="" required>
        
                                        @include('alerts.feedback', ['field' => 'name'])
                                    </div>

                                    <div class="form-group{{ $errors->has('') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input-name">{{ __('Alamat') }}</label>
                                        <input type="text" name="alamat" id="input-name" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Alamat') }}" value="" required>
        
                                        @include('alerts.feedback', ['field' => 'name'])
                                    </div>

                                    <div class="form-group{{ $errors->has('') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input-name">{{ __('Nama Pemilik') }}</label>
                                        <input type="text" name="nama_pemilik" id="input-name" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Nama Pemilik') }}" value="" required>
        
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