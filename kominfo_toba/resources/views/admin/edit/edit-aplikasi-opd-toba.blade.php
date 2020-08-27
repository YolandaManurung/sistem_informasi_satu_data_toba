@extends('layouts.app', ['activePage' => 'edit-aplikasi-opd-toba', 'title' => 'Sistem Informasi Pusat Statistik', 'navName' => 'Table List', 'activeButton' => 'laravel'])

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
                                    <h4 class="mb-0">{{ __('Aplikasi yang ada di OPD Kabupaten Toba') }}</h4>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">

                        <table  class="table table-borderless">
                                                                              
                                        <tbody>
                                            <tr>
                                                <th>Nama OPD</th>
                                                <td>{{ $tabel45->Nama_OPD }}</td>
                                            </tr>
                                            <tr>
                                                <th>Aplikasi</th>
                                                <td>{{ $tabel45->aplikasi }}</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Tahun</th>
                                                <td>{{ $tabel45->tahun }}</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Status</th>
                                                <td>{{ $tabel45->status}}</td>
                                            </tr>
                                            
                                        </tbody>
                                    </table>
            @if($tabel45->status=='Requested')
            <div class="footer"> 
            <div class="col-md-4">
            <form action="/infrastruktur_aplikasi_opd_toba/{{$tabel45->id}}/accept45" method="post" class="d-inline">
            @method('patch')
             @csrf
            <button type="submit" class="btn btn-primary">Accept</button>
            </form>

            <form action="/infrastruktur_aplikasi_opd_toba/{{$tabel45->id}}/reject45" method="post" class="d-inline">
            @method('patch')
            @csrf
            <button type="submit" class="btn  btn-danger">Reject</button>
            </form>
        </div>
        @elseif($tabel45->status=='Accepted')
        <div class="col-md-5">
        <button type="submit" class="btn  btn-primary disabled"> <b> Sudah Di Accepted </b></button>
        <form action="/infrastruktur_aplikasi_opd_toba/{{$tabel45->id}}/reject45" method="post" class="d-inline">
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