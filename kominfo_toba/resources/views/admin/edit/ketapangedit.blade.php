@extends('layouts.app', ['activePage' => 'pariwisataedit', 'title' => 'Sistem Informasi Pusat Statistik', 'navName' => 'Table List', 'activeButton' => 'laravel'])

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
                                    <h4 class="mb-0">{{ __('Jenis Bantuan Pemerintah ke Masyarakat perkecamatan Tahun 2019') }}</h4>
                                </div>
                            </div>
                        </div>
                        <div class="card-body"> 
                        <form action="{{url('/update_status65',$tabel65->id)}}" method="post" class="account-form">                   
                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                        {{method_field('PUT')}}
                               
                                <table  class="table table-borderless">
                                        <thead>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <th>Jenis Bantuan</th>
                                                <td>{{ $tabel65->jenis_bantuan }}</td>
                                            </tr>
                                            <tr>
                                                <th>Kecamatan</th>
                                                <td>{{ $tabel65->kecamatan }}</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Desa</th>
                                                <td>{{ $tabel65->desa }}</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Jumlah</th>
                                                <td>{{ $tabel65->jumlah }}</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Tahun</th>
                                                <td>{{ $tabel65->tahun }}</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Keterangan</th>
                                                <td>{{ $tabel65->keterangan }}</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Status</th>
                                                <td>{{ $tabel65->status}}</td>
                                            </tr>
                                            
                                        </tbody>
                                    </table>
                                
                            
                                
                            </form>
                            <hr class="my-4" />
                            
                        </div>
        @if($tabel65->status=='Requested')
        <div class="footer"> 
        <div class="col-md-4">
            <form action="/bantuan_pemerintah_kecamatan/{{$tabel65->id}}/accept65" method="post" class="d-inline">
            @method('patch')
             @csrf
            <button type="submit" class="btn btn-primary">Accept</button>
            </form>

            <form action="/bantuan_pemerintah_kecamatan/{{$tabel65->id}}/reject65" method="post" class="d-inline">
            @method('patch')
            @csrf
            <button type="submit" class="btn btn-danger">Reject</button>
            </form>
        </div>
        @elseif($tabel65->status=='Accepted')
        <div class="col-md-5">
        <button type="submit" class="btn btn-primary disabled"> <b> Sudah Di Accepted </b></button>
        <form action="/bantuan_pemerintah_kecamatan/{{$tabel65->id}}/reject65" method="post" class="d-inline">
            @method('patch')
            @csrf
        <button type="submit" class="btn btn-danger">Reject</button>
        </form>
      
        </div>
        @else
        <div class="col-md-4">
        <button type="submit" class="btn btn-danger disabled"> <b>Data di Reject </b></button>
           
        @endif
        </div>
    
                </div>

                   
                </div>
            </div>
        </div>
    </div>
@endsection                           
