@extends('layouts.app', ['activePage' => 'edit-jlh-penduduk-wilayah-kepadatan', 'title' => 'Sistem Informasi Pusat Statistik', 'navName' => 'Table List', 'activeButton' => 'laravel'])

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
                                    <h3 class="mb-0">{{ __('Jumlah Penduduk, Luas Wilayah, dan Kepadatan Penduduk') }}</h3>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                        <form action="{{url('/update_status44',$tabel44->id)}}" method="post" class="account-form">                   
                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                        {{method_field('PUT')}}
                               
                                <table  class="table table-borderless">
                                        <thead>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <th>Kecamatan</th>
                                                <td>{{ $tabel44->kecamatan }}</td>
                                            </tr>
                                            <tr>
                                                <th>Jumlah Penduduk (Jiwa)</th>
                                                <td>{{ $tabel44->Jlh_Penduduk }}</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Luas Wilayah (Ha)</th>
                                                <td>{{ $tabel44->Luas_Wilayah }}</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Tahun</th>
                                                <td>{{ $tabel44->tahun }}</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Status</th>
                                                <td>{{ $tabel44->status}}</td>
                                            </tr>
                                            
                                        </tbody>
                                    </table>
                                
                            
                                
                            </form>
                        
                            <hr class="my-4" />
                        </div>
                        @if($tabel44->status=='Requested')
                        <div class="footer"> 
                        <div class="col-md-4">
                        <form action="/pemerintahan_jlh_penduduk_wilayah_kepadatan/{{$tabel44->id}}/accept44" method="post" class="d-inline">
                        @method('patch')
                        @csrf
                        <button type="submit" class="btn  btn-primary">Accept</button>
                        </form>
                        <form action="/pemerintahan_jlh_penduduk_wilayah_kepadatan/{{$tabel44->id}}/reject44" method="post" class="d-inline">
                        @method('patch')
                        @csrf
                        <button type="submit" class="btn  btn-danger">Reject</button>
                        </form>
                        </div>
                        @elseif($tabel44->status=='Accepted')
                        <div class="col-md-5">
                        <button type="submit" class="btn  btn-primary disabled"> <b> Sudah Di Accepted </b></button>
                        <form action="/pemerintahan_jlh_penduduk_wilayah_kepadatan/{{$tabel44->id}}/reject44" method="post" class="d-inline">
                            @method('patch')
                            @csrf
                        <button type="submit" class="btn  btn-danger">Reject</button>
                        </form>
                        <!-- <a href="{{url('/admin_pemerintahan_jlh_desa_kel')}}" class="card-link">Kembali</a> -->
                        </div>
                        @else
                        <div class="col-md-4">
                        <button type="submit" class="btn  btn-danger disabled"> <b>Data di Reject </b></button>
                            <!-- <a href="{{url('/admin_pemerintahan_jlh_desa_kel')}}" class="card-link">Kembali</a> -->
                        @endif
                        </div>

                   
                </div>
            </div>
        </div>
    </div>
@endsection                           