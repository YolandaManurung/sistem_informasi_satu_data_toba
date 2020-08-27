@extends('layouts.app', ['activePage' => '', 'title' => 'Sistem Informasi Pusat Statistik', 'navName' => 'User Profile', 'activeButton' => 'laravel'])

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
                                    <h3 class="mb-0">{{ __('Edit Profile') }}</h3>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <form method="post" action="{{ route('profile.update') }}" autocomplete="off"
                                enctype="multipart/form-data">
                                @csrf
                                @method('patch')

                                <h6 class="heading-small text-muted mb-4">{{ __('Informasi User') }}</h6>
                                
                                @include('alerts.success')
                                @include('alerts.error_self_update', ['key' => 'not_allow_profile'])
        
                                <div class="pl-lg-4">
                                    <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input-name">
                                            <i class="w3-xxlarge fa fa-user"></i>{{ __('Nama Dinas') }}
                                        </label>
                                        <input type="text" name="name" id="input-name" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Nama Dinas') }}" value="{{ old('name', auth()->user()->nama_dinas) }}" required autofocus>
        
                                        @include('alerts.feedback', ['field' => 'name'])
                                    </div>
                                    @if(Auth::user()->role != '0')
                                    <div class="form-group{{ $errors->has('username') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input-username">
                                            <i class="w3-xxlarge fa fa-user"></i>{{ __('User Name') }}
                                        </label>
                                        <input type="text" name="username" id="input-username" class="form-control{{ $errors->has('username') ? ' is-invalid' : '' }}" placeholder="{{ __('User Name') }}" value="{{ old('name', auth()->user()->username) }}" required autofocus>
        
                                        @include('alerts.feedback', ['field' => 'name'])
                                    </div>
                                    @endif
                                    <div class="form-group{{ $errors->has('email') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input-email"><i class="w3-xxlarge fa fa-envelope-o"></i>{{ __('Email') }}</label>
                                        <input type="email" name="email" id="input-email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="{{ __('Email') }}" value="{{ old('email', auth()->user()->email) }}" required>
        
                                        @include('alerts.feedback', ['field' => 'email'])
                                    </div>
                                    <div class="form-group{{ $errors->has('alamat_kantor') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input-email"><i class="w3-xxlarge fa fa-bank"></i>{{ __('Alamat Kantor') }}</label>
                                        <input type="text" name="alamat_kantor" id="input-alamat_kantor" class="form-control{{ $errors->has('alamat_kantor') ? ' is-invalid' : '' }}" placeholder="{{ __('Alamat Kantor') }}" value="{{ old('alamat_kantor', auth()->user()->alamat_kantor) }}" required>
        
                                        @include('alerts.feedback', ['field' => 'alamat_kantor'])
                                    </div>
                                    <div class="form-group{{ $errors->has('nomor_telepon') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input-nomor_telepon"><i class="w3-xxlarge fa fa-phone"></i>{{ __('Nomor Telepon') }}</label>
                                        <input type="text" name="nomor_telepon" id="input-nomor_telepon" class="form-control{{ $errors->has('nomor_telepon') ? ' is-invalid' : '' }}" placeholder="{{ __('Nomor Telepon') }}" value="{{ old('nomor_telepon', auth()->user()->nomor_telepon) }}" required>
        
                                        @include('alerts.feedback', ['field' => 'nomor_telepon'])
                                    </div>
                                    <div class="text-center">
                                        <button type="submit" class="btn btn-primary mt-4">{{ __('Save') }}</button>
                                    </div>
                                </div>
                            </form>
                            <hr class="my-4" />
                            <form method="post" action="{{ route('profile.password') }}">
                                @csrf
                                @method('patch')
        
                                <h6 class="heading-small text-muted mb-4">{{ __('Password') }}</h6>
        
                                @include('alerts.success', ['key' => 'password_status'])
                                @include('alerts.error_self_update', ['key' => 'not_allow_password'])
        
                                <div class="pl-lg-4">
                                    <div class="form-group{{ $errors->has('old_password') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input-current-password">
                                            <i class="w3-xxlarge fa fa-eye-slash"></i>{{ __('Password Lama') }}
                                        </label>
                                        <input type="password" name="old_password" id="input-current-password" class="form-control{{ $errors->has('old_password') ? ' is-invalid' : '' }}" placeholder="{{ __('Current Password') }}" value="" required>
        
                                        @include('alerts.feedback', ['field' => 'old_password'])
                                    </div>
                                    <div class="form-group{{ $errors->has('password') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input-password">
                                            <i class="w3-xxlarge fa fa-eye-slash"></i>{{ __('Password Baru') }}
                                        </label>
                                        <input type="password" name="password" id="input-password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" placeholder="{{ __('New Password') }}" value="" required>
        
                                        @include('alerts.feedback', ['field' => 'password'])
                                    </div>
                                    <div class="form-group">
                                        <label class="form-control-label" for="input-password-confirmation">
                                            <i class="w3-xxlarge fa fa-eye-slash"></i>{{ __('Konfirmasi Password Baru') }}
                                        </label>
                                        <input type="password" name="password_confirmation" id="input-password-confirmation" class="form-control" placeholder="{{ __('Confirm New Password') }}" value="" required>
                                    </div>
        
                                    <div class="text-center">
                                        <button type="submit" class="btn btn-primary mt-4">{{ __('Change password') }}</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="card card-user">
                            <div class="card-image">
                                <img src="https://ununsplash.imgix.net/photo-1431578500526-4d9613015464?fit=crop&fm=jpg&h=300&q=75&w=400" alt="...">
                            </div>
                            <div class="card-body">
                                <div class="author">
                                    <a href="#">
                                    <img class="avatar border-gray" src="/storage/avatars/{{auth()->user()->foto_profil }}" />
                                        @if ($message = Session::get('success'))

                                            <div class="alert alert-success alert-block">

                                                <button type="button" class="close" data-dismiss="alert">×</button>

                                                <strong>{{ $message }}</strong>

                                            </div>

                                        @endif

                                        @if (count($errors) > 0)
                                            <div class="alert alert-danger">
                                                <strong>Whoops!</strong> There were some problems with your input.<br><br>
                                                <ul>
                                                    @foreach ($errors->all() as $error)
                                                        <li>{{ $error }}</li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        @endif
                                        <div class="row justify-content-center">
                                            <form action="/profile" method="post" enctype="multipart/form-data">
                                                @csrf
                                                <div class="form-group">
                                                    <input type="file" class="form-control-file" name="foto_profil" id="avatarFile" aria-describedby="fileHelp">
                                                    <small id="fileHelp" class="form-text text-muted">Please upload a valid image file. Size of image should not be more than 2MB.</small>
                                                </div>
                                                <button type="submit" class="btn btn-sm btn-primary">Submit</button>
                                            </form>
                                        </div>
                                    </a>
                                    <p class="description">
                                    
                                    </p>
                                    <p class="description">
                                    Nama Dinas : {{ auth()->user()->nama_dinas }}
                                    </p>
                                
                                    <p class="description">
                                        Username : {{ auth()->user()->username }}
                                    </p>
                                
                                <p class="description text-center">
                                Alamat Kantor : {{  auth()->user()->alamat_kantor }}
                                </p>
                                <p class="description text-center">
                                Nomor Telepon : {{ auth()->user()->nomor_telepon }}
                                </p>
                            </div>
                            </div>
                            <hr>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    
@endsection