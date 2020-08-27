@extends('layouts.app', ['activePage' => 'edit_luas_tanaman_dan_produksi_aren_dan_kemiri', 'title' => 'Sistem Informasi Pusat Statistik', 'navName' => 'Table List', 'activeButton' => 'laravel'])





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
                        <form action="{{url('/update10',$tabel10->id)}}" method="post" class="account-form">                    
                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                        {{method_field('PUT')}}
                               
                                <table  class="table table-borderless">
                                        <thead>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <th>Kecamatan</th>
                                                <td>{{ $tabel10->kecamatan }}</td>
                                            </tr>
                                            <tr>
                                                <th>Luas Areal Aren</th>
                                                <td>{{ $tabel10->luas_areal_aren }}</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Produksi Aren (Ton)</th>
                                                <td>{{ $tabel10->produksi_aren }}</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Produktivitas Aren (Kg/Ha)</th>
                                                <td>{{ $tabel10->produktivitas_aren }}</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Luas Areal Kemiri</th>
                                                <td>{{ $tabel10->luas_areal_kemiri }}</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Produksi Kemiri (Ton)</th>
                                                <td>{{ $tabel10->produksi_kemiri }}</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Produktivitas Kemiri (Kg/Ha)</th>
                                                <td>{{ $tabel10->produktivitas_kemiri }}</td>
                                            </tr>
                                         
                                            <tr>
                                                <th scope="row">Tahun</th>
                                                <td>{{ $tabel10->tahun }}</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Status</th>
                                                <td>{{ $tabel10->status}}</td>
                                            </tr>
                                            
                                        </tbody>
                                    </table>
                                
                            
                                
                            </form>
                            <hr class="my-4" />
                            
                        </div>
        @if($tabel10->status=='Requested')
        <div class="footer"> 
        <div class="col-md-4">
            <form action="/luas_tanaman_dan_produksi_aren_dan_kemiri/{{$tabel10->id}}/accept10" method="post" class="d-inline">
            @method('patch')
             @csrf
            <button type="submit" class="btn btn-primary">Accept</button>
            </form>

            <form action="/luas_tanaman_dan_produksi_aren_dan_kemiri/{{$tabel10->id}}/reject10" method="post" class="d-inline">
            @method('patch')
            @csrf
            <button type="submit" class="btn btn-danger">Reject</button>
            </form>
        </div>
        @elseif($tabel10->status=='Accepted')
        <div class="col-md-5">
        <button type="submit" class="btn btn-sm btn-primary disabled"> <b> Sudah Di Accepted </b></button>
        <form action="/luas_tanaman_dan_produksi_aren_dan_kemiri/{{$tabel10->id}}/reject3" method="post" class="d-inline">
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


