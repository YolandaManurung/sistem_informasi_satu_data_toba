@extends('layouts.app', ['activePage' => 'edit-panjang-jalan', 'title' => 'Sistem Informasi Pusat Statistik', 'navName' => 'Table List', 'activeButton' => 'laravel'])

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
                                    <h4 class="mb-0">{{ __('Panjang Jalan Menurut Jenis Permukaan dan Kondisi') }}</h4>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                        
                        <table  class="table table-borderless">
                                                                              
                                        <tbody>
                                            <tr>
                                                <th>Jenis Keadaan</th>
                                                <td>{{ $tabel46->keadaan }}</td>
                                            </tr>
                                            <tr>
                                                <th>Panjang Jalan</th>
                                                <td>{{ number_format($tabel46->panjang_jalan_keadaan,2,",",".") }} km</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Kondisi Jalan</th>
                                                <td>{{ $tabel46->kondisi_jalan }}</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Panjang Kondisi</th>
                                                <td>{{ number_format($tabel46->panjang_jalan_kondisi_jalan,2,",",".") }} km </td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Tahun</th>
                                                <td>{{ $tabel46->tahun }}</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Status</th>
                                                <td>{{ $tabel46->status}}</td>
                                            </tr>
                                            
                                        </tbody>
                                    </table>
                                                                                 
                                 
                            <hr class="my-4" />
                            
                        </div>
            @if($tabel46->status=='Requested')
            <div class="footer"> 
            <div class="col-md-4">
            <form action="/infrastruktur_panjang_jalan/{{$tabel46->id}}/accept46" method="post" class="d-inline">
            @method('patch')
             @csrf
            <button type="submit" class="btn btn-primary">Accept</button>
            </form>

            <form action="/infrastruktur_panjang_jalan/{{$tabel46->id}}/reject46" method="post" class="d-inline">
            @method('patch')
            @csrf
            <button type="submit" class="btn  btn-danger">Reject</button>
            </form>
        </div>
        @elseif($tabel46->status=='Accepted')
        <div class="col-md-5">
        <button type="submit" class="btn  btn-primary disabled"> <b> Sudah Di Accepted </b></button>
        <form action="/infrastruktur_panjang_jalan/{{$tabel46->id}}/reject46" method="post" class="d-inline">
            @method('patch')
            @csrf
        <button type="submit" class="btn  btn-danger">Reject</button>
        </form>
       
        </div>
        @else
        <div class="col-md-4">
        <button type="submit" class="btn  btn-danger disabled"> <b>Data di Reject </b></button>
            
        @endif
                    </div>

                   
                </div>
            </div>
        </div>
    </div>
@endsection                           