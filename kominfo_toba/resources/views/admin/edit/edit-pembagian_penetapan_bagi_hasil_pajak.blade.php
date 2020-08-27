@extends('layouts.app', ['activePage' => 'formulir-pembangunanbersumberdanadesa', 'title' => 'Sistem Informasi Pusat Statistik', 'navName' => 'Table List', 'activeButton' => 'laravel'])

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
                                    <h4 class="mb-0">{{ __('Pembagian dan Penetapan Bagi Hasil Pajak Daerah Kepada Pemerintah Desa') }}</h4>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                             <table  class="table table-borderless">
                                                                              
                                        <tbody>
                                            <tr>
                                                <th>Kecamatan</th>
                                                <td>{{ $tabel50->kecamatan }}</td>
                                            </tr>
                                            <tr>
                                                <th>Nama Desa</th>
                                                <td>{{ $tabel50->desa }}</td>
                                            </tr>
                                            <tr>
                                                <th>Alokasi Dasar</th>
                                                <td>{{ number_format($tabel50->alokasi_dasar,1,",",".") }}</td>
                                            </tr>
                                            <tr>
                                                <th>Realisasi PBB</th>
                                                <td>{{ number_format($tabel50->realisasi_PBB,0,",",".") }}</td>
                                            </tr>
                                            <tr>
                                                <th>Bobot</th>
                                                <td>{{ number_format($tabel50->bobot,4,",",".") }}</td>
                                            </tr>
                                            <tr>
                                                <th>Alokasi Formula</th>
                                                <td>{{ number_format($tabel50->alokasi_formula,0,",",".") }}</td>
                                            </tr>
                                            <tr>
                                                <th>Pagu Bagi Hasil Pajak Per-Desa</th>
                                                <td>{{ number_format($tabel50->pagu_bagi,0,",",".") }}</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Tahun</th>
                                                <td>{{ $tabel50->tahun }}</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Status</th>
                                                <td>{{ $tabel50->status}}</td>
                                            </tr>
                                            
                                        </tbody>
                                    </table>   
                                
        
                                
            @if($tabel50->status=='Requested')
            <div class="footer"> 
            <div class="col-md-4">
            <form action="/infrastruktur_pembagian_penetapan_bagi_hasil_pajak/{{$tabel50->id}}/accept50" method="post" class="d-inline">
            @method('patch')
             @csrf
            <button type="submit" class="btn btn-primary">Accept</button>
            </form>

            <form action="/infrastruktur_pembagian_penetapan_bagi_hasil_pajak/{{$tabel50->id}}/reject50" method="post" class="d-inline">
            @method('patch')
            @csrf
            <button type="submit" class="btn  btn-danger">Reject</button>
            </form>
        </div>
        @elseif($tabel50->status=='Accepted')
        <div class="col-md-5">
        <button type="submit" class="btn  btn-primary disabled"> <b> Sudah Di Accepted </b></button>
        <form action="/infrastruktur_pembagian_penetapan_bagi_hasil_pajak/{{$tabel50->id}}/reject50" method="post" class="d-inline">
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