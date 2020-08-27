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
                                    <h4 class="mb-0">{{ __('Jumlah Pemakaian Air Bersih dalam Per Rumah Tangga') }}</h4>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                                <table  class="table table-borderless">
                                                                              
                        <tbody>
                            <tr>
                                <th>Pemakaian Air Bersih</th>
                                <td>{{ $tabel57->pemakaian_air_bersih }}</td>
                            </tr>
                                                                                                                                    
                            <tr>
                                <th>Jumlah</th>
                                <td>{{ $tabel57->jumlah }}</td>
                            </tr>
                            <tr>
                                <th scope="row">Tahun</th>
                                <td>{{ $tabel57->tahun }}</td>
                            </tr>
                            <tr>
                                <th scope="row">Status</th>
                                <td>{{ $tabel57->status}}</td>
                            </tr>
                                                                                                                                        
                        </tbody>
                        </table>   
                        @if($tabel57->status=='Requested')
            <div class="footer"> 
            <div class="col-md-4">
            <form action="/pdam_jumlah_pemakaian_air_bersih/{{$tabel57->id}}/accept57" method="post" class="d-inline">
            @method('patch')
             @csrf
            <button type="submit" class="btn btn-primary">Accept</button>
            </form>

            <form action="/pdam_jumlah_pemakaian_air_bersih/{{$tabel57->id}}/reject57" method="post" class="d-inline">
            @method('patch')
            @csrf
            <button type="submit" class="btn  btn-danger">Reject</button>
            </form>
        </div>
        @elseif($tabel57->status=='Accepted')
        <div class="col-md-5">
        <button type="submit" class="btn  btn-primary disabled"> <b> Sudah Di Accepted </b></button>
        <form action="/pdam_jumlah_pemakaian_air_bersih/{{$tabel57->id}}/reject57" method="post" class="d-inline">
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