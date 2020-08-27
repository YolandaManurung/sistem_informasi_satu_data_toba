@extends('layouts.app', ['activePage' => 'rawat_inap_kelas_edit', 'title' => 'Sistem Informasi Pusat Statistik', 'navName' => 'Table List', 'activeButton' => 'laravel'])

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
                        <form action="{{url('/update61',$tabel61->id)}}" method="post" class="account-form">                   
                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                        <input type = "hidden" name = "status" value = "Requested">
                        {{method_field('PUT')}}

                                <h6 class="heading-small text-muted mb-4">{{ __('Jumlah Kamar Rawat Inap Berdasarkan Kelas') }}</h6>
                        
                            <div class="form-group{{ $errors->has('') ? ' has-danger' : 'name' }}">
                                        <label class="form-control-label" for="input-name">
                                            <!-- <i class="w3-xxlarge fa fa-user"></i> -->
                                            {{ __('Jumlah VIP') }}
                                        </label>
                                        <input type="text" name="VIP" id="input-name" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Jumlah VIP') }}" value="{{ $tabel61->VIP }}" required autofocus>
        
                                        @include('alerts.feedback', ['field' => 'name'])
                                    </div>

                            <div class="form-group{{ $errors->has('') ? ' has-danger' : 'name' }}">
                                        <label class="form-control-label" for="input-name">
                                            <!-- <i class="w3-xxlarge fa fa-user"></i> -->
                                            {{ __('Jumlah Kamar Kelas I') }}
                                        </label>
                                        <input type="text" name="kelas1" id="input-name" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Jumlah Kamar Kelas I') }}" value="{{ $tabel61->kelas1 }}" required autofocus>
        
                                        @include('alerts.feedback', ['field' => 'name'])
                                    </div>
                            
                            <div class="form-group{{ $errors->has('') ? ' has-danger' : 'name' }}">
                                        <label class="form-control-label" for="input-name">
                                            <!-- <i class="w3-xxlarge fa fa-user"></i> -->
                                            {{ __('Jumlah Kamar Kelas II') }}
                                        </label>
                                        <input type="text" name="kelas2" id="input-name" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Jumlah Kamar Kelas II') }}" value="{{ $tabel61->kelas2 }}" required autofocus>
        
                                        @include('alerts.feedback', ['field' => 'name'])
                                    </div>

                            <div class="form-group{{ $errors->has('') ? ' has-danger' : 'name' }}">
                                        <label class="form-control-label" for="input-name">
                                            <!-- <i class="w3-xxlarge fa fa-user"></i> -->
                                            {{ __('Jumlah Kamar Kelas III') }}
                                        </label>
                                        <input type="text" name="kelas3" id="input-name" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Jumlah Kamar Kelas III') }}" value="{{ $tabel61->kelas3 }}" required autofocus>
        
                                        @include('alerts.feedback', ['field' => 'name'])
                                    </div>        

                            <div class="form-group{{ $errors->has('') ? ' has-danger' : 'name' }}">
                                        <label class="form-control-label" for="input-name">
                                            <!-- <i class="w3-xxlarge fa fa-user"></i> -->
                                            {{ __('Tahun') }}
                                        </label>
                                        <input type="text" name="tahun" id="input-name" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Tahun') }}" value="{{ $tabel61->tahun }}" required autofocus>
        
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
            