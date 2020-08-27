@extends('layouts.app', ['activePage' => 'peralatan_rumah_sakit_edit', 'title' => 'Sistem Informasi Pusat Statistik', 'navName' => 'Table List', 'activeButton' => 'laravel'])

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
                                    <h3 class="mb-0">{{ __('Edit Data') }}</h3>
                                </div>
                            </div> 
                        </div>
                        <div class="card-body">
                        <form action="{{url('/update63',$tabel63->id)}}" method="post" class="account-form">                   
                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                        <input type = "hidden" name = "status" value = "Request">
                        {{method_field('PUT')}}

                                <h6 class="heading-small text-muted mb-4">{{ __('Jumlah Peralatan Rumah Sakit') }}</h6>
                        
                            <div class="form-group{{ $errors->has('') ? ' has-danger' : 'name' }}">
                                        <label class="form-control-label" for="input-name">
                                            <!-- <i class="w3-xxlarge fa fa-user"></i> -->
                                            {{ __('Jenis Peralatan Rumah Sakit') }}
                                        </label>
                                        <input type="text" name="jenis_peralatan_rumah_sakit" id="input-name" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Jenis Peralatan Rumah Sakit') }}" value="{{ $tabel63->jenis_peralatan_rumah_sakit }}" required autofocus>
        
                                        @include('alerts.feedback', ['field' => 'name'])
                                    </div>

                            <div class="form-group{{ $errors->has('') ? ' has-danger' : 'name' }}">
                                        <label class="form-control-label" for="input-name">
                                            <!-- <i class="w3-xxlarge fa fa-user"></i> -->
                                            {{ __('Jumlah') }}
                                        </label>
                                        <input type="text" name="jumlah" id="input-name" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Jumlah') }}" value="{{ $tabel63->jumlah }}" required autofocus>
        
                                        @include('alerts.feedback', ['field' => 'name'])
                                    </div>
                            
                          
                            <div class="form-group{{ $errors->has('') ? ' has-danger' : 'name' }}">
                                        <label class="form-control-label" for="input-name">
                                            <!-- <i class="w3-xxlarge fa fa-user"></i> -->
                                            {{ __('Tahun') }}
                                        </label>
                                        <input type="text" name="tahun" id="input-name" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Tahun') }}" value="{{ $tabel63->tahun }}" required autofocus>
        
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
            