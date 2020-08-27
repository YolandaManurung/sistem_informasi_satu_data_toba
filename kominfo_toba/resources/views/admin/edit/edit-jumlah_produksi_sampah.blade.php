@extends('layouts.app', ['activePage' => 'formulir-panjang-jalan', 'title' => 'Sistem Informasi Pusat Statistik', 'navName' => 'Table List', 'activeButton' => 'laravel'])

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
                                    <h4 class="mb-0">{{ __('Jumlah Produksi Sampah Menurut Kecamatan') }}</h4>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                                <table  class="table table-borderless">
                                                                              
                        <tbody>
                            <tr>
                                <th>Kecamatan</th>
                                <td>{{ $tabel59->kecamatan }}</td>
                            </tr>
                                                                                                                                       
                            <tr>
                                <th>Bulan</th>
                                <td>{{ $tabel59->bulan }}</td>
                            </tr>
                            <tr>
                                <th>UKL/UPL</th>
                                <td>{{ $tabel59->ukl_upl }}</td>
                            </tr>
                            <tr>
                                <th>Produksi(M3(</th>
                                <td>{{ $tabel59->produksi_m3 }}</td>
                            </tr>
                            <tr>
                                <th>Terangkat</th>
                                <td>{{ $tabel59->terangkat }}</td>
                            </tr>
                            <tr>
                                <th scope="row">Tahun</th>
                                <td>{{ $tabel59->tahun }}</td>
                            </tr>
                            <tr>
                                <th scope="row">Status</th>
                                <td>{{ $tabel59->status}}</td>
                            </tr>
                                                                                                                                        
                        </tbody>
                        </table>   
                        @if($tabel59->status=='Requested')
            <div class="footer"> 
            <div class="col-md-4">
            <form action="/lindup_jumlah_produksi_sampah/{{$tabel59->id}}/accept59" method="post" class="d-inline">
            @method('patch')
             @csrf
            <button type="submit" class="btn btn-primary">Accept</button>
            </form>

            <form action="/lindup_jumlah_produksi_sampah/{{$tabel59->id}}/reject59" method="post" class="d-inline">
            @method('patch')
            @csrf
            <button type="submit" class="btn  btn-danger">Reject</button>
            </form>
        </div>
        @elseif($tabel59->status=='Accepted')
        <div class="col-md-5">
        <button type="submit" class="btn  btn-primary disabled"> <b> Sudah Di Accepted </b></button>
        <form action="/lindup_jumlah_produksi_sampah/{{$tabel59->id}}/reject59" method="post" class="d-inline">
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