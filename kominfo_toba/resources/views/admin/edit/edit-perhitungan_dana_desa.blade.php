@extends('layouts.app', ['activePage' => 'formulir-perhitungan_dana_desa', 'title' => 'Sistem Informasi Pusat Statistik', 'navName' => 'Table List', 'activeButton' => 'laravel'])

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="section-image">
               
                <div class="row">

                    <div class="card col-md-8">
                        <div class="card-header">
                            <div class="row align-items-center">
                                <div class="col-md-8">
                                    <h4 class="mb-0">{{ __('Perhitungan Dana Desa Setiap Desa') }}</h4>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                       
                           <table  class="table table-borderless">
                                                                              
                                        <tbody>
                                            <tr>
                                                <th>Kecamatan</th>
                                                <td>{{ $tabel52->kecamatan }}</td>
                                            </tr>
                                            <tr>
                                                <th>Nama Desa</th>
                                                <td>{{ $tabel52->desa }}</td>
                                            </tr>
                                            <tr>
                                                <th>Alokasi Dasar</th>
                                                <td>{{  number_format($tabel52->alokasi_dasar,0,",",".") }}</td>
                                            </tr>
                                            <tr>
                                                <th>Alokasi Formula</th>
                                                <td>{{  number_format($tabel52->alokasi_formula,0,",",".") }}</td>
                                            </tr>
                                            <tr>
                                                <th>Pengguna Dana Desa Per-Desa</th>
                                                <td>{{  number_format($tabel52->alokasi_dasar+$tabel52->alokasi_formula,0,",",".") }}</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Tahun</th>
                                                <td>{{ $tabel52->tahun }}</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Status</th>
                                                <td>{{ $tabel52->status}}</td>
                                            </tr>
                                            
                                        </tbody>
                                    </table>       
        
                                    @if($tabel52->status=='Requested')
            <div class="footer"> 
            <div class="col-md-4">
            <form action="/infrastruktur_perhitungan_dana_desa/{{$tabel52->id}}/accept52" method="post" class="d-inline">
            @method('patch')
             @csrf
            <button type="submit" class="btn btn-primary">Accept</button>
            </form>

            <form action="/infrastruktur_perhitungan_dana_desa/{{$tabel52->id}}/reject52" method="post" class="d-inline">
            @method('patch')
            @csrf
            <button type="submit" class="btn  btn-danger">Reject</button>
            </form>
        </div>
        @elseif($tabel52->status=='Accepted')
        <div class="col-md-5">
        <button type="submit" class="btn  btn-primary disabled"> <b> Sudah Di Accepted </b></button>
        <form action="/infrastruktur_perhitungan_dana_desa/{{$tabel52->id}}/reject52" method="post" class="d-inline">
            @method('patch')
            @csrf
        <button type="submit" class="btn  btn-danger">Reject</button>
        </form>
       
        </div>
        @else
        <div class="col-md-4">
        <button type="submit" class="btn  btn-danger disabled"> <b>Data di Reject </b></button>
            
        @endif  
                            <hr class="my-4" />
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection                           