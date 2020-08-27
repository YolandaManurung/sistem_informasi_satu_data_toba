@extends('layouts.app', ['activePage' => 'formulir-panjang-jalan', 'title' => 'Sistem Informasi Pusat Statistik', 'navName' => 'Table List', 'activeButton' => 'laravel'])

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
                                    <h3 class="mb-0">{{ __('Edit Data') }}</h3>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                        <form action="{{url('/update48',$tabel48->id)}}" method="post" class="account-form">                   
                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                        <input type = "hidden" name = "status" value = "Requested">
                        {{method_field('PUT')}}
                                <h6 class="heading-small text-muted mb-4">{{ __('Jembatan Menurut Status dan Keadaan') }}</h6>
                                
                                
        
                                <div class="pl-lg-4">
                                    <div class="form-group{{ $errors->has('') ? ' has-danger' : 'name' }}">
                                        <label class="form-control-label" for="input-name">
                                           
                                            {{ __('Keadaan') }}
                                        </label>
                                        <input type="text" name="keadaan" id="input-name" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Keadaan') }}" value="{{$tabel48->keadaan}}" required autofocus>
        
                                        @include('alerts.feedback', ['field' => 'name'])
                                    </div>
                                    <div class="form-group{{ $errors->has('') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input-desa">{{ __('Jumlah Jembatan (Unit)') }}</label>
                                        <input type="desa" name="jumlah_jembatan" id="input-desa" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Jumlah Jembatan') }}" value="{{$tabel48->jumlah_jembatan}}" required>
        
                                        @include('alerts.feedback', ['field' => 'name'])
                                    </div>

                                    <div class="form-group{{ $errors->has('') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input-tahun">{{ __('Tahun') }}</label>
                                        <input type="text" name="tahun" id="input-tahun" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Tahun') }}" value="{{$tabel48->tahun}}" required>      
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
       
            </div>
          
       
@endsection                           