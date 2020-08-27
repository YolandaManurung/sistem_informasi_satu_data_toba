@extends('layouts.app', ['activePage' => 'formulir-pendidikan-paud', 'title' => 'Sistem Informasi Pusat Statistik', 'navName' => 'Table List', 'activeButton' => 'laravel'])

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
                                    <h3 class="mb-0">{{ __('Tambahkan Data') }}</h3>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <form method="post" action="{{ url('/formulir/formulir-pendidikan-paud')}}" autocomplete="off">
                            {{ @csrf_field() }}
                                
                                <h6 class="heading-small text-muted mb-4">{{ __('Jumlah Paud, Murid, Guru, serta Lembaga Kabupaten Toba') }}</h6>
                                
                                
        
                                 <!-- <div class="form-group">
                                                    <h8>Bulan</h8>
                                                    <select name="Bulan" class="form-control">
                                                        <option value="Januari">Januari</option>
                                                        <option value="Februari">Februari</option>
                                                        <option value="Maret">Maret</option>
                                                        <option value="April">April</option>
                                                        <option value="Mei">Mei</option>
                                                        <option value="Juni">Juni</option>
                                                        <option value="Juli">Juli</option>
                                                        <option value="Agustus">Agustus</option>
                                                        <option value="September">September</option>
                                                        <option value="Oktober">Oktober</option>
                                                        <option value="November">November</option>
                                                        <option value="Desember">Desember</option>
                                                    </select>
                                                </div> -->
                                      
                                    <div class="form-group{{ $errors->has('') ? ' has-danger' : 'name' }}">
                                        <label class="form-control-label" for="input-name">
                                            <!-- <i class="w3-xxlarge fa fa-user"></i> -->
                                            {{ __('Kecamatan') }}
                                        </label>
                                        <input type="text" name="kecamatan" id="input-name" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Nama Kecamatan') }}" value="" required autofocus>
        
                                        @include('alerts.feedback', ['field' => 'name'])
                                    </div>
                                    <div class="form-group{{ $errors->has('') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input-desa">{{ __('Jumlah Paud') }}</label>
                                        <input type="desa" name="jumlah_paud" id="input-desa" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Jumlah Paud') }}" value="" required>
                                   
                                    @include('alerts.feedback', ['field' => 'name'])
                                    </div>
                                    <div class="form-group{{ $errors->has('') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input-desa">{{ __('Jumlah Guru') }}</label>
                                        <input type="desa" name="jumlah_guru" id="input-desa" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Jumlah Guru') }}" value="" required>
                                   
                                    @include('alerts.feedback', ['field' => 'name'])
                                    </div>
                                    <div class="form-group{{ $errors->has('') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input-desa">{{ __('Jumlah Murid') }}</label>
                                        <input type="desa" name="jumlah_murid" id="input-desa" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Jumlah Murid') }}" value="" required>
                                   
                                    @include('alerts.feedback', ['field' => 'name'])
                                    </div>
                                    <div class="form-group{{ $errors->has('') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input-desa">{{ __('Negeri') }}</label>
                                        <input type="desa" name="negeri" id="input-desa" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Jumlah Negeri') }}" value="" required>
                                   
                                    @include('alerts.feedback', ['field' => 'name'])
                                    </div>
                                    <div class="form-group{{ $errors->has('') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input-desa">{{ __('Swasta') }}</label>
                                        <input type="desa" name="swasta" id="input-desa" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Jumlah Swasta') }}" value="" required>
                                   
                                    @include('alerts.feedback', ['field' => 'name'])
                                    </div>
                                    <div class="form-group{{ $errors->has('') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input-desa">{{ __('MI/MTs') }}</label>
                                        <input type="desa" name="Madrasah_Ibtidaiyah_Tsanawiyah" id="input-desa" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Jumlah Madrasah_Ibtidaiyah/Tsanawiyah') }}" value="" required>
                                
                                    @include('alerts.feedback', ['field' => 'desa'])
                                    </div>
                                    <div class="form-group{{ $errors->has('') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input-kelurahan">{{ __('Tahun') }}</label>
                                        <input type="kelurahan" name="tahun" id="input-kelurahan" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Tahun') }}" value="" required>
        
                                        @include('alerts.feedback', ['field' => 'kelurahan'])
                                    </div>
                                    <div class="text-center">
                                        <button type="submit" class="btn btn-primary mt-4">{{ __('Tambah') }}</button>
                                    </div>
                                </div>
                            </form>
                            <hr class="my-4" />
                            
                        </div>
                    </div>

                   
                </div>
            </div>
            
        
   
@endsection                           