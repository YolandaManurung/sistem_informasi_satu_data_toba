@extends('layouts.app', ['activePage' => 'formulir-panjang-jalan', 'title' => 'Sistem Informasi Pusat Statistik', 'navName' => 'Table List', 'activeButton' => 'laravel'])

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
                                    <h4 class="mb-0">{{ __('Jembatan Menurut Status dan Keadaan') }}</h>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                        <table  class="table table-borderless">
                                                                              
                        <tbody>
                        <tr>
                            <th>Keadaan</th>
                            <td>{{ $tabel48->keadaan }}</td>
                            </tr>
                                                                                 
                        <tr>
                            <th>Jumlah Jembatan (Unit)</th>
                            <td>{{ $tabel48->jumlah_jembatan }}</td>
                        </tr>
                        <tr>
                            <th scope="row">Tahun</th>
                            <td>{{ $tabel48->tahun }}</td>
                        </tr>
                        <tr>
                            <th scope="row">Status</th>
                            <td>{{ $tabel48->status}}</td>
                        </tr>
                                                                                  
                        </tbody>
                </table>     
            @if($tabel48->status=='Requested')
            <div class="footer"> 
            <div class="col-md-4">
            <form action="/infrastruktur_jembatan/{{$tabel48->id}}/accept48" method="post" class="d-inline">
            @method('patch')
             @csrf
            <button type="submit" class="btn btn-primary">Accept</button>
            </form>

            <form action="/infrastruktur_jembatan/{{$tabel48->id}}/reject48" method="post" class="d-inline">
            @method('patch')
            @csrf
            <button type="submit" class="btn  btn-danger">Reject</button>
            </form>
        </div>
        @elseif($tabel48->status=='Accepted')
        <div class="col-md-5">
        <button type="submit" class="btn  btn-primary disabled"> <b> Sudah Di Accepted </b></button>
        <form action="/infrastruktur_jembatan/{{$tabel48->id}}/reject48" method="post" class="d-inline">
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