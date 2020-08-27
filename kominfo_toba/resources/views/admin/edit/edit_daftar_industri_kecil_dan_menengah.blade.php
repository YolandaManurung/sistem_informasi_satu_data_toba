@extends('layouts.app', ['activePage' => 'edit_daftar_industri_kecil_dan_menengah', 'title' => 'Sistem Informasi Pusat Statistik', 'navName' => 'Table List', 'activeButton' => 'laravel'])





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
                                <div class="col-md-10">
                                    <h4 class="mb-0">{{ __('Daftar Industri Kecil dan Menengah Kab. Toba Samosir') }}</h4>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                        <form action="{{url('/update13',$tabel13->id)}}" method="post" class="account-form">                    
                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                        {{method_field('PUT')}}
                               
                                <table  class="table table-borderless">
                                        <thead>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <th>Kecamatan</th>
                                                <td>{{ $tabel13->kecamatan }}</td>
                                            </tr>
                                            <tr>
                                                <th>Pangan (Unit)</th>
                                                <td>{{ $tabel13->pangan_unit }}</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Pangan (Tenaga Kerja)</th>
                                                <td>{{ $tabel13->pangan_tenaga_kerja }}</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Sandang dan Kulit (Unit)</th>
                                                <td>{{ $tabel13->sandang_dan_kulit_unit }}</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Sandang dan Kulit (Tenaga Kerja)</th>
                                                <td>{{ $tabel13->sandang_dan_kulit_tenaga_kerja }}</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Kimia dan Bahan Bangunan (Unit)</th>
                                                <td>{{ $tabel13->kimia_dan_bahan_bangunan_unit }}</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Kimia dan Bahan Bangunan (Tenaga Kerja)</th>
                                                <td>{{ $tabel13->kimia_dan_bahan_bangunan_tenaga_kerja }}</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Kerajinan Umum (Unit)</th>
                                                <td>{{ $tabel13->kerajinan_umum_unit }}</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Kerajinan Umum (Tenaga Kerja)</th>
                                                <td>{{ $tabel13->kerajinan_umum_tenaga_kerja }}</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Logam/Metal (Unit)</th>
                                                <td>{{ $tabel13->logam_metal_unit }}</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Logam/Metal (Tenaga Kerja)</th>
                                                <td>{{ $tabel13->logam_metal_tenaga_kerja }}</td>
                                            </tr>
                                         
                                            <tr>
                                                <th scope="row">Tahun</th>
                                                <td>{{ $tabel13->tahun }}</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Status</th>
                                                <td>{{ $tabel13->status}}</td>
                                            </tr>
                                            
                                        </tbody>
                                    </table>
                                
                            
                                
                            </form>
                            <hr class="my-4" />
                            
                        </div>
        @if($tabel13->status=='Requested')
        <div class="footer"> 
        <div class="col-md-4">
            <form action="/daftar_industri_kecil_dan_menengah/{{$tabel13->id}}/accept13" method="post" class="d-inline">
            @method('patch')
             @csrf
            <button type="submit" class="btn btn-primary">Accept</button>
            </form>

            <form action="/daftar_industri_kecil_dan_menengah/{{$tabel13->id}}/reject13" method="post" class="d-inline">
            @method('patch')
            @csrf
            <button type="submit" class="btn btn-danger">Reject</button>
            </form>
        </div>
        @elseif($tabel13->status=='Accepted')
        <div class="col-md-5">
        <button type="submit" class="btn btn-sm btn-primary disabled"> <b> Sudah Di Accepted </b></button>
        <form action="/daftar_industri_kecil_dan_menengah/{{$tabel13->id}}/reject13" method="post" class="d-inline">
            @method('patch')
            @csrf
        <button type="submit" class="btn btn-danger">Reject</button>
        </form>
        <!-- <a href="{{url('/admin_pemerintahan_jlh_desa_kel')}}" class="card-link">Kembali</a> -->
        </div>
        @else
        <div class="col-md-4">
        <button type="submit" class="btn btn-danger disabled"> <b>Data di Reject </b></button>
            <!-- <a href="{{url('/admin_pemerintahan_jlh_desa_kel')}}" class="card-link">Kembali</a> -->
        @endif
        </div>
    
                </div>

                   
                </div>
            </div>
        </div>
    
@endsection                           


