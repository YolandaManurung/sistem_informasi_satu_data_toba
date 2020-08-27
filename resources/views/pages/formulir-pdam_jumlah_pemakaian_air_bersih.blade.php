@extends('layouts.app', ['activePage' => 'formulir-panjang-jalan', 'title' => 'Sistem Informasi Pusat Statistik', 'navName' => 'Table List', 'activeButton' => 'laravel'])

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
                            <form method="post" action="{{ url('/formulir/pdam_jumlah_pemakaian_air_bersih')}}" autocomplete="off">
                            {{ @csrf_field() }}
                                
                                <h6 class="heading-small text-muted mb-4">{{ __('Jumlah Pemakaian Air Bersih dalam Per Rumah Tangga') }}</h6>
                                
                                
        
                                <div class="pl-lg-4">
                                    <div class="form-group{{ $errors->has('') ? ' has-danger' : 'name' }}">
                                        <label class="form-control-label" for="input-name">
                                            <!-- <i class="w3-xxlarge fa fa-user"></i> -->
                                            {{ __('Pemakaian Air Bersih/Jamban') }}
                                        </label>
                                        <input type="text" name="pemakaian_air_bersih" id="input-name" class="form-control{{ $errors->has('pemakaian_air_bersih') ? ' is-invalid' : '' }}" placeholder="{{ __('Pemakaian Air Bersih') }}" value="{{old('pemakaian_air_bersih') }}" required autofocus>
        
                                        @include('alerts.feedback', ['field' => 'pemakaian_air_bersih'])
                                    </div>
                                    <div class="form-group{{ $errors->has('') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input-jumlah">
                                        {{ __('Jumlah') }}</label>
                                        <input type="text" name="jumlah" id="input-jumlah" class="form-control{{ $errors->has('jumlah') ? ' is-invalid' : '' }}" placeholder="{{ __('Jumlah') }}" value="{{old('jumlah') }}" required>
        
                                        @include('alerts.feedback', ['field' => 'jumlah'])
                                    </div>

                                    

                                    <div class="form-group{{ $errors->has('') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input-tahun">{{ __('Tahun') }}</label>
                                        <input type="text" name="tahun" id="input-tahun" class="form-control{{ $errors->has('tahun') ? ' is-invalid' : '' }}" placeholder="{{ __('Tahun') }}" value="{{old('tahun') }}" required>
        
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
      
    
@endsection                           