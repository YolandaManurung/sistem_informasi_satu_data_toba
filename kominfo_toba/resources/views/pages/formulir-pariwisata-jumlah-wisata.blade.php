@extends('layouts.app', ['activePage' => 'formulir-pariwisata-jumlah-wisata', 'title' => 'Sistem Informasi Pusat Statistik', 'navName' => 'Table List', 'activeButton' => 'laravel'])

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
                            <form method="post" action="{{ url('/formulir/formulir-pariwisata-jumlah-wisata')}}" autocomplete="off">
                            {{ @csrf_field() }}
                                
                                <h6 class="heading-small text-muted mb-4">{{ __('Jumlah Wisata yang Berkunjung per Bulan') }}</h6>
                                
                                
        
                                <div class="form-group">
                                <label class="form-control-label" for="input-desa">
                                {{ __('kecamatan') }}</label>
                                                    <select name="bulan" class="form-control">
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
                                                </div>
                                       
                                        @include('alerts.feedback', ['field' => 'name'])
                                    </div>
                                    <div class="form-group{{ $errors->has('') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input-desa">{{ __('Jumlah Wisata Asing') }}</label>
                                        <input type="desa" name="wisata_asing" id="input-desa" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Jumlah Wisata Asing') }}" value="" required>
        
                                        @include('alerts.feedback', ['field' => 'desa'])
                                    </div>
                                    <div class="form-group{{ $errors->has('') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input-kelurahan">{{ __('Jumlah Wisata Nusantara') }}</label>
                                        <input type="kelurahan" name="wisata_nusantara" id="input-kelurahan" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Jumlah Wisata Nusantara') }}" value="" required>
                                    
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