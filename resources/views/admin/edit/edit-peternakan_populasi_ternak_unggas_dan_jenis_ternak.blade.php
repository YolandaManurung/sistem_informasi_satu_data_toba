@extends('layouts.app', ['activePage' => 'edit-peternakan_populasi_ternak_unggas_dan_jenis_ternak', 'title' => 'Sistem Informasi Pusat Statistik', 'navName' => 'Table List', 'activeButton' => 'laravel'])

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
                                    <h4 class="mb-0">{{ __('Populasi Ternak Unggas dan Jenis Ternak (Ekor) Kecamatan') }}</h4>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                        <form action="{{url('/update2',$tabel2->id)}}" method="post" class="account-form">                    
                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                        {{method_field('PUT')}}
                               
                                <table  class="table table-borderless">
                                        <thead>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <th>Kecamatan</th>
                                                <td>{{ $tabel2->kecamatan }}</td>
                                            </tr>
                                            <tr>
                                                <th>Ayam Kampung</th>
                                                <td>{{ $tabel2->ayam_kampung }}</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Ayam Pedaging</th>
                                                <td>{{ $tabel2->ayam_pedaging }}</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Ayam Petelor</th>
                                                <td>{{ $tabel2->ayam_petelor }}</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Itik/Itik Manila</th>
                                                <td>{{ $tabel2->itik_itik_manila }}</td>
                                            </tr>
                        
                                            <tr>
                                                <th scope="row">Tahun</th>
                                                <td>{{ $tabel2->tahun }}</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Status</th>
                                                <td>{{ $tabel2->status}}</td>
                                            </tr>
                                            
                                        </tbody>
                                    </table>
                                
                            
                                
                            </form>
                            <hr class="my-4" />
                            
                        </div>
        @if($tabel2->status=='Requested')
        <div class="footer"> 
        <div class="col-md-4">
            <form action="/peternakan_populasi_ternak_unggas_dan_jenis_ternak/{{$tabel2->id}}/accept2" method="post" class="d-inline">
            @method('patch')
             @csrf
            <button type="submit" class="btn btn-primary">Accept</button>
            </form>

            <form action="/peternakan_populasi_ternak_unggas_dan_jenis_ternak/{{$tabel2->id}}/reject2" method="post" class="d-inline">
            @method('patch')
            @csrf
            <button type="submit" class="btn btn-danger">Reject</button>
            </form>
        </div>
        @elseif($tabel2->status=='Accepted')
        <div class="col-md-5">
        <button type="submit" class="btn btn-sm btn-primary disabled"> <b> Sudah Di Accepted </b></button>
        <form action="/peternakan_populasi_ternak_unggas_dan_jenis_ternak/{{$tabel2->id}}/reject2" method="post" class="d-inline">
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
