@extends('layouts.app', ['activePage' => 'formulir-pariwisata-objek', 'title' => 'Sistem Informasi Pusat Statistik', 'navName' => 'Table List', 'activeButton' => 'laravel'])

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
                            <form method="post" action="{{ url('/formulir/formulir-pariwisata-objek')}}" autocomplete="off">
                            {{ @csrf_field() }}
                                
                                <h6 class="heading-small text-muted mb-4">{{ __('Potensi dan Objek Pariwisata Kabupaten Toba') }}</h6>
                                
                                
        
                                 <div class="form-group">
                                                    <h8>Nama Objek Wisata</h8>
                                                    <select name="jenis_objek_wisata" class="form-control">
                                                        <option value="Wisata Alam">Wisata Alam</option>
                                                        <option value="Budaya Sejarah">Budaya Sejarah</option>
                                                        <option value="Kawasan Pariwisata Alam">Kawasan Pariwisata Alam</option>
                                                        <option value="Wisata Buatan">Wisata Buatan</option>
                                                        <option value="Wisata Tirta/Air">Wisata Tirta/Air</option>
                                                        <option value="Wisata Danau">Wisata Danau</option>
                                                    </select>
                                                </div>
                                      
                                        @include('alerts.feedback', ['field' => 'desa'])
                                    </div>
                                    <div class="form-group{{ $errors->has('') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input-kelurahan">{{ __('Lokasi') }}</label>
                                        <input type="kelurahan" name="lokasi" id="input-kelurahan" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Lokasi') }}" value="" required>
                                    
                                    @include('alerts.feedback', ['field' => 'desa'])
                                    </div>
                                    <div class="form-group{{ $errors->has('') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input-kelurahan">{{ __('Daerah') }}</label>
                                        <input type="kelurahan" name="daerah" id="input-kelurahan" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Daerah') }}" value="" required>
                                    
                                 
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
          
           
  
@endsection                           