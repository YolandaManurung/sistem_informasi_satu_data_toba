@extends('layouts.app', ['activePage' => 'tambah_luas_tanaman_dan_produksi_kelapa_dan_pinang', 'title' => 'Sistem Informasi Pusat Statistik', 'navName' => 'Table List', 'activeButton' => 'laravel'])




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
                                    <h4 class="mb-0">{{ __('Luas Tanaman dan Produksi Kelapa dan Pinang Tanaman Perkebunan Rakyat Menurut Kecamatan') }}</h4>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                        <form action="{{url('/update11',$tabel11->id)}}" method="post" class="account-form">                    
                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                        {{method_field('PUT')}}
                               
                                <table  class="table table-borderless">
                                        <thead>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <th>Kecamatan</th>
                                                <td>{{ $tabel11->kecamatan }}</td>
                                            </tr>
                                            <tr>
                                                <th>Luas Areal Kelapa</th>
                                                <td>{{ $tabel11->luas_areal_kelapa }}</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Produksi Kelapa (Ton)</th>
                                                <td>{{ $tabel11->produksi_kelapa }}</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Produktivitas Kelapa (Kg/Ha)</th>
                                                <td>{{ $tabel11->produktivitas_kelapa }}</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Luas Areal Pinang</th>
                                                <td>{{ $tabel11->luas_areal_pinang }}</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Produksi Pinang (Ton)</th>
                                                <td>{{ $tabel11->produksi_pinang }}</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Produktivitas Pinang (Kg/Ha)</th>
                                                <td>{{ $tabel11->produktivitas_pinang }}</td>
                                            </tr>
                                         
                                            <tr>
                                                <th scope="row">Tahun</th>
                                                <td>{{ $tabel11->tahun }}</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Status</th>
                                                <td>{{ $tabel11->status}}</td>
                                            </tr>
                                            
                                        </tbody>
                                    </table>
                                
                            
                                
                            </form>
                            <hr class="my-4" />
                            
                        </div>
        @if($tabel11->status=='Requested')
        <div class="footer"> 
        <div class="col-md-4">
            <form action="/luas_tanaman_dan_produksi_kelapa_dan_pinang/{{$tabel11->id}}/accept11" method="post" class="d-inline">
            @method('patch')
             @csrf
            <button type="submit" class="btn btn-primary">Accept</button>
            </form>

            <form action="/luas_tanaman_dan_produksi_kelapa_dan_pinang/{{$tabel11->id}}/reject11" method="post" class="d-inline">
            @method('patch')
            @csrf
            <button type="submit" class="btn btn-danger">Reject</button>
            </form>
        </div>
        @elseif($tabel11->status=='Accepted')
        <div class="col-md-5">
        <button type="submit" class="btn btn-sm btn-primary disabled"> <b> Sudah Di Accepted </b></button>
        <form action="/luas_tanaman_dan_produksi_kelapa_dan_pinang/{{$tabel11->id}}/reject3" method="post" class="d-inline">
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

