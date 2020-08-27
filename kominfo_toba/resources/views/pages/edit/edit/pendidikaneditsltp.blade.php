@extends('layouts.app', ['activePage' => 'pendidikaneditsltp', 'title' => 'Sistem Informasi Pusat Statistik', 'navName' => 'Table List', 'activeButton' => 'laravel'])

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
                        <form action="{{url('/update41',$tabel41->id)}}" method="post" class="account-form">                   
                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                        <input type = "hidden" name = "status" value = "Requested">
                        {{method_field('PUT')}}

                                <h6 class="heading-small text-muted mb-4">{{ __('Jumlah SLTP, Murid, Guru, serta Lembaga Kabupaten Toba') }}</h6>
                                
                                
        
                            <div class="form-group{{ $errors->has('') ? ' has-danger' : 'name' }}">
                                        <label class="form-control-label" for="input-name">
                                            <!-- <i class="w3-xxlarge fa fa-user"></i> -->
                                            {{ __('Kecamatan') }}
                                        </label>
                                        <input type="text" name="kecamatan" id="input-name" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Kecamatan') }}" value="{{ $tabel41->kecamatan }}" required autofocus>
        
                                        @include('alerts.feedback', ['field' => 'name'])
                                    </div>

                            <div class="form-group{{ $errors->has('') ? ' has-danger' : 'name' }}">
                                        <label class="form-control-label" for="input-name">
                                            <!-- <i class="w3-xxlarge fa fa-user"></i> -->
                                            {{ __('Tahun') }}
                                        </label>
                                        <input type="text" name="tahun" id="input-name" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Tahun') }}" value="{{ $tabel41->tahun }}" required autofocus>
        
                                        @include('alerts.feedback', ['field' => 'name'])
                                    </div>
                            
                            <div class="form-group{{ $errors->has('') ? ' has-danger' : 'name' }}">
                                        <label class="form-control-label" for="input-name">
                                            <!-- <i class="w3-xxlarge fa fa-user"></i> -->
                                            {{ __('Jumlah SLTP') }}
                                        </label>
                                        <input type="text" name="jumlah_sltp" id="input-name" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Jumlah SLTP') }}" value="{{ $tabel41->jumlah_sltp}}" required autofocus>
        
                                        @include('alerts.feedback', ['field' => 'name'])
                                    </div>

                            <div class="form-group{{ $errors->has('') ? ' has-danger' : 'name' }}">
                                        <label class="form-control-label" for="input-name">
                                            <!-- <i class="w3-xxlarge fa fa-user"></i> -->
                                            {{ __('Jumlah Guru') }}
                                        </label>
                                        <input type="text" name="jumlah_guru" id="input-name" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Jumlah Guru') }}" value="{{ $tabel41->jumlah_guru}}" required autofocus>
        
                                        @include('alerts.feedback', ['field' => 'name'])
                                    </div>

                            <div class="form-group{{ $errors->has('') ? ' has-danger' : 'name' }}">
                                        <label class="form-control-label" for="input-name">
                                            <!-- <i class="w3-xxlarge fa fa-user"></i> -->
                                            {{ __('Jumlah Murid') }}
                                        </label>
                                        <input type="text" name="jumlah_murid" id="input-name" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Jumlah Murid') }}" value="{{ $tabel41->jumlah_murid}}" required autofocus>
        
                                        @include('alerts.feedback', ['field' => 'name'])
                                    </div>

                            <div class="form-group{{ $errors->has('') ? ' has-danger' : 'name' }}">
                                        <label class="form-control-label" for="input-name">
                                            <!-- <i class="w3-xxlarge fa fa-user"></i> -->
                                            {{ __('Jumlah Negeri') }}
                                        </label>
                                        <input type="text" name="negeri" id="input-name" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Jumlah Negeri') }}" value="{{ $tabel41->negeri}}" required autofocus>
        
                                        @include('alerts.feedback', ['field' => 'name'])
                                    </div>

                            <div class="form-group{{ $errors->has('') ? ' has-danger' : 'name' }}">
                                        <label class="form-control-label" for="input-name">
                                            <!-- <i class="w3-xxlarge fa fa-user"></i> -->
                                            {{ __('Jumlah Swasta') }}
                                        </label>
                                        <input type="text" name="swasta" id="input-name" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Jumlah Swasta') }}" value="{{ $tabel41->swasta}}" required autofocus>
        
                                        @include('alerts.feedback', ['field' => 'name'])
                                    </div>

                            <div class="form-group{{ $errors->has('') ? ' has-danger' : 'name' }}">
                                        <label class="form-control-label" for="input-name">
                                            <!-- <i class="w3-xxlarge fa fa-user"></i> -->
                                            {{ __('Jumlah Madrasah Ibtidaiyah Tsanawiyah') }}
                                        </label>
                                        <input type="text" name="Madrasah_Ibtidaiyah_Tsanawiyah" id="input-name" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Jumlah Madrasah Ibtidaiyah Tsanawiyah') }}" value="{{ $tabel41->Madrasah_Ibtidaiyah_Tsanawiyah}}" required autofocus>
        
                                        @include('alerts.feedback', ['field' => 'name'])
                                    </div>


                                    <div class="text-center">
                                        <button type="submit" class="btn btn-default mt-4">{{ __('Simpan') }}</button>
                                    </div>

                                    </div>
                            </form>
                            <hr class="my-4" />
                            
                        </div>
                    </div>
                </div>
            </div>
       
@endsection                           
            