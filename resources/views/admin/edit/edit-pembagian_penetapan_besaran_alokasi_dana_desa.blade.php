@extends('layouts.app', ['activePage' => 'formulir-pembagian_penetapan_besaran_alokasi_dana_desa', 'title' => 'Sistem Informasi Pusat Statistik', 'navName' => 'Table List', 'activeButton' => 'laravel'])

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="section-image">
               
                <div class="row">

                    <div class="card col-md-8">
                        <div class="card-header">
                            <div class="row align-items-center">
                                <div class="col-md-8">
                                    <h4 class="mb-0">{{ __('Pembagian Dan Penetapan Besaran Alokasi Dana Desa') }}</h4>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                        
                              
                              <table  class="table table-borderless">
                                                                              
                                        <tbody>
                                            <tr>
                                                <th>Kecamatan</th>
                                                <td>{{ $tabel51->kecamatan }}</td>
                                            </tr>
                                            <tr>
                                                <th>Nama Desa</th>
                                                <td>{{ $tabel51->desa }}</td>
                                            </tr>
                                            <tr>
                                                <th>Alokasi Dasar</th>
                                                <td>{{ number_format($tabel51->alokasi_dasar,0,",",".") }}</td>
                                            </tr>
                                            <tr>
                                                <th>Alokasi Formula</th>
                                                <td>{{ number_format($tabel51->alokasi_formula,0,",",".") }}</td>
                                            </tr>
                                           
                                            <tr>
                                                <th> Pagu Dana Per-Desa</th>
                                                <td>{{ number_format($tabel51->alokasi_formula + $tabel51->alokasi_dasar,0,",",".")}}</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Tahun</th>
                                                <td>{{ $tabel51->tahun }}</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Status</th>
                                                <td>{{ $tabel51->status}}</td>
                                            </tr>
                                            
                                        </tbody>
                                    </table>      
                                
        
                                    @if($tabel51->status=='Requested')
            <div class="footer"> 
            <div class="col-md-4">
            <form action="/infrastruktur_pembagian_penetapan_besaran_alokasi_dana_desa/{{$tabel51->id}}/accept51" method="post" class="d-inline">
            @method('patch')
             @csrf
            <button type="submit" class="btn btn-primary">Accept</button>
            </form>

            <form action="/infrastruktur_pembagian_penetapan_besaran_alokasi_dana_desa/{{$tabel51->id}}/reject51" method="post" class="d-inline">
            @method('patch')
            @csrf
            <button type="submit" class="btn  btn-danger">Reject</button>
            </form>
        </div>
        @elseif($tabel51->status=='Accepted')
        <div class="col-md-5">
        <button type="submit" class="btn  btn-primary disabled"> <b> Sudah Di Accepted </b></button>
        <form action="/infrastruktur_pembagian_penetapan_besaran_alokasi_dana_desa/{{$tabel51->id}}/reject51" method="post" class="d-inline">
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