@extends('layouts.app', ['activePage' => 'formulir-pembagian_penetapan_besaran_alokasi_dana_desa', 'title' => 'Sistem Informasi Pusat Statistik', 'navName' => 'Table List', 'activeButton' => 'laravel'])

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="section-image">
               
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
                            <form method="post" action="{{ url('/formulir/tambah-penghitungan-dana-desa')}}" autocomplete="off">
                            {{ @csrf_field() }}
                                
                                <h6 class="heading-small text-muted mb-4">{{ __('Perhitungan Dana Desa Setiap Desa Kabupaten Toba') }}</h6>
                                
                                
        
                                <div class="pl-lg-4">
                                <div class="form-group">
                                <label class="form-control-label" for="input-desa">
                                {{ __('kecamatan') }}</label>
                                                    <select name="kecamatan" class="form-control">
                                                        <option value="Balige">Balige</option>
                                                        <option value="Tampahan">Tampahan</option>
                                                        <option value="Laguboti">Laguboti</option>
                                                        <option value="Habinsaran">Habinsaran</option>
                                                        <option value="Borbor">Borbor</option>
                                                        <option value="Nassau">Nassau</option>
                                                        <option value="Silaen">Silaen</option>
                                                        <option value="Sigumpar">Sigumpar</option>
                                                        <option value="Porsea">Porsea</option>
                                                        <option value="Pintu Pohan Meranti">Pintu Pohan Meranti</option>
                                                        <option value="Siantar Narumonda">Siantar Narumonda</option>
                                                        <option value="Parmaksian">Parmaksian</option>
                                                        <option value="Lumban Julu">Lumban Julu</option>
                                                        <option value="Uluan">Uluan</option>
                                                        <option value="Ajibata">Ajibata</option>
                                                        <option value="Bonatua Lunasi">Bonatua Lunasi</option>
                                                    </select>
                                                </div>
                                    

                                    <div class="form-group{{ $errors->has('') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input-desa">
                                        {{ __('Desa') }}</label>
                                        <input type="desa" name="desa" id="input-desa" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Desa') }}" value="" required>
        
                                        @include('alerts.feedback', ['field' => 'name'])
                                    </div>

                                    <div class="form-group{{ $errors->has('') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input-desa">{{ __('Alokasi Dasar') }}</label>
                                        <input type="text" name="alokasi_dasar" id="input-desa" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Alokasi Dasar') }}" value="" required>
        
                                        @include('alerts.feedback', ['field' => 'name'])
                                    </div>

                                    <div class="form-group{{ $errors->has('') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input-desa">{{ __('Alokasi Formula') }}</label>
                                        <input type="text" name="alokasi_formula" id="input-desa" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Alokasi Formula') }}" value="" required>
        
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
        
@endsection                           