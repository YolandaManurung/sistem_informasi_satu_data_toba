@extends('layouts.app', ['activePage' => 'edit-populasi_ternak_besar', 'title' => 'Sistem Informasi Pusat Statistik', 'navName' => 'Table List', 'activeButton' => 'laravel'])


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
                                    <h4 class="mb-0">{{ __('Populasi Ternak Besar Menurut Kecamatan dan Jenis Ternak (Ekor)') }}</h4>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                        <form action="{{url('/update1',$tabel1->id)}}" method="post" class="account-form">                    
                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                        {{method_field('PUT')}}
                               
                                <table  class="table table-borderless">
                                        <thead>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <th>Kecamatan</th>
                                                <td>{{ $tabel1->kecamatan }}</td>
                                            </tr>
                                            <tr>
                                                <th>Sapi Perah</th>
                                                <td>{{ $tabel1->sapi_perah }}</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Sapi Potong</th>
                                                <td>{{ $tabel1->sapi_potong }}</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Kerbau</th>
                                                <td>{{ $tabel1->kerbau }}</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Kuda</th>
                                                <td>{{ $tabel1->kuda }}</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Kambing</th>
                                                <td>{{ $tabel1->kambing }}</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Domba</th>
                                                <td>{{ $tabel1->domba }}</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Babi</th>
                                                <td>{{ $tabel1->babi }}</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Tahun</th>
                                                <td>{{ $tabel1->tahun }}</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Status</th>
                                                <td>{{ $tabel1->status}}</td>
                                            </tr>
                                            
                                        </tbody>
                                    </table>
                                
                            
                                
                            </form>
                            <hr class="my-4" />
                            
                        </div>
        @if($tabel1->status=='Requested')
        <div class="footer"> 
        <div class="col-md-4">
            <form action="/peternakan_populasi_ternak_besar/{{$tabel1->id}}/accept1" method="post" class="d-inline">
            @method('patch')
             @csrf
            <button type="submit" class="btn btn-primary">Accept</button>
            </form>

            <form action="/peternakan_populasi_ternak_besar/{{$tabel1->id}}/reject1" method="post" class="d-inline">
            @method('patch')
            @csrf
            <button type="submit" class="btn btn-danger">Reject</button>
            </form>
        </div>
        @elseif($tabel1->status=='Accepted')
        <div class="col-md-5">
        <button type="submit" class="btn btn-sm btn-primary disabled"> <b> Sudah Di Accepted </b></button>
        <form action="/peternakan_populasi_ternak_besar/{{$tabel1->id}}/reject1" method="post" class="d-inline">
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
    
@endsection                           