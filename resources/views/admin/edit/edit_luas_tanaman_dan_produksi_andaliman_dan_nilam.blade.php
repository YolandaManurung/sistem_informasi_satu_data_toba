@extends('layouts.app', ['activePage' => 'tambah_luas_tanaman_dan_produksi_andaliman_dan_nilam', 'title' => 'Sistem Informasi Pusat Statistik', 'navName' => 'Table List', 'activeButton' => 'laravel'])





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
                                <div class="col-md-10">
                                    <h4 class="mb-0">{{ __('Luas Tanaman dan Produksi Aren dan Kemiri Tanaman Perkebunan Rakyat Menurut Kecamatan') }}</h4>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                        <form action="{{url('/update12',$tabel12->id)}}" method="post" class="account-form">                    
                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                        {{method_field('PUT')}}
                               
                                <table  class="table table-borderless">
                                        <thead>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <th>Kecamatan</th>
                                                <td>{{ $tabel12->kecamatan }}</td>
                                            </tr>
                                            <tr>
                                                <th>Luas Areal Andaliman</th>
                                                <td>{{ $tabel12->luas_areal_andaliman }}</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Produksi Andaliman (Ton)</th>
                                                <td>{{ $tabel12->produksi_andaliman }}</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Produktivitas Andaliman (Kg/Ha)</th>
                                                <td>{{ $tabel12->produktivitas_andaliman }}</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Luas Areal Nilam</th>
                                                <td>{{ $tabel12->luas_areal_nilam }}</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Produksi Nilam (Ton)</th>
                                                <td>{{ $tabel12->produksi_nilam }}</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Produktivitas Nilam (Kg/Ha)</th>
                                                <td>{{ $tabel12->produktivitas_nilam }}</td>
                                            </tr>
                                         
                                            <tr>
                                                <th scope="row">Tahun</th>
                                                <td>{{ $tabel12->tahun }}</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Status</th>
                                                <td>{{ $tabel12->status}}</td>
                                            </tr>
                                            
                                        </tbody>
                                    </table>
                                
                            
                                
                            </form>
                            <hr class="my-4" />
                            
                        </div>
        @if($tabel12->status=='Requested')
        <div class="footer"> 
        <div class="col-md-4">
            <form action="/luas_tanaman_dan_produksi_andaliman_dan_nilam/{{$tabel12->id}}/accept12" method="post" class="d-inline">
            @method('patch')
             @csrf
            <button type="submit" class="btn btn-primary">Accept</button>
            </form>

            <form action="/luas_tanaman_dan_produksi_andaliman_dan_nilam/{{$tabel12->id}}/reject12" method="post" class="d-inline">
            @method('patch')
            @csrf
            <button type="submit" class="btn btn-danger">Reject</button>
            </form>
        </div>
        @elseif($tabel12->status=='Accepted')
        <div class="col-md-5">
        <button type="submit" class="btn btn-sm btn-primary disabled"> <b> Sudah Di Accepted </b></button>
        <form action="/luas_tanaman_dan_produksi_andaliman_dan_nilam/{{$tabel12->id}}/reject3" method="post" class="d-inline">
            @method('patch')
            @csrf
        <button type="submit" class="btn btn-danger">Reject</button>
        </form>
        <!-- <a href="{{url('/admin_pemerintahan_jlh_desa_kel')}}" class="card-link">Kembali</a> -->
        </div>
        @else
        <div class="col-md-4">
        <button type="submit" class="btn btn-danger disabled"> <b>Data di Reject </b></button>
            <!-- <a href="{{url('/admin_pemerintahan_jlh_desa_kel')}}" class="card-link">Kembali</a> -->
        @endif
        </div>
    
                </div>

                   
                </div>
            </div>
        </div>
    </div>
@endsection                           
