@extends('layouts.app', ['activePage' => 'formulir_pegawai_yang_pindah_pensiun', 'title' => 'Sistem Informasi Pusat Statistik', 'navName' => 'Table List', 'activeButton' => 'laravel'])

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
                                    <h4 class="mb-0">{{ __('Pegawai Negeri Sipil Yang Pindah, Pensiun') }}</h4>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                        <form action="{{url('/update_status56',$tabel56->id)}}" method="post" class="account-form">                   
                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                        {{method_field('PUT')}}
                               
                                <table  class="table table-borderless">
                                        <thead>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <th>Tahun</th>
                                                <td>{{ $tabel56->tahun }}</td>
                                            </tr>
                                            <tr>
                                                <th>Pindah Keluar Tobasa</th>
                                                <td>{{ $tabel56->pindah_keluar_tobasa}}</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Pindah Masuk Tobasa</th>
                                                <td>{{ $tabel56->pindah_masuk_tobasa}}</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Pensiun</th>
                                                <td>{{ $tabel56->pensiun}}</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Status</th>
                                                <td>{{ $tabel56->status}}</td>
                                            </tr>
                                            
                                        </tbody>
                                    </table>
                                
                            
                                
                            </form>
                            <hr class="my-4" />
                            
                        </div>
        @if($tabel56->status=='Requested')
        <div class="footer"> 
        <div class="col-md-4">
            <form action="/pegawai_yang_pindah_pensiun/{{$tabel56->id}}/accept56" method="post" class="d-inline">
            @method('patch')
             @csrf
            <button type="submit" class="btn  btn-primary">Accept</button>
            </form>

            <form action="/pegawai_yang_pindah_pensiun/{{$tabel56->id}}/reject56" method="post" class="d-inline">
            @method('patch')
            @csrf
            <button type="submit" class="btn  btn-danger">Reject</button>
            </form>
        </div>
        @elseif($tabel56->status=='Accepted')
        <div class="col-md-5">
        <button type="submit" class="btn  btn-primary disabled"> <b> Sudah Di Accepted </b></button>
        <form action="/pegawai_yang_pindah_pensiun/{{$tabel56->id}}/reject56" method="post" class="d-inline">
            @method('patch')
            @csrf
        <button type="submit" class="btn  btn-danger">Reject</button>
        </form>
        <!-- <a href="{{url('/admin_pemerintahan_jlh_desa_kel')}}" class="card-link">Kembali</a> -->
        </div>
        @else
        <div class="col-md-4">
        <button type="submit" class="btn  btn-danger disabled"> <b>Data di Reject </b></button>
            <!-- <a href="{{url('/admin_pemerintahan_jlh_desa_kel')}}" class="card-link">Kembali</a> -->
        @endif
        </div>
                </div>          
                </div>
            </div>
        
@endsection                           