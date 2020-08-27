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
                                    <h4 class="mb-0">{{ __('Pembangunan Yang Bersumber Dari Dana Desa') }}</h4>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                        <table  class="table table-borderless">
                                                                              
                                        <tbody>
                                            <tr>
                                                <th>Kecamatan</th>
                                                <td>{{ $tabel49->kecamatan }}</td>
                                            </tr>
                                            <tr>
                                                <th>Desa</th>
                                                <td>{{ $tabel49->desa }}</td>
                                            </tr>
                                            <tr>
                                                <th>Irigasi</th>
                                                <td>{{ $tabel49->irigasi }}</td>
                                            </tr>
                                            <tr>
                                                <th>Jalan Desa</th>
                                                <td>{{ $tabel49->jalan_desa }}</td>
                                            </tr>
                                            <tr>
                                                <th>Jumlah(Km/m)</th>
                                                <td>{{ $tabel49->jumlah }}</td>
                                            </tr>
                                            <tr>
                                                <th>Keterangan</th>
                                                <td>{{ $tabel49->keterangan }}</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Tahun</th>
                                                <td>{{ $tabel49->tahun }}</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Status</th>
                                                <td>{{ $tabel49->status}}</td>
                                            </tr>
                                            
                                        </tbody>
                                    </table>
            @if($tabel49->status=='Requested')
            <div class="footer"> 
            <div class="col-md-4">
            <form action="/infrastruktur_pembangunan_bersumber_dana_desa/{{$tabel49->id}}/accept49" method="post" class="d-inline">
            @method('patch')
             @csrf
            <button type="submit" class="btn btn-primary">Accept</button>
            </form>

            <form action="/infrastruktur_pembangunan_bersumber_dana_desa/{{$tabel49->id}}/reject49" method="post" class="d-inline">
            @method('patch')
            @csrf
            <button type="submit" class="btn  btn-danger">Reject</button>
            </form>
        </div>
        @elseif($tabel49->status=='Accepted')
        <div class="col-md-5">
        <button type="submit" class="btn  btn-primary disabled"> <b> Sudah Di Accepted </b></button>
        <form action="/infrastruktur_pembangunan_bersumber_dana_desa/{{$tabel49->id}}/reject49" method="post" class="d-inline">
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