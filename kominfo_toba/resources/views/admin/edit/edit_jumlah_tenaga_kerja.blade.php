@extends('layouts.app', ['activePage' => 'formulir_jumlah_penduduk', 'title' => 'Sistem Informasi Pusat Statistik', 'navName' => 'Table List', 'activeButton' => 'laravel'])

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
                                    <h4 class="mb-0">{{ __('Angka Partisipasi Angkatan Kerja (APAK)') }}</h4>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                        <form action="{{url('/update_status23',$tabel23->id)}}" method="post" class="account-form">                   
                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                        {{method_field('PUT')}}
                               
                                <table  class="table table-borderless">
                                        <thead>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <th>Kelompok Umur</th>
                                                <td>{{ $tabel23->kelompok_umur}}</td>
                                            </tr>
                                            <tr>
                                                <th>Bekerja</th>
                                                <td>{{ $tabel23->bekerja }}</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Pencari Kerja</th>
                                                <td>{{ $tabel23->pencari_kerja}}</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Angkatan Kerja </th>
                                                <td>{{ $tabel23->angkatan_kerja}}</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Bukan Angkatan Kerja</th>
                                                <td>{{ $tabel23->bukan_angkatan_kerja }}</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Tenaga Kerja</th>
                                                <td>{{ $tabel23->tenaga_kerja }}</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">APAK</th>
                                                <td>{{ $tabel23->APAK}}</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Pengangguran Terbuka</th>
                                                <td>{{ $tabel23->pengangguran_terbuka}}</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Tahun</th>
                                                <td>{{ $tabel23->tahun }}</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Status</th>
                                                <td>{{ $tabel23->status}}</td>
                                            </tr>
                                            
                                        </tbody>
                                    </table>
 
                            </form>
                            <hr class="my-4" />
                            
                        </div>
        @if($tabel23->status=='Requested')
        <div class="footer"> 
        <div class="col-md-4">
            <form action="/kependudukan_jumlah_tenaga_kerja/{{$tabel23->id}}/accept23" method="post" class="d-inline">
            @method('patch')
             @csrf
            <button type="submit" class="btn  btn-primary">Accept</button>
            </form>

            <form action="/kependudukan_jumlah_tenaga_kerja/{{$tabel23->id}}/reject23" method="post" class="d-inline">
            @method('patch')
            @csrf
            <button type="submit" class="btn  btn-danger">Reject</button>
            </form>
        </div>
        @elseif($tabel23->status=='Accepted')
        <div class="col-md-5">
        <button type="submit" class="btn  btn-primary disabled"> <b> Sudah Di Accepted </b></button>
        <form action="/kependudukan_jumlah_tenaga_kerja/{{$tabel23->id}}/reject23" method="post" class="d-inline">
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