@extends('layouts.app', ['activePage' => 'formulir_rekapitulasi_penyandang_masalah', 'title' => 'Sistem Informasi Pusat Statistik', 'navName' => 'Table List', 'activeButton' => 'laravel'])

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
                                    <h4 class="mb-0">{{ __('Jumlah Tenaga Kesehatan Menurut Kecamatan') }}</h4>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                        <form action="{{url('/update_status26',$tabel26->id)}}" method="post" class="account-form">                   
                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                        {{method_field('PUT')}}
                               
                                <table  class="table table-borderless">
                                        <thead>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <th>Kecamatan</th>
                                                <td>{{ $tabel26->kecamatan }}</td>
                                            </tr>
                                            <tr>
                                                <th>Tenaga Medis</th>
                                                <td>{{ $tabel26->tenaga_medis }}</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Tenaga Keperawatan</th>
                                                <td>{{ $tabel26->tenaga_keperawatan }}</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Tenaga Kebidanan</th>
                                                <td>{{ $tabel26->tenaga_kebidanan }}</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Tenaga Kefarmasian</th>
                                                <td>{{ $tabel26->tenaga_kefarmasian}}</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Tenaga Kesehatan Lainnya</th>
                                                <td>{{ $tabel26->tenaga_kesehatan_lainnya }}</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Tahun</th>
                                                <td>{{ $tabel26->tahun }}</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Status</th>
                                                <td>{{ $tabel26->status}}</td>
                                            </tr>
                                            
                                        </tbody>
                                    </table>
    
                            </form>
                            <hr class="my-4" />
                            
                        </div>
        @if($tabel26->status=='Requested')
        <div class="footer"> 
        <div class="col-md-4">
            <form action="/kesehatan_jumlah_tenaga_kesehatan/{{$tabel26->id}}/accept26" method="post" class="d-inline">
            @method('patch')
             @csrf
            <button type="submit" class="btn  btn-primary">Accept</button>
            </form>

            <form action="/kesehatan_jumlah_tenaga_kesehatan/{{$tabel26->id}}/reject26" method="post" class="d-inline">
            @method('patch')
            @csrf
            <button type="submit" class="btn  btn-danger">Reject</button>
            </form>
        </div>
        @elseif($tabel26->status=='Accepted')
        <div class="col-md-5">
        <button type="submit" class="btn  btn-primary disabled"> <b> Sudah Di Accepted </b></button>
        <form action="/kesehatan_jumlah_tenaga_kesehatan/{{$tabel26->id}}/reject26" method="post" class="d-inline">
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